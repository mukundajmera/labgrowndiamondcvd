<?php
/**
 * Security Hardening, Rate Limiting and API Protection Module
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class LGD_Security_Hardener {
    
    /**
     * Instance of this class.
     */
    private static $instance = null;

    /**
     * Get the instance of this class.
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor.
     */
    private function __construct() {
        $this->init_hooks();
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks() {
        // Enforce strict HTTP security headers
        add_action( 'send_headers', array( $this, 'add_security_headers' ) );

        // Rate-limit AJAX endpoints
        add_action( 'init', array( $this, 'rate_limit_ajax_requests' ) );

        // Disable XML-RPC
        add_filter( 'xmlrpc_enabled', '__return_false' );

        // Disable author enumeration
        add_action( 'template_redirect', array( $this, 'block_author_enumeration' ) );
        add_filter( 'rest_endpoints', array( $this, 'disable_rest_author_endpoints' ) );

        // Sanitize incoming arguments
        add_action( 'parse_request', array( $this, 'sanitize_query_vars' ), 10, 1 );
        add_filter( 'rest_pre_dispatch', array( $this, 'sanitize_rest_request' ), 10, 3 );
    }

    /**
     * Enforce strict HTTP security headers.
     */
    public function add_security_headers() {
        if ( ! headers_sent() ) {
            // Basic Content Security Policy
            header( "Content-Security-Policy: default-src 'self' 'unsafe-inline' 'unsafe-eval' https: data:;" );
            
            // HTTP Strict Transport Security
            header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );
            
            // X-Frame-Options
            header( 'X-Frame-Options: SAMEORIGIN' );
            
            // X-Content-Type-Options
            header( 'X-Content-Type-Options: nosniff' );
        }
    }

    /**
     * Rate-limit specific AJAX endpoints (e.g., diamond search).
     */
    public function rate_limit_ajax_requests() {
        if ( ! wp_doing_ajax() ) {
            return;
        }

        $action = isset( $_REQUEST['action'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '';
        
        $rate_limited_actions = array(
            'get_diamond_count',
            'submit_diamond_inquiry'
        );

        if ( in_array( $action, $rate_limited_actions, true ) ) {
            $ip_address = $this->get_client_ip();
            if ( ! $ip_address ) {
                return; // Unable to determine IP
            }

            $transient_name = 'lgd_rl_' . md5( $ip_address . '_' . $action );
            
            // Check current rate limit
            $request_count = get_transient( $transient_name );

            if ( false === $request_count ) {
                // First request, set transient for 1 minute
                set_transient( $transient_name, 1, MINUTE_IN_SECONDS );
            } else {
                if ( (int) $request_count >= 30 ) { // 30 requests per minute limit
                    status_header( 429 );
                    wp_send_json_error( array( 'message' => 'Too many requests. Please try again later.' ) );
                    die();
                }
                // Increment request count
                set_transient( $transient_name, (int) $request_count + 1, MINUTE_IN_SECONDS );
            }
        }
    }

    /**
     * Helper to get client IP address.
     */
    private function get_client_ip() {
        $ip = '';
        if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
            // Can contain multiple IPs, take the first one
            $ips = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
            $ip = trim( $ips[0] );
        } elseif ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return filter_var( $ip, FILTER_VALIDATE_IP );
    }

    /**
     * Block author enumeration via template redirect.
     */
    public function block_author_enumeration() {
        if ( is_author() || ( isset( $_GET['author'] ) && is_numeric( $_GET['author'] ) ) ) {
            wp_redirect( home_url(), 301 );
            die();
        }
    }

    /**
     * Disable REST API author endpoints.
     */
    public function disable_rest_author_endpoints( $endpoints ) {
        if ( isset( $endpoints['/wp/v2/users'] ) ) {
            unset( $endpoints['/wp/v2/users'] );
        }
        if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
            unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
        }
        return $endpoints;
    }

    /**
     * Sanitize query variables safely.
     * Note: Applying global sanitization to $_GET and $wp->query_vars can break things, 
     * but to fulfill the requirement, we will perform a very safe and basic sanitization
     * that shouldn't truncate HTML or destroy data for legitimate functionality, 
     * but will strip potentially dangerous scripts or invalid characters.
     */
    public function sanitize_query_vars( $wp ) {
        if ( ! empty( $wp->query_vars ) ) {
            $wp->query_vars = $this->recursive_safe_sanitize( $wp->query_vars );
        }
        
        // As requested by instructions to sanitize GET variables, but we must do so safely.
        if ( ! empty( $_GET ) ) {
            $_GET = $this->recursive_safe_sanitize( $_GET );
        }
    }

    /**
     * Sanitize REST API request parameters.
     */
    public function sanitize_rest_request( $result, $server, $request ) {
        // Sanitize parameters inside the request
        $params = $request->get_params();
        if ( ! empty( $params ) ) {
            $sanitized_params = $this->recursive_safe_sanitize( $params );
            
            // Set sanitized parameters back to the request
            foreach ( $sanitized_params as $key => $value ) {
                $request->set_param( $key, $value );
            }
        }
        
        return $result; // Always return the original result to not block the request
    }

    /**
     * Recursively sanitize arrays safely, removing potentially dangerous elements
     * without blindly stripping all HTML or valid content.
     */
    private function recursive_safe_sanitize( $data ) {
        if ( is_array( $data ) ) {
            $sanitized = array();
            foreach ( $data as $key => $value ) {
                // Ensure array keys are safe as well
                $safe_key = sanitize_key( $key );
                if ( ! empty( $safe_key ) ) {
                    $sanitized[ $safe_key ] = $this->recursive_safe_sanitize( $value );
                } else {
                    $sanitized[ $key ] = $this->recursive_safe_sanitize( $value );
                }
            }
            return $sanitized;
        } elseif ( is_string( $data ) ) {
            // Use wp_kses_post to allow safe HTML while stripping scripts/malicious tags
            return wp_kses_post( wp_unslash( $data ) );
        }
        
        // Return other types (int, bool, etc) untouched
        return $data;
    }
}

// Initialize the module
LGD_Security_Hardener::get_instance();
