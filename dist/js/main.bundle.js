/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/components/function.js"
/*!******************************************!*\
  !*** ./assets/js/components/function.js ***!
  \******************************************/
() {

eval("{function _typeof(o) { \"@babel/helpers - typeof\"; return _typeof = \"function\" == typeof Symbol && \"symbol\" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && \"function\" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? \"symbol\" : typeof o; }, _typeof(o); }\n(function ($) {\n  \"use strict\";\n\n  function initIframeResize() {\n    window.addEventListener('message', function (e) {\n      // Adjust the height depending on the message format from the iframe\n      if (e.data) {\n        var newHeight = null;\n\n        // Typical iframe resizer message format\n        if (typeof e.data === 'string' && e.data.indexOf('iframeHeight') !== -1) {\n          try {\n            var parsed = JSON.parse(e.data);\n            newHeight = parsed.iframeHeight || parsed.height;\n          } catch (error) {}\n        } else if (_typeof(e.data) === 'object' && e.data.height) {\n          newHeight = e.data.height;\n        } else if (typeof e.data === 'string' && !isNaN(e.data)) {\n          newHeight = e.data;\n        } else if (e.data.type === 'setHeight' && e.data.height) {\n          newHeight = e.data.height;\n        }\n        if (newHeight) {\n          $('.event-list').css('height', newHeight + 'px');\n          $('.event-list iframe').css('height', newHeight + 'px');\n        }\n      }\n    });\n  }\n  function initHeaderScroll() {\n    var lastScrollTop = 0;\n    var $headerMain = $('#site-header');\n    var $headerScroll = $('#header-scroll');\n    var scrollThreshold = $headerMain.outerHeight() || 100;\n    $(window).on('scroll', function () {\n      var scrollTop = $(this).scrollTop();\n\n      // Detect scroll direction and prevent jitter\n      if (Math.abs(lastScrollTop - scrollTop) <= 5) return;\n\n      // Add is-scrolled when scrollY > threshold\n      if (scrollTop > scrollThreshold) {\n        $headerScroll.addClass('is-scrolled');\n      } else {\n        $headerScroll.removeClass('is-scrolled');\n      }\n      lastScrollTop = scrollTop;\n    });\n  }\n  function initMarquee() {\n    var $marquees = $('.partners-section__marquee, .logos-section__marquee, .text-marquee');\n    $marquees.each(function () {\n      var $this = $(this);\n      // Duplicate the content to allow for a seamless infinite scroll loop\n      var content = $this.html();\n      $this.append(content);\n    });\n  }\n  function initFaqAccordion() {\n    $('.faq-item.is-active .faq-item__answer').show();\n    $('.faq-item__question').on('click', function () {\n      var $parent = $(this).parent();\n      var $answer = $parent.find('.faq-item__answer');\n      $('.faq-item').not($parent).removeClass('is-active').find('.faq-item__answer').slideUp();\n      $parent.toggleClass('is-active');\n      $answer.slideToggle();\n    });\n  }\n  function initBackToTop() {\n    var $btnTop = $('.btn-top');\n    $(window).on('scroll', function () {\n      if ($(this).scrollTop() > 100) {\n        $btnTop.addClass('is-visible');\n      } else {\n        $btnTop.removeClass('is-visible');\n      }\n    });\n    $btnTop.on('click', function (e) {\n      e.preventDefault();\n      window.scrollTo({\n        top: 0,\n        behavior: 'smooth'\n      });\n    });\n  }\n  function initBlogFilter() {\n    var $container = $('#ajax-blog-container');\n    var $sidebarItems = $('.blog-sidebar__category-list li');\n    if (!$container.length || !$sidebarItems.length) return;\n    $sidebarItems.on('click', function (e) {\n      e.preventDefault();\n      var $this = $(this);\n      var categoryId = $this.data('category-id');\n      if ($this.hasClass('active')) return;\n\n      // Update UI Active State\n      $sidebarItems.removeClass('active');\n      $this.addClass('active');\n\n      // Update Category Name Title\n      var $heading = $('.category-name');\n      if (categoryId === 'all') {\n        $heading.text('記事一覧');\n      } else {\n        // Extract only the text node to avoid getting SVG content\n        var categoryName = $this.find('a').contents().filter(function () {\n          return this.nodeType === 3;\n        }).text().trim();\n        $heading.text(categoryName);\n      }\n\n      // Show Loading State\n      $container.html('<div class=\"loading-message text-center py-5\">Loading articles...</div>');\n      $container.css('opacity', '0.5');\n      $.ajax({\n        url: ajax_object.ajax_url,\n        type: 'POST',\n        data: {\n          action: 'filter_blog_by_category',\n          category_id: categoryId\n        },\n        success: function success(response) {\n          if (response.success) {\n            $container.html(response.data);\n            $container.css('opacity', '1');\n\n            // Scroll to top of list if needed\n            $('html, body').animate({\n              scrollTop: $container.offset().top - 150\n            }, 500);\n          } else {\n            $container.html('<p class=\"text-center py-5\">Error loading posts.</p>');\n            $container.css('opacity', '1');\n          }\n        },\n        error: function error() {\n          $container.html('<p class=\"text-center py-5\">Request failed. Please try again.</p>');\n          $container.css('opacity', '1');\n        }\n      });\n    });\n  }\n  $(document).ready(function () {\n    initHeaderScroll();\n    // initMarquee();\n    // initFaqAccordion();\n    // initIframeResize();\n    // initBackToTop();\n    // initBlogFilter();\n\n    // AOS.init({\n    //     once: false\n    // });\n  });\n})(jQuery);\n\n//# sourceURL=webpack://Yutaka/./assets/js/components/function.js?\n}");

/***/ },

