<div class="footer-social-wrapper" role="navigation" aria-label="Social Media Links">
    <ul>
        <?php while(have_rows('social_media_footer', 'options')) {
            the_row(); 
            $image_type = get_sub_field('image_type'); 
            $icon = get_sub_field('icon'); 
            $social_media_type = get_sub_field('social_media_type'); 
            $link = get_sub_field('link');  ?>

            <li>
                <a 
                    href="<?php echo esc_url($link); ?>" 
                    aria-label="<?php echo esc_attr('Follow us on ' . $social_media_type); ?>" 
                    target="_blank" 
                    rel="noopener noreferrer"
                >
                    <?php 
                    if ($image_type === 'icon') {
                        // Ensure icon has aria-hidden="true" 
                        // If $icon lacks it, wrap it manually:
                        echo $icon;
                        
                    } 
                    ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
