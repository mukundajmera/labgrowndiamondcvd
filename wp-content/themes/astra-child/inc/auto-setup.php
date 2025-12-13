<?php
/**
 * Auto Setup Script
 * 
 * Automatically configures the site when the theme is activated.
 * - Creates 'Home' page if missing
 * - Sets 'Home' page template to 'LGD-Luxury Homepage'
 * - Sets 'Home' as the static front page
 */

function lgd_luxury_auto_setup()
{
    // 1. Create content for the Home page
    $home_page_title = 'Home';
    $home_page_content = '';
    $home_page_template = 'front-page.php'; // The template file name

    // Check if the page already exists
    $page_check = get_page_by_title($home_page_title);

    $home_page_id = null;

    if (!isset($page_check->ID)) {
        // Create the page
        $home_page = array(
            'post_type' => 'page',
            'post_title' => $home_page_title,
            'post_content' => $home_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
        );
        $home_page_id = wp_insert_post($home_page);
    } else {
        $home_page_id = $page_check->ID;
    }

    // 2. Assign the custom template to the page
    if ($home_page_id) {
        update_post_meta($home_page_id, '_wp_page_template', $home_page_template);

        // 3. Set "Your homepage displays" to "A static page"
        update_option('show_on_front', 'page');

        // 4. Set the "Homepage" to the page ID we just created/found
        update_option('page_on_front', $home_page_id);
    }
}

// Hook into theme activation
add_action('after_switch_theme', 'lgd_luxury_auto_setup');

// Also run it on init if the front page isn't set correct (self-healing)
function lgd_luxury_ensure_setup()
{
    if (get_option('show_on_front') != 'page' || !get_option('page_on_front')) {
        lgd_luxury_auto_setup();
    }
}
add_action('init', 'lgd_luxury_ensure_setup');
