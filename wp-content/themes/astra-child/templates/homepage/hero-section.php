<?php
/**
 * Homepage Hero Section Template
 * Full-width video background with headline and CTAs
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$hero_video_url = get_theme_mod( 'hero_video_url', '' );
$hero_headline = get_theme_mod( 'hero_headline', __( 'Ethical Brilliance, Lab-Perfected', 'astra-child-diamond' ) );
$hero_subheadline = get_theme_mod( 'hero_subheadline', __( 'Discover stunning lab-grown diamonds with IGI/GIA certification', 'astra-child-diamond' ) );
?>

<section class="hero-section">
    <?php if ( $hero_video_url ) : ?>
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="<?php echo esc_url( $hero_video_url ); ?>" type="video/mp4">
    </video>
    <?php else : ?>
    <div class="hero-video" style="background: linear-gradient(135deg, #2962FF 0%, #0D47A1 50%, #212121 100%);"></div>
    <?php endif; ?>
    
    <div class="hero-overlay"></div>
    
    <div class="hero-content animate-fade-in">
        <h1 class="hero-headline"><?php echo esc_html( $hero_headline ); ?></h1>
        <?php if ( $hero_subheadline ) : ?>
        <p class="hero-subheadline"><?php echo esc_html( $hero_subheadline ); ?></p>
        <?php endif; ?>
        
        <div class="hero-cta-group">
            <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn btn-primary">
                <?php _e( 'Explore Loose Stones', 'astra-child-diamond' ); ?>
            </a>
            <a href="<?php echo home_url( '/custom-jewelry-builder/' ); ?>" class="btn btn-secondary">
                <?php _e( 'Design Custom Jewelry', 'astra-child-diamond' ); ?>
            </a>
        </div>
        
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">10K+</span>
                <span class="stat-label"><?php _e( 'Diamonds in Stock', 'astra-child-diamond' ); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">100%</span>
                <span class="stat-label"><?php _e( 'Conflict-Free', 'astra-child-diamond' ); ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-number">30-Day</span>
                <span class="stat-label"><?php _e( 'Returns', 'astra-child-diamond' ); ?></span>
            </div>
        </div>
    </div>
</section>

<style>
.hero-stats {
    display: flex;
    justify-content: center;
    gap: 3rem;
    margin-top: 3rem;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--color-pure-white);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.9);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.hero-subheadline {
    font-size: 1.25rem;
    color: rgba(255, 255, 255, 0.95);
    margin-bottom: 2rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

@media (max-width: 768px) {
    .hero-stats {
        gap: 1.5rem;
    }
    
    .stat-number {
        font-size: 1.8rem;
    }
    
    .stat-label {
        font-size: 0.75rem;
    }
}
</style>
