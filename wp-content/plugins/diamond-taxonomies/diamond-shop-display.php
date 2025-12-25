<?php
/**
 * Plugin Name: Diamond Shop Display
 * Plugin URI: https://labgrowndiamondcvd.com
 * Description: Transforms WooCommerce shop grid with diamond specs display and luxury styling.
 * Version: 1.0.0
 * Author: Lab Grown Diamond CVD
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * WC requires at least: 5.0
 * Text Domain: diamond-shop-display
 */

defined('ABSPATH') || exit;

// ============================================
// REMOVE DEFAULT ADD TO CART BUTTON ON GRID
// ============================================
add_action('woocommerce_init', 'lgdc_remove_shop_add_to_cart');

function lgdc_remove_shop_add_to_cart()
{
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
}

// ============================================
// ADD DIAMOND SPECS BELOW PRICE
// ============================================
add_action('woocommerce_after_shop_loop_item_title', 'lgdc_display_diamond_specs', 5);

function lgdc_display_diamond_specs()
{
    global $product;

    if (!$product) {
        return;
    }

    $product_id = $product->get_id();

    // Retrieve taxonomy terms
    $shape_terms = get_the_terms($product_id, 'diamond_shape');
    $color_terms = get_the_terms($product_id, 'diamond_color');
    $clarity_terms = get_the_terms($product_id, 'diamond_clarity');

    // Get meta value
    $carat = get_post_meta($product_id, '_diamond_carat', true);

    // Extract term names (first term only)
    $shape = ($shape_terms && !is_wp_error($shape_terms)) ? $shape_terms[0]->name : '';
    $color = ($color_terms && !is_wp_error($color_terms)) ? $color_terms[0]->name : '';
    $clarity = ($clarity_terms && !is_wp_error($clarity_terms)) ? $clarity_terms[0]->name : '';

    // Only display if we have data
    if (!$shape && !$carat && !$color && !$clarity) {
        return;
    }

    echo '<div class="diamond-specs">';

    // Line 1: Shape • Carat (Bold)
    if ($shape || $carat) {
        echo '<p class="diamond-specs-primary">';
        $parts = [];
        if ($shape) {
            $parts[] = esc_html($shape);
        }
        if ($carat) {
            $parts[] = esc_html(number_format((float) $carat, 2)) . 'ct';
        }
        echo '<strong>' . implode(' • ', $parts) . '</strong>';
        echo '</p>';
    }

    // Line 2: Color | Clarity (Muted Grey)
    if ($color || $clarity) {
        echo '<p class="diamond-specs-secondary">';
        $parts = [];
        if ($color) {
            $parts[] = esc_html($color);
        }
        if ($clarity) {
            $parts[] = esc_html($clarity);
        }
        echo implode(' | ', $parts);
        echo '</p>';
    }

    echo '</div>';
}

// ============================================
// ENQUEUE LUXURY STYLESHEET
// ============================================
add_action('wp_enqueue_scripts', 'lgdc_enqueue_diamond_styles');

function lgdc_enqueue_diamond_styles()
{
    if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
        wp_enqueue_style(
            'lgdc-diamond-grid',
            plugin_dir_url(__FILE__) . 'diamond-grid.css',
            [],
            '1.0.0'
        );
    }
}
