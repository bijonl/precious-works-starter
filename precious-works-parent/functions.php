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
 * Register Custom Block Category and Blocks
 * -----------------------------------------
 * This file adds a custom block category and registers blocks for use in the editor.
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#block_categories_all
 * @link https://developer.wordpress.org/reference/functions/register_block_type/
 */

// 🧱 Register Custom Block Category
if ( ! function_exists( 'pw_register_block_category' ) ) {
    /**
     * Adds a custom block category named "Precious Works".
     *
     * @param array $categories The existing block categories.
     * @param WP_Post $post The current post being edited.
     * @return array Modified categories array.
     */
    function pw_register_block_category( $categories, $post ) {
        return array_merge(
            [
                [
                    'slug'  => 'precious-works-blocks',
                    'title' => __( 'Precious Works Blocks', 'preciousworks' ),
                    'icon'  => null, // Optional
                ],
            ],
            $categories
        );
    }
    add_filter( 'block_categories', 'pw_register_block_category', 10, 2 );
}


$default_blocks = [
    // 'accordions'      => 'Accordions',
    // 'cta'             => 'Call To Action',
    // 'form-block'      => 'Form Block',
    // 'general-content' => 'General Content',
    // 'homepage-hero'   => 'Homepage Hero',
    // 'image-slider'    => 'Image Slider',
    // 'interior-hero'   => 'Interior Hero',
    // 'photo-divider'   => 'Photo Divider',
    'recent-posts'    => 'Recent Posts',
    'reviews'         => 'Reviews',
    // 'two-col-img-text'=> 'Two Column Image & Text',
    // 'wildcards'       => 'Wildcards',
];




// 🧩 Register Blocks
if ( ! function_exists( 'pw_register_default_blocks' ) ) {
    /**
     * Registers custom Gutenberg blocks from the theme.
     *
     * @return void
     */
    function pw_register_default_blocks() {
        global $default_blocks;

        foreach ( $default_blocks as $block_slug => $block_label ) {

            $shared_args = array(
                'title' => $block_label,       // use your label here
                'category' => 'precious-works-blocks',
                'supports' => array(
                    'anchor' => true,
                ),
            );

            register_block_type( __DIR__ . '/blocks/' . $block_slug, $shared_args );
        }
    }
    add_action( 'init', 'pw_register_default_blocks' );
}











