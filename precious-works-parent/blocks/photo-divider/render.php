<?php $image = get_field('image'); ?>

<?php $has_content = !empty($image);

if(!$has_content) {
    include __DIR__ . '/demo.php';
    return; 
} ?>

<?php print_r($block['data']['section_aria_label']); 



?>





<section <?php echo pw_block_section_classes($block) ?>>
    <div class="photo-divider-container">
      <div class="photo-divider-row">
        <div class="photo-divider-col">
            <?php echo wp_get_attachment_image($image, 'full', false, array('class' => 'w-100 h-auto')) ?>
        </div>
      </div>
    </div>
</section>