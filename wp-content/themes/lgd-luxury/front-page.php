<?php
/**
 * Template Name: LGD-Luxury Homepage
 * 
 * Custom homepage template for Lab Grown Diamond CVD
 * Minimalist luxury, high trust, mobile-first design
 * 
 * @package LGD-Luxury
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main" class="lgd-homepage" role="main">

    <!-- ========================================================================
         SECTION A: Hero - Immersive Video Background
         ======================================================================== -->
    <section id="hero-section" class="lgd-hero">
        <!-- Video Background -->
        <div class="lgd-hero__video-wrapper">
            <video class="lgd-hero__video" autoplay muted loop playsinline
                poster="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/hero-poster.jpg'); ?>">
                <source
                    src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/videos/hero-diamonds.mp4'); ?>"
                    type="video/mp4">
            </video>
            <div class="lgd-hero__overlay"></div>
        </div>

        <!-- Content Overlay -->
        <div class="lgd-hero__content">
            <div class="container">
                <h1 class="lgd-hero__headline">Ethical Brilliance, Lab-Perfected.</h1>
                <p class="lgd-hero__subheadline">Discover GIA-certified lab-grown diamonds and conscious luxury jewelry.
                </p>

                <div class="lgd-hero__ctas">
                    <a href="<?php echo esc_url(home_url('/shop/?swoof=1&pa_shape=round')); ?>"
                        class="btn btn-primary lgd-btn--hero">
                        Shop Loose Diamonds
                    </a>
                    <a href="<?php echo esc_url(home_url('/product-category/jewelry/')); ?>"
                        class="btn btn-outline-white lgd-btn--hero">
                        Explore Fine Jewelry
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         SECTION B: Diamond Discovery Bar
         ======================================================================== -->
    <section id="diamond-discovery" class="lgd-discovery">
        <div class="container">
            <div class="lgd-discovery__bar">
                <div class="lgd-discovery__item" data-filter="shape">
                    <span class="lgd-discovery__label">Shape</span>
                    <span class="lgd-discovery__value">All</span>
                    <svg class="lgd-discovery__arrow" width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </div>
                <div class="lgd-discovery__divider"></div>

                <div class="lgd-discovery__item" data-filter="carat">
                    <span class="lgd-discovery__label">Carat</span>
                    <span class="lgd-discovery__value">0.5 - 3.0</span>
                    <svg class="lgd-discovery__arrow" width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </div>
                <div class="lgd-discovery__divider"></div>

                <div class="lgd-discovery__item" data-filter="color">
                    <span class="lgd-discovery__label">Color</span>
                    <span class="lgd-discovery__value">D - G</span>
                    <svg class="lgd-discovery__arrow" width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </div>
                <div class="lgd-discovery__divider"></div>

                <div class="lgd-discovery__item" data-filter="clarity">
                    <span class="lgd-discovery__label">Clarity</span>
                    <span class="lgd-discovery__value">VVS - VS</span>
                    <svg class="lgd-discovery__arrow" width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </div>
                <div class="lgd-discovery__divider"></div>

                <div class="lgd-discovery__item" data-filter="cut">
                    <span class="lgd-discovery__label">Cut</span>
                    <span class="lgd-discovery__value">Excellent</span>
                    <svg class="lgd-discovery__arrow" width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 10l5 5 5-5z" />
                    </svg>
                </div>

                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="lgd-discovery__search-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                    </svg>
                    Search
                </a>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         SECTION C: Trust Triumvirate
         ======================================================================== -->
    <section id="trust-section" class="lgd-trust">
        <div class="container">
            <div class="row">
                <!-- Trust Item 1 -->
                <div class="col-md-4">
                    <div class="lgd-trust__item">
                        <div class="lgd-trust__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <h3 class="lgd-trust__title">IGI & GIA Certified</h3>
                        <p class="lgd-trust__text">Every diamond comes with an official certification from the world's
                            most trusted gemological institutes.</p>
                    </div>
                </div>

                <!-- Trust Item 2 -->
                <div class="col-md-4">
                    <div class="lgd-trust__item">
                        <div class="lgd-trust__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="lgd-trust__title">Lifetime Warranty</h3>
                        <p class="lgd-trust__text">Our commitment to quality extends forever. Enjoy complimentary
                            cleaning, inspections, and repairs for life.</p>
                    </div>
                </div>

                <!-- Trust Item 3 -->
                <div class="col-md-4">
                    <div class="lgd-trust__item">
                        <div class="lgd-trust__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                        </div>
                        <h3 class="lgd-trust__title">30-Day Returns</h3>
                        <p class="lgd-trust__text">Not completely in love? Return your purchase within 30 days for a
                            full refund, no questions asked.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         SECTION D: Visual Category Navigation (2-Col Mosaic)
         ======================================================================== -->
    <section id="category-mosaic" class="lgd-mosaic">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <!-- Left Banner -->
                <div class="col-lg-6">
                    <a href="<?php echo esc_url(home_url('/custom-jewelry-builder/')); ?>"
                        class="lgd-mosaic__banner lgd-mosaic__banner--ring">
                        <div class="lgd-mosaic__image"
                            style="background-image: url('https://via.placeholder.com/800x600/001f3f/ffffff?text=Engagement+Ring');">
                        </div>
                        <div class="lgd-mosaic__overlay"></div>
                        <div class="lgd-mosaic__content">
                            <span class="lgd-mosaic__eyebrow">Build Your Dream</span>
                            <h2 class="lgd-mosaic__title">Create Your Ring</h2>
                            <span class="lgd-mosaic__cta">Start Designing →</span>
                        </div>
                    </a>
                </div>

                <!-- Right Banner -->
                <div class="col-lg-6">
                    <a href="<?php echo esc_url(home_url('/product-category/jewelry/')); ?>"
                        class="lgd-mosaic__banner lgd-mosaic__banner--jewelry">
                        <div class="lgd-mosaic__image"
                            style="background-image: url('https://via.placeholder.com/800x600/0047AB/ffffff?text=Fine+Jewelry');">
                        </div>
                        <div class="lgd-mosaic__overlay"></div>
                        <div class="lgd-mosaic__content">
                            <span class="lgd-mosaic__eyebrow">Curated Collections</span>
                            <h2 class="lgd-mosaic__title">Fine Jewelry</h2>
                            <span class="lgd-mosaic__cta">Explore Now →</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         SECTION E: Educational Hook (Why Lab-Grown?)
         ======================================================================== -->
    <section id="why-lab-grown" class="lgd-education">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Side -->
                <div class="col-lg-6 lgd-education__text">
                    <span class="lgd-education__eyebrow">The Conscious Choice</span>
                    <h2 class="lgd-education__title">Why Lab-Grown?</h2>
                    <p class="lgd-education__description">
                        Lab-grown diamonds are chemically, physically, and optically identical to mined diamonds.
                        Created using cutting-edge technology that replicates Earth's natural diamond-growing process,
                        they offer the same fire, brilliance, and durability—with a significantly smaller environmental
                        footprint.
                    </p>
                    <p class="lgd-education__description">
                        Choose brilliance that aligns with your values. No mining. No conflict. Just pure, eternal
                        beauty.
                    </p>
                    <a href="<?php echo esc_url(home_url('/education/')); ?>" class="lgd-education__link">
                        Learn More About Our Diamonds
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                        </svg>
                    </a>
                </div>

                <!-- Image Side -->
                <div class="col-lg-6 lgd-education__image-col">
                    <div class="lgd-education__image-wrapper">
                        <img src="https://via.placeholder.com/600x500/E5E4E2/333333?text=Lab+Diamond+Process"
                            alt="Lab-grown diamond creation process" class="lgd-education__image">
                        <div class="lgd-education__accent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================================
         SECTION F: Instagram Feed Placeholder
         ======================================================================== -->
    <section id="instagram-section" class="lgd-instagram">
        <div class="container">
            <div class="lgd-instagram__header">
                <span class="lgd-instagram__eyebrow">Join Our Community</span>
                <h2 class="lgd-instagram__title">Follow Us @LabGrownCVD</h2>
            </div>
        </div>

        <div class="lgd-instagram__feed-wrapper">
            <div id="insta-feed-placeholder" class="lgd-instagram__feed">
                <!-- Instagram feed plugin will inject content here -->
                <!-- Placeholder grid for now -->
                <?php for ($i = 1; $i <= 6; $i++): ?>
                    <div class="lgd-instagram__item">
                        <div class="lgd-instagram__placeholder"
                            style="background-image: url('https://via.placeholder.com/300x300/f5f5f5/999999?text=@LabGrownCVD');">
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <div class="container">
            <div class="lgd-instagram__cta">
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"
                    class="btn btn-outline-navy">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 8px;">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                    Follow @LabGrownCVD
                </a>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>