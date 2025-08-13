 <div class="single-blog-hero-container container">
    <div class="single-blog-hero-row row">
        <div class="single-blog-hero-col col">
            <div class="title-wrapper">
                <h1><?php echo $title ?></h1>
            </div>
            <div class="author-wrapper">
                <p><?php echo $author_display_name ?></p>
            </div>

            <div class="date-wrapper">
                <?php echo $publish_date ?>
            </div>
            <?php if (!empty($terms)) { ?>
                <div class="term-wrapper">
                    <?php foreach ($terms as $term) {
                        if ($term->term_id === 1) continue;
                        echo esc_html($term->name); 
                    } ?>
                </div>
            <?php } ?>
            <div class="blog-image-wrapper">
                <?php echo $featured_image ? 
                $featured_image : 
                wp_get_attachment_image($default_blog_image, 'full', array('class' => 'w-100 h-auto')) ?>
            </div>
        </div>
    </div>
</div>