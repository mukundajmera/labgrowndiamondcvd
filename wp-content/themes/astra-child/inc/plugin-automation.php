<?php
/**
 * Plugin Automation Healthcheck and Admin Status Notices
 *
 * @package Astra Child
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class LGD_Plugin_Automation {

    public function __construct() {
        add_action('admin_notices', array($this, 'display_admin_notices'));
        add_action('wp_dashboard_setup', array($this, 'add_dashboard_widgets'));
    }

    /**
     * Check if essential plugins are active
     */
    private function get_plugin_status() {
        return array(
            'WooCommerce' => class_exists('WooCommerce'),
            'LiteSpeed Cache' => defined('LSCWP_V') || class_exists('LiteSpeed_Cache') || function_exists('run_litespeed_cache'),
            'RankMath' => class_exists('RankMath') || defined('RANK_MATH_VERSION'),
        );
    }

    /**
     * Check WooCommerce tables and configurations
     */
    private function get_ecommerce_status() {
        global $wpdb;
        $status = array(
            'tables_missing' => array(),
            'config_issues' => array(),
        );

        if (!class_exists('WooCommerce')) {
            $status['config_issues'][] = 'WooCommerce is not active. Cannot check configurations.';
            return $status;
        }

        // Check essential tables
        $essential_tables = array(
            $wpdb->prefix . 'woocommerce_sessions',
            $wpdb->prefix . 'woocommerce_api_keys',
            $wpdb->prefix . 'woocommerce_attribute_taxonomies',
            $wpdb->prefix . 'woocommerce_downloadable_product_permissions',
            $wpdb->prefix . 'woocommerce_order_items',
            $wpdb->prefix . 'woocommerce_order_itemmeta',
            $wpdb->prefix . 'woocommerce_tax_rates',
            $wpdb->prefix . 'woocommerce_tax_rate_locations',
            $wpdb->prefix . 'woocommerce_shipping_zones',
            $wpdb->prefix . 'woocommerce_shipping_zone_locations',
            $wpdb->prefix . 'woocommerce_shipping_zone_methods',
            $wpdb->prefix . 'woocommerce_payment_tokens',
            $wpdb->prefix . 'woocommerce_payment_tokenmeta',
            $wpdb->prefix . 'woocommerce_log',
        );

        foreach ($essential_tables as $table) {
            if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table)) != $table) {
                $status['tables_missing'][] = $table;
            }
        }

        // Check configurations
        if (get_option('woocommerce_currency') === false) {
            $status['config_issues'][] = 'WooCommerce currency is not set.';
        }
        
        $permalinks = get_option('woocommerce_permalinks');
        if (empty($permalinks) || empty($permalinks['category_base'])) {
            $status['config_issues'][] = 'WooCommerce product permalinks might not be fully configured.';
        }

        return $status;
    }

    /**
     * Display admin notices
     */
    public function display_admin_notices() {
        // Only show to admins
        if (!current_user_can('manage_options')) {
            return;
        }

        $plugins = $this->get_plugin_status();
        $missing_plugins = array();
        
        foreach ($plugins as $plugin => $is_active) {
            if (!$is_active) {
                $missing_plugins[] = $plugin;
            }
        }

        if (!empty($missing_plugins)) {
            echo '<div class="notice notice-error"><p><strong>LGD Automation:</strong> Essential plugins missing or inactive: ' . implode(', ', $missing_plugins) . '</p></div>';
        }

        $ecommerce_status = $this->get_ecommerce_status();
        
        if (!empty($ecommerce_status['tables_missing'])) {
            echo '<div class="notice notice-error"><p><strong>LGD Automation:</strong> Missing WooCommerce tables: ' . implode(', ', $ecommerce_status['tables_missing']) . '</p></div>';
        }
        
        if (!empty($ecommerce_status['config_issues'])) {
            echo '<div class="notice notice-warning"><p><strong>LGD Automation:</strong> E-commerce configuration issues: ' . implode(', ', $ecommerce_status['config_issues']) . '</p></div>';
        }
    }

    /**
     * Add dashboard widget
     */
    public function add_dashboard_widgets() {
        wp_add_dashboard_widget(
            'lgd_plugin_automation_widget',
            'LGD Verification Status',
            array($this, 'render_dashboard_widget')
        );
    }

    /**
     * Render dashboard widget
     */
    public function render_dashboard_widget() {
        $plugins = $this->get_plugin_status();
        $ecommerce_status = $this->get_ecommerce_status();
        
        echo '<h4>Plugin Status</h4>';
        echo '<ul>';
        foreach ($plugins as $plugin => $is_active) {
            $color = $is_active ? 'green' : 'red';
            $status_text = $is_active ? 'Active' : 'Inactive';
            echo "<li><strong>{$plugin}:</strong> <span style='color: {$color};'>{$status_text}</span></li>";
        }
        echo '</ul>';

        echo '<h4>E-commerce Verification</h4>';
        if (empty($ecommerce_status['tables_missing']) && empty($ecommerce_status['config_issues'])) {
            echo '<p style="color: green;">All essential WooCommerce tables and configurations look good.</p>';
        } else {
            if (!empty($ecommerce_status['tables_missing'])) {
                echo '<p style="color: red;"><strong>Missing Tables:</strong> ' . implode(', ', $ecommerce_status['tables_missing']) . '</p>';
            }
            if (!empty($ecommerce_status['config_issues'])) {
                echo '<p style="color: orange;"><strong>Configuration Issues:</strong><br>' . implode('<br>', $ecommerce_status['config_issues']) . '</p>';
            }
        }
    }
}

// Initialize the class
new LGD_Plugin_Automation();
