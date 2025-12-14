<?php
/**
 * Diamond Filtering System
 * Advanced product filtering for diamond specifications
 * Optimized for performance using custom database table
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add custom query vars for diamond filters
 */
function astra_child_add_filter_query_vars( $vars ) {
    $vars[] = 'shape';
    $vars[] = 'carat_min';
    $vars[] = 'carat_max';
    $vars[] = 'color';
    $vars[] = 'clarity';
    $vars[] = 'cut';
    $vars[] = 'price_min';
    $vars[] = 'price_max';
    $vars[] = 'polish';
    $vars[] = 'symmetry';
    $vars[] = 'fluorescence';
    $vars[] = 'certification';
    $vars[] = 'availability';
    
    return $vars;
}
add_filter( 'query_vars', 'astra_child_add_filter_query_vars' );

/**
 * Helper to get current filters from query vars
 */
function astra_child_get_current_filters() {
    return array(
        'shape' => sanitize_text_field( get_query_var( 'shape' ) ),
        'carat_min' => get_query_var( 'carat_min' ),
        'carat_max' => get_query_var( 'carat_max' ),
        'color' => sanitize_text_field( get_query_var( 'color' ) ),
        'clarity' => sanitize_text_field( get_query_var( 'clarity' ) ),
        'cut' => sanitize_text_field( get_query_var( 'cut' ) ),
        'polish' => sanitize_text_field( get_query_var( 'polish' ) ),
        'symmetry' => sanitize_text_field( get_query_var( 'symmetry' ) ),
        'fluorescence' => sanitize_text_field( get_query_var( 'fluorescence' ) ),
        'certification' => sanitize_text_field( get_query_var( 'certification' ) ),
        'price_min' => get_query_var( 'price_min' ),
        'price_max' => get_query_var( 'price_max' ),
        'availability' => sanitize_text_field( get_query_var( 'availability' ) ),
    );
}

/**
 * Modify WooCommerce product query based on filters
 * Uses custom table for 10x performance improvement over meta_query
 */
function astra_child_filter_products_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( is_shop() || is_product_category() || is_product_tag() ) ) {
        
        // Ensure optimized function exists
        if ( ! function_exists( 'astra_child_get_filtered_diamond_ids' ) ) {
            return;
        }

        $filters = astra_child_get_current_filters();
        $filtered_ids = astra_child_get_filtered_diamond_ids( $filters );
        
        // If filters returned null, it means no filters are active - do nothing
        if ( $filtered_ids === null ) {
            return;
        }
        
        // If filters returned empty array, it means no products match
        if ( empty( $filtered_ids ) ) {
            $filtered_ids = array( 0 ); // Force "No products found"
        }
        
        // Apply ID filter
        $current_in = $query->get( 'post__in' );
        if ( ! empty( $current_in ) ) {
            $intersected = array_intersect( $current_in, $filtered_ids );
            if ( empty( $intersected ) ) {
                $intersected = array( 0 ); // Force "No products found"
            }
            $query->set( 'post__in', $intersected );
        } else {
            $query->set( 'post__in', $filtered_ids );
        }
    }
}
add_action( 'pre_get_posts', 'astra_child_filter_products_query' );

/**
 * Display filter widgets in sidebar
 */
