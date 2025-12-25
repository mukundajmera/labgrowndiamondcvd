<?php
/**
 * Plugin Name: LGD Diamond Core
 * Plugin URI: https://labgrowndiamondcvd.com
 * Description: Core backend plugin for Lab Grown Diamond Marketplace. Handles taxonomies, data structures, and inventory generation.
 * Version: 1.0.0
 * Author: Lab Grown Diamond CVD
 * Author URI: https://labgrowndiamondcvd.com
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * WC requires at least: 5.0
 * WC tested up to: 8.0
 * Text Domain: lgd-diamond-core
 * Domain Path: /languages
 * License: GPL v2 or later
 */

defined('ABSPATH') or exit;

// ============================================
// PLUGIN CONSTANTS
// ============================================
define('LGD_CORE_PATH', plugin_dir_path(__FILE__));
define('LGD_CORE_URL', plugin_dir_url(__FILE__));
define('LGD_CORE_VERSION', '1.0.0');

/**
 * Main Plugin Class
 * 
 * Handles all core functionality for the Diamond Marketplace.
 */
final class LGD_Diamond_Core
{

    /**
     * Single instance of the class
     * @var LGD_Diamond_Core
     */
    private static $instance = null;

    /**
     * Diamond taxonomy configurations
     * @var array
     */
    private $taxonomies = [
        'diamond_shape' => ['Shape', 'Shapes'],
        'diamond_color' => ['Color', 'Colors'],
        'diamond_clarity' => ['Clarity', 'Clarities'],
        'diamond_cut' => ['Cut', 'Cuts'],
        'diamond_lab' => ['Lab', 'Labs'],
    ];

    /**
     * Get single instance of the class
     * @return LGD_Diamond_Core
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Private constructor to prevent direct instantiation
     */
    private function __construct()
    {
        $this->init_hooks();
    }

    /**
     * Initialize WordPress hooks
     */
    private function init_hooks()
    {
        // Register taxonomies on init
        add_action('init', [$this, 'register_taxonomies'], 5);

        // Mock data generator (admin only)
        add_action('admin_init', [$this, 'generate_mock_data']);

        // Activation hook
        register_activation_hook(__FILE__, [$this, 'activate_plugin']);

        // Deactivation hook
        register_deactivation_hook(__FILE__, [$this, 'deactivate_plugin']);

        // ============================================
        // FRONTEND HOOKS
        // ============================================

        // Remove Add to Cart button from shop grid
        add_action('woocommerce_after_shop_loop_item', [$this, 'remove_add_to_cart_button'], 1);

        // Inject diamond specs after product title
        add_action('woocommerce_shop_loop_item_title', [$this, 'inject_diamond_specs'], 15);

        // Enqueue luxury CSS
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_styles']);
    }

    /**
     * FRONTEND: Remove Add to Cart Button from Grid
     * 
     * Removes the default WooCommerce add to cart button from shop loops.
     */
    public function remove_add_to_cart_button()
    {
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    }

    /**
     * FRONTEND: Inject Diamond Specs Below Title
     * 
     * Outputs custom HTML with diamond attributes from taxonomy terms and meta.
     */
    public function inject_diamond_specs()
    {
        global $product;

        if (!$product) {
            return;
        }

        $product_id = $product->get_id();

        // Retrieve taxonomy terms
        $shape_terms = get_the_terms($product_id, 'diamond_shape');
        $color_terms = get_the_terms($product_id, 'diamond_color');
        $clarity_terms = get_the_terms($product_id, 'diamond_clarity');
        $cut_terms = get_the_terms($product_id, 'diamond_cut');

        // Get meta value
        $carat = get_post_meta($product_id, '_diamond_carat', true);

        // Extract term names (first term only)
        $shape = ($shape_terms && !is_wp_error($shape_terms)) ? $shape_terms[0]->name : '';
        $color = ($color_terms && !is_wp_error($color_terms)) ? $color_terms[0]->name : '';
        $clarity = ($clarity_terms && !is_wp_error($clarity_terms)) ? $clarity_terms[0]->name : '';
        $cut = ($cut_terms && !is_wp_error($cut_terms)) ? $cut_terms[0]->name : '';

        // Only display if we have data
        if (!$shape && !$carat && !$color && !$clarity) {
            return;
        }

        echo '<div class="lgd-card-specs">';

        // Row 1: Shape • Carat (Bold)
        if ($shape || $carat) {
            echo '<p class="lgd-specs-primary">';
            $parts = [];
            if ($shape) {
                $parts[] = esc_html($shape);
            }
            if ($carat) {
                $parts[] = esc_html(number_format((float) $carat, 2)) . 'ct';
            }
            echo '<strong>' . implode(' • ', $parts) . '</strong>';
            echo '</p>';
        }

        // Row 2: Color | Clarity | Cut (Muted)
        if ($color || $clarity || $cut) {
            echo '<p class="lgd-specs-secondary">';
            $parts = [];
            if ($color) {
                $parts[] = esc_html($color);
            }
            if ($clarity) {
                $parts[] = esc_html($clarity);
            }
            if ($cut) {
                $parts[] = esc_html($cut);
            }
            echo implode(' | ', $parts);
            echo '</p>';
        }

        echo '</div>';
    }

