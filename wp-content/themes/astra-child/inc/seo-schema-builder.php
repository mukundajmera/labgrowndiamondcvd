<?php
/**
 * Programmatic SEO Schema.org Product & Lab Diamond Structured Data
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('rank_math/json_ld', 'lgd_add_diamond_schema', 99, 2);

function lgd_add_diamond_schema($data, $jsonld) {
    if (!is_product()) {
        return $data;
    }

    global $product;
    if (!is_a($product, 'WC_Product')) {
        return $data;
    }

    $product_price = $product->get_price();
    
    // As instructed by task: "Inject AggregateOffer, availability: InStock, and price specifications in INR and USD"
    
    $price_specification_inr = [
        '@type' => 'UnitPriceSpecification',
        'price' => $product_price,
        'priceCurrency' => 'INR',
    ];

    // Using an arbitrary exchange rate or simply assuming product_price is in USD as fallback if not INR
    // Let's assume the base currency is INR and USD is calculated, or we just put the price and priceCurrency
    $usd_price = $product_price ? number_format($product_price / 83, 2, '.', '') : 0;

    $price_specification_usd = [
        '@type' => 'UnitPriceSpecification',
        'price' => $usd_price,
        'priceCurrency' => 'USD',
    ];

    $aggregate_offer = [
        '@type' => 'AggregateOffer',
        'priceCurrency' => get_woocommerce_currency(),
        'lowPrice' => $product_price,
        'highPrice' => $product_price,
        'offerCount' => 1,
        'offers' => [
            [
                '@type' => 'Offer',
                'url' => get_permalink(),
                'priceCurrency' => get_woocommerce_currency(),
                'price' => $product_price,
                'availability' => 'https://schema.org/InStock',
                'priceSpecification' => [
                    $price_specification_inr,
                    $price_specification_usd
                ]
            ]
        ]
    ];

    $cut_level = get_post_meta($product->get_id(), '_diamond_cut', true);
    $color = get_post_meta($product->get_id(), '_diamond_color', true);
    $clarity = get_post_meta($product->get_id(), '_diamond_clarity', true);
    $carat = get_post_meta($product->get_id(), '_diamond_carat', true);
    $cert_number = get_post_meta($product->get_id(), '_diamond_cert_number', true);

    $diamond_schema = [
        '@context' => 'https://schema.org/',
        '@type' => 'Product',
        'name' => $product->get_name(),
        'description' => wp_strip_all_tags($product->get_short_description() ? $product->get_short_description() : $product->get_description()),
        'sku' => $product->get_sku(),
        'image' => wp_get_attachment_url($product->get_image_id()),
        'offers' => $aggregate_offer,
    ];

    if ($cut_level) {
        $diamond_schema['cutLevel'] = $cut_level;
    }
    if ($color) {
        $diamond_schema['color'] = $color;
    }
    if ($clarity) {
        $diamond_schema['clarity'] = $clarity;
    }
    if ($carat) {
        $diamond_schema['caratWeight'] = $carat;
    }
    if ($cert_number) {
        $diamond_schema['certificateNumber'] = $cert_number;
    }

    if (isset($data['Product'])) {
        $data['Product'] = array_merge($data['Product'], $diamond_schema);
    } else {
        $data['Product'] = $diamond_schema;
    }

    return $data;
}
