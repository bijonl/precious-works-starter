<details class="single-accordion rounded-corners" id="<?php echo $accordion_id ?>">
    <summary 
        class="d-flex justify-content-between align-items-center"
        id="<?= $accordion_id ?>-header"
        aria-controls="<?= $accordion_id ?>-content"
        aria-expanded="false"  
    >
        <span class="mb-0 h6"><?php echo $title ?></span>
        <button>
            <?php include(locate_template('blocks/accordions/partials/accordion-button.php')); ?>
        </button>
    </summary>
    <div 
        class="accordion-content-wrapper wysiwyg"
        id="<?= $accordion_id ?>-content"
        role="region"
        aria-labelledby="<?= $accordion_id ?>-header"  
    >
        <?php echo $content ?>
    </div>
</details>    