<?php
/**
 * AJAX Handlers for Theme Functionality
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get diamond count based on filters
 */
function astra_child_ajax_get_diamond_count() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    $filters = isset( $_POST['filters'] ) ? $_POST['filters'] : array();
    
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'meta_query' => array()
    );
    
    // Add meta queries based on filters
    if ( ! empty( $filters['shape'] ) ) {
        $args['meta_query'][] = array(
            'key' => '_diamond_shape',
            'value' => sanitize_text_field( $filters['shape'] ),
            'compare' => '='
        );
    }
    
    if ( ! empty( $filters['carat_min'] ) || ! empty( $filters['carat_max'] ) ) {
        $carat_query = array( 'key' => '_diamond_carat', 'type' => 'DECIMAL' );
        
        if ( ! empty( $filters['carat_min'] ) && ! empty( $filters['carat_max'] ) ) {
            $carat_query['value'] = array( floatval( $filters['carat_min'] ), floatval( $filters['carat_max'] ) );
            $carat_query['compare'] = 'BETWEEN';
        } elseif ( ! empty( $filters['carat_min'] ) ) {
            $carat_query['value'] = floatval( $filters['carat_min'] );
            $carat_query['compare'] = '>=';
        } elseif ( ! empty( $filters['carat_max'] ) ) {
            $carat_query['value'] = floatval( $filters['carat_max'] );
            $carat_query['compare'] = '<=';
        }
        
        $args['meta_query'][] = $carat_query;
    }
    
    if ( ! empty( $filters['color'] ) ) {
        $args['meta_query'][] = array(
            'key' => '_diamond_color',
            'value' => sanitize_text_field( $filters['color'] ),
            'compare' => '='
        );
    }
    
    if ( ! empty( $filters['clarity'] ) ) {
        $args['meta_query'][] = array(
            'key' => '_diamond_clarity',
            'value' => sanitize_text_field( $filters['clarity'] ),
            'compare' => '='
        );
    }
    
    if ( ! empty( $filters['cut'] ) ) {
        $args['meta_query'][] = array(
            'key' => '_diamond_cut',
            'value' => sanitize_text_field( $filters['cut'] ),
            'compare' => '='
        );
    }
    
    $query = new WP_Query( $args );
    
    wp_send_json_success( array( 'count' => $query->found_posts ) );
}
add_action( 'wp_ajax_get_diamond_count', 'astra_child_ajax_get_diamond_count' );
add_action( 'wp_ajax_nopriv_get_diamond_count', 'astra_child_ajax_get_diamond_count' );

/**
 * Get product quick view content
 */
function astra_child_ajax_get_product_quick_view() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    $product_id = isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : 0;
    
    if ( ! $product_id ) {
        wp_send_json_error( array( 'message' => __( 'Invalid product ID', 'astra-child-diamond' ) ) );
    }
    
    $product = wc_get_product( $product_id );
    
    if ( ! $product ) {
        wp_send_json_error( array( 'message' => __( 'Product not found', 'astra-child-diamond' ) ) );
    }
    
    ob_start();
    ?>
    <div class="quick-view-product">
        <div class="quick-view-image">
            <?php echo $product->get_image( 'medium' ); ?>
        </div>
        <div class="quick-view-details">
            <h2><?php echo $product->get_name(); ?></h2>
            <div class="price"><?php echo $product->get_price_html(); ?></div>
            
            <?php if ( $product->get_short_description() ) : ?>
            <div class="short-description">
                <?php echo $product->get_short_description(); ?>
            </div>
            <?php endif; ?>
            
            <div class="diamond-specs-quick">
                <?php
                $specs = array(
                    'shape' => get_post_meta( $product_id, '_diamond_shape', true ),
                    'carat' => get_post_meta( $product_id, '_diamond_carat', true ),
                    'color' => get_post_meta( $product_id, '_diamond_color', true ),
                    'clarity' => get_post_meta( $product_id, '_diamond_clarity', true ),
                    'cut' => get_post_meta( $product_id, '_diamond_cut', true ),
                );
                
                if ( array_filter( $specs ) ) {
                    echo '<ul class="specs-list">';
                    if ( $specs['carat'] ) echo '<li><strong>' . __( 'Carat:', 'astra-child-diamond' ) . '</strong> ' . $specs['carat'] . '</li>';
                    if ( $specs['color'] ) echo '<li><strong>' . __( 'Color:', 'astra-child-diamond' ) . '</strong> ' . $specs['color'] . '</li>';
                    if ( $specs['clarity'] ) echo '<li><strong>' . __( 'Clarity:', 'astra-child-diamond' ) . '</strong> ' . $specs['clarity'] . '</li>';
                    if ( $specs['cut'] ) echo '<li><strong>' . __( 'Cut:', 'astra-child-diamond' ) . '</strong> ' . ucfirst( str_replace( '-', ' ', $specs['cut'] ) ) . '</li>';
                    echo '</ul>';
                }
                ?>
            </div>
            
            <div class="quick-view-actions">
                <a href="<?php echo get_permalink( $product_id ); ?>" class="btn btn-primary">
                    <?php _e( 'View Full Details', 'astra-child-diamond' ); ?>
                </a>
                <?php if ( $product->is_purchasable() && $product->is_in_stock() ) : ?>
                <button class="btn btn-outline add-to-cart-btn" data-product-id="<?php echo $product_id; ?>">
                    <?php _e( 'Add to Cart', 'astra-child-diamond' ); ?>
                </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    $html = ob_get_clean();
    
    wp_send_json_success( array( 'html' => $html ) );
}
add_action( 'wp_ajax_get_product_quick_view', 'astra_child_ajax_get_product_quick_view' );
add_action( 'wp_ajax_nopriv_get_product_quick_view', 'astra_child_ajax_get_product_quick_view' );

