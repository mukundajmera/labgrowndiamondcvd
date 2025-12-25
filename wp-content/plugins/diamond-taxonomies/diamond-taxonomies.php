<?php
/**
 * Plugin Name: Diamond Taxonomies & Data Generator
 * Plugin URI: https://labgrowndiamondcvd.com
 * Description: Registers custom diamond taxonomies and provides a one-time dummy data generator for the Loose Diamond marketplace.
 * Version: 1.0.0
 * Author: Lab Grown Diamond CVD
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * WC requires at least: 5.0
 * Text Domain: diamond-taxonomies
 */

defined('ABSPATH') || exit;

// ============================================
// 1. REGISTER DIAMOND TAXONOMIES
// ============================================
add_action('init', 'lgdc_register_diamond_taxonomies');

function lgdc_register_diamond_taxonomies()
{
    $taxonomies = [
        'diamond_shape' => ['Shape', 'Shapes'],
        'diamond_color' => ['Color', 'Colors'],
        'diamond_clarity' => ['Clarity', 'Clarities'],
        'diamond_cut' => ['Cut', 'Cuts'],
        'diamond_lab' => ['Lab', 'Labs'],
    ];

    foreach ($taxonomies as $taxonomy => $labels) {
        $args = [
            'labels' => [
                'name' => $labels[1],
                'singular_name' => $labels[0],
                'search_items' => 'Search ' . $labels[1],
                'all_items' => 'All ' . $labels[1],
                'parent_item' => 'Parent ' . $labels[0],
                'parent_item_colon' => 'Parent ' . $labels[0] . ':',
                'edit_item' => 'Edit ' . $labels[0],
                'update_item' => 'Update ' . $labels[0],
                'add_new_item' => 'Add New ' . $labels[0],
                'new_item_name' => 'New ' . $labels[0] . ' Name',
                'menu_name' => $labels[1],
            ],
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => $taxonomy],
        ];

        register_taxonomy($taxonomy, 'product', $args);
    }
}

// ============================================
// 2. DUMMY DATA GENERATOR (One-Time Trigger)
// ============================================
add_action('admin_init', 'lgdc_generate_dummy_diamonds');

function lgdc_generate_dummy_diamonds()
{
    if (!isset($_GET['generate_diamonds']) || $_GET['generate_diamonds'] !== 'true') {
        return;
    }

    // Security: Verify user capability
    if (!current_user_can('manage_woocommerce')) {
        wp_die('You do not have permission to perform this action.');
    }

    // Ensure WooCommerce is active
    if (!class_exists('WC_Product_Simple')) {
        wp_die('WooCommerce is not active. Please activate WooCommerce first.');
    }

    // Define term arrays
    $shapes = ['Round', 'Oval', 'Emerald', 'Radiant', 'Cushion', 'Princess'];
    $colors = ['D', 'E', 'F', 'G', 'H', 'I'];
    $clarities = ['FL', 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2'];
    $cuts = ['Ideal', 'Excellent', 'Very Good'];
    $labs = ['IGI', 'GIA'];

    // Ensure taxonomy terms exist
    $term_map = [
        'diamond_shape' => $shapes,
        'diamond_color' => $colors,
        'diamond_clarity' => $clarities,
        'diamond_cut' => $cuts,
        'diamond_lab' => $labs,
    ];

    foreach ($term_map as $taxonomy => $terms) {
        foreach ($terms as $term) {
            if (!term_exists($term, $taxonomy)) {
                wp_insert_term($term, $taxonomy);
            }
        }
    }

    $created_count = 0;
    $max_products = 50;

    for ($i = 0; $i < $max_products; $i++) {
        // Generate random values
        $carat = round(mt_rand(50, 300) / 100, 2);
        $shape = $shapes[array_rand($shapes)];
        $color = $colors[array_rand($colors)];
        $clarity = $clarities[array_rand($clarities)];
        $cut = $cuts[array_rand($cuts)];
        $lab = $labs[array_rand($labs)];

        // Generate product title
        $title = sprintf(
            '%.2f Carat %s Lab Grown Diamond - %s/%s',
            $carat,
            $shape,
            $color,
            $clarity
        );

        // Safety: Check if product with this title already exists
        $existing = get_posts([
            'post_type' => 'product',
            'title' => $title,
            'post_status' => 'publish',
            'numberposts' => 1,
        ]);

        if (!empty($existing)) {
            continue; // Skip if product already exists
        }

        // Create WooCommerce product
        $product = new WC_Product_Simple();
        $product->set_name($title);
        $product->set_status('publish');
        $product->set_catalog_visibility('visible');

        $price = round(mt_rand(80000, 500000) / 100, 2);
        $product->set_price($price);
        $product->set_regular_price($price);
        $product->set_stock_status('instock');
        $product->set_manage_stock(false);

        // Save product to get ID
        $product_id = $product->save();

        if ($product_id) {
            // Assign taxonomy terms
            wp_set_object_terms($product_id, $shape, 'diamond_shape');
            wp_set_object_terms($product_id, $color, 'diamond_color');
            wp_set_object_terms($product_id, $clarity, 'diamond_clarity');
            wp_set_object_terms($product_id, $cut, 'diamond_cut');
            wp_set_object_terms($product_id, $lab, 'diamond_lab');

            // Save custom meta data for sliders
            update_post_meta($product_id, '_diamond_carat', $carat);
            update_post_meta($product_id, '_diamond_depth', round(mt_rand(5800, 6300) / 100, 1));
            update_post_meta($product_id, '_diamond_table', round(mt_rand(5500, 6000) / 100, 1));
            update_post_meta($product_id, '_igi_report_number', str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT));

            $created_count++;
        }
    }

    wp_die(
        sprintf(
            '<div style="font-family: -apple-system, BlinkMacSystemFont, sans-serif; padding: 40px; text-align: center;">
                <h1 style="color: #2e7d32;">✓ Success!</h1>
                <p style="font-size: 18px;">%d Diamond products generated.</p>
                <a href="%s" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background: #2e7d32; color: white; text-decoration: none; border-radius: 4px;">View Shop</a>
                <br><br>
                <a href="%s" style="color: #666;">← Back to Dashboard</a>
            </div>',
            $created_count,
            esc_url(get_permalink(wc_get_page_id('shop'))),
            esc_url(admin_url())
        )
    );
}
