<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 🔧 Define theme version
$theme = wp_get_theme();
define( 'PW_THEME_CHILD_VERSION', $theme->get( 'Version' ) );


function pw_enqueue_scripts() {
    error_log('pw_enqueue_scripts running'); // Logs to PHP error log
    echo 'CHILD hehhhe'; // This may not output to browser at enqueue time
    // Enqueue parent style first
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/dist/css/style.min.css', [], PW_THEME_CHILD_VERSION );

    // Then enqueue child style, dependent on parent-style
    wp_enqueue_style( 'pw-style', get_stylesheet_directory_uri() . '/assets/dist/css/style.min.css', ['parent-style'], PW_THEME_CHILD_VERSION );
    
    // JS if needed
    wp_enqueue_script( 'pw-main', get_stylesheet_directory_uri() . '/assets/js/main.js', [], PW_THEME_CHILD_VERSION, true );
}


add_action( 'wp_enqueue_scripts', 'pw_enqueue_scripts', 20 );

