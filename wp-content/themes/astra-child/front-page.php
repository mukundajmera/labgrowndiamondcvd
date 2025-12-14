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

<div id="primary" class="content-area premium-home">
    <main id="main" class="site-main">

        <!-- HERO SECTION -->
        <section class="hero-section" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero/hero-bg.png');">
            <div class="hero-overlay"></div>
            <div class="hero-content" data-aos="fade-up">
                <h1 class="hero-title">Ethical Brilliance,<br>Lab-Perfected.</h1>
                <p class="hero-subtitle">Indistinguishable from mined. 40% more brilliant.<br>100% conflict-free sustainability.</p>
                <div class="hero-actions">
                    <a href="/shop/" class="btn-premium">Explore Diamonds</a>
                    <a href="/consultation/" class="btn-premium btn-outline">Book Consultation</a>
                </div>
            </div>
            
            <!-- Shape Selector (Floating) -->
            <div class="hero-shape-selector glass-panel">
                <span class="shape-label">Select Your Cut</span>
                <div class="shapes-scroll">
                    <?php
                    $shapes = [
                        'round' => 'Round',
                        'oval' => 'Oval',
                        'emerald' => 'Emerald',
                        'princess' => 'Princess',
                        'cushion' => 'Cushion',
                        'pear' => 'Pear'
                    ];
                    foreach ($shapes as $slug => $name) : ?>
                        <a href="/shop/?filter_shape=<?php echo $slug; ?>" class="shape-item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/diamonds/<?php echo $slug; ?>.png" alt="<?php echo $name; ?> Cut">
                            <span class="shape-name"><?php echo $name; ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- TRUST INDICATORS -->
        <section class="trust-section bg-navy">
            <div class="ast-container">
                <div class="trust-grid">
                    <div class="trust-item">
                        <span class="trust-icon">💎</span>
                        <h4>GIA/IGI Certified</h4>
                        <p>Every stone graded by world experts</p>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">🌿</span>
                        <h4>Eco-Friendly</h4>
                        <p>Zero mining impact, 100% renewable</p>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">⭐</span>
                        <h4>Lifetime Warranty</h4>
                        <p>Quality guaranteed forever</p>
                    </div>
                    <div class="trust-item">
                        <span class="trust-icon">↺</span>
                        <h4>30-Day Returns</h4>
                        <p>No-questions-asked refund policy</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CATEGORIES -->
        <section class="category-section">
            <div class="ast-container">
                <div class="section-header text-center">
                    <h2 class="section-title">Curated Collections</h2>
                    <p class="section-desc">Discover the perfect expression of your love</p>
                </div>
                
                <div class="category-grid">
                    <div class="cat-card large" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/engagement-rings.png');">
                        <div class="cat-content glass-panel">
                            <h3>Engagement Rings</h3>
                            <a href="/product-category/engagement-rings/" class="link-arrow">Shop Now →</a>
                        </div>
                    </div>
                    <div class="cat-card" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/loose-diamonds.png');">
                        <div class="cat-content glass-panel">
                            <h3>Loose Diamonds</h3>
                            <a href="/shop/" class="link-arrow">Browse Stones →</a>
                        </div>
                    </div>
                    <div class="cat-card" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/jewelry.png');">
                        <div class="cat-content glass-panel">
                            <h3>Fine Jewelry</h3>
                            <a href="/product-category/jewelry/" class="link-arrow">View Collection →</a>
                        </div>
                    </div>
                    <div class="cat-card" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/custom-design.png');">
                        <div class="cat-content glass-panel">
                            <h3>Custom Design</h3>
                            <a href="/custom-design/" class="link-arrow">Start Creation →</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="cta-banner">
            <div class="ast-container">
                <div class="cta-box glass-panel text-center">
                    <h2>Expert Guidance at Your Fingertips</h2>
                    <p>Schedule a free virtual consultation with our gemologists.</p>
                    <a href="https://wa.me/919876543210" class="btn-premium">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118 1.571-.065 1.758-.758 2.006-1.49l.06-.32zM12 21.75c-5.325 0-9.656-4.291-9.75-9.634 0-1.87.52-3.615 1.439-5.127l-1.602-5.748 5.992 1.559c1.47-.852 3.166-1.341 4.973-1.341 5.384 0 9.75 4.366 9.75 9.75 0 5.385-4.366 9.75-9.75 9.75z"/></svg>
                        Chat on WhatsApp
                    </a>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>