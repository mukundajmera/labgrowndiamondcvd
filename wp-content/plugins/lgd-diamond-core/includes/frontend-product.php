<?php
/**
 * LGD Diamond Core - Frontend Product
 * 
 * Custom Single Product layout for diamonds.
 * Prioritizes deep zoom imagery and technical specifications.
 * 
 * @package LGD_Diamond_Core
 * @since 1.2.0
 */

defined('ABSPATH') or exit;

/**
 * Frontend Product Handler
 * 
 * Customizes the WooCommerce single product page for diamonds.
 */
class LGD_Frontend_Product
{

    /**
     * IGI Certificate verification URL
     */
    const IGI_VERIFY_URL = 'https://www.igi.org/verify-your-report?r=';

    /**
     * GIA Certificate verification URL  
     */
    const GIA_VERIFY_URL = 'https://www.gia.edu/report-check?reportno=';

    /**
     * Initialize hooks
     */
    public function __construct()
    {
        // Replace product images with deep zoom container
        add_action('woocommerce_before_single_product_summary', [$this, 'replace_product_images'], 5);

        // Add trust badge after title
        add_action('woocommerce_single_product_summary', [$this, 'render_trust_badge'], 11);

        // Add diamond DNA specs table
        add_action('woocommerce_single_product_summary', [$this, 'render_diamond_specs'], 25);

        // Mobile sticky footer
        add_action('wp_footer', [$this, 'render_mobile_sticky_footer']);

        // Enqueue product-specific assets
        add_action('wp_enqueue_scripts', [$this, 'enqueue_product_assets']);
    }

    /**
     * Replace Product Images with Deep Zoom Container
     */
    public function replace_product_images()
    {
        // Remove default WooCommerce product images
        remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

        // Add our custom deep zoom container
        add_action('woocommerce_before_single_product_summary', [$this, 'render_deep_zoom_container'], 20);
    }

