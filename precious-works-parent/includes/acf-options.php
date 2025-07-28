<?php add_action('acf/init', function() {
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_sub_page(array(
        'page_title'    => 'Header Navigation Settings',
        'menu_title'    => 'Header Settings',
        'parent_slug'   => 'themes.php',
    ));
  }
}); ?>