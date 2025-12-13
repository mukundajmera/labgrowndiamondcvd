<?php
/**
 * LGD-Luxury - WooCommerce Single Product Customizations
 * Add this to your theme's functions.php or create as a separate file and include it
 * 
 * @package LGD-Luxury
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/* ==========================================================================
   PHASE 1: 360° Video Viewer
   ========================================================================== */

/**
 * Register custom field for video URL
 */
function lgd_add_video_url_field()
{
    woocommerce_wp_text_input(array(
        'id' => '_lgd_video_url',
        'label' => __('360° Video URL', 'lgd-luxury'),
        'placeholder' => 'https://www.youtube.com/embed/...',
        'desc_tip' => true,
        'description' => __('Enter a YouTube, Vimeo, or direct video URL for the 360° product viewer.', 'lgd-luxury'),
    ));
}
add_action('woocommerce_product_options_general_product_data', 'lgd_add_video_url_field');

/**
 * Save custom video URL field
 */
function lgd_save_video_url_field($post_id)
{
    $video_url = isset($_POST['_lgd_video_url']) ? esc_url_raw($_POST['_lgd_video_url']) : '';
    update_post_meta($post_id, '_lgd_video_url', $video_url);
}
add_action('woocommerce_process_product_meta', 'lgd_save_video_url_field');

/**
 * Display 360° video viewer before product summary
 */
function lgd_display_360_video_viewer()
{
    global $product;

    $video_url = get_post_meta($product->get_id(), '_lgd_video_url', true);

    if (empty($video_url)) {
        return; // Do nothing if no video URL
    }

    // Convert YouTube/Vimeo URLs to embed format
    $embed_url = lgd_convert_to_embed_url($video_url);
    ?>
    <div class="lgd-360-viewer">
        <div class="lgd-360-viewer-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M12 4C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z" />
            </svg>
            <?php _e('360° View', 'lgd-luxury'); ?>
        </div>
        <div class="lgd-360-viewer-container">
            <iframe src="<?php echo esc_url($embed_url); ?>" width="100%" height="450" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>
    <?php
}
add_action('woocommerce_before_single_product_summary', 'lgd_display_360_video_viewer', 5);

/**
 * Convert video URLs to embeddable format
 */
function lgd_convert_to_embed_url($url)
{
    // YouTube
    if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }
    if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }

    // Vimeo
    if (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
        return 'https://player.vimeo.com/video/' . $matches[1];
    }

    // Already an embed URL or direct video
    return $url;
}

/* ==========================================================================
   PHASE 4: Drop a Hint Button
   ========================================================================== */

/**
 * Add "Drop a Hint" button after Add to Cart
 */
function lgd_add_drop_a_hint_button()
{
    global $product;

    $product_name = $product->get_name();
    $product_url = get_permalink($product->get_id());

    // Prepare mailto link
    $subject = rawurlencode('Check out this diamond: ' . $product_name);
    $body = rawurlencode("I found this beautiful diamond and thought you'd love it!\n\n" . $product_name . "\n\nView it here: " . $product_url);
    $mailto = 'mailto:?subject=' . $subject . '&body=' . $body;
    ?>
    <a href="<?php echo esc_url($mailto); ?>" class="button btn-drop-hint">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"
            style="margin-right: 6px; vertical-align: middle;">
            <path
                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
        <?php _e('Drop a Hint', 'lgd-luxury'); ?>
    </a>
    <?php
}
add_action('woocommerce_after_add_to_cart_button', 'lgd_add_drop_a_hint_button', 10);

/* ==========================================================================
   Inline Styles for Components
   ========================================================================== */

/**
 * Add inline CSS for custom components
 */
function lgd_product_page_styles()
{
    if (!is_product()) {
        return;
    }
    ?>
    <style>
        /* 360° Video Viewer */
        .lgd-360-viewer {
            margin-bottom: 20px;
            position: relative;
        }

        .lgd-360-viewer-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--navy, #001f3f);
            color: #fff;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 10px;
        }

        .lgd-360-viewer-container {
            width: 100%;
            background: #f5f5f5;
            border: 1px solid #e5e4e2;
        }

        .lgd-360-viewer-container iframe {
            display: block;
            width: 100%;
        }

        /* Drop a Hint Button - Secondary Style */
        .btn-drop-hint {
            background-color: #fff !important;
            color: var(--navy, #001f3f) !important;
            border: 2px solid var(--navy, #001f3f) !important;
            border-radius: 2px !important;
            margin-left: 10px;
            display: inline-flex !important;
            align-items: center;
            transition: all 0.3s ease;
        }

        .btn-drop-hint:hover {
            background-color: var(--navy, #001f3f) !important;
            color: #fff !important;
        }

        .btn-drop-hint svg {
            fill: currentColor;
        }

        /* ==========================================================================
           Compare Checkbox - Gold Toggle Switch
           ========================================================================== */
        .compare-checkbox-label,
        .woocommerce-compare-label,
        .yith-wcwl-add-to-wishlist .compare,
        [class*="compare"] label {
            position: relative;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }

        /* Hide the default checkbox */
        .compare-checkbox,
        input[type="checkbox"].compare,
        input[type="checkbox"][name*="compare"],
        .woocommerce-compare-checkbox {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* Create the toggle track */
        .compare-checkbox+span::before,
        .compare-checkbox-label input+span::before,
        input[type="checkbox"].compare+span::before,
        input[type="checkbox"][name*="compare"]+span::before {
            content: '';
            display: inline-block;
            width: 44px;
            height: 24px;
            background-color: #e5e4e2;
            /* Platinum */
            border-radius: 12px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
            position: relative;
            vertical-align: middle;
        }

        /* Create the toggle knob */
        .compare-checkbox+span::after,
        .compare-checkbox-label input+span::after,
        input[type="checkbox"].compare+span::after,
        input[type="checkbox"][name*="compare"]+span::after {
            content: '';
            position: absolute;
            left: 2px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: left 0.3s ease, background-color 0.3s ease;
        }

        /* Checked state - Gold toggle */
        .compare-checkbox:checked+span::before,
        .compare-checkbox-label input:checked+span::before,
        input[type="checkbox"].compare:checked+span::before,
        input[type="checkbox"][name*="compare"]:checked+span::before {
            background-color: var(--gold, #D4AF37);
        }

        .compare-checkbox:checked+span::after,
        .compare-checkbox-label input:checked+span::after,
        input[type="checkbox"].compare:checked+span::after,
        input[type="checkbox"][name*="compare"]:checked+span::after {
            left: 22px;
            background-color: #fff;
        }

        /* Focus state for accessibility */
        .compare-checkbox:focus+span::before,
        input[type="checkbox"].compare:focus+span::before,
        input[type="checkbox"][name*="compare"]:focus+span::before {
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.3);
        }

        /* Label text styling */
        .compare-checkbox+span,
        .compare-checkbox-label span,
        input[type="checkbox"].compare+span,
        input[type="checkbox"][name*="compare"]+span {
            font-family: var(--font-body, 'Montserrat', sans-serif);
            font-size: 13px;
            font-weight: 500;
            color: var(--charcoal, #333);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    </style>
    <?php
}
add_action('wp_head', 'lgd_product_page_styles');
