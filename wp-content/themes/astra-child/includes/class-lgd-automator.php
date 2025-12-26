<?php
/**
 * LGD Automator Class
 * 
 * Handles the "Business Logic" of the LGD Diamond Exchange.
 * - Auto-configures WooCommerce settings on theme activation
 * - Generates programmatic SEO descriptions for products
 * - Renders forensic specification tables on product pages
 *
 * @package Astra Child Diamond
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class LGD_Automator
 * 
 * The central business logic controller for the LGD Diamond Exchange.
 */
class LGD_Automator
{
    /**
     * Constructor - Initialize all hooks
     */
    public function __construct()
    {
        // Auto-Config WooCommerce (Run Once on theme switch)
        add_action('after_switch_theme', array($this, 'lgd_auto_configure_woocommerce'));

        // Programmatic SEO - Auto-generate descriptions
        add_action('save_post_product', array($this, 'lgd_auto_generate_description'), 20, 3);

        // Also hook into WooCommerce product import for CSV imports
        add_action('woocommerce_product_import_inserted_product_object', array($this, 'lgd_auto_generate_description_on_import'), 10, 2);

        // Gatekeeper Import Filter - Forensic quality control on CSV import
        add_action('woocommerce_product_import_inserted_product_object', array($this, 'lgd_gatekeeper_import_filter'), 20, 2);

        // Truth Table Injector - Display forensic specs on product page
        add_action('woocommerce_single_product_summary', array($this, 'render_forensic_table'), 25);
    }

    /**
     * Gatekeeper Import Filter
     * 
     * Performs forensic quality checks on imported diamonds and takes action:
     * - CVD with Brown/Tinge → Draft
     * - HPHT with Blue Nuance → Draft
     * - HCA Score > 2.0 → Tag as "Standard Cut"
     *
     * @param WC_Product $product The imported product object.
     * @param array      $data    The raw import data.
     */
    public function lgd_gatekeeper_import_filter($product, $data)
    {
        $post_id = $product->get_id();
        $should_draft = false;
        $draft_reason = '';

        // Get product name and description for text analysis
        $product_name = $product->get_name();
        $product_desc = $product->get_description();
        $combined_text = strtolower($product_name . ' ' . $product_desc);

        // Get growth method
        $growth_method = strtoupper($this->lgd_get_field('growth_method', $post_id));

        // Check 1: CVD Tinge Detection
        if ($growth_method === 'CVD') {
            if (strpos($combined_text, 'brown') !== false || strpos($combined_text, 'tinge') !== false) {
                $should_draft = true;
                $draft_reason = 'CVD with brown tinge detected';
            }
        }

        // Check 2: HPHT Blue Nuance Detection
        if ($growth_method === 'HPHT') {
            $has_blue_nuance = $this->lgd_get_field('has_blue_nuance', $post_id);
            $blue_nuance_detected = ($has_blue_nuance === 'yes' || $has_blue_nuance === '1' || $has_blue_nuance === true);

            // Also check text for "Blue Nuance"
            if (!$blue_nuance_detected && strpos($combined_text, 'blue nuance') !== false) {
                $blue_nuance_detected = true;
            }

            if ($blue_nuance_detected) {
                $should_draft = true;
                $draft_reason = 'HPHT with blue nuance detected';
            }
        }

        // Apply draft status if flagged
        if ($should_draft) {
            wp_update_post(array(
                'ID' => $post_id,
                'post_status' => 'draft',
            ));

            // Log for debugging
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("LGD Gatekeeper: Product #$post_id set to draft - $draft_reason");
            }
        }

