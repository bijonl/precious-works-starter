<section class="your-block-classes <?php echo pw_block_section_classes($block) ?>">
  <div class="title-area-container container" aria-label="FAQs Section">
    <div class="title-area-row row">
      <div class="title-area-col col text-center">
        <div class="title-area-content-wrapper">
          <div class="title-wrapper">
            <h2>Frequently Asked Questions</h2>
          </div>
          <div class="subtitle-wrapper">
            <p>Here's everything you need to know before getting started.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="accordions-container container">
    <div class="accordions-row row">
      <div class="accordions-col col-sm-8 mx-auto">
        
        <details class="single-accordion rounded-corners" id="accordion-1">
          <summary 
            class="d-flex justify-content-between align-items-center"
            id="accordion-1-header"
            aria-controls="accordion-1-content"
            aria-expanded="false"
          >
            <span class="mb-0 h6">What is your refund policy?</span>
            <button type="button" aria-hidden="true" tabindex="-1">
              <svg aria-hidden="true">…</svg>
            </button>
          </summary>
          <div 
            class="accordion-content-wrapper wysiwyg"
            id="accordion-1-content"
            role="region"
            aria-labelledby="accordion-1-header"
          >
            <p>We offer a full refund within 30 days of purchase, no questions asked.</p>
          </div>
        </details>

        <details class="single-accordion rounded-corners" id="accordion-2">
          <summary 
            class="d-flex justify-content-between align-items-center"
            id="accordion-2-header"
            aria-controls="accordion-2-content"
            aria-expanded="false"
          >
            <span class="mb-0 h6">Do I need a developer to install this?</span>
            <button type="button" aria-hidden="true" tabindex="-1">
              <svg aria-hidden="true">…</svg>
            </button>
          </summary>
          <div 
            class="accordion-content-wrapper wysiwyg"
            id="accordion-2-content"
            role="region"
            aria-labelledby="accordion-2-header"
          >
            <p>Nope! Everything installs with a single click and is beginner friendly.</p>
          </div>
        </details>

      </div>
    </div>

    <div class="button-row row">
      <div class="button-col col-sm-8 mx-auto text-center">
        <a href="/contact" class="btn btn-primary">Still have questions?</a>
      </div>
    </div>
  </div>
</section>
