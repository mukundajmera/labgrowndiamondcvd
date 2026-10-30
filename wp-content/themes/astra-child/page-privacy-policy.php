<?php
/**
 * Template Name: Privacy Policy & Digital Data Governance
 * 
 * @package Astra Child Diamond
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Enqueue legal styles specifically for this template as per memory
wp_enqueue_style('diamond-legal-css', get_stylesheet_directory_uri() . '/assets/css/legal.css', array(), null);
?>

<div id="primary" class="content-area lgd-page lgd-legal-page">
    <main id="main" class="site-main">

        <!-- HEADER SECTION -->
        <section class="lgd-legal-header">
            <div class="ast-container">
                <h1 class="lgd-legal-title">Privacy Policy & Digital Data Governance</h1>
                <p class="lgd-legal-subtitle">Effective Date: <?php echo date('F j, Y'); ?></p>
            </div>
        </section>

        <!-- CONTENT SECTION -->
        <section class="lgd-legal-content">
            <div class="ast-container">
                
                <div class="lgd-legal-section">
                    <h2>1. Data Collection & Consent (DPDP Act & GDPR Compliance)</h2>
                    <p>At Lab Grown Diamond CVD, we are committed to protecting your personal information and ensuring full compliance with the Indian Digital Personal Data Protection (DPDP) Act, 2023, and the EU General Data Protection Regulation (GDPR).</p>
                    <p>We collect and process the following categories of data solely based on explicit customer consent:</p>
                    <ul class="lgd-legal-list">
                        <li><strong>Identity & Contact Data:</strong> Name, email address, phone number, shipping and billing address.</li>
                        <li><strong>Transaction Data:</strong> Details of products purchased, order history, and payment status (excluding sensitive financial details).</li>
                        <li><strong>Technical Data:</strong> IP address, browser type, device information, and geographic location to enhance security and user experience.</li>
                    </ul>
                    <p>Your data is collected strictly for the purposes of order fulfillment, customer support, and essential operational analytics. We do not sell or rent your personal data to third-party marketers.</p>
                </div>

                <div class="lgd-legal-section">
                    <h2>2. Data Storage & Security</h2>
                    <p>All personal data is encrypted both in transit (via SSL/TLS) and at rest. We utilize secure servers with industry-standard firewalls and access controls. Data retention policies ensure that your information is kept only for as long as necessary to fulfill the purposes for which it was collected, or to comply with legal, accounting, or reporting requirements.</p>
                </div>

                <div class="lgd-legal-section">
                    <h2>3. Payment Processor Gateway Tokenization</h2>
                    <p>We prioritize your financial security through stringent tokenization practices in compliance with PCI DSS standards. All payment processing is handled by trusted third-party gateways (Razorpay and Stripe).</p>
                    <ul class="lgd-legal-list">
                        <li><strong>Zero Server Storage:</strong> Lab Grown Diamond CVD maintains zero cardholder data on our servers. We never store your full credit/debit card number, CVV, or expiration date.</li>
                        <li><strong>Tokenization:</strong> When you make a purchase, the payment gateway replaces your sensitive card details with a unique, encrypted digital token. Only this token is transmitted and referenced for future authorized transactions or refunds.</li>
                    </ul>
                </div>

                <div class="lgd-legal-section">
                    <h2>4. Cookie Preferences & Tracking Technologies</h2>
                    <p>We use cookies and similar tracking technologies to improve site performance and analyze visitor behavior. You can manage your preferences at any time.</p>
                    
                    <div class="table-responsive">
                        <table class="lgd-legal-table">
                            <thead>
                                <tr>
                                    <th>Cookie Type</th>
                                    <th>Purpose</th>
                                    <th>Duration</th>
                                    <th>Required</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Essential / Functional</strong></td>
                                    <td>Necessary for website functionality (e.g., shopping cart, secure checkout, login state).</td>
                                    <td>Session / 30 Days</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td><strong>Analytics (Google Analytics)</strong></td>
                                    <td>Collects anonymous data on page views, traffic sources, and site interaction.</td>
                                    <td>Up to 2 Years</td>
                                    <td>No (Opt-in)</td>
                                </tr>
                                <tr>
                                    <td><strong>Marketing & Personalization</strong></td>
                                    <td>Used to deliver relevant advertisements and track ad campaign performance.</td>
                                    <td>Up to 1 Year</td>
                                    <td>No (Opt-in)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="lgd-legal-section">
                    <h2>5. Your Rights as a Data Principal / Data Subject</h2>
                    <p>Under the DPDP Act and GDPR, you possess significant rights regarding your personal data. You have the right to:</p>
                    <ul class="lgd-legal-list">
                        <li><strong>Right to Access:</strong> Request a copy of the personal data we hold about you.</li>
                        <li><strong>Right to Correction:</strong> Request correction of inaccurate or incomplete personal data.</li>
                        <li><strong>Right to Erasure (Right to be Forgotten):</strong> Request the deletion of your personal data when it is no longer necessary for the purpose for which it was collected.</li>
                        <li><strong>Right to Withdraw Consent:</strong> Withdraw your consent for data processing at any time without affecting the lawfulness of processing based on consent before its withdrawal.</li>
                        <li><strong>Right to Grievance Redressal:</strong> Submit a complaint to our designated Data Protection Officer regarding data handling.</li>
                    </ul>
                    <p>To exercise any of these rights, please contact our Data Protection Officer at privacy@labgrowndiamondcvd.com.</p>
                </div>

            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>