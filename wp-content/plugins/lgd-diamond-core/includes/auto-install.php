<?php
/**
 * LGD Diamond Core - Auto Installer
 * 
 * Self-executing setup script that runs ONCE on first admin visit.
 * Configures homepage, reading settings, and generates seed data.
 * 
 * @package LGD_Diamond_Core
 * @since 1.6.0
 */

defined('ABSPATH') or exit;

/**
 * Auto Installer Handler
 * 
 * Runs one-time "Go Live" configuration automatically.
 */
class LGD_Auto_Installer
{

    /**
     * Completion marker option key
     */
    const COMPLETE_OPTION = 'lgd_install_complete';

    /**
     * Diamond data arrays
     */
    private $shapes = ['Round', 'Oval', 'Emerald', 'Radiant', 'Cushion', 'Princess', 'Pear', 'Marquise'];
    private $colors = ['D', 'E', 'F', 'G', 'H'];
    private $clarities = ['IF', 'VVS1', 'VVS2', 'VS1', 'VS2'];
    private $cuts = ['Ideal', 'Excellent', 'Very Good', 'Good'];
    private $labs = ['IGI', 'GIA'];

    /**
     * Initialize
     */
    public function __construct()
    {
        add_action('admin_init', [$this, 'run_auto_installer']);
        add_action('admin_notices', [$this, 'display_notices']);
    }

    /**
     * Run Auto Installer
     * 
     * Main entry point - executes all setup steps.
     */
    public function run_auto_installer()
    {
        // STEP 1: Safety Check
        if (get_option(self::COMPLETE_OPTION)) {
            return;
        }

        // Ensure WooCommerce is loaded
        if (!class_exists('WooCommerce')) {
            return;
        }

        // Execute setup steps
        $homepage_id = $this->setup_homepage();
        $this->configure_reading_settings($homepage_id);
        $products_created = $this->generate_diamonds();
        $this->configure_generatepress($homepage_id);
        $this->mark_complete($homepage_id, $products_created);
    }

    /**
     * STEP 2: Homepage Setup
     * 
     * Creates the homepage with shortcode if it doesn't exist.
     * 
     * @return int Page ID
     */
    private function setup_homepage()
    {
        // Check if "Home" page exists (WP_Query replaces deprecated get_page_by_title)
        $existing_query = new WP_Query([
            'post_type' => 'page',
            'title' => 'Home',
            'post_status' => 'all',
            'posts_per_page' => 1,
            'no_found_rows' => true,
            'ignore_sticky_posts' => true,
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
        ]);

        if ($existing_query->have_posts()) {
            $existing = $existing_query->posts[0];
            wp_reset_postdata();
            // Update existing page content if empty or different
            if (empty($existing->post_content) || strpos($existing->post_content, 'lgd_home_dashboard') === false) {
                wp_update_post([
                    'ID' => $existing->ID,
                    'post_content' => '[lgd_home_dashboard]',
                ]);
            }
            return $existing->ID;
        }
        wp_reset_postdata();

        // Create new homepage
        $page_id = wp_insert_post([
            'post_title' => 'Home',
            'post_name' => 'home',
            'post_content' => '[lgd_home_dashboard]',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_author' => get_current_user_id() ?: 1,
        ]);

        return $page_id;
    }

    /**
     * STEP 3: Configure Reading Settings
     * 
     * Sets the static front page.
     * 
     * @param int $homepage_id Homepage ID
     */
    private function configure_reading_settings($homepage_id)
    {
        if (!$homepage_id || is_wp_error($homepage_id)) {
            return;
        }

        // Set "Your homepage displays" to "A static page"
        update_option('show_on_front', 'page');

        // Set "Homepage" to our new page
        update_option('page_on_front', $homepage_id);

        // Check if Shop page exists and set as posts page (optional)
        $shop_page_id = wc_get_page_id('shop');
        if ($shop_page_id > 0) {
            // Keep shop as shop, don't set as posts page
        }
    }

