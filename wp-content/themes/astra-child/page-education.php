<?php
/**
 * Template Name: Education - 4Cs & Buying Guide
 * 
 * LGD Diamond Exchange - Education Hub
 * 4Cs Diamond Education Hub & Interactive Buying Guide
 * 
 * @package Astra Child Diamond
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

wp_enqueue_style('diamond-education-css', get_stylesheet_directory_uri() . '/assets/css/education.css', array(), ASTRA_CHILD_THEME_VERSION);
?>

<div id="primary" class="content-area lgd-page lgd-page--education-hub">
    <main id="main" class="site-main">

        <!-- HERO SECTION -->
        <section class="lgd-edu-hub-hero">
            <div class="ast-container">
                <p class="lgd-edu-hub-hero__suptitle">Expert Knowledge</p>
                <h1 class="lgd-edu-hub-title">The 4Cs Diamond Education Hub &amp; <span class="gold-accent">Interactive Buying Guide</span></h1>
                <p class="lgd-edu-hub-hero__subheadline">
                    Master the nuances of Cut, Color, Clarity, and Carat. Understand what makes a CVD Type IIa diamond the ultimate choice for your engagement ring.
                </p>
            </div>
        </section>

        <!-- 4Cs BREAKDOWN -->
        <section class="lgd-edu-4cs">
            <div class="ast-container">
                <h2 class="section-title">The 4Cs Masterclass</h2>
                
                <!-- CUT -->
                <div class="lgd-edu-4c-section lgd-edu-cut">
                    <h3>1. Cut: The Engine of Sparkle</h3>
                    <p>Cut determines how well a diamond interacts with light. It is the most crucial factor for brilliance.</p>
                    <div class="cut-grades-grid">
                        <div class="cut-grade">
                            <div class="cut-visual ideal"></div>
                            <h4>Ideal</h4>
                            <p>Maximizes light return. Top 3% of diamonds.</p>
                        </div>
                        <div class="cut-grade">
                            <div class="cut-visual excellent"></div>
                            <h4>Excellent</h4>
                            <p>Exceptional brilliance. Top 15%.</p>
                        </div>
                        <div class="cut-grade">
                            <div class="cut-visual very-good"></div>
                            <h4>Very Good</h4>
                            <p>Superior light reflection.</p>
                        </div>
                        <div class="cut-grade">
                            <div class="cut-visual good"></div>
                            <h4>Good</h4>
                            <p>Reflects most light that enters.</p>
                        </div>
                        <div class="cut-grade">
                            <div class="cut-visual fair"></div>
                            <h4>Fair</h4>
                            <p>Noticeable loss of light.</p>
                        </div>
                        <div class="cut-grade">
                            <div class="cut-visual poor"></div>
                            <h4>Poor</h4>
                            <p>Dull and lifeless appearance.</p>
                        </div>
                    </div>
                </div>

                <!-- COLOR -->
                <div class="lgd-edu-4c-section lgd-edu-color">
                    <h3>2. Color: The Absence of Hue</h3>
                    <p>Diamond color is graded on a scale from D (colorless) to Z (light yellow or brown).</p>
                    <div class="color-scale-wrapper">
                        <div class="color-scale">
                            <div class="color-band colorless">
                                <span class="grade">D-E-F</span>
                                <span class="label">Colorless</span>
                            </div>
                            <div class="color-band near-colorless">
                                <span class="grade">G-H-I-J</span>
                                <span class="label">Near Colorless</span>
                            </div>
                            <div class="color-band faint">
                                <span class="grade">K-L-M</span>
                                <span class="label">Faint</span>
                            </div>
                            <div class="color-band very-light">
                                <span class="grade">N-R</span>
                                <span class="label">Very Light</span>
                            </div>
                            <div class="color-band light">
                                <span class="grade">S-Z</span>
                                <span class="label">Light</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CLARITY -->
                <div class="lgd-edu-4c-section lgd-edu-clarity">
                    <h3>3. Clarity: Purity Under the Loupe</h3>
                    <p>Clarity assesses the presence of internal inclusions and external blemishes.</p>
                    <div class="clarity-grades-grid">
                        <div class="clarity-grade"><h4>FL/IF</h4><p>Flawless / Internally Flawless. No visible inclusions at 10x.</p></div>
                        <div class="clarity-grade"><h4>VVS1/VVS2</h4><p>Very, Very Slightly Included. Minute inclusions, difficult to see at 10x.</p></div>
                        <div class="clarity-grade"><h4>VS1/VS2</h4><p>Very Slightly Included. Minor inclusions observed with effort at 10x.</p></div>
                        <div class="clarity-grade"><h4>SI1/SI2</h4><p>Slightly Included. Inclusions visible at 10x, sometimes to the naked eye.</p></div>
                        <div class="clarity-grade"><h4>I1/I2/I3</h4><p>Included. Inclusions obvious at 10x and to the naked eye.</p></div>
                    </div>
                </div>

                <!-- CARAT -->
                <div class="lgd-edu-4c-section lgd-edu-carat">
                    <h3>4. Carat: Weight and Presence</h3>
                    <p>Carat refers to the physical weight of the diamond, not its dimensions. 1 Carat = 200 milligrams.</p>
                    <div class="carat-sizes-flex">
                        <div class="carat-size"><div class="circle c-05"></div><span>0.50ct</span></div>
                        <div class="carat-size"><div class="circle c-10"></div><span>1.00ct</span></div>
                        <div class="carat-size"><div class="circle c-15"></div><span>1.50ct</span></div>
                        <div class="carat-size"><div class="circle c-20"></div><span>2.00ct</span></div>
                        <div class="carat-size"><div class="circle c-30"></div><span>3.00ct</span></div>
                    </div>
                </div>

            </div>
        </section>

        <!-- CVD TYPE IIA PURITY -->
        <section class="lgd-edu-purity">
            <div class="ast-container">
                <div class="purity-content">
                    <div class="purity-text">
                        <h2>The Pinnacle of Purity: CVD Type IIa</h2>
                        <p>Not all diamonds are created equal. <strong>Type IIa</strong> diamonds are the most chemically pure type of diamond, known for their exceptional optical transparency. They contain almost no nitrogen or boron impurities.</p>
                        <p>In nature, less than 2% of diamonds are Type IIa (the famous Cullinan and Koh-i-Noor are Type IIa). However, through advanced Chemical Vapor Deposition (CVD), we cultivate diamonds that are reliably Type IIa.</p>
                        <ul>
                            <li><strong>Zero Nitrogen:</strong> No yellow tints common in Type Ia stones.</li>
                            <li><strong>Superior Brilliance:</strong> The pure carbon lattice transmits light better.</li>
                            <li><strong>No Magnetic Pull:</strong> Unlike HPHT diamonds which can leave metallic flux.</li>
                        </ul>
                    </div>
                    <div class="purity-graphic">
                        <div class="lattice-mockup">
                            <span class="carbon-atom pure">C</span>
                            <span class="carbon-atom pure">C</span>
                            <span class="carbon-atom pure">C</span>
                            <div class="lattice-label">100% Pure Carbon Lattice</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CERTIFICATE READING GUIDE -->
        <section class="lgd-edu-cert-guide">
            <div class="ast-container">
                <h2>Decoding Your Diamond Certificate (IGI/GIA)</h2>
                <p class="cert-subtitle">A certificate is your diamond's blueprint. Here is how to read the critical data points on an IGI or GIA report.</p>
                
                <div class="cert-interactive-area">
                    <div class="cert-mockup">
                        <div class="cert-header">LABORATORY GROWN DIAMOND REPORT</div>
                        <div class="cert-body">
                            <div class="cert-row annotation-target" data-info="The unique ID laser inscribed on your diamond.">
                                <span class="cert-label">Report Number:</span> LG123456789
                            </div>
                            <div class="cert-row annotation-target" data-info="Confirms the 4Cs grades.">
                                <span class="cert-label">Grading Results:</span> <br>
                                Carat: 1.50 <br>
                                Color: E <br>
                                Clarity: VVS2 <br>
                                Cut: Ideal
                            </div>
                            <div class="cert-row annotation-target" data-info="Confirms the diamond was grown via CVD and is Type IIa.">
                                <span class="cert-label">Comments:</span> This Laboratory Grown Diamond was created by Chemical Vapor Deposition (CVD) growth process and may include post-growth treatment. Type IIa.
                            </div>
                        </div>
                    </div>
                    <div class="cert-details">
                        <h3>Interactive Guide</h3>
                        <p>Hover over the certificate sections to understand their importance.</p>
                        <ul class="cert-annotation-list">
                            <li class="cert-annotation"><strong>Report Number:</strong> Always verify this matches the laser inscription on the girdle.</li>
                            <li class="cert-annotation"><strong>Grading Results:</strong> The definitive 4Cs evaluation by an independent gemologist.</li>
                            <li class="cert-annotation"><strong>Comments (Growth Method):</strong> Look for "CVD" and "Type IIa" for optical perfection.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>