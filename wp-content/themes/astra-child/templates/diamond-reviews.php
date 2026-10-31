<?php
/**
 * Template Name: Diamond Reviews
 * 
 * Customer reviews showcase template for verified diamond buyers.
 */

get_header();

// Enqueue page-specific CSS
wp_enqueue_style(
    'astra-child-diamond-reviews',
    get_stylesheet_directory_uri() . '/assets/css/reviews.css',
    array(),
    wp_get_theme()->get( 'Version' )
);

?>

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Custom Fine Jewelry and Lab-Grown Diamonds",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "128",
    "bestRating": "5",
    "worstRating": "1"
  }
}
</script>

<div class="diamond-reviews-showcase">
    <div class="reviews-header">
        <h1 class="reviews-title">Verified Diamond Buyer Reviews</h1>
        <p class="reviews-subtitle">Real experiences from our customers. Every review is verified.</p>
        
        <div class="aggregate-rating-summary">
            <div class="stars">
                &#9733;&#9733;&#9733;&#9733;&#9733;
            </div>
            <span class="rating-score">4.9 / 5.0</span>
            <span class="review-count">Based on 128 reviews</span>
        </div>
    </div>

    <div class="reviews-grid">
        <!-- Review 1 -->
        <article class="review-card">
            <div class="review-meta">
                <div class="reviewer-info">
                    <h3 class="reviewer-name">Sarah Jenkins</h3>
                    <span class="verified-buyer-badge">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        Verified Buyer
                    </span>
                </div>
                <div class="review-rating">
                    &#9733;&#9733;&#9733;&#9733;&#9733;
                </div>
            </div>
            
            <div class="review-product-info">
                <span class="product-purchased">Purchased: 2.01ct Oval Lab-Grown Diamond</span>
                <a href="https://www.igi.org/verify-your-report/?r=1234567890" target="_blank" rel="noopener noreferrer" class="igi-verification-pill">
                    Verify IGI 1234567890
                </a>
            </div>

            <div class="review-content">
                <p>Absolutely stunning diamond. The entire process was seamless and the customer service was exceptional. The 360-degree video on the product page matched exactly what I received.</p>
            </div>

            <div class="review-media-grid">
                <a href="#" class="media-thumbnail lightbox-trigger" aria-label="View customer photo">
                    <div class="media-placeholder photo-placeholder">Photo</div>
                </a>
                <a href="#" class="media-thumbnail lightbox-trigger" aria-label="View customer video">
                    <div class="media-placeholder video-placeholder">
                        <span class="play-icon">&#9658;</span>
                    </div>
                </a>
            </div>
        </article>

        <!-- Review 2 -->
        <article class="review-card">
            <div class="review-meta">
                <div class="reviewer-info">
                    <h3 class="reviewer-name">Michael R.</h3>
                    <span class="verified-buyer-badge">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        Verified Buyer
                    </span>
                </div>
                <div class="review-rating">
                    &#9733;&#9733;&#9733;&#9733;&#9733;
                </div>
            </div>
            
            <div class="review-product-info">
                <span class="product-purchased">Purchased: 1.50ct Round Lab-Grown Diamond</span>
                <a href="https://www.igi.org/verify-your-report/?r=0987654321" target="_blank" rel="noopener noreferrer" class="igi-verification-pill">
                    Verify IGI 0987654321
                </a>
            </div>

            <div class="review-content">
                <p>The ring exceeded my expectations. Being able to verify the IGI certificate instantly gave me so much peace of mind. Highly recommended!</p>
            </div>

            <div class="review-media-grid">
                <a href="#" class="media-thumbnail lightbox-trigger" aria-label="View customer photo">
                    <div class="media-placeholder photo-placeholder">Photo</div>
                </a>
            </div>
        </article>
    </div>
</div>

<?php
get_footer();
