/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/assets/js/js_drawer.js":
/*!************************************!*\
  !*** ./src/assets/js/js_drawer.js ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"js_drawer\": function() { return /* binding */ js_drawer; }\n/* harmony export */ });\n// -----------------------------------------------------------\n//  ドロワーメニュー（アコーディオンなし版・レスポンシブ対応）\n// -----------------------------------------------------------\nfunction js_drawer() {\n  var $drawerOpen = jQuery('#js_drawerOpen');\n  var $drawer = jQuery('#drawer');\n  var BREAKPOINT = 768;\n\n  // 開いている間のスクロール位置を保持\n  var scrollPosition = 0;\n\n  //===========================================\n  // 背景スクロールのロック\n  //===========================================\n  function lockScroll() {\n    scrollPosition = window.scrollY;\n    jQuery('body').addClass('is_fixed').css('top', \"-\".concat(scrollPosition, \"px\"));\n  }\n  function unlockScroll() {\n    jQuery('body').removeClass('is_fixed').css('top', '');\n    window.scrollTo(0, scrollPosition);\n  }\n\n  //===========================================\n  // 開閉処理\n  //===========================================\n  function openDrawer() {\n    $drawerOpen.addClass('is_open');\n    jQuery('.js_drawer').addClass('is_open');\n    lockScroll();\n\n    // ARIA属性を更新\n    $drawerOpen.attr('aria-expanded', 'true');\n    $drawerOpen.attr('aria-label', 'メニューを閉じる');\n    $drawer.attr('aria-hidden', 'false');\n    $drawer.removeAttr('inert');\n  }\n  function closeDrawer() {\n    var returnFocus = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;\n    $drawerOpen.removeClass('is_open');\n    jQuery('.js_drawer').removeClass('is_open');\n    unlockScroll();\n\n    // ARIA属性を閉じた状態にリセット\n    $drawerOpen.attr('aria-expanded', 'false');\n    $drawerOpen.attr('aria-label', 'メニューを開く');\n    $drawer.attr('aria-hidden', 'true');\n    $drawer.attr('inert', '');\n\n    // フォーカスをハンバーガーメニューに戻す\n    if (returnFocus) {\n      $drawerOpen.focus();\n    }\n  }\n\n  //===========================================\n  // 1. リサイズ時の処理（PC幅になったら強制的に閉じる）\n  //===========================================\n  jQuery(window).on('resize', function () {\n    if (window.innerWidth >= BREAKPOINT && $drawerOpen.hasClass('is_open')) {\n      closeDrawer(false);\n    }\n  });\n\n  //===========================================\n  // 2. ハンバーガーのクリックで開閉\n  //===========================================\n  $drawerOpen.on('click', function (e) {\n    e.preventDefault();\n\n    // 768px以上では何もしない\n    if (window.innerWidth >= BREAKPOINT) return;\n    if ($drawerOpen.hasClass('is_open')) {\n      closeDrawer();\n    } else {\n      openDrawer();\n    }\n  });\n\n  //===========================================\n  // 3. ドロワー内リンククリック（同一ページ内アンカーのみ閉じる）\n  //===========================================\n  jQuery('#drawer a').on('click', function () {\n    // 768px以上では何もしない\n    if (window.innerWidth >= BREAKPOINT) return;\n\n    // 同一ページ内アンカー（別ページ遷移は通常の遷移を許可）\n    var isSamePageHash = this.hash !== '' && this.pathname === window.location.pathname;\n    if (isSamePageHash) {\n      closeDrawer();\n    }\n  });\n\n  //===========================================\n  // 4. アクセシビリティ - フォーカストラップ + Escapeで閉じる\n  //===========================================\n  function getTrapElements() {\n    // ハンバーガー（トリガー兼閉じるボタン）＋ ドロワー内のフォーカス可能要素\n    return $drawerOpen.add($drawer.find('a[href], button:not([disabled]), [tabindex]:not([tabindex=\"-1\"])')).filter(':visible');\n  }\n  jQuery(document).on('keydown', function (e) {\n    if (window.innerWidth >= BREAKPOINT) return;\n    if (!$drawerOpen.hasClass('is_open')) return;\n\n    // Escapeで閉じる\n    if (e.key === 'Escape') {\n      closeDrawer();\n      return;\n    }\n    if (e.key !== 'Tab') return;\n    var $els = getTrapElements();\n    if ($els.length === 0) return;\n    var first = $els[0];\n    var last = $els[$els.length - 1];\n\n    // 双方向のフォーカストラップ\n    if (e.shiftKey && document.activeElement === first) {\n      e.preventDefault();\n      last.focus();\n    } else if (!e.shiftKey && document.activeElement === last) {\n      e.preventDefault();\n      first.focus();\n    }\n  });\n}\n\n//# sourceURL=webpack://gulp-essentials/./src/assets/js/js_drawer.js?");