/***/ "./assets/js/components/header.js"
/*!****************************************!*\
  !*** ./assets/js/components/header.js ***!
  \****************************************/
() {

eval("{(function ($) {\n  \"use strict\";\n\n  $(window).on(\"load\", function () {});\n\n  // Mobile Menu Functions\n  function initMobileMenu() {\n    var $hamburgerBtn = $('.humberger-btn');\n    var $closeBtn = $('.menu-close-btn');\n    var $overlay = $('.mobile-menu-overlay');\n    var $body = $('body');\n    function toggleMobileMenu(e) {\n      if (e) e.preventDefault();\n      var isOpen = $overlay.hasClass('is-active');\n      if (isOpen) {\n        $overlay.removeClass('is-active');\n        $hamburgerBtn.removeClass('is-active');\n        $body.css('overflow', '');\n      } else {\n        $overlay.addClass('is-active');\n        $hamburgerBtn.addClass('is-active');\n        $body.css('overflow', 'hidden'); // Prevent background scrolling\n      }\n    }\n    $hamburgerBtn.on('click', toggleMobileMenu);\n    $closeBtn.on('click', toggleMobileMenu);\n  }\n  $(document).ready(function () {\n    // initMobileMenu();\n  });\n})(jQuery);\n\n//# sourceURL=webpack://Yutaka/./assets/js/components/header.js?\n}");

/***/ },

/***/ "./assets/js/index.js"
/*!****************************!*\
  !*** ./assets/js/index.js ***!
  \****************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("{__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _components_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/header */ \"./assets/js/components/header.js\");\n/* harmony import */ var _components_header__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_components_header__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _components_function__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/function */ \"./assets/js/components/function.js\");\n/* harmony import */ var _components_function__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_components_function__WEBPACK_IMPORTED_MODULE_1__);\n\n\n\n//# sourceURL=webpack://Yutaka/./assets/js/index.js?\n}");

/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		if (!(moduleId in __webpack_modules__)) {
/******/ 			delete __webpack_module_cache__[moduleId];
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/js/index.js");
/******/ 	
/******/ })()
;