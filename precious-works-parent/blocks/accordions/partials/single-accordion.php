<details class="single-accordion rounded-corners">
    <summary class="d-flex justify-content-between">
        <h6 class="mb-0"><?php echo $title ?></h6>
        <button>
            <?php include(locate_template('blocks/accordions/partials/accordion-button.php')); ?>
        </button>
    </summary>
    <div class="accordion-content-wrapper wysiwyg">
        <?php echo $content ?>
    </div>
</details>    