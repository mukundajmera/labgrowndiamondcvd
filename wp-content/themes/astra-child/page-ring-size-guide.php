<?php
/**
 * Template Name: Ring Size Guide
 *
 * @package Astra Child
 */

get_header();

// Enqueue page-specific CSS
wp_enqueue_style('ring-size-guide-css', get_stylesheet_directory_uri() . '/assets/css/ring-size.css', array(), ASTRA_CHILD_THEME_VERSION);

?>

<main id="primary" class="site-main luxury-page">
    <div class="ring-size-container">
        
        <header class="page-header luxury-header">
            <h1 class="page-title">Ring Size Guide</h1>
            <p class="page-subtitle">Find your perfect fit with our precision sizing tools.</p>
        </header>

        <!-- Step 2: Interactive credit-card calibration tool -->
        <section class="calibration-section luxury-section">
            <div class="section-content">
                <h2>Screen Calibration</h2>
                <p>To ensure 100% accurate sizing on your screen, please calibrate using a standard credit card.</p>
                <ol class="calibration-instructions">
                    <li>Place a standard credit card against the screen on the box below.</li>
                    <li>Use the slider to adjust the box size until it perfectly matches your card.</li>
                </ol>
                
                <div class="calibration-tool">
                    <div class="card-outline-container">
                        <div id="card-outline" class="card-outline">
                            <span class="card-label">Standard Credit Card</span>
                            <span class="card-dimensions">85.6mm × 53.98mm</span>
                        </div>
                    </div>
                    
                    <div class="slider-container">
                        <label for="scale-slider">Adjust Scale:</label>
                        <input type="range" id="scale-slider" min="50" max="150" value="100" class="luxury-slider">
                        <span id="scale-value">100%</span>
                    </div>
                    
                    <button id="btn-calibrate" class="btn luxury-btn primary">Confirm Calibration</button>
                    <div id="calibration-success" class="calibration-success hidden">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="success-icon"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Screen calibrated for accurate 1:1 measurement.
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Interactive Ring Sizer (requires calibration) -->
        <section class="on-screen-sizer luxury-section">
            <div class="section-content">
                <h2>On-Screen Measurement</h2>
                <p>Place an existing ring that fits well over the circles below. The inside of the ring should perfectly align with the outer edge of the circle.</p>
                
                <div class="sizer-warning" id="sizer-warning">
                    Please calibrate your screen above before using this tool.
                </div>
                
                <div class="ring-circles-container" id="ring-circles-container" style="opacity: 0.5; pointer-events: none;">
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="3" data-mm="14.1" style="width: 14.1mm; height: 14.1mm;">
                            <span class="ring-size-label">Size 3</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="4" data-mm="14.9" style="width: 14.9mm; height: 14.9mm;">
                            <span class="ring-size-label">Size 4</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="5" data-mm="15.7" style="width: 15.7mm; height: 15.7mm;">
                            <span class="ring-size-label">Size 5</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="6" data-mm="16.5" style="width: 16.5mm; height: 16.5mm;">
                            <span class="ring-size-label">Size 6</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="7" data-mm="17.3" style="width: 17.3mm; height: 17.3mm;">
                            <span class="ring-size-label">Size 7</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="8" data-mm="18.1" style="width: 18.1mm; height: 18.1mm;">
                            <span class="ring-size-label">Size 8</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="9" data-mm="19.0" style="width: 19.0mm; height: 19.0mm;">
                            <span class="ring-size-label">Size 9</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="10" data-mm="19.8" style="width: 19.8mm; height: 19.8mm;">
                            <span class="ring-size-label">Size 10</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="11" data-mm="20.6" style="width: 20.6mm; height: 20.6mm;">
                            <span class="ring-size-label">Size 11</span>
                        </div>
                    </div>
                    <div class="ring-circle-wrapper">
                        <div class="ring-circle" data-size="12" data-mm="21.4" style="width: 21.4mm; height: 21.4mm;">
                            <span class="ring-size-label">Size 12</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Step 3: International ring size conversion chart -->
        <section class="conversion-section luxury-section">
            <div class="section-content">
                <h2>International Ring Size Conversion Chart</h2>
                <p>Use our comprehensive chart to convert your ring size across US, UK, EU, India, and Japan standards, complete with inner diameter and circumference measurements.</p>
                
                <div class="table-responsive">
                    <table class="luxury-table conversion-table">
                        <thead>
                            <tr>
                                <th>Inner Diameter (mm)</th>
                                <th>Inner Circumference (mm)</th>
                                <th>US & Canada</th>
                                <th>UK & Australia</th>
                                <th>EU</th>
                                <th>India & China</th>
                                <th>Japan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>14.1</td>
                                <td>44.2</td>
                                <td>3</td>
                                <td>F</td>
                                <td>44</td>
                                <td>4</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>14.5</td>
                                <td>45.5</td>
                                <td>3.5</td>
                                <td>G</td>
                                <td>45</td>
                                <td>5</td>
                                <td>5</td>
                            </tr>
                            <tr>
                                <td>14.9</td>
                                <td>46.8</td>
                                <td>4</td>
                                <td>H 1/2</td>
                                <td>47</td>
                                <td>7</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <td>15.3</td>
                                <td>48.0</td>
                                <td>4.5</td>
                                <td>I 1/2</td>
                                <td>48</td>
                                <td>8</td>
                                <td>8</td>
                            </tr>
                            <tr>
                                <td>15.7</td>
                                <td>49.3</td>
                                <td>5</td>
                                <td>J 1/2</td>
                                <td>49</td>
                                <td>9</td>
                                <td>9</td>
                            </tr>
                            <tr>
                                <td>16.1</td>
                                <td>50.6</td>
                                <td>5.5</td>
                                <td>L</td>
                                <td>51</td>
                                <td>10</td>
                                <td>11</td>
                            </tr>
                            <tr>
                                <td>16.5</td>
                                <td>51.9</td>
                                <td>6</td>
                                <td>M</td>
                                <td>52</td>
                                <td>12</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>16.9</td>
                                <td>53.1</td>
                                <td>6.5</td>
                                <td>N</td>
                                <td>53</td>
                                <td>13</td>
                                <td>13</td>
                            </tr>
                            <tr>
                                <td>17.3</td>
                                <td>54.4</td>
                                <td>7</td>
                                <td>O</td>
                                <td>54</td>
                                <td>14</td>
                                <td>14</td>
                            </tr>
                            <tr>
                                <td>17.7</td>
                                <td>55.7</td>
                                <td>7.5</td>
                                <td>P</td>
                                <td>56</td>
                                <td>15</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>18.1</td>
                                <td>57.0</td>
                                <td>8</td>
                                <td>Q</td>
                                <td>57</td>
                                <td>17</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td>18.5</td>
                                <td>58.3</td>
                                <td>8.5</td>
                                <td>Q 1/2</td>
                                <td>58</td>
                                <td>18</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td>19.0</td>
                                <td>59.5</td>
                                <td>9</td>
                                <td>R 1/2</td>
                                <td>59</td>
                                <td>19</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <td>19.4</td>
                                <td>60.8</td>
                                <td>9.5</td>
                                <td>S 1/2</td>
                                <td>61</td>
                                <td>20</td>
                                <td>19</td>
                            </tr>
                            <tr>
                                <td>19.8</td>
                                <td>62.1</td>
                                <td>10</td>
                                <td>T 1/2</td>
                                <td>62</td>
                                <td>22</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>20.2</td>
                                <td>63.4</td>
                                <td>10.5</td>
                                <td>U 1/2</td>
                                <td>63</td>
                                <td>23</td>
                                <td>21</td>
                            </tr>
                            <tr>
                                <td>20.6</td>
                                <td>64.6</td>
                                <td>11</td>
                                <td>V 1/2</td>
                                <td>65</td>
                                <td>24</td>
                                <td>23</td>
                            </tr>
                            <tr>
                                <td>21.0</td>
                                <td>65.9</td>
                                <td>11.5</td>
                                <td>W 1/2</td>
                                <td>66</td>
                                <td>25</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td>21.4</td>
                                <td>67.2</td>
                                <td>12</td>
                                <td>Y</td>
                                <td>67</td>
                                <td>27</td>
                                <td>25</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        <!-- Step 4: Printable sizer modal -->
        <section class="printable-section luxury-section">
            <div class="section-content">
                <h2>Printable Ring Sizer</h2>
                <p>For the most accurate measurement, download and print our physical ring sizer tool.</p>
                <div class="print-actions">
                    <button id="btn-open-print-modal" class="btn luxury-btn primary">Open Printable Sizer</button>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- Printable Sizer Modal -->