/**
 * Get product comparison data
 */
function astra_child_ajax_get_product_comparison() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    $product_ids = isset( $_POST['product_ids'] ) ? array_map( 'intval', $_POST['product_ids'] ) : array();
    
    if ( empty( $product_ids ) || count( $product_ids ) < 2 ) {
        wp_send_json_error( array( 'message' => __( 'At least 2 products required', 'astra-child-diamond' ) ) );
    }
    
    $products = array();
    
    foreach ( $product_ids as $product_id ) {
        $product = wc_get_product( $product_id );
        
        if ( ! $product ) {
            continue;
        }
        
        $products[] = array(
            'id' => $product_id,
            'name' => $product->get_name(),
            'price' => $product->get_price_html(),
            'image' => wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail' ),
            'url' => get_permalink( $product_id ),
            'specs' => array(
                'shape' => get_post_meta( $product_id, '_diamond_shape', true ),
                'carat' => get_post_meta( $product_id, '_diamond_carat', true ),
                'color' => get_post_meta( $product_id, '_diamond_color', true ),
                'clarity' => get_post_meta( $product_id, '_diamond_clarity', true ),
                'cut' => get_post_meta( $product_id, '_diamond_cut', true ),
                'polish' => get_post_meta( $product_id, '_diamond_polish', true ),
                'symmetry' => get_post_meta( $product_id, '_diamond_symmetry', true ),
                'fluorescence' => get_post_meta( $product_id, '_diamond_fluorescence', true ),
                'table' => get_post_meta( $product_id, '_diamond_table', true ),
                'depth' => get_post_meta( $product_id, '_diamond_depth', true ),
                'measurements' => get_post_meta( $product_id, '_diamond_measurements', true ),
                'certification' => strtoupper( get_post_meta( $product_id, '_diamond_certification', true ) ),
            )
        );
    }
    
    wp_send_json_success( array( 'products' => $products ) );
}
add_action( 'wp_ajax_get_product_comparison', 'astra_child_ajax_get_product_comparison' );
add_action( 'wp_ajax_nopriv_get_product_comparison', 'astra_child_ajax_get_product_comparison' );

/**
 * Save custom jewelry design
 */
function astra_child_ajax_save_custom_jewelry_design() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    if ( ! is_user_logged_in() ) {
        wp_send_json_error( array( 'message' => __( 'You must be logged in', 'astra-child-diamond' ) ) );
    }
    
    $selections = isset( $_POST['selections'] ) ? $_POST['selections'] : array();
    $prices = isset( $_POST['prices'] ) ? $_POST['prices'] : array();
    
    // Create a new jewelry design post
    $design_id = wp_insert_post( array(
        'post_type' => 'jewelry_design',
        'post_title' => 'Custom Design ' . date( 'Y-m-d H:i:s' ),
        'post_status' => 'publish',
        'post_author' => get_current_user_id(),
    ) );
    
    if ( $design_id ) {
        update_post_meta( $design_id, '_design_selections', $selections );
        update_post_meta( $design_id, '_design_prices', $prices );
        update_post_meta( $design_id, '_design_total', array_sum( $prices ) );
        
        wp_send_json_success( array(
            'design_id' => $design_id,
            'message' => __( 'Design saved successfully', 'astra-child-diamond' )
        ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'Failed to save design', 'astra-child-diamond' ) ) );
    }
}
add_action( 'wp_ajax_save_custom_jewelry_design', 'astra_child_ajax_save_custom_jewelry_design' );

