<?php
/**
 * Diamond Media Viewer Template
 * Displays genuine 360 viewer or video when available, falling back gracefully
 */

if (!defined('ABSPATH')) {
    return;
}

global $product;
if (!$product || !is_a($product, 'WC_Product')) {
    return;
}

$product_id = $product->get_id();

// Retrieve meta data for 360 or video URLs. Support both general video_url and specific spin_url/video_url keys.
$video_url = get_post_meta($product_id, 'video_url', true);
if (empty($video_url)) {
    $video_url = get_post_meta($product_id, '_lgd_video_url', true);
}
if (empty($video_url) && function_exists('get_field')) {
    $video_url = get_field('video_url', $product_id);
}

$spin_url = get_post_meta($product_id, 'spin_url', true);
if (empty($spin_url) && function_exists('get_field')) {
    $spin_url = get_field('spin_url', $product_id);
}

$has_media = !empty($video_url) || !empty($spin_url);
?>

<div class="diamond-media-viewer-container" aria-label="<?php esc_attr_e('Diamond 360-Degree and Video Viewer', 'astra-child-diamond'); ?>">
    <?php if ($has_media): ?>
        <div class="genuine-360-viewer">
            <?php if (!empty($spin_url)): ?>
                <!-- Embed 360 Spin Viewer -->
                <iframe class="spin-iframe" src="<?php echo esc_url($spin_url); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="<?php esc_attr_e('360 Degree Diamond Viewer', 'astra-child-diamond'); ?>"></iframe>
            <?php elseif (!empty($video_url)): ?>
                <?php 
                    // Convert to embed if needed
                    $embed_url = $video_url;
                    if (function_exists('lgd_convert_to_embed_url')) {
                        $embed_url = lgd_convert_to_embed_url($video_url);
                    }
                ?>
                <iframe class="video-iframe" src="<?php echo esc_url($embed_url); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="<?php esc_attr_e('Diamond Video', 'astra-child-diamond'); ?>"></iframe>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="media-unavailable-fallback">
            <div class="fallback-content">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 2v20M2 12h20"></path>
                </svg>
                <p><?php _e('360° Media Unavailable', 'astra-child-diamond'); ?></p>
                <button class="request-media-btn" type="button" aria-haspopup="dialog" aria-expanded="false" data-product-id="<?php echo esc_attr($product_id); ?>">
                    <?php _e('Request 360° Video', 'astra-child-diamond'); ?>
                </button>
            </div>
        </div>
        
        <!-- Accessible Fallback Request Modal -->
        <div class="media-request-modal-overlay" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="media-request-modal-title">
            <div class="media-request-modal">
                <button class="media-request-close" aria-label="<?php esc_attr_e('Close modal', 'astra-child-diamond'); ?>">&times;</button>
                <h3 id="media-request-modal-title"><?php _e('Request a 360° Video', 'astra-child-diamond'); ?></h3>
                <p><?php _e('Please provide your details, and our gemologists will send you a high-resolution 360° video of this diamond.', 'astra-child-diamond'); ?></p>
                <form class="media-request-form">
                    <input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>">
                    <div class="form-group">
                        <label for="request_name"><?php _e('Name', 'astra-child-diamond'); ?> <span class="required">*</span></label>
                        <input type="text" id="request_name" name="request_name" required aria-required="true">
                    </div>
                    <div class="form-group">
                        <label for="request_email"><?php _e('Email', 'astra-child-diamond'); ?> <span class="required">*</span></label>
                        <input type="email" id="request_email" name="request_email" required aria-required="true">
                    </div>
                    <div class="form-group">
                        <label for="request_phone"><?php _e('Phone Number (Optional)', 'astra-child-diamond'); ?></label>
                        <input type="tel" id="request_phone" name="request_phone">
                    </div>
                    <button type="submit" class="submit-request-btn"><?php _e('Submit Request', 'astra-child-diamond'); ?></button>
                    <p class="form-response-message" aria-live="polite"></p>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
