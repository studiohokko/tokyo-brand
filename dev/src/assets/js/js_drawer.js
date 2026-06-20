// -----------------------------------------------------------
//  ドロワーメニュー（アコーディオンなし版・レスポンシブ対応）
// -----------------------------------------------------------
export function js_drawer() {
	const $drawerOpen = jQuery('#js_drawerOpen');
	const $drawer = jQuery('#drawer');
	const BREAKPOINT = 768;

	// 開いている間のスクロール位置を保持
	let scrollPosition = 0;

	//===========================================
	// 背景スクロールのロック
	//===========================================
	function lockScroll() {
		scrollPosition = window.scrollY;
		jQuery('body').addClass('is_fixed').css('top', `-${scrollPosition}px`);
	}

	function unlockScroll(restoreScroll = true) {
		jQuery('body').removeClass('is_fixed').css('top', '');
		if (restoreScroll) {
			window.scrollTo(0, scrollPosition);
		}
	}

	//===========================================
	// 開閉処理
	//===========================================
	function openDrawer() {
		$drawerOpen.addClass('is_open');
		jQuery('.js_drawer').addClass('is_open');
		lockScroll();

		// ARIA属性を更新（aria-hidden は使わず inert を外すだけ）
		$drawerOpen.attr('aria-expanded', 'true');
		$drawerOpen.attr('aria-label', 'メニューを閉じる');
		$drawer.removeAttr('inert');
	}

	function closeDrawer(returnFocus = true, restoreScroll = true) {
		$drawerOpen.removeClass('is_open');
		jQuery('.js_drawer').removeClass('is_open');
		unlockScroll(restoreScroll);

		// inert を付ける前に、ドロワー内のフォーカスを必ず外へ逃がす
		const activeEl = document.activeElement;
		if (returnFocus) {
			$drawerOpen.focus();
		} else if (activeEl && $drawer[0].contains(activeEl)) {
			activeEl.blur();
		}

		// ARIA属性を閉じた状態にリセット（aria-hidden は使わず inert を付けるだけ）
		$drawerOpen.attr('aria-expanded', 'false');
		$drawerOpen.attr('aria-label', 'メニューを開く');
		$drawer.attr('inert', '');
	}

	//===========================================
	// 1. リサイズ時の処理（PC幅になったら強制的に閉じる）
	//===========================================
	jQuery(window).on('resize', function () {
		if (window.innerWidth >= BREAKPOINT && $drawerOpen.hasClass('is_open')) {
			closeDrawer(false);
		}
	});

	//===========================================
	// 2. ハンバーガーのクリックで開閉
	//===========================================
	$drawerOpen.on('click', function (e) {
		e.preventDefault();

		// 768px以上では何もしない
		if (window.innerWidth >= BREAKPOINT) return;

		if ($drawerOpen.hasClass('is_open')) {
			closeDrawer();
		} else {
			openDrawer();
		}
	});

	//===========================================
	// 3. ドロワー内アンカーリンク（閉じた後に正しい位置へスクロール）
	//===========================================
	const drawerEl = document.querySelector('#drawer');
	if (drawerEl) {
		drawerEl.addEventListener(
			'click',
			function (e) {
				if (window.innerWidth >= BREAKPOINT) return;

				const link = e.target.closest('a');
				if (!link) return;

				const isSamePageHash = link.hash !== '' && link.pathname === window.location.pathname;
				if (!isSamePageHash) return;

				e.preventDefault();
				e.stopImmediatePropagation();

				const hash = link.hash;
				closeDrawer(false, false);

				requestAnimationFrame(function () {
					const gap = jQuery('#header').outerHeight();
					const target = jQuery(hash);
					if (!target.length) return;
					jQuery('html, body').animate({ scrollTop: target.offset().top - gap }, 800, 'swing', function () {
						const corrected = target.offset().top - gap;
						if (Math.abs(jQuery(window).scrollTop() - corrected) > 2) {
							jQuery('html, body').scrollTop(corrected);
						}
					});
				});
			},
			true
		);
	}

	//===========================================
	// 4. アクセシビリティ - フォーカストラップ + Escapeで閉じる
	//===========================================
	function getTrapElements() {
		// ハンバーガー（トリガー兼閉じるボタン）＋ ドロワー内のフォーカス可能要素
		return $drawerOpen.add($drawer.find('a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])')).filter(':visible');
	}

	jQuery(document).on('keydown', function (e) {
		if (window.innerWidth >= BREAKPOINT) return;
		if (!$drawerOpen.hasClass('is_open')) return;

		// Escapeで閉じる
		if (e.key === 'Escape') {
			closeDrawer();
			return;
		}

		if (e.key !== 'Tab') return;

		const $els = getTrapElements();
		if ($els.length === 0) return;

		const first = $els[0];
		const last = $els[$els.length - 1];

		// 双方向のフォーカストラップ
		if (e.shiftKey && document.activeElement === first) {
			e.preventDefault();
			last.focus();
		} else if (!e.shiftKey && document.activeElement === last) {
			e.preventDefault();
			first.focus();
		}
	});
}
