<?php
/**
 * LGD Luxury Child Theme Functions
 *
 * @package LGD Luxury
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Enqueue parent and child theme styles
 */
function lgd_luxury_enqueue_styles() {
    // Enqueue parent theme stylesheet
    wp_enqueue_style( 
        'astra-parent-theme', 
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->parent()->get('Version')
    );
    
    // Enqueue child theme stylesheet
    wp_enqueue_style( 
        'lgd-luxury-theme',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'astra-parent-theme' ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'lgd_luxury_enqueue_styles', 15 );

/**
 * Add WooCommerce support
 */
function lgd_luxury_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'lgd_luxury_add_woocommerce_support' );

/**
 * Remove default Astra sidebar from all pages
 */
function lgd_luxury_remove_sidebar() {
    return 'no-sidebar';
}
add_filter( 'astra_page_layout', 'lgd_luxury_remove_sidebar' );
add_filter( 'astra_get_content_layout', 'lgd_luxury_remove_sidebar' );

/**
 * WooCommerce Customizations
 */

// Remove sorting dropdown from shop page
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Remove result count
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

/**
 * Force 3 columns on desktop, 2 on mobile for shop grid
 */
function lgd_luxury_shop_columns() {
    if ( wp_is_mobile() ) {
        return 2;
    }
    return 3;
}
add_filter( 'loop_shop_columns', 'lgd_luxury_shop_columns' );

/**
 * Move price below title in product archives
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5 );

/**
 * Change "Add to Cart" button text to "View Details" for variable products
 */
function lgd_luxury_custom_add_to_cart_text( $text, $product ) {
    if ( $product->is_type( 'variable' ) ) {
        $text = __( 'View Details', 'lgd-luxury' );
    }
    return $text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'lgd_luxury_custom_add_to_cart_text', 10, 2 );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'lgd_luxury_custom_add_to_cart_text', 10, 2 );

/**
 * Custom body classes
 */
function lgd_luxury_body_classes( $classes ) {
    $classes[] = 'lgd-luxury-theme';
    return $classes;
}
add_filter( 'body_class', 'lgd_luxury_body_classes' );
