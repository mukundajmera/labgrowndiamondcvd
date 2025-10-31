<?php
/**
 * Front Page Template
 * Custom homepage for Lab Grown Diamond CVD
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="main" class="site-main diamond-homepage" role="main">
    
    <?php
    // Hero Section
    get_template_part( 'templates/homepage/hero', 'section' );
    
    // Diamond Search Widget
    get_template_part( 'templates/homepage/diamond-search', 'widget' );
    ?>
    
    <!-- Featured Products Section -->
    <section class="featured-products-section">
        <div class="container">
            <h2 class="section-title"><?php _e( 'Trending Lab-Grown Diamonds', 'astra-child-diamond' ); ?></h2>
            <p class="section-subtitle"><?php _e( 'Hand-picked selection of our most popular diamonds', 'astra-child-diamond' ); ?></p>
            
            <?php
            // Display featured products
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'meta_query' => array(
                    array(
                        'key' => '_featured',
                        'value' => 'yes'
                    )
                )
            );
            
            $featured_query = new WP_Query( $args );
            
            if ( $featured_query->have_posts() ) :
                echo '<div class="products-grid">';
                
                while ( $featured_query->have_posts() ) : $featured_query->the_post();
                    wc_get_template_part( 'content', 'product' );
                endwhile;
                
                echo '</div>';
                
                wp_reset_postdata();
            else :
                echo '<p class="no-products">' . __( 'No featured products found.', 'astra-child-diamond' ) . '</p>';
            endif;
            ?>
            
            <div class="section-cta">
                <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn btn-primary">
                    <?php _e( 'View All Diamonds', 'astra-child-diamond' ); ?>
                </a>
            </div>
        </div>
    </section>
    
    <?php
    // Educational Section
    get_template_part( 'templates/homepage/education', 'section' );
    ?>
    
    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title"><?php _e( 'What Our Customers Say', 'astra-child-diamond' ); ?></h2>
            <p class="section-subtitle"><?php _e( 'Real experiences from real customers', 'astra-child-diamond' ); ?></p>
            
            <?php
            $testimonials_args = array(
                'post_type' => 'testimonials',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $testimonials_query = new WP_Query( $testimonials_args );
            
            if ( $testimonials_query->have_posts() ) :
                echo '<div class="testimonials-grid">';
                
                while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
                    $customer_name = get_post_meta( get_the_ID(), '_customer_name', true );
                    $customer_location = get_post_meta( get_the_ID(), '_customer_location', true );
                    $rating = get_post_meta( get_the_ID(), '_rating', true );
                    $video_url = get_post_meta( get_the_ID(), '_testimonial_video_url', true );
                    ?>
                    
                    <div class="testimonial-card">
                        <?php if ( $video_url ) : ?>
                        <div class="testimonial-video">
                            <iframe src="<?php echo esc_url( $video_url ); ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <?php elseif ( has_post_thumbnail() ) : ?>
                        <div class="testimonial-image">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ( $rating ) : ?>
                        <div class="testimonial-stars">
                            <?php for ( $i = 0; $i < intval( $rating ); $i++ ) : ?>
                                ★
                            <?php endfor; ?>
                        </div>
                        <?php endif; ?>
                        
                        <div class="testimonial-content">
                            <?php the_content(); ?>
                        </div>
                        
                        <div class="testimonial-author">
                            <strong><?php echo esc_html( $customer_name ); ?></strong>
                            <?php if ( $customer_location ) : ?>
                            <span class="location"><?php echo esc_html( $customer_location ); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php
                endwhile;
                
                echo '</div>';
                
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>
    
    <!-- Social Proof / Instagram Feed -->
    <section class="instagram-feed-section">
        <div class="container">
            <h2 class="section-title"><?php _e( '#LabGrownDiamondCVD', 'astra-child-diamond' ); ?></h2>
            <p class="section-subtitle"><?php _e( 'Join thousands of happy customers sharing their stories', 'astra-child-diamond' ); ?></p>
            
            <!-- Placeholder for Instagram feed integration -->
            <div class="instagram-feed-grid">
                <?php for ( $i = 1; $i <= 6; $i++ ) : ?>
                <div class="instagram-post">
                    <div style="background: var(--color-light-grey); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                        <span style="color: var(--color-medium-grey);">Instagram Post <?php echo $i; ?></span>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            
            <div class="section-cta">
                <a href="https://www.instagram.com/" target="_blank" rel="noopener" class="btn btn-outline">
                    <?php _e( 'Follow Us on Instagram', 'astra-child-diamond' ); ?>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Final CTA Section -->
    <section class="final-cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php _e( 'Ready to Find Your Perfect Diamond?', 'astra-child-diamond' ); ?></h2>
                <p><?php _e( 'Browse our collection of ethically sourced, lab-grown diamonds or design your own custom jewelry piece', 'astra-child-diamond' ); ?></p>
                
                <div class="cta-buttons">
                    <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn btn-primary btn-large">
                        <?php _e( 'Shop Diamonds', 'astra-child-diamond' ); ?>
                    </a>
                    <a href="<?php echo home_url( '/custom-jewelry-builder/' ); ?>" class="btn btn-secondary btn-large">
                        <?php _e( 'Build Custom Jewelry', 'astra-child-diamond' ); ?>
                    </a>
                </div>
                
                <div class="contact-options">
                    <span><?php _e( 'Need help? Our experts are here:', 'astra-child-diamond' ); ?></span>
                    <a href="tel:+1234567890" class="contact-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.25 1.12.37 2.32.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <?php _e( 'Call Us', 'astra-child-diamond' ); ?>
                    </a>
                    <a href="#" class="contact-link whatsapp">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        <?php _e( 'WhatsApp Us', 'astra-child-diamond' ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
</main>

<style>
.featured-products-section,
.final-cta-section {
    padding: var(--spacing-xl) var(--spacing-lg);
    background: var(--color-pure-white);
}

.section-cta {
    text-align: center;
    margin-top: var(--spacing-xl);
}

.no-products {
    text-align: center;
    padding: var(--spacing-xl);
    color: var(--color-medium-grey);
}

.final-cta-section {
    background: var(--gradient-blue-black);
    color: var(--color-pure-white);
    text-align: center;
}

.cta-content h2 {
    color: var(--color-pure-white);
    font-size: 2.5rem;
    margin-bottom: var(--spacing-md);
}

.cta-content p {
    font-size: 1.2rem;
    margin-bottom: var(--spacing-xl);
    opacity: 0.95;
}

.cta-buttons {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
    margin-bottom: var(--spacing-lg);
    flex-wrap: wrap;
}

.contact-options {
    display: flex;
    gap: var(--spacing-md);
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    padding-top: var(--spacing-lg);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.contact-link {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-xs);
    color: var(--color-pure-white);
    padding: var(--spacing-sm) var(--spacing-md);
    border: 2px solid var(--color-pure-white);
    border-radius: var(--radius-md);
    transition: all var(--transition-smooth);
}

.contact-link:hover {
    background: var(--color-pure-white);
    color: var(--color-navy-blue);
}

.contact-link.whatsapp:hover {
    background: #25D366;
    border-color: #25D366;
    color: var(--color-pure-white);
}

@media (max-width: 768px) {
    .cta-content h2 {
        font-size: 1.8rem;
    }
    
    .cta-buttons {
        flex-direction: column;
    }
}
</style>

<?php
get_footer();