    /**
     * FRONTEND: Enqueue Luxury CSS Stylesheet
     * 
     * Loads the mobile-first luxury grid styles on shop pages.
     */
    public function enqueue_frontend_styles()
    {
        if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
            wp_enqueue_style(
                'lgd-luxury-grid',
                LGD_CORE_URL . 'assets/css/lgd-luxury.css',
                [],
                LGD_CORE_VERSION
            );
        }
    }

    /**
     * FUNCTION 1: Register Diamond Taxonomies
     * 
     * Registers hierarchical custom taxonomies for WooCommerce products.
     * All taxonomies are REST-enabled for Block Editor compatibility.
     */
    public function register_taxonomies()
    {
        foreach ($this->taxonomies as $taxonomy => $labels) {
            $args = [
                'labels' => [
                    'name' => $labels[1],
                    'singular_name' => $labels[0],
                    'search_items' => sprintf('Search %s', $labels[1]),
                    'popular_items' => sprintf('Popular %s', $labels[1]),
                    'all_items' => sprintf('All %s', $labels[1]),
                    'parent_item' => sprintf('Parent %s', $labels[0]),
                    'parent_item_colon' => sprintf('Parent %s:', $labels[0]),
                    'edit_item' => sprintf('Edit %s', $labels[0]),
                    'view_item' => sprintf('View %s', $labels[0]),
                    'update_item' => sprintf('Update %s', $labels[0]),
                    'add_new_item' => sprintf('Add New %s', $labels[0]),
                    'new_item_name' => sprintf('New %s Name', $labels[0]),
                    'separate_items_with_commas' => sprintf('Separate %s with commas', strtolower($labels[1])),
                    'add_or_remove_items' => sprintf('Add or remove %s', strtolower($labels[1])),
                    'choose_from_most_used' => sprintf('Choose from the most used %s', strtolower($labels[1])),
                    'not_found' => sprintf('No %s found', strtolower($labels[1])),
                    'no_terms' => sprintf('No %s', strtolower($labels[1])),
                    'menu_name' => $labels[1],
                    'back_to_items' => sprintf('← Back to %s', $labels[1]),
                ],
                'hierarchical' => true,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'show_tagcloud' => false,
                'show_in_quick_edit' => true,
                'show_admin_column' => true,
                'show_in_rest' => true, // CRITICAL for Block Editor
                'query_var' => true,
                'rewrite' => [
                    'slug' => str_replace('diamond_', '', $taxonomy),
                    'with_front' => false,
                    'hierarchical' => true,
                ],
            ];

            register_taxonomy($taxonomy, ['product'], $args);
        }
    }

    /**
     * FUNCTION 2: Generate Mock Diamond Data
     * 
     * Creates 50 sample WooCommerce products with random diamond attributes.
     * Triggered via: /wp-admin/?lgd_gen=true
     */
    public function generate_mock_data()
    {
        // Check trigger parameter
        if (!isset($_GET['lgd_gen']) || sanitize_text_field(wp_unslash($_GET['lgd_gen'])) !== 'true') {
            return;
        }

        // Security: Verify nonce (CSRF protection)
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'lgd_gen_nonce')) {
            wp_die(
                '<div style="font-family: system-ui; padding: 40px; text-align: center;">
                    <h2 style="color: #d32f2f;">⛔ Security Check Failed</h2>
                    <p>Invalid or expired security token. Please try again from the admin dashboard.</p>
                </div>',
                'Security Error',
                ['response' => 403]
            );
        }

        // Security: Verify admin user
        if (!current_user_can('manage_options')) {
            wp_die(
                '<div style="font-family: system-ui; padding: 40px; text-align: center;">
                    <h2 style="color: #d32f2f;">⛔ Access Denied</h2>
                    <p>You must be an administrator to generate mock data.</p>
                </div>',
                'Permission Denied',
                ['response' => 403]
            );
        }

        // Check WooCommerce is active
        if (!class_exists('WC_Product_Simple')) {
            wp_die(
                '<div style="font-family: system-ui; padding: 40px; text-align: center;">
                    <h2 style="color: #d32f2f;">⚠️ WooCommerce Required</h2>
                    <p>Please activate WooCommerce before generating products.</p>
                </div>',
                'WooCommerce Required',
                ['response' => 400]
            );
        }

        // Define available terms
        $shapes = ['Round', 'Oval', 'Emerald', 'Radiant', 'Cushion', 'Princess', 'Pear', 'Marquise'];
        $colors = ['D', 'E', 'F', 'G', 'H'];
        $clarities = ['IF', 'VVS1', 'VVS2', 'VS1', 'VS2'];
        $cuts = ['Ideal', 'Excellent', 'Very Good', 'Good'];
        $labs = ['IGI', 'GIA'];

        // Ensure taxonomy terms exist
        $this->ensure_terms_exist('diamond_shape', $shapes);
        $this->ensure_terms_exist('diamond_color', $colors);
        $this->ensure_terms_exist('diamond_clarity', $clarities);
        $this->ensure_terms_exist('diamond_cut', $cuts);
        $this->ensure_terms_exist('diamond_lab', $labs);

        // Check existing product count
        $existing_count = wp_count_posts('product')->publish;
        $max_products = 50;

        if ($existing_count >= $max_products) {
            wp_die(
                sprintf(
                    '<div style="font-family: system-ui; padding: 40px; text-align: center;">
                        <h2 style="color: #ff9800;">⚠️ Products Already Exist</h2>
                        <p>Found %d products. Generation limit is %d.</p>
                        <a href="%s" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background: #1976d2; color: white; text-decoration: none; border-radius: 4px;">View Shop</a>
                    </div>',
                    $existing_count,
                    $max_products,
                    esc_url(get_permalink(wc_get_page_id('shop')))
                ),
                'Products Exist'
            );
        }

        $created_count = 0;
        $products_to_create = $max_products - $existing_count;

        for ($i = 0; $i < $products_to_create; $i++) {
            // Generate random diamond attributes
            $carat = round(mt_rand(50, 300) / 100, 2); // 0.50 - 3.00
            $shape = $shapes[array_rand($shapes)];
            $color = $colors[array_rand($colors)];
            $clarity = $clarities[array_rand($clarities)];
            $cut = $cuts[array_rand($cuts)];
            $lab = $labs[array_rand($labs)];

            // Generate product title
            $title = sprintf(
                '%sct %s Diamond - %s/%s',
                number_format($carat, 2),
                $shape,
                $color,
                $clarity
            );

            // Check for duplicate titles (WP_Query replaces deprecated get_page_by_title)
            $existing_query = new WP_Query([
                'post_type' => 'product',
                'title' => $title,
                'post_status' => 'all',
                'posts_per_page' => 1,
                'no_found_rows' => true,
                'ignore_sticky_posts' => true,
                'update_post_term_cache' => false,
                'update_post_meta_cache' => false,
            ]);
            if ($existing_query->have_posts()) {
                wp_reset_postdata();
                continue;
            }
            wp_reset_postdata();

            // Create WooCommerce product
            $product = new WC_Product_Simple();
            $product->set_name($title);
            $product->set_status('publish');
            $product->set_catalog_visibility('visible');

            // Random price between 800 and 5000
            $price = round(mt_rand(80000, 500000) / 100, 2);
            $product->set_regular_price($price);
            $product->set_price($price);

            // Stock settings
            $product->set_stock_status('instock');
            $product->set_manage_stock(false);

            // SKU
            $product->set_sku('LGD-' . strtoupper(substr($shape, 0, 3)) . '-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT));

            // Save product to get ID
            $product_id = $product->save();

            if ($product_id) {
                // Assign taxonomy terms
                wp_set_object_terms($product_id, $shape, 'diamond_shape');
                wp_set_object_terms($product_id, $color, 'diamond_color');
                wp_set_object_terms($product_id, $clarity, 'diamond_clarity');
                wp_set_object_terms($product_id, $cut, 'diamond_cut');
                wp_set_object_terms($product_id, $lab, 'diamond_lab');

                // Store meta data
                update_post_meta($product_id, '_diamond_carat', $carat);
                update_post_meta($product_id, '_diamond_depth', mt_rand(58, 63)); // 58-63%
                update_post_meta($product_id, '_diamond_table', mt_rand(54, 60)); // 54-60%
                update_post_meta($product_id, '_igi_cert', $this->generate_cert_number($lab));

                $created_count++;
            }
        }

        // Success message
        wp_die(
            sprintf(
                '<div style="font-family: system-ui; padding: 40px; text-align: center; max-width: 500px; margin: 50px auto;">
                    <div style="font-size: 64px; margin-bottom: 20px;">💎</div>
                    <h1 style="color: #2e7d32; margin-bottom: 10px;">Success!</h1>
                    <p style="font-size: 18px; color: #333;">%d Diamond products generated.</p>
                    <div style="margin-top: 30px;">
                        <a href="%s" style="display: inline-block; padding: 14px 28px; background: linear-gradient(135deg, #1a1a1a, #333); color: white; text-decoration: none; border-radius: 6px; font-weight: 500; margin-right: 10px;">View Shop</a>
                        <a href="%s" style="display: inline-block; padding: 14px 28px; background: #f5f5f5; color: #333; text-decoration: none; border-radius: 6px; font-weight: 500;">Back to Admin</a>
                    </div>
                </div>',
                $created_count,
                esc_url(get_permalink(wc_get_page_id('shop'))),
                esc_url(admin_url())
            ),
            'Diamonds Generated'
        );
    }

    /**
     * FUNCTION 3: Plugin Activation
     * 
     * Registers taxonomies and flushes rewrite rules.
     */
    public function activate_plugin()
    {
        // Register taxonomies first
        $this->register_taxonomies();

        // Flush rewrite rules
        flush_rewrite_rules();

        // Set activation flag
        update_option('lgd_diamond_core_activated', time());
    }

    /**
     * Plugin Deactivation
     */
    public function deactivate_plugin()
    {
        // Clean up rewrite rules
        flush_rewrite_rules();

        // Remove activation flag
        delete_option('lgd_diamond_core_activated');
    }

    /**
     * Helper: Ensure taxonomy terms exist
     * 
     * @param string $taxonomy Taxonomy name
     * @param array  $terms    Array of term names
     */
    private function ensure_terms_exist($taxonomy, $terms)
    {
        foreach ($terms as $term) {
            if (!term_exists($term, $taxonomy)) {
                wp_insert_term($term, $taxonomy);
            }
        }
    }

    /**
     * Helper: Generate certification number
     * 
     * @param string $lab Lab name (IGI or GIA)
     * @return string Certificate number
     */
    private function generate_cert_number($lab)
    {
        $prefix = ($lab === 'GIA') ? 'GIA' : 'IGI';
        return $prefix . str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
    }
}

// ============================================
// INITIALIZE PLUGIN
// ============================================
add_action('plugins_loaded', function () {
    // Ensure WooCommerce is loaded
    if (class_exists('WooCommerce')) {
        LGD_Diamond_Core::instance();

        // Load Asset Loader
        require_once LGD_CORE_PATH . 'includes/asset-loader.php';

        // Load Frontend Search module
        require_once LGD_CORE_PATH . 'includes/frontend-search.php';

        // Load Frontend Product module
        require_once LGD_CORE_PATH . 'includes/frontend-product.php';

        // Load SEO & Content module
        require_once LGD_CORE_PATH . 'includes/seo-content.php';

        // Load Trust & Concierge module
        require_once LGD_CORE_PATH . 'includes/trust-concierge.php';

        // Load Frontend Home module
        require_once LGD_CORE_PATH . 'includes/frontend-home.php';

        // Load Auto Install module
        require_once LGD_CORE_PATH . 'includes/auto-install.php';
    }
});

/**
 * Global accessor function
 * 
 * @return LGD_Diamond_Core
 */
function lgd_diamond_core()
{
    return LGD_Diamond_Core::instance();
}
