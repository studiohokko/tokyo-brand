// -----------------------------------------------------------
//  アコーディオン
// -----------------------------------------------------------
export function js_accordion() {
	document.addEventListener('DOMContentLoaded', () => {
		setUpAccordion();
	});

	const setUpAccordion = () => {
		const details = document.querySelectorAll('.js_details');
		const IS_OPENED_CLASS = 'is_opened';

		details.forEach((element) => {
			const summary = element.querySelector('.js_summary');
			const content = element.querySelector('.js_content');

			summary.addEventListener('click', (event) => {
				// デフォルトの挙動を無効化
				event.preventDefault();

				// is-openedクラスの有無で判定（detailsのopen属性の判定だと、アニメーション完了を待つ必要がありタイミング的に不安定になるため）
				if (element.classList.contains(IS_OPENED_CLASS)) {
					// アコーディオンを閉じるときの処理
					// アイコン操作用クラスを切り替える(クラスを取り除く)
					element.classList.toggle(IS_OPENED_CLASS);

					// アニメーション実行
					closingAnim(content, element).restart();
				} else {
					// アコーディオンを開くときの処理
					// アイコン操作用クラスを切り替える(クラスを付与)
					element.classList.toggle(IS_OPENED_CLASS);

					element.open = true;
					// または element.setAttribute('open', '');

					// アニメーション実行
					openingAnim(content).restart();
				}
			});
		});
	};

	/**
	 * アコーディオンを閉じる時のアニメーション
	 */
	const closingAnim = (content, element) =>
		gsap.to(content, {
			height: 0,
			opacity: 0,
			duration: 0.8,
			ease: 'power3.out',
			overwrite: true,
			onComplete: () => {
				// アニメーションの完了後にopen属性を取り除く
				element.removeAttribute('open');
			},
		});

	/**
	 * アコーディオンを開く時のアニメーション
	 */
	const openingAnim = (content) =>
		gsap.fromTo(
			content,
			{
				height: 0,
				opacity: 0,
			},
			{
				height: 'auto',
				opacity: 1,
				duration: 0.8,
				ease: 'power3.out',
				overwrite: true,
			},
		);
}
