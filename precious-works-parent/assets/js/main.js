console.log('HELLO JS HELLO JS'); 

document.querySelectorAll('.single-accordion').forEach(details => {
  const summary = details.querySelector('summary');

  // Initialize aria-expanded on page load
  summary.setAttribute('aria-expanded', details.hasAttribute('open'));

  // Listen for toggle event (native to <details>)
  details.addEventListener('toggle', () => {
    summary.setAttribute('aria-expanded', details.hasAttribute('open'));
  });
});


document.addEventListener("scroll", function () {
  const header = document.querySelector("header.site-header"); // adjust selector if needed
  if (!header) return;

  if (window.scrollY > 0) {
    header.classList.add("is-scrolling");
  } else {
    header.classList.remove("is-scrolling");
  }
});