    /**
     * Render Deep Zoom Container
     * 
     * Outputs the main product image with magnify capability.
     */
    public function render_deep_zoom_container()
    {
        global $product;

        if (!$product) {
            return;
        }

        $image_id = $product->get_image_id();
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : LGD_Assets::get_url('placeholder_diamond');
        $image_alt = $image_id ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : $product->get_name();

        // Get gallery images
        $gallery_ids = $product->get_gallery_image_ids();
        ?>
        <div class="lgd-product-gallery">
            <div id="lgd-zoom-container" class="lgd-zoom-container">
                <img id="lgd-main-image" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                    class="lgd-zoom-image">
                <button type="button" class="lgd-zoom-trigger" aria-label="Magnify image">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                        <path d="M11 8v6"></path>
                        <path d="M8 11h6"></path>
                    </svg>
                </button>
            </div>

            <?php if (!empty($gallery_ids)): ?>
                <div class="lgd-thumbnail-strip">
                    <button type="button" class="lgd-thumbnail lgd-thumbnail-active"
                        data-image="<?php echo esc_url($image_url); ?>">
                        <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'thumbnail')); ?>" alt="">
                    </button>
                    <?php foreach ($gallery_ids as $gallery_id):
                        $gallery_url = wp_get_attachment_image_url($gallery_id, 'full');
                        $thumb_url = wp_get_attachment_image_url($gallery_id, 'thumbnail');
                        ?>
                        <button type="button" class="lgd-thumbnail" data-image="<?php echo esc_url($gallery_url); ?>">
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="">
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    /**
     * Render Trust Badge
     * 
     * Displays "Eye Clean" and certification badge after product title.
     */
    public function render_trust_badge()
    {
        global $product;

        if (!$product) {
            return;
        }

        $product_id = $product->get_id();
        $lab_terms = get_the_terms($product_id, 'diamond_lab');
        $lab = ($lab_terms && !is_wp_error($lab_terms)) ? $lab_terms[0]->name : 'IGI';
        ?>
        <div class="lgd-trust-badge">
            <span class="lgd-badge-item">
                <span class="lgd-badge-icon">👁️</span>
                <span class="lgd-badge-text">Eye Clean</span>
            </span>
            <span class="lgd-badge-divider">|</span>
            <span class="lgd-badge-item">
                <span class="lgd-badge-icon">🛡️</span>
                <span class="lgd-badge-text"><?php echo esc_html($lab); ?> Certified</span>
            </span>
        </div>
        <?php
    }

    /**
     * Render Diamond Specs Table
     * 
     * Outputs the "Diamond DNA" specifications table.
     */
    public function render_diamond_specs()
    {
        global $product;

        if (!$product) {
            return;
        }

        $product_id = $product->get_id();

        // Get taxonomy terms
        $shape = $this->get_term_name($product_id, 'diamond_shape');
        $color = $this->get_term_name($product_id, 'diamond_color');
        $clarity = $this->get_term_name($product_id, 'diamond_clarity');
        $cut = $this->get_term_name($product_id, 'diamond_cut');
        $lab = $this->get_term_name($product_id, 'diamond_lab');

        // Get meta values
        $carat = get_post_meta($product_id, '_diamond_carat', true);
        $depth = get_post_meta($product_id, '_diamond_depth', true);
        $table = get_post_meta($product_id, '_diamond_table', true);
        $cert_number = get_post_meta($product_id, '_igi_cert', true);

        // Build verify URL
        $verify_url = '';
        if ($cert_number) {
            if (stripos($cert_number, 'GIA') === 0) {
                $verify_url = self::GIA_VERIFY_URL . preg_replace('/[^0-9]/', '', $cert_number);
            } else {
                $verify_url = self::IGI_VERIFY_URL . preg_replace('/[^0-9]/', '', $cert_number);
            }
        }
        ?>
        <div class="lgd-diamond-specs">
            <h3 class="lgd-specs-title">Diamond Specifications</h3>

            <div class="lgd-specs-grid">
                <div class="lgd-spec-row">
                    <div class="lgd-spec-cell">
                        <span class="lgd-spec-label">Shape</span>
                        <span class="lgd-spec-value"><?php echo esc_html($shape ?: '—'); ?></span>
                    </div>
                    <div class="lgd-spec-cell">
                        <span class="lgd-spec-label">Carat</span>
                        <span
                            class="lgd-spec-value"><?php echo $carat ? esc_html(number_format((float) $carat, 2)) . ' ct' : '—'; ?></span>
                    </div>
                </div>

                <div class="lgd-spec-row">
                    <div class="lgd-spec-cell">
                        <span class="lgd-spec-label">Color</span>
                        <span class="lgd-spec-value"><?php echo esc_html($color ?: '—'); ?></span>
                    </div>
                    <div class="lgd-spec-cell">
                        <span class="lgd-spec-label">Clarity</span>
                        <span class="lgd-spec-value"><?php echo esc_html($clarity ?: '—'); ?></span>
                    </div>
                </div>

                <div class="lgd-spec-row">
                    <div class="lgd-spec-cell">
                        <span class="lgd-spec-label">Cut</span>
                        <span class="lgd-spec-value"><?php echo esc_html($cut ?: '—'); ?></span>
                    </div>
                    <div class="lgd-spec-cell">
                        <span class="lgd-spec-label">Lab</span>
                        <span class="lgd-spec-value"><?php echo esc_html($lab ?: '—'); ?></span>
                    </div>
                </div>

                <?php if ($depth || $table): ?>
                    <div class="lgd-spec-row">
                        <?php if ($depth): ?>
                            <div class="lgd-spec-cell">
                                <span class="lgd-spec-label">Depth</span>
                                <span class="lgd-spec-value"><?php echo esc_html($depth); ?>%</span>
                            </div>
                        <?php endif; ?>
                        <?php if ($table): ?>
                            <div class="lgd-spec-cell">
                                <span class="lgd-spec-label">Table</span>
                                <span class="lgd-spec-value"><?php echo esc_html($table); ?>%</span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($cert_number): ?>
                <div class="lgd-cert-footer">
                    <span class="lgd-cert-label">Certificate:</span>
                    <span class="lgd-cert-number"><?php echo esc_html($cert_number); ?></span>
                    <?php if ($verify_url): ?>
                        <a href="<?php echo esc_url($verify_url); ?>" target="_blank" rel="noopener noreferrer" class="lgd-cert-verify">
                            Verify →
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    /**
     * Render Mobile Sticky Footer
     * 
     * Fixed bottom bar with price and add-to-cart button on mobile.
     */
    public function render_mobile_sticky_footer()
    {
        // Only on single product pages
        if (!is_product()) {
            return;
        }

        global $product;

        if (!$product) {
            return;
        }
        ?>
        <div id="lgd-sticky-footer" class="lgd-sticky-footer">
            <div class="lgd-sticky-price">
                <?php echo $product->get_price_html(); ?>
            </div>
            <button type="button" id="lgd-sticky-add" class="lgd-sticky-button">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg>
                <span>Add to Ring</span>
            </button>
        </div>

        <script>
            (function () {
                var stickyBtn = document.getElementById('lgd-sticky-add');
                if (stickyBtn) {
                    stickyBtn.addEventListener('click', function () {
                        // Find and trigger the main add to cart button
                        var addToCartBtn = document.querySelector('.single_add_to_cart_button');
                        if (addToCartBtn) {
                            addToCartBtn.click();
                        }
                    });
                }
            })();
        </script>
        <?php
    }

    /**
     * Enqueue Product-Specific Assets
     */
    public function enqueue_product_assets()
    {
        if (!is_product()) {
            return;
        }

        // Add inline JS for thumbnail gallery
        wp_add_inline_script('jquery', '
            jQuery(document).ready(function($) {
                $(".lgd-thumbnail").on("click", function() {
                    var newImage = $(this).data("image");
                    $("#lgd-main-image").attr("src", newImage);
                    $(".lgd-thumbnail").removeClass("lgd-thumbnail-active");
                    $(this).addClass("lgd-thumbnail-active");
                });
            });
        ');
    }

    /**
     * Helper: Get Term Name
     * 
     * @param int    $product_id Product ID
     * @param string $taxonomy   Taxonomy name
     * @return string Term name or empty string
     */
    private function get_term_name($product_id, $taxonomy)
    {
        $terms = get_the_terms($product_id, $taxonomy);
        return ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';
    }
}

// Initialize
new LGD_Frontend_Product();