/**
 * Add custom jewelry to cart
 */
function astra_child_ajax_add_custom_jewelry_to_cart() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    $selections = isset( $_POST['selections'] ) ? $_POST['selections'] : array();
    $prices = isset( $_POST['prices'] ) ? $_POST['prices'] : array();
    
    // In a real implementation, this would create a custom product or add cart item data
    // For now, we'll return success with cart URL
    
    wp_send_json_success( array(
        'message' => __( 'Added to cart', 'astra-child-diamond' ),
        'cart_url' => wc_get_cart_url()
    ) );
}
add_action( 'wp_ajax_add_custom_jewelry_to_cart', 'astra_child_ajax_add_custom_jewelry_to_cart' );

/**
 * Subscribe to newsletter
 */
function astra_child_ajax_newsletter_subscribe() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    
    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Invalid email address', 'astra-child-diamond' ) ) );
    }
    
    // Store subscriber email (integrate with your email marketing service)
    $subscribers = get_option( 'diamond_newsletter_subscribers', array() );
    
    if ( ! in_array( $email, $subscribers ) ) {
        $subscribers[] = $email;
        update_option( 'diamond_newsletter_subscribers', $subscribers );
        
        wp_send_json_success( array( 'message' => __( 'Thank you for subscribing!', 'astra-child-diamond' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'You are already subscribed', 'astra-child-diamond' ) ) );
    }
}
add_action( 'wp_ajax_newsletter_subscribe', 'astra_child_ajax_newsletter_subscribe' );
add_action( 'wp_ajax_nopriv_newsletter_subscribe', 'astra_child_ajax_newsletter_subscribe' );

/**
 * Contact form submission
 */
function astra_child_ajax_contact_form() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';
    
    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all required fields', 'astra-child-diamond' ) ) );
    }
    
    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Invalid email address', 'astra-child-diamond' ) ) );
    }
    
    // Send email
    $to = get_option( 'admin_email' );
    $email_subject = 'Contact Form: ' . $subject;
    $email_body = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
    $headers = array( 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" );
    
    if ( wp_mail( $to, $email_subject, $email_body, $headers ) ) {
        wp_send_json_success( array( 'message' => __( 'Thank you! Your message has been sent.', 'astra-child-diamond' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'Failed to send message. Please try again.', 'astra-child-diamond' ) ) );
    }
}
add_action( 'wp_ajax_contact_form', 'astra_child_ajax_contact_form' );
add_action( 'wp_ajax_nopriv_contact_form', 'astra_child_ajax_contact_form' );

/**
 * Schedule video call
 */
function astra_child_ajax_schedule_video_call() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
    $preferred_date = isset( $_POST['preferred_date'] ) ? sanitize_text_field( $_POST['preferred_date'] ) : '';
    $preferred_time = isset( $_POST['preferred_time'] ) ? sanitize_text_field( $_POST['preferred_time'] ) : '';
    $notes = isset( $_POST['notes'] ) ? sanitize_textarea_field( $_POST['notes'] ) : '';
    
    if ( empty( $name ) || empty( $email ) || empty( $phone ) || empty( $preferred_date ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all required fields', 'astra-child-diamond' ) ) );
    }
    
    // Store appointment request
    $appointment_data = array(
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'preferred_date' => $preferred_date,
        'preferred_time' => $preferred_time,
        'notes' => $notes,
        'created_at' => current_time( 'mysql' )
    );
    
    // In a real implementation, this would integrate with a calendar/scheduling system
    // For now, we'll send an email notification
    $to = get_option( 'admin_email' );
    $subject = 'New Video Call Request';
    $message = "Video Call Request:\n\n";
    $message .= "Name: {$name}\n";
    $message .= "Email: {$email}\n";
    $message .= "Phone: {$phone}\n";
    $message .= "Preferred Date: {$preferred_date}\n";
    $message .= "Preferred Time: {$preferred_time}\n";
    $message .= "Notes: {$notes}\n";
    
    if ( wp_mail( $to, $subject, $message ) ) {
        wp_send_json_success( array( 'message' => __( 'Your appointment request has been submitted. We will contact you shortly.', 'astra-child-diamond' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'Failed to submit request. Please try again.', 'astra-child-diamond' ) ) );
    }
}
add_action( 'wp_ajax_schedule_video_call', 'astra_child_ajax_schedule_video_call' );
add_action( 'wp_ajax_nopriv_schedule_video_call', 'astra_child_ajax_schedule_video_call' );
