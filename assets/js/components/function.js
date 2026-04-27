

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

    function initCompanyFilter() {
        if ($('.company-section').length === 0) return;

        const container = $('#company-main-container');

        $(document).on('click', '.company-filter a, .company-pagination a', function(e) {
            e.preventDefault();
            
            if ($(this).hasClass('company-filter__all')) {
                $(this).siblings('.company-filter__list').addClass('is-expanded');
                $(this).hide();
            }

            const href = $(this).attr('href');
            if(!href || href === '#') return;

            const urlObj = new URL(href, window.location.href);
            const params = new URLSearchParams(urlObj.search);
            
            let paged = params.get('paged') || 1;
            const pageMatch = urlObj.pathname.match(/\/page\/(\d+)/);
            if (pageMatch) {
                paged = pageMatch[1];
            }

            const data = {
                action: 'filter_company',
                industry: params.get('industry') || '',
                region: params.get('region') || '',
                paged: paged
            };

            container.css('opacity', '0.5');

            $.post(ajax_object.ajax_url, data, function(response) {
                if(response.success) {
                    container.html(response.data);
                    
                    // Update active classes on sidebar
                    $('.company-filter__list a').removeClass('active');
                    if (data.industry) {
                        $('.company-filter__list a').each(function() {
                            if($(this).attr('href').indexOf('industry=' + data.industry) !== -1) {
                                $(this).addClass('active');
                            }
                        });
                    }
                    if (data.region) {
                        $('.company-filter__list a').each(function() {
                            if($(this).attr('href').indexOf('region=' + data.region) !== -1) {
                                $(this).addClass('active');
                            }
                        });
                    }
                    
                    window.history.pushState({}, '', href);
                    
                    $('html, body').animate({
                        scrollTop: $('.company-section').offset().top - 100
                    }, 500);
                }
                container.css('opacity', '1');
            }).fail(function() {
                container.css('opacity', '1');
            });
        });
    }

    $(document).ready(function () {
        initHeroCarousel();
        initHeaderScroll();
        initBuyerCarousel();
        initCompanyFilter();
    });
})(jQuery); 