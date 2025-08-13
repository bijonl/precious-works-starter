<?php include(locate_template('components/variables/post-variables.php')); ?>

<div class="single-post-tile">
    <div class="single-post-image-wrapper">
        <?php echo $featured_image ? $featured_image : $default_blog_image ?>
    </div>
    <div class="single-post-title-wrapper">
        <h4><?php echo $title ?></h4>
    </div>
    <div class="single-post-date-wrapper">
        <p><?php echo $publish_date ?></p>
    </div>
</div>