/***/ }),

/***/ "./src/assets/js/js_fadeIn.js":
/*!************************************!*\
  !*** ./src/assets/js/js_fadeIn.js ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"js_fadeIn\": function() { return /* binding */ js_fadeIn; }\n/* harmony export */ });\n// -----------------------------------------------------------\n//  フェードイン\n// -----------------------------------------------------------\nfunction js_fadeIn() {\n  // 動きのきっかけの起点となるアニメーションの名前を定義\n  function fadeAnime() {\n    jQuery('.fadeUpTrigger').each(function () {\n      //fadeUpTriggerというクラス名が\n      var elemPos = jQuery(this).offset().top - 50; //要素より、50px上の\n      var scroll = jQuery(window).scrollTop();\n      var windowHeight = jQuery(window).height();\n      if (scroll >= elemPos - windowHeight) {\n        jQuery(this).addClass('fadeUp'); // 画面内に入ったらfadeUpというクラス名を追記\n      } else {\n        jQuery(this).removeClass('fadeUp'); // 画面外に出たらfadeUpというクラス名を外す\n      }\n    });\n  }\n  // 画面をスクロールをしたら動かしたい場合の記述\n  jQuery(window).scroll(function () {\n    fadeAnime(); /* アニメーション用の関数を呼ぶ*/\n  }); // ここまで画面をスクロールをしたら動かしたい場合の記述\n\n  function fadeAnime2() {\n    jQuery('.fadeUpTrigger2').each(function () {\n      //fadeUpTriggerというクラス名が\n      var elemPos = jQuery(this).offset().top - 50; //要素より、50px上の\n      var scroll = jQuery(window).scrollTop();\n      var windowHeight = jQuery(window).height();\n      if (scroll >= elemPos - windowHeight) {\n        jQuery(this).addClass('fadeUp'); // 画面内に入ったらfadeUpというクラス名を追記\n      } else {\n        jQuery(this).removeClass('fadeUp'); // 画面外に出たらfadeUpというクラス名を外す\n      }\n    });\n  }\n\n  // ページが読み込まれたらすぐに動かしたい場合の記述\n  jQuery(window).on('load', function () {\n    fadeAnime2(); /* アニメーション用の関数を呼ぶ*/\n  }); // ここまでページが読み込まれたらすぐに動かしたい場合の記述\n}\n\n//# sourceURL=webpack://gulp-essentials/./src/assets/js/js_fadeIn.js?");

/***/ }),

