<?php /**
 * Register Custom Block Category and Blocks
 * -----------------------------------------
 * This file adds a custom block category and registers blocks for use in the editor.
 *
 * @link https://developer.wordpress.org/block-editor/reference-guides/filters/block-filters/#block_categories_all
 * @link https://developer.wordpress.org/reference/functions/register_block_type/
 */

// 🧱 Register Custom Block Category
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
            ],
        ],
        $categories
    );
}

// 🧩 Register Blocks
// 🧩 Register Blocks
function pw_register_default_blocks() {
    include(locate_template('includes/block-registration-variables.php')); 

    foreach ( $default_blocks as $block_slug => $block_data ) {
        $child_template  = get_stylesheet_directory() . '/blocks/' . $block_slug . '/render.php';
        $parent_template = get_template_directory() . '/blocks/' . $block_slug . '/render.php';

        // Debugging: log paths
        error_log("Checking block: $block_slug");
        error_log("Child path: $child_template " . ( file_exists($child_template) ? '[FOUND]' : '[MISSING]' ));
        error_log("Parent path: $parent_template " . ( file_exists($parent_template) ? '[FOUND]' : '[MISSING]' ));

        // Pick render template
        $render_template = file_exists($child_template) ? $child_template : $parent_template;

        // Extra safeguard: log chosen template
        error_log("Using template for $block_slug: $render_template");

        acf_register_block_type([
            'name'            => $block_slug,
            'title'           => $block_data['label'],
            'description'     => !empty($block_data['description']) ? $block_data['description'] : '' , 
            'category'        => 'precious-works-blocks',
            'icon'            => $block_data['icon'],
            'render_template' => $render_template,
            'mode'            => 'preview',
            'supports'        => [
                'anchor' => true,
            ],
        ]);
    }
}



function pw_limit_allowed_blocks( $allowed_blocks, $editor_context ) {
    global $default_blocks;
    include(locate_template('includes/block-registration-variables.php')); 

    // Your ACF blocks using the "acf/" prefix
    $acf_blocks = array_map( function( $slug ) {
        return 'acf/' . $slug;
    }, array_keys( $default_blocks ) );

    return array_merge( $allowed_core_blocks, $acf_blocks );
} ?>
