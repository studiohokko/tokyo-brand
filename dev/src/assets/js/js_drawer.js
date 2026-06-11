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

	function unlockScroll() {
		jQuery('body').removeClass('is_fixed').css('top', '');
		window.scrollTo(0, scrollPosition);
	}

	//===========================================
	// 開閉処理
	//===========================================
	function openDrawer() {
		$drawerOpen.addClass('is_open');
		jQuery('.js_drawer').addClass('is_open');
		lockScroll();

		// ARIA属性を更新
		$drawerOpen.attr('aria-expanded', 'true');
		$drawerOpen.attr('aria-label', 'メニューを閉じる');
		$drawer.attr('aria-hidden', 'false');
		$drawer.removeAttr('inert');
	}

	function closeDrawer(returnFocus = true) {
		$drawerOpen.removeClass('is_open');
		jQuery('.js_drawer').removeClass('is_open');
		unlockScroll();

		// ARIA属性を閉じた状態にリセット
		$drawerOpen.attr('aria-expanded', 'false');
		$drawerOpen.attr('aria-label', 'メニューを開く');
		$drawer.attr('aria-hidden', 'true');
		$drawer.attr('inert', '');

		// フォーカスをハンバーガーメニューに戻す
		if (returnFocus) {
			$drawerOpen.focus();
		}
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
	// 3. ドロワー内リンククリック（同一ページ内アンカーのみ閉じる）
	//===========================================
	jQuery('#drawer a').on('click', function () {
		// 768px以上では何もしない
		if (window.innerWidth >= BREAKPOINT) return;

		// 同一ページ内アンカー（別ページ遷移は通常の遷移を許可）
		const isSamePageHash = this.hash !== '' && this.pathname === window.location.pathname;
		if (isSamePageHash) {
			closeDrawer();
		}
	});

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
