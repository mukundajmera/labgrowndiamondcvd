<?php
/**
 * Asset Loader
 * 
 * Central configuration for image assets.
 * 
 * @package LGD_Diamond_Core
 * @since 1.6.0
 */

defined('ABSPATH') || exit;

class LGD_Assets
{
    public static function get_url($key)
    {
        // Local AI-Generated Assets
        $base_url = LGD_CORE_URL . 'assets/images/';

        $assets = [
            'hero_banner' => $base_url . 'hero_banner.png',
            'placeholder_diamond' => $base_url . 'placeholder_diamond.png',
            // Note: This is currently a single sprite sheet image. Needs CSS cropping for individual icons.
            'shape_round' => $base_url . 'shapes_set.png',
            'shape_oval' => $base_url . 'shapes_set.png',
            'trust_shield' => $base_url . 'trust_shield.png',
            'trust_ship' => $base_url . 'trust_shipping.png',
            'trust_warranty' => $base_url . 'trust_warranty.png',
        ];

        return isset($assets[$key]) ? $assets[$key] : '';
    }
}
