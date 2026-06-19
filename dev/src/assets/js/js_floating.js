// -----------------------------------------------------------
//  フローティングメニュー
// -----------------------------------------------------------
export function js_floating() {
	const floating = document.querySelector('.js_floating');

	// 要素がなければ何もしない（他ページでのエラー防止）
	if (!floating) return;

	// スクロール量に応じて表示/非表示を切り替え
	window.addEventListener('scroll', function () {
		if (window.scrollY > 100) {
			floating.classList.add('is_show');
		} else {
			floating.classList.remove('is_show');
		}
	});
}
