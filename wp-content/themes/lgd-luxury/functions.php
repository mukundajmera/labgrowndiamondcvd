<?php
/**
 * LGD-Luxury Child Theme Functions
 * 
 * @package LGD-Luxury
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define Theme Constants
 */
define('LGD_LUXURY_VERSION', '1.0.0');
define('LGD_LUXURY_DIR', get_stylesheet_directory());
define('LGD_LUXURY_URI', get_stylesheet_directory_uri());

/**
 * Enqueue Google Fonts
 */
function lgd_luxury_enqueue_google_fonts()
{
    // Google Fonts - Playfair Display (Headings) and Montserrat (Body)
    $google_fonts_url = add_query_arg(
        array(
            'family' => urlencode('Playfair Display:ital,wght@0,400;0,500;0,600;0,700;1,400|Montserrat:wght@300;400;500;600;700'),
            'display' => 'swap',
        ),
        'https://fonts.googleapis.com/css2'
    );

    wp_enqueue_style(
        'lgd-luxury-google-fonts',
        $google_fonts_url,
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'lgd_luxury_enqueue_google_fonts', 5);

/**
 * Enqueue Parent and Child Theme Styles
 */
function lgd_luxury_enqueue_styles()
{
    // Enqueue parent theme stylesheet
    wp_enqueue_style(
        'astra-theme-css',
        get_template_directory_uri() . '/style.css',
        array(),
        LGD_LUXURY_VERSION
    );

    // Enqueue child theme stylesheet
    wp_enqueue_style(
        'lgd-luxury-css',
        get_stylesheet_directory_uri() . '/style.css',
        array('astra-theme-css', 'lgd-luxury-google-fonts'),
        LGD_LUXURY_VERSION
    );
}
add_action('wp_enqueue_scripts', 'lgd_luxury_enqueue_styles', 15);

/**
 * Preload Google Fonts for Performance
 */
function lgd_luxury_preload_fonts()
{
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
}
add_action('wp_head', 'lgd_luxury_preload_fonts', 1);

/**
 * Add theme support
 */
function lgd_luxury_theme_setup()
{
    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Add title tag support
    add_theme_support('title-tag');

    // Add featured image support
    add_theme_support('post-thumbnails');

    // Add HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'lgd_luxury_theme_setup');

/**
 * Add custom body classes
 */
function lgd_luxury_body_classes($classes)
{
    $classes[] = 'lgd-luxury-theme';
    return $classes;
}
add_filter('body_class', 'lgd_luxury_body_classes');

/**
 * Include WooCommerce Product Customizations
 */
if (class_exists('WooCommerce')) {
    require_once LGD_LUXURY_DIR . '/inc/woocommerce-product-customizations.php';
}

/**
 * Floating WhatsApp Button
 * Displays a fixed WhatsApp icon for customer support
 */
function lgd_luxury_whatsapp_button()
{
    // Replace with your actual WhatsApp number (with country code, no + or spaces)
    $whatsapp_number = '1234567890';
    $whatsapp_message = rawurlencode('Hi! I have a question about your diamonds.');
    ?>
    <a href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>?text=<?php echo $whatsapp_message; ?>"
        class="lgd-whatsapp-btn" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="#FFFFFF">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
    </a>

    <style>
        .lgd-whatsapp-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            background-color: #25D366;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
        }

        .lgd-whatsapp-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.5);
        }

        .lgd-whatsapp-btn:active {
            transform: scale(1.05);
        }

        .lgd-whatsapp-btn svg {
            display: block;
        }

        /* Pulse animation for attention */
        @keyframes lgd-pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        .lgd-whatsapp-btn::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            animation: lgd-pulse 2s infinite;
        }
    </style>
    <?php
}
add_action('wp_footer', 'lgd_luxury_whatsapp_button');