/***/ "./src/assets/js/js_shops.js":
/*!***********************************!*\
  !*** ./src/assets/js/js_shops.js ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"js_shops\": function() { return /* binding */ js_shops; }\n/* harmony export */ });\n// -----------------------------------------------------------\n//  店舗タブ切り替え\n// -----------------------------------------------------------\nfunction js_shops() {\n  var shops = document.querySelectorAll('.js_shops');\n  if (!shops.length) return;\n  shops.forEach(function (shop) {\n    var tabs = shop.querySelectorAll('.js_shopsTab');\n    var panelsContainer = shop.querySelector('.p-shops__panels');\n    var panels = shop.querySelectorAll('.js_shopsPanel');\n    var updatePanelHeight = function updatePanelHeight(activePanel) {\n      if (!activePanel || !panelsContainer) return;\n      var content = activePanel.querySelector('.p-shops__content');\n      if (!content) return;\n      var styles = getComputedStyle(panelsContainer);\n      var paddingBlock = parseFloat(styles.paddingTop) + parseFloat(styles.paddingBottom);\n      panelsContainer.style.height = \"\".concat(content.offsetHeight + paddingBlock, \"px\");\n    };\n    var resizeObserver;\n    var observeActivePanel = function observeActivePanel(panel) {\n      var _resizeObserver;\n      var content = panel === null || panel === void 0 ? void 0 : panel.querySelector('.p-shops__content');\n      if (!content) return;\n      (_resizeObserver = resizeObserver) === null || _resizeObserver === void 0 ? void 0 : _resizeObserver.disconnect();\n      resizeObserver = new ResizeObserver(function () {\n        updatePanelHeight(panel);\n      });\n      resizeObserver.observe(content);\n    };\n    var syncHeight = function syncHeight(panel) {\n      requestAnimationFrame(function () {\n        updatePanelHeight(panel);\n        observeActivePanel(panel);\n      });\n    };\n    var activePanel = shop.querySelector('.js_shopsPanel.is_show');\n    syncHeight(activePanel);\n    window.addEventListener('load', function () {\n      updatePanelHeight(shop.querySelector('.js_shopsPanel.is_show'));\n    });\n    tabs.forEach(function (tab) {\n      tab.addEventListener('click', function () {\n        // タブの切り替え\n        tabs.forEach(function (t) {\n          t.setAttribute('aria-selected', 'false');\n          t.setAttribute('tabindex', '-1');\n          t.classList.remove('is_show');\n        });\n        tab.setAttribute('aria-selected', 'true');\n        tab.setAttribute('tabindex', '0');\n        tab.classList.add('is_show');\n\n        // パネルの切り替え\n        var panelId = tab.getAttribute('aria-controls');\n        panels.forEach(function (panel) {\n          panel.classList.remove('is_show');\n        });\n        var nextPanel = document.getElementById(panelId);\n        nextPanel.classList.add('is_show');\n        syncHeight(nextPanel);\n      });\n    });\n  });\n}\n\n//# sourceURL=webpack://gulp-essentials/./src/assets/js/js_shops.js?");

/***/ }),

/***/ "./src/assets/js/js_shopsMap.js":
/*!**************************************!*\
  !*** ./src/assets/js/js_shopsMap.js ***!
  \**************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"js_shopsMap\": function() { return /* binding */ js_shopsMap; }\n/* harmony export */ });\n// -----------------------------------------------------------\n//  Googleマップモーダル\n// -----------------------------------------------------------\nfunction js_shopsMap() {\n  var openButtons = document.querySelectorAll('.js_shopsMapOpen');\n  if (!openButtons.length) return;\n  var scrollPosition = 0;\n  function lockScroll() {\n    scrollPosition = window.scrollY;\n    document.body.classList.add('is_fixed');\n    document.body.style.top = \"-\".concat(scrollPosition, \"px\");\n  }\n  function unlockScroll() {\n    document.body.classList.remove('is_fixed');\n    document.body.style.top = '';\n    window.scrollTo(0, scrollPosition);\n  }\n  function openModal(modal) {\n    modal.classList.add('is_open');\n    modal.setAttribute('aria-hidden', 'false');\n    lockScroll();\n  }\n  function closeModal(modal) {\n    modal.classList.remove('is_open');\n    modal.setAttribute('aria-hidden', 'true');\n    unlockScroll();\n  }\n  openButtons.forEach(function (button) {\n    button.addEventListener('click', function () {\n      var modalId = button.getAttribute('aria-controls');\n      var modal = document.getElementById(modalId);\n      if (modal) openModal(modal);\n    });\n  });\n  document.querySelectorAll('.js_shopsMapClose').forEach(function (closeEl) {\n    closeEl.addEventListener('click', function () {\n      var modal = closeEl.closest('.js_shopsMapModal');\n      if (modal) closeModal(modal);\n    });\n  });\n  document.addEventListener('keydown', function (e) {\n    if (e.key !== 'Escape') return;\n    var activeModal = document.querySelector('.js_shopsMapModal.is_open');\n    if (activeModal) closeModal(activeModal);\n  });\n}\n\n//# sourceURL=webpack://gulp-essentials/./src/assets/js/js_shopsMap.js?");

