<?php
/**
 * Custom Post Types and Taxonomies
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Educational Content Post Type
 */
function astra_child_register_educational_content() {
    $labels = array(
        'name'               => __( 'Educational Content', 'astra-child-diamond' ),
        'singular_name'      => __( 'Educational Content', 'astra-child-diamond' ),
        'menu_name'          => __( 'Education', 'astra-child-diamond' ),
        'add_new'            => __( 'Add New', 'astra-child-diamond' ),
        'add_new_item'       => __( 'Add New Content', 'astra-child-diamond' ),
        'edit_item'          => __( 'Edit Content', 'astra-child-diamond' ),
        'new_item'           => __( 'New Content', 'astra-child-diamond' ),
        'view_item'          => __( 'View Content', 'astra-child-diamond' ),
        'search_items'       => __( 'Search Content', 'astra-child-diamond' ),
        'not_found'          => __( 'No content found', 'astra-child-diamond' ),
        'not_found_in_trash' => __( 'No content found in trash', 'astra-child-diamond' ),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-book-alt',
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments' ),
        'rewrite'             => array( 'slug' => 'education' ),
        'capability_type'     => 'post',
    );

    register_post_type( 'educational_content', $args );
}
add_action( 'init', 'astra_child_register_educational_content' );

/**
 * Register Video Library Post Type
 */
function astra_child_register_video_library() {
    $labels = array(
        'name'               => __( 'Video Library', 'astra-child-diamond' ),
        'singular_name'      => __( 'Video', 'astra-child-diamond' ),
        'menu_name'          => __( 'Videos', 'astra-child-diamond' ),
        'add_new'            => __( 'Add New Video', 'astra-child-diamond' ),
        'add_new_item'       => __( 'Add New Video', 'astra-child-diamond' ),
        'edit_item'          => __( 'Edit Video', 'astra-child-diamond' ),
        'new_item'           => __( 'New Video', 'astra-child-diamond' ),
        'view_item'          => __( 'View Video', 'astra-child-diamond' ),
        'search_items'       => __( 'Search Videos', 'astra-child-diamond' ),
        'not_found'          => __( 'No videos found', 'astra-child-diamond' ),
        'not_found_in_trash' => __( 'No videos found in trash', 'astra-child-diamond' ),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-video-alt3',
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'rewrite'             => array( 'slug' => 'videos' ),
        'capability_type'     => 'post',
    );

    register_post_type( 'video_library', $args );
}
add_action( 'init', 'astra_child_register_video_library' );

/**
 * Register Testimonial Post Type
 */
function astra_child_register_testimonials() {
    $labels = array(
        'name'               => __( 'Testimonials', 'astra-child-diamond' ),
        'singular_name'      => __( 'Testimonial', 'astra-child-diamond' ),
        'menu_name'          => __( 'Testimonials', 'astra-child-diamond' ),
        'add_new'            => __( 'Add New', 'astra-child-diamond' ),
        'add_new_item'       => __( 'Add New Testimonial', 'astra-child-diamond' ),
        'edit_item'          => __( 'Edit Testimonial', 'astra-child-diamond' ),
        'new_item'           => __( 'New Testimonial', 'astra-child-diamond' ),
        'view_item'          => __( 'View Testimonial', 'astra-child-diamond' ),
        'search_items'       => __( 'Search Testimonials', 'astra-child-diamond' ),
        'not_found'          => __( 'No testimonials found', 'astra-child-diamond' ),
        'not_found_in_trash' => __( 'No testimonials found in trash', 'astra-child-diamond' ),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-star-filled',
        'supports'            => array( 'title', 'editor', 'thumbnail' ),
        'rewrite'             => array( 'slug' => 'testimonials' ),
        'capability_type'     => 'post',
    );

    register_post_type( 'testimonials', $args );
}
add_action( 'init', 'astra_child_register_testimonials' );

/**
 * Register Custom Jewelry Design Post Type (for saved designs)
 */
