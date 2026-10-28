<?php
/**
 * Template Name: Technology Page
 *
 * @package Astra Child
 */

get_header();

// Enqueue specific CSS for this page
wp_enqueue_style('astra-child-technology-css', get_stylesheet_directory_uri() . '/assets/css/technology.css', array(), '1.0.0', 'all');

?>

<div id="primary" class="content-area lgd-technology-page">
    <main id="main" class="site-main">

        <!-- SECTION 1: Introduction -->
        <section class="lgd-tech-intro">
            <div class="lgd-container">
                <h1 class="page-title">CVD Diamond Technology Explained</h1>
                <div class="lgd-tech-intro-content">
                    <p>Lab-grown diamonds represent the pinnacle of modern gemology, combining advanced technology with nature's blueprint. At Lab Grown Diamond CVD, we use Chemical Vapor Deposition (CVD) technology to create diamonds that are chemically, physically, and optically identical to mined diamonds.</p>
                    <p>Unlike mined diamonds that form over billions of years deep within the Earth, our lab-grown diamonds are created in just a few weeks in a controlled environment. This process doesn't just replicate nature—it perfects it. The result is a purer, clearer diamond with fewer impurities, better sustainability, and greater affordability.</p>
                    <p>Whether you're looking for an engagement ring, fine jewelry, or wholesale diamonds, understanding the technology behind lab-grown diamonds helps you make an informed choice. Let's explore how science creates these stunning gems.</p>
                </div>
            </div>
        </section>

        <!-- SECTION 2: What is CVD & Interactive 4-Stage Breakdown -->
        <section class="lgd-tech-cvd-process">
            <div class="lgd-container">
                <h2>What is Chemical Vapor Deposition (CVD)?</h2>
                <p>Chemical Vapor Deposition (CVD) is the most advanced method for creating lab-grown diamonds. This technology was initially developed for industrial applications in the 1980s but has been perfected for gemstone production over the past two decades.</p>
                
                <h3>Interactive CVD Reactor 4-Stage Breakdown</h3>
                <div class="cvd-interactive-breakdown">
                    <div class="cvd-stage" id="stage-1">
                        <div class="stage-icon">1</div>
                        <h4 class="stage-title">Substrate Prep</h4>
                        <p class="stage-desc">A thin slice of diamond seed (typically 10-20 microns thick) is prepared and placed in a vacuum chamber. This seed crystal acts as the foundation upon which the new diamond will grow.</p>
                    </div>
                    <div class="cvd-stage" id="stage-2">
                        <div class="stage-icon">2</div>
                        <h4 class="stage-title">Gas Injection</h4>
                        <p class="stage-desc">The chamber is filled with carbon-rich gases, typically methane (CH₄) and hydrogen (H₂), introduced at very low pressure to create the ideal growth environment.</p>
                    </div>
                    <div class="cvd-stage" id="stage-3">
                        <div class="stage-icon">3</div>
                        <h4 class="stage-title">Microwave Plasma Activation</h4>
                        <p class="stage-desc">Microwave energy (900-1200°C) ionizes the gases, creating a high-energy plasma. This plasma breaks down the methane molecules, freeing carbon atoms.</p>
                    </div>
                    <div class="cvd-stage" id="stage-4">
                        <div class="stage-icon">4</div>
                        <h4 class="stage-title">Carbon Deposition</h4>
                        <p class="stage-desc">Free carbon atoms from the broken methane molecules deposit onto the seed crystal, bonding in the same crystalline structure as natural diamond, layer by layer.</p>
                    </div>
                </div>

                <div class="why-cvd-content">
                    <h4>Why CVD?</h4>
                    <p>CVD produces Type IIa diamonds—the purest type of diamond, found in less than 2% of mined diamonds. These diamonds have:</p>
                    <ul>
                        <li>Higher clarity (fewer nitrogen impurities)</li>
                        <li>Better color grades</li>
                        <li>Superior optical properties</li>
                        <li>Consistent quality control</li>
                    </ul>
                    <p>The entire process is monitored by AI-powered systems that ensure 99.8% grading accuracy.</p>
                </div>
            </div>
        </section>

        <!-- SECTION 3: Purity Comparison & HPHT Comparison -->
        <section class="lgd-tech-comparison luxury-dark-section">
            <div class="lgd-container">
                
                <h2>Type IIa CVD vs Earth-Mined Purity Comparison</h2>
                <div class="table-responsive">
                    <table class="purity-table">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>Type IIa CVD Diamond</th>
                                <th>Earth-Mined Diamond (Typical)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Nitrogen Content</strong></td>
                                <td>Nitrogen &lt; 1 ppm (Ultra-pure)</td>
                                <td>Often &gt; 1000 ppm (Type Ia)</td>
                            </tr>
                            <tr>
                                <td><strong>Thermal Conductivity</strong></td>
                                <td>&gt; 2000 W/(m·K)</td>
                                <td>Variable, often lower due to impurities</td>
                            </tr>
                            <tr>
                                <td><strong>Refractive Index</strong></td>
                                <td>2.417 (Identical)</td>
                                <td>2.417 (Identical)</td>
                            </tr>
                            <tr>
                                <td><strong>Clarity / Color</strong></td>
                                <td>Exceptional (Colorless/Near-Colorless)</td>
                                <td>Highly variable (Yellow/Brown tints common)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h2 class="mt-lg">CVD vs HPHT: Which Technology is Better?</h2>
                <p class="subheading">Understanding the two main methods of lab-grown diamond production</p>
                
                <div class="table-responsive">
                    <table class="comparison-table luxury-table">
                        <thead>
                            <tr>
                                <th>Feature</th>
                                <th>CVD (Chemical Vapor Deposition)</th>
                                <th>HPHT (High Pressure High Temp)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Temperature</strong></td>
                                <td>900-1200°C (moderate)</td>
                                <td>1300-1600°C (extremely high)</td>
                            </tr>
                            <tr>
                                <td><strong>Pressure</strong></td>
                                <td>Low vacuum (&lt; 1 atm)</td>
                                <td>50,000-60,000 atm (extreme)</td>
                            </tr>
                            <tr>
                                <td><strong>Growth Method</strong></td>
                                <td>Gas plasma deposition</td>
                                <td>Molten metal catalyst</td>
                            </tr>
                            <tr>
                                <td><strong>Growth Time</strong></td>
                                <td>2-4 weeks</td>
                                <td>2-6 weeks</td>
                            </tr>
                            <tr>
                                <td><strong>Growth Direction</strong></td>
                                <td>Vertical (cuboid shape)</td>
                                <td>All directions (irregular shape)</td>
                            </tr>
                            <tr>
                                <td><strong>Purity</strong></td>
                                <td>Type IIa (99% of cases)</td>
                                <td>Type IIa (50% of cases)</td>
                            </tr>
                            <tr>
                                <td><strong>Color</strong></td>
                                <td>Colorless to near-colorless</td>
                                <td>Often requires treatment</td>
                            </tr>
                            <tr>
                                <td><strong>Clarity</strong></td>
                                <td>Typically VVS-IF</td>
                                <td>More inclusions common</td>
                            </tr>
                            <tr>
                                <td><strong>Size</strong></td>
                                <td>Can produce larger stones</td>
                                <td>Limited by press size</td>
                            </tr>
                            <tr>
                                <td><strong>Cost</strong></td>
                                <td>Lower operational cost</td>
                                <td>Higher energy cost</td>
                            </tr>
                            <tr>
                                <td><strong>Best For</strong></td>
                                <td>Gemstone quality, large sizes</td>
                                <td>Industrial diamonds, smaller gems</td>
                            </tr>
                            <tr>
                                <td><strong>Quality Control</strong></td>
                                <td>Easier to monitor and control</td>
                                <td>More variables, harder control</td>
                            </tr>
                            <tr>
                                <td><strong>Sustainability</strong></td>
                                <td>Lower energy consumption</td>
                                <td>Higher energy consumption</td>
                            </tr>
                            <tr>
                                <td><strong>Our Choice</strong></td>
                                <td><span class="highlight-check">✅ Primary method</span></td>
                                <td>Used selectively</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="comparison-explanation">
                    <p>While both methods produce real diamonds, CVD technology offers superior advantages for gemstone production:</p>
                    <div class="advantages-grid">
                        <div class="cvd-advantages">
                            <h4>CVD Advantages:</h4>
                            <ul>
                                <li>Purer diamonds (Type IIa) with fewer impurities</li>
                                <li>Better color control, resulting in more colorless stones</li>
                                <li>Larger growth potential (up to 10+ carats rough)</li>
                                <li>Lower environmental impact</li>
                                <li>More consistent quality</li>
                            </ul>
                        </div>
                        <div class="hpht-advantages">
                            <h4>When HPHT is Better:</h4>
                            <ul>
                                <li>Certain fancy colors (blue, yellow) are easier with HPHT</li>
                                <li>Some industrial applications require HPHT characteristics</li>
                                <li>Small melee diamonds (&lt; 0.10ct) can be cost-effective</li>
                            </ul>
                        </div>
                    </div>
                    <p class="final-choice-text">At Lab Grown Diamond CVD, we primarily use CVD technology because it produces the highest quality gemstone diamonds. However, we also use HPHT selectively when it's the best method for specific colors or applications.</p>
                </div>
            </div>
        </section>

        <!-- SECTION 4: Quality Control & AI Inspection -->
        <section class="lgd-tech-quality">
            <div class="lgd-container">
                <h2>AI-Powered Quality Assurance</h2>
                <p class="subheading">99.8% accuracy in diamond grading through advanced technology</p>
                
                <div class="quality-grid">
                    <div class="quality-text">
                        <p>Quality control is where lab-grown diamonds truly excel over mined diamonds. Every step of our process is monitored and verified using cutting-edge technology:</p>
                        
                        <h4>During Growth:</h4>
                        <ul>
                            <li>Real-time sensors monitor temperature, pressure, and gas composition</li>
                            <li>Automated adjustments maintain optimal conditions</li>
                            <li>Growth rate tracking ensures consistent quality</li>
                            <li>Early detection of any imperfections</li>
                        </ul>

                        <h4>After Growth:</h4>
                        <ul>
                            <li>3D scanning creates digital models of each rough diamond</li>
                            <li>AI algorithms analyze clarity, color potential, and optimal cut</li>
                            <li>Computer-aided design maximizes yield and beauty</li>
                            <li>Precision laser cutting guided by AI recommendations</li>
                        </ul>

                        <h4>Final Inspection:</h4>
                        <p>Our AI-powered grading system uses high-resolution microscopy, spectroscopy analysis for color grading, inclusion mapping, and light performance analysis.</p>
                        <p>This technology achieves 99.8% accuracy—matching or exceeding human gemologists—while being completely objective and consistent.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 5: International Certification -->
        <section class="lgd-tech-certification bg-light">
            <div class="lgd-container">
                <h2>Certified by Leading Gemological Institutes</h2>
                <p>Every lab-grown diamond from Lab Grown Diamond CVD comes with certification from internationally recognized gemological laboratories. This independent verification ensures you're getting exactly what you pay for.</p>
                
                <div class="cert-grid">
                    <div class="cert-card">
                        <h3>IGI Certified</h3>
                        <p><strong>International Gemological Institute</strong></p>
                        <p>World's largest independent gemological laboratory. Specializes in lab-grown diamond grading with detailed reports including 4Cs, measurements, and laser inscription.</p>
                    </div>
                    <div class="cert-card">
                        <h3>GIA Certified</h3>
                        <p><strong>Gemological Institute of America</strong></p>
                        <p>Most prestigious and oldest institute (founded 1931). Created the 4Cs grading system. GIA certification adds premium value to our high-end diamonds.</p>
                    </div>
                    <div class="cert-card">
                        <h3>GCAL Certified</h3>
                        <p><strong>Gem Certification & Assurance Lab</strong></p>
                        <p>Known for strictest grading standards. Includes advanced optical performance metrics and 8X Ideal Cut certification.</p>
                    </div>
                </div>
                
                <div class="cert-includes">
                    <h4>What's Included in Certification:</h4>
                    <ul class="columns-2">
                        <li>Carat weight (precise to 0.01ct)</li>
                        <li>Color grade (D-Z scale)</li>
                        <li>Clarity grade (FL to I3)</li>
                        <li>Cut grade (Excellent to Poor)</li>
                        <li>Polish and symmetry grades</li>
                        <li>Fluorescence level</li>
                        <li>Detailed measurements</li>
                        <li>Diagram of inclusions (clarity plot)</li>
                        <li>Certificate number with laser inscription</li>
                        <li>Digital verification via laboratory website</li>
                    </ul>
                    <p class="mt-4"><strong>All certificates are included FREE with every purchase and shipped separately for security.</strong></p>
                </div>
            </div>
        </section>

        <!-- SECTION 6: Environmental Impact & Sustainability -->
        <section class="lgd-tech-environment">
            <div class="lgd-container">
                <h2>Environmental Sustainability: CVD vs Mining</h2>
                <p class="subheading">The eco-friendly choice for conscious consumers</p>
                
                <p class="intro-p">The environmental impact of diamond mining is significant and well-documented. Lab-grown diamonds offer a sustainable alternative with dramatically lower environmental footprint.</p>
                
                <div class="env-comparison-grid">
                    <div class="env-card">
                        <div class="env-icon">💧</div>
                        <h4>Water Usage</h4>
                        <p><strong>Mining:</strong> 126 gallons/carat</p>
                        <p><strong>CVD:</strong> 18 gallons/carat</p>
                        <p class="highlight-green">Savings: 86% less water</p>
                    </div>
                    <div class="env-card">
                        <div class="env-icon">⚡</div>
                        <h4>Energy</h4>
                        <p><strong>Mining:</strong> Extremely high</p>
                        <p><strong>CVD:</strong> Renewable powered</p>
                        <p class="highlight-green">60% lower carbon footprint</p>
                    </div>
                    <div class="env-card">
                        <div class="env-icon">🌍</div>
                        <h4>Land Disturbance</h4>
                        <p><strong>Mining:</strong> 100 sq ft/carat</p>
                        <p><strong>CVD:</strong> Zero</p>
                        <p class="highlight-green">No habitat destruction</p>
                    </div>
                    <div class="env-card">
                        <div class="env-icon">♻️</div>
                        <h4>Waste Generation</h4>
                        <p><strong>Mining:</strong> 250 tons/carat</p>
                        <p><strong>CVD:</strong> Minimal waste</p>
                        <p class="highlight-green">99% less waste</p>
                    </div>
                </div>

                <div class="sustainability-commitment">
                    <h4>Our Sustainability Commitment:</h4>
                    <ul>
                        <li><strong>Renewable Energy:</strong> Our facilities use 100% renewable energy (solar + wind)</li>
                        <li><strong>Carbon Neutral:</strong> All emissions offset through verified carbon credits</li>
                        <li><strong>Water Recycling:</strong> Closed-loop water systems recycle 95% of water</li>
                        <li><strong>Zero Mining:</strong> No land excavation, no ecosystem disruption</li>
                        <li><strong>Local Production:</strong> Made in India reduces transportation emissions</li>
                        <li><strong>Ethical Supply Chain:</strong> Complete transparency, zero conflict</li>
                    </ul>
                    <p class="sustainability-closing">By choosing lab-grown diamonds, you're not just saving money—you're protecting the planet for future generations.</p>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>