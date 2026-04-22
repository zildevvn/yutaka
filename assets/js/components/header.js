(function ($) {
  "use strict";



  $(window).on("load", function () {

  })

  // Mobile Menu Functions
  function initMobileMenu() {
    const $hamburgerBtn = $('.humberger-btn');
    const $closeBtn = $('.menu-close-btn');
    const $overlay = $('.mobile-menu-overlay');
    const $body = $('body');

    function toggleMobileMenu(e) {
      if (e) e.preventDefault();

      const isOpen = $overlay.hasClass('is-active');

      if (isOpen) {
        $overlay.removeClass('is-active');
        $hamburgerBtn.removeClass('is-active');
        $body.css('overflow', '');
      } else {
        $overlay.addClass('is-active');
        $hamburgerBtn.addClass('is-active');
        $body.css('overflow', 'hidden'); // Prevent background scrolling
      }
    }

    $hamburgerBtn.on('click', toggleMobileMenu);
    $closeBtn.on('click', toggleMobileMenu);
  }

  $(document).ready(function () {
    initMobileMenu();
  });

})(jQuery);
