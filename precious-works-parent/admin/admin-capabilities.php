<?php function pw_restrict_admin_menu() {
    // Check if current user is NOT the super admin
    if ( ! current_user_can( 'manage_options' ) || get_current_user_id() !== 1 ) {

        // Remove Theme Editor
        remove_submenu_page( 'themes.php', 'theme-editor.php' );
        remove_submenu_page( 'themes.php', 'themes.php' );
        remove_submenu_page( 'themes.php', 'site-editor.php' );



        // Remove Plugin Editor
        remove_submenu_page( 'plugins.php', 'plugin-editor.php' );

        // Remove ACF menu
        remove_menu_page( 'edit.php?post_type=acf-field-group' );
    }
}
add_action( 'admin_menu', 'pw_restrict_admin_menu', 999 );

/**
 * Hide dangerous admin menus for non-super-admins
 */