    /**
     * STEP 4: Generate Seed Data (Diamonds)
     * 
     * Creates 50 sample products.
     * 
     * @return int Number of products created
     */
    private function generate_diamonds()
    {
        if (!class_exists('WC_Product_Simple')) {
            return 0;
        }

        // First, ensure taxonomy terms exist
        $this->ensure_terms('diamond_shape', $this->shapes);
        $this->ensure_terms('diamond_color', $this->colors);
        $this->ensure_terms('diamond_clarity', $this->clarities);
        $this->ensure_terms('diamond_cut', $this->cuts);
        $this->ensure_terms('diamond_lab', $this->labs);

        // Check existing products
        $existing = wp_count_posts('product')->publish;
        $target = 50;

        if ($existing >= $target) {
            return 0;
        }

        $to_create = $target - $existing;
        $created = 0;

        for ($i = 0; $i < $to_create; $i++) {
            $carat = round(mt_rand(50, 300) / 100, 2);
            $shape = $this->shapes[array_rand($this->shapes)];
            $color = $this->colors[array_rand($this->colors)];
            $clarity = $this->clarities[array_rand($this->clarities)];
            $cut = $this->cuts[array_rand($this->cuts)];
            $lab = $this->labs[array_rand($this->labs)];

            $title = sprintf('%sct %s Diamond - %s/%s', number_format($carat, 2), $shape, $color, $clarity);

            // Skip duplicates (WP_Query replaces deprecated get_page_by_title)
            $dup_query = new WP_Query([
                'post_type' => 'product',
                'title' => $title,
                'post_status' => 'all',
                'posts_per_page' => 1,
                'no_found_rows' => true,
                'ignore_sticky_posts' => true,
                'update_post_term_cache' => false,
                'update_post_meta_cache' => false,
            ]);
            if ($dup_query->have_posts()) {
                wp_reset_postdata();
                continue;
            }
            wp_reset_postdata();

            $product = new WC_Product_Simple();
            $product->set_name($title);
            $product->set_status('publish');
            $product->set_catalog_visibility('visible');

            $price = round(mt_rand(80000, 500000) / 100, 2);
            $product->set_regular_price($price);
            $product->set_price($price);
            $product->set_stock_status('instock');
            $product->set_manage_stock(false);
            $product->set_sku('LGD-' . strtoupper(substr($shape, 0, 3)) . '-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT));

            $product_id = $product->save();

            if ($product_id) {
                wp_set_object_terms($product_id, $shape, 'diamond_shape');
                wp_set_object_terms($product_id, $color, 'diamond_color');
                wp_set_object_terms($product_id, $clarity, 'diamond_clarity');
                wp_set_object_terms($product_id, $cut, 'diamond_cut');
                wp_set_object_terms($product_id, $lab, 'diamond_lab');

                update_post_meta($product_id, '_diamond_carat', $carat);
                update_post_meta($product_id, '_diamond_depth', mt_rand(58, 63));
                update_post_meta($product_id, '_diamond_table', mt_rand(54, 60));
                update_post_meta($product_id, '_igi_cert', ($lab === 'GIA' ? 'GIA' : 'IGI') . str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT));

                $created++;
            }
        }

        return $created;
    }

    /**
     * STEP 5: Configure GeneratePress Theme
     * 
     * Sets theme-specific options for homepage.
     * 
     * @param int $homepage_id Homepage ID
     */
    private function configure_generatepress($homepage_id)
    {
        if (!$homepage_id || !function_exists('generate_get_defaults')) {
            return;
        }

        // Hide page title on homepage
        update_post_meta($homepage_id, '_generate-disable-headline', true);

        // Hide sidebar on homepage (full-width)
        update_post_meta($homepage_id, '_generate-sidebar-layout-meta', 'no-sidebar');

        // Remove content padding on homepage
        update_post_meta($homepage_id, '_generate-content-area', 'full-width-content');

        // Optional: Set footer widget area to minimal
        // update_post_meta($homepage_id, '_generate-disable-footer-widgets', true);
    }

    /**
     * STEP 6: Mark Installation Complete
     * 
     * Sets completion flag and queues admin notice.
     */
    private function mark_complete($homepage_id, $products_created)
    {
        update_option(self::COMPLETE_OPTION, true);

        set_transient('lgd_install_success', [
            'homepage_id' => $homepage_id,
            'products' => $products_created,
        ], 120);
    }

    /**
     * Helper: Ensure taxonomy terms exist
     */
    private function ensure_terms($taxonomy, $terms)
    {
        foreach ($terms as $term) {
            if (!term_exists($term, $taxonomy)) {
                wp_insert_term($term, $taxonomy);
            }
        }
    }

    /**
     * Display Admin Notices
     */
    public function display_notices()
    {
        $data = get_transient('lgd_install_success');

        if (!$data) {
            return;
        }

        $homepage_id = $data['homepage_id'] ?? 0;
        $products = $data['products'] ?? 0;

        printf(
            '<div class="notice notice-success is-dismissible">
                <p><strong>🚀 LGD Core Installed:</strong> Homepage Active (ID: %d) &amp; %d Diamonds Generated. 
                <a href="%s">View Homepage</a> | <a href="%s">View Shop</a></p>
            </div>',
            intval($homepage_id),
            intval($products),
            esc_url(get_permalink($homepage_id)),
            esc_url(get_permalink(wc_get_page_id('shop')))
        );

        delete_transient('lgd_install_success');
    }

    /**
     * Allow Reset via URL
     * 
     * Usage: /wp-admin/?lgd_reinstall=true
     */
    public static function maybe_reset()
    {
        if (!isset($_GET['lgd_reinstall']) || sanitize_text_field(wp_unslash($_GET['lgd_reinstall'])) !== 'true') {
            return;
        }

        // Security: Verify nonce (CSRF protection)
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])), 'lgd_reinstall_nonce')) {
            wp_die(
                '<div style="font-family: system-ui; padding: 40px; text-align: center;">
                    <h2 style="color: #d32f2f;">⛔ Security Check Failed</h2>
                    <p>Invalid or expired security token. Please try again from the admin dashboard.</p>
                </div>',
                'Security Error',
                ['response' => 403]
            );
        }

        if (!current_user_can('manage_options')) {
            wp_die('Permission denied.');
        }

        delete_option(self::COMPLETE_OPTION);

        set_transient('lgd_install_success', [
            'message' => 'Installation reset. Refresh to re-run setup.',
        ], 60);

        wp_safe_redirect(admin_url());
        exit;
    }
}

// Initialize
new LGD_Auto_Installer();

// Reset hook
add_action('admin_init', ['LGD_Auto_Installer', 'maybe_reset'], 1);
