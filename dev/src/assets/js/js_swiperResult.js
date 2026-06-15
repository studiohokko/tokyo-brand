// -----------------------------------------------------------
//  買取実績スライダー
// -----------------------------------------------------------
import { rm } from './utils/utils';

const BREAKPOINT = 768;

export function js_swiperResult() {
	const container = document.querySelector('.p-results__swiper-container');
	const swiperEl = document.querySelector('.p-results__swiper');
	if (!container || !swiperEl) return;

	const isListMode = container.classList.contains('is-list');
	let swiperInstance = null;

	const shouldInitSwiper = () => !(isListMode && window.innerWidth >= BREAKPOINT);

	const createSwiper = () => {
		swiperInstance = new Swiper('.p-results__swiper', {
			speed: 1000,
			effect: 'slide',
			allowTouchMove: true,
			loop: true,
			centeredSlides: true,
			slidesPerView: 'auto',
			spaceBetween: rm(25),
			navigation: {
				prevEl: '.p-results__swiper-button-prev',
				nextEl: '.p-results__swiper-button-next',
			},
		});
	};

	const destroySwiper = () => {
		if (!swiperInstance) return;
		swiperInstance.destroy(true, true);
		swiperInstance = null;
	};

	const updateSwiper = () => {
		if (shouldInitSwiper()) {
			if (!swiperInstance) createSwiper();
		} else {
			destroySwiper();
		}
	};

	updateSwiper();

	let resizeTimer;
	window.addEventListener('resize', () => {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(updateSwiper, 200);
	});
}
