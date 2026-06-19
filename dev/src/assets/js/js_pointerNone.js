// -----------------------------------------------------------
//  u-pointerNone__sp：PCではクリック・フォーカス両方無効
// -----------------------------------------------------------
const BREAKPOINT = 768;

export function js_pointerNone() {
	const elements = document.querySelectorAll('.u-pointerNone__sp');
	if (!elements.length) return;

	const sync = () => {
		const isPc = window.innerWidth >= BREAKPOINT;
		elements.forEach((el) => {
			if (isPc) {
				el.setAttribute('tabindex', '-1');
			} else {
				el.removeAttribute('tabindex');
			}
		});
	};

	sync();

	let resizeTimer;
	window.addEventListener('resize', () => {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(sync, 200);
	});
}
