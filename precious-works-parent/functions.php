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
require_once get_template_directory() . '/includes/init.php';

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

// Save ACF JSON to acf-json folder
add_filter('acf/settings/save_json', function( $path ) {
    return get_stylesheet_directory() . '/acf-json';
});

// Load ACF JSON from acf-json folder
add_filter('acf/settings/load_json', function( $paths ) {
    // clear default
    $paths = [];
    // add custom path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});