        // Check 3: HCA Score - Tag as "Standard Cut" if > 2.0
        $hca_score = floatval($this->lgd_get_field('hca_score', $post_id));
        if ($hca_score > 2.0) {
            wp_set_object_terms($post_id, 'Standard Cut', 'product_tag', true);

            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("LGD Gatekeeper: Product #$post_id tagged 'Standard Cut' - HCA Score: $hca_score");
            }
        }
    }

    /**
     * Auto-Configure WooCommerce Settings
     * 
     * Runs once when the theme is activated.
     * Sets currency, units, guest checkout, and disables reviews.
     */
    public function lgd_auto_configure_woocommerce()
    {
        // Check if WooCommerce is active
        if (!class_exists('WooCommerce')) {
            return;
        }

        // Check if already configured to prevent re-running
        if (get_option('lgd_woocommerce_configured', false)) {
            return;
        }

        // Currency Settings
        update_option('woocommerce_currency', 'USD');

        // Weight Unit - Using 'g' (grams) as WooCommerce doesn't support 'carat' natively
        // Note: Display can label this as "Carat" in the UI
        update_option('woocommerce_weight_unit', 'g');

        // Dimension Unit
        update_option('woocommerce_dimension_unit', 'mm');

        // Enable Guest Checkout
        update_option('woocommerce_enable_guest_checkout', 'yes');
        update_option('woocommerce_enable_checkout_login_reminder', 'yes');

        // Disable Product Reviews (Forensic model relies on data, not user reviews)
        update_option('woocommerce_enable_reviews', 'no');
        update_option('woocommerce_enable_review_rating', 'no');

        // Additional recommended settings for diamond ecommerce
        update_option('woocommerce_manage_stock', 'yes');
        update_option('woocommerce_stock_format', 'low_amount');
        update_option('woocommerce_notify_low_stock', 'yes');

        // Mark as configured
        update_option('lgd_woocommerce_configured', true);

        // Log for debugging (visible in WP Debug Log)
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('LGD Automator: WooCommerce auto-configuration completed.');
        }
    }

    /**
     * Auto-Generate Product Description (Programmatic SEO)
     * 
     * If product description is empty, generates it using the "Mad Libs" template.
     * Pulls variables from ACF fields or post meta.
     *
     * @param int     $post_id Post ID.
     * @param WP_Post $post    Post object.
     * @param bool    $update  Whether this is an existing post being updated.
     */
    public function lgd_auto_generate_description($post_id, $post = null, $update = false)
    {
        // Prevent infinite loops
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Verify post type
        if (get_post_type($post_id) !== 'product') {
            return;
        }

        // Check if description is empty
        $current_content = get_post_field('post_content', $post_id);
        if (!empty(trim($current_content))) {
            return; // Description already exists, don't overwrite
        }

        // Generate the description
        $description = $this->lgd_generate_forensic_description($post_id);

        if (!empty($description)) {
            // Remove action temporarily to prevent infinite loop
            remove_action('save_post_product', array($this, 'lgd_auto_generate_description'), 20);

            // Update the post content
            wp_update_post(array(
                'ID' => $post_id,
                'post_content' => $description,
            ));

            // Re-add the action
            add_action('save_post_product', array($this, 'lgd_auto_generate_description'), 20, 3);
        }
    }

    /**
     * Auto-Generate Description on WooCommerce Import
     * 
     * Hooks into WooCommerce's CSV import to generate descriptions.
     *
     * @param WC_Product $product The imported product object.
     * @param array      $data    The raw import data.
     */
    public function lgd_auto_generate_description_on_import($product, $data)
    {
        $post_id = $product->get_id();

        // Check if description is empty
        $current_content = $product->get_description();
        if (!empty(trim($current_content))) {
            return;
        }

        // Generate the description
        $description = $this->lgd_generate_forensic_description($post_id);

        if (!empty($description)) {
            $product->set_description($description);
            $product->save();
        }
    }

    /**
     * Generate Forensic Description
     * 
     * Creates the "Mad Libs" style SEO description using product meta/ACF fields.
     *
     * @param int $post_id Product ID.
     * @return string Generated description HTML.
     */
    private function lgd_generate_forensic_description($post_id)
    {
        // Retrieve ACF fields or post meta
        // Using both ACF functions (if available) and fallback to post meta
        $carat = $this->lgd_get_field('_diamond_carat', $post_id);
        $shape = $this->lgd_get_field('_diamond_shape', $post_id);
        $growth_method = $this->lgd_get_field('growth_method', $post_id);
        $color = $this->lgd_get_field('_diamond_color', $post_id);
        $clarity = $this->lgd_get_field('_diamond_clarity', $post_id);
        $lab = $this->lgd_get_field('_diamond_certification', $post_id);
        $is_type_iia = $this->lgd_get_field('is_type_iia', $post_id);
        $blue_nuance = $this->lgd_get_field('has_blue_nuance', $post_id);
        $brown_tinge = $this->lgd_get_field('has_brown_tinge', $post_id);

        // Check if we have minimum required data
        if (empty($carat) && empty($shape) && empty($color)) {
            return ''; // Not enough data to generate description
        }

        // Format values with defaults
        $carat = !empty($carat) ? esc_html($carat) : 'N/A';
        $shape = !empty($shape) ? ucfirst(esc_html($shape)) : 'Lab-Grown';
        $growth_method = !empty($growth_method) ? strtoupper(esc_html($growth_method)) : 'CVD';
        $color = !empty($color) ? esc_html($color) : 'Excellent';
        $clarity = !empty($clarity) ? esc_html($clarity) : 'VS+';
        $lab = !empty($lab) ? strtoupper(esc_html($lab)) : 'IGI';

        // Type IIa status
        $type_iia_status = ($is_type_iia === 'yes' || $is_type_iia === '1' || $is_type_iia === true)
            ? 'Type IIa certified (purest carbon structure)'
            : 'standard Type Ia composition';

        // Blue Nuance / Brown Tinge checks
        $quality_checks = array();
        if ($blue_nuance === 'yes' || $blue_nuance === '1' || $blue_nuance === true) {
            $quality_checks[] = 'slight blue nuance (HPHT characteristic)';
        }
        if ($brown_tinge === 'yes' || $brown_tinge === '1' || $brown_tinge === true) {
            $quality_checks[] = 'brown tinge detected';
        }
        $quality_notes = !empty($quality_checks) ? implode(' and ', $quality_checks) : 'no visible color undertones';

        // Build the description using the template
        $description = sprintf(
            '<p>This <strong>%s</strong>ct <strong>%s</strong> Lab-Grown Diamond is verified <strong>%s</strong> origin. ' .
            'Featuring <strong>%s</strong> color and <strong>%s</strong> clarity, it is graded by <strong>%s</strong>.</p>' .
            '<p><strong>Forensic Note:</strong> This stone is %s and checks for %s.</p>' .
            '<p><strong>Value Analysis:</strong> Priced via our Factory-Direct Surat feed.</p>',
            $carat,
            $shape,
            $growth_method,
            $color,
            $clarity,
            $lab,
            $type_iia_status,
            $quality_notes
        );

        return $description;
    }

    /**
     * Get Field Value
     * 
     * Helper function to get ACF field or fall back to post meta.
     *
     * @param string $field_name Field name.
     * @param int    $post_id    Post ID.
     * @return mixed Field value.
     */
    private function lgd_get_field($field_name, $post_id)
    {
        // Try ACF first
        if (function_exists('get_field')) {
            $value = get_field($field_name, $post_id);
            if (!empty($value)) {
                return $value;
            }
        }

        // Fallback to post meta
        // Handle both with and without underscore prefix
        $value = get_post_meta($post_id, $field_name, true);
        if (empty($value) && strpos($field_name, '_') !== 0) {
            $value = get_post_meta($post_id, '_' . $field_name, true);
        }
        if (empty($value) && strpos($field_name, '_') === 0) {
            $value = get_post_meta($post_id, ltrim($field_name, '_'), true);
        }

        // Also try meta: prefix format (for CSV imports)
        if (empty($value)) {
            $value = get_post_meta($post_id, 'meta:' . $field_name, true);
        }

        return $value;
    }

    /**
     * Render Forensic Table
     * 
     * Outputs a clean HTML table of ACF specs (HCA Score, Growth Method, Treatment).
     * Hooked to woocommerce_single_product_summary with priority 25.
     */
    public function render_forensic_table()
    {
        global $product;

        if (!$product) {
            return;
        }

        $post_id = $product->get_id();

        // Get all forensic specifications
        $specs = array(
            'Growth Method' => $this->lgd_get_field('growth_method', $post_id),
            'HCA Score' => $this->lgd_get_field('hca_score', $post_id),
            'Type IIa' => $this->lgd_get_field('is_type_iia', $post_id),
            'Blue Nuance' => $this->lgd_get_field('has_blue_nuance', $post_id),
            'Brown Tinge' => $this->lgd_get_field('has_brown_tinge', $post_id),
            'Carat' => $this->lgd_get_field('_diamond_carat', $post_id),
            'Shape' => $this->lgd_get_field('_diamond_shape', $post_id),
            'Color' => $this->lgd_get_field('_diamond_color', $post_id),
            'Clarity' => $this->lgd_get_field('_diamond_clarity', $post_id),
            'Cut' => $this->lgd_get_field('_diamond_cut', $post_id),
            'Polish' => $this->lgd_get_field('_diamond_polish', $post_id),
            'Symmetry' => $this->lgd_get_field('_diamond_symmetry', $post_id),
            'Fluorescence' => $this->lgd_get_field('_diamond_fluorescence', $post_id),
            'Table %' => $this->lgd_get_field('_diamond_table', $post_id),
            'Depth %' => $this->lgd_get_field('_diamond_depth', $post_id),
            'Measurements' => $this->lgd_get_field('_diamond_measurements', $post_id),
            'Certification' => $this->lgd_get_field('_diamond_certification', $post_id),
            'Certificate #' => $this->lgd_get_field('_diamond_cert_number', $post_id),
        );

        // Get certificate and video URLs
        $certificate_url = $this->lgd_get_field('certificate_url', $post_id);
        $video_url = $this->lgd_get_field('video_url', $post_id);

        // Check if we have any data to display
        $has_data = false;
        foreach ($specs as $value) {
            if (!empty($value)) {
                $has_data = true;
                break;
            }
        }

        if (!$has_data) {
            return; // No specs to display
        }

        // Check for super ideal cut (HCA score < 2)
        $hca_score = floatval($specs['HCA Score']);
        $is_super_ideal = ($hca_score > 0 && $hca_score < 2);
        $is_type_iia = ($specs['Type IIa'] === 'yes' || $specs['Type IIa'] === '1' || $specs['Type IIa'] === true);

        ?>
        <div class="lgd-forensic-wrapper">
            <?php if ($is_super_ideal || $is_type_iia): ?>
                <div class="lgd-forensic-badges" style="margin-bottom: 12px;">
                    <?php if ($is_super_ideal): ?>
                        <span class="badge-super-ideal">★ Super Ideal Cut</span>
                    <?php endif; ?>
                    <?php if ($is_type_iia): ?>
                        <span class="badge-type-iia">♦ Type IIa</span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <table class="lgd-forensic-table">
                <tbody>
                    <?php foreach ($specs as $label => $value): ?>
                        <?php if (!empty($value)): ?>
                            <tr>
                                <th><?php echo esc_html($label); ?></th>
                                <td>
                                    <?php
                                    // Format boolean values
                                    if ($value === 'yes' || $value === '1' || $value === true) {
                                        echo '<span style="color: #28a745;">✓ Yes</span>';
                                    } elseif ($value === 'no' || $value === '0' || $value === false) {
                                        echo '<span style="color: #dc3545;">✗ No</span>';
                                    } else {
                                        echo esc_html(ucfirst($value));
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if (!empty($certificate_url)): ?>
                        <tr>
                            <th>Certificate</th>
                            <td>
                                <a href="<?php echo esc_url($certificate_url); ?>" target="_blank" rel="noopener"
                                    class="lgd-cert-link">
                                    View Certificate ↗
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php if (!empty($video_url)): ?>
                        <tr>
                            <th>360° Video</th>
                            <td>
                                <a href="<?php echo esc_url($video_url); ?>" target="_blank" rel="noopener" class="lgd-video-link">
                                    View Diamond ↗
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php // Video Injector Button ?>
            <?php if (!empty($video_url)): ?>
                <a href="<?php echo esc_url($video_url); ?>" target="_blank" rel="noopener" class="lgd-forensic-video-btn">
                    ▷ View 360° Forensic Video
                </a>
            <?php endif; ?>

            <?php // Cost-Plus Transparent Pricing Card ?>
            <?php
            $regular_price = $product->get_regular_price();
            if (!empty($regular_price) && is_numeric($regular_price)):
                $final_price = floatval($regular_price);
                $diamond_cost = $final_price - 200;
                $diamond_cost = max(0, $diamond_cost); // Ensure non-negative
                ?>
                <div class="lgd-pricing-card">
                    <h4 class="lgd-pricing-title">Transparent Pricing</h4>
                    <p class="lgd-pricing-line">
                        <span class="lgd-pricing-label">Diamond Cost:</span>
                        <span class="lgd-pricing-value lgd-strikethrough">$<?php echo number_format($diamond_cost, 2); ?></span>
                    </p>
                    <p class="lgd-pricing-line">
                        <span class="lgd-pricing-label">Logistics & Verification Fee:</span>
                        <span class="lgd-pricing-value">$200.00</span>
                    </p>
                    <p class="lgd-pricing-line lgd-pricing-final">
                        <span class="lgd-pricing-label">Final Price:</span>
                        <span class="lgd-pricing-value">$<?php echo number_format($final_price, 2); ?></span>
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

    /**
     * Reset WooCommerce Configuration Flag
     * 
     * Utility method to allow re-running the auto-configuration.
     * Can be called manually if needed: LGD_Automator::reset_config();
     */
    public static function reset_config()
    {
        delete_option('lgd_woocommerce_configured');
    }
}
