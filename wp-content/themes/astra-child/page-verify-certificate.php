<?php
/**
 * Template Name: Certificate Verification
 *
 * This template provides a frontend interface for verifying diamond 
 * certificates via IGI and GIA lookup services.
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
    'certificate-verify', 
    get_stylesheet_directory_uri() . '/assets/css/certificate-verify.css', 
    array(), 
    ASTRA_CHILD_THEME_VERSION
);

?>

<main id="main" class="site-main cert-verify-page" role="main">
    <div class="cert-verify-container">
        
        <header class="cert-verify-header">
            <h1 class="cert-verify-title">Verify Your Diamond</h1>
            <p class="cert-verify-subtitle">
                Enter your diamond's certificate number to view the original, independent grading report directly from the laboratory.
            </p>
        </header>

        <div class="cert-verify-form-wrapper">
            <form id="certificate-lookup-form" onsubmit="handleCertificateSubmit(event)">
                
                <div class="cert-verify-form-group">
                    <span class="cert-verify-label">Select Laboratory</span>
                    <div class="cert-verify-radio-group">
                        <label class="cert-verify-radio-label">
                            <input type="radio" name="lab_type" value="igi" checked>
                            IGI (International Gemological Institute)
                        </label>
                        <label class="cert-verify-radio-label">
                            <input type="radio" name="lab_type" value="gia">
                            GIA (Gemological Institute of America)
                        </label>
                    </div>
                </div>

                <div class="cert-verify-form-group">
                    <label for="cert_number" class="cert-verify-label">Certificate Number</label>
                    <div class="cert-verify-input-wrapper">
                        <input 
                            type="text" 
                            id="cert_number" 
                            class="cert-verify-input" 
                            placeholder="e.g., 1234567890" 
                            autocomplete="off"
                        >
                        <div id="cert_number_error" class="cert-verify-error">
                            Please enter a valid 10-digit certificate number.
                        </div>
                    </div>
                </div>

                <button type="submit" class="cert-verify-btn">
                    Verify Certificate
                </button>
            </form>
        </div>

    </div>
</main>

<script>
/**
 * Handle certificate verification form submission
 */
function handleCertificateSubmit(event) {
    event.preventDefault();
    
    const certInput = document.getElementById('cert_number');
    const errorMsg = document.getElementById('cert_number_error');
    const certNumber = certInput.value.trim();
    
    // Get selected lab
    let labType = 'igi';
    const radios = document.getElementsByName('lab_type');
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            labType = radios[i].value;
            break;
        }
    }
    
    // Client-side regex validation (10-digit format)
    const isValidFormat = /^\d{10}$/.test(certNumber);
    
    if (!isValidFormat) {
        certInput.classList.add('is-invalid');
        errorMsg.style.display = 'block';
        return false;
    }
    
    // Clear any previous errors
    certInput.classList.remove('is-invalid');
    errorMsg.style.display = 'none';
    
    // Construct lookup URL based on lab
    let reportUrl = '';
    
    if (labType === 'igi') {
        reportUrl = 'https://www.igi.org/verify-your-report/?r=' + encodeURIComponent(certNumber);
    } else if (labType === 'gia') {
        reportUrl = 'https://www.gia.edu/report-check?reportno=' + encodeURIComponent(certNumber);
    }
    
    if (reportUrl !== '') {
        // Open the report in a new tab
        window.open(reportUrl, '_blank', 'noopener,noreferrer');
    }
}

// Add input event listener to clear error on typing
document.getElementById('cert_number').addEventListener('input', function() {
    this.classList.remove('is-invalid');
    document.getElementById('cert_number_error').style.display = 'none';
});
</script>

<?php 
get_footer(); 
?>