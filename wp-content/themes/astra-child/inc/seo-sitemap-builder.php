<?php
/**
 * Dynamic XML Sitemap & Route Canonicalization Module
 * 
 * @package Astra Child Diamond
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add custom rewrite rule for the XML sitemap
 */
function lgd_add_sitemap_rewrite_rule() {
    add_rewrite_rule('^diamond-sitemap\.xml$', 'index.php?lgd_sitemap=1', 'top');
}
add_action('init', 'lgd_add_sitemap_rewrite_rule');

/**
 * Register custom query variable for the sitemap
 */
function lgd_sitemap_query_vars($vars) {
    $vars[] = 'lgd_sitemap';
    return $vars;
}
add_filter('query_vars', 'lgd_sitemap_query_vars');

/**
 * Render the XML sitemap when the query var is detected
 */
function lgd_render_sitemap() {
    if (get_query_var('lgd_sitemap')) {
        // Output headers
        header('Content-Type: text/xml; charset=utf-8');
        
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        $urls = array();

        // 1. Get all published products
        $products = get_posts(array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids' // Only get IDs to save memory
        ));
        
        foreach ($products as $post_id) {
            $urls[] = array(
                'loc'     => get_permalink($post_id),
                'lastmod' => get_the_modified_time('c', $post_id)
            );
        }

        // 2. Get educational content guide pages (post type from custom-post-types.php)
        $educational_posts = get_posts(array(
            'post_type'      => 'educational_content',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids'
        ));

        foreach ($educational_posts as $post_id) {
            $urls[] = array(
                'loc'     => get_permalink($post_id),
                'lastmod' => get_the_modified_time('c', $post_id)
            );
        }

        // 3. Get product categories
        $categories = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true
        ));

        if (!is_wp_error($categories)) {
            foreach ($categories as $category) {
                $urls[] = array(
                    'loc'     => get_term_link($category),
                    // Terms don't have native lastmod, using current time as fallback
                    'lastmod' => gmdate('c')
                );
            }
        }

        // 4. Get diamond catalog attributes (custom taxonomies from diamond-filters.php)
        $diamond_taxonomies = array('diamond_shape', 'diamond_color', 'diamond_clarity', 'diamond_cut');
        foreach ($diamond_taxonomies as $taxonomy) {
            if (taxonomy_exists($taxonomy)) {
                $terms = get_terms(array(
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => true
                ));

                if (!is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $urls[] = array(
                            'loc'     => get_term_link($term),
                            'lastmod' => gmdate('c')
                        );
                    }
                }
            }
        }

        // Output URLs
        foreach ($urls as $url) {
            if (!empty($url['loc']) && !is_wp_error($url['loc'])) {
                echo "\t<url>\n";
                echo "\t\t<loc>" . esc_url($url['loc']) . "</loc>\n";
                if (!empty($url['lastmod'])) {
                    echo "\t\t<lastmod>" . esc_html($url['lastmod']) . "</lastmod>\n";
                }
                echo "\t</url>\n";
            }
        }

        echo '</urlset>';
        exit;
    }
}
add_action('template_redirect', 'lgd_render_sitemap');

/**
 * Inject Canonical Link and normalize domains & pagination
 */
function lgd_inject_canonical_link() {
    // Remove standard canonical
    remove_action('wp_head', 'rel_canonical');
    
    // Rank Math compatibility
    add_filter('rank_math/frontend/canonical', '__return_false');

    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

    // Use home_url() to prevent Host Header Injection
    $home_url = home_url($uri);

    // Normalize domain: remove 'www.' to force apex domain from the home_url
    $current_url = preg_replace('#^(https?://)www\.#i', '$1', $home_url);

    // Remove pagination (/page/X/ or ?paged=X) for canonicals to point to root page if needed
    // "pagination cleanup"
    $canonical_url = preg_replace('#/page/[0-9]+/?#i', '/', $current_url);
    
    // Parse URL to remove specific query parameters
    $parsed_url = wp_parse_url($canonical_url);
    
    // Reconstruct base domain and path
    $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
    $host_part = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    $port = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
    $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    
    $clean_url = $scheme . $host_part . $port . $path;
    
    // Rebuild query string excluding pagination
    if (!empty($parsed_url['query'])) {
        parse_str($parsed_url['query'], $query_args);
        if (isset($query_args['paged'])) {
            unset($query_args['paged']);
        }
        if (!empty($query_args)) {
            $clean_url .= '?' . http_build_query($query_args);
        }
    }
    
    echo '<link rel="canonical" href="' . esc_url($clean_url) . '" />' . "\n";
}
add_action('wp_head', 'lgd_inject_canonical_link', 1);
