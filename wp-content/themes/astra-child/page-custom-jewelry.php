<?php
/**
 * Template Name: Custom Jewelry & Bespoke Design
 *
 * @package Astra Child
 */

get_header();

// Enqueue specific CSS for this page
wp_enqueue_style('astra-child-custom-jewelry-css', get_stylesheet_directory_uri() . '/assets/css/custom-jewelry.css', array(), '1.0.0', 'all');

?>

<div id="primary" class="content-area lgd-custom-jewelry-page">
    <main id="main" class="site-main">

        <!-- SECTION 1: Introduction -->
        <section class="lgd-cj-intro">
            <div class="ast-container">
                <h1 class="lgd-cj-intro__title">Design Your Perfect Piece</h1>
                <p class="lgd-cj-intro__text">
                    Create a truly unique piece of jewelry with our bespoke design service. 
                    Choose from our ethically sourced CVD lab-grown diamonds, select your preferred metal and setting, 
                    and add your personal touch with custom inscriptions.
                </p>
            </div>
        </section>

        <!-- SECTION 2: Bespoke Builder -->
        <section class="lgd-cj-builder">
            <div class="ast-container">
                <form id="bespoke-builder-form" class="lgd-cj-builder__form">
                    
                    <!-- STEP 1: Diamond Selection -->
                    <div class="lgd-cj-step" id="step-1">
                        <div class="lgd-cj-step__header">
                            <span class="lgd-cj-step__number">Step 1</span>
                            <h2 class="lgd-cj-step__title">CVD Diamond Selection</h2>
                        </div>
                        <div class="lgd-cj-step__content">
                            <div class="lgd-cj-form-group">
                                <label for="diamond-cut">Cut</label>
                                <select id="diamond-cut" name="diamond-cut" required>
                                    <option value="">Select Cut</option>
                                    <option value="round">Round</option>
                                    <option value="princess">Princess</option>
                                    <option value="cushion">Cushion</option>
                                    <option value="emerald">Emerald</option>
                                    <option value="oval">Oval</option>
                                    <option value="pear">Pear</option>
                                    <option value="marquise">Marquise</option>
                                </select>
                            </div>
                            <div class="lgd-cj-form-group">
                                <label for="diamond-carat">Carat</label>
                                <select id="diamond-carat" name="diamond-carat" required>
                                    <option value="">Select Carat Weight</option>
                                    <option value="0.5-0.99">0.50 - 0.99 ct</option>
                                    <option value="1.0-1.49">1.00 - 1.49 ct</option>
                                    <option value="1.5-1.99">1.50 - 1.99 ct</option>
                                    <option value="2.0-2.99">2.00 - 2.99 ct</option>
                                    <option value="3.0+">3.00+ ct</option>
                                </select>
                            </div>
                            <div class="lgd-cj-form-group">
                                <label for="diamond-clarity">Clarity</label>
                                <select id="diamond-clarity" name="diamond-clarity" required>
                                    <option value="">Select Clarity</option>
                                    <option value="fl-if">FL/IF</option>
                                    <option value="vvs1-vvs2">VVS1/VVS2</option>
                                    <option value="vs1-vs2">VS1/VS2</option>
                                </select>
                            </div>
                            <div class="lgd-cj-form-group">
                                <label for="diamond-color">Color</label>
                                <select id="diamond-color" name="diamond-color" required>
                                    <option value="">Select Color</option>
                                    <option value="d-f">D, E, F (Colorless)</option>
                                    <option value="g-j">G, H, I, J (Near Colorless)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: Metal & Setting -->
                    <div class="lgd-cj-step" id="step-2">
                        <div class="lgd-cj-step__header">
                            <span class="lgd-cj-step__number">Step 2</span>
                            <h2 class="lgd-cj-step__title">Metal & Setting</h2>
                        </div>
                        <div class="lgd-cj-step__content">
                            <div class="lgd-cj-form-group">
                                <label>Metal</label>
                                <div class="lgd-cj-radio-group">
                                    <label class="lgd-cj-radio">
                                        <input type="radio" name="metal-type" value="platinum" required>
                                        <span class="lgd-cj-radio__label">Platinum</span>
                                    </label>
                                    <label class="lgd-cj-radio">
                                        <input type="radio" name="metal-type" value="18k-white-gold">
                                        <span class="lgd-cj-radio__label">18k White Gold</span>
                                    </label>
                                    <label class="lgd-cj-radio">
                                        <input type="radio" name="metal-type" value="18k-yellow-gold">
                                        <span class="lgd-cj-radio__label">18k Yellow Gold</span>
                                    </label>
                                    <label class="lgd-cj-radio">
                                        <input type="radio" name="metal-type" value="18k-rose-gold">
                                        <span class="lgd-cj-radio__label">18k Rose Gold</span>
                                    </label>
                                </div>
                            </div>
                            <div class="lgd-cj-form-group">
                                <label>Setting Style</label>
                                <div class="lgd-cj-radio-group">
                                    <label class="lgd-cj-radio">
                                        <input type="radio" name="setting-style" value="prong" required>
                                        <span class="lgd-cj-radio__label">Prong</span>
                                    </label>
                                    <label class="lgd-cj-radio">
                                        <input type="radio" name="setting-style" value="bezel">
                                        <span class="lgd-cj-radio__label">Bezel</span>
                                    </label>
                                    <label class="lgd-cj-radio">
                                        <input type="radio" name="setting-style" value="halo">
                                        <span class="lgd-cj-radio__label">Halo</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: Inscription & Customization Details -->
                    <div class="lgd-cj-step" id="step-3">
                        <div class="lgd-cj-step__header">
                            <span class="lgd-cj-step__number">Step 3</span>
                            <h2 class="lgd-cj-step__title">Inscription & Customization Details</h2>
                        </div>
                        <div class="lgd-cj-step__content">
                            <div class="lgd-cj-form-group">
                                <label for="inscription">Engraving / Inscription (Optional)</label>
                                <input type="text" id="inscription" name="inscription" placeholder="e.g., Forever Yours, 12.05.2025" maxlength="30">
                                <small>Max 30 characters</small>
                            </div>
                            <div class="lgd-cj-form-group">
                                <label for="custom-details">Additional Design Notes</label>
                                <textarea id="custom-details" name="custom-details" rows="4" placeholder="Describe any specific design details, inspirations, or upload links to reference images..."></textarea>
                            </div>
                            
                            <div class="lgd-cj-form-group">
                                <label for="contact-name">Your Name</label>
                                <input type="text" id="contact-name" name="contact-name" required>
                            </div>
                            <div class="lgd-cj-form-group">
                                <label for="contact-email">Email Address</label>
                                <input type="email" id="contact-email" name="contact-email" required>
                            </div>
                            
                            <button type="submit" class="lgd-btn lgd-btn--primary lgd-cj-submit">Submit Design Request</button>
                        </div>
                    </div>

                </form>
            </div>
        </section>

        <!-- SECTION 3: CAD Render Gallery -->
        <section class="lgd-cj-cad-gallery">
            <div class="ast-container">
                <h2 class="lgd-cj-section-title">From Concept to CAD</h2>
                <p class="lgd-cj-section-desc">See how we bring ideas to life before casting in metal.</p>
                
                <div class="lgd-cj-gallery-grid">
                    <div class="lgd-cj-gallery-item">
                        <div class="lgd-cj-gallery-item__placeholder">CAD Render 1</div>
                        <p class="lgd-cj-gallery-item__caption">Vintage Inspired Halo</p>
                    </div>
                    <div class="lgd-cj-gallery-item">
                        <div class="lgd-cj-gallery-item__placeholder">CAD Render 2</div>
                        <p class="lgd-cj-gallery-item__caption">Modern Bezel Setting</p>
                    </div>
                    <div class="lgd-cj-gallery-item">
                        <div class="lgd-cj-gallery-item__placeholder">CAD Render 3</div>
                        <p class="lgd-cj-gallery-item__caption">Classic Solitaire with Hidden Halo</p>
                    </div>
                    <div class="lgd-cj-gallery-item">
                        <div class="lgd-cj-gallery-item__placeholder">CAD Render 4</div>
                        <p class="lgd-cj-gallery-item__caption">Three-Stone Anniversary Ring</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: Customer Showcase -->
        <section class="lgd-cj-showcase">
            <div class="ast-container">
                <h2 class="lgd-cj-section-title">Customer Showcase</h2>
                <p class="lgd-cj-section-desc">Real stories, bespoke designs.</p>
                
                <div class="lgd-cj-showcase-grid">
                    <!-- Showcase Card 1 -->
                    <div class="lgd-cj-showcase-card">
                        <div class="lgd-cj-showcase-card__image-placeholder">Finished Ring Photo</div>
                        <div class="lgd-cj-showcase-card__content">
                            <h3 class="lgd-cj-showcase-card__title">Sarah & James</h3>
                            <p class="lgd-cj-showcase-card__specs">2.5ct Oval CVD • 18k Yellow Gold • Hidden Halo</p>
                            <blockquote class="lgd-cj-showcase-card__quote">
                                "The bespoke process was incredible. Being able to choose the exact diamond and approve the CAD design made it truly ours."
                            </blockquote>
                        </div>
                    </div>
                    <!-- Showcase Card 2 -->
                    <div class="lgd-cj-showcase-card">
                        <div class="lgd-cj-showcase-card__image-placeholder">Finished Ring Photo</div>
                        <div class="lgd-cj-showcase-card__content">
                            <h3 class="lgd-cj-showcase-card__title">Emily's Upgrade</h3>
                            <p class="lgd-cj-showcase-card__specs">3.0ct Emerald Cut • Platinum • Bezel Setting</p>
                            <blockquote class="lgd-cj-showcase-card__quote">
                                "I wanted something sleek and modern. The bezel setting we designed together is absolutely perfect and so comfortable."
                            </blockquote>
                        </div>
                    </div>
                    <!-- Showcase Card 3 -->
                    <div class="lgd-cj-showcase-card">
                        <div class="lgd-cj-showcase-card__image-placeholder">Finished Ring Photo</div>
                        <div class="lgd-cj-showcase-card__content">
                            <h3 class="lgd-cj-showcase-card__title">The Artisan</h3>
                            <p class="lgd-cj-showcase-card__specs">1.5ct Round • 18k Rose Gold • Nature-Inspired Band</p>
                            <blockquote class="lgd-cj-showcase-card__quote">
                                "We incorporated leaf motifs into the band. It's a one-of-a-kind piece that perfectly captures my style."
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
