<?php
/**
 * Diamond Inventory Custom Database Table
 * Handles optimized storage and querying of diamond specifications
 *
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Create custom database table for diamond inventory
 */
function astra_child_create_inventory_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'diamond_inventory';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        product_id bigint(20) NOT NULL,
        shape varchar(20),
        carat decimal(5,2),
        color varchar(5),
        clarity varchar(10),
        cut varchar(20),
        polish varchar(20),
        symmetry varchar(20),
        fluorescence varchar(20),
        certification varchar(20),
        price decimal(10,2),
        stock_status varchar(20),
        PRIMARY KEY  (product_id),
        KEY shape (shape),
        KEY carat (carat),
        KEY color (color),
        KEY clarity (clarity),
        KEY price (price),
        KEY stock_status (stock_status)
    ) $charset_collate;";

    if ( ! function_exists( 'dbDelta' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    }

    dbDelta( $sql );
}

/**
 * Check if table exists and create if needed on init
 */
function astra_child_check_inventory_table() {
    if ( get_option( 'astra_child_diamond_db_version' ) != '1.0' ) {
        astra_child_create_inventory_table();
        update_option( 'astra_child_diamond_db_version', '1.0' );
    }
}
add_action( 'init', 'astra_child_check_inventory_table' );

/**
 * Sync product data to inventory table on save
 */
function astra_child_sync_product_to_inventory( $post_id ) {
    // Check if it's a product
    if ( get_post_type( $post_id ) !== 'product' ) {
        return;
    }

    // Check if it's a revision
    if ( wp_is_post_revision( $post_id ) ) {
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'diamond_inventory';

    // Get meta values
    $shape = get_post_meta( $post_id, '_diamond_shape', true );
    $carat = get_post_meta( $post_id, '_diamond_carat', true );
    $color = get_post_meta( $post_id, '_diamond_color', true );
    $clarity = get_post_meta( $post_id, '_diamond_clarity', true );
    $cut = get_post_meta( $post_id, '_diamond_cut', true );
    $polish = get_post_meta( $post_id, '_diamond_polish', true );
    $symmetry = get_post_meta( $post_id, '_diamond_symmetry', true );
    $fluorescence = get_post_meta( $post_id, '_diamond_fluorescence', true );
    $certification = get_post_meta( $post_id, '_diamond_certification', true );

    // Get standard WC meta
    $price = get_post_meta( $post_id, '_price', true );
    $stock_status = get_post_meta( $post_id, '_stock_status', true );

    // Insert or Update
    $wpdb->replace(
        $table_name,
        array(
            'product_id' => $post_id,
            'shape' => $shape,
            'carat' => $carat,
            'color' => $color,
            'clarity' => $clarity,
            'cut' => $cut,
            'polish' => $polish,
            'symmetry' => $symmetry,
            'fluorescence' => $fluorescence,
            'certification' => $certification,
            'price' => $price,
            'stock_status' => $stock_status
        ),
        array(
            '%d',
            '%s',
            '%f',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%s',
            '%f',
            '%s'
        )
    );
}
add_action( 'save_post', 'astra_child_sync_product_to_inventory', 20 );

/**
 * Delete product from inventory table on deletion
 */
function astra_child_delete_inventory_item( $post_id ) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'diamond_inventory';

    $wpdb->delete( $table_name, array( 'product_id' => $post_id ), array( '%d' ) );
}
add_action( 'delete_post', 'astra_child_delete_inventory_item' );

/**
 * Get product IDs based on filters
 *
 * @param array $filters Array of filters (shape, carat_min, etc.)
 * @return array|null Array of product IDs or null if no filters active
 */
function astra_child_get_filtered_diamond_ids( $filters ) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'diamond_inventory';

    // If no filters are provided, return null to allow default WP_Query behavior
    if ( empty( $filters ) ) {
        return null;
    }

    $sql = "SELECT product_id FROM $table_name WHERE 1=1";
    $args = array();
    $has_filter = false;

    // Shape
    if ( ! empty( $filters['shape'] ) ) {
        $sql .= " AND shape = %s";
        $args[] = $filters['shape'];
        $has_filter = true;
    }

    // Carat
    if ( isset( $filters['carat_min'] ) && $filters['carat_min'] !== '' ) {
        $sql .= " AND carat >= %f";
        $args[] = $filters['carat_min'];
        $has_filter = true;
    }

    if ( isset( $filters['carat_max'] ) && $filters['carat_max'] !== '' ) {
        $sql .= " AND carat <= %f";
        $args[] = $filters['carat_max'];
        $has_filter = true;
    }

    // Color (Supports CSV)
    if ( ! empty( $filters['color'] ) ) {
        $colors = array_filter( explode( ',', $filters['color'] ) );
        if ( ! empty( $colors ) ) {
            $placeholders = implode( ',', array_fill( 0, count( $colors ), '%s' ) );
            $sql .= " AND color IN ($placeholders)";
            $args = array_merge( $args, $colors );
            $has_filter = true;
        }
    }

    // Clarity (Supports CSV)
    if ( ! empty( $filters['clarity'] ) ) {
        $clarities = array_filter( explode( ',', $filters['clarity'] ) );
        if ( ! empty( $clarities ) ) {
            $placeholders = implode( ',', array_fill( 0, count( $clarities ), '%s' ) );
            $sql .= " AND clarity IN ($placeholders)";
            $args = array_merge( $args, $clarities );
            $has_filter = true;
        }
    }

    // Cut
    if ( ! empty( $filters['cut'] ) ) {
        $sql .= " AND cut = %s";
        $args[] = $filters['cut'];
        $has_filter = true;
    }

    // Polish
    if ( ! empty( $filters['polish'] ) ) {
        $sql .= " AND polish = %s";
        $args[] = $filters['polish'];
        $has_filter = true;
    }

    // Symmetry
    if ( ! empty( $filters['symmetry'] ) ) {
        $sql .= " AND symmetry = %s";
        $args[] = $filters['symmetry'];
        $has_filter = true;
    }

    // Fluorescence
    if ( ! empty( $filters['fluorescence'] ) ) {
        $sql .= " AND fluorescence = %s";
        $args[] = $filters['fluorescence'];
        $has_filter = true;
    }

    // Certification
    if ( ! empty( $filters['certification'] ) ) {
        $sql .= " AND certification = %s";
        $args[] = $filters['certification'];
        $has_filter = true;
    }

    // Price
    if ( isset( $filters['price_min'] ) && $filters['price_min'] !== '' ) {
        $sql .= " AND price >= %f";
        $args[] = $filters['price_min'];
        $has_filter = true;
    }

    if ( isset( $filters['price_max'] ) && $filters['price_max'] !== '' ) {
        $sql .= " AND price <= %f";
        $args[] = $filters['price_max'];
        $has_filter = true;
    }

    // Availability
    if ( ! empty( $filters['availability'] ) && $filters['availability'] === 'in-stock' ) {
        $sql .= " AND stock_status = 'instock'";
        $has_filter = true;
    }

    if ( ! $has_filter ) {
        return null;
    }

    if ( ! empty( $args ) ) {
        $sql = $wpdb->prepare( $sql, $args );
    }

    $ids = $wpdb->get_col( $sql );

    return array_map( 'intval', $ids );
}

