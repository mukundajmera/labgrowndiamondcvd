<?php
/**
 * LGD Currency Switcher Module
 * 
 * Implements dual currency display (INR/USD) with real-time exchange rate caching.
 */

if (!defined('ABSPATH')) {
    die;
}

class LGD_Currency_Switcher {

    private $default_currency = 'USD';
    private $secondary_currency = 'INR';
    private $cache_key = 'lgd_exchange_rate_usd_inr';
    private $cached_rate = null;

    public function __construct() {
        // Hook into price display
        add_filter('woocommerce_get_price_html', array($this, 'format_dual_price'), 100, 2);
        
        // AJAX hooks for switching currency
        add_action('wp_ajax_lgd_switch_currency', array($this, 'ajax_switch_currency'));
        add_action('wp_ajax_nopriv_lgd_switch_currency', array($this, 'ajax_switch_currency'));

        // Enqueue styles and scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    /**
     * Get the current exchange rate (USD to INR), cached for 12 hours.
     */
    public function get_exchange_rate() {
        if ($this->cached_rate !== null) {
            return $this->cached_rate;
        }

        $rate = get_transient($this->cache_key);

        if (false === $rate) {
            // Fetch from a public API
            $response = wp_remote_get('https://api.exchangerate-api.com/v4/latest/USD');
            
            if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
                $body = wp_remote_retrieve_body($response);
                $data = json_decode($body, true);
                if (isset($data['rates']['INR'])) {
                    $rate = floatval($data['rates']['INR']);
                    set_transient($this->cache_key, $rate, 12 * HOUR_IN_SECONDS);
                }
            }

            // Fallback rate if API fails
            if (!$rate) {
                $rate = 83.00; // Default fallback
                set_transient($this->cache_key, $rate, 1 * HOUR_IN_SECONDS); // Cache fallback for a shorter time to avoid hammering
            }
        }

        $this->cached_rate = $rate;
        return $rate;
    }

    /**
     * Get user selected active currency (USD or INR).
     */
    public function get_active_currency() {
        if (isset($_COOKIE['lgd_active_currency'])) {
            $currency = sanitize_text_field($_COOKIE['lgd_active_currency']);
            if (in_array($currency, array('USD', 'INR'))) {
                return $currency;
            }
        }
        return $this->default_currency;
    }

    /**
     * Format the price HTML to include dual currency pills.
     */
    public function format_dual_price($price_html, $product) {
        if (is_admin()) return $price_html;
        
        $price = $product->get_price();
        if (!$price) return $price_html;

        $base_currency = get_option('woocommerce_currency');
        $rate = $this->get_exchange_rate();
        
        $usd_price = 0;
        $inr_price = 0;

        if ($base_currency === 'USD') {
            $usd_price = floatval($price);
            $inr_price = $usd_price * $rate;
        } else {
            // Assuming base is INR
            $inr_price = floatval($price);
            $usd_price = $inr_price / $rate;
        }

        $active_currency = $this->get_active_currency();
        
        // Build the dual price structure, wrapping original price for full context
        $html = '<span class="lgd-dual-price" data-active="' . esc_attr($active_currency) . '">';
        
        // Output USD pill
        $usd_active_class = $active_currency === 'USD' ? ' active' : '';
        $html .= '<span class="currency-pill price-usd' . $usd_active_class . '" data-currency="USD">';
        $html .= '<span class="currency-symbol">$</span>';
        $html .= '<span class="currency-amount">' . number_format($usd_price, 2) . '</span>';
        $html .= '</span>';

        $html .= '<span class="currency-separator"> / </span>';

        // Output INR pill
        $inr_active_class = $active_currency === 'INR' ? ' active' : '';
        $html .= '<span class="currency-pill price-inr' . $inr_active_class . '" data-currency="INR">';
        $html .= '<span class="currency-symbol">₹</span>';
        $html .= '<span class="currency-amount">' . number_format($inr_price, 0) . '</span>';
        $html .= '</span>';
        
        $html .= '</span>';

        // Re-inject original prefix/suffix if present, though strictly overriding here based on pill requirements
        return $html;
    }

    /**
     * AJAX handler to switch the currency.
     */
    public function ajax_switch_currency() {
        check_ajax_referer('lgd-currency-nonce', 'security');

        $new_currency = isset($_POST['currency']) ? sanitize_text_field($_POST['currency']) : 'USD';
        
        if (in_array($new_currency, array('USD', 'INR'))) {
            // Set cookie for 30 days
            setcookie('lgd_active_currency', $new_currency, time() + 30 * DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN);
            wp_send_json_success(array('currency' => $new_currency));
        }

        wp_send_json_error(array('message' => 'Invalid currency'));
    }

    /**
     * Enqueue styles and scripts.
     */
    public function enqueue_assets() {
        wp_enqueue_style('lgd-currency-switcher', get_stylesheet_directory_uri() . '/assets/css/currency-switcher.css', array(), '1.0.0');

        wp_enqueue_script('jquery');
        wp_add_inline_script('jquery', "
            jQuery(document).ready(function($) {
                // Toggle currency switcher dropdown
                $('.lgd-currency-selector-btn').on('click', function(e) {
                    e.preventDefault();
                    $('.lgd-currency-dropdown').toggleClass('open');
                });

                // Close dropdown when clicking outside
                $(document).on('click', function(e) {
                    if (!$(e.target).closest('.lgd-currency-switcher-wrap').length) {
                        $('.lgd-currency-dropdown').removeClass('open');
                    }
                });

                // Handle currency switch
                $('.lgd-currency-option').on('click', function(e) {
                    e.preventDefault();
                    var newCurrency = $(this).data('currency');
                    
                    $.ajax({
                        url: lgd_currency_ajax.ajax_url,
                        type: 'POST',
                        data: {
                            action: 'lgd_switch_currency',
                            currency: newCurrency,
                            security: lgd_currency_ajax.nonce
                        },
                        success: function(response) {
                            if (response.success) {
                                location.reload();
                            }
                        }
                    });
                });
            });
        ");

        wp_localize_script('jquery', 'lgd_currency_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('lgd-currency-nonce')
        ));
    }
}

// Global instance to prevent multiple hooks being registered
global $lgd_currency_switcher;
$lgd_currency_switcher = new LGD_Currency_Switcher();

/**
 * Template tag to display the currency switcher.
 */
function lgd_display_currency_switcher() {
    global $lgd_currency_switcher;
    
    $active = $lgd_currency_switcher->get_active_currency();
    $inactive = $active === 'USD' ? 'INR' : 'USD';
    $inactive_symbol = $inactive === 'USD' ? '$' : '₹';
    $active_symbol = $active === 'USD' ? '$' : '₹';

    ?>
    <div class="lgd-currency-switcher-wrap">
        <button class="lgd-currency-selector-btn">
            <span class="current-currency-symbol"><?php echo esc_html($active_symbol); ?></span>
            <span class="current-currency-code"><?php echo esc_html($active); ?></span>
            <svg class="chevron-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
        </button>
        <div class="lgd-currency-dropdown">
            <a href="#" class="lgd-currency-option" data-currency="<?php echo esc_attr($inactive); ?>">
                <span class="option-currency-symbol"><?php echo esc_html($inactive_symbol); ?></span>
                <span class="option-currency-code"><?php echo esc_html($inactive); ?></span>
            </a>
            <a href="#" class="lgd-currency-option active" data-currency="<?php echo esc_attr($active); ?>">
                <span class="option-currency-symbol"><?php echo esc_html($active_symbol); ?></span>
                <span class="option-currency-code"><?php echo esc_html($active); ?></span>
            </a>
        </div>
    </div>
    <?php
}
