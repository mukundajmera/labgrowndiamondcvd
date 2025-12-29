<?php
/**
 * WordPress Site Verification & Health Check Script
 * Lab Grown Diamond CVD
 * 
 * Run this script to verify your WordPress installation is working correctly
 * Usage: php verify-site.php (CLI only for security)
 * 
 * SECURITY NOTE: This script should only be run via CLI and not accessed via browser
 * as it exposes sensitive environment information. Delete or restrict access after use.
 */

// Only allow CLI execution for security
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    die('Access denied. This script can only be run via command line for security reasons.');
}

// Load WordPress
if (!defined('ABSPATH')) {
    // Try to load WordPress
    $wp_load_paths = [
        __DIR__ . '/wp-load.php',
        dirname(__DIR__) . '/wp-load.php',
        dirname(dirname(__DIR__)) . '/wp-load.php',
    ];
    
    $wp_loaded = false;
    foreach ($wp_load_paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            $wp_loaded = true;
            break;
        }
    }
    
    if (!$wp_loaded) {
        die('WordPress not found. Please run this script from the WordPress root directory.');
    }
}

// CLI Color codes
$colors = [
    'reset' => "\033[0m",
    'red' => "\033[0;31m",
    'green' => "\033[0;32m",
    'yellow' => "\033[1;33m",
    'blue' => "\033[0;34m",
];

$is_cli = php_sapi_name() === 'cli';

function output($message, $color = 'reset', $is_cli = true) {
    global $colors;
    if ($is_cli) {
        echo $colors[$color] . $message . $colors['reset'] . "\n";
    } else {
        $html_colors = [
            'red' => '#dc3545',
            'green' => '#28a745',
            'yellow' => '#ffc107',
            'blue' => '#007bff',
            'reset' => '#000000'
        ];
        $style = "color: " . ($html_colors[$color] ?? '#000000');
        echo "<div style='$style; margin: 5px 0;'>$message</div>";
    }
}

function log_header($message, $is_cli = true) {
    if ($is_cli) {
        output("\n" . str_repeat('=', 70), 'blue', $is_cli);
        output($message, 'blue', $is_cli);
        output(str_repeat('=', 70), 'blue', $is_cli);
    } else {
        echo "<h2 style='color: #007bff; border-bottom: 2px solid #007bff; padding-bottom: 10px;'>$message</h2>";
    }
}

function log_success($message, $is_cli = true) {
    output("✓ $message", 'green', $is_cli);
}

function log_error($message, $is_cli = true) {
    output("✗ $message", 'red', $is_cli);
}

function log_warning($message, $is_cli = true) {
    output("⚠ $message", 'yellow', $is_cli);
}

function log_info($message, $is_cli = true) {
    output("ℹ $message", 'blue', $is_cli);
}

