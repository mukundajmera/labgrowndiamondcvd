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

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="primary" class="content-area luxury-home">
    <main id="main" class="site-main">

        <!-- IMMERSIVE HERO SECTION -->
        <section class="luxury-hero"
            style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hero/hero-bg.png');">
            <div class="luxury-hero__overlay"></div>

            <div class="luxury-hero__content">
                <h1 class="luxury-hero__headline">The Future of Diamonds is <span class="gold-accent">Clear.</span></h1>
                <p class="luxury-hero__subheadline">Forensic verification. Factory-direct pricing. The only diamond
                    exchange that highlights the flaws so you know the truth.</p>
                <div class="luxury-hero__ctas">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="luxury-btn luxury-btn--primary">Search
                        Verified Diamonds</a>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="luxury-btn luxury-btn--secondary">The
                        Surat Advantage</a>
                    <a href="<?php echo esc_url(home_url('/education/')); ?>"
                        class="luxury-btn luxury-btn--tertiary">CVD vs HPHT Guide</a>
                </div>
            </div>
        </section>

        <!-- MINI USPs ROW -->
        <section class="lgd-usps-strip">
            <div class="ast-container">
                <div class="lgd-usps-strip__grid">
                    <!-- TRUST ITEM 1: Surat-Direct Pricing -->
                    <div class="lgd-usps-strip__item">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M12 2L3 7v15h18V7l-9-5z" />
                            <path d="M12 22V12" />
                            <path d="M12 12l9-5" />
                            <path d="M12 12l-9-5" />
                        </svg>
                        <div class="lgd-usps-strip__text">
                            <strong>Surat-Direct Pricing</strong>
                            <span>No middlemen. Save 30-50%.</span>
                        </div>
                    </div>
                    <!-- TRUST ITEM 2: Forensic Vetting -->
                    <div class="lgd-usps-strip__item">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <path d="M21 21l-4.35-4.35" />
                            <path d="M11 8v6" />
                            <path d="M8 11h6" />
                        </svg>
                        <div class="lgd-usps-strip__text">
                            <strong>Forensic Vetting</strong>
                            <span>We reject 90% of stones</span>
                        </div>
                    </div>
                    <!-- TRUST ITEM 3: Buyback Guarantee -->
                    <div class="lgd-usps-strip__item">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                            <path d="M9 12l2 2 4-4" />
                        </svg>
                        <div class="lgd-usps-strip__text">
                            <strong>Buyback Guarantee</strong>
                            <span>Real asset protection</span>
                        </div>
                    </div>
                    <!-- TRUST ITEM 4: Certified -->
                    <div class="lgd-usps-strip__item">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg>
                        <div class="lgd-usps-strip__text">
                            <strong>IGI/GIA Certified</strong>
                            <span>Every stone verified</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- QUICK DIAMOND FINDER STRIP -->
        <section class="diamond-finder-strip">
            <div class="ast-container">
                <h2 class="diamond-finder-strip__title">Find Your Perfect Diamond</h2>
                <form class="diamond-finder-strip__form" action="<?php echo esc_url(home_url('/shop/')); ?>"
                    method="get">
                    <div class="diamond-finder-strip__filters">
                        <div class="diamond-finder-strip__filter">
                            <label for="finder-shape">Shape</label>
                            <select name="shape" id="finder-shape">
                                <option value="">All Shapes</option>
                                <option value="round">Round</option>
                                <option value="princess">Princess</option>
                                <option value="cushion">Cushion</option>
                                <option value="oval">Oval</option>
                                <option value="emerald">Emerald</option>
                                <option value="pear">Pear</option>
                                <option value="marquise">Marquise</option>
                                <option value="radiant">Radiant</option>
                            </select>
                        </div>
                        <div class="diamond-finder-strip__filter">
                            <label for="finder-carat">Carat Range</label>
                            <select name="carat_range" id="finder-carat">
                                <option value="">Any</option>
                                <option value="0.5-1">0.5 - 1.0 ct</option>
                                <option value="1-1.5">1.0 - 1.5 ct</option>
                                <option value="1.5-2">1.5 - 2.0 ct</option>
                                <option value="2-3">2.0 - 3.0 ct</option>
                                <option value="3+">3.0+ ct</option>
                            </select>
                        </div>
                        <div class="diamond-finder-strip__filter">
                            <label for="finder-color">Color</label>
                            <select name="color" id="finder-color">
                                <option value="">Any</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                            </select>
                        </div>
                        <div class="diamond-finder-strip__filter">
                            <label for="finder-clarity">Clarity</label>
                            <select name="clarity" id="finder-clarity">
                                <option value="">Any</option>
                                <option value="IF">IF</option>
                                <option value="VVS1">VVS1</option>
                                <option value="VVS2">VVS2</option>
                                <option value="VS1">VS1</option>
                                <option value="VS2">VS2</option>
                                <option value="SI1">SI1</option>
                                <option value="SI2">SI2</option>
                            </select>
                        </div>
                        <div class="diamond-finder-strip__filter">
                            <label for="finder-price">Price Range</label>
                            <select name="price_range" id="finder-price">
                                <option value="">Any Budget</option>
                                <option value="0-50000">Under ₹50,000</option>
                                <option value="50000-100000">₹50,000 - ₹1,00,000</option>
                                <option value="100000-200000">₹1,00,000 - ₹2,00,000</option>
                                <option value="200000-500000">₹2,00,000 - ₹5,00,000</option>
                                <option value="500000+">Above ₹5,00,000</option>
                            </select>
                        </div>
                        <div class="diamond-finder-strip__filter">
                            <label for="finder-lab">Lab</label>
                            <select name="lab" id="finder-lab">
                                <option value="">Any</option>
                                <option value="igi">IGI</option>
                                <option value="gia">GIA</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="diamond-finder-strip__search-btn">Search Diamonds</button>
                </form>
            </div>
        </section>

        <!-- SOCIAL PROOF & TRUST STRIP -->
        <section class="lgd-social-proof">
            <div class="ast-container">
                <div class="lgd-social-proof__grid">
                    <div class="lgd-social-proof__item">
                        <div class="lgd-social-proof__rating">
                            <span class="lgd-social-proof__stars">★★★★★</span>
                            <span class="lgd-social-proof__score">4.8/5</span>
                        </div>
                        <p class="lgd-social-proof__text">From
                            <?php echo get_theme_mod('customer_reviews_count', '500+'); ?> Verified Customers</p>
                    </div>
                    <div class="lgd-social-proof__item">
                        <div class="lgd-social-proof__number">
                            <?php echo get_theme_mod('diamonds_sold_count', '5,000+'); ?></div>
                        <p class="lgd-social-proof__text">Diamonds Sold</p>
                    </div>
                    <div class="lgd-social-proof__item">
                        <div class="lgd-social-proof__number">
                            <?php echo get_theme_mod('jewellers_served_count', '200+'); ?></div>
                        <p class="lgd-social-proof__text">Jewellers Served</p>
                    </div>
                    <div class="lgd-social-proof__item lgd-social-proof__certs">
                        <div class="lgd-social-proof__cert-logos">
                            <span class="lgd-social-proof__cert-badge"
                                title="IGI Certified - International Gemological Institute">IGI</span>
                            <span class="lgd-social-proof__cert-badge"
                                title="GIA Certified - Gemological Institute of America">GIA</span>
                        </div>
                        <p class="lgd-social-proof__text">Certified By Leading Labs</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- WHY CVD / WHY US STRIP -->
        <section class="lgd-why-us">
            <div class="ast-container">
                <h2 class="lgd-why-us__heading">Why Choose Lab-Grown CVD Diamonds</h2>
                <div class="lgd-why-us__grid">
                    <div class="lgd-why-us__card">
                        <div class="lgd-why-us__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z" />
                                <path d="M12 6v6l4 2" />
                            </svg>
                        </div>
                        <h3 class="lgd-why-us__title">Sustainable & Eco-Friendly</h3>
                        <p class="lgd-why-us__description">Lab-grown diamonds have 90% less carbon footprint compared to
                            mined diamonds. No mining, no environmental damage.</p>
                    </div>
                    <div class="lgd-why-us__card">
                        <div class="lgd-why-us__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                            </svg>
                        </div>
                        <h3 class="lgd-why-us__title">Up to 40% Price Advantage</h3>
                        <p class="lgd-why-us__description">Get the same quality, brilliance, and durability at 30-40%
                            less cost than natural diamonds. Better value for your investment.</p>
                    </div>
                    <div class="lgd-why-us__card">
                        <div class="lgd-why-us__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M3 9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                                <path d="M3 9V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v2" />
                                <path d="M12 9v4" />
                            </svg>
                        </div>
                        <h3 class="lgd-why-us__title">Factory-Direct from Surat</h3>
                        <p class="lgd-why-us__description">Direct from India's diamond capital. No middlemen,
                            transparent pricing, and full traceability from lab to your hands.</p>
                    </div>
                    <div class="lgd-why-us__card">
                        <div class="lgd-why-us__icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                                <path d="M9 12l2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="lgd-why-us__title">100% Conflict-Free</h3>
                        <p class="lgd-why-us__description">Every diamond is ethically created in controlled labs. Zero
                            human rights violations, zero funding of conflicts.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SHOP BY CATEGORY -->
        <section class="lgd-categories">
            <div class="ast-container">
                <h2 class="lgd-categories__heading">Shop By Category</h2>
                <div class="lgd-categories__grid">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="lgd-categories__card">
                        <div class="lgd-categories__image"
                            style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/loose-diamonds.png');">
                        </div>
                        <div class="lgd-categories__content">
                            <h3 class="lgd-categories__title">Loose Diamonds</h3>
                            <p class="lgd-categories__description">IGI/GIA certified, starting from 0.30ct</p>
                            <span class="lgd-categories__cta">Shop Now →</span>
                        </div>
                    </a>
                    <a href="<?php echo esc_url(home_url('/engagement-rings/')); ?>" class="lgd-categories__card">
                        <div class="lgd-categories__image"
                            style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/engagement-rings.png');">
                        </div>
                        <div class="lgd-categories__content">
                            <h3 class="lgd-categories__title">Engagement Rings</h3>
                            <p class="lgd-categories__description">Timeless designs, made to last forever</p>
                            <span class="lgd-categories__cta">Browse Rings →</span>
                        </div>
                    </a>
                    <a href="<?php echo esc_url(home_url('/jewellery/')); ?>" class="lgd-categories__card">
                        <div class="lgd-categories__image"
                            style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/jewelry.png');">
                        </div>
                        <div class="lgd-categories__content">
                            <h3 class="lgd-categories__title">Fine Jewellery</h3>
                            <p class="lgd-categories__description">Earrings, pendants, bracelets & more</p>
                            <span class="lgd-categories__cta">Explore Collection →</span>
                        </div>
                    </a>
                    <a href="<?php echo esc_url(home_url('/design-your-ring/')); ?>" class="lgd-categories__card">
                        <div class="lgd-categories__image"
                            style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/categories/custom-design.png');">
                        </div>
                        <div class="lgd-categories__content">
                            <h3 class="lgd-categories__title">Custom Design</h3>
                            <p class="lgd-categories__description">Create your unique, one-of-a-kind piece</p>
                            <span class="lgd-categories__cta">Start Designing →</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- B2B VS B2C SEGMENT -->
        <section class="lgd-segment">
            <div class="ast-container">
                <div class="lgd-segment__grid">
                    <div class="lgd-segment__panel lgd-segment__panel--b2c">
                        <div class="lgd-segment__content">
                            <span class="lgd-segment__label">For Individuals</span>
                            <h2 class="lgd-segment__heading">Create Your Dream Ring</h2>
                            <ul class="lgd-segment__benefits">
                                <li>✓ Personalized consultations</li>
                                <li>✓ Flexible EMI options</li>
                                <li>✓ 30-day returns & lifetime warranty</li>
                                <li>✓ Free shipping & carbon-neutral delivery</li>
                            </ul>
                            <p class="lgd-segment__pricing">Starting from <strong>₹25,000</strong></p>
                            <a href="<?php echo esc_url(home_url('/shop/')); ?>"
                                class="lgd-segment__cta lgd-segment__cta--primary">Start Shopping</a>
                        </div>
                    </div>
                    <div class="lgd-segment__panel lgd-segment__panel--b2b">
                        <div class="lgd-segment__content">
                            <span class="lgd-segment__label">For Jewellers & Wholesalers</span>
                            <h2 class="lgd-segment__heading">Trade Program</h2>
                            <ul class="lgd-segment__benefits">
                                <li>✓ Bulk pricing & volume discounts</li>
                                <li>✓ Live API inventory access</li>
                                <li>✓ Net 30 payment terms</li>
                                <li>✓ Dedicated account manager</li>
                            </ul>
                            <p class="lgd-segment__pricing">Wholesale rates available</p>
                            <a href="<?php echo esc_url(home_url('/trade-program/')); ?>"
                                class="lgd-segment__cta lgd-segment__cta--secondary">Join Trade Program</a>
                            <a href="<?php echo esc_url(home_url('/request-demo/')); ?>"
                                class="lgd-segment__cta lgd-segment__cta--tertiary">Request Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- REVIEWS & UGC PLACEHOLDER -->
        <section class="lgd-reviews">
            <div class="ast-container">
                <div class="lgd-reviews__header">
                    <h2 class="lgd-reviews__heading">What Our Customers Say</h2>
                    <p class="lgd-reviews__subheading">Real stories from real customers</p>
                </div>
                <div class="lgd-reviews__grid">
                    <div class="lgd-reviews__card">
                        <div class="lgd-reviews__rating">★★★★★</div>
                        <p class="lgd-reviews__text">"Absolutely stunning diamond! The quality exceeded my expectations
                            and the customer service was exceptional. Highly recommend for anyone looking for lab-grown
                            diamonds."</p>
                        <div class="lgd-reviews__author">
                            <div class="lgd-reviews__avatar">P</div>
                            <div class="lgd-reviews__info">
                                <strong>Priya S.</strong>
                                <span>Mumbai</span>
                            </div>
                        </div>
                    </div>
                    <div class="lgd-reviews__card">
                        <div class="lgd-reviews__rating">★★★★★</div>
                        <p class="lgd-reviews__text">"Great experience from start to finish. The team helped me design a
                            custom engagement ring within my budget. My fiancée loves it!"</p>
                        <div class="lgd-reviews__author">
                            <div class="lgd-reviews__avatar">R</div>
                            <div class="lgd-reviews__info">
                                <strong>Rahul K.</strong>
                                <span>Delhi</span>
                            </div>
                        </div>
                    </div>
                    <div class="lgd-reviews__card">
                        <div class="lgd-reviews__rating">★★★★★</div>
                        <p class="lgd-reviews__text">"As a jeweller, I've been sourcing diamonds from them for 2 years.
                            Consistent quality, competitive pricing, and reliable delivery. Perfect B2B partner."</p>
                        <div class="lgd-reviews__author">
                            <div class="lgd-reviews__avatar">A</div>
                            <div class="lgd-reviews__info">
                                <strong>Amit J.</strong>
                                <span>Surat</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lgd-reviews__instagram">
                    <h3 class="lgd-reviews__instagram-heading">Follow Us on Instagram</h3>
                    <p class="lgd-reviews__instagram-text">@labgrowndiamondcvd</p>
                    <div class="lgd-reviews__instagram-grid">
                        <!-- Instagram feed will be integrated in Phase 3 -->
                        <div class="lgd-reviews__instagram-placeholder">📸 Instagram Feed Coming Soon</div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>