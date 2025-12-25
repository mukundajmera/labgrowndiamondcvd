<?php
/**
 * LGD Diamond Core - Frontend Home
 * 
 * High-performance homepage components and WordPress cleanup.
 * No page builder dependencies - pure PHP/HTML.
 * 
 * @package LGD_Diamond_Core
 * @since 1.5.0
 */

defined('ABSPATH') or exit;

/**
 * Frontend Home Handler
 * 
 * Manages the homepage shortcode and performance optimizations.
 */
class LGD_Frontend_Home
{

    /**
     * Diamond shapes for grid
     * @var array
     */
    private $shapes = [
        'round' => ['name' => 'Round', 'icon' => '○'],
        'oval' => ['name' => 'Oval', 'icon' => '◯'],
        'emerald' => ['name' => 'Emerald', 'icon' => '▭'],
        'cushion' => ['name' => 'Cushion', 'icon' => '▢'],
        'pear' => ['name' => 'Pear', 'icon' => '◇'],
        'radiant' => ['name' => 'Radiant', 'icon' => '◈'],
    ];

    /**
     * Trust pillars
     * @var array
     */
    private $trust_pillars = [
        [
            'icon_key' => 'trust_shield',
            'title' => 'IGI Certified',
            'desc' => 'Every diamond verified by international gemologists.',
        ],
        [
            'icon_key' => 'trust_ship',
            'title' => 'Free Shipping',
            'desc' => 'Insured delivery worldwide. No hidden fees.',
        ],
        [
            'icon_key' => 'trust_warranty',
            'title' => 'Lifetime Warranty',
            'desc' => 'Your diamond protected forever.',
        ],
    ];

    /**
     * Initialize hooks
     */
    public function __construct()
    {
        // Register homepage shortcode
        add_shortcode('lgd_home_dashboard', [$this, 'render_home_dashboard']);

        // Speed optimizations
        add_action('wp_enqueue_scripts', [$this, 'cleanup_head'], 100);

        // Additional cleanup
        add_action('init', [$this, 'cleanup_emoji']);

        // Remove query strings from static resources
        add_filter('script_loader_src', [$this, 'remove_query_strings'], 15);
        add_filter('style_loader_src', [$this, 'remove_query_strings'], 15);
    }