/***/ }),

/***/ "./src/assets/js/js_smooth.js":
/*!************************************!*\
  !*** ./src/assets/js/js_smooth.js ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"js_smooth\": function() { return /* binding */ js_smooth; }\n/* harmony export */ });\n// -----------------------------------------------------------\n//  スムーススクロール\n// -----------------------------------------------------------\nfunction js_smooth() {\n  // headerを上部固定にした場合にheaderの高さを考慮してスクロールする場合\n  var header = jQuery('#header');\n  jQuery('a[href^=\"#\"]').on('click', function (e) {\n    e.preventDefault();\n    var gap = header.outerHeight();\n    var speed = 800;\n    var href = jQuery(this).attr('href');\n    var target = jQuery(href == '#' || href == '' ? 'html' : href);\n    var position = target.offset().top - gap;\n    jQuery('html, body').animate({\n      scrollTop: position\n    }, speed, 'swing');\n    return false;\n  });\n\n  // ページ読み込み時にURLにハッシュがあればスクロール位置を調整する\n  jQuery(document).ready(function () {\n    if (window.location.hash) {\n      setTimeout(function () {\n        var hash = window.location.hash;\n        var gap = jQuery('#header').outerHeight();\n        var target = jQuery(hash);\n        if (target.length) {\n          var position = target.offset().top - gap;\n          jQuery('html, body').scrollTop(position);\n        }\n      }, 100); // 少し遅延させてDOM要素が確実に読み込まれるようにする\n    }\n  });\n}\n\n//# sourceURL=webpack://gulp-essentials/./src/assets/js/js_smooth.js?");

/***/ }),

/***/ "./src/assets/js/main.js":
/*!*******************************!*\
  !*** ./src/assets/js/main.js ***!
  \*******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _js_fadeIn__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js_fadeIn */ \"./src/assets/js/js_fadeIn.js\");\n/* harmony import */ var _js_smooth__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js_smooth */ \"./src/assets/js/js_smooth.js\");\n/* harmony import */ var _js_drawer__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js_drawer */ \"./src/assets/js/js_drawer.js\");\n/* harmony import */ var _js_shops__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js_shops */ \"./src/assets/js/js_shops.js\");\n/* harmony import */ var _js_shopsMap__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js_shopsMap */ \"./src/assets/js/js_shopsMap.js\");\n// フェードイン\n\n(0,_js_fadeIn__WEBPACK_IMPORTED_MODULE_0__.js_fadeIn)(); // 実行\n\n// スムーススクロール\n\n(0,_js_smooth__WEBPACK_IMPORTED_MODULE_1__.js_smooth)(); // 実行\n\n// ドロワーメニュー\n\n(0,_js_drawer__WEBPACK_IMPORTED_MODULE_2__.js_drawer)(); // 実行\n\n// 店舗タブ切り替え\n\n(0,_js_shops__WEBPACK_IMPORTED_MODULE_3__.js_shops)(); // 実行\n\n// Googleマップモーダル\n\n(0,_js_shopsMap__WEBPACK_IMPORTED_MODULE_4__.js_shopsMap)(); // 実行\n\n//# sourceURL=webpack://gulp-essentials/./src/assets/js/main.js?");

/***/ })

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
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./src/assets/js/main.js");
/******/ 	
/******/ })()
;