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


function pw_block_section_classes($block, $role="region") {
    $section_classes = 'pw-section '; 
    $block_name = str_replace(' ', '-', strtolower($block['title'])); 
    $section_classes .= $block_name.'-section '; 

    if(!empty( $block['data']['top_section_padding'])) {
        $padding_class_top = $block['data']['top_section_padding'] === 'none' ? 'pt-0' : 'padding-standard'; 
        $section_classes .= $padding_class_top .' '; 

    } 

    if(!empty( $block['data']['bottom_section_padding'])) {
        $padding_class_bottom = $block['data']['bottom_section_padding'] === 'none' ? 'pb-0' : 'padding-standard'; 
        $section_classes .= $padding_class_bottom .' '; 
    } 

     if(!empty( $block['data']['section_background_color'])) {
        $section_classes .= 'background-'.$block['data']['section_background_color'].' '; 
    } 
    
    $section_aria_label = $block['title'];

    if ( !empty( $block['data']['section_aria_label'] ) ) {
        $section_aria_label = $block['data']['section_aria_label'];
    } elseif ( !empty( $block['data']['section_title'] ) ) {
        $section_aria_label = $block['data']['section_title'];
    }

    $section_id = !empty($block['anchor']) ? esc_attr($block['anchor']) : esc_attr($block_name.'-'.$block['id']);
    
    $section_class_string = 'class="'.$section_classes.'"'; 
    $section_id_string = 'id="'.$section_id.'"'; 

    $section_ada_string = 'role="'.$role.'"'; 
    $section_ada_string .= 'aria-label="'.$section_aria_label.'"'; 

    return $section_class_string.' '.$section_id_string.' '.$section_ada_string; 
}












