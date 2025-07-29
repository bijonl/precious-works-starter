<?php 
wp_footer(); 
$social_media_footer = get_field('social_media_footer', 'options');
$footer_logo = get_field('footer_logo', 'options');
?>

<footer class="site-footer" role="contentinfo">
    <div class="site-footer-content-container container">
        <div class="site-footer-content-row row">
            <div class="footer-logo-col col-sm-2">
                <?php include locate_template('components/footer/footer-logo.php'); ?>
            </div>
            <?php if (have_rows('social_media_footer', 'options')) { ?>
                <nav class="footer-social-col col-sm-5" role="navigation" aria-label="Social Media Links">
                    <?php include locate_template('components/footer/social-icons.php'); ?>
                </nav>
            <?php }; ?>
            <div class="footer-copyright-col col-sm-5">
                <div class="copyright-wrapper">
                    <p>&copy; <?php echo date('Y'); ?> Your Company. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
