<?php $wildcards = get_field('wildcards');
include(locate_template('blocks/partials/global-block-variables.php')); ?>

<?php $has_content = have_rows('wildcards') || $has_button_area || $has_title_area;

if(!$has_content) {
    include __DIR__ . '/demo.php';
    return; 
} 
 ?>

<section <?php echo pw_block_section_classes($block) ?>>
    <?php include(locate_template('blocks/partials/title-area.php')); ?> 
    <div class="wildcards-container container">
        <div class="wildcards-row row row-cols-4" role="list">
                <?php if(have_rows('wildcards')) {
                    while(have_rows('wildcards')) {
                        the_row(); 
                        $title = get_sub_field('title'); 
                        $image = get_sub_field('image'); 
                        $icon = get_sub_field('icon'); 
                        $button = get_sub_field('button'); 
                        $image_type = get_sub_field('image_type'); 
                        $content = get_sub_field('content'); 
                        $wildcard_id = 'wildcard-'.get_row_index(); 
                        ?>
                        <div class="wildcards-col col mx-auto text-center" role="listitem">
                        <?php include(locate_template('blocks/wildcards/partials/single-wildcard.php'));  ?>
                        </div>     
                <?php   
                    }
                } ?>
            </div>
        </div>
        <div class="button-row row">
            <div class="button-col mx-auto text-center">
                <?php include(locate_template('blocks/partials/button-area.php')); ?>
            </div>
        </div>   
    </div>
</section>