<div id="print-modal" class="modal-overlay hidden">
    <div class="modal-content luxury-modal">
        <button id="btn-close-modal" class="close-modal" aria-label="Close modal">&times;</button>
        <div class="modal-header">
            <h2>Printable Ring Sizer Tool</h2>
        </div>
        <div class="modal-body">
            <div class="print-instructions">
                <h3>Printing Instructions</h3>
                <ul>
                    <li>Ensure your printer is set to <strong>100% scale</strong> or <strong>Actual Size</strong>.</li>
                    <li>Do not select "Fit to Page" or "Scale to Fit".</li>
                    <li>Verify the printed scale below with a ruler before use.</li>
                </ul>
            </div>
            
            <div class="print-area" id="print-area">
                <div class="print-header">
                    <h2>Lab Grown Diamond CVD - Ring Sizer</h2>
                </div>
                
                <div class="print-scale-check">
                    <p><strong>Scale Check:</strong> This line must measure exactly 50mm (5cm)</p>
                    <div class="scale-line" style="width: 50mm; height: 2px; background: #000; margin: 10px auto;"></div>
                </div>
                
                <div class="cutout-instructions">
                    <h3>How to use:</h3>
                    <ol>
                        <li>Cut out the sizer carefully along the outer lines.</li>
                        <li>Cut a small slit along the dotted line marked "Cut Here".</li>
                        <li>Slip the pointed end through the slit to create a loop.</li>
                        <li>Place the loop around your finger and pull until it fits comfortably.</li>
                        <li>Read the size aligned with the slit edge.</li>
                    </ol>
                </div>
                
                <div class="cutout-tool">
                    <!-- Visual representation of the cutout sizer -->
                    <div class="sizer-strip">
                        <div class="sizer-slit">Cut Here</div>
                        <div class="sizer-marks">
                            <span class="mark" style="left: 20%">4</span>
                            <span class="mark" style="left: 30%">5</span>
                            <span class="mark" style="left: 40%">6</span>
                            <span class="mark" style="left: 50%">7</span>
                            <span class="mark" style="left: 60%">8</span>
                            <span class="mark" style="left: 70%">9</span>
                            <span class="mark" style="left: 80%">10</span>
                            <span class="mark" style="left: 90%">11</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="btn-print" class="btn luxury-btn primary">Print Sizer</button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('scale-slider');
    const scaleValue = document.getElementById('scale-value');
    const cardOutline = document.getElementById('card-outline');
    const btnCalibrate = document.getElementById('btn-calibrate');
    const successMsg = document.getElementById('calibration-success');
    const sizerWarning = document.getElementById('sizer-warning');
    const ringContainer = document.getElementById('ring-circles-container');
    const ringCircles = document.querySelectorAll('.ring-circle');
    
    // Initial standard card width in CSS pixels (approximate for 85.6mm at 96dpi is 323.5px)
    // We'll set the base width inline and scale it via JS based on the slider.
    // CSS sets .card-outline to width: 85.6mm, height: 53.98mm
    
    let currentScale = 1;
    
    slider.addEventListener('input', function() {
        currentScale = this.value / 100;
        scaleValue.textContent = this.value + '%';
        cardOutline.style.transform = `scale(${currentScale})`;
    });
    
    btnCalibrate.addEventListener('click', function() {
        successMsg.classList.remove('hidden');
        sizerWarning.style.display = 'none';
        
        // Enable ring circles
        ringContainer.style.opacity = '1';
        ringContainer.style.pointerEvents = 'auto';
        
        // Apply scale to ring circles
        ringCircles.forEach(circle => {
            circle.style.transform = `scale(${currentScale})`;
        });
        
        setTimeout(() => {
            successMsg.classList.add('fade-out');
            setTimeout(() => {
                successMsg.classList.add('hidden');
                successMsg.classList.remove('fade-out');
            }, 500);
        }, 3000);
    });

    // Modal functionality
    const modal = document.getElementById('print-modal');
    const btnOpenModal = document.getElementById('btn-open-print-modal');
    const btnCloseModal = document.getElementById('btn-close-modal');
    const btnPrint = document.getElementById('btn-print');

    btnOpenModal.addEventListener('click', function() {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    });

    btnCloseModal.addEventListener('click', function() {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    });

    // Close on outside click
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    });

    // Print functionality
    btnPrint.addEventListener('click', function() {
        // Trigger browser print
        window.print();
    });
});
</script>

<?php get_footer(); ?>
