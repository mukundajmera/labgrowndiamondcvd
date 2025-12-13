<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * @package Astra Child Diamond
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

// Get diamond specifications
$carat = get_post_meta($product->get_id(), '_diamond_carat', true);
$color = get_post_meta($product->get_id(), '_diamond_color', true);
$clarity = get_post_meta($product->get_id(), '_diamond_clarity', true);
$cut = get_post_meta($product->get_id(), '_diamond_cut', true);
$shape = get_post_meta($product->get_id(), '_diamond_shape', true);
$certification = get_post_meta($product->get_id(), '_diamond_certification', true);

?>
<li <?php wc_product_class('lgd-product-card', $product); ?>>
    <div class="lgd-product-card__inner">
        
        <?php
        /**
         * Badges
         */
        ?>
        <div class="lgd-product-card__badges">
            <?php if ($product->is_on_sale()) : ?>
                <span class="lgd-badge lgd-badge--sale"><?php _e('Sale', 'astra-child-diamond'); ?></span>
            <?php endif; ?>
            
            <?php if (!$product->is_in_stock()) : ?>
                <span class="lgd-badge lgd-badge--out-of-stock"><?php _e('Out of Stock', 'astra-child-diamond'); ?></span>
            <?php endif; ?>
            
            <?php if ($product->is_featured()) : ?>
                <span class="lgd-badge lgd-badge--featured"><?php _e('Best Seller', 'astra-child-diamond'); ?></span>
            <?php endif; ?>
            
            <?php if ($cut === 'excellent') : ?>
                <span class="lgd-badge lgd-badge--excellent"><?php _e('Excellent Cut', 'astra-child-diamond'); ?></span>
            <?php endif; ?>
            
            <?php if ($certification === 'gia') : ?>
                <span class="lgd-badge lgd-badge--gia">GIA</span>
            <?php elseif ($certification === 'igi') : ?>
                <span class="lgd-badge lgd-badge--igi">IGI</span>
            <?php endif; ?>
        </div>

        <?php
        /**
         * Image
         */
        ?>
        <div class="lgd-product-card__image">
            <a href="<?php echo esc_url($product->get_permalink()); ?>">
                <?php echo $product->get_image('woocommerce_thumbnail'); ?>
            </a>
            
            <!-- Quick View Button -->
            <button class="lgd-product-card__quick-view" data-product-id="<?php echo esc_attr($product->get_id()); ?>" aria-label="<?php _e('Quick View', 'astra-child-diamond'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
                <?php _e('Quick View', 'astra-child-diamond'); ?>
            </button>
            
            <!-- Compare Checkbox -->
            <label class="lgd-product-card__compare" aria-label="<?php _e('Add to Compare', 'astra-child-diamond'); ?>">
                <input type="checkbox" class="compare-checkbox" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
                <span class="lgd-product-card__compare-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h5v2h2V1h-2v2zm0 15H5l5-6v6zm9-15h-5v2h5v13l-5-6v9h5c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                    </svg>
                </span>
            </label>
        </div>

        <?php
        /**
         * Content
         */
        ?>
        <div class="lgd-product-card__content">
            
            <?php
            /**
             * Diamond Specs
             */
            if ($carat || $color || $clarity || $cut) :
            ?>
            <div class="lgd-product-card__specs">
                <?php if ($shape) : ?>
                    <span class="lgd-product-card__spec"><?php echo esc_html(ucfirst($shape)); ?></span>
                <?php endif; ?>
                <?php if ($carat) : ?>
                    <span class="lgd-product-card__spec"><?php echo esc_html($carat); ?>ct</span>
                <?php endif; ?>
                <?php if ($color) : ?>
                    <span class="lgd-product-card__spec"><?php echo esc_html($color); ?></span>
                <?php endif; ?>
                <?php if ($clarity) : ?>
                    <span class="lgd-product-card__spec"><?php echo esc_html($clarity); ?></span>
                <?php endif; ?>
                <?php if ($cut) : ?>
                    <span class="lgd-product-card__spec"><?php echo esc_html(ucfirst(str_replace('-', ' ', $cut))); ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php
            /**
             * Title
             */
            ?>
            <h2 class="lgd-product-card__title">
                <a href="<?php echo esc_url($product->get_permalink()); ?>">
                    <?php echo esc_html($product->get_name()); ?>
                </a>
            </h2>

            <?php
            /**
             * Price
             */
            ?>
            <div class="lgd-product-card__price">
                <?php echo $product->get_price_html(); ?>
            </div>

            <?php
            /**
             * Rating
             */
            if ($product->get_average_rating() > 0) :
            ?>
            <div class="lgd-product-card__rating">
                <?php woocommerce_template_loop_rating(); ?>
            </div>
            <?php endif; ?>

            <?php
            /**
             * Add to Cart Button
             */
            ?>
            <div class="lgd-product-card__actions">
                <?php woocommerce_template_loop_add_to_cart(); ?>
            </div>

        </div>

    </div>
</li>
