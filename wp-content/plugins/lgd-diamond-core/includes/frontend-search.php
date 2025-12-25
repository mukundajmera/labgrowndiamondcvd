<?php
/**
 * LGD Diamond Core - Frontend Search
 * 
 * Handles the mobile-first slide-out filter interface
 * for diamond search refinement.
 * 
 * @package LGD_Diamond_Core
 * @since 1.1.0
 */

defined('ABSPATH') or exit;

/**
 * Frontend Search Handler
 * 
 * Manages the filter toggle, slide-out modal, and assets.
 */
class LGD_Frontend_Search
{

    /**
     * Initialize hooks
     */
    public function __construct()
    {
        // Output mobile filter toggle button
        add_action('woocommerce_before_shop_loop', [$this, 'render_filter_toggle'], 20);

        // Inject filter container at top of shop
        add_action('woocommerce_archive_description', [$this, 'render_filter_container'], 15);

        // Enqueue search assets
        add_action('wp_enqueue_scripts', [$this, 'enqueue_search_assets']);

        // Add filter overlay to footer
        add_action('wp_footer', [$this, 'render_filter_overlay']);
    }

    /**
     * Render Mobile Filter Toggle Button
     * 
     * Visible only on mobile devices. Triggers slide-out filter.
     */
    public function render_filter_toggle()
    {
        if (!is_shop() && !is_product_category() && !is_product_tag()) {
            return;
        }
        ?>
        <div class="lgd-filter-bar">
            <button type="button" id="lgd-filter-toggle" class="lgd-filter-toggle">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                </svg>
                <span>Refine Diamonds</span>
            </button>
            <span class="lgd-filter-count" id="lgd-filter-count"></span>
        </div>
        <?php
    }

    /**
     * Render Filter Container
     * 
     * Injects the filter shortcode or placeholder container.
     */
    public function render_filter_container()
    {
        if (!is_shop() && !is_product_category() && !is_product_tag()) {
            return;
        }
        ?>
        <div id="lgd-filter-panel" class="lgd-filter-panel">
            <div class="lgd-filter-header">
                <h3 class="lgd-filter-title">Refine Your Search</h3>
                <button type="button" id="lgd-filter-close" class="lgd-filter-close" aria-label="Close filters">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>

            <div class="lgd-filter-body">
                <?php
                // Try to load Themify filter if available
                if (shortcode_exists('themify_layout_part')) {
                    echo do_shortcode('[themify_layout_part slug="diamond-filter"]');
                } else {
                    // Fallback: Render native taxonomy filters
                    $this->render_native_filters();
                }
                ?>
            </div>

            <div class="lgd-filter-footer">
                <button type="button" id="lgd-filter-clear" class="lgd-btn lgd-btn-secondary">
                    Clear All
                </button>
                <button type="button" id="lgd-filter-apply" class="lgd-btn lgd-btn-primary">
                    Apply Filters
                </button>
            </div>
        </div>
        <?php
    }

    /**
     * Render Native Taxonomy Filters
     * 
     * Fallback when Themify is not available.
     */
    private function render_native_filters()
    {
        $taxonomies = [
            'diamond_shape' => 'Shape',
            'diamond_color' => 'Color',
            'diamond_clarity' => 'Clarity',
            'diamond_cut' => 'Cut',
            'diamond_lab' => 'Lab',
        ];

        foreach ($taxonomies as $taxonomy => $label) {
            $terms = get_terms([
                'taxonomy' => $taxonomy,
                'hide_empty' => true,
            ]);

            if (empty($terms) || is_wp_error($terms)) {
                continue;
            }
            ?>
            <div class="lgd-filter-group" data-taxonomy="<?php echo esc_attr($taxonomy); ?>">
                <h4 class="lgd-filter-group-title"><?php echo esc_html($label); ?></h4>
                <div class="lgd-filter-pills">
                    <?php foreach ($terms as $term): ?>
                        <label class="lgd-pill">
                            <input type="checkbox" name="<?php echo esc_attr($taxonomy); ?>[]"
                                value="<?php echo esc_attr($term->slug); ?>" class="lgd-pill-input">
                            <span class="lgd-pill-label"><?php echo esc_html($term->name); ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
        }
    }

    /**
     * Render Filter Overlay
     * 
     * Dark overlay behind the slide-out panel.
     */
    public function render_filter_overlay()
    {
        if (!is_shop() && !is_product_category() && !is_product_tag()) {
            return;
        }
        ?>
        <div id="lgd-filter-overlay" class="lgd-filter-overlay"></div>
        <?php
    }

    /**
     * Enqueue Search Assets
     * 
     * Loads CSS and JS for the filter interface.
     */
    public function enqueue_search_assets()
    {
        if (!is_shop() && !is_product_category() && !is_product_tag()) {
            return;
        }

        // JavaScript
        wp_enqueue_script(
            'lgd-search',
            LGD_CORE_URL . 'assets/js/lgd-search.js',
            [],
            LGD_CORE_VERSION,
            true
        );

        // Pass data to JS
        wp_localize_script('lgd-search', 'lgdSearch', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('lgd_filter_nonce'),
        ]);
    }
}

// Initialize
new LGD_Frontend_Search();
