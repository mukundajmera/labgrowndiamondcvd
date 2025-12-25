<?php
/**
 * LGD Diamond Core - SEO & Content
 * 
 * Automates SEO titles, injects educational content,
 * and provides auto-glossary functionality.
 * 
 * @package LGD_Diamond_Core
 * @since 1.3.0
 */

defined('ABSPATH') or exit;

/**
 * SEO & Content Handler
 * 
 * Manages programmatic SEO, smart tips, and educational content.
 */
class LGD_SEO_Content
{

    /**
     * Smart tips for grid injection
     * @var array
     */
    private $smart_tips = [
        [
            'tip' => "Tip: 'Eye Clean' SI1 diamonds offer the best value for money.",
            'icon' => '💡',
        ],
        [
            'tip' => "Fact: CVD diamonds are chemically identical to mined diamonds.",
            'icon' => '🔬',
        ],
        [
            'tip' => "Expert Advice: Oval cuts hide color better than other shapes.",
            'icon' => '💎',
        ],
        [
            'tip' => "Pro Tip: Lab grown diamonds are 30-40% less expensive than mined.",
            'icon' => '💰',
        ],
        [
            'tip' => "Did you know? Lab diamonds have the same hardness (10 on Mohs scale) as natural diamonds.",
            'icon' => '🔷',
        ],
        [
            'tip' => "Fact: The 4Cs (Cut, Color, Clarity, Carat) apply equally to lab and mined diamonds.",
            'icon' => '📊',
        ],
    ];

    /**
     * Glossary definitions for auto-linking
     * @var array
     */
    private $glossary = [
        'Carat' => "The measure of a diamond's weight, not size. One carat equals 200 milligrams.",
        'Cut' => "How well a diamond's facets interact with light. The most important factor for brilliance.",
        'Clarity' => "The absence of internal inclusions and external blemishes in a diamond.",
        'CVD' => "Chemical Vapor Deposition — a high-tech method of growing real diamonds in a lab.",
        'HPHT' => "High Pressure High Temperature — a method that replicates natural diamond formation.",
        'Fluorescence' => "Blue glow some diamonds emit under UV light. Strong fluorescence can affect appearance.",
        'Eye Clean' => "A diamond that appears flawless to the naked eye, even if inclusions exist.",
        'IGI' => "International Gemological Institute — a leading diamond certification authority.",
        'GIA' => "Gemological Institute of America — the most respected diamond grading lab.",
    ];

    /**
     * Loop counter for smart tip injection
     * @var int
     */
    private $loop_counter = 0;

    /**
     * Initialize hooks
     */
    public function __construct()
    {
        // Programmatic SEO: Auto-generate product titles
        add_filter('document_title_parts', [$this, 'rewrite_product_title'], 10);

        // Smart tip grid injector
        add_action('woocommerce_before_shop_loop', [$this, 'reset_loop_counter']);
        add_action('woocommerce_after_shop_loop_item', [$this, 'maybe_inject_smart_tip'], 99);

        // Auto-glossary for product content
        add_filter('the_content', [$this, 'auto_link_glossary'], 20);
        add_filter('woocommerce_short_description', [$this, 'auto_link_glossary'], 20);

        // Add meta description for products
        add_action('wp_head', [$this, 'output_meta_description'], 5);

        // Schema.org structured data
        add_action('wp_head', [$this, 'output_product_schema'], 10);
    }

    /**
     * TASK 1: Programmatic SEO - Rewrite Product Titles
     * 
     * Generates unique, keyword-rich titles for diamond products.
     * 
     * @param array $title_parts Document title parts
     * @return array Modified title parts
     */
    public function rewrite_product_title($title_parts)
    {
        if (!is_product()) {
            return $title_parts;
        }

        global $product;

        if (!$product) {
            return $title_parts;
        }

        $product_id = $product->get_id();

        // Get diamond specs
        $shape = $this->get_term_name($product_id, 'diamond_shape');
        $color = $this->get_term_name($product_id, 'diamond_color');
        $clarity = $this->get_term_name($product_id, 'diamond_clarity');
        $lab = $this->get_term_name($product_id, 'diamond_lab');
        $carat = get_post_meta($product_id, '_diamond_carat', true);

        // Only rewrite if we have diamond data
        if (!$shape && !$carat) {
            return $title_parts;
        }

        // Build SEO title
        $seo_title_parts = [];

        // Main descriptor
        if ($carat) {
            $seo_title_parts[] = number_format((float) $carat, 2) . 'ct';
        }
        if ($shape) {
            $seo_title_parts[] = $shape;
        }
        $seo_title_parts[] = 'Lab Grown Diamond';

        $main_title = implode(' ', $seo_title_parts);

        // Specs descriptor
        $specs = [];
        if ($color) {
            $specs[] = $color;
        }
        if ($clarity) {
            $specs[] = $clarity;
        }
        $specs_title = implode(' / ', $specs);

        // Certification
        $cert_title = $lab ? $lab . ' Certified' : '';

        // Construct full title
        $new_title = $main_title;
        if ($specs_title) {
            $new_title .= ' | ' . $specs_title;
        }
        if ($cert_title) {
            $new_title .= ' | ' . $cert_title;
        }

        $title_parts['title'] = $new_title;

        return $title_parts;
    }

    /**
     * Reset Loop Counter
     */
    public function reset_loop_counter()
    {
        $this->loop_counter = 0;
    }

