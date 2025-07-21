<a 
    href="<?php echo esc_url($section_button['url']); ?>" 
    target="<?php echo esc_attr($section_button['target'] ?: '_self'); ?>" 
    class="btn btn-primary"
    aria-label="<?php echo $section_button_aria_label ?>"
>
    <?php echo esc_html($section_button['title']); ?>
</a>