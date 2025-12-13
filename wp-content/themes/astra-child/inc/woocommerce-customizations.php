<?php
/**
 * WooCommerce Customizations
 * Custom hooks and filters for WooCommerce integration
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add custom diamond specifications to product page
 */
function astra_child_display_diamond_specifications() {
    global $product;
    
    $diamond_specs = array(
        'shape' => get_post_meta( $product->get_id(), '_diamond_shape', true ),
        'carat' => get_post_meta( $product->get_id(), '_diamond_carat', true ),
        'color' => get_post_meta( $product->get_id(), '_diamond_color', true ),
        'clarity' => get_post_meta( $product->get_id(), '_diamond_clarity', true ),
        'cut' => get_post_meta( $product->get_id(), '_diamond_cut', true ),
        'polish' => get_post_meta( $product->get_id(), '_diamond_polish', true ),
        'symmetry' => get_post_meta( $product->get_id(), '_diamond_symmetry', true ),
        'fluorescence' => get_post_meta( $product->get_id(), '_diamond_fluorescence', true ),
        'table' => get_post_meta( $product->get_id(), '_diamond_table', true ),
        'depth' => get_post_meta( $product->get_id(), '_diamond_depth', true ),
        'measurements' => get_post_meta( $product->get_id(), '_diamond_measurements', true ),
        'certification' => get_post_meta( $product->get_id(), '_diamond_certification', true ),
        'cert_number' => get_post_meta( $product->get_id(), '_diamond_cert_number', true ),
    );
    
    // Check if any specs exist
    $has_specs = array_filter( $diamond_specs );
    
    if ( ! empty( $has_specs ) ) {
        ?>
        <div class="diamond-specifications">
            <h3><?php _e( 'Diamond Specifications', 'astra-child-diamond' ); ?></h3>
            <table class="specification-table">
                <?php if ( $diamond_specs['shape'] ) : ?>
                <tr>
                    <td><?php _e( 'Shape', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( ucfirst( $diamond_specs['shape'] ) ); ?></td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['carat'] ) : ?>
                <tr>
                    <td><?php _e( 'Carat Weight', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['carat'] ); ?> ct</td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['color'] ) : ?>
                <tr>
                    <td><?php _e( 'Color Grade', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['color'] ); ?></td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['clarity'] ) : ?>
                <tr>
                    <td><?php _e( 'Clarity Grade', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['clarity'] ); ?></td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['cut'] ) : ?>
                <tr>
                    <td><?php _e( 'Cut Grade', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( ucfirst( str_replace( '-', ' ', $diamond_specs['cut'] ) ) ); ?></td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['polish'] ) : ?>
                <tr>
                    <td><?php _e( 'Polish', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['polish'] ); ?></td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['symmetry'] ) : ?>
                <tr>
                    <td><?php _e( 'Symmetry', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['symmetry'] ); ?></td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['fluorescence'] ) : ?>
                <tr>
                    <td><?php _e( 'Fluorescence', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['fluorescence'] ); ?></td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['table'] ) : ?>
                <tr>
                    <td><?php _e( 'Table %', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['table'] ); ?>%</td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['depth'] ) : ?>
                <tr>
                    <td><?php _e( 'Depth %', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['depth'] ); ?>%</td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['measurements'] ) : ?>
                <tr>
                    <td><?php _e( 'Measurements', 'astra-child-diamond' ); ?></td>
                    <td><?php echo esc_html( $diamond_specs['measurements'] ); ?> mm</td>
                </tr>
                <?php endif; ?>
                
                <?php if ( $diamond_specs['certification'] ) : ?>
                <tr>
                    <td><?php _e( 'Certification', 'astra-child-diamond' ); ?></td>
                    <td>
                        <div class="certification-badge">
                            <span><?php echo esc_html( strtoupper( $diamond_specs['certification'] ) ); ?></span>
                            <?php if ( $diamond_specs['cert_number'] ) : ?>
                            <span class="cert-number">#<?php echo esc_html( $diamond_specs['cert_number'] ); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ( $diamond_specs['cert_number'] && $diamond_specs['certification'] === 'gia' ) : ?>
                        <a href="https://www.gia.edu/report-check?reportno=<?php echo esc_attr( $diamond_specs['cert_number'] ); ?>" 
                           class="cert-verification-link" target="_blank" rel="noopener">
                            <?php _e( 'Verify Certificate', 'astra-child-diamond' ); ?> →
                        </a>
                        <?php elseif ( $diamond_specs['cert_number'] && $diamond_specs['certification'] === 'igi' ) : ?>
                        <a href="https://www.igi.org/verify-your-report/?r=<?php echo esc_attr( $diamond_specs['cert_number'] ); ?>" 
                           class="cert-verification-link" target="_blank" rel="noopener">
                            <?php _e( 'Verify Certificate', 'astra-child-diamond' ); ?> →
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
        <?php
    }
}
add_action( 'woocommerce_single_product_summary', 'astra_child_display_diamond_specifications', 25 );

/**
 * Add 360° viewer button to product images
 */
function astra_child_add_360_viewer_button() {
    ?>
    <div class="product-360-icon" title="<?php _e( '360° View Available', 'astra-child-diamond' ); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 4C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
        </svg>
    </div>
    <?php
}
add_action( 'woocommerce_before_single_product_summary', 'astra_child_add_360_viewer_button', 5 );

/**
 * Add stock urgency indicator
 */
