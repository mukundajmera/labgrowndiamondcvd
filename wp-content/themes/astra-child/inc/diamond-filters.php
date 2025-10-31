<?php
/**
 * Diamond Filtering System
 * Advanced product filtering for diamond specifications
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
 * Modify WooCommerce product query based on filters
 */
function astra_child_filter_products_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && ( is_shop() || is_product_category() || is_product_tag() ) ) {
        $meta_query = $query->get( 'meta_query' ) ?: array();
        
        // Shape filter
        if ( get_query_var( 'shape' ) ) {
            $meta_query[] = array(
                'key'     => '_diamond_shape',
                'value'   => sanitize_text_field( get_query_var( 'shape' ) ),
                'compare' => '='
            );
        }
        
        // Carat range filter
        if ( get_query_var( 'carat_min' ) || get_query_var( 'carat_max' ) ) {
            $carat_query = array( 'key' => '_diamond_carat', 'type' => 'DECIMAL' );
            
            if ( get_query_var( 'carat_min' ) ) {
                $carat_query['value'] = floatval( get_query_var( 'carat_min' ) );
                $carat_query['compare'] = '>=';
            }
            
            if ( get_query_var( 'carat_max' ) ) {
                if ( isset( $carat_query['value'] ) ) {
                    $carat_query['value'] = array(
                        floatval( get_query_var( 'carat_min' ) ),
                        floatval( get_query_var( 'carat_max' ) )
                    );
                    $carat_query['compare'] = 'BETWEEN';
                } else {
                    $carat_query['value'] = floatval( get_query_var( 'carat_max' ) );
                    $carat_query['compare'] = '<=';
                }
            }
            
            $meta_query[] = $carat_query;
        }
        
        // Color filter
        if ( get_query_var( 'color' ) ) {
            $colors = explode( ',', get_query_var( 'color' ) );
            if ( count( $colors ) > 1 ) {
                $color_query = array( 'relation' => 'OR' );
                foreach ( $colors as $color ) {
                    $color_query[] = array(
                        'key'     => '_diamond_color',
                        'value'   => sanitize_text_field( $color ),
                        'compare' => '='
                    );
                }
                $meta_query[] = $color_query;
            } else {
                $meta_query[] = array(
                    'key'     => '_diamond_color',
                    'value'   => sanitize_text_field( $colors[0] ),
                    'compare' => '='
                );
            }
        }
        
        // Clarity filter
        if ( get_query_var( 'clarity' ) ) {
            $clarities = explode( ',', get_query_var( 'clarity' ) );
            if ( count( $clarities ) > 1 ) {
                $clarity_query = array( 'relation' => 'OR' );
                foreach ( $clarities as $clarity ) {
                    $clarity_query[] = array(
                        'key'     => '_diamond_clarity',
                        'value'   => sanitize_text_field( $clarity ),
                        'compare' => '='
                    );
                }
                $meta_query[] = $clarity_query;
            } else {
                $meta_query[] = array(
                    'key'     => '_diamond_clarity',
                    'value'   => sanitize_text_field( $clarities[0] ),
                    'compare' => '='
                );
            }
        }
        
        // Cut filter
        if ( get_query_var( 'cut' ) ) {
            $meta_query[] = array(
                'key'     => '_diamond_cut',
                'value'   => sanitize_text_field( get_query_var( 'cut' ) ),
                'compare' => '='
            );
        }
        
        // Polish filter
        if ( get_query_var( 'polish' ) ) {
            $meta_query[] = array(
                'key'     => '_diamond_polish',
                'value'   => sanitize_text_field( get_query_var( 'polish' ) ),
                'compare' => '='
            );
        }
        
        // Symmetry filter
        if ( get_query_var( 'symmetry' ) ) {
            $meta_query[] = array(
                'key'     => '_diamond_symmetry',
                'value'   => sanitize_text_field( get_query_var( 'symmetry' ) ),
                'compare' => '='
            );
        }
        
        // Fluorescence filter
        if ( get_query_var( 'fluorescence' ) ) {
            $meta_query[] = array(
                'key'     => '_diamond_fluorescence',
                'value'   => sanitize_text_field( get_query_var( 'fluorescence' ) ),
                'compare' => '='
            );
        }
        
        // Certification filter
        if ( get_query_var( 'certification' ) ) {
            $meta_query[] = array(
                'key'     => '_diamond_certification',
                'value'   => sanitize_text_field( get_query_var( 'certification' ) ),
                'compare' => '='
            );
        }
        
        // Availability filter
        if ( get_query_var( 'availability' ) === 'in-stock' ) {
            $meta_query[] = array(
                'key'     => '_stock_status',
                'value'   => 'instock',
                'compare' => '='
            );
        }
        
        if ( ! empty( $meta_query ) ) {
            $query->set( 'meta_query', $meta_query );
        }
        
        // Price range filter
        if ( get_query_var( 'price_min' ) || get_query_var( 'price_max' ) ) {
            add_filter( 'posts_clauses', 'astra_child_filter_by_price', 10, 2 );
        }
    }
}
add_action( 'pre_get_posts', 'astra_child_filter_products_query' );

/**
 * Filter products by price range
 */
function astra_child_filter_by_price( $args, $query ) {
    if ( ! $query->is_main_query() || is_admin() ) {
        return $args;
    }
    
    global $wpdb;
    
    $price_min = get_query_var( 'price_min' ) ? floatval( get_query_var( 'price_min' ) ) : 0;
    $price_max = get_query_var( 'price_max' ) ? floatval( get_query_var( 'price_max' ) ) : PHP_INT_MAX;
    
    if ( $price_min > 0 || $price_max < PHP_INT_MAX ) {
        $args['join'] .= " INNER JOIN {$wpdb->postmeta} AS pm_price ON {$wpdb->posts}.ID = pm_price.post_id ";
        $args['where'] .= $wpdb->prepare(
            " AND pm_price.meta_key = '_price' AND CAST(pm_price.meta_value AS DECIMAL) BETWEEN %f AND %f ",
            $price_min,
            $price_max
        );
    }
    
    remove_filter( 'posts_clauses', 'astra_child_filter_by_price', 10 );
    
    return $args;
}

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
 */
function astra_child_get_filtered_product_count() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'fields' => 'ids'
    );
    
    // Apply the same filters as the main query
    $query = new WP_Query( $args );
    astra_child_filter_products_query( $query );
    
    return $query->found_posts;
}
