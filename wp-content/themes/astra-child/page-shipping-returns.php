<?php
/**
 * Template Name: Shipping & Returns
 *
 * This template displays the Shipping & Returns policies, tiered shipping matrix,
 * and a return authorization request modal.
 *
 * @package Astra Child
 */

get_header();

// Enqueue Shipping & Returns specific stylesheet
wp_enqueue_style('lgd-shipping-returns', get_stylesheet_directory_uri() . '/assets/css/shipping-returns.css', array(), '1.0.0', 'all');
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="lgd-shipping-returns-page ast-container">
            
            <!-- Hero Section -->
            <section class="lgd-policy-hero">
                <h1 class="lgd-policy-hero__title">Shipping & Returns</h1>
                <p class="lgd-policy-hero__subtitle">Enjoy peace of mind with our fully insured shipping and 30-day return policy.</p>
            </section>

            <!-- Tiered Shipping Matrix -->
            <section class="lgd-shipping-matrix-section">
                <h2 class="section-title">Shipping Options & Insurance</h2>
                <div class="lgd-shipping-matrix">
                    <div class="matrix-card">
                        <div class="matrix-card__icon">
                            <!-- SVG Icon for standard -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        </div>
                        <h3 class="matrix-card__title">Standard Delivery</h3>
                        <p class="matrix-card__cost">₹500 / Free over ₹50,000</p>
                        <p class="matrix-card__time">3-5 Business Days (India)</p>
                        <ul class="matrix-card__features">
                            <li>Fully Insured Transit</li>
                            <li>Tracking Provided</li>
                            <li>Signature Required</li>
                        </ul>
                    </div>
                    
                    <div class="matrix-card premium-card">
                        <div class="matrix-card__icon">
                            <!-- SVG Icon for express -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
                        </div>
                        <h3 class="matrix-card__title">Express Delivery</h3>
                        <p class="matrix-card__cost">₹1,500</p>
                        <p class="matrix-card__time">1-2 Business Days (India)</p>
                        <ul class="matrix-card__features">
                            <li>Priority Processing</li>
                            <li>Fully Insured Transit</li>
                            <li>Signature Required</li>
                        </ul>
                    </div>

                    <div class="matrix-card">
                        <div class="matrix-card__icon">
                            <!-- SVG Icon for armored/international -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        </div>
                        <h3 class="matrix-card__title">International & High-Value</h3>
                        <p class="matrix-card__cost">Calculated at Checkout / Free over $1,000</p>
                        <p class="matrix-card__time">7-14 Business Days</p>
                        <ul class="matrix-card__features">
                            <li>Malca-Amit / Brinks Armored Transit</li>
                            <li>100% Value Insurance</li>
                            <li>Customs Clearance Support</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Returns Policy Section -->
            <section class="lgd-returns-policy-section">
                <h2 class="section-title">30-Day Returns & Exchanges</h2>
                <div class="lgd-returns-content">
                    <div class="returns-info">
                        <h3>Full 30-Day Inspection Guarantee</h3>
                        <p>We stand behind the quality of our lab-grown diamonds. If you are not completely satisfied with your purchase, you can return it within 30 days of delivery for a full refund or exchange. The item must be in its original, unworn condition with all accompanying certifications and packaging.</p>
                        
                        <h3>Lifetime Exchange Clause</h3>
                        <p>Any diamond purchased from us can be exchanged at any time in the future for a different size or quality, receiving 100% credit of the original purchase price towards your new selection (new purchase must be at least 2x the value).</p>
                    </div>

                    <div class="returns-protocol">
                        <h3>Step-by-Step Return Protocol</h3>
                        <ol class="protocol-steps">
                            <li>
                                <strong>Request Authorization:</strong> Use the form below to request a Return Authorization (RA) number within 30 days.
                            </li>
                            <li>
                                <strong>Pack Securely:</strong> Include all original packaging and original grading certificates.
                            </li>
                            <li>
                                <strong>Ship Insured:</strong> Ship the item back using our provided fully insured shipping label.
                            </li>
                            <li>
                                <strong>Refund Processing:</strong> Once received and inspected, refunds are processed within 5-7 business days.
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="ra-action-container">
                    <button id="open-ra-modal" class="btn btn-primary">Request Return Authorization</button>
                </div>
            </section>

            <!-- Interactive Return Authorization Request Modal -->
            <div id="ra-modal" class="lgd-modal">
                <div class="lgd-modal-content">
                    <span class="close-modal">&times;</span>
                    <h2>Return Authorization Request</h2>
                    <form id="ra-form" class="lgd-ra-form">
                        <div class="form-group">
                            <label for="order_number">Order Number *</label>
                            <input type="text" id="order_number" name="order_number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason for Return/Exchange *</label>
                            <select id="reason" name="reason" required>
                                <option value="">Select a reason...</option>
                                <option value="size">Wrong Size</option>
                                <option value="style">Style Preference</option>
                                <option value="upgrade">Lifetime Exchange / Upgrade</option>
                                <option value="defect">Quality Issue</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comments">Additional Comments</label>
                            <textarea id="comments" name="comments" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">Submit Request</button>
                    </form>
                </div>
            </div>

        </div><!-- .lgd-shipping-returns-page -->

    </main><!-- #main -->
</div><!-- #primary -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("ra-modal");
    var btn = document.getElementById("open-ra-modal");
    var span = document.getElementsByClassName("close-modal")[0];

    if(btn && modal && span) {
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }

    var form = document.getElementById("ra-form");
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // In a real implementation, this would submit via AJAX
            alert('Your Return Authorization request has been submitted. We will contact you shortly.');
            modal.style.display = "none";
            form.reset();
        });
    }
});
</script>

<?php
get_footer();