// HTML header for browser access
if (!$is_cli) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WordPress Site Verification - Lab Grown Diamond CVD</title>
        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
                max-width: 1200px;
                margin: 40px auto;
                padding: 20px;
                background: #f8f9fa;
            }
            .container {
                background: white;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            h1 {
                color: #0D47A1;
                border-bottom: 3px solid #0D47A1;
                padding-bottom: 10px;
            }
            .summary {
                background: #e3f2fd;
                padding: 20px;
                border-radius: 5px;
                margin: 20px 0;
            }
            .success { color: #28a745; }
            .error { color: #dc3545; }
            .warning { color: #ffc107; }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>🔍 WordPress Site Verification</h1>
            <p><strong>Lab Grown Diamond CVD - Health Check Report</strong></p>
    <?php
}

// Start verification
log_header("Starting WordPress Site Verification", $is_cli);

$results = [
    'passed' => 0,
    'failed' => 0,
    'warnings' => 0,
];

// Test 1: WordPress Core
log_header("1. WordPress Core", $is_cli);

if (defined('ABSPATH') && function_exists('get_bloginfo')) {
    $wp_version = get_bloginfo('version');
    log_success("WordPress is installed (Version: $wp_version)", $is_cli);
    $results['passed']++;
} else {
    log_error("WordPress core not properly loaded", $is_cli);
    $results['failed']++;
}

// Test 2: Database Connection
log_header("2. Database Connection", $is_cli);

global $wpdb;
if ($wpdb && $wpdb->check_connection()) {
    log_success("Database connection successful", $is_cli);
    $results['passed']++;
    
    // Check table prefix
    $prefix = $wpdb->prefix;
    log_info("Database table prefix: $prefix", $is_cli);
} else {
    log_error("Database connection failed", $is_cli);
    $results['failed']++;
}

// Test 3: Active Theme
log_header("3. Active Theme", $is_cli);

$current_theme = wp_get_theme();
$theme_name = $current_theme->get('Name');
$theme_version = $current_theme->get('Version');
$template = $current_theme->get('Template');

// Define expected theme name as constant at top of validation
define('EXPECTED_THEME_NAME', 'Astra Child - Lab Grown Diamond CVD');
define('EXPECTED_PARENT_THEME', 'astra');

// Check theme more specifically
$is_correct_theme = ($theme_name === EXPECTED_THEME_NAME || 
                     ($template === EXPECTED_PARENT_THEME && stripos($theme_name, 'astra') !== false && stripos($theme_name, 'child') !== false));

if ($is_correct_theme) {
    log_success("Theme: $theme_name (Version: $theme_version)", $is_cli);
    $results['passed']++;
    
    if ($template === EXPECTED_PARENT_THEME) {
        log_success("Using Astra parent theme correctly", $is_cli);
        $results['passed']++;
    } else {
        log_warning("Parent theme template: $template (expected: " . EXPECTED_PARENT_THEME . ")", $is_cli);
        $results['warnings']++;
    }
} else {
    log_warning("Expected 'Astra Child' theme, found: $theme_name", $is_cli);
    $results['warnings']++;
}

// Test 4: Essential Plugins
log_header("4. Essential Plugins", $is_cli);

$required_plugins = [
    'woocommerce/woocommerce.php' => 'WooCommerce',
    'contact-form-7/wp-contact-form-7.php' => 'Contact Form 7',
    'seo-by-rank-math/rank-math.php' => 'Rank Math SEO',
    'litespeed-cache/litespeed-cache.php' => 'LiteSpeed Cache',
];

$optional_plugins = [
    'flamingo/flamingo.php' => 'Flamingo',
    'wp-smushit/wp-smush.php' => 'Smush',
    'yith-woocommerce-wishlist/init.php' => 'YITH Wishlist',
    'wordfence/wordfence.php' => 'Wordfence Security',
    'updraftplus/updraftplus.php' => 'UpdraftPlus',
];

// Only check plugins if WordPress is loaded
// Include plugin.php if needed for is_plugin_active function
if (!function_exists('is_plugin_active') && defined('ABSPATH')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

if (function_exists('is_plugin_active')) {
    foreach ($required_plugins as $plugin_path => $plugin_name) {
        if (is_plugin_active($plugin_path)) {
            log_success("$plugin_name is active", $is_cli);
            $results['passed']++;
        } else {
            log_error("$plugin_name is not active (Required)", $is_cli);
            $results['failed']++;
        }
    }

    foreach ($optional_plugins as $plugin_path => $plugin_name) {
        if (is_plugin_active($plugin_path)) {
            log_success("$plugin_name is active", $is_cli);
            $results['passed']++;
        } else {
            log_warning("$plugin_name is not active (Optional but recommended)", $is_cli);
            $results['warnings']++;
        }
    }
} else {
    log_error("WordPress not fully loaded - cannot check plugin status", $is_cli);
    $results['failed']++;
}

// Test 5: WooCommerce Configuration
if (class_exists('WooCommerce')) {
    log_header("5. WooCommerce Configuration", $is_cli);
    
    $currency = get_woocommerce_currency();
    log_info("Store Currency: $currency", $is_cli);
    
    $shop_page_id = get_option('woocommerce_shop_page_id');
    if ($shop_page_id) {
        log_success("Shop page configured (ID: $shop_page_id)", $is_cli);
        $results['passed']++;
    } else {
        log_error("Shop page not configured", $is_cli);
        $results['failed']++;
    }
    
    // Check for payment gateways
    $gateways = WC()->payment_gateways->get_available_payment_gateways();
    if (!empty($gateways)) {
        log_success("Payment gateways available: " . count($gateways), $is_cli);
        foreach ($gateways as $gateway) {
            log_info("  - " . $gateway->get_title(), $is_cli);
        }
        $results['passed']++;
    } else {
        log_warning("No payment gateways enabled", $is_cli);
        $results['warnings']++;
    }
}

// Test 6: Essential Pages
log_header("6. Essential Pages", $is_cli);

$essential_pages = ['Home', 'Shop', 'About', 'Contact', 'Privacy Policy'];

foreach ($essential_pages as $page_title) {
    // Use get_posts instead of deprecated get_page_by_title
    $pages = get_posts([
        'post_type' => 'page',
        'title' => $page_title,
        'post_status' => 'any',
        'numberposts' => 1,
    ]);
    
    if (!empty($pages)) {
        log_success("Page exists: $page_title", $is_cli);
        $results['passed']++;
    } else {
        log_warning("Page missing: $page_title", $is_cli);
        $results['warnings']++;
    }
}

// Test 7: Permalinks
log_header("7. Permalinks", $is_cli);

$permalink_structure = get_option('permalink_structure');
if (!empty($permalink_structure)) {
    log_success("Pretty permalinks enabled: $permalink_structure", $is_cli);
    $results['passed']++;
} else {
    log_warning("Pretty permalinks not enabled (recommended)", $is_cli);
    $results['warnings']++;
}

// Test 8: Theme Assets
log_header("8. Theme Asset Files", $is_cli);

$theme_dir = get_stylesheet_directory();
$critical_assets = [
    '/assets/css/header.css',
    '/assets/css/footer.css',
    '/assets/css/custom.css',
    '/assets/js/header.js',
    '/assets/js/diamond-search.js',
    '/inc/woocommerce-customizations.php',
    '/inc/ajax-handlers.php',
    '/includes/class-lgd-automator.php',
];

foreach ($critical_assets as $asset) {
    $file_path = $theme_dir . $asset;
    if (file_exists($file_path)) {
        log_success("Asset exists: $asset", $is_cli);
        $results['passed']++;
    } else {
        log_error("Asset missing: $asset", $is_cli);
        $results['failed']++;
    }
}

// Test 9: File Permissions
log_header("9. File Permissions", $is_cli);

$writable_dirs = [
    ABSPATH . 'wp-content/uploads',
    ABSPATH . 'wp-content/cache',
];

foreach ($writable_dirs as $dir) {
    if (file_exists($dir)) {
        if (is_writable($dir)) {
            log_success("Directory writable: $dir", $is_cli);
            $results['passed']++;
        } else {
            log_error("Directory not writable: $dir", $is_cli);
            $results['failed']++;
        }
    } else {
        log_warning("Directory does not exist: $dir", $is_cli);
        $results['warnings']++;
    }
}

// Test 10: PHP Configuration
log_header("10. PHP Configuration", $is_cli);

$php_version = phpversion();
$min_php_version = '7.4';

if (version_compare($php_version, $min_php_version, '>=')) {
    log_success("PHP Version: $php_version (✓ >= $min_php_version)", $is_cli);
    $results['passed']++;
} else {
    log_error("PHP Version: $php_version (✗ < $min_php_version required)", $is_cli);
    $results['failed']++;
}

$memory_limit = ini_get('memory_limit');
log_info("PHP Memory Limit: $memory_limit", $is_cli);

$upload_max = ini_get('upload_max_filesize');
log_info("Max Upload Size: $upload_max", $is_cli);

// Summary
log_header("VERIFICATION SUMMARY", $is_cli);

$total_tests = $results['passed'] + $results['failed'] + $results['warnings'];
$pass_rate = $total_tests > 0 ? round(($results['passed'] / $total_tests) * 100) : 0;

if (!$is_cli) {
    echo "<div class='summary'>";
}

log_success("Passed: " . $results['passed'], $is_cli);
log_error("Failed: " . $results['failed'], $is_cli);
log_warning("Warnings: " . $results['warnings'], $is_cli);
log_info("Total Tests: $total_tests", $is_cli);
log_info("Pass Rate: $pass_rate%", $is_cli);

if (!$is_cli) {
    echo "</div>";
}

// Recommendations
if ($results['failed'] > 0 || $results['warnings'] > 0) {
    log_header("RECOMMENDATIONS", $is_cli);
    
    if ($results['failed'] > 0) {
        log_error("CRITICAL: " . $results['failed'] . " critical issues found. Please address them immediately.", $is_cli);
        log_info("Run the initialization script: bash wp-init.sh", $is_cli);
    }
    
    if ($results['warnings'] > 0) {
        log_warning($results['warnings'] . " warnings found. Consider addressing these for optimal performance.", $is_cli);
        log_info("See QUICK_START_GUIDE.md for detailed setup instructions", $is_cli);
    }
} else {
    log_success("All checks passed! Your WordPress installation is properly configured.", $is_cli);
}

log_header("NEXT STEPS", $is_cli);
log_info("1. Configure WooCommerce payment gateways", $is_cli);
log_info("2. Add products to your store", $is_cli);
log_info("3. Set up Contact Form 7 forms", $is_cli);
log_info("4. Configure SEO with Rank Math", $is_cli);
log_info("5. Optimize performance with LiteSpeed Cache", $is_cli);
log_info("", $is_cli);
log_info("For detailed instructions, see:", $is_cli);
log_info("  - QUICK_START_GUIDE.md", $is_cli);
log_info("  - WORDPRESS_ECOMMERCE_SETUP.md", $is_cli);

// HTML footer for browser access
if (!$is_cli) {
    ?>
        </div>
        <footer style="text-align: center; margin-top: 30px; color: #666;">
            <p>Lab Grown Diamond CVD - WordPress Site Verification v1.0.0</p>
        </footer>
    </body>
    </html>
    <?php
}

// Exit with appropriate code for CLI
if ($is_cli) {
    exit($results['failed'] > 0 ? 1 : 0);
}
