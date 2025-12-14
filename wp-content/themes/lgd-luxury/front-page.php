<?php
/**
 * Front Page Template - Luxury Homepage
 *
 * @package LGD Luxury
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <!-- SECTION A: THE HERO (STATIC) -->
        <section class="hero-section">
            <div class="hero-bg"></div>
            <div class="hero-content">
                <h1 class="hero-title">Ethical Brilliance. Lab-Perfected.</h1>
                <p class="hero-subtitle">GIA Certified. 100% Conflict Free.</p>
                <div class="hero-buttons">
                    <?php
                        $shop_link = function_exists('wc_get_page_permalink') ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' );
                        $jewelry_link = get_term_link( 'jewelry', 'product_cat' );
                        if ( is_wp_error( $jewelry_link ) ) $jewelry_link = home_url( '/product-category/jewelry/' );
                    ?>
                    <a href="<?php echo esc_url( $shop_link ); ?>" class="btn-primary">Shop Loose Diamonds</a>
                    <a href="<?php echo esc_url( $jewelry_link ); ?>" class="btn-secondary">Explore Jewelry</a>
                </div>
            </div>
        </section>

        <!-- SECTION B: THE DIAMOND HUNT WIDGET (OVERLAP) -->
        <section class="diamond-hunt">
            <div class="site-container">
                <div class="diamond-hunt-container">
                    <div class="diamond-hunt-row">
                        <div class="hunt-filter" data-filter="shape">
                            <span class="hunt-label">Shape</span>
                            <span class="hunt-value">All Shapes</span>
                        </div>
                        <div class="hunt-filter" data-filter="carat">
                            <span class="hunt-label">Carat</span>
                            <span class="hunt-value">Any</span>
                        </div>
                        <div class="hunt-filter" data-filter="color">
                            <span class="hunt-label">Color</span>
                            <span class="hunt-value">Any</span>
                        </div>
                        <div class="hunt-filter" data-filter="price">
                            <span class="hunt-label">Price</span>
                            <span class="hunt-value">Any Budget</span>
                        </div>
                        <button class="hunt-search-btn" onclick="window.location.href='<?php echo esc_url( $shop_link ); ?>'">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION C: TRUST INDICATORS -->
        <section class="trust-section">
            <div class="trust-grid">
                <div class="trust-item">
                    <div class="trust-icon">
                        <!-- Placeholder for Certified Icon -->
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( '#001f3f' ); ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="trust-title">Certified</h3>
                    <p class="trust-text">Every diamond is GIA or IGI certified</p>
                </div>
                <div class="trust-item">
                    <div class="trust-icon">
                        <!-- Placeholder for 360° Inspection Icon -->
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( '#001f3f' ); ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            <path d="M2 12h20"></path>
                        </svg>
                    </div>
                    <h3 class="trust-title">360° Inspection</h3>
                    <p class="trust-text">HD images and video of every stone</p>
                </div>
                <div class="trust-item">
                    <div class="trust-icon">
                        <!-- Placeholder for Lifetime Warranty Icon -->
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( '#001f3f' ); ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M12 14l3 3-3 3-3-3z"></path>
                        </svg>
                    </div>
                    <h3 class="trust-title">Lifetime Warranty</h3>
                    <p class="trust-text">Quality guaranteed forever</p>
                </div>
            </div>
        </section>

        <!-- SECTION D: CATEGORY MOSAIC -->
        <section class="category-mosaic">
            <div class="mosaic-grid">
                <?php
                    $rings_link = get_term_link( 'engagement-rings', 'product_cat' );
                    if ( is_wp_error( $rings_link ) ) $rings_link = home_url( '/product-category/engagement-rings/' );
                ?>
                <a href="<?php echo esc_url( $rings_link ); ?>" class="mosaic-item large">
                    <div class="mosaic-bg" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/engagement-rings.jpg');"></div>
                    <div class="mosaic-overlay">
                        <h2 class="mosaic-title">Engagement Rings</h2>
                    </div>
                </a>
                <a href="<?php echo esc_url( $jewelry_link ); ?>" class="mosaic-item">
                    <div class="mosaic-bg" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/fine-jewelry.jpg');"></div>
                    <div class="mosaic-overlay">
                        <h2 class="mosaic-title">Fine Jewelry</h2>
                    </div>
                </a>
                <a href="<?php echo esc_url( $shop_link ); ?>" class="mosaic-item">
                    <div class="mosaic-bg" style="background-image: url('<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/loose-stones.jpg');"></div>
                    <div class="mosaic-overlay">
                        <h2 class="mosaic-title">Loose Stones</h2>
                    </div>
                </a>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
