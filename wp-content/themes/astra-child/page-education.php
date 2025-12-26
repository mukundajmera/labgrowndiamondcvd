<?php
/**
 * Template Name: Education - CVD vs HPHT
 * 
 * LGD Diamond Exchange - Education Page
 * Technical comparison of CVD vs HPHT diamond growth methods
 * 
 * @package Astra Child Diamond
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div id="primary" class="content-area lgd-page lgd-page--education">
    <main id="main" class="site-main">

        <!-- HERO SECTION -->
        <section class="lgd-edu-hero">
            <div class="ast-container">
                <p class="lgd-edu-hero__suptitle">Diamond Science</p>
                <h1 class="lgd-edu-hero__headline">The Molecular Truth: <span class="gold-accent">CVD vs. HPHT</span>
                </h1>
                <p class="lgd-edu-hero__subheadline">
                    Both methods create real diamonds. But the molecular differences matter —
                    especially for engagement rings meant to last a lifetime.
                </p>
            </div>
        </section>

        <!-- HOW THEY WORK -->
        <section class="lgd-edu-methods">
            <div class="ast-container">
                <div class="lgd-edu-methods__grid">
                    <!-- CVD Method -->
                    <div class="lgd-edu-methods__card lgd-edu-methods__card--cvd">
                        <div class="lgd-edu-methods__icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <rect x="4" y="4" width="16" height="16" rx="2" />
                                <path d="M12 8v8" />
                                <path d="M8 12h8" />
                                <circle cx="12" cy="12" r="2" />
                            </svg>
                        </div>
                        <h2 class="lgd-edu-methods__title">CVD</h2>
                        <p class="lgd-edu-methods__subtitle">Chemical Vapor Deposition</p>
                        <div class="lgd-edu-methods__process">
                            <p><strong>How it works:</strong></p>
                            <ol>
                                <li>A thin diamond "seed" is placed in a vacuum chamber</li>
                                <li>Carbon-rich gas (usually methane) is introduced</li>
                                <li>Microwave energy ionizes the gas into plasma</li>
                                <li>Carbon atoms rain down and crystallize layer by layer</li>
                                <li>Growth continues for 2-4 weeks</li>
                            </ol>
                        </div>
                        <div class="lgd-edu-methods__temp">
                            <span class="lgd-edu-methods__temp-label">Temperature:</span>
                            <span class="lgd-edu-methods__temp-value">700-1,200°C</span>
                        </div>
                    </div>

                    <!-- HPHT Method -->
                    <div class="lgd-edu-methods__card lgd-edu-methods__card--hpht">
                        <div class="lgd-edu-methods__icon">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M12 2L3 7v10l9 5 9-5V7l-9-5z" />
                                <path d="M12 22V12" />
                                <path d="M3 7l9 5 9-5" />
                            </svg>
                        </div>
                        <h2 class="lgd-edu-methods__title">HPHT</h2>
                        <p class="lgd-edu-methods__subtitle">High Pressure, High Temperature</p>
                        <div class="lgd-edu-methods__process">
                            <p><strong>How it works:</strong></p>
                            <ol>
                                <li>Carbon source (graphite) placed in a metal catalyst</li>
                                <li>Massive hydraulic press applies extreme pressure</li>
                                <li>Electric current heats to mantle-like temperatures</li>
                                <li>Carbon dissolves and recrystallizes on a seed</li>
                                <li>Growth completes in days to weeks</li>
                            </ol>
                        </div>
                        <div class="lgd-edu-methods__temp">
                            <span class="lgd-edu-methods__temp-label">Pressure/Temp:</span>
                            <span class="lgd-edu-methods__temp-value">5-6 GPa / 1,300-1,600°C</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- COMPARISON TABLE -->
        <section class="lgd-edu-comparison">
            <div class="ast-container">
                <div class="lgd-edu-comparison__header">
                    <h2 class="lgd-edu-comparison__title">Technical Comparison</h2>
                </div>

                <div class="lgd-edu-comparison__table-wrap">
                    <table class="lgd-edu-comparison__table comparison-table">
                        <thead>
                            <tr>
                                <th>Attribute</th>
                                <th class="cvd-col">CVD</th>
                                <th class="hpht-col">HPHT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Crystal Purity</strong></td>
                                <td class="cvd-col">
                                    <span class="badge badge--success">Type IIa</span>
                                    <br><small>Pure carbon lattice, <0.01% nitrogen</small>
                                </td>
                                <td class="hpht-col">
                                    <span class="badge badge--warning">Type Ib/IIa</span>
                                    <br><small>Often contains nitrogen & boron</small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Color Consistency</strong></td>
                                <td class="cvd-col">
                                    <span class="badge badge--success">Excellent</span>
                                    <br><small>Crisp, pure white appearance</small>
                                </td>
                                <td class="hpht-col">
                                    <span class="badge badge--danger">Variable</span>
                                    <br><small>Blue nuance risk from boron</small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Magnetism</strong></td>
                                <td class="cvd-col">
                                    <span class="badge badge--success">Non-magnetic</span>
                                    <br><small>No metallic inclusions</small>
                                </td>
                                <td class="hpht-col">
                                    <span class="badge badge--warning">Potentially Magnetic</span>
                                    <br><small>Iron/nickel catalyst residue</small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Growth Patterns</strong></td>
                                <td class="cvd-col">
                                    <span class="badge badge--success">Layered (Cubic)</span>
                                    <br><small>Parallel striations, easy to assess</small>
                                </td>
                                <td class="hpht-col">
                                    <span class="badge badge--neutral">Octahedral</span>
                                    <br><small>Natural-like patterns</small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Common Issues</strong></td>
                                <td class="cvd-col">
                                    <small>Brown tinge (treatable), strain graining</small>
                                </td>
                                <td class="hpht-col">
                                    <small>Blue nuance (permanent), metallic flux</small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Post-Growth Treatment</strong></td>
                                <td class="cvd-col">
                                    <small>HPHT annealing to remove brown tint</small>
                                </td>
                                <td class="hpht-col">
                                    <small>Rarely needed; color issues harder to fix</small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Best For</strong></td>
                                <td class="cvd-col">
                                    <span class="badge badge--success">Engagement Rings</span>
                                    <br><small>Consistent D-F color, lifetime wear</small>
                                </td>
                                <td class="hpht-col">
                                    <span class="badge badge--neutral">Industrial/Fashion</span>
                                    <br><small>Good for fancy colors (yellow, blue)</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- CONCLUSION -->
        <section class="lgd-edu-conclusion">
            <div class="ast-container">
                <div class="lgd-edu-conclusion__content">
                    <h2 class="lgd-edu-conclusion__title">Why We Prioritize Type IIa CVD Diamonds</h2>
                    <div class="lgd-edu-conclusion__grid">
                        <div class="lgd-edu-conclusion__text">
                            <p>
                                For engagement rings — symbols meant to last forever — CVD diamonds offer
                                unmatched consistency. The molecular purity of Type IIa CVD stones means:
                            </p>
                            <ul>
                                <li><strong>No blue nuance</strong> that appears under UV light</li>
                                <li><strong>No magnetic pull</strong> from metallic inclusions</li>
                                <li><strong>Treatable brown tint</strong> (unlike permanent HPHT color issues)</li>
                                <li><strong>Pure carbon structure</strong> identical to the finest natural diamonds</li>
                            </ul>
                            <p>
                                This doesn't mean HPHT diamonds are "bad" — they're excellent for fancy colors
                                and industrial applications. But for D-F colorless engagement rings,
                                CVD Type IIa is the forensically superior choice.
                            </p>
                        </div>
                        <div class="lgd-edu-conclusion__callout">
                            <div class="lgd-edu-conclusion__callout-inner">
                                <span class="lgd-edu-conclusion__callout-stat">99%</span>
                                <span class="lgd-edu-conclusion__callout-label">of our engagement-grade inventory is
                                    Type IIa CVD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="lgd-edu-cta">
            <div class="ast-container">
                <h2 class="lgd-edu-cta__title">See the Difference for Yourself</h2>
                <p class="lgd-edu-cta__text">
                    Every diamond listing includes growth method, Type classification, and forensic specifications.
                </p>
                <div class="lgd-edu-cta__buttons">
                    <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="lgd-btn lgd-btn--primary">Browse
                        Verified Diamonds</a>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="lgd-btn lgd-btn--secondary">Our Vetting
                        Process</a>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>