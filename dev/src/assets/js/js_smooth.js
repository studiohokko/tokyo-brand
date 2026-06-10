// -----------------------------------------------------------
//  スムーススクロール
// -----------------------------------------------------------
export function js_smooth() {
	// headerを上部固定にした場合にheaderの高さを考慮してスクロールする場合
	const header = jQuery('#header');

	jQuery('a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		const gap = header.outerHeight();
		const speed = 800;
		const href = jQuery(this).attr('href');
		const target = jQuery(href == '#' || href == '' ? 'html' : href);
		const position = target.offset().top - gap;

		jQuery('html, body').animate({ scrollTop: position }, speed, 'swing');
		return false;
	});

	// ページ読み込み時にURLにハッシュがあればスクロール位置を調整する
	jQuery(document).ready(function () {
		if (window.location.hash) {
			setTimeout(function () {
				const hash = window.location.hash;
				const gap = jQuery('#header').outerHeight();
				const target = jQuery(hash);
				if (target.length) {
					const position = target.offset().top - gap;
					jQuery('html, body').scrollTop(position);
				}
			}, 100); // 少し遅延させてDOM要素が確実に読み込まれるようにする
		}
	});
}
