<a href="<?php echo $permalink; ?>" class="single-post-link" aria-label="Read more about <?php echo esc_attr($title); ?>">
    <div class="single-post-tile">
        <div class="single-post-image-wrapper">
            <?php echo $featured_image ? 
            $featured_image : 
            wp_get_attachment_image($default_blog_image, 'full', false, array('class' => 'w-100 h-auto')) ?>
        </div>
        <div class="single-post-title-wrapper">
            <h4><?php echo $title ?></h4>
        </div>
        <?php if (!empty($terms)) { ?>
            <div class="term-wrapper">
                <?php foreach ($terms as $term) {
                    if ($term->term_id === 1) continue;
                    echo esc_html($term->name); 
                } ?>
            </div>
        <?php } ?>
        <div class="single-post-date-wrapper">
            <p><?php echo $publish_date ?></p>
        </div>
    </div>
</a>