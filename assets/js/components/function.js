

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

        $(document).on('click', '.company-filter a, .company-pagination a', function (e) {
            e.preventDefault();

            if ($(this).hasClass('company-filter__all')) {
                $(this).siblings('.company-filter__list').addClass('is-expanded');
                $(this).hide();
            }

            const href = $(this).attr('href');
            if (!href || href === '#') return;

            const urlObj = new URL(href, window.location.href);
            const params = new URLSearchParams(urlObj.search);

            const isFilter = $(this).closest('.company-filter').length > 0;
            let paged = 1;
            let finalHref = href;

            if (isFilter) {
                paged = 1;
                // For filters, we ensure we reset to page 1 by stripping any pagination from the current path
                const cleanPath = window.location.pathname.replace(/\/page\/\d+\/?$/, '/');
                const cleanUrl = new URL(href, window.location.origin + cleanPath);
                finalHref = cleanUrl.pathname + cleanUrl.search;
            } else {
                // Pagination click
                paged = params.get('paged') || 1;
                const pageMatch = urlObj.pathname.match(/\/page\/(\d+)/);
                if (pageMatch) {
                    paged = pageMatch[1];
                }
                finalHref = href;
            }

            const data = {
                action: 'filter_company',
                industry: params.get('industry') || '',
                region: params.get('region') || '',
                paged: paged
            };

            container.css('opacity', '0.5');

            $.post(ajax_object.ajax_url, data, function (response) {
                if (response.success) {
                    // Update results list
                    container.html(response.data.html);

                    // Update per-industry counts in the sidebar
                    const counts = response.data.industry_counts || {};
                    Object.keys(counts).forEach(function (slug) {
                        const $li = $('.company-filter__list li[data-industry="' + slug + '"]');
                        if ($li.length) {
                            const $a = $li.find('> a');
                            const count = counts[slug].count;

                            // Replace only the count portion "(N)" at the end of the link text
                            $a.text($a.text().replace(/\(\d+\)$/, '(' + count + ')'));

                            // Toggle disabled state
                            if (count === 0) {
                                $li.addClass('is-empty');
                                $a.attr({ href: '#', 'aria-disabled': 'true', tabindex: '-1' });
                            } else {
                                $li.removeClass('is-empty');
                                $a.attr({ href: '?industry=' + slug + (data.region ? '&region=' + data.region : ''), 'aria-disabled': null, tabindex: null });
                                $a.removeAttr('aria-disabled tabindex');
                            }
                        }
                    });

                    // Update active classes on sidebar
                    $('.company-filter__list a').removeClass('active');
                    $('.company-filter__list a').each(function () {
                        const h = $(this).attr('href');
                        if (!h || h === '#') return;
                        
                        const urlObj = new URL(h, window.location.href);
                        const params = new URLSearchParams(urlObj.search);
                        
                        if (h.startsWith('?industry=')) {
                            if (data.industry && params.get('industry') === data.industry) {
                                $(this).addClass('active');
                            }
                        } else if (h.startsWith('?region=')) {
                            if (data.region && params.get('region') === data.region) {
                                $(this).addClass('active');
                            }
                        }
                    });

                    window.history.pushState({}, '', finalHref);

                    $('html, body').animate({
                        scrollTop: $('.company-section').offset().top - 100
                    }, 500);
                }
                container.css('opacity', '1');
            }).fail(function () {
                container.css('opacity', '1');
            });
        });
    }


    function initBackToTop() {
        const $btnTop = $('.btn-top');
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 100) {
                $btnTop.addClass('is-visible');
            } else {
                $btnTop.removeClass('is-visible');
            }
        });

        $btnTop.on('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    $(document).ready(function () {
        initHeroCarousel();
        initHeaderScroll();
        initBuyerCarousel();
        initCompanyFilter();
        initBackToTop();
    });
})(jQuery); 