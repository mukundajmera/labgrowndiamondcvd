<?php
/**
 * LiteSpeed Cache Pre-Warm and High-Performance Asset Optimization Module
 * 
 * @package Astra Child Diamond
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

/**
 * 1. LiteSpeed Cache ESI (Edge Side Includes) tags for dynamic cart fragments
 */
function astra_child_esi_cart_fragments( $fragments ) {
    if ( function_exists( 'apply_filters' ) && class_exists( 'LiteSpeed\Core' ) ) {
        // Output an ESI block that will be loaded dynamically
        $fragments['div.widget_shopping_cart_content'] = '<div class="widget_shopping_cart_content">' . apply_filters( 'litespeed_esi_url', 'astra-child-cart', 'Astra Child Cart Fragment' ) . '</div>';
    }
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'astra_child_esi_cart_fragments', 99 );

function astra_child_load_esi_cart() {
    if ( function_exists( 'woocommerce_mini_cart' ) ) {
        woocommerce_mini_cart();
    }
}
add_action( 'litespeed_esi_load-astra-child-cart', 'astra_child_load_esi_cart' );

/**
 * 2. LiteSpeed Cache ESI (Edge Side Includes) tags for customer B2B tier pricing
 */
function astra_child_litespeed_esi_b2b_pricing( $price_html, $product ) {
    if ( class_exists( 'LiteSpeed\Core' ) && apply_filters('litespeed_esi_status', false) ) {
        $product_id = $product->get_id();
        $params = array( 'product_id' => $product_id );
        
        return apply_filters( 'litespeed_esi_url', 'astra-child-b2b-price', 'Astra Child B2B Price', $params );
    }
    return $price_html;
}
add_filter( 'woocommerce_get_price_html', 'astra_child_litespeed_esi_b2b_pricing', 99, 2 );

function astra_child_load_esi_b2b_price( $params ) {
    if ( isset( $params['product_id'] ) ) {
        $product = wc_get_product( $params['product_id'] );
        if ( $product ) {
            remove_filter( 'woocommerce_get_price_html', 'astra_child_litespeed_esi_b2b_pricing', 99 );
            echo $product->get_price_html();
            add_filter( 'woocommerce_get_price_html', 'astra_child_litespeed_esi_b2b_pricing', 99, 2 );
        }
    }
}
add_action( 'litespeed_esi_load-astra-child-b2b-price', 'astra_child_load_esi_b2b_price' );

/**
 * 3. DNS prefetch and preconnect hints for CDN assets and IGI certificate verifiers
 */
function astra_child_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type || 'preconnect' === $relation_type ) {
        $hints[] = 'https://www.igi.org';
        // The project docs mention CDN assets generically, so we include a generic CDN hint,
        // or a project-specific one if defined.
        $hints[] = 'https://cdn.example.com';
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'astra_child_dns_prefetch', 10, 2 );

/**
 * 4. Responsive image lazy-load filter for diamond catalog thumbnails
 */
function astra_child_lazy_load_diamond_thumbnails_attr( $attr, $attachment, $size ) {
    // Both woocommerce_thumbnail and diamond-thumbnail are used for catalog thumbnails
    if ( $size === 'woocommerce_thumbnail' || $size === 'diamond-thumbnail' ) {
        $attr['loading'] = 'lazy';
        $attr['decoding'] = 'async';
    }
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'astra_child_lazy_load_diamond_thumbnails_attr', 10, 3 );
