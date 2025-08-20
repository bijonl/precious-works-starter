<?php
/**
 * Theme Functions File
 * --------------------
 * This file sets up theme defaults and loads core functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 🔧 Define theme version
$theme = wp_get_theme();
define( 'PW_THEME_VERSION', $theme->get( 'Version' ) );

require_once get_template_directory() . '/admin/config.php';
require_once get_template_directory() . '/includes/blocks.php';
require_once get_template_directory() . '/includes/theme-helper-functions.php';
require_once get_template_directory() . '/includes/init.php';
require_once get_template_directory() . '/includes/acf-options.php';
require_once get_template_directory() . '/includes/custom-post-types/reviews.php';


/**
 * Theme setup
 */
function pw_theme_setup() {
    // Register nav menus
    pw_register_theme_setup();

    // Register nav menus
    pw_register_nav_menus();
}
add_action( 'after_setup_theme', 'pw_theme_setup' );

/**
 * Register block editor filters
 */
function pw_register_block_filters() {
    if ( function_exists( 'pw_limit_allowed_blocks' ) ) {
        add_filter( 'allowed_block_types_all', 'pw_limit_allowed_blocks', 10, 2 );
    }

    if ( function_exists( 'pw_register_block_category' ) ) {
        add_filter( 'block_categories_all', 'pw_register_block_category', 10, 2 );
    }
}
add_action( 'init', 'pw_register_block_filters' );

/**
 * Register ACF blocks
 */

if ( function_exists( 'pw_register_default_blocks' ) ) {
    add_action( 'acf/init', 'pw_register_default_blocks' );
}

/**
 * Filter the path where ACF saves JSON files.
 *
 * By default, ACF saves JSON to the theme folder. This function sets it
 * to a dedicated 'acf-json' folder in the current theme/child theme.
 *
 * @param string $path The default save path.
 * @return string      Custom path to save ACF JSON.
 */
function pw_acf_save_json_path( $path ) {
    // Set custom save path for ACF JSON
    return get_stylesheet_directory() . '/acf-json';
}
// Apply filter for saving ACF JSON
add_filter( 'acf/settings/save_json', 'pw_acf_save_json_path' );


/**
 * Filter the paths from which ACF loads JSON files.
 *
 * Clears the default paths and sets a custom 'acf-json' folder
 * in the current theme/child theme.
 *
 * @param array $paths Array of default load paths.
 * @return array       Array containing only the custom load path.
 */
function pw_acf_load_json_paths( $paths ) {
    // Clear default paths
    $paths = [];

    // Add custom load path
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
}
// Apply filter for loading ACF JSON
add_filter( 'acf/settings/load_json', 'pw_acf_load_json_paths' );


add_filter( 'gform_tabindex', '__return_false' );
add_filter( 'gform_confirmation_anchor', '__return_false' );
add_filter( 'gform_autofocus', '__return_false' );












