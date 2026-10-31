<?php
/**
 * Template Name: Track Order
 *
 * This template provides a frontend interface for tracking insured 
 * armored shipments and the diamond creation pipeline.
 *
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Enqueue page-specific CSS
wp_enqueue_style(
    'track-order-css', 
    get_stylesheet_directory_uri() . '/assets/css/track-order.css', 
    array(), 
    wp_get_theme()->get('Version')
);

?>

<main id="main" class="site-main track-order-page" role="main">
    <div class="track-order-container">
        
        <header class="track-order-header">
            <h1 class="track-order-title">Track Armored Shipment</h1>
            <p class="track-order-subtitle">
                Enter your Order ID and Security Verification Code to track the journey of your diamond through synthesis, cutting, certification, and insured armored transit.
            </p>
        </header>

        <!-- Authentication Form -->
        <div id="track-auth-section" class="track-auth-form-wrapper">
            <form id="track-order-form" onsubmit="handleTrackOrderSubmit(event)">
                
                <div class="track-form-group">
                    <label for="order_id" class="track-form-label">Order ID</label>
                    <input 
                        type="text" 
                        id="order_id" 
                        class="track-form-input" 
                        placeholder="e.g., LGD-84920" 
                        autocomplete="off"
                        required
                    >
                    <div id="order_id_error" class="track-form-error">
                        Please enter a valid Order ID.
                    </div>
                </div>

                <div class="track-form-group">
                    <label for="security_code" class="track-form-label">Security Verification Code</label>
                    <input 
                        type="password" 
                        id="security_code" 
                        class="track-form-input" 
                        placeholder="6-Digit Security Code" 
                        autocomplete="off"
                        required
                    >
                    <div id="security_code_error" class="track-form-error">
                        Please enter a valid 6-digit security code.
                    </div>
                </div>

                <button type="submit" class="track-auth-btn">
                    Authenticate & Track
                </button>
            </form>
        </div>

        <!-- Tracking Details (Hidden until authenticated) -->
        <div id="tracking-details-section" class="tracking-details-section">
            
            <!-- Carrier Selection for Demo purposes -->
            <div class="carrier-selector">
                <label for="carrier_select" style="font-family:'Inter',sans-serif;font-size:0.9rem;margin-right:10px;">Select Carrier View:</label>
                <select id="carrier_select" class="carrier-select" onchange="updateCarrierView()">
                    <option value="brinks">Brinks</option>
                    <option value="malca-amit">Malca-Amit</option>
                    <option value="bluedart">BlueDart Apex</option>
                </select>
            </div>

            <div class="tracking-carrier-info">
                <div class="carrier-logo-name">
                    <span class="carrier-label">Insured Logistics Partner</span>
                    <span id="display_carrier_name" class="carrier-name">Brinks Armored Transit</span>
                </div>
                <div class="tracking-status-badge">
                    In Transit
                </div>
            </div>

            <div class="tracking-timeline">
                
                <!-- Step 1 -->
                <div class="timeline-step completed">
                    <div class="timeline-icon">✓</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">CVD Synthesis Verification</h3>
                        <p class="timeline-desc">Rough diamond crystallization complete. Plasma synthesis parameters verified by chief engineers.</p>
                        <span class="timeline-date">Oct 12, 2024 - 09:00 AM</span>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="timeline-step completed">
                    <div class="timeline-icon">✓</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Master Gemologist Cutting</h3>
                        <p class="timeline-desc">Precision laser sawing and expert faceting finished. Exact symmetry and polish achieved.</p>
                        <span class="timeline-date">Oct 18, 2024 - 02:30 PM</span>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="timeline-step completed">
                    <div class="timeline-icon">✓</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">IGI Grading</h3>
                        <p class="timeline-desc">Diamond certified by International Gemological Institute. Inscription confirmed.</p>
                        <span class="timeline-date">Oct 24, 2024 - 11:15 AM</span>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="timeline-step active">
                    <div class="timeline-icon">🚚</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Insured Armored Dispatch</h3>
                        <p class="timeline-desc">Parcel securely loaded into armored vehicle under CCTV surveillance. Fully insured transit initiated.</p>
                        <span class="timeline-date">Oct 26, 2024 - 08:45 AM</span>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="timeline-step">
                    <div class="timeline-icon">🔒</div>
                    <div class="timeline-content">
                        <h3 class="timeline-title">Doorstep Delivery with OTP</h3>
                        <p class="timeline-desc">Pending delivery. Requires valid government ID and OTP verification upon arrival.</p>
                        <span class="timeline-date">Estimated: Oct 28, 2024</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

<script>
/**
 * Handle Track Order Form Submission
 */
function handleTrackOrderSubmit(event) {
    event.preventDefault();
    
    const orderIdInput = document.getElementById('order_id');
    const securityCodeInput = document.getElementById('security_code');
    
    const orderId = orderIdInput.value.trim();
    const securityCode = securityCodeInput.value.trim();
    
    let hasError = false;

    // Validate Order ID
    if (orderId.length < 3) {
        orderIdInput.classList.add('is-invalid');
        document.getElementById('order_id_error').style.display = 'block';
        hasError = true;
    } else {
        orderIdInput.classList.remove('is-invalid');
        document.getElementById('order_id_error').style.display = 'none';
    }

    // Validate Security Code (expecting 6 digits for this dummy auth)
    const isSecurityCodeValid = /^\d{6}$/.test(securityCode);
    if (!isSecurityCodeValid) {
        securityCodeInput.classList.add('is-invalid');
        document.getElementById('security_code_error').style.display = 'block';
        hasError = true;
    } else {
        securityCodeInput.classList.remove('is-invalid');
        document.getElementById('security_code_error').style.display = 'none';
    }

    if (hasError) {
        return false;
    }

    // Simulate authentication success
    document.getElementById('track-auth-section').style.display = 'none';
    document.getElementById('tracking-details-section').style.display = 'block';
}

/**
 * Handle Carrier Change
 */
function updateCarrierView() {
    const select = document.getElementById('carrier_select');
    const carrierNameDisplay = document.getElementById('display_carrier_name');
    
    if (select.value === 'brinks') {
        carrierNameDisplay.textContent = 'Brinks Armored Transit';
    } else if (select.value === 'malca-amit') {
        carrierNameDisplay.textContent = 'Malca-Amit Secure Logistics';
    } else if (select.value === 'bluedart') {
        carrierNameDisplay.textContent = 'BlueDart Apex Premium';
    }
}

// Clear errors on input
document.getElementById('order_id').addEventListener('input', function() {
    this.classList.remove('is-invalid');
    document.getElementById('order_id_error').style.display = 'none';
});

document.getElementById('security_code').addEventListener('input', function() {
    this.classList.remove('is-invalid');
    document.getElementById('security_code_error').style.display = 'none';
});
</script>

<?php 
get_footer(); 
?>