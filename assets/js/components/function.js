

import Swiper from 'swiper';
import { Pagination, Navigation, Autoplay, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import 'swiper/css/effect-fade';


(function ($) {
    "use strict";

    function initHeaderScroll() {
        let lastScrollTop = 0;
        const $headerMain = $('#site-header');
        const $headerScroll = $('#header-scroll');
        const scrollThreshold = $headerMain.outerHeight() || 100;

        $(window).on('scroll', function () {
            let scrollTop = $(this).scrollTop();

            // Detect scroll direction and prevent jitter
            if (Math.abs(lastScrollTop - scrollTop) <= 5) return;

            // Add is-scrolled when scrollY > threshold
            if (scrollTop > scrollThreshold) {
                $headerScroll.addClass('is-scrolled');
            } else {
                $headerScroll.removeClass('is-scrolled');
            }

            lastScrollTop = scrollTop;
        });
    }

    function initHeroCarousel() {
        if ($('.hero-section__carousel').length > 0) {
            new Swiper('.hero-section__carousel', {
                modules: [Pagination, Navigation, Autoplay, EffectFade],
                slidesPerView: 1,
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.hero-section .swiper-button-next',
                    prevEl: '.hero-section .swiper-button-prev',
                },
            });
        }
    }

    function initBuyerCarousel() {
        if ($('.buyer-listing-section__carousel').length > 0) {
            const isMobile = window.innerWidth < 768;
            new Swiper('.buyer-listing-section__carousel', {
                modules: [Pagination, Navigation, Autoplay],
                slidesPerView: 1.2,
                spaceBetween: 16,
                loop: true,
                autoplay: false,
                pagination: {
                    el: '.buyer-listing-section__controls .swiper-pagination',
                    type: isMobile ? 'bullets' : 'progressbar',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.buyer-listing-section__controls .swiper-button-next',
                    prevEl: '.buyer-listing-section__controls .swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2.2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 4.8,
                        spaceBetween: 30,
                    },
                },
            });
        }
    }

    $(document).ready(function () {
        initHeroCarousel();
        initHeaderScroll();
        initBuyerCarousel();
    });
})(jQuery); 