    /**
     * TASK 2: Smart Tip Grid Injector
     * 
     * Injects educational content every 6th product slot.
     */
    public function maybe_inject_smart_tip()
    {
        $this->loop_counter++;

        // Inject after every 6th product
        if ($this->loop_counter % 6 !== 0) {
            return;
        }

        // Select a random tip
        $tip_index = array_rand($this->smart_tips);
        $tip_data = $this->smart_tips[$tip_index];
        ?>
        </li>
        <li class="product lgd-smart-tip-card">
            <div class="lgd-tip-content">
                <span class="lgd-tip-icon"><?php echo esc_html($tip_data['icon']); ?></span>
                <p class="lgd-tip-text"><?php echo esc_html($tip_data['tip']); ?></p>
            </div>
            <?php
    }

    /**
     * TASK 3: Auto-Glossary - Link Keywords to Definitions
     * 
     * Replaces first occurrence of glossary terms with tooltip spans.
     * 
     * @param string $content Post content
     * @return string Modified content
     */
    public function auto_link_glossary($content)
    {
        if (!is_product() && !is_singular()) {
            return $content;
        }

        // Track which terms have been replaced
        static $replaced_terms = [];

        foreach ($this->glossary as $term => $definition) {
            // Skip if already replaced in this content
            if (isset($replaced_terms[$term])) {
                continue;
            }

            // Case-insensitive search for whole word
            $pattern = '/\b(' . preg_quote($term, '/') . ')\b/i';

            // Check if term exists in content
            if (preg_match($pattern, $content)) {
                // Replace only the first occurrence
                $replacement = sprintf(
                    '<span class="lgd-tooltip" data-tip="%s">$1</span>',
                    esc_attr($definition)
                );

                $content = preg_replace($pattern, $replacement, $content, 1);
                $replaced_terms[$term] = true;
            }
        }

        return $content;
    }

    /**
     * Output Meta Description
     * 
     * Generates SEO meta description for product pages.
     */
    public function output_meta_description()
    {
        if (!is_product()) {
            return;
        }

        global $product;

        if (!$product) {
            return;
        }

        $product_id = $product->get_id();

        // Get diamond specs
        $shape = $this->get_term_name($product_id, 'diamond_shape');
        $color = $this->get_term_name($product_id, 'diamond_color');
        $clarity = $this->get_term_name($product_id, 'diamond_clarity');
        $cut = $this->get_term_name($product_id, 'diamond_cut');
        $lab = $this->get_term_name($product_id, 'diamond_lab');
        $carat = get_post_meta($product_id, '_diamond_carat', true);
        $price = $product->get_price();

        // Build meta description
        $meta_parts = [];

        if ($carat) {
            $meta_parts[] = number_format((float) $carat, 2) . ' carat';
        }
        if ($shape) {
            $meta_parts[] = $shape;
        }

        $meta_desc = 'Buy this ' . implode(' ', $meta_parts) . ' lab grown diamond';

        if ($color && $clarity) {
            $meta_desc .= ' with ' . $color . ' color and ' . $clarity . ' clarity';
        }

        if ($cut) {
            $meta_desc .= ', ' . $cut . ' cut';
        }

        if ($lab) {
            $meta_desc .= '. ' . $lab . ' certified';
        }

        if ($price) {
            $meta_desc .= '. Only $' . number_format((float) $price, 2);
        }

        $meta_desc .= '. Free shipping & 30-day returns.';

        echo '<meta name="description" content="' . esc_attr($meta_desc) . '">' . "\n";
    }

    /**
     * Output Product Schema
     * 
     * Adds Schema.org structured data for rich snippets.
     */
    public function output_product_schema()
    {
        if (!is_product()) {
            return;
        }

        global $product;

        if (!$product) {
            return;
        }

        $product_id = $product->get_id();

        // Get diamond specs
        $shape = $this->get_term_name($product_id, 'diamond_shape');
        $lab = $this->get_term_name($product_id, 'diamond_lab');
        $carat = get_post_meta($product_id, '_diamond_carat', true);
        $cert = get_post_meta($product_id, '_igi_cert', true);

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->get_name(),
            'description' => wp_strip_all_tags($product->get_short_description()),
            'sku' => $product->get_sku(),
            'brand' => [
                '@type' => 'Brand',
                'name' => 'Lab Grown Diamond CVD',
            ],
            'offers' => [
                '@type' => 'Offer',
                'url' => get_permalink($product_id),
                'priceCurrency' => get_woocommerce_currency(),
                'price' => $product->get_price(),
                'availability' => $product->is_in_stock()
                    ? 'https://schema.org/InStock'
                    : 'https://schema.org/OutOfStock',
                'itemCondition' => 'https://schema.org/NewCondition',
            ],
        ];

        // Add image if available
        $image_id = $product->get_image_id();
        if ($image_id) {
            $schema['image'] = wp_get_attachment_image_url($image_id, 'full');
        }

        // Add additional properties
        $additional_props = [];

        if ($shape) {
            $additional_props[] = [
                '@type' => 'PropertyValue',
                'name' => 'Shape',
                'value' => $shape,
            ];
        }

        if ($carat) {
            $additional_props[] = [
                '@type' => 'PropertyValue',
                'name' => 'Carat Weight',
                'value' => $carat,
                'unitCode' => 'CT',
            ];
        }

        if ($cert) {
            $additional_props[] = [
                '@type' => 'PropertyValue',
                'name' => 'Certificate Number',
                'value' => $cert,
            ];
        }

        if (!empty($additional_props)) {
            $schema['additionalProperty'] = $additional_props;
        }

        echo '<script type="application/ld+json">' . "\n";
        echo wp_json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        echo "\n</script>\n";
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
new LGD_SEO_Content();
