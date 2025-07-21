<?php 
include(locate_template('blocks/partials/global-block-variables.php')); 

$content = get_field('content'); ?>

<?php $has_content = !empty($content) || $has_button_area || $has_title_area;

if(!$has_content) {
    include __DIR__ . '/demo.php';
    return; 
} ?>

<section <?php echo pw_block_section_classes($block) ?>>
    <div class="cta-container container">
        <div class="cta-row row">
            <div class="cta-col col-12">
                <?php echo $section_title ?>
                <?php echo $section_subtitle ?>
                 <a 
                    href="<?php echo esc_url($section_button['url']); ?>" 
                    target="<?php echo esc_attr($section_button['target'] ?: '_self'); ?>" 
                    class="btn btn-primary"
                    aria-label="<?php echo $section_button_aria_label ?>"
                >
                    <?php echo esc_html($section_button['title']); ?>
                </a>
            </div>
        </div>
    </div>
</section>