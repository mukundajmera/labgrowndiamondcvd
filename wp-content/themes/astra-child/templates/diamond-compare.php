<?php
/**
 * Diamond Comparison Template
 *
 * This template expects a variable $diamond_products which is an array of WooCommerce product objects or IDs.
 */

if ( empty( $diamond_products ) || ! is_array( $diamond_products ) ) {
    echo '<p>' . esc_html__( 'No products to compare.', 'astra-child-diamond' ) . '</p>';
    return;
}

// Convert IDs to product objects if necessary and gather specs
$products_data = array();
$base_price = null;
$specs_comparison = array(
    'carat'        => array(),
    'color'        => array(),
    'clarity'      => array(),
    'cut'          => array(),
    'polish'       => array(),
    'symmetry'     => array(),
    'fluorescence' => array(),
    'dimensions'   => array(),
    'table'        => array(),
    'depth'        => array(),
    'ratio'        => array()
);

foreach ( $diamond_products as $index => $product_item ) {
    $product = is_numeric( $product_item ) ? wc_get_product( $product_item ) : $product_item;
    if ( ! $product ) {
        continue;
    }

    $price = wc_get_price_to_display( $product );
    
    // Set the first product as base price for delta calculation
    if ( $base_price === null ) {
        $base_price = $price;
    }

    // Get specs
    $carat = get_post_meta( $product->get_id(), '_diamond_carat', true );
    $color = get_post_meta( $product->get_id(), '_diamond_color', true );
    $clarity = get_post_meta( $product->get_id(), '_diamond_clarity', true );
    $cut = get_post_meta( $product->get_id(), '_diamond_cut', true );
    $polish = get_post_meta( $product->get_id(), '_diamond_polish', true );
    $symmetry = get_post_meta( $product->get_id(), '_diamond_symmetry', true );
    $fluorescence = get_post_meta( $product->get_id(), '_diamond_fluorescence', true );
    $dimensions = get_post_meta( $product->get_id(), '_diamond_measurements', true );
    $table = get_post_meta( $product->get_id(), '_diamond_table', true );
    $depth = get_post_meta( $product->get_id(), '_diamond_depth', true );
    $ratio = get_post_meta( $product->get_id(), '_diamond_ratio', true );

    $products_data[] = array(
        'product'      => $product,
        'price'        => $price,
        'delta'        => $price - $base_price,
        'carat'        => $carat,
        'color'        => $color,
        'clarity'      => $clarity,
        'cut'          => $cut,
        'polish'       => $polish,
        'symmetry'     => $symmetry,
        'fluorescence' => $fluorescence,
        'dimensions'   => $dimensions,
        'table'        => $table,
        'depth'        => $depth,
        'ratio'        => $ratio
    );

    // Collect specs to check for differences
    $specs_comparison['carat'][] = $carat;
    $specs_comparison['color'][] = $color;
    $specs_comparison['clarity'][] = $clarity;
    $specs_comparison['cut'][] = $cut;
    $specs_comparison['polish'][] = $polish;
    $specs_comparison['symmetry'][] = $symmetry;
    $specs_comparison['fluorescence'][] = $fluorescence;
    $specs_comparison['dimensions'][] = $dimensions;
    $specs_comparison['table'][] = $table;
    $specs_comparison['depth'][] = $depth;
    $specs_comparison['ratio'][] = $ratio;
}

// Check which specs have differences
$has_diff = array();
foreach ( $specs_comparison as $key => $values ) {
    $unique_values = array_unique( $values );
    $has_diff[$key] = count( $unique_values ) > 1;
}

?>

<div class="diamond-compare-container">
    <div class="diamond-compare-table-wrapper">
        <table class="diamond-compare-table">
            <thead>
                <tr>
                    <th class="spec-name-col empty-corner"></th>
                    <?php foreach ( $products_data as $data ) : ?>
                        <th class="product-col sticky-header">
                            <div class="compare-product-header">
                                <div class="product-image">
                                    <?php echo $data['product']->get_image( 'thumbnail' ); ?>
                                </div>
                                <h3 class="product-title"><?php echo esc_html( $data['product']->get_name() ); ?></h3>
                                <div class="product-price">
                                    <?php echo wp_kses_post( wc_price( $data['price'] ) ); ?>
                                </div>
                                <?php if ( $data['delta'] !== 0.0 && $data['delta'] !== 0 ) : ?>
                                    <div class="price-delta <?php echo $data['delta'] > 0 ? 'delta-positive' : 'delta-negative'; ?>">
                                        <?php 
                                            $sign = $data['delta'] > 0 ? '+' : '-';
                                            echo esc_html( $sign . strip_tags( wc_price( abs( $data['delta'] ) ) ) ); 
                                        ?>
                                    </div>
                                <?php elseif ( $data['price'] === $base_price && count( $products_data ) > 1 ) : ?>
                                    <div class="price-delta delta-neutral"><?php esc_html_e( 'Base Price', 'astra-child-diamond' ); ?></div>
                                <?php endif; ?>
                            </div>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $spec_labels = array(
                    'carat'        => __( 'Carat', 'astra-child-diamond' ),
                    'color'        => __( 'Color', 'astra-child-diamond' ),
                    'clarity'      => __( 'Clarity', 'astra-child-diamond' ),
                    'cut'          => __( 'Cut', 'astra-child-diamond' ),
                    'polish'       => __( 'Polish', 'astra-child-diamond' ),
                    'symmetry'     => __( 'Symmetry', 'astra-child-diamond' ),
                    'fluorescence' => __( 'Fluorescence', 'astra-child-diamond' ),
                    'dimensions'   => __( 'Dimensions', 'astra-child-diamond' ),
                    'table'        => __( 'Table %', 'astra-child-diamond' ),
                    'depth'        => __( 'Depth %', 'astra-child-diamond' ),
                    'ratio'        => __( 'Ratio', 'astra-child-diamond' )
                );

                foreach ( $spec_labels as $key => $label ) : 
                    $row_class = $has_diff[$key] ? 'has-difference' : '';
                ?>
                    <tr class="spec-row <?php echo esc_attr( $row_class ); ?>">
                        <td class="spec-label sticky-col"><?php echo esc_html( $label ); ?></td>
                        <?php foreach ( $products_data as $data ) : 
                            $val = $data[$key];
                            $display_val = ! empty( $val ) ? $val : '-';
                        ?>
                            <td class="spec-value <?php echo $has_diff[$key] ? 'diff-highlight' : ''; ?>">
                                <?php echo esc_html( $display_val ); ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="spec-label sticky-col"></td>
                    <?php foreach ( $products_data as $data ) : ?>
                        <td class="product-action">
                            <a href="<?php echo esc_url( $data['product']->get_permalink() ); ?>" class="button view-product-btn">
                                <?php esc_html_e( 'View Product', 'astra-child-diamond' ); ?>
                            </a>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
