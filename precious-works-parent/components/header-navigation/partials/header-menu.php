 <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Main Header Navigation">
    <?php 
    wp_nav_menu( array(
        'theme_location' => 'Primary Menu', 
        'menu' => '2', 
        'container_id' => 'main-header-nav-menu',
        'fallback_cb'     => false, // avoid dumping all pages without a menu
    ) );
    ?>
</nav>