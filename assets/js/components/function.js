

import Swiper from 'swiper';
import { Pagination, Navigation, Autoplay, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';
import 'swiper/css/effect-fade';


(function ($) {
    "use strict";

    function initIframeResize() {
        window.addEventListener('message', function (e) {
            // Adjust the height depending on the message format from the iframe
            if (e.data) {
                let newHeight = null;

                // Typical iframe resizer message format
                if (typeof e.data === 'string' && e.data.indexOf('iframeHeight') !== -1) {
                    try {
                        const parsed = JSON.parse(e.data);
                        newHeight = parsed.iframeHeight || parsed.height;
                    } catch (error) { }
                } else if (typeof e.data === 'object' && e.data.height) {
                    newHeight = e.data.height;
                } else if (typeof e.data === 'string' && !isNaN(e.data)) {
                    newHeight = e.data;
                } else if (e.data.type === 'setHeight' && e.data.height) {
                    newHeight = e.data.height;
                }

                if (newHeight) {
                    $('.event-list').css('height', newHeight + 'px');
                    $('.event-list iframe').css('height', newHeight + 'px');
                }
            }
        });
    }

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

    function initMarquee() {
        const $marquees = $('.partners-section__marquee, .logos-section__marquee, .text-marquee');
        $marquees.each(function () {
            const $this = $(this);
            // Duplicate the content to allow for a seamless infinite scroll loop
            const content = $this.html();
            $this.append(content);
        });
    }

    function initFaqAccordion() {
        $('.faq-item.is-active .faq-item__answer').show();

        $('.faq-item__question').on('click', function () {
            const $parent = $(this).parent();
            const $answer = $parent.find('.faq-item__answer');

            $('.faq-item').not($parent).removeClass('is-active').find('.faq-item__answer').slideUp();

            $parent.toggleClass('is-active');
            $answer.slideToggle();
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

    function initBlogFilter() {
        const $container = $('#ajax-blog-container');
        const $sidebarItems = $('.blog-sidebar__category-list li');

        if (!$container.length || !$sidebarItems.length) return;

        $sidebarItems.on('click', function (e) {
            e.preventDefault();

            const $this = $(this);
            const categoryId = $this.data('category-id');

            if ($this.hasClass('active')) return;

            // Update UI Active State
            $sidebarItems.removeClass('active');
            $this.addClass('active');

            // Update Category Name Title
            const $heading = $('.category-name');
            if (categoryId === 'all') {
                $heading.text('記事一覧');
            } else {
                // Extract only the text node to avoid getting SVG content
                const categoryName = $this.find('a').contents().filter(function () {
                    return this.nodeType === 3;
                }).text().trim();
                $heading.text(categoryName);
            }

            // Show Loading State
            $container.html('<div class="loading-message text-center py-5">Loading articles...</div>');
            $container.css('opacity', '0.5');

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'filter_blog_by_category',
                    category_id: categoryId,
                },
                success: function (response) {
                    if (response.success) {
                        $container.html(response.data);
                        $container.css('opacity', '1');

                        // Scroll to top of list if needed
                        $('html, body').animate({
                            scrollTop: $container.offset().top - 150
                        }, 500);
                    } else {
                        $container.html('<p class="text-center py-5">Error loading posts.</p>');
                        $container.css('opacity', '1');
                    }
                },
                error: function () {
                    $container.html('<p class="text-center py-5">Request failed. Please try again.</p>');
                    $container.css('opacity', '1');
                }
            });
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
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
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
                    el: '.swiper-pagination',
                    type: isMobile ? 'bullets' : 'progressbar',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2.2,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 4.6,
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
        // initMarquee();
        // initFaqAccordion();
        // initIframeResize();
        // initBackToTop();
        // initBlogFilter();

        // AOS.init({
        //     once: false
        // });
    });
})(jQuery); 