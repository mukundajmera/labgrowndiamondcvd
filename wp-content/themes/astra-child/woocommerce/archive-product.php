<?php
/**
 * The Template for displaying product archives, including the main shop page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @package Astra Child Diamond
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 */
do_action('woocommerce_before_main_content');

?>

<div class="lgd-plp-wrapper">
    
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <header class="lgd-plp-header">
            <div class="ast-container">
                <h1 class="lgd-plp-title"><?php woocommerce_page_title(); ?></h1>
                <?php
                /**
                 * Hook: woocommerce_archive_description.
                 */
                do_action('woocommerce_archive_description');
                ?>
            </div>
        </header>
    <?php endif; ?>

    <div class="lgd-plp-container">
        <div class="ast-container">
            <div class="lgd-plp-layout">
                
                <!-- Filters Sidebar -->
                <aside class="lgd-plp-sidebar" id="lgd-plp-sidebar">
                    <div class="lgd-plp-sidebar__header">
                        <h2><?php _e('Filters', 'astra-child-diamond'); ?></h2>
                        <button class="lgd-plp-sidebar__close" id="lgd-filter-close">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    <div class="lgd-plp-sidebar__content">
                        
                        <!-- Shape Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Shape', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <?php
                                $shapes = array('round', 'princess', 'cushion', 'oval', 'emerald', 'pear', 'marquise', 'radiant', 'asscher', 'heart');
                                foreach ($shapes as $shape) :
                                ?>
                                    <label class="lgd-filter-checkbox">
                                        <input type="checkbox" name="diamond_shape[]" value="<?php echo esc_attr($shape); ?>" <?php echo (isset($_GET['shape']) && $_GET['shape'] === $shape) ? 'checked' : ''; ?>>
                                        <span><?php echo esc_html(ucfirst($shape)); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Carat Weight Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Carat Weight', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <div class="lgd-filter-range">
                                    <input type="range" id="carat-min" name="carat_min" min="0.3" max="5" step="0.1" value="0.3">
                                    <input type="range" id="carat-max" name="carat_max" min="0.3" max="5" step="0.1" value="5">
                                    <div class="lgd-filter-range__values">
                                        <span id="carat-min-value">0.3ct</span>
                                        <span id="carat-max-value">5.0ct</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Color Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Color Grade', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <?php
                                $colors = array('D', 'E', 'F', 'G', 'H', 'I', 'J', 'K');
                                foreach ($colors as $color) :
                                ?>
                                    <label class="lgd-filter-checkbox">
                                        <input type="checkbox" name="diamond_color[]" value="<?php echo esc_attr($color); ?>" <?php echo (isset($_GET['color']) && $_GET['color'] === $color) ? 'checked' : ''; ?>>
                                        <span><?php echo esc_html($color); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Clarity Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Clarity Grade', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <?php
                                $clarities = array('IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2');
                                foreach ($clarities as $clarity) :
                                ?>
                                    <label class="lgd-filter-checkbox">
                                        <input type="checkbox" name="diamond_clarity[]" value="<?php echo esc_attr($clarity); ?>" <?php echo (isset($_GET['clarity']) && $_GET['clarity'] === $clarity) ? 'checked' : ''; ?>>
                                        <span><?php echo esc_html($clarity); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Cut Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Cut Grade', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <?php
                                $cuts = array('excellent' => 'Excellent', 'very-good' => 'Very Good', 'good' => 'Good');
                                foreach ($cuts as $value => $label) :
                                ?>
                                    <label class="lgd-filter-checkbox">
                                        <input type="checkbox" name="diamond_cut[]" value="<?php echo esc_attr($value); ?>" <?php echo (isset($_GET['cut']) && $_GET['cut'] === $value) ? 'checked' : ''; ?>>
                                        <span><?php echo esc_html($label); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Lab Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Certification', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <?php
                                $labs = array('igi' => 'IGI', 'gia' => 'GIA', 'other' => 'Other');
                                foreach ($labs as $value => $label) :
                                ?>
                                    <label class="lgd-filter-checkbox">
                                        <input type="checkbox" name="diamond_lab[]" value="<?php echo esc_attr($value); ?>" <?php echo (isset($_GET['lab']) && $_GET['lab'] === $value) ? 'checked' : ''; ?>>
                                        <span><?php echo esc_html($label); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Fluorescence Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Fluorescence', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <?php
                                $fluorescences = array('none' => 'None', 'faint' => 'Faint', 'medium' => 'Medium', 'strong' => 'Strong');
                                foreach ($fluorescences as $value => $label) :
                                ?>
                                    <label class="lgd-filter-checkbox">
                                        <input type="checkbox" name="diamond_fluorescence[]" value="<?php echo esc_attr($value); ?>">
                                        <span><?php echo esc_html($label); ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Price Range Filter -->
                        <div class="lgd-filter-group">
                            <h3 class="lgd-filter-group__title"><?php _e('Price Range', 'astra-child-diamond'); ?></h3>
                            <div class="lgd-filter-group__content">
                                <div class="lgd-filter-range">
                                    <input type="range" id="price-min" name="price_min" min="0" max="1000000" step="10000" value="0">
                                    <input type="range" id="price-max" name="price_max" min="0" max="1000000" step="10000" value="1000000">
                                    <div class="lgd-filter-range__values">
                                        <span id="price-min-value">₹0</span>
                                        <span id="price-max-value">₹10,00,000</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- In Stock Filter -->
                        <div class="lgd-filter-group">
                            <label class="lgd-filter-checkbox">
                                <input type="checkbox" name="in_stock" value="1">
                                <span><?php _e('In Stock Only', 'astra-child-diamond'); ?></span>
                            </label>
                        </div>

                        <!-- Certificate Present Filter -->
                        <div class="lgd-filter-group">
                            <label class="lgd-filter-checkbox">
                                <input type="checkbox" name="has_certificate" value="1">
                                <span><?php _e('Has Certificate', 'astra-child-diamond'); ?></span>
                            </label>
                        </div>

                        <!-- Apply Filters Button -->
                        <div class="lgd-filter-actions">
                            <button type="button" class="lgd-filter-apply" id="lgd-apply-filters">
                                <?php _e('Apply Filters', 'astra-child-diamond'); ?>
                            </button>
                            <button type="button" class="lgd-filter-clear" id="lgd-clear-filters">
                                <?php _e('Clear All', 'astra-child-diamond'); ?>
                            </button>
                        </div>
                    </div>
                </aside>

                <!-- Products Grid -->
                <div class="lgd-plp-main">
                    
                    <!-- Toolbar -->
                    <div class="lgd-plp-toolbar">
                        <div class="lgd-plp-toolbar__left">
                            <button class="lgd-plp-toolbar__filter-toggle" id="lgd-filter-toggle">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="4" y1="6" x2="20" y2="6"></line>
                                    <line x1="4" y1="12" x2="20" y2="12"></line>
                                    <line x1="4" y1="18" x2="20" y2="18"></line>
                                </svg>
                                <?php _e('Filter', 'astra-child-diamond'); ?>
                            </button>
                            <?php
                            /**
                             * Hook: woocommerce_before_shop_loop.
                             */
                            do_action('woocommerce_before_shop_loop');
                            ?>
                        </div>
                        <div class="lgd-plp-toolbar__right">
                            <?php
                            /**
                             * Hook: woocommerce_before_shop_loop.
                             * This includes the ordering dropdown
                             */
                            woocommerce_catalog_ordering();
                            ?>
                        </div>
                    </div>

                    <?php
                    if (woocommerce_product_loop()) {
                        /**
                         * Hook: woocommerce_before_shop_loop.
                         */
                        do_action('woocommerce_before_shop_loop');

                        woocommerce_product_loop_start();

                        if (wc_get_loop_prop('total')) {
                            while (have_posts()) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action('woocommerce_shop_loop');

                                wc_get_template_part('content', 'product');
                            }
                        }

                        woocommerce_product_loop_end();

                        /**
                         * Hook: woocommerce_after_shop_loop.
                         */
                        do_action('woocommerce_after_shop_loop');
                    } else {
                        /**
                         * Hook: woocommerce_no_products_found.
                         */
                        do_action('woocommerce_no_products_found');
                    }
                    ?>

                </div>

            </div>
        </div>
    </div>

</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 */
// We're not using the sidebar
// do_action('woocommerce_sidebar');

get_footer('shop');
