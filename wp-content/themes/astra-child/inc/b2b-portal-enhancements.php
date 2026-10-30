<?php
/**
 * B2B Portal Enhancements
 * 
 * Implements tiered volume pricing, certificate downloads, and GST validation for B2B portal.
 */

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Check if the current user is an approved B2B user.
 */
function astra_child_is_b2b_user() {
    if ( ! is_user_logged_in() ) {
        return false;
    }
    
    // Check for b2b_buyer capability
    if ( current_user_can( 'b2b_buyer' ) ) {
        return true;
    }
    
    // Fallback: check for b2b_customer role and approved status
    $user_id = get_current_user_id();
    $user = get_userdata( $user_id );
    if ( $user && in_array( 'b2b_customer', (array) $user->roles ) ) {
        $approval_status = get_user_meta( $user_id, 'b2b_approval_status', true );
        if ( $approval_status === 'approved' ) {
            return true;
        }
    }
    
    return false;
}

/**
 * Apply tiered volume pricing based on cart total carats.
 */
function astra_child_b2b_volume_pricing( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }
    
    // Only run once in cart calculation
    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 ) {
        return;
    }

    if ( ! astra_child_is_b2b_user() ) {
        return;
    }

    $total_carats = 0;

    // Calculate total carats in cart
    foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
        $product = $cart_item['data'];
        $carat = get_post_meta( $product->get_id(), '_diamond_carat', true );
        
        if ( is_numeric( $carat ) ) {
            $total_carats += (float) $carat * $cart_item['quantity'];
        }
    }

    // Determine discount percentage
    $discount = 0;
    if ( $total_carats >= 25 ) {
        $discount = 0.15; // 15% discount for 25+ carats
    } elseif ( $total_carats >= 10 ) {
        $discount = 0.10; // 10% discount for 10+ carats
    } elseif ( $total_carats >= 5 ) {
        $discount = 0.05; // 5% discount for 5+ carats
    }

    // Apply discount if applicable
    if ( $discount > 0 ) {
        foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
            $product = $cart_item['data'];
            $price = $product->get_price();
            $new_price = $price * ( 1 - $discount );
            $product->set_price( $new_price );
        }
    }
}
add_action( 'woocommerce_before_calculate_totals', 'astra_child_b2b_volume_pricing', 10, 1 );

/**
 * Add instant PDF certificate download button.
 */
function astra_child_b2b_certificate_download() {
    global $product;
    
    if ( ! $product || ! astra_child_is_b2b_user() ) {
        return;
    }
    
    $product_id = $product->get_id();
    
    // Check ACF get_field if it exists, fallback to get_post_meta
    $certificate_url = '';
    if ( function_exists( 'get_field' ) ) {
        $certificate_url = get_field( 'certificate_url', $product_id );
    }
    if ( empty( $certificate_url ) ) {
        $certificate_url = get_post_meta( $product_id, 'certificate_url', true );
    }
    
    if ( ! empty( $certificate_url ) ) {
        echo '<a href="' . esc_url( $certificate_url ) . '" target="_blank" rel="noopener noreferrer" class="button b2b-cert-download" style="margin-top: 10px; display: block; text-align: center;">' . esc_html__( 'Download PDF Certificate', 'astra-child-diamond' ) . '</a>';
    }
}
add_action( 'woocommerce_after_shop_loop_item', 'astra_child_b2b_certificate_download', 25 );

/**
 * Add GST invoice number field to checkout for B2B users.
 */
function astra_child_b2b_gst_checkout_field( $fields ) {
    if ( astra_child_is_b2b_user() ) {
        $fields['billing']['b2b_gst_number'] = array(
            'label'       => __( 'GST Invoice Number', 'astra-child-diamond' ),
            'placeholder' => _x( 'Enter GST Number', 'placeholder', 'astra-child-diamond' ),
            'required'    => true,
            'class'       => array( 'form-row-wide' ),
            'clear'       => true,
        );
    }
    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'astra_child_b2b_gst_checkout_field' );

/**
 * Validate GST invoice number during checkout.
 */
function astra_child_b2b_validate_gst_checkout() {
    if ( astra_child_is_b2b_user() ) {
        if ( isset( $_POST['b2b_gst_number'] ) && empty( sanitize_text_field( $_POST['b2b_gst_number'] ) ) ) {
            wc_add_notice( __( 'GST Invoice Number is a required field for B2B transactions.', 'astra-child-diamond' ), 'error' );
        } elseif ( isset( $_POST['b2b_gst_number'] ) && strlen( sanitize_text_field( $_POST['b2b_gst_number'] ) ) < 5 ) {
            // Simple length validation for GST
            wc_add_notice( __( 'Please enter a valid GST Invoice Number.', 'astra-child-diamond' ), 'error' );
        } else if ( isset( $_POST['b2b_gst_number'] ) ) {
            WC()->session->set('b2b_gst_number_valid', sanitize_text_field( $_POST['b2b_gst_number'] ));
        }
    }
}
add_action( 'woocommerce_checkout_process', 'astra_child_b2b_validate_gst_checkout' );

/**
 * Save GST invoice number to order meta.
 */
function astra_child_b2b_save_gst_checkout( $order_id ) {
    if ( isset( $_POST['b2b_gst_number'] ) ) {
        update_post_meta( $order_id, '_b2b_gst_number', sanitize_text_field( $_POST['b2b_gst_number'] ) );
    }
}
add_action( 'woocommerce_checkout_update_order_meta', 'astra_child_b2b_save_gst_checkout' );

/**
 * Set VAT exemption if GST is valid for B2B user.
 */
function astra_child_b2b_tax_exemption( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }
    
    if ( ! astra_child_is_b2b_user() ) {
        return;
    }
    
    // Check if a valid GST number is provided in session or checkout (POST data)
    $has_valid_gst = false;
    
    if ( isset($_POST['post_data']) ) {
        parse_str($_POST['post_data'], $post_data);
        if ( ! empty($post_data['b2b_gst_number']) && strlen($post_data['b2b_gst_number']) >= 5 ) {
            $has_valid_gst = true;
        }
    }
    
    if ( WC()->session->get('b2b_gst_number_valid') ) {
        $has_valid_gst = true;
    }
    
    if ( $has_valid_gst ) {
        WC()->customer->set_is_vat_exempt( true );
    }
}
add_action( 'woocommerce_cart_calculate_fees', 'astra_child_b2b_tax_exemption', 20, 1 );
