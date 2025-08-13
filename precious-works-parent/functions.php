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
    $section_classes .= $block_name.'-section block-section '; 

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


/**
 * Returns a semantic heading with optional tag and class.
 *
 * @param string $title        The heading text.
 * @param string $tag          The HTML tag to use (e.g., 'h2', 'h3'). Defaults to 'h2'.
 * @param string $custom_class Optional CSS class(es) to apply.
 * @return string              The heading HTML or empty string if invalid.
 */
function pw_seo_heading( $title, $tag = 'h2', $custom_class = '' ) {
    if ( empty( $title ) || ! in_array( strtolower( $tag ), [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ] ) ) {
        return '';
    }

    $class_attr = $custom_class ? ' class="' . esc_attr( trim( $custom_class ) ) . '"' : '';

    return sprintf(
        '<%1$s%2$s>%3$s</%1$s>',
        esc_html( $tag ),
        $class_attr,
        esc_html( $title )
    );
}

// Remove tags support from posts
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');

/**
 * Conditionally disable Gutenberg editor.
 *
 * @param bool   $use_block_editor Whether to use Gutenberg.
 * @param WP_Post $post            The post object.
 * @return bool
 */
function my_disable_gutenberg( $use_block_editor, $post ) {
    // Example conditions:

    // 1. Disable Gutenberg for a specific page template
    if (get_page_template_slug( $post->ID ) === 'page-blog-template.php' ) {
        remove_post_type_support( 'page', 'editor' );
        return false;
        
    }

    // Otherwise, use the default editor
    return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'my_disable_gutenberg', 10, 2 );













