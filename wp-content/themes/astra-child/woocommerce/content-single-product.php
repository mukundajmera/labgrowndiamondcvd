<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * @package Astra Child Diamond
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Get diamond specifications
$carat = get_post_meta($product->get_id(), '_diamond_carat', true);
$color = get_post_meta($product->get_id(), '_diamond_color', true);
$clarity = get_post_meta($product->get_id(), '_diamond_clarity', true);
$cut = get_post_meta($product->get_id(), '_diamond_cut', true);
$shape = get_post_meta($product->get_id(), '_diamond_shape', true);
$polish = get_post_meta($product->get_id(), '_diamond_polish', true);
$symmetry = get_post_meta($product->get_id(), '_diamond_symmetry', true);
$fluorescence = get_post_meta($product->get_id(), '_diamond_fluorescence', true);
$table = get_post_meta($product->get_id(), '_diamond_table', true);
$depth = get_post_meta($product->get_id(), '_diamond_depth', true);
$measurements = get_post_meta($product->get_id(), '_diamond_measurements', true);
$certification = get_post_meta($product->get_id(), '_diamond_certification', true);
$cert_number = get_post_meta($product->get_id(), '_diamond_cert_number', true);

?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class('lgd-pdp', $product); ?>>

    <div class="ast-container">
        
        <!-- Breadcrumbs -->
        <?php
        /**
         * Hook: woocommerce_before_single_product.
         */
        do_action('woocommerce_before_single_product');
        ?>

        <!-- Main Product Section -->
        <div class="lgd-pdp__main">
            <div class="lgd-pdp__layout">
                
                <!-- Left: Media Gallery -->
                <div class="lgd-pdp__media">
                    <?php
                    /**
                     * Hook: woocommerce_before_single_product_summary.
                     */
                    do_action('woocommerce_before_single_product_summary');
                    ?>
                    
                    <!-- 360° Viewer Placeholder -->
                    <div class="lgd-pdp__360-viewer" style="display: none;">
                        <div class="lgd-pdp__360-placeholder">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 2v20M2 12h20"></path>
                            </svg>
                            <p><?php _e('360° View Coming Soon', 'astra-child-diamond'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Right: Product Info -->
                <div class="lgd-pdp__summary summary entry-summary">
                    
                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     */
                    do_action('woocommerce_single_product_summary');
                    ?>

                    <!-- Quick 4Cs Summary -->
                    <?php if ($carat || $color || $clarity || $cut) : ?>
                    <div class="lgd-pdp__4cs-summary">
                        <?php if ($carat) : ?>
                            <div class="lgd-pdp__4cs-item">
                                <span class="lgd-pdp__4cs-label"><?php _e('Carat', 'astra-child-diamond'); ?></span>
                                <span class="lgd-pdp__4cs-value"><?php echo esc_html($carat); ?>ct</span>
                            </div>
                        <?php endif; ?>
                        <?php if ($color) : ?>
                            <div class="lgd-pdp__4cs-item">
                                <span class="lgd-pdp__4cs-label"><?php _e('Color', 'astra-child-diamond'); ?></span>
                                <span class="lgd-pdp__4cs-value"><?php echo esc_html($color); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($clarity) : ?>
                            <div class="lgd-pdp__4cs-item">
                                <span class="lgd-pdp__4cs-label"><?php _e('Clarity', 'astra-child-diamond'); ?></span>
                                <span class="lgd-pdp__4cs-value"><?php echo esc_html($clarity); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($cut) : ?>
                            <div class="lgd-pdp__4cs-item">
                                <span class="lgd-pdp__4cs-label"><?php _e('Cut', 'astra-child-diamond'); ?></span>
                                <span class="lgd-pdp__4cs-value"><?php echo esc_html(ucfirst(str_replace('-', ' ', $cut))); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($certification) : ?>
                            <div class="lgd-pdp__4cs-item">
                                <span class="lgd-pdp__4cs-label"><?php _e('Lab', 'astra-child-diamond'); ?></span>
                                <span class="lgd-pdp__4cs-value"><?php echo esc_html(strtoupper($certification)); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Book Virtual Consultation -->
                    <div class="lgd-pdp__consultation">
                        <a href="<?php echo esc_url(home_url('/book-consultation/')); ?>" class="lgd-pdp__consultation-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <?php _e('Book Virtual Consultation', 'astra-child-diamond'); ?>
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <!-- Trust & Service Blocks -->
        <div class="lgd-pdp__trust-blocks">
            <div class="lgd-trust-block">
                <div class="lgd-trust-block__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4z"/>
                    </svg>
                </div>
                <div class="lgd-trust-block__content">
                    <h4><?php _e('Free Insured Shipping', 'astra-child-diamond'); ?></h4>
                    <p><?php _e('Carbon-neutral delivery to your door', 'astra-child-diamond'); ?></p>
                </div>
            </div>
            <div class="lgd-trust-block">
                <div class="lgd-trust-block__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/>
                        <path d="M3 9V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2"/>
                    </svg>
                </div>
                <div class="lgd-trust-block__content">
                    <h4><?php _e('30-Day Returns', 'astra-child-diamond'); ?></h4>
                    <p><?php _e('Risk-free shopping guarantee', 'astra-child-diamond'); ?></p>
                </div>
            </div>
            <div class="lgd-trust-block">
                <div class="lgd-trust-block__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <div class="lgd-trust-block__content">
                    <h4><?php _e('Lifetime Warranty', 'astra-child-diamond'); ?></h4>
                    <p><?php _e('Full coverage on all products', 'astra-child-diamond'); ?></p>
                </div>
            </div>
            <div class="lgd-trust-block">
                <div class="lgd-trust-block__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                    </svg>
                </div>
                <div class="lgd-trust-block__content">
                    <h4><?php _e('Buyback/Exchange Policy', 'astra-child-diamond'); ?></h4>
                    <p><?php _e('Upgrade anytime with full credit', 'astra-child-diamond'); ?></p>
                </div>
            </div>
            <div class="lgd-trust-block">
                <div class="lgd-trust-block__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                </div>
                <div class="lgd-trust-block__content">
                    <h4><?php _e('Secure Payments', 'astra-child-diamond'); ?></h4>
                    <p><?php _e('UPI, Cards, EMI available', 'astra-child-diamond'); ?></p>
                </div>
            </div>
            <div class="lgd-trust-block">
                <div class="lgd-trust-block__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <div class="lgd-trust-block__content">
                    <h4><?php _e('Delivery ETA', 'astra-child-diamond'); ?></h4>
                    <p>
                        <input type="text" class="lgd-pincode-input" placeholder="<?php _e('Enter pincode', 'astra-child-diamond'); ?>" maxlength="6">
                        <button class="lgd-pincode-check"><?php _e('Check', 'astra-child-diamond'); ?></button>
                    </p>
                    <p class="lgd-delivery-eta" style="display: none;"></p>
                </div>
            </div>
        </div>

        <!-- Specifications & Certificate Section -->
        <div class="lgd-pdp__specs-section">
            <div class="lgd-pdp__tabs">
                <button class="lgd-pdp__tab active" data-tab="specifications">
                    <?php _e('Specifications', 'astra-child-diamond'); ?>
                </button>
                <button class="lgd-pdp__tab" data-tab="certificate">
                    <?php _e('Certificate', 'astra-child-diamond'); ?>
                </button>
                <button class="lgd-pdp__tab" data-tab="description">
                    <?php _e('Description', 'astra-child-diamond'); ?>
                </button>
            </div>

            <div class="lgd-pdp__tab-content">
                
                <!-- Specifications Tab -->
                <div class="lgd-pdp__tab-panel active" id="tab-specifications">
                    <table class="lgd-specs-table">
                        <?php if ($shape) : ?>
                        <tr>
                            <td><?php _e('Shape', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html(ucfirst($shape)); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($carat) : ?>
                        <tr>
                            <td><?php _e('Carat Weight', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($carat); ?> ct</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($color) : ?>
                        <tr>
                            <td><?php _e('Color Grade', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($color); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($clarity) : ?>
                        <tr>
                            <td><?php _e('Clarity Grade', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($clarity); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($cut) : ?>
                        <tr>
                            <td><?php _e('Cut Grade', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html(ucfirst(str_replace('-', ' ', $cut))); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($polish) : ?>
                        <tr>
                            <td><?php _e('Polish', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($polish); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($symmetry) : ?>
                        <tr>
                            <td><?php _e('Symmetry', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($symmetry); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($fluorescence) : ?>
                        <tr>
                            <td><?php _e('Fluorescence', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($fluorescence); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($table) : ?>
                        <tr>
                            <td><?php _e('Table %', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($table); ?>%</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($depth) : ?>
                        <tr>
                            <td><?php _e('Depth %', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($depth); ?>%</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($measurements) : ?>
                        <tr>
                            <td><?php _e('Measurements', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($measurements); ?> mm</td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($certification) : ?>
                        <tr>
                            <td><?php _e('Certification', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html(strtoupper($certification)); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($cert_number) : ?>
                        <tr>
                            <td><?php _e('Certificate Number', 'astra-child-diamond'); ?></td>
                            <td><?php echo esc_html($cert_number); ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>

                <!-- Certificate Tab -->
                <div class="lgd-pdp__tab-panel" id="tab-certificate">
                    <?php if ($cert_number && $certification) : ?>
                        <div class="lgd-certificate-viewer">
                            <p><?php _e('View the complete certification report for this diamond.', 'astra-child-diamond'); ?></p>
                            <p><strong><?php _e('Certificate Number:', 'astra-child-diamond'); ?></strong> <?php echo esc_html($cert_number); ?></p>
                            <a href="#" class="lgd-view-certificate-btn" target="_blank" rel="noopener">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                </svg>
                                <?php _e('View Certificate', 'astra-child-diamond'); ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <p><?php _e('Certificate information not available for this product.', 'astra-child-diamond'); ?></p>
                    <?php endif; ?>
                </div>

                <!-- Description Tab -->
                <div class="lgd-pdp__tab-panel" id="tab-description">
                    <?php the_content(); ?>
                </div>

            </div>
        </div>

        <?php
        /**
         * Hook: woocommerce_after_single_product_summary.
         */
        do_action('woocommerce_after_single_product_summary');
        ?>

    </div>

</div>

<?php do_action('woocommerce_after_single_product'); ?>
