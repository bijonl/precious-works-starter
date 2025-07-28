<?php $site_logo = get_field('site_logo', 'options'); 
$image_alt = get_post_meta($site_logo, '_wp_attachment_image_alt', TRUE);
$site_name = get_site_option('blogname'); 

?>


<header id="site-header" class="site-header">
    <div class="site-header-container container">
        <div class="site-header-row row">
            <div class="site-header-logo-col col-sm-4">
                <?php include(locate_template('components/header-navigation/partials/header-logo.php')); ?>
            </div>
            <div class="header-menu-col col-sm-8">
                <?php include(locate_template('components/header-navigation/partials/header-menu.php')); ?>
            </div>
        </div>
    </div>
</header><!-- #masthead -->