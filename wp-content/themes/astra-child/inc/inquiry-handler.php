<?php
/**
 * Secure Diamond Inquiry & Consultation Intake Handler
 * 
 * Handles inquiry submissions with CSRF protection, input sanitization,
 * Cloudflare Turnstile verification, and stores entries securely.
 * 
 * @package Astra Child Diamond
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class LGD_Inquiry_Handler {
    
    /**
     * Initialize the handler
     */
    public function __construct() {
        // Register Custom Post Type for Inquiries
        add_action('init', array($this, 'register_inquiry_cpt'));
        
        // Handle AJAX form submissions
        add_action('wp_ajax_submit_diamond_inquiry', array($this, 'handle_inquiry_submission'));
        add_action('wp_ajax_nopriv_submit_diamond_inquiry', array($this, 'handle_inquiry_submission'));
    }
    
    /**
     * Register Custom Post Type to store inquiries securely
     */
    public function register_inquiry_cpt() {
        $labels = array(
            'name'               => _x('Diamond Inquiries', 'post type general name', 'astra-child-diamond'),
            'singular_name'      => _x('Diamond Inquiry', 'post type singular name', 'astra-child-diamond'),
            'menu_name'          => _x('Inquiries', 'admin menu', 'astra-child-diamond'),
            'name_admin_bar'     => _x('Inquiry', 'add new on admin bar', 'astra-child-diamond'),
            'add_new'            => _x('Add New', 'inquiry', 'astra-child-diamond'),
            'add_new_item'       => __('Add New Inquiry', 'astra-child-diamond'),
            'new_item'           => __('New Inquiry', 'astra-child-diamond'),
            'edit_item'          => __('Edit Inquiry', 'astra-child-diamond'),
            'view_item'          => __('View Inquiry', 'astra-child-diamond'),
            'all_items'          => __('All Inquiries', 'astra-child-diamond'),
            'search_items'       => __('Search Inquiries', 'astra-child-diamond'),
            'not_found'          => __('No inquiries found.', 'astra-child-diamond'),
            'not_found_in_trash' => __('No inquiries found in Trash.', 'astra-child-diamond')
        );
        
        $args = array(
            'labels'             => $labels,
            'public'             => false,
            'publicly_queryable' => false,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => false,
            'rewrite'            => false,
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => 30,
            'menu_icon'          => 'dashicons-email-alt',
            'supports'           => array('title', 'custom-fields'),
        );
        
        register_post_type('diamond_inquiry', $args);
    }
    
    /**
     * Handle the AJAX inquiry submission
     */
    public function handle_inquiry_submission() {
        // 1. Verify Nonce
        if (!isset($_POST['inquiry_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['inquiry_nonce'])), 'diamond_inquiry_action')) {
            wp_send_json_error(array('message' => __('Security check failed. Please try again.', 'astra-child-diamond')));
            exit;
        }
        
        // 2. Cloudflare Turnstile Verification
        $turnstile_secret = get_option('cloudflare_turnstile_secret', '');
        if (!empty($turnstile_secret)) {
            $turnstile_response = isset($_POST['cf-turnstile-response']) ? sanitize_text_field(wp_unslash($_POST['cf-turnstile-response'])) : '';
            
            if (empty($turnstile_response)) {
                wp_send_json_error(array('message' => __('Please complete the security check.', 'astra-child-diamond')));
                exit;
            }
            
            $verify_url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
            $verify_response = wp_remote_post($verify_url, array(
                'body' => array(
                    'secret' => $turnstile_secret,
                    'response' => $turnstile_response,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                )
            ));
            
            if (is_wp_error($verify_response)) {
                wp_send_json_error(array('message' => __('Security verification service is unreachable.', 'astra-child-diamond')));
                exit;
            }
            
            $verify_body = json_decode(wp_remote_retrieve_body($verify_response));
            
            if (!$verify_body->success) {
                wp_send_json_error(array('message' => __('Security verification failed. Are you a bot?', 'astra-child-diamond')));
                exit;
            }
        }
        
        // 3. Sanitize Inputs
        $name = isset($_POST['customer_name']) ? sanitize_text_field(wp_unslash($_POST['customer_name'])) : '';
        $email = isset($_POST['customer_email']) ? sanitize_email(wp_unslash($_POST['customer_email'])) : '';
        $phone = isset($_POST['customer_phone']) ? sanitize_text_field(wp_unslash($_POST['customer_phone'])) : '';
        $inquiry_type = isset($_POST['inquiry_type']) ? sanitize_text_field(wp_unslash($_POST['inquiry_type'])) : 'general';
        $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';
        $diamond_id = isset($_POST['diamond_id']) ? sanitize_text_field(wp_unslash($_POST['diamond_id'])) : '';
        
        // Validate required fields
        if (empty($name) || empty($email) || empty($message)) {
            wp_send_json_error(array('message' => __('Please fill out all required fields.', 'astra-child-diamond')));
            exit;
        }
        
        if (!is_email($email)) {
            wp_send_json_error(array('message' => __('Please provide a valid email address.', 'astra-child-diamond')));
            exit;
        }
        
        // 4. Store the inquiry
        $post_title = sprintf('Inquiry: %s from %s', ucfirst($inquiry_type), $name);
        
        $post_id = wp_insert_post(array(
            'post_title'  => $post_title,
            'post_type'   => 'diamond_inquiry',
            'post_status' => 'publish',
        ));
        
        if (is_wp_error($post_id)) {
            wp_send_json_error(array('message' => __('Failed to save your inquiry. Please try again.', 'astra-child-diamond')));
            exit;
        }
        
        // Store meta data
        $timestamp = current_time('mysql');
        update_post_meta($post_id, '_customer_name', $name);
        update_post_meta($post_id, '_customer_email', $email);
        update_post_meta($post_id, '_customer_phone', $phone);
        update_post_meta($post_id, '_inquiry_type', $inquiry_type);
        update_post_meta($post_id, '_message', $message);
        update_post_meta($post_id, '_diamond_id', $diamond_id);
        update_post_meta($post_id, '_audit_timestamp', $timestamp);
        update_post_meta($post_id, '_ip_address', $_SERVER['REMOTE_ADDR']);
        
        // 5. Send Notifications
        $this->send_notifications($post_id, $name, $email, $phone, $inquiry_type, $message, $diamond_id);
        
        wp_send_json_success(array('message' => __('Your inquiry has been submitted successfully. We will get back to you shortly.', 'astra-child-diamond')));
        exit;
    }
    
    /**
     * Send email notifications for the inquiry
     */
    private function send_notifications($post_id, $name, $email, $phone, $inquiry_type, $message, $diamond_id) {
        $site_name = get_bloginfo('name');
        
        // Prepare Admin Email
        $admin_email = get_option('admin_email');
        $admin_subject = sprintf('[%s] New %s Inquiry from %s', $site_name, ucfirst($inquiry_type), $name);
        
        $admin_message = "A new inquiry has been received.\n\n";
        $admin_message .= "Details:\n";
        $admin_message .= "Name: $name\n";
        $admin_message .= "Email: $email\n";
        $admin_message .= "Phone: $phone\n";
        $admin_message .= "Type: $inquiry_type\n";
        if (!empty($diamond_id)) {
            $admin_message .= "Diamond Ref: $diamond_id\n";
        }
        $admin_message .= "Message:\n$message\n\n";
        $admin_message .= "View Inquiry: " . admin_url('post.php?post=' . $post_id . '&action=edit');
        
        $admin_headers = array('Content-Type: text/plain; charset=UTF-8');
        
        // Prepare Customer Confirmation Email
        $customer_subject = sprintf('Thank you for your inquiry - %s', $site_name);
        
        $customer_message = "Dear $name,\n\n";
        $customer_message .= "Thank you for reaching out to us. We have received your inquiry regarding \"$inquiry_type\".\n\n";
        $customer_message .= "Our trade desk team is reviewing your request and will get back to you shortly.\n\n";
        $customer_message .= "For your records, here is a copy of your message:\n";
        $customer_message .= "------------------------------------------------\n";
        $customer_message .= "$message\n";
        $customer_message .= "------------------------------------------------\n\n";
        $customer_message .= "Best regards,\n";
        $customer_message .= "The $site_name Team";
        
        $customer_headers = array('Content-Type: text/plain; charset=UTF-8');
        
        // Dispatch emails
        wp_mail($admin_email, $admin_subject, $admin_message, $admin_headers);
        wp_mail($email, $customer_subject, $customer_message, $customer_headers);
    }
}

// Initialize the handler
new LGD_Inquiry_Handler();
