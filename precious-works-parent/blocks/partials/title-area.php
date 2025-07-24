<?php $display_title = !empty($display_title) ? $display_title : 'h2' ?>

<?php if($has_title_area) { ?>
    <section class="title-area-container container" <?php echo esc_attr($section_title ?: 'Content section'); ?> role="region">
        <div class="title-area-row row">
            <div class="title-area-col col text-center">
                <div class="title-area-content-wrapper">
                    <?php if(!empty($section_subtitle)) { ?>
                        <div class="title-wrapper">
                            <?php echo pw_seo_heading($section_title, $section_title_tag, $display_title) ?>
                        </div>
                    <?php } ?>
                    <?php if(!empty($section_subtitle)) { ?>
                        <div class="subtitle-wrapper wysiwyg">
                            <?php echo $section_subtitle; ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>