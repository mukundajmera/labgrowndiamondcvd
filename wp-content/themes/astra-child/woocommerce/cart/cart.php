<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * @package Astra Child Diamond
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="lgd-cart-wrapper">
    <div class="ast-container">
        
        <h1 class="lgd-cart-title"><?php _e('Shopping Cart', 'astra-child-diamond'); ?></h1>

        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <div class="lgd-cart-layout">
                
                <!-- Cart Items -->
                <div class="lgd-cart-items">
                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-name" colspan="2"><?php _e('Product', 'astra-child-diamond'); ?></th>
                                <th class="product-price"><?php _e('Price', 'astra-child-diamond'); ?></th>
                                <th class="product-quantity"><?php _e('Quantity', 'astra-child-diamond'); ?></th>
                                <th class="product-subtotal"><?php _e('Subtotal', 'astra-child-diamond'); ?></th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do_action('woocommerce_before_cart_contents'); ?>

                            <?php
                            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                                    ?>
                                    <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                                        <td class="product-thumbnail">
                                            <?php
                                            $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                            if (!$product_permalink) {
                                                echo $thumbnail;
                                            } else {
                                                printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                            }
                                            ?>
                                        </td>

                                        <td class="product-name" data-title="<?php esc_attr_e('Product', 'astra-child-diamond'); ?>">
                                            <?php
                                            if (!$product_permalink) {
                                                echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                            } else {
                                                echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                            }
                                            do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);
                                            echo wc_get_formatted_cart_item_data($cart_item);
                                            if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                                echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'astra-child-diamond') . '</p>', $product_id));
                                            }
                                            ?>
                                        </td>

                                        <td class="product-price" data-title="<?php esc_attr_e('Price', 'astra-child-diamond'); ?>">
                                            <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                                        </td>

                                        <td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'astra-child-diamond'); ?>">
                                            <?php
                                            if ($_product->is_sold_individually()) {
                                                $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                            } else {
                                                $product_quantity = woocommerce_quantity_input(
                                                    array(
                                                        'input_name' => "cart[{$cart_item_key}][qty]",
                                                        'input_value' => $cart_item['quantity'],
                                                        'max_value' => $_product->get_max_purchase_quantity(),
                                                        'min_value' => '0',
                                                        'product_name' => $_product->get_name(),
                                                    ),
                                                    $_product,
                                                    false
                                                );
                                            }
                                            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                            ?>
                                        </td>

                                        <td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'astra-child-diamond'); ?>">
                                            <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?>
                                        </td>

                                        <td class="product-remove">
                                            <?php
                                            echo apply_filters(
                                                'woocommerce_cart_item_remove_link',
                                                sprintf(
                                                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                    esc_html__('Remove this item', 'astra-child-diamond'),
                                                    esc_attr($product_id),
                                                    esc_attr($_product->get_sku())
                                                ),
                                                $cart_item_key
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                            <?php do_action('woocommerce_cart_contents'); ?>

                            <tr>
                                <td colspan="6" class="actions">
                                    <?php if (wc_coupons_enabled()) { ?>
                                        <div class="coupon">
                                            <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'astra-child-diamond'); ?>" />
                                            <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'astra-child-diamond'); ?>"><?php esc_attr_e('Apply', 'astra-child-diamond'); ?></button>
                                        </div>
                                    <?php } ?>

                                    <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'astra-child-diamond'); ?>"><?php esc_html_e('Update', 'astra-child-diamond'); ?></button>

                                    <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                                </td>
                            </tr>

                            <?php do_action('woocommerce_after_cart_contents'); ?>
                        </tbody>
                    </table>
                    <?php do_action('woocommerce_after_cart_table'); ?>
                </div>

                <!-- Cart Sidebar -->
                <div class="lgd-cart-sidebar">
                    <div class="cart-collaterals">
                        <?php do_action('woocommerce_cart_collaterals'); ?>
                    </div>

                    <div class="lgd-cart-trust">
                        <h3><?php _e('Why Shop With Us', 'astra-child-diamond'); ?></h3>
                        <div class="lgd-cart-trust__items">
                            <div class="lgd-cart-trust__item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/><path d="M9 12l2 2 4-4"/>
                                </svg>
                                <span><?php _e('Certified Diamonds', 'astra-child-diamond'); ?></span>
                            </div>
                            <div class="lgd-cart-trust__item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z"/><path d="M3 9V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2"/>
                                </svg>
                                <span><?php _e('30-Day Returns', 'astra-child-diamond'); ?></span>
                            </div>
                            <div class="lgd-cart-trust__item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                                </svg>
                                <span><?php _e('Lifetime Warranty', 'astra-child-diamond'); ?></span>
                            </div>
                            <div class="lgd-cart-trust__item">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span><?php _e('Free Shipping', 'astra-child-diamond'); ?></span>
                            </div>
                        </div>
                        <div class="lgd-cart-support">
                            <p><strong><?php _e('Need Help?', 'astra-child-diamond'); ?></strong></p>
                            <p><?php echo esc_html(get_theme_mod('contact_phone', '+91 XXXXX XXXXX')); ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

<?php do_action('woocommerce_after_cart'); ?>