function astra_child_add_stock_urgency() {
    global $product;
    
    if ( ! $product->is_in_stock() ) {
        echo '<span class="stock-status out-of-stock">' . __( 'Out of Stock', 'astra-child-diamond' ) . '</span>';
        return;
    }
    
    $stock_quantity = $product->get_stock_quantity();
    
    if ( $stock_quantity ) {
        if ( $stock_quantity <= 3 && $stock_quantity > 0 ) {
            echo '<span class="stock-status low-stock urgency-indicator high">';
            printf( __( 'Only %d left in stock!', 'astra-child-diamond' ), $stock_quantity );
            echo '</span>';
        } elseif ( $stock_quantity <= 10 ) {
            echo '<span class="stock-status low-stock urgency-indicator">';
            printf( __( 'Only %d left in stock', 'astra-child-diamond' ), $stock_quantity );
            echo '</span>';
        } else {
            echo '<span class="stock-status in-stock">' . __( 'In Stock', 'astra-child-diamond' ) . '</span>';
        }
    } else {
        echo '<span class="stock-status in-stock">' . __( 'In Stock', 'astra-child-diamond' ) . '</span>';
    }
}
add_action( 'woocommerce_single_product_summary', 'astra_child_add_stock_urgency', 15 );

/**
 * Add compare checkbox to product cards
 */
function astra_child_add_compare_checkbox() {
    global $product;
    ?>
    <div class="product-compare-wrapper">
        <label class="compare-checkbox-label">
            <input type="checkbox" 
                   class="compare-checkbox" 
                   data-product-id="<?php echo esc_attr( $product->get_id() ); ?>" 
                   data-product-name="<?php echo esc_attr( $product->get_name() ); ?>">
            <span><?php _e( 'Compare', 'astra-child-diamond' ); ?></span>
        </label>
    </div>
    <?php
}
add_action( 'woocommerce_after_shop_loop_item', 'astra_child_add_compare_checkbox', 15 );

/**
 * Add quick view button to product cards
 */
function astra_child_add_quick_view_button() {
    global $product;
    ?>
    <button class="product-quick-view btn btn-primary" 
            data-product-id="<?php echo esc_attr( $product->get_id() ); ?>">
        <?php _e( 'Quick View', 'astra-child-diamond' ); ?>
    </button>
    <?php
}
add_action( 'woocommerce_after_shop_loop_item', 'astra_child_add_quick_view_button', 20 );

/**
 * Customize WooCommerce breadcrumbs
 */
function astra_child_woocommerce_breadcrumbs() {
    return array(
        'delimiter'   => ' / ',
        'wrap_before' => '<nav class="woocommerce-breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Home', 'breadcrumb', 'astra-child-diamond' ),
    );
}
add_filter( 'woocommerce_breadcrumb_defaults', 'astra_child_woocommerce_breadcrumbs' );

/**
 * Add price match guarantee badge
 */
function astra_child_add_price_match_badge() {
    ?>
    <div class="price-match-badge">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 18c-3.87-.87-7-4.37-7-9V8.3l7-3.11 7 3.11V11c0 4.63-3.13 8.13-7 9z"/>
        </svg>
        <?php _e( 'Price Match Guarantee', 'astra-child-diamond' ); ?>
    </div>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'astra_child_add_price_match_badge', 30 );

/**
 * Add social sharing buttons
 */
function astra_child_add_social_sharing() {
    global $product;
    
    $product_url = urlencode( get_permalink() );
    $product_title = urlencode( $product->get_name() );
    $product_image = urlencode( wp_get_attachment_url( $product->get_image_id() ) );
    
    ?>
    <div class="product-social-share">
        <span class="share-label"><?php _e( 'Share:', 'astra-child-diamond' ); ?></span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $product_url; ?>" 
           target="_blank" rel="noopener" class="share-button facebook" aria-label="Share on Facebook">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $product_url; ?>&text=<?php echo $product_title; ?>" 
           target="_blank" rel="noopener" class="share-button twitter" aria-label="Share on Twitter">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
            </svg>
        </a>
        <a href="https://pinterest.com/pin/create/button/?url=<?php echo $product_url; ?>&media=<?php echo $product_image; ?>&description=<?php echo $product_title; ?>" 
           target="_blank" rel="noopener" class="share-button pinterest" aria-label="Share on Pinterest">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026L12.017 0z"/>
            </svg>
        </a>
        <a href="whatsapp://send?text=<?php echo $product_title; ?>%20<?php echo $product_url; ?>" 
           class="share-button whatsapp" aria-label="Share on WhatsApp">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
            </svg>
        </a>
    </div>
    <?php
}
add_action( 'woocommerce_single_product_summary', 'astra_child_add_social_sharing', 35 );

/**
 * Add related products with "Complete the Look" heading
 */
function astra_child_related_products_heading() {
    return __( 'Complete the Look', 'astra-child-diamond' );
}
add_filter( 'woocommerce_product_related_products_heading', 'astra_child_related_products_heading' );

/**
 * Modify cart item data to show diamond specifications
 */
function astra_child_cart_item_specifications( $item_data, $cart_item ) {
    $product_id = $cart_item['product_id'];
    
    $shape = get_post_meta( $product_id, '_diamond_shape', true );
    $carat = get_post_meta( $product_id, '_diamond_carat', true );
    $color = get_post_meta( $product_id, '_diamond_color', true );
    $clarity = get_post_meta( $product_id, '_diamond_clarity', true );
    
    if ( $shape || $carat || $color || $clarity ) {
        $specs = array();
        if ( $carat ) $specs[] = $carat . 'ct';
        if ( $color ) $specs[] = $color;
        if ( $clarity ) $specs[] = $clarity;
        if ( $shape ) $specs[] = ucfirst( $shape );
        
        $item_data[] = array(
            'key'   => __( 'Specifications', 'astra-child-diamond' ),
            'value' => implode( ' | ', $specs ),
        );
    }
    
    return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'astra_child_cart_item_specifications', 10, 2 );
