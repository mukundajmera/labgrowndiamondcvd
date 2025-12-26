<?php
/**
 * Astra Child Theme - Lab Grown Diamond CVD
 * Premium ecommerce theme for lab-grown CVD diamonds
 * 
 * @package Astra Child Diamond
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define Constants
 */
define('ASTRA_CHILD_THEME_VERSION', '1.0.0');
define('ASTRA_CHILD_THEME_DIR', get_stylesheet_directory());
define('ASTRA_CHILD_THEME_URI', get_stylesheet_directory_uri());

/**
 * Enqueue parent and child theme styles
 */
function astra_child_enqueue_styles()
{
    // Enqueue parent theme stylesheet
    wp_enqueue_style('astra-theme-css', get_template_directory_uri() . '/style.css', array(), ASTRA_CHILD_THEME_VERSION);

    // Enqueue child theme stylesheet
    wp_enqueue_style('astra-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), ASTRA_CHILD_THEME_VERSION, 'all');

    // Enqueue custom CSS files
    wp_enqueue_style('diamond-header-css', get_stylesheet_directory_uri() . '/assets/css/header.css', array(), ASTRA_CHILD_THEME_VERSION);
    wp_enqueue_style('diamond-footer-css', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), ASTRA_CHILD_THEME_VERSION);

    // Conditional loading for page-specific styles
    if (is_front_page()) {
        wp_enqueue_style('diamond-homepage-css', get_stylesheet_directory_uri() . '/assets/css/homepage.css', array(), ASTRA_CHILD_THEME_VERSION);
    }

    if (is_shop() || is_product_category() || is_product_tag()) {
        wp_enqueue_style('diamond-plp-css', get_stylesheet_directory_uri() . '/assets/css/plp.css', array(), ASTRA_CHILD_THEME_VERSION);
    }

    if (is_product()) {
        wp_enqueue_style('diamond-pdp-css', get_stylesheet_directory_uri() . '/assets/css/pdp.css', array(), ASTRA_CHILD_THEME_VERSION);
    }

    // Mobile enhancements - loaded globally for all pages
    wp_enqueue_style('diamond-mobile-enhancements', get_stylesheet_directory_uri() . '/assets/css/mobile-enhancements.css', array(), ASTRA_CHILD_THEME_VERSION);

    wp_enqueue_style('diamond-custom-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), ASTRA_CHILD_THEME_VERSION);

    // Enqueue Google Fonts - Playfair Display for headings and Montserrat for body
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Playfair+Display:wght@400;600;700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_styles', 15);

/**
 * Enqueue custom JavaScript
 */
function astra_child_enqueue_scripts()
{
    // Enqueue header JS
    wp_enqueue_script('diamond-header', get_stylesheet_directory_uri() . '/assets/js/header.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);

    // Enqueue diamond search widget JS
    wp_enqueue_script('diamond-search', get_stylesheet_directory_uri() . '/assets/js/diamond-search.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);

    // Enqueue jewelry builder JS
    wp_enqueue_script('jewelry-builder', get_stylesheet_directory_uri() . '/assets/js/jewelry-builder.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);

    // Enqueue comparison tool JS
    wp_enqueue_script('product-comparison', get_stylesheet_directory_uri() . '/assets/js/comparison.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);

    // Enqueue mobile interactions JS
    wp_enqueue_script('mobile-interactions', get_stylesheet_directory_uri() . '/assets/js/mobile.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);

    // Conditional loading for page-specific scripts
    if (is_shop() || is_product_category() || is_product_tag()) {
        wp_enqueue_script('diamond-plp', get_stylesheet_directory_uri() . '/assets/js/plp.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);
    }

    if (is_product()) {
        wp_enqueue_script('diamond-pdp', get_stylesheet_directory_uri() . '/assets/js/pdp.js', array('jquery'), ASTRA_CHILD_THEME_VERSION, true);
    }

    // Localize script for AJAX
    wp_localize_script('diamond-search', 'diamondAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('diamond-search-nonce')
    ));

    // Localize jewelry builder pricing configuration
    wp_localize_script('jewelry-builder', 'jewelryBuilderConfig', array(
        'pricing' => array(
            'engraving_base' => get_option('astra_child_engraving_base_price', 50),
            'engraving_per_char' => get_option('astra_child_engraving_per_char', 2),
            'engraving_free_chars' => get_option('astra_child_engraving_free_chars', 20)
        )
    ));
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_scripts');

/**
 * Include custom functionality files
 */
require_once ASTRA_CHILD_THEME_DIR . '/inc/woocommerce-customizations.php';
require_once ASTRA_CHILD_THEME_DIR . '/inc/woocommerce-product-customizations.php'; // New Luxury Features
require_once ASTRA_CHILD_THEME_DIR . '/inc/auto-setup.php'; // Automated Page Setup
require_once ASTRA_CHILD_THEME_DIR . '/inc/b2b-portal.php';
require_once ASTRA_CHILD_THEME_DIR . '/inc/diamond-filters.php';
require_once ASTRA_CHILD_THEME_DIR . '/inc/custom-post-types.php';
require_once ASTRA_CHILD_THEME_DIR . '/inc/ajax-handlers.php';

// LGD Automator - Business Logic Brain
require_once get_stylesheet_directory() . '/includes/class-lgd-automator.php';
new LGD_Automator(); // Initialize the brain

/**
 * Theme setup
 */
function astra_child_theme_setup()
{
    // Add theme support for WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Add custom image sizes for diamond products
    add_image_size('diamond-thumbnail', 300, 300, true);
    add_image_size('diamond-medium', 600, 600, true);
    add_image_size('diamond-large', 1200, 1200, true);
    add_image_size('diamond-zoom', 2400, 2400, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'astra-child-diamond'),
        'mega-menu' => __('Mega Menu', 'astra-child-diamond'),
        'footer-menu-1' => __('Footer Menu 1 - About', 'astra-child-diamond'),
        'footer-menu-2' => __('Footer Menu 2 - Education', 'astra-child-diamond'),
        'footer-menu-3' => __('Footer Menu 3 - Customer Service', 'astra-child-diamond'),
        'footer-menu-4' => __('Footer Menu 4 - B2B Portal', 'astra-child-diamond'),
        'mobile-menu' => __('Mobile Menu', 'astra-child-diamond'),
    ));
}
add_action('after_setup_theme', 'astra_child_theme_setup');

/**
 * Register widget areas
 */
function astra_child_widgets_init()
{
    // Homepage Hero Widget Area
    register_sidebar(array(
        'name' => __('Homepage Hero', 'astra-child-diamond'),
        'id' => 'homepage-hero',
        'description' => __('Widget area for homepage hero section', 'astra-child-diamond'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    // Diamond Search Widget Area
    register_sidebar(array(
        'name' => __('Diamond Search Widget', 'astra-child-diamond'),
        'id' => 'diamond-search-widget',
        'description' => __('Widget area for diamond search functionality', 'astra-child-diamond'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    // Trust Banner Widget Area
    register_sidebar(array(
        'name' => __('Trust Banner', 'astra-child-diamond'),
        'id' => 'trust-banner',
        'description' => __('Widget area for trust elements', 'astra-child-diamond'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'astra_child_widgets_init');

/**
 * Add body classes for different page types
 */
function astra_child_body_classes($classes)
{
    if (is_front_page()) {
        $classes[] = 'diamond-homepage';
    }

    if (is_shop() || is_product_category() || is_product_tag()) {
        $classes[] = 'diamond-plp';
    }

    if (is_product()) {
        $classes[] = 'diamond-pdp';
    }

    // Check if user is B2B customer
    if (is_user_logged_in() && user_can(get_current_user_id(), 'b2b_customer')) {
        $classes[] = 'b2b-user';
    }

    return $classes;
}
add_filter('body_class', 'astra_child_body_classes');

/**
 * Customize WooCommerce product loop
 */
add_filter('loop_shop_columns', function () {
    return 4; // 4 columns on desktop
});

add_filter('loop_shop_per_page', function () {
    return 20; // 20 products per page
});

/**
 * Add custom meta boxes for diamond specifications
 */
function astra_child_add_diamond_meta_boxes()
{
    add_meta_box(
        'diamond_specifications',
        __('Diamond Specifications', 'astra-child-diamond'),
        'astra_child_diamond_specifications_callback',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'astra_child_add_diamond_meta_boxes');

/**
 * Diamond specifications meta box callback
 */
function astra_child_diamond_specifications_callback($post)
{
    wp_nonce_field('diamond_specifications_nonce', 'diamond_specifications_nonce');

    $carat = get_post_meta($post->ID, '_diamond_carat', true);
    $color = get_post_meta($post->ID, '_diamond_color', true);
    $clarity = get_post_meta($post->ID, '_diamond_clarity', true);
    $cut = get_post_meta($post->ID, '_diamond_cut', true);
    $shape = get_post_meta($post->ID, '_diamond_shape', true);
    $polish = get_post_meta($post->ID, '_diamond_polish', true);
    $symmetry = get_post_meta($post->ID, '_diamond_symmetry', true);
    $fluorescence = get_post_meta($post->ID, '_diamond_fluorescence', true);
    $table = get_post_meta($post->ID, '_diamond_table', true);
    $depth = get_post_meta($post->ID, '_diamond_depth', true);
    $measurements = get_post_meta($post->ID, '_diamond_measurements', true);
    $certification = get_post_meta($post->ID, '_diamond_certification', true);
    $cert_number = get_post_meta($post->ID, '_diamond_cert_number', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="diamond_shape"><?php _e('Shape', 'astra-child-diamond'); ?></label></th>
            <td>
                <select name="diamond_shape" id="diamond_shape" style="width: 100%;">
                    <option value=""><?php _e('Select Shape', 'astra-child-diamond'); ?></option>
                    <option value="round" <?php selected($shape, 'round'); ?>>
                        <?php _e('Round', 'astra-child-diamond'); ?>
                    </option>
                    <option value="princess" <?php selected($shape, 'princess'); ?>>
                        <?php _e('Princess', 'astra-child-diamond'); ?>
                    </option>
                    <option value="cushion" <?php selected($shape, 'cushion'); ?>>
                        <?php _e('Cushion', 'astra-child-diamond'); ?>
                    </option>
                    <option value="oval" <?php selected($shape, 'oval'); ?>><?php _e('Oval', 'astra-child-diamond'); ?>
                    </option>
                    <option value="emerald" <?php selected($shape, 'emerald'); ?>>
                        <?php _e('Emerald', 'astra-child-diamond'); ?>
                    </option>
                    <option value="pear" <?php selected($shape, 'pear'); ?>><?php _e('Pear', 'astra-child-diamond'); ?>
                    </option>
                    <option value="marquise" <?php selected($shape, 'marquise'); ?>>
                        <?php _e('Marquise', 'astra-child-diamond'); ?>
                    </option>
                    <option value="radiant" <?php selected($shape, 'radiant'); ?>>
                        <?php _e('Radiant', 'astra-child-diamond'); ?>
                    </option>
                    <option value="asscher" <?php selected($shape, 'asscher'); ?>>
                        <?php _e('Asscher', 'astra-child-diamond'); ?>
                    </option>
                    <option value="heart" <?php selected($shape, 'heart'); ?>>
                        <?php _e('Heart', 'astra-child-diamond'); ?>
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="diamond_carat"><?php _e('Carat Weight', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_carat" id="diamond_carat" value="<?php echo esc_attr($carat); ?>"
                    style="width: 100%;" /></td>
        </tr>
        <tr>
            <th><label for="diamond_color"><?php _e('Color Grade', 'astra-child-diamond'); ?></label></th>
            <td>
                <select name="diamond_color" id="diamond_color" style="width: 100%;">
                    <option value=""><?php _e('Select Color', 'astra-child-diamond'); ?></option>
                    <?php
                    $colors = array('D', 'E', 'F', 'G', 'H', 'I', 'J', 'K');
                    foreach ($colors as $c) {
                        echo '<option value="' . $c . '" ' . selected($color, $c, false) . '>' . $c . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="diamond_clarity"><?php _e('Clarity Grade', 'astra-child-diamond'); ?></label></th>
            <td>
                <select name="diamond_clarity" id="diamond_clarity" style="width: 100%;">
                    <option value=""><?php _e('Select Clarity', 'astra-child-diamond'); ?></option>
                    <?php
                    $clarities = array('IF', 'VVS1', 'VVS2', 'VS1', 'VS2', 'SI1', 'SI2');
                    foreach ($clarities as $cl) {
                        echo '<option value="' . $cl . '" ' . selected($clarity, $cl, false) . '>' . $cl . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="diamond_cut"><?php _e('Cut Grade', 'astra-child-diamond'); ?></label></th>
            <td>
                <select name="diamond_cut" id="diamond_cut" style="width: 100%;">
                    <option value=""><?php _e('Select Cut', 'astra-child-diamond'); ?></option>
                    <option value="excellent" <?php selected($cut, 'excellent'); ?>>
                        <?php _e('Excellent', 'astra-child-diamond'); ?>
                    </option>
                    <option value="very-good" <?php selected($cut, 'very-good'); ?>>
                        <?php _e('Very Good', 'astra-child-diamond'); ?>
                    </option>
                    <option value="good" <?php selected($cut, 'good'); ?>><?php _e('Good', 'astra-child-diamond'); ?>
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="diamond_polish"><?php _e('Polish', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_polish" id="diamond_polish" value="<?php echo esc_attr($polish); ?>"
                    style="width: 100%;" /></td>
        </tr>
        <tr>
            <th><label for="diamond_symmetry"><?php _e('Symmetry', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_symmetry" id="diamond_symmetry" value="<?php echo esc_attr($symmetry); ?>"
                    style="width: 100%;" /></td>
        </tr>
        <tr>
            <th><label for="diamond_fluorescence"><?php _e('Fluorescence', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_fluorescence" id="diamond_fluorescence"
                    value="<?php echo esc_attr($fluorescence); ?>" style="width: 100%;" /></td>
        </tr>
        <tr>
            <th><label for="diamond_table"><?php _e('Table %', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_table" id="diamond_table" value="<?php echo esc_attr($table); ?>"
                    style="width: 100%;" /></td>
        </tr>
        <tr>
            <th><label for="diamond_depth"><?php _e('Depth %', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_depth" id="diamond_depth" value="<?php echo esc_attr($depth); ?>"
                    style="width: 100%;" /></td>
        </tr>
        <tr>
            <th><label for="diamond_measurements"><?php _e('Measurements (mm)', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_measurements" id="diamond_measurements"
                    value="<?php echo esc_attr($measurements); ?>" style="width: 100%;"
                    placeholder="e.g., 6.50 x 6.48 x 4.01" /></td>
        </tr>
        <tr>
            <th><label for="diamond_certification"><?php _e('Certification', 'astra-child-diamond'); ?></label></th>
            <td>
                <select name="diamond_certification" id="diamond_certification" style="width: 100%;">
                    <option value=""><?php _e('Select Certification', 'astra-child-diamond'); ?></option>
                    <option value="gia" <?php selected($certification, 'gia'); ?>>
                        <?php _e('GIA', 'astra-child-diamond'); ?>
                    </option>
                    <option value="igi" <?php selected($certification, 'igi'); ?>>
                        <?php _e('IGI', 'astra-child-diamond'); ?>
                    </option>
                    <option value="other" <?php selected($certification, 'other'); ?>>
                        <?php _e('Other', 'astra-child-diamond'); ?>
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="diamond_cert_number"><?php _e('Certificate Number', 'astra-child-diamond'); ?></label></th>
            <td><input type="text" name="diamond_cert_number" id="diamond_cert_number"
                    value="<?php echo esc_attr($cert_number); ?>" style="width: 100%;" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save diamond specifications meta data
 */
function astra_child_save_diamond_specifications($post_id)
{
    if (!isset($_POST['diamond_specifications_nonce']) || !wp_verify_nonce($_POST['diamond_specifications_nonce'], 'diamond_specifications_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = array(
        'diamond_shape',
        'diamond_carat',
        'diamond_color',
        'diamond_clarity',
        'diamond_cut',
        'diamond_polish',
        'diamond_symmetry',
        'diamond_fluorescence',
        'diamond_table',
        'diamond_depth',
        'diamond_measurements',
        'diamond_certification',
        'diamond_cert_number'
    );

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'astra_child_save_diamond_specifications');

/**
 * Add custom user role for B2B customers
 */
function astra_child_add_b2b_role()
{
    add_role(
        'b2b_customer',
        __('B2B Customer', 'astra-child-diamond'),
        array(
            'read' => true,
            'edit_posts' => false,
            'delete_posts' => false,
        )
    );
}
add_action('init', 'astra_child_add_b2b_role');

/**
 * Customize WooCommerce checkout fields
 */
function astra_child_customize_checkout_fields($fields)
{
    // Add company field for B2B customers
    $fields['billing']['billing_company']['required'] = false;
    $fields['billing']['billing_company']['class'] = array('form-row-wide');

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'astra_child_customize_checkout_fields');

/**
 * Add WhatsApp integration
 */
function astra_child_whatsapp_button()
{
    $whatsapp_number = get_theme_mod('whatsapp_number', '');
    if ($whatsapp_number) {
        ?>
        <a href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>" class="whatsapp-button" target="_blank"
            rel="noopener">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
            <?php _e('WhatsApp Us', 'astra-child-diamond'); ?>
        </a>
        <?php
    }
}
add_action('wp_footer', 'astra_child_whatsapp_button');

/**
 * Add live chat button
 */
function astra_child_live_chat_button()
{
    ?>
    <div class="floating-chat">
        <div class="chat-bubble" onclick="openLiveChat()">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z" />
            </svg>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'astra_child_live_chat_button');

/**
 * Customizer settings for theme
 */
function astra_child_customizer_settings($wp_customize)
{
    // Add section for Diamond Theme Settings
    $wp_customize->add_section('diamond_theme_settings', array(
        'title' => __('Diamond Theme Settings', 'astra-child-diamond'),
        'priority' => 30,
    ));

    // WhatsApp Number Setting
    $wp_customize->add_setting('whatsapp_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('whatsapp_number', array(
        'label' => __('WhatsApp Number (with country code)', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'text',
    ));

    // Trust Banner Settings
    $wp_customize->add_setting('enable_trust_banner', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('enable_trust_banner', array(
        'label' => __('Enable Trust Banner', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'checkbox',
    ));

    // Hero Video URL
    $wp_customize->add_setting('hero_video_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_video_url', array(
        'label' => __('Hero Section Video URL', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'url',
    ));

    // Engraving Base Price
    $wp_customize->add_setting('astra_child_engraving_base_price', array(
        'default' => 50,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('astra_child_engraving_base_price', array(
        'label' => __('Engraving Base Price ($)', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 0,
            'step' => 1,
        ),
    ));

    // Engraving Per Character Price
    $wp_customize->add_setting('astra_child_engraving_per_char', array(
        'default' => 2,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('astra_child_engraving_per_char', array(
        'label' => __('Engraving Price per Extra Character ($)', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 0,
            'step' => 1,
        ),
    ));

    // Engraving Free Characters
    $wp_customize->add_setting('astra_child_engraving_free_chars', array(
        'default' => 20,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('astra_child_engraving_free_chars', array(
        'label' => __('Free Characters for Engraving', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 0,
            'step' => 1,
        ),
    ));

    // Contact Information
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@labgrowndiamondcvd.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Contact Email', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'email',
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default' => '+91 XXXXX XXXXX',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Contact Phone', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'text',
    ));

    // Social Media URLs
    $wp_customize->add_setting('facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('facebook_url', array(
        'label' => __('Facebook URL', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'url',
    ));

    $wp_customize->add_setting('instagram_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('instagram_url', array(
        'label' => __('Instagram URL', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'url',
    ));

    $wp_customize->add_setting('youtube_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('youtube_url', array(
        'label' => __('YouTube URL', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'url',
    ));

    // Header Announcement
    $wp_customize->add_setting('header_announcement', array(
        'default' => 'Free Shipping on Orders Above ₹50,000 | IGI/GIA Certified',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('header_announcement', array(
        'label' => __('Header Announcement Bar Text', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'text',
    ));

    // Social Proof Stats
    $wp_customize->add_setting('customer_reviews_count', array(
        'default' => '500+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('customer_reviews_count', array(
        'label' => __('Customer Reviews Count', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('diamonds_sold_count', array(
        'default' => '5,000+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('diamonds_sold_count', array(
        'label' => __('Diamonds Sold Count', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('jewellers_served_count', array(
        'default' => '200+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('jewellers_served_count', array(
        'label' => __('Jewellers Served Count', 'astra-child-diamond'),
        'section' => 'diamond_theme_settings',
        'type' => 'text',
    ));
}
add_action('customize_register', 'astra_child_customizer_settings');

/**
 * Add schema markup for products
 */
function astra_child_product_schema()
{
    if (is_product()) {
        global $product;

        $schema = array(
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' => $product->get_name(),
            'image' => wp_get_attachment_url($product->get_image_id()),
            'description' => $product->get_short_description(),
            'sku' => $product->get_sku(),
            'offers' => array(
                '@type' => 'Offer',
                'url' => get_permalink(),
                'priceCurrency' => get_woocommerce_currency(),
                'price' => $product->get_price(),
                'availability' => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            ),
        );

        // Add rating if available
        if ($product->get_average_rating()) {
            $schema['aggregateRating'] = array(
                '@type' => 'AggregateRating',
                'ratingValue' => $product->get_average_rating(),
                'reviewCount' => $product->get_review_count(),
            );
        }

        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>';
    }
}
add_action('wp_head', 'astra_child_product_schema');

/**
 * Add mobile navigation bar
 */
function astra_child_mobile_nav_bar()
{
    ?>
    <nav class="mobile-nav-bar">
        <div class="mobile-nav-items">
            <a href="<?php echo home_url('/'); ?>" class="mobile-nav-item <?php echo is_front_page() ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z" />
                </svg>
                <span><?php _e('Home', 'astra-child-diamond'); ?></span>
            </a>
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>"
                class="mobile-nav-item <?php echo is_shop() ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg>
                <span><?php _e('Search', 'astra-child-diamond'); ?></span>
            </a>
            <a href="#" class="mobile-nav-item" id="mobile-compare-btn">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M10 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h5v2h2V1h-2v2zm0 15H5l5-6v6zm9-15h-5v2h5v13l-5-6v9h5c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                </svg>
                <span><?php _e('Compare', 'astra-child-diamond'); ?></span>
            </a>
            <a href="<?php echo wc_get_cart_url(); ?>" class="mobile-nav-item <?php echo is_cart() ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                </svg>
                <span><?php _e('Cart', 'astra-child-diamond'); ?></span>
                <?php if (WC()->cart->get_cart_contents_count() > 0): ?>
                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                <?php endif; ?>
            </a>
            <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>"
                class="mobile-nav-item <?php echo is_account_page() ? 'active' : ''; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                </svg>
                <span><?php _e('Account', 'astra-child-diamond'); ?></span>
            </a>
        </div>
    </nav>
    <?php
}
add_action('wp_footer', 'astra_child_mobile_nav_bar');

/**
 * Add trust banner to site
 */
function astra_child_trust_banner()
{
    if (get_theme_mod('enable_trust_banner', true)) {
        ?>
        <div class="trust-banner">
            <div class="trust-banner-content">
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                    </svg>
                    <span><?php _e('IGI/GIA Certified', 'astra-child-diamond'); ?></span>
                </div>
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                    </svg>
                    <span><?php _e('30-Day Returns', 'astra-child-diamond'); ?></span>
                </div>
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-1 6h2v7h-2V7zm0 8h2v2h-2v-2z" />
                    </svg>
                    <span><?php _e('Lifetime Warranty', 'astra-child-diamond'); ?></span>
                </div>
                <div class="trust-item">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M20 8h-3V4H3c-1.1 0-2 .9-2 2v11h2c0 1.66 1.34 3 3 3s3-1.34 3-3h6c0 1.66 1.34 3 3 3s3-1.34 3-3h2v-5l-3-4zM6 18.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5-9l1.96 2.5H17V9.5h2.5zm-1.5 9c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                    </svg>
                    <span><?php _e('Carbon-Neutral Shipping', 'astra-child-diamond'); ?></span>
                </div>
            </div>
        </div>
        <?php
    }
}
add_action('astra_body_top', 'astra_child_trust_banner');

/**
 * ==========================================================================
 * FORENSIC DIAMOND SPECS - ACF FIELD GROUP REGISTRATION
 * ==========================================================================
 */

/**
 * ACF Safety Check - Ensure ACF is active before using ACF functions
 */
if (!function_exists('acf_add_local_field_group')) {
    function lgd_acf_admin_notice()
    {
        echo '<div class="notice notice-error"><p>';
        echo '<strong>Astra Child Theme:</strong> Advanced Custom Fields (ACF) plugin is required for Forensic Diamond Specs functionality.';
        echo '</p></div>';
    }
    add_action('admin_notices', 'lgd_acf_admin_notice');
}

/**
 * Register "Forensic Diamond Specs" ACF Field Group
 * Programmatically registers field group for product post type
 */
function lgd_register_forensic_diamond_specs()
{
    // Only proceed if ACF is active
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_forensic_specs',
        'title' => 'Forensic Diamond Specs',
        'fields' => array(
            // Growth Method - Select (CVD/HPHT)
            array(
                'key' => 'field_growth_method',
                'label' => 'Growth Method',
                'name' => 'growth_method',
                'type' => 'select',
                'instructions' => 'Select the diamond growth method',
                'required' => 0,
                'choices' => array(
                    'CVD' => 'CVD',
                    'HPHT' => 'HPHT',
                ),
                'default_value' => '',
                'allow_null' => 1,
                'multiple' => 0,
                'ui' => 1,
                'return_format' => 'value',
            ),
            // Post-Growth Treatment - Text
            array(
                'key' => 'field_post_growth_treatment',
                'label' => 'Post-Growth Treatment',
                'name' => 'post_growth_treatment',
                'type' => 'text',
                'instructions' => 'Specify any post-growth treatments applied',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'e.g., None, HPHT Treated',
            ),
            // Type IIa - True/False
            array(
                'key' => 'field_is_type_iia',
                'label' => 'Type IIa Diamond',
                'name' => 'is_type_iia',
                'type' => 'true_false',
                'instructions' => 'Is this a Type IIa diamond?',
                'required' => 0,
                'message' => 'This is a Type IIa diamond',
                'default_value' => 0,
                'ui' => 1,
            ),
            // Blue Nuance - True/False
            array(
                'key' => 'field_has_blue_nuance',
                'label' => 'Blue Nuance',
                'name' => 'has_blue_nuance',
                'type' => 'true_false',
                'instructions' => 'Does this diamond have a blue nuance?',
                'required' => 0,
                'message' => 'Has blue nuance',
                'default_value' => 0,
                'ui' => 1,
            ),
            // Brown Tinge - True/False
            array(
                'key' => 'field_has_brown_tinge',
                'label' => 'Brown Tinge',
                'name' => 'has_brown_tinge',
                'type' => 'true_false',
                'instructions' => 'Does this diamond have a brown tinge?',
                'required' => 0,
                'message' => 'Has brown tinge',
                'default_value' => 0,
                'ui' => 1,
            ),
            // HCA Score - Number (step 0.1)
            array(
                'key' => 'field_hca_score',
                'label' => 'HCA Score',
                'name' => 'hca_score',
                'type' => 'number',
                'instructions' => 'Holloway Cut Advisor (HCA) score',
                'required' => 0,
                'default_value' => '',
                'placeholder' => '0.0',
                'min' => 0,
                'max' => '',
                'step' => 0.1,
            ),
            // Certificate URL
            array(
                'key' => 'field_certificate_url',
                'label' => 'Certificate URL',
                'name' => 'certificate_url',
                'type' => 'url',
                'instructions' => 'Link to GIA/IGI certificate',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'https://',
            ),
            // Video URL
            array(
                'key' => 'field_video_url',
                'label' => 'Video URL',
                'name' => 'video_url',
                'type' => 'url',
                'instructions' => 'Link to diamond video',
                'required' => 0,
                'default_value' => '',
                'placeholder' => 'https://',
            ),
            // Wholesale Cost - Number (hidden or standard)
            array(
                'key' => 'field_wholesale_cost',
                'label' => 'Wholesale Cost',
                'name' => 'wholesale_cost',
                'type' => 'number',
                'instructions' => 'Internal wholesale cost (not visible to customers)',
                'required' => 0,
                'default_value' => '',
                'placeholder' => '0.00',
                'min' => 0,
                'step' => 0.01,
                'wrapper' => array(
                    'class' => 'lgd-admin-only',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'High-end forensic specifications for lab-grown diamonds',
    ));
}
add_action('acf/init', 'lgd_register_forensic_diamond_specs');

/**
 * Helper Function: Display Forensic Data
 * Outputs ACF forensic diamond specs in an HTML table format
 * Can be called from WooCommerce templates
 * 
 * @param int $product_id Optional product ID, defaults to current post
 * @return void Echoes HTML table
 */
function lgd_display_forensic_data($product_id = null)
{
    // Only proceed if ACF is active
    if (!function_exists('get_field')) {
        return;
    }

    // Get product ID
    if (!$product_id) {
        $product_id = get_the_ID();
    }

    // Retrieve all forensic fields
    $growth_method = get_field('growth_method', $product_id);
    $post_growth_treatment = get_field('post_growth_treatment', $product_id);
    $is_type_iia = get_field('is_type_iia', $product_id);
    $has_blue_nuance = get_field('has_blue_nuance', $product_id);
    $has_brown_tinge = get_field('has_brown_tinge', $product_id);
    $hca_score = get_field('hca_score', $product_id);
    $certificate_url = get_field('certificate_url', $product_id);
    $video_url = get_field('video_url', $product_id);
    $wholesale_cost = get_field('wholesale_cost', $product_id);

    // Check if at least one field has data
    if (!$growth_method && !$post_growth_treatment && !$hca_score && !$certificate_url && !$video_url) {
        return;
    }

    // Output HTML table
    ?>
    <div class="lgd-forensic-specs">
        <h3 class="forensic-specs-title"><?php _e('Forensic Diamond Specifications', 'astra-child-diamond'); ?></h3>
        <table class="forensic-specs-table">
            <tbody>
                <?php if ($growth_method): ?>
                    <tr>
                        <th><?php _e('Growth Method', 'astra-child-diamond'); ?></th>
                        <td><strong><?php echo esc_html($growth_method); ?></strong></td>
                    </tr>
                <?php endif; ?>

                <?php if ($post_growth_treatment): ?>
                    <tr>
                        <th><?php _e('Post-Growth Treatment', 'astra-child-diamond'); ?></th>
                        <td><?php echo esc_html($post_growth_treatment); ?></td>
                    </tr>
                <?php endif; ?>

                <?php if ($is_type_iia): ?>
                    <tr>
                        <th><?php _e('Type IIa', 'astra-child-diamond'); ?></th>
                        <td><span class="badge badge-success"><?php _e('Yes', 'astra-child-diamond'); ?></span></td>
                    </tr>
                <?php endif; ?>

                <?php if ($has_blue_nuance): ?>
                    <tr>
                        <th><?php _e('Blue Nuance', 'astra-child-diamond'); ?></th>
                        <td><span class="badge badge-info"><?php _e('Present', 'astra-child-diamond'); ?></span></td>
                    </tr>
                <?php endif; ?>

                <?php if ($has_brown_tinge): ?>
                    <tr>
                        <th><?php _e('Brown Tinge', 'astra-child-diamond'); ?></th>
                        <td><span class="badge badge-warning"><?php _e('Present', 'astra-child-diamond'); ?></span></td>
                    </tr>
                <?php endif; ?>

                <?php if ($hca_score): ?>
                    <tr>
                        <th><?php _e('HCA Score', 'astra-child-diamond'); ?></th>
                        <td><?php echo esc_html(number_format($hca_score, 1)); ?></td>
                    </tr>
                <?php endif; ?>

                <?php if ($certificate_url): ?>
                    <tr>
                        <th><?php _e('Certificate', 'astra-child-diamond'); ?></th>
                        <td><a href="<?php echo esc_url($certificate_url); ?>" target="_blank" rel="noopener noreferrer"
                                class="btn-certificate"><?php _e('View Certificate', 'astra-child-diamond'); ?></a></td>
                    </tr>
                <?php endif; ?>

                <?php if ($video_url): ?>
                    <tr>
                        <th><?php _e('Video', 'astra-child-diamond'); ?></th>
                        <td><a href="<?php echo esc_url($video_url); ?>" target="_blank" rel="noopener noreferrer"
                                class="btn-video"><?php _e('Watch Video', 'astra-child-diamond'); ?></a></td>
                    </tr>
                <?php endif; ?>

                <?php
                // Only show wholesale cost to admin users
                if ($wholesale_cost && current_user_can('manage_options')):
                    ?>
                    <tr class="admin-only-row">
                        <th><?php _e('Wholesale Cost', 'astra-child-diamond'); ?></th>
                        <td><span class="admin-only-value"><?php echo wc_price($wholesale_cost); ?></span></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

/**
 * ==========================================================================
 * LGD DIAMOND EXCHANGE - AUTOMATED SITE SETUP
 * Runs once on theme activation to create pages, menu, and settings
 * ==========================================================================
 */

/**
 * Run automated site setup (one-time only)
 * Creates pages, sets homepage, and creates primary menu
 */
function lgd_automated_site_setup()
{
    // Check if setup has already been completed
    if (get_option('lgd_setup_complete')) {
        return;
    }

    // Array of pages to create
    $pages_to_create = array(
        'home' => array(
            'title' => 'Home',
            'content' => '',
            'template' => '',
        ),
        'about' => array(
            'title' => 'About Us',
            'content' => '',
            'template' => 'page-about.php',
        ),
        'education' => array(
            'title' => 'Education',
            'content' => '',
            'template' => 'page-education.php',
        ),
    );

    $created_pages = array();

    // Create pages if they don't exist
    foreach ($pages_to_create as $slug => $page_data) {
        $existing_page = get_page_by_path($slug);

        if (!$existing_page) {
            $page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $slug,
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1,
            ));

            if ($page_id && !is_wp_error($page_id)) {
                if (!empty($page_data['template'])) {
                    update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                }
                $created_pages[$slug] = $page_id;
            }
        } else {
            $created_pages[$slug] = $existing_page->ID;
        }
    }

    // Set the homepage settings
    if (!empty($created_pages['home'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $created_pages['home']);
    }

    // Create Primary Menu
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        if (!is_wp_error($menu_id)) {
            // Add Home
            if (!empty($created_pages['home'])) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => 'Home',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $created_pages['home'],
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 1,
                ));
            }

            // Add Shop
            $shop_page_id = wc_get_page_id('shop');
            if ($shop_page_id > 0) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => 'Diamonds',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $shop_page_id,
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 2,
                ));
            }

            // Add About
            if (!empty($created_pages['about'])) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => 'The Surat Advantage',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $created_pages['about'],
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 3,
                ));
            }

            // Add Education
            if (!empty($created_pages['education'])) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => 'CVD vs HPHT',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => $created_pages['education'],
                    'menu-item-type' => 'post_type',
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 4,
                ));
            }

            // Assign menu to primary location
            $locations = get_theme_mod('nav_menu_locations');
            if (!is_array($locations)) {
                $locations = array();
            }
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    }

    // Mark setup as complete
    update_option('lgd_setup_complete', true);
}
add_action('after_setup_theme', 'lgd_automated_site_setup');

