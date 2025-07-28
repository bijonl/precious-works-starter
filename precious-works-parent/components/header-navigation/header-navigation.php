<?php $site_logo = get_field('site_logo', 'options'); 
$image_alt = get_post_meta($site_logo, '_wp_attachment_image_alt', TRUE);
$site_name = get_site_option('blogname'); 

?>


<header id="site-header" class="site-header">
    <div class="site-header-container container">
        <div class="site-header-row row">
            <div class="site-header-logo-col col-sm-4 ">
                <div class="site-brand-logo-wrapper d-flex">
                    <?php include(locate_template('components/header-navigation/partials/header-logo.php')); ?>
                    <div class="mobile-button-wrapper d-md-none">
                        Button
                    </div>
                </div>
            </div>
            <div class="desktop-menu header-menu-col col-sm-8">
                <?php include(locate_template('components/header-navigation/partials/header-menu.php')); ?>
            </div>

            <div class="mobile-menu header-menu-col">
                Mobile Menu
                <?php include(locate_template('components/header-navigation/partials/header-menu.php')); ?>
            </div>
        </div>
    </div>
</header><!-- #masthead -->