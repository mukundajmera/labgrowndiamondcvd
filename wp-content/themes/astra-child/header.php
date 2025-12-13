<?php
/**
 * The Header for our theme.
 * 
 * Displays the global navigation and header elements
 *
 * @package Astra Child Diamond
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    
    <!-- Global Header -->
    <header id="masthead" class="site-header lgd-header" role="banner">
        <div class="lgd-header__top-bar">
            <div class="ast-container">
                <div class="lgd-header__top-content">
                    <div class="lgd-header__announcements">
                        <span><?php echo esc_html(get_theme_mod('header_announcement', 'Free Shipping on Orders Above ₹50,000 | IGI/GIA Certified')); ?></span>
                    </div>
                    <div class="lgd-header__top-links">
                        <a href="<?php echo esc_url(home_url('/trade-program/')); ?>" class="lgd-header__top-link">
                            <?php _e('For Jewellers', 'astra-child-diamond'); ?>
                        </a>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="lgd-header__top-link">
                            <?php _e('Contact', 'astra-child-diamond'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="lgd-header__main">
            <div class="ast-container">
                <div class="lgd-header__wrapper">
                    
                    <!-- Logo -->
                    <div class="lgd-header__logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="lgd-header__logo-text">
                                <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                            </a>
                            <?php
                        }
                        ?>
                    </div>

                    <!-- Main Navigation -->
                    <nav class="lgd-header__nav" role="navigation" aria-label="Main Navigation">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_class' => 'lgd-nav-menu',
                            'container' => false,
                            'fallback_cb' => 'lgd_default_menu',
                        ));
                        ?>
                    </nav>

                    <!-- Utility Icons -->
                    <div class="lgd-header__utilities">
                        <button class="lgd-header__utility-btn lgd-header__search-toggle" aria-label="<?php _e('Search', 'astra-child-diamond'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                        </button>

                        <a href="<?php echo esc_url(home_url('/compare/')); ?>" class="lgd-header__utility-btn" aria-label="<?php _e('Compare', 'astra-child-diamond'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M10 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h5v2h2V1h-2v2zm0 15H5l5-6v6zm9-15h-5v2h5v13l-5-6v9h5c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                            </svg>
                            <span class="lgd-header__utility-count" id="compare-count" style="display:none;">0</span>
                        </a>

                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')); ?>" class="lgd-header__utility-btn" aria-label="<?php _e('Account', 'astra-child-diamond'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </a>

                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="lgd-header__utility-btn lgd-header__cart" aria-label="<?php _e('Cart', 'astra-child-diamond'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <?php if (function_exists('WC') && WC()->cart && WC()->cart->get_cart_contents_count() > 0) : ?>
                                <span class="lgd-header__cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            <?php endif; ?>
                        </a>

                        <button class="lgd-header__mobile-toggle" aria-label="<?php _e('Menu', 'astra-child-diamond'); ?>">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Mega Menu Dropdown (Hidden by default) -->
        <div class="lgd-mega-menu" id="lgd-mega-menu" style="display: none;">
            <div class="ast-container">
                <div class="lgd-mega-menu__content">
                    <!-- Content will be populated by JavaScript based on hover -->
                </div>
            </div>
        </div>

    </header>

    <!-- Mobile Drawer Navigation -->
    <div class="lgd-mobile-drawer" id="lgd-mobile-drawer">
        <div class="lgd-mobile-drawer__overlay"></div>
        <div class="lgd-mobile-drawer__content">
            <div class="lgd-mobile-drawer__header">
                <h2><?php _e('Menu', 'astra-child-diamond'); ?></h2>
                <button class="lgd-mobile-drawer__close" aria-label="<?php _e('Close Menu', 'astra-child-diamond'); ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <nav class="lgd-mobile-drawer__nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'mobile-menu',
                    'menu_class' => 'lgd-mobile-nav',
                    'container' => false,
                    'fallback_cb' => 'lgd_default_mobile_menu',
                ));
                ?>
            </nav>
        </div>
    </div>

    <!-- Search Overlay -->
    <div class="lgd-search-overlay" id="lgd-search-overlay">
        <div class="lgd-search-overlay__close" aria-label="<?php _e('Close Search', 'astra-child-diamond'); ?>">×</div>
        <div class="lgd-search-overlay__content">
            <form role="search" method="get" class="lgd-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" class="lgd-search-input" placeholder="<?php _e('Search diamonds, rings, jewelry...', 'astra-child-diamond'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <input type="hidden" name="post_type" value="product" />
                <button type="submit" class="lgd-search-submit">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
            </form>
            <div class="lgd-search-suggestions">
                <div class="lgd-search-suggestions__section">
                    <h3><?php _e('Popular Searches', 'astra-child-diamond'); ?></h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/shop/?shape=round')); ?>"><?php _e('Round Diamonds', 'astra-child-diamond'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/shop/?shape=princess')); ?>"><?php _e('Princess Cut', 'astra-child-diamond'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/engagement-rings/')); ?>"><?php _e('1 Carat Solitaire Ring', 'astra-child-diamond'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/shop/?carat=1-2')); ?>"><?php _e('1-2 Carat Diamonds', 'astra-child-diamond'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php
/**
 * Fallback menu if primary menu is not set
 */
function lgd_default_menu()
{
    ?>
    <ul class="lgd-nav-menu">
        <li class="menu-item menu-item-has-children">
            <a href="<?php echo esc_url(home_url('/shop/')); ?>"><?php _e('Loose Diamonds', 'astra-child-diamond'); ?></a>
        </li>
        <li class="menu-item menu-item-has-children">
            <a href="<?php echo esc_url(home_url('/engagement-rings/')); ?>"><?php _e('Engagement Rings', 'astra-child-diamond'); ?></a>
        </li>
        <li class="menu-item menu-item-has-children">
            <a href="<?php echo esc_url(home_url('/jewellery/')); ?>"><?php _e('Jewellery', 'astra-child-diamond'); ?></a>
        </li>
        <li class="menu-item">
            <a href="<?php echo esc_url(home_url('/design-your-ring/')); ?>"><?php _e('Design Your Ring', 'astra-child-diamond'); ?></a>
        </li>
        <li class="menu-item menu-item-has-children">
            <a href="<?php echo esc_url(home_url('/education/')); ?>"><?php _e('Education', 'astra-child-diamond'); ?></a>
        </li>
        <li class="menu-item">
            <a href="<?php echo esc_url(home_url('/about/')); ?>"><?php _e('About', 'astra-child-diamond'); ?></a>
        </li>
        <li class="menu-item menu-item-has-children">
            <a href="<?php echo esc_url(home_url('/trade-program/')); ?>"><?php _e('Trade / For Jewellers', 'astra-child-diamond'); ?></a>
        </li>
        <li class="menu-item">
            <a href="<?php echo esc_url(home_url('/support/')); ?>"><?php _e('Support', 'astra-child-diamond'); ?></a>
        </li>
    </ul>
    <?php
}

/**
 * Fallback mobile menu
 */
function lgd_default_mobile_menu()
{
    lgd_default_menu();
}
