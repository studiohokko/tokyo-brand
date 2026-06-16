// -----------------------------------------------------------
//  お客様の声スライダー
// -----------------------------------------------------------
import { rm } from './utils/utils';

export function js_swiperReviews() {
	const swiperEl = document.querySelector('.p-reviews__swiper');
	if (!swiperEl) return;

	const equalizeSlideHeight = () => {
		const slides = swiperEl.querySelectorAll('.p-reviews__swiper-slide');
		const originals = swiperEl.querySelectorAll(
			'.p-reviews__swiper-slide:not(.swiper-slide-duplicate)',
		);

		slides.forEach((slide) => {
			slide.style.height = '';
		});

		let maxHeight = 0;
		originals.forEach((slide) => {
			maxHeight = Math.max(maxHeight, slide.offsetHeight);
		});

		if (!maxHeight) return;

		slides.forEach((slide) => {
			slide.style.height = `${maxHeight}px`;
		});
	};

	const updateHeight = (swiper) => {
		equalizeSlideHeight();
		swiper.update();
	};

	const swiper = new Swiper('.p-reviews__swiper', {
		speed: 1000,
		effect: 'slide',
		allowTouchMove: true,
		loop: true,
		centeredSlides: true,
		slidesPerView: 'auto',
		spaceBetween: rm(25),
		navigation: {
			prevEl: '.p-reviews__swiper-button-prev',
			nextEl: '.p-reviews__swiper-button-next',
		},
	});

	updateHeight(swiper);

	window.addEventListener('load', () => updateHeight(swiper));

	let resizeTimer;
	window.addEventListener('resize', () => {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(() => updateHeight(swiper), 200);
	});
}
