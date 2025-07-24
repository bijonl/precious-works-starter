<div class="button-area-wrapper">
    <a 
        href="<?php echo esc_url($section_button['url']); ?>" 
        target="<?php echo esc_attr($section_button['target'] ?: '_self'); ?>" 
        class="pw-solid-button"
        aria-label="<?php echo $section_button_aria_label ?>"
    >
        <?php echo esc_html($section_button['title']); ?>
    </a>
</div>