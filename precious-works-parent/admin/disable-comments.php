<?php // Disable comments everywhere

// Disable support for comments and trackbacks in post types
function pw_disable_comments_post_types_support() {
    foreach ( get_post_types() as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}
add_action( 'admin_init', 'pw_disable_comments_post_types_support' );



// Close comments on the front-end
function pw_disable_comments_status() {
    return false;
}
add_filter( 'comments_open', 'pw_disable_comments_status', 20, 2 );
add_filter( 'pings_open', 'pw_disable_comments_status', 20, 2 );

// Hide existing comments
function pw_disable_comments_hide_existing( $comments ) {
    return [];
}
add_filter( 'comments_array', 'pw_disable_comments_hide_existing', 10, 2 );

// Remove comments page from admin menu
function pw_disable_comments_admin_menu() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'pw_disable_comments_admin_menu' );

// Redirect any user trying to access comments page directly
function pw_disable_comments_admin_redirect() {
    global $pagenow;
    if ( $pagenow === 'edit-comments.php' ) {
        wp_safe_redirect( admin_url() );
        exit;
    }
}
add_action( 'admin_init', 'pw_disable_comments_admin_redirect' );

// Remove comments metabox from dashboard
function pw_disable_comments_dashboard() {
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'pw_disable_comments_dashboard' );

// Remove comment support from media
function pw_disable_comments_media() {
    remove_post_type_support( 'attachment', 'comments' );
}
add_action( 'init', 'pw_disable_comments_media' ); ?>