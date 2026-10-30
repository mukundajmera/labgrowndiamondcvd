<?php
/**
 * Template Name: Terms & Conditions
 *
 * @package Astra Child
 */

get_header();

wp_enqueue_style( 'terms-css', get_stylesheet_directory_uri() . '/assets/css/terms.css', array(), '1.0.0' );

?>

<div id="primary" class="content-area terms-container">
    <main id="main" class="site-main">

        <header class="terms-header entry-header">
            <h1 class="entry-title">Terms & Conditions</h1>
            <p class="terms-last-updated">Last Updated: <?php echo get_the_modified_date(); ?></p>
        </header>

        <div class="terms-content entry-content">
            
            <section class="terms-section" id="acceptance">
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement. In addition, when using this website's particular services, you shall be subject to any posted guidelines or rules applicable to such services.</p>
            </section>

            <section class="terms-section" id="use-of-website">
                <h2>2. Use of Website</h2>
                <p>The site and its original content, features, and functionality are owned by Lab-Grown Diamond CVD and are protected by international copyright, trademark, patent, trade secret, and other intellectual property or proprietary rights laws.</p>
            </section>

            <section class="terms-section" id="product-information">
                <h2>3. Product Information and Availability</h2>
                <p>We make every effort to display as accurately as possible the colors, features, specifications, and details of the products available on the site. However, we do not guarantee that the colors, features, specifications, and details of the products will be accurate, complete, reliable, current, or free of other errors, and your electronic display may not accurately reflect the actual colors and details of the products. All products are subject to availability, and we cannot guarantee that items will be in stock.</p>
            </section>

            <section class="terms-section" id="pricing">
                <h2>4. Pricing and Payment</h2>
                <p>All prices are subject to change without notice. We reserve the right to modify prices based on market fluctuations. </p>
                <p><strong>Pricing Fluctuation Clause:</strong> Our carat pricing is dynamically linked to the Rapaport and IDEX Lab Grown Diamond (LGD) indices. Prices may be updated periodically to reflect current market conditions based on these indices. The price applicable to your order will be the price at the time the order is finalized and payment is processed.</p>
                <p>We accept various payment methods as indicated on our checkout page. By providing payment information, you represent and warrant that you have the legal right to use any payment method(s) utilized in connection with any transaction.</p>
            </section>

            <section class="terms-section" id="shipping">
                <h2>5. Shipping and Delivery</h2>
                <p>Please refer to our <a href="/shipping-returns/">Shipping & Returns Policy</a> for detailed information regarding shipping rates, delivery times, and insurance for your orders.</p>
            </section>

            <section class="terms-section" id="returns">
                <h2>6. Returns and Refunds</h2>
                <p>We offer a 30-day return policy for eligible items. Custom-designed pieces and engraved items are generally non-returnable unless defective. For complete details, process, and conditions, please consult our <a href="/shipping-returns/">Shipping & Returns Policy</a>.</p>
            </section>

            <section class="terms-section" id="intellectual-property">
                <h2>7. Intellectual Property</h2>
                <p>All content on this website, including but not limited to text, graphics, logos, images, audio clips, digital downloads, and software, is the property of Lab-Grown Diamond CVD or its content suppliers and protected by international copyright laws. The compilation of all content on this site is the exclusive property of Lab-Grown Diamond CVD.</p>
            </section>

            <section class="terms-section" id="liability">
                <h2>8. Limitation of Liability</h2>
                <p><strong>CVD Diamond Authenticity Warranty:</strong> We warrant that all diamonds sold are authentic Lab-Grown CVD diamonds as described. </p>
                <p><strong>Certification Verification Liability Limit:</strong> Our diamonds are certified by independent third-party laboratories (IGI/GIA). While we guarantee the provision of these certificates, our liability regarding the specific grading (color, clarity, cut) is limited to the verification provided by these independent institutes. We do not assume liability for discrepancies arising from differing subjective grading standards applied by other gemological entities subsequent to the sale.</p>
                <p>In no event shall Lab-Grown Diamond CVD, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from your access to or use of or inability to access or use the service.</p>
            </section>

            <section class="terms-section" id="governing-law">
                <h2>9. Governing Law and Jurisdiction</h2>
                <p>These Terms shall be governed and construed in accordance with the laws of India, without regard to its conflict of law provisions.</p>
                <p><strong>Dispute Resolution:</strong> Any dispute, controversy, or claim arising out of or relating to these Terms, or the breach, termination, or invalidity thereof, shall be subject to the exclusive jurisdiction of the competent courts located in Surat / Mumbai, India.</p>
            </section>

            <section class="terms-section" id="contact">
                <h2>10. Contact Information</h2>
                <p>If you have any questions about these Terms, please contact us at:</p>
                <p>
                    Lab-Grown Diamond CVD<br>
                    Email: <a href="mailto:info@labgrowndiamondcvd.com">info@labgrowndiamondcvd.com</a><br>
                    Phone: +91-XXXXXXXXXX (Replace with actual phone number)
                </p>
                <p>Or visit our <a href="/contact/">Contact Page</a> for more options.</p>
            </section>

        </div><!-- .terms-content -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
