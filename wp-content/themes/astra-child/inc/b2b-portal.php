<?php
/**
 * B2B Wholesale Portal Functionality
 * 
 * @package Astra Child Diamond
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add B2B registration fields
 */
function astra_child_b2b_registration_fields() {
    ?>
    <?php wp_nonce_field( 'astra_child_b2b_registration', 'astra_child_b2b_registration_nonce' ); ?>
    <p class="form-row form-row-wide">
        <label for="reg_company_name"><?php _e( 'Company Name', 'astra-child-diamond' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="company_name" id="reg_company_name" value="<?php echo esc_attr( isset($_POST['company_name']) ? sanitize_text_field($_POST['company_name']) : '' ); ?>" />
    </p>
    
    <p class="form-row form-row-wide">
        <label for="reg_business_type"><?php _e( 'Business Type', 'astra-child-diamond' ); ?> <span class="required">*</span></label>
        <select name="business_type" id="reg_business_type" class="input-text">
            <option value=""><?php _e( 'Select Business Type', 'astra-child-diamond' ); ?></option>
            <option value="retailer" <?php selected( isset($_POST['business_type']) ? sanitize_text_field($_POST['business_type']) : '', 'retailer' ); ?>><?php _e( 'Retailer', 'astra-child-diamond' ); ?></option>
            <option value="wholesaler" <?php selected( isset($_POST['business_type']) ? sanitize_text_field($_POST['business_type']) : '', 'wholesaler' ); ?>><?php _e( 'Wholesaler', 'astra-child-diamond' ); ?></option>
            <option value="jewelry_designer" <?php selected( isset($_POST['business_type']) ? sanitize_text_field($_POST['business_type']) : '', 'jewelry_designer' ); ?>><?php _e( 'Jewelry Designer', 'astra-child-diamond' ); ?></option>
            <option value="manufacturer" <?php selected( isset($_POST['business_type']) ? sanitize_text_field($_POST['business_type']) : '', 'manufacturer' ); ?>><?php _e( 'Manufacturer', 'astra-child-diamond' ); ?></option>
            <option value="other" <?php selected( isset($_POST['business_type']) ? sanitize_text_field($_POST['business_type']) : '', 'other' ); ?>><?php _e( 'Other', 'astra-child-diamond' ); ?></option>
        </select>
    </p>
    
    <p class="form-row form-row-wide">
        <label for="reg_tax_id"><?php _e( 'Tax ID / Business License', 'astra-child-diamond' ); ?> <span class="required">*</span></label>
        <input type="text" class="input-text" name="tax_id" id="reg_tax_id" value="<?php echo esc_attr( isset($_POST['tax_id']) ? sanitize_text_field($_POST['tax_id']) : '' ); ?>" />
    </p>
    
    <p class="form-row form-row-wide">
        <label for="reg_phone"><?php _e( 'Business Phone', 'astra-child-diamond' ); ?> <span class="required">*</span></label>
        <input type="tel" class="input-text" name="business_phone" id="reg_phone" value="<?php echo esc_attr( isset($_POST['business_phone']) ? sanitize_text_field($_POST['business_phone']) : '' ); ?>" />
    </p>
    <?php
}
add_action( 'woocommerce_register_form', 'astra_child_b2b_registration_fields' );

/**
 * Validate B2B registration fields
 */
function astra_child_validate_b2b_registration( $errors, $username, $email ) {
    // Verify nonce
    if ( ! isset( $_POST['astra_child_b2b_registration_nonce'] ) || 
         ! wp_verify_nonce( $_POST['astra_child_b2b_registration_nonce'], 'astra_child_b2b_registration' ) ) {
        return $errors;
    }
    
    if ( isset( $_POST['company_name'] ) && empty( $_POST['company_name'] ) ) {
        $errors->add( 'company_name_error', __( 'Please enter your company name.', 'astra-child-diamond' ) );
    }
    
    if ( isset( $_POST['business_type'] ) && empty( $_POST['business_type'] ) ) {
        $errors->add( 'business_type_error', __( 'Please select your business type.', 'astra-child-diamond' ) );
    }
    
    if ( isset( $_POST['tax_id'] ) && empty( $_POST['tax_id'] ) ) {
        $errors->add( 'tax_id_error', __( 'Please enter your tax ID or business license.', 'astra-child-diamond' ) );
    }
    
    if ( isset( $_POST['business_phone'] ) && empty( $_POST['business_phone'] ) ) {
        $errors->add( 'business_phone_error', __( 'Please enter your business phone number.', 'astra-child-diamond' ) );
    }
    
    return $errors;
}
add_filter( 'woocommerce_registration_errors', 'astra_child_validate_b2b_registration', 10, 3 );

/**
 * Save B2B registration data
 */
function astra_child_save_b2b_registration_data( $customer_id ) {
    if ( isset( $_POST['company_name'] ) ) {
        update_user_meta( $customer_id, 'company_name', sanitize_text_field( $_POST['company_name'] ) );
    }
    
    if ( isset( $_POST['business_type'] ) ) {
        update_user_meta( $customer_id, 'business_type', sanitize_text_field( $_POST['business_type'] ) );
    }
    
    if ( isset( $_POST['tax_id'] ) ) {
        update_user_meta( $customer_id, 'tax_id', sanitize_text_field( $_POST['tax_id'] ) );
    }
    
    if ( isset( $_POST['business_phone'] ) ) {
        update_user_meta( $customer_id, 'business_phone', sanitize_text_field( $_POST['business_phone'] ) );
    }
    
    // Set user role to pending B2B customer
    $user = new WP_User( $customer_id );
    $user->set_role( 'customer' ); // Default to customer until approved
    update_user_meta( $customer_id, 'b2b_approval_status', 'pending' );
}
add_action( 'woocommerce_created_customer', 'astra_child_save_b2b_registration_data' );

/**
 * Add B2B pricing tiers
 */
function astra_child_get_b2b_price( $price, $product ) {
    if ( ! is_user_logged_in() ) {
        return $price;
    }
    
    $user_id = get_current_user_id();
    $approval_status = get_user_meta( $user_id, 'b2b_approval_status', true );
    
    if ( $approval_status !== 'approved' ) {
        return $price;
    }
    
    $pricing_tier = get_user_meta( $user_id, 'b2b_pricing_tier', true );
    
    // Apply discount based on tier
    $discount = 0;
    switch ( $pricing_tier ) {
        case 'bronze':
            $discount = 0.05; // 5% discount
            break;
        case 'silver':
            $discount = 0.10; // 10% discount
            break;
        case 'gold':
            $discount = 0.15; // 15% discount
            break;
        case 'platinum':
            $discount = 0.20; // 20% discount
            break;
    }
    
    if ( $discount > 0 ) {
        $b2b_price = $price * ( 1 - $discount );
        return $b2b_price;
    }
    
    return $price;
}
add_filter( 'woocommerce_product_get_price', 'astra_child_get_b2b_price', 10, 2 );
add_filter( 'woocommerce_product_variation_get_price', 'astra_child_get_b2b_price', 10, 2 );

/**
 * Add B2B dashboard endpoint
 */
function astra_child_add_b2b_endpoint() {
    add_rewrite_endpoint( 'b2b-dashboard', EP_ROOT | EP_PAGES );
}
add_action( 'init', 'astra_child_add_b2b_endpoint' );

/**
 * Add B2B menu item to My Account
 */
function astra_child_add_b2b_menu_item( $items ) {
    if ( is_user_logged_in() ) {
        $user_id = get_current_user_id();
        $approval_status = get_user_meta( $user_id, 'b2b_approval_status', true );
        
        if ( $approval_status === 'approved' ) {
            $new_items = array();
            foreach ( $items as $key => $value ) {
                $new_items[ $key ] = $value;
                if ( $key === 'dashboard' ) {
                    $new_items['b2b-dashboard'] = __( 'B2B Dashboard', 'astra-child-diamond' );
                }
            }
            return $new_items;
        }
    }
    
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'astra_child_add_b2b_menu_item' );

/**
 * B2B dashboard content
 */
function astra_child_b2b_dashboard_content() {
    $user_id = get_current_user_id();
    $company_name = get_user_meta( $user_id, 'company_name', true );
    $pricing_tier = get_user_meta( $user_id, 'b2b_pricing_tier', true );
    $credit_limit = get_user_meta( $user_id, 'b2b_credit_limit', true );
    $account_manager = get_user_meta( $user_id, 'b2b_account_manager', true );
    
    ?>
    <div class="b2b-dashboard">
        <h2><?php _e( 'B2B Wholesale Dashboard', 'astra-child-diamond' ); ?></h2>
        
        <div class="b2b-dashboard-header">
            <div class="company-info">
                <h3><?php echo esc_html( $company_name ); ?></h3>
                <?php if ( $pricing_tier ) : ?>
                <span class="tier-badge tier-<?php echo esc_attr( $pricing_tier ); ?>">
                    <?php echo esc_html( ucfirst( $pricing_tier ) ); ?> <?php _e( 'Tier', 'astra-child-diamond' ); ?>
                </span>
                <?php endif; ?>
            </div>
            
            <?php if ( $account_manager ) : ?>
            <div class="account-manager-info">
                <p><strong><?php _e( 'Your Account Manager:', 'astra-child-diamond' ); ?></strong></p>
                <p><?php echo esc_html( $account_manager ); ?></p>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="b2b-pricing-info">
            <h3><?php _e( 'Pricing Tiers', 'astra-child-diamond' ); ?></h3>
            <div class="pricing-tiers">
                <div class="pricing-tier <?php echo $pricing_tier === 'bronze' ? 'active' : ''; ?>">
                    <span class="tier-badge">Bronze</span>
                    <p><?php _e( '5% Discount', 'astra-child-diamond' ); ?></p>
                    <p class="tier-requirement"><?php _e( '$5,000+ annual purchases', 'astra-child-diamond' ); ?></p>
                </div>
                <div class="pricing-tier <?php echo $pricing_tier === 'silver' ? 'active' : ''; ?>">
                    <span class="tier-badge">Silver</span>
                    <p><?php _e( '10% Discount', 'astra-child-diamond' ); ?></p>
                    <p class="tier-requirement"><?php _e( '$15,000+ annual purchases', 'astra-child-diamond' ); ?></p>
                </div>
                <div class="pricing-tier <?php echo $pricing_tier === 'gold' ? 'active' : ''; ?>">
                    <span class="tier-badge">Gold</span>
                    <p><?php _e( '15% Discount', 'astra-child-diamond' ); ?></p>
                    <p class="tier-requirement"><?php _e( '$50,000+ annual purchases', 'astra-child-diamond' ); ?></p>
                </div>
                <div class="pricing-tier <?php echo $pricing_tier === 'platinum' ? 'active' : ''; ?>">
                    <span class="tier-badge">Platinum</span>
                    <p><?php _e( '20% Discount', 'astra-child-diamond' ); ?></p>
                    <p class="tier-requirement"><?php _e( '$100,000+ annual purchases', 'astra-child-diamond' ); ?></p>
                </div>
            </div>
        </div>
        
        <?php if ( $credit_limit ) : ?>
        <div class="b2b-credit-info">
            <h3><?php _e( 'Credit Information', 'astra-child-diamond' ); ?></h3>
            <p><strong><?php _e( 'Credit Limit:', 'astra-child-diamond' ); ?></strong> $<?php echo number_format( $credit_limit, 2 ); ?></p>
            <p><?php _e( 'Net 30 payment terms available', 'astra-child-diamond' ); ?></p>
        </div>
        <?php endif; ?>
        
        <div class="b2b-actions">
            <h3><?php _e( 'Quick Actions', 'astra-child-diamond' ); ?></h3>
            <div class="action-buttons">
                <a href="<?php echo home_url( '/shop/' ); ?>" class="btn btn-primary">
                    <?php _e( 'Browse Inventory', 'astra-child-diamond' ); ?>
                </a>
                <button class="btn btn-outline" id="csv-upload-btn">
                    <?php _e( 'Upload CSV Order', 'astra-child-diamond' ); ?>
                </button>
                <a href="<?php echo home_url( '/b2b-resources/' ); ?>" class="btn btn-outline">
                    <?php _e( 'Marketing Materials', 'astra-child-diamond' ); ?>
                </a>
                <a href="<?php echo home_url( '/trade-shows/' ); ?>" class="btn btn-outline">
                    <?php _e( 'Trade Show Calendar', 'astra-child-diamond' ); ?>
                </a>
            </div>
        </div>
        
        <div class="b2b-order-history">
            <h3><?php _e( 'Recent Orders', 'astra-child-diamond' ); ?></h3>
            <?php
            $customer_orders = wc_get_orders( array(
                'customer' => $user_id,
                'limit'    => 5,
                'orderby'  => 'date',
                'order'    => 'DESC',
            ) );
            
            if ( $customer_orders ) {
                echo '<table class="b2b-orders-table">';
                echo '<thead><tr>';
                echo '<th>' . __( 'Order', 'astra-child-diamond' ) . '</th>';
                echo '<th>' . __( 'Date', 'astra-child-diamond' ) . '</th>';
                echo '<th>' . __( 'Status', 'astra-child-diamond' ) . '</th>';
                echo '<th>' . __( 'Total', 'astra-child-diamond' ) . '</th>';
                echo '<th>' . __( 'Actions', 'astra-child-diamond' ) . '</th>';
                echo '</tr></thead><tbody>';
                
                foreach ( $customer_orders as $order ) {
                    echo '<tr>';
                    echo '<td><a href="' . $order->get_view_order_url() . '">#' . $order->get_order_number() . '</a></td>';
                    echo '<td>' . $order->get_date_created()->date( 'M d, Y' ) . '</td>';
                    echo '<td>' . wc_get_order_status_name( $order->get_status() ) . '</td>';
                    echo '<td>' . $order->get_formatted_order_total() . '</td>';
                    echo '<td><a href="' . $order->get_view_order_url() . '">' . __( 'View', 'astra-child-diamond' ) . '</a></td>';
                    echo '</tr>';
                }
                
                echo '</tbody></table>';
            } else {
                echo '<p>' . __( 'No orders yet.', 'astra-child-diamond' ) . '</p>';
            }
            ?>
        </div>
        
        <div class="b2b-resources">
            <h3><?php _e( 'Resources', 'astra-child-diamond' ); ?></h3>
            <ul>
                <li><a href="<?php echo home_url( '/api-documentation/' ); ?>"><?php _e( 'API Documentation', 'astra-child-diamond' ); ?></a></li>
                <li><a href="<?php echo home_url( '/certification-guides/' ); ?>"><?php _e( 'Certification Guides', 'astra-child-diamond' ); ?></a></li>
                <li><a href="<?php echo home_url( '/dropshipping-info/' ); ?>"><?php _e( 'White-Label Dropshipping', 'astra-child-diamond' ); ?></a></li>
                <li><a href="<?php echo home_url( '/wholesale-terms/' ); ?>"><?php _e( 'Wholesale Terms & Conditions', 'astra-child-diamond' ); ?></a></li>
            </ul>
        </div>
    </div>
    <?php
}
add_action( 'woocommerce_account_b2b-dashboard_endpoint', 'astra_child_b2b_dashboard_content' );

/**
 * CSV Order Upload Handler
 */
function astra_child_handle_csv_upload() {
    check_ajax_referer( 'diamond-search-nonce', 'nonce' );
    
    if ( ! is_user_logged_in() ) {
        wp_send_json_error( array( 'message' => __( 'You must be logged in.', 'astra-child-diamond' ) ) );
    }
    
    $user_id = get_current_user_id();
    $approval_status = get_user_meta( $user_id, 'b2b_approval_status', true );
    
    if ( $approval_status !== 'approved' ) {
        wp_send_json_error( array( 'message' => __( 'B2B approval required.', 'astra-child-diamond' ) ) );
    }
    
    if ( ! isset( $_FILES['csv_file'] ) ) {
        wp_send_json_error( array( 'message' => __( 'No file uploaded.', 'astra-child-diamond' ) ) );
    }
    
    // Process CSV file
    $file = $_FILES['csv_file']['tmp_name'];
    $handle = fopen( $file, 'r' );
    
    $products = array();
    $row = 0;
    
    while ( ( $data = fgetcsv( $handle ) ) !== false ) {
        $row++;
        if ( $row === 1 ) continue; // Skip header
        
        // Expected format: SKU, Quantity
        if ( count( $data ) >= 2 ) {
            $products[] = array(
                'sku' => $data[0],
                'quantity' => intval( $data[1] )
            );
        }
    }
    
    fclose( $handle );
    
    // Add products to cart
    $added = 0;
    foreach ( $products as $item ) {
        $product_id = wc_get_product_id_by_sku( $item['sku'] );
        if ( $product_id ) {
            WC()->cart->add_to_cart( $product_id, $item['quantity'] );
            $added++;
        }
    }
    
    wp_send_json_success( array(
        'message' => sprintf( __( '%d products added to cart.', 'astra-child-diamond' ), $added )
    ) );
}
add_action( 'wp_ajax_handle_csv_upload', 'astra_child_handle_csv_upload' );
