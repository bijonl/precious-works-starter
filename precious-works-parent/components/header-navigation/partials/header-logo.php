<div class="site-brand-logo" style="width: 65px">
    <a href="" aria-label="go to homepage">
        <?php echo wp_get_attachment_image($site_logo, 
        'full', 
        false, 
        array('alt' => !empty($image_alt) ? $image_alt : $site_name.' logo' , 'class' => 'w-100 h-auto'))?>
    </a>
</div>