function astra_child_register_jewelry_designs() {
    $labels = array(
        'name'               => __( 'Jewelry Designs', 'astra-child-diamond' ),
        'singular_name'      => __( 'Design', 'astra-child-diamond' ),
        'menu_name'          => __( 'Custom Designs', 'astra-child-diamond' ),
        'add_new'            => __( 'Add New', 'astra-child-diamond' ),
        'add_new_item'       => __( 'Add New Design', 'astra-child-diamond' ),
        'edit_item'          => __( 'Edit Design', 'astra-child-diamond' ),
        'new_item'           => __( 'New Design', 'astra-child-diamond' ),
        'view_item'          => __( 'View Design', 'astra-child-diamond' ),
        'search_items'       => __( 'Search Designs', 'astra-child-diamond' ),
        'not_found'          => __( 'No designs found', 'astra-child-diamond' ),
        'not_found_in_trash' => __( 'No designs found in trash', 'astra-child-diamond' ),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'has_archive'         => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => false,
        'menu_icon'           => 'dashicons-art',
        'supports'            => array( 'title', 'thumbnail', 'author' ),
        'capability_type'     => 'post',
    );

    register_post_type( 'jewelry_design', $args );
}
add_action( 'init', 'astra_child_register_jewelry_designs' );

/**
 * Register Education Category Taxonomy
 */
function astra_child_register_education_category() {
    $labels = array(
        'name'              => __( 'Education Categories', 'astra-child-diamond' ),
        'singular_name'     => __( 'Category', 'astra-child-diamond' ),
        'search_items'      => __( 'Search Categories', 'astra-child-diamond' ),
        'all_items'         => __( 'All Categories', 'astra-child-diamond' ),
        'parent_item'       => __( 'Parent Category', 'astra-child-diamond' ),
        'parent_item_colon' => __( 'Parent Category:', 'astra-child-diamond' ),
        'edit_item'         => __( 'Edit Category', 'astra-child-diamond' ),
        'update_item'       => __( 'Update Category', 'astra-child-diamond' ),
        'add_new_item'      => __( 'Add New Category', 'astra-child-diamond' ),
        'new_item_name'     => __( 'New Category Name', 'astra-child-diamond' ),
        'menu_name'         => __( 'Categories', 'astra-child-diamond' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'education-category' ),
    );

    register_taxonomy( 'education_category', array( 'educational_content' ), $args );
}
add_action( 'init', 'astra_child_register_education_category' );

/**
 * Register Video Category Taxonomy
 */
function astra_child_register_video_category() {
    $labels = array(
        'name'              => __( 'Video Categories', 'astra-child-diamond' ),
        'singular_name'     => __( 'Category', 'astra-child-diamond' ),
        'search_items'      => __( 'Search Categories', 'astra-child-diamond' ),
        'all_items'         => __( 'All Categories', 'astra-child-diamond' ),
        'parent_item'       => __( 'Parent Category', 'astra-child-diamond' ),
        'parent_item_colon' => __( 'Parent Category:', 'astra-child-diamond' ),
        'edit_item'         => __( 'Edit Category', 'astra-child-diamond' ),
        'update_item'       => __( 'Update Category', 'astra-child-diamond' ),
        'add_new_item'      => __( 'Add New Category', 'astra-child-diamond' ),
        'new_item_name'     => __( 'New Category Name', 'astra-child-diamond' ),
        'menu_name'         => __( 'Categories', 'astra-child-diamond' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'video-category' ),
    );

    register_taxonomy( 'video_category', array( 'video_library' ), $args );
}
add_action( 'init', 'astra_child_register_video_category' );

/**
 * Add meta boxes for video URL
 */