function astra_child_display_filter_sidebar() {
    if ( ! is_shop() && ! is_product_category() && ! is_product_tag() ) {
        return;
    }
    ?>
    <div class="diamond-filters-sidebar">
        <h3><?php _e( 'Filter Diamonds', 'astra-child-diamond' ); ?></h3>
        
        <!-- Shape Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Shape', 'astra-child-diamond' ); ?></h4>
            <div class="shape-selector">
                <?php
                $shapes = array( 'round', 'princess', 'cushion', 'oval', 'emerald', 'pear', 'marquise', 'radiant', 'asscher', 'heart' );
                foreach ( $shapes as $shape ) {
                    $selected = get_query_var( 'shape' ) === $shape ? 'active' : '';
                    echo '<div class="shape-option ' . $selected . '" data-shape="' . esc_attr( $shape ) . '">';
                    echo '<span class="shape-icon"></span>';
                    echo '<span class="shape-label">' . ucfirst( $shape ) . '</span>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        
        <!-- Carat Range Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Carat Weight', 'astra-child-diamond' ); ?></h4>
            <div class="range-inputs">
                <input type="number" id="carat-min" name="carat_min" min="0.30" max="5.00" step="0.01" 
                       value="<?php echo esc_attr( get_query_var( 'carat_min', '0.30' ) ); ?>" placeholder="Min">
                <span>-</span>
                <input type="number" id="carat-max" name="carat_max" min="0.30" max="5.00" step="0.01" 
                       value="<?php echo esc_attr( get_query_var( 'carat_max', '5.00' ) ); ?>" placeholder="Max">
            </div>
        </div>
        
        <!-- Price Range Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Price Range', 'astra-child-diamond' ); ?></h4>
            <div class="range-inputs">
                <input type="number" id="price-min" name="price_min" min="0" step="100" 
                       value="<?php echo esc_attr( get_query_var( 'price_min', '0' ) ); ?>" placeholder="Min">
                <span>-</span>
                <input type="number" id="price-max" name="price_max" min="0" step="100" 
                       value="<?php echo esc_attr( get_query_var( 'price_max', '100000' ) ); ?>" placeholder="Max">
            </div>
        </div>
        
        <!-- Color Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Color Grade', 'astra-child-diamond' ); ?></h4>
            <select id="color-filter" name="color">
                <option value=""><?php _e( 'All Colors', 'astra-child-diamond' ); ?></option>
                <?php
                $colors = array( 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K' );
                foreach ( $colors as $color ) {
                    $selected = get_query_var( 'color' ) === $color ? 'selected' : '';
                    echo '<option value="' . esc_attr( $color ) . '" ' . $selected . '>' . $color . '</option>';
                }
                ?>
            </select>
        </div>
        
        <!-- Clarity Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Clarity Grade', 'astra-child-diamond' ); ?></h4>
            <select id="clarity-filter" name="clarity">
                <option value=""><?php _e( 'All Clarities', 'astra-child-diamond' ); ?></option>
                <?php
                $clarities = array( 'IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2' );
                foreach ( $clarities as $clarity ) {
                    $selected = get_query_var( 'clarity' ) === $clarity ? 'selected' : '';
                    echo '<option value="' . esc_attr( $clarity ) . '" ' . $selected . '>' . $clarity . '</option>';
                }
                ?>
            </select>
        </div>
        
        <!-- Cut Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Cut Quality', 'astra-child-diamond' ); ?></h4>
            <select id="cut-filter" name="cut">
                <option value=""><?php _e( 'All Cuts', 'astra-child-diamond' ); ?></option>
                <option value="excellent" <?php selected( get_query_var( 'cut' ), 'excellent' ); ?>><?php _e( 'Excellent', 'astra-child-diamond' ); ?></option>
                <option value="very-good" <?php selected( get_query_var( 'cut' ), 'very-good' ); ?>><?php _e( 'Very Good', 'astra-child-diamond' ); ?></option>
                <option value="good" <?php selected( get_query_var( 'cut' ), 'good' ); ?>><?php _e( 'Good', 'astra-child-diamond' ); ?></option>
            </select>
        </div>
        
        <!-- Certification Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Certification', 'astra-child-diamond' ); ?></h4>
            <select id="certification-filter" name="certification">
                <option value=""><?php _e( 'All Certifications', 'astra-child-diamond' ); ?></option>
                <option value="gia" <?php selected( get_query_var( 'certification' ), 'gia' ); ?>>GIA</option>
                <option value="igi" <?php selected( get_query_var( 'certification' ), 'igi' ); ?>>IGI</option>
            </select>
        </div>
        
        <!-- Availability Filter -->
        <div class="filter-group">
            <h4><?php _e( 'Availability', 'astra-child-diamond' ); ?></h4>
            <label>
                <input type="checkbox" name="availability" value="in-stock" 
                       <?php checked( get_query_var( 'availability' ), 'in-stock' ); ?>>
                <?php _e( 'In Stock Only', 'astra-child-diamond' ); ?>
            </label>
        </div>
        
        <button id="apply-filters-btn" class="btn btn-primary"><?php _e( 'Apply Filters', 'astra-child-diamond' ); ?></button>
        <button id="reset-filters-btn" class="btn btn-outline"><?php _e( 'Reset Filters', 'astra-child-diamond' ); ?></button>
        
        <div id="results-count" class="search-results-count"></div>
    </div>
    <?php
}
add_action( 'woocommerce_sidebar', 'astra_child_display_filter_sidebar' );

/**
 * Get product count with filters applied
 * Optimized to use custom table count logic
 */
function astra_child_get_filtered_product_count() {
    if ( ! function_exists( 'astra_child_get_filtered_diamond_ids' ) ) {
        return 0;
    }

    $filters = astra_child_get_current_filters();
    $ids = astra_child_get_filtered_diamond_ids( $filters );
    
    // If null, it means all products (no filters)
    if ( $ids === null ) {
        return wp_count_posts( 'product' )->publish;
    }
    
    return count( $ids );
}
