<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="primary" class="content-area luxury-home">
    <main id="main" class="site-main">

        <!-- IMMERSIVE HERO SECTION -->
        <section class="luxury-hero" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero/hero-bg.png');">
            <div class="luxury-hero__overlay"></div>
            
            <div class="luxury-hero__content">
                <h1 class="luxury-hero__headline">Ethical Brilliance. Lab-Perfected.</h1>
                <p class="luxury-hero__subheadline">GIA-Certified Diamonds, Minus the Mining.</p>
                <div class="luxury-hero__ctas">
                    <a href="/shop/" class="luxury-btn luxury-btn--primary">Shop Loose Diamonds</a>
                    <a href="/custom-design/" class="luxury-btn luxury-btn--secondary">Design Your Ring</a>
                </div>
            </div>
        </section>

        <!-- DIAMOND CONTROL PANEL -->
        <section class="diamond-panel">
            <div class="ast-container">
                <div class="diamond-panel__bar">
                    <div class="diamond-panel__filter" data-filter="shape">
                        <span class="diamond-panel__label">Shape</span>
                        <span class="diamond-panel__value">All Shapes</span>
                        <span class="diamond-panel__arrow">▼</span>
                    </div>
                    <div class="diamond-panel__divider"></div>
                    <div class="diamond-panel__filter" data-filter="carat">
                        <span class="diamond-panel__label">Carat</span>
                        <span class="diamond-panel__value">Any</span>
                        <span class="diamond-panel__arrow">▼</span>
                    </div>
                    <div class="diamond-panel__divider"></div>
                    <div class="diamond-panel__filter" data-filter="color">
                        <span class="diamond-panel__label">Color</span>
                        <span class="diamond-panel__value">Any</span>
                        <span class="diamond-panel__arrow">▼</span>
                    </div>
                    <div class="diamond-panel__divider"></div>
                    <div class="diamond-panel__filter" data-filter="clarity">
                        <span class="diamond-panel__label">Clarity</span>
                        <span class="diamond-panel__value">Any</span>
                        <span class="diamond-panel__arrow">▼</span>
                    </div>
                    <div class="diamond-panel__divider"></div>
                    <div class="diamond-panel__filter" data-filter="price">
                        <span class="diamond-panel__label">Price</span>
                        <span class="diamond-panel__value">Any Budget</span>
                        <span class="diamond-panel__arrow">▼</span>
                    </div>
                    <a href="/shop/" class="diamond-panel__search-btn">Search Diamonds</a>
                </div>
                <button class="diamond-panel__mobile-toggle">Search Diamonds</button>
            </div>
        </section>

        <!-- TRUST TRIUMVIRATE -->
        <section class="trust-triumvirate">
            <div class="ast-container">
                <div class="trust-triumvirate__grid">
                    <div class="trust-triumvirate__item">
                        <div class="trust-triumvirate__icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <h3 class="trust-triumvirate__title">IGI & GIA CERTIFIED</h3>
                    </div>
                    <div class="trust-triumvirate__item">
                        <div class="trust-triumvirate__icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                        <h3 class="trust-triumvirate__title">360° INSPECTION</h3>
                    </div>
                    <div class="trust-triumvirate__item">
                        <div class="trust-triumvirate__icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"></path>
                                <path d="M12 11.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
                                <path d="M7 13.5c.83.61 2.35 1.5 5 1.5s4.17-.89 5-1.5"></path>
                            </svg>
                        </div>
                        <h3 class="trust-triumvirate__title">100% CONFLICT FREE</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- B2B / B2C HYBRID SPLIT -->
        <section class="hybrid-split">
            <div class="hybrid-split__container">
                <div class="hybrid-split__panel hybrid-split__panel--b2b">
                    <div class="hybrid-split__content">
                        <h2 class="hybrid-split__heading">For Jewelers & Wholesalers</h2>
                        <p class="hybrid-split__text">Access bulk pricing and live API inventory.</p>
                        <a href="/trade-program/" class="luxury-btn luxury-btn--light">Join Trade Program</a>
                    </div>
                </div>
                <div class="hybrid-split__panel hybrid-split__panel--b2c">
                    <div class="hybrid-split__content">
                        <h2 class="hybrid-split__heading">For Couples</h2>
                        <p class="hybrid-split__text">Craft the perfect symbol of your love.</p>
                        <a href="/custom-design/" class="luxury-btn luxury-btn--dark">Start Customizing</a>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>