function astra_child_video_meta_boxes() {
    add_meta_box(
        'video_url',
        __( 'Video URL', 'astra-child-diamond' ),
        'astra_child_video_url_callback',
        'video_library',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'astra_child_video_meta_boxes' );

/**
 * Video URL meta box callback
 */
function astra_child_video_url_callback( $post ) {
    wp_nonce_field( 'video_url_nonce', 'video_url_nonce' );
    $video_url = get_post_meta( $post->ID, '_video_url', true );
    $video_duration = get_post_meta( $post->ID, '_video_duration', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="video_url"><?php _e( 'Video URL', 'astra-child-diamond' ); ?></label></th>
            <td>
                <input type="url" name="video_url" id="video_url" value="<?php echo esc_url( $video_url ); ?>" class="large-text" />
                <p class="description"><?php _e( 'YouTube, Vimeo, or direct video URL', 'astra-child-diamond' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="video_duration"><?php _e( 'Duration', 'astra-child-diamond' ); ?></label></th>
            <td>
                <input type="text" name="video_duration" id="video_duration" value="<?php echo esc_attr( $video_duration ); ?>" placeholder="e.g., 5:30" />
                <p class="description"><?php _e( 'Video duration (mm:ss format)', 'astra-child-diamond' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save video URL meta data
 */
function astra_child_save_video_url( $post_id ) {
    if ( ! isset( $_POST['video_url_nonce'] ) || ! wp_verify_nonce( $_POST['video_url_nonce'], 'video_url_nonce' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    if ( isset( $_POST['video_url'] ) ) {
        update_post_meta( $post_id, '_video_url', esc_url_raw( $_POST['video_url'] ) );
    }
    
    if ( isset( $_POST['video_duration'] ) ) {
        update_post_meta( $post_id, '_video_duration', sanitize_text_field( $_POST['video_duration'] ) );
    }
}
add_action( 'save_post_video_library', 'astra_child_save_video_url' );

/**
 * Add meta boxes for testimonials
 */
function astra_child_testimonial_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        __( 'Testimonial Details', 'astra-child-diamond' ),
        'astra_child_testimonial_details_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'astra_child_testimonial_meta_boxes' );

/**
 * Testimonial details meta box callback
 */
function astra_child_testimonial_details_callback( $post ) {
    wp_nonce_field( 'testimonial_details_nonce', 'testimonial_details_nonce' );
    
    $customer_name = get_post_meta( $post->ID, '_customer_name', true );
    $customer_location = get_post_meta( $post->ID, '_customer_location', true );
    $rating = get_post_meta( $post->ID, '_rating', true );
    $purchase_date = get_post_meta( $post->ID, '_purchase_date', true );
    $product_purchased = get_post_meta( $post->ID, '_product_purchased', true );
    $video_url = get_post_meta( $post->ID, '_testimonial_video_url', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="customer_name"><?php _e( 'Customer Name', 'astra-child-diamond' ); ?></label></th>
            <td><input type="text" name="customer_name" id="customer_name" value="<?php echo esc_attr( $customer_name ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="customer_location"><?php _e( 'Location', 'astra-child-diamond' ); ?></label></th>
            <td><input type="text" name="customer_location" id="customer_location" value="<?php echo esc_attr( $customer_location ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="rating"><?php _e( 'Rating', 'astra-child-diamond' ); ?></label></th>
            <td>
                <select name="rating" id="rating">
                    <option value="5" <?php selected( $rating, '5' ); ?>>5 Stars</option>
                    <option value="4" <?php selected( $rating, '4' ); ?>>4 Stars</option>
                    <option value="3" <?php selected( $rating, '3' ); ?>>3 Stars</option>
                    <option value="2" <?php selected( $rating, '2' ); ?>>2 Stars</option>
                    <option value="1" <?php selected( $rating, '1' ); ?>>1 Star</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="purchase_date"><?php _e( 'Purchase Date', 'astra-child-diamond' ); ?></label></th>
            <td><input type="date" name="purchase_date" id="purchase_date" value="<?php echo esc_attr( $purchase_date ); ?>" /></td>
        </tr>
        <tr>
            <th><label for="product_purchased"><?php _e( 'Product Purchased', 'astra-child-diamond' ); ?></label></th>
            <td><input type="text" name="product_purchased" id="product_purchased" value="<?php echo esc_attr( $product_purchased ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="testimonial_video_url"><?php _e( 'Video Testimonial URL', 'astra-child-diamond' ); ?></label></th>
            <td>
                <input type="url" name="testimonial_video_url" id="testimonial_video_url" value="<?php echo esc_url( $video_url ); ?>" class="large-text" />
                <p class="description"><?php _e( 'Optional: YouTube or Vimeo URL', 'astra-child-diamond' ); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save testimonial details
 */
function astra_child_save_testimonial_details( $post_id ) {
    if ( ! isset( $_POST['testimonial_details_nonce'] ) || ! wp_verify_nonce( $_POST['testimonial_details_nonce'], 'testimonial_details_nonce' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    $fields = array(
        'customer_name',
        'customer_location',
        'rating',
        'purchase_date',
        'product_purchased',
        'testimonial_video_url'
    );
    
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            if ( $field === 'testimonial_video_url' ) {
                update_post_meta( $post_id, '_' . $field, esc_url_raw( $_POST[ $field ] ) );
            } else {
                update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
            }
        }
    }
}
add_action( 'save_post_testimonials', 'astra_child_save_testimonial_details' );

/**
 * Flush rewrite rules on theme activation
 */
function astra_child_flush_rewrite_rules() {
    astra_child_register_educational_content();
    astra_child_register_video_library();
    astra_child_register_testimonials();
    astra_child_register_jewelry_designs();
    astra_child_register_education_category();
    astra_child_register_video_category();
    
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'astra_child_flush_rewrite_rules' );
