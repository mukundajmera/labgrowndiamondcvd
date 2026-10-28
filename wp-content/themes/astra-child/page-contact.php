<?php
/**
 * Template Name: Contact & Bespoke Consultation
 * 
 * LGD Diamond Exchange - Contact Page
 * 
 * @package Astra Child Diamond
 */

if (!defined('ABSPATH')) {
    exit;
}

// Enqueue contact specific CSS inline before header is requested
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('diamond-contact-css', get_stylesheet_directory_uri() . '/assets/css/contact.css', array(), ASTRA_CHILD_THEME_VERSION);
});

get_header();
?>

<div id="primary" class="content-area lgd-page lgd-page--contact">
    <main id="main" class="site-main">

        <!-- HERO SECTION -->
        <section class="lgd-contact-hero">
            <div class="ast-container">
                <h1 class="lgd-contact-hero__headline">Contact <span class="gold-accent">Us</span></h1>
                <p class="lgd-contact-hero__subheadline">
                    Have questions about lab-grown diamonds? Ready to find your perfect stone? Our team of certified gemologists and diamond experts is here to help.
                </p>
            </div>
        </section>

        <section class="lgd-contact-content">
            <div class="ast-container">
                <div class="lgd-contact-layout">
                    
                    <!-- LEFT COLUMN: Forms -->
                    <div class="lgd-contact-column lgd-contact-forms-column">
                        <div class="lgd-form-tabs">
                            <button class="lgd-tab-btn active" data-target="tab-general">General</button>
                            <button class="lgd-tab-btn" data-target="tab-bespoke">Bespoke</button>
                            <button class="lgd-tab-btn" data-target="tab-b2b">Wholesale</button>
                            <button class="lgd-tab-btn" data-target="tab-virtual">Virtual Inspection</button>
                        </div>

                        <div class="lgd-tab-content active" id="tab-general">
                            <h3>General Consultation</h3>
                            <form class="lgd-contact-form">
                                <div class="form-row">
                                    <div class="form-col-half">
                                        <label>Your Name *
                                            <input type="text" name="name" required class="form-input">
                                        </label>
                                    </div>
                                    <div class="form-col-half">
                                        <label>Your Email *
                                            <input type="email" name="email" required class="form-input">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label>Subject
                                        <input type="text" name="subject" class="form-input">
                                    </label>
                                </div>
                                <div class="form-row">
                                    <label>Message *
                                        <textarea name="message" rows="5" required class="form-textarea"></textarea>
                                    </label>
                                </div>
                                <button type="submit" class="btn-primary">Send Message</button>
                            </form>
                        </div>

                        <div class="lgd-tab-content" id="tab-bespoke">
                            <h3>Custom Design Request</h3>
                            <p>Tell us about your dream piece, and our designers will bring it to life!</p>
                            <form class="lgd-contact-form">
                                <div class="form-row">
                                    <div class="form-col-half">
                                        <label>Name *
                                            <input type="text" name="design_name" required class="form-input">
                                        </label>
                                    </div>
                                    <div class="form-col-half">
                                        <label>Email *
                                            <input type="email" name="design_email" required class="form-input">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-col-half">
                                        <label>Jewelry Type
                                            <select name="design_type" class="form-select">
                                                <option>Engagement Ring</option>
                                                <option>Wedding Band</option>
                                                <option>Necklace</option>
                                                <option>Earrings</option>
                                                <option>Other</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="form-col-half">
                                        <label>Budget Range (INR)
                                            <select name="design_budget" class="form-select">
                                                <option>₹25,000 - ₹50,000</option>
                                                <option>₹50,000 - ₹1,00,000</option>
                                                <option>₹1,00,000+</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label>Design Details *
                                        <textarea name="design_details" rows="5" required class="form-textarea" placeholder="Describe your design vision..."></textarea>
                                    </label>
                                </div>
                                <button type="submit" class="btn-primary">Submit Design Request</button>
                            </form>
                        </div>

                        <div class="lgd-tab-content" id="tab-b2b">
                            <h3>Wholesale Partnership</h3>
                            <form class="lgd-contact-form">
                                <div class="form-row">
                                    <div class="form-col-half">
                                        <label>Business Name *
                                            <input type="text" name="b2b_business" required class="form-input">
                                        </label>
                                    </div>
                                    <div class="form-col-half">
                                        <label>Contact Name *
                                            <input type="text" name="b2b_name" required class="form-input">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-col-half">
                                        <label>Email *
                                            <input type="email" name="b2b_email" required class="form-input">
                                        </label>
                                    </div>
                                    <div class="form-col-half">
                                        <label>Phone *
                                            <input type="tel" name="b2b_phone" required class="form-input">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label>Business Type
                                        <select name="b2b_type" class="form-select">
                                            <option>Retail Jewelry Store</option>
                                            <option>Online Retailer</option>
                                            <option>Jewelry Designer</option>
                                            <option>Other</option>
                                        </select>
                                    </label>
                                </div>
                                <button type="submit" class="btn-primary">Submit B2B Application</button>
                            </form>
                        </div>

                        <div class="lgd-tab-content" id="tab-virtual">
                            <h3>Virtual Diamond Inspection</h3>
                            <p>Book a 1-on-1 video call to inspect loose diamonds or jewelry with our experts in 4K resolution.</p>
                            <form class="lgd-contact-form">
                                <div class="form-row">
                                    <div class="form-col-half">
                                        <label>Name *
                                            <input type="text" name="virtual_name" required class="form-input">
                                        </label>
                                    </div>
                                    <div class="form-col-half">
                                        <label>Email *
                                            <input type="email" name="virtual_email" required class="form-input">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-col-half">
                                        <label>Preferred Date
                                            <input type="date" name="virtual_date" required class="form-input">
                                        </label>
                                    </div>
                                    <div class="form-col-half">
                                        <label>Preferred Time
                                            <input type="time" name="virtual_time" required class="form-input">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label>Items to Inspect (SKUs or Description)
                                        <textarea name="virtual_items" rows="3" class="form-textarea"></textarea>
                                    </label>
                                </div>
                                <button type="submit" class="btn-primary">Book Virtual Appointment</button>
                            </form>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN: Contact Details -->
                    <div class="lgd-contact-column lgd-contact-details-column">
                        
                        <div class="lgd-contact-card">
                            <h3>Surat Diamond Bourse (Cutting Lab)</h3>
                            <p><strong>Address:</strong><br>
                            Surat Diamond Bourse, Khajod<br>
                            Surat, Gujarat 395014, India</p>
                            <p><strong>Phone:</strong> +91 98765 43211</p>
                        </div>

                        <div class="lgd-contact-card">
                            <h3>Mumbai Trade Office (Showroom)</h3>
                            <p><strong>Address:</strong><br>
                            Bharat Diamond Bourse, BKC<br>
                            Bandra East, Mumbai, Maharashtra 400051, India</p>
                            <p><strong>Phone:</strong> +91 98765 43210</p>
                            <p><strong>WhatsApp:</strong> <a href="https://wa.me/919876543210">+91 98765 43210</a></p>
                            <p><strong>Email:</strong> info@labgrowndiamondcvd.com</p>
                        </div>

                        <div class="lgd-contact-card lgd-emergency-card">
                            <h3>Emergency Trade Helpline</h3>
                            <p>For urgent B2B/wholesale queries.</p>
                            <p class="lgd-emergency-phone">1800-LGD-TRADE</p>
                        </div>

                        <div class="lgd-contact-card">
                            <h3>Business Hours</h3>
                            <table class="lgd-hours-table">
                                <tr><td>Monday - Saturday</td><td>10:00 AM - 7:00 PM IST</td></tr>
                                <tr><td>Sunday</td><td>Closed</td></tr>
                            </table>
                            <p class="lgd-holidays-note">Closed on major Indian public holidays.</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- MAPS SECTION -->
        <section class="lgd-contact-maps">
            <div class="ast-container">
                <h3 class="lgd-section-title">Our Locations</h3>
                <div class="lgd-maps-grid">
                    <div class="lgd-map-wrap">
                        <h4>Surat Diamond Bourse</h4>
                        <!-- Mock Map Embed -->
                        <div class="lgd-map-placeholder">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.2825026938977!2d72.76616011493108!3d21.1411516859374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04d80f5555555%3A0x123456789abcdef!2sSurat%20Diamond%20Bourse!5e0!3m2!1sen!2sin!4v1620000000000!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="lgd-map-wrap">
                        <h4>Mumbai Trade Office</h4>
                        <!-- Mock Map Embed -->
                        <div class="lgd-map-placeholder">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.825225010674!2d72.86311681489626!3d19.07138018709051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c8e000000001%3A0x123456789abcdef!2sBharat%20Diamond%20Bourse!5e0!3m2!1sen!2sin!4v1620000000000!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQS SECTION -->
        <section class="lgd-contact-faqs">
            <div class="ast-container">
                <h3 class="lgd-section-title">Frequently Asked Questions</h3>
                <div class="lgd-faq-accordion">
                    <div class="lgd-faq-item">
                        <button class="lgd-faq-question">Do you offer in-person consultations?</button>
                        <div class="lgd-faq-answer">
                            <p>Yes! We welcome appointments at our showrooms. Contact us to schedule a private consultation with our gemologist.</p>
                        </div>
                    </div>
                    <div class="lgd-faq-item">
                        <button class="lgd-faq-question">What is your response time?</button>
                        <div class="lgd-faq-answer">
                            <p>We typically respond to all inquiries within 24 hours during business days. Urgent requests are prioritized.</p>
                        </div>
                    </div>
                    <div class="lgd-faq-item">
                        <button class="lgd-faq-question">Do you ship internationally?</button>
                        <div class="lgd-faq-answer">
                            <p>Yes, we ship worldwide with full insurance and tracking. Contact us for international shipping rates.</p>
                        </div>
                    </div>
                    <div class="lgd-faq-item">
                        <button class="lgd-faq-question">Can I see the diamond before purchasing?</button>
                        <div class="lgd-faq-answer">
                            <p>Absolutely! For local customers, visit our showroom. For remote customers, we provide HD videos, 360° imagery, and our Virtual Inspection calls.</p>
                        </div>
                    </div>
                    <div class="lgd-faq-item">
                        <button class="lgd-faq-question">Do you offer custom design services?</button>
                        <div class="lgd-faq-answer">
                            <p>Yes! Our design team can create custom jewelry. Fill out our Bespoke Design form above or contact us directly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tabs Logic
    const tabBtns = document.querySelectorAll('.lgd-tab-btn');
    const tabContents = document.querySelectorAll('.lgd-tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active from all
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));

            // Add active to current
            btn.classList.add('active');
            document.getElementById(btn.dataset.target).classList.add('active');
        });
    });

    // Accordion Logic
    const faqQuestions = document.querySelectorAll('.lgd-faq-question');
    faqQuestions.forEach(btn => {
        btn.addEventListener('click', () => {
            const isActive = btn.classList.contains('active');
            
            // Close all
            faqQuestions.forEach(b => {
                b.classList.remove('active');
                b.nextElementSibling.style.display = 'none';
            });

            // If it wasn't active, open it
            if (!isActive) {
                btn.classList.add('active');
                btn.nextElementSibling.style.display = 'block';
            }
        });
    });
});
</script>

<?php get_footer(); ?>
