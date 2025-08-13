 <?php if(!empty($blog_intro)) { ?>
    <div class="post-excerpt">
        <?php echo $blog_intro ?>
    </div>
<?php } ?>
<div class="post-content">
    <?php the_content() ?>
</div>