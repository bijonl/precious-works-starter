<?php /**
 * Unregister the built-in 'post_tag' taxonomy from posts.
 *
 * This removes the Tags meta box and disables tags for posts.
 */
function pw_unregister_post_tags() {
    // Remove 'post_tag' taxonomy from the 'post' post type
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
// Hook into 'init' to unregister tags after WordPress registers taxonomies
add_action( 'init', 'pw_unregister_post_tags' ); 