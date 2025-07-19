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
    error_log('made it here'); 
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

$default_blocks = array(
    'accordions' => [
        'label' => 'Accordions',
        'icon'  => 'arrow-down-alt2',
    ],
    'cta' => [
        'label' => 'Call To Action',
        'icon'  => 'megaphone',
    ],
    'form-block' => [
        'label' => 'Form Block',
        'icon'  => 'feedback',
    ],
    'general-content' => [
        'label' => 'General Content',
        'icon'  => 'text',
    ],
    'homepage-hero' => [
        'label' => 'Homepage Hero',
        'icon'  => 'cover-image',
    ],
    'image-slider' => [
        'label' => 'Image Slider',
        'icon'  => 'images-alt2',
    ],
    'interior-hero' => [
        'label' => 'Interior Hero',
        'icon'  => 'format-image',
    ],
    'photo-divider' => [
        'label' => 'Photo Divider',
        'icon'  => 'camera',
    ],
    'recent-posts' => [
        'label' => 'Recent Posts',
        'icon'  => 'admin-post',
    ],
    'reviews' => [
        'label' => 'Reviews',
        'icon'  => 'star-filled',
    ],
    'two-col-img-text' => [
        'label' => 'Two Column Image & Text',
        'icon'  => 'columns',
    ],
    'wildcards' => [
        'label' => 'Wildcards',
        'icon'  => 'screenoptions',
    ],
);

// 🧩 Register Blocks
function pw_register_default_blocks() {
    global $default_blocks;

    foreach ( $default_blocks as $block_slug => $block_data ) {
        acf_register_block_type([
            'name'            => $block_slug,
            'title'           => $block_data['label'],
            'category'        => 'precious-works-blocks',
            'icon'            => $block_data['icon'],
            'render_template' => get_template_directory() . '/blocks/' . $block_slug . '/render.php',
            'mode'            => 'preview',
            'supports'        => [
                'anchor' => true,
            ],
        ]);
    }
}


function pw_limit_allowed_blocks( $allowed_blocks, $editor_context ) {
    error_log('made it to Allowed here'); 
    global $default_blocks;

    // Core blocks you want to allow
    $allowed_core_blocks = array(
        'core/paragraph',
        'core/heading',
        'core/list',
        'core/separator',
        'core/spacer',
    );

    // Your ACF blocks using the "acf/" prefix
    $acf_blocks = array_map( function( $slug ) {
        return 'acf/' . $slug;
    }, array_keys( $default_blocks ) );

    return array_merge( $allowed_core_blocks, $acf_blocks );
} ?>
