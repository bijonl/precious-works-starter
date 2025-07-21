<?php include(locate_template('blocks/partials/global-block-variables.php')); 
$recent_posts = get_field('posts'); 

if(empty($recent_posts)) {
    $posts_args = array(
        'post_type' => 'post', 
        'fields' => 'ids', 
        'posts_per_page' => 3, 
    ); 
    $recent_posts_query = new WP_Query($posts_args); 
    $recent_posts = $recent_posts_query->posts; 
} ?>

<section <?php echo pw_block_section_classes($block) ?>>
    <?php if($has_title_area) { 
        include(locate_template('blocks/partials/title-area.php'));
    } ?>
    <?php if($recent_posts) { ?>
        <div class="recent-posts-container container">
            <div class="recent-posts-row row">
                <?php foreach($recent_posts as $post_id) { ?>
                    <div class="recent-posts-col col-12">
                        <?php include __DIR__ . '/single-post.php'; ?>
                    </div>
                <?php } ?>
            </div>
         </div>
    <?php } ?>
    <?php if($has_button_area) { 
        include(locate_template('blocks/partials/button-area.php')); 
    } ?>
</section>