    /**
     * TASK 1: Homepage Dashboard Shortcode
     * 
     * Renders a high-performance, 3-section landing page.
     * 
     * @param array $atts Shortcode attributes
     * @return string HTML output
     */
    public function render_home_dashboard($atts = [])
    {
        $atts = shortcode_atts([
            'hero_title' => 'The Future of Diamonds is Clear.',
            'hero_subtitle' => 'Ethically Grown. Forensically Verified.',
            'hero_cta' => 'Explore Inventory',
            'hero_image' => '',
        ], $atts, 'lgd_home_dashboard');

        ob_start();
        ?>
        <div class="lgd-home-dashboard">

            <!-- SECTION A: Hero -->
            <?php echo $this->render_hero_section($atts); ?>

            <!-- SECTION B: Shop by Shape -->
            <?php echo $this->render_shapes_section(); ?>

            <!-- SECTION C: Trust Bar -->
            <?php echo $this->render_trust_section(); ?>

        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Render Hero Section
     */
    private function render_hero_section($atts)
    {
        $shop_url = get_permalink(wc_get_page_id('shop'));
        $bg_style = '';

        $bg_url = !empty($atts['hero_image']) ? $atts['hero_image'] : LGD_Assets::get_url('hero_banner');
        $bg_style = 'style="background-image: url(' . esc_url($bg_url) . ');"';

        ob_start();
        ?>
        <section class="lgd-hero lgd-hero-bg" <?php echo $bg_style; ?>>
            <div class="lgd-hero-overlay"></div>
            <div class="lgd-hero-content">
                <h1 class="lgd-hero-title"><?php echo esc_html($atts['hero_title']); ?></h1>
                <p class="lgd-hero-subtitle"><?php echo esc_html($atts['hero_subtitle']); ?></p>
                <a href="<?php echo esc_url($shop_url); ?>" class="lgd-hero-cta">
                    <?php echo esc_html($atts['hero_cta']); ?>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }

    /**
     * Render Shapes Section
     */
    private function render_shapes_section()
    {
        $shop_url = get_permalink(wc_get_page_id('shop'));

        ob_start();
        ?>
        <section class="lgd-shapes-section">
            <div class="lgd-shapes-container">
                <h2 class="lgd-section-title">Shop by Shape</h2>
                <p class="lgd-section-subtitle">Find your perfect cut</p>

                <div class="lgd-shapes-grid">
                    <?php foreach ($this->shapes as $slug => $shape): ?>
                        <a href="<?php echo esc_url(add_query_arg('diamond_shape', $slug, $shop_url)); ?>" class="lgd-shape-card">
                            <div class="lgd-shape-icon">
                                <span><?php echo esc_html($shape['icon']); ?></span>
                            </div>
                            <span class="lgd-shape-name"><?php echo esc_html($shape['name']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }

    /**
     * Render Trust Section
     */
    private function render_trust_section()
    {
        ob_start();
        ?>
        <section class="lgd-trust-section">
            <div class="lgd-trust-container">
                <?php foreach ($this->trust_pillars as $pillar):
                    $icon_url = LGD_Assets::get_url($pillar['icon_key']);
                    ?>
                    <div class="lgd-trust-pillar">
                        <div class="lgd-trust-pillar-icon">
                            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($pillar['title']); ?>"
                                style="width: 48px; height: 48px; object-fit: contain;">
                        </div>
                        <h3 class="lgd-trust-pillar-title"><?php echo esc_html($pillar['title']); ?></h3>
                        <p class="lgd-trust-pillar-desc"><?php echo esc_html($pillar['desc']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }

    /**
     * TASK 2: Speed Cleanup - Dequeue Bloat
     * 
     * Removes unnecessary scripts and styles for better performance.
     */
    public function cleanup_head()
    {
        // Only aggressive cleanup on front-end, not admin
        if (is_admin()) {
            return;
        }

        // Gutenberg block library CSS (if not using blocks)
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
        wp_dequeue_style('wc-blocks-vendors-style');

        // Classic theme styles
        wp_dequeue_style('classic-theme-styles');

        // Dashicons (unless logged in - needed for admin bar)
        if (!is_user_logged_in()) {
            wp_dequeue_style('dashicons');
        }

        // Global styles (if not using theme.json features)
        wp_dequeue_style('global-styles');
    }

    /**
     * Cleanup Emoji Scripts
     */
    public function cleanup_emoji()
    {
        // Remove emoji detection script
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');

        // Remove emoji styles
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');

        // Remove emoji from TinyMCE
        add_filter('tiny_mce_plugins', function ($plugins) {
            return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
        });

        // Remove emoji DNS prefetch
        add_filter('wp_resource_hints', function ($urls, $relation_type) {
            if ($relation_type === 'dns-prefetch') {
                $urls = array_filter($urls, function ($url) {
                    return strpos($url, 'https://s.w.org/images/core/emoji') === false;
                });
            }
            return $urls;
        }, 10, 2);

        // Remove RSD link
        remove_action('wp_head', 'rsd_link');

        // Remove Windows Live Writer manifest
        remove_action('wp_head', 'wlwmanifest_link');

        // Remove shortlink
        remove_action('wp_head', 'wp_shortlink_wp_head');

        // Remove REST API link
        remove_action('wp_head', 'rest_output_link_wp_head');

        // Remove oEmbed discovery links
        remove_action('wp_head', 'wp_oembed_add_discovery_links');

        // Remove generator meta tag
        remove_action('wp_head', 'wp_generator');
    }

    /**
     * Remove Query Strings from Static Resources
     * 
     * Improves caching for CSS/JS files.
     * 
     * @param string $src Resource URL
     * @return string Clean URL
     */
    public function remove_query_strings($src)
    {
        if (strpos($src, '?ver=') !== false) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
    }
}

// Initialize
new LGD_Frontend_Home();
