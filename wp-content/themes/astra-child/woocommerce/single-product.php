<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * @package Astra Child Diamond
 * @version 1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop'); ?>

<?php
/**
 * woocommerce_before_main_content hook.
 */
do_action('woocommerce_before_main_content');
?>

<div class="lgd-pdp-wrapper">

    <?php while (have_posts()) : ?>
        <?php the_post(); ?>

        <?php wc_get_template_part('content', 'single-product'); ?>

    <?php endwhile; // end of the loop. ?>

</div>

<?php
/**
 * woocommerce_after_main_content hook.
 */
do_action('woocommerce_after_main_content');

/**
 * woocommerce_sidebar hook.
 */
// We're not using sidebar on PDP
// do_action('woocommerce_sidebar');
?>

<?php get_footer('shop'); ?>