/**
 * Check if inventory table is empty
 */
function astra_child_is_inventory_empty() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'diamond_inventory';
    // Check if table exists first to avoid error
    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
        return true;
    }
    $count = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name" );
    return ( $count == 0 );
}

/**
 * Admin notice to prompt index rebuild
 */
function astra_child_inventory_admin_notice() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // Check if table exists first (via db version)
    if ( get_option( 'astra_child_diamond_db_version' ) != '1.0' ) {
        return;
    }

    // Check if empty (cached transient to avoid query on every admin load)
    if ( false === ( $is_empty = get_transient( 'astra_child_inventory_is_empty' ) ) ) {
        $is_empty = astra_child_is_inventory_empty();
        set_transient( 'astra_child_inventory_is_empty', $is_empty, HOUR_IN_SECONDS );
    }

    if ( $is_empty ) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><?php _e( 'Diamond Inventory database is empty. Search filters will not work until indexed.', 'astra-child-diamond' ); ?></p>
            <p>
                <button id="rebuild-inventory-btn" class="button button-primary"><?php _e( 'Rebuild Index', 'astra-child-diamond' ); ?></button>
                <span id="rebuild-status" style="margin-left: 10px;"></span>
            </p>
            <script>
            jQuery(document).ready(function($) {
                $('#rebuild-inventory-btn').on('click', function() {
                    var btn = $(this);
                    var status = $('#rebuild-status');
                    btn.prop('disabled', true);
                    status.text('Starting...');

                    function processBatch( page ) {
                        $.post( ajaxurl, {
                            action: 'astra_child_rebuild_inventory',
                            page: page,
                            nonce: '<?php echo wp_create_nonce( "astra_child_rebuild_inventory" ); ?>'
                        }, function(response) {
                            if ( response.success ) {
                                if ( response.data.remaining > 0 ) {
                                    status.text('Processed ' + response.data.processed + ' products... (' + response.data.percentage + '%)');
                                    processBatch( page + 1 );
                                } else {
                                    status.text('Done! ' + response.data.processed + ' products indexed.');
                                    btn.hide();
                                }
                            } else {
                                status.text('Error: ' + (response.data ? response.data.message : 'Unknown error'));
                                btn.prop('disabled', false);
                            }
                        }).fail(function() {
                            status.text('Request failed.');
                            btn.prop('disabled', false);
                        });
                    }

                    processBatch( 1 );
                });
            });
            </script>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'astra_child_inventory_admin_notice' );

/**
 * AJAX Handler for batch rebuild
 */
function astra_child_ajax_rebuild_inventory() {
    check_ajax_referer( 'astra_child_rebuild_inventory', 'nonce' );

    if ( ! current_user_can( 'manage_options' ) ) {
        wp_send_json_error( array( 'message' => 'Permission denied' ) );
    }

    $page = isset( $_POST['page'] ) ? intval( $_POST['page'] ) : 1;
    $limit = 50; // Batch size
    $offset = ( $page - 1 ) * $limit;

    $products = get_posts( array(
        'post_type' => 'product',
        'posts_per_page' => $limit,
        'offset' => $offset,
        'fields' => 'ids',
        'orderby' => 'ID',
        'order' => 'ASC'
    ) );

    if ( empty( $products ) ) {
        delete_transient( 'astra_child_inventory_is_empty' );
        wp_send_json_success( array( 'remaining' => 0, 'processed' => $offset ) ); // Done
    }

    foreach ( $products as $id ) {
        astra_child_sync_product_to_inventory( $id );
    }

    $total_products = wp_count_posts( 'product' )->publish;
    $processed = $offset + count( $products );
    $percentage = $total_products > 0 ? round( ( $processed / $total_products ) * 100 ) : 100;

    wp_send_json_success( array(
        'remaining' => 1,
        'processed' => $processed,
        'percentage' => $percentage
    ) );
}
add_action( 'wp_ajax_astra_child_rebuild_inventory', 'astra_child_ajax_rebuild_inventory' );
