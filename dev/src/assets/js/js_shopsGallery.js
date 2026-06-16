import { rm } from './utils/utils';

const BREAKPOINT = 768;

const getThumbsSpaceBetween = () => (window.innerWidth >= BREAKPOINT ? rm(4) : rm(3));

export function js_shopsGallery() {
	document.querySelectorAll('.p-shops__swiper-container').forEach((container) => {
		const mainEl = container.querySelector('.p-shops__main-swiper');
		const thumbsEl = container.querySelector('.p-shops__swiper');
		const baseCount = Number(container.dataset.galleryCount);
		if (!mainEl || !thumbsEl || !baseCount) return;

		// 真ん中の帯（本物）の開始位置 = baseCount 番目（5枚なら index 5）
		const START = baseCount;

		let busy = false; // 同期の二重発火を防ぐ「鍵」

		// ① メイン（loop は使わない！3周複製で代用）
		const mainSwiper = new Swiper(mainEl, {
			speed: 1000,
			slidesPerView: 'auto',
			spaceBetween: rm(25),
			initialSlide: START, // 真ん中の帯から開始
			navigation: {
				prevEl: container.querySelector('.p-shops__swiper-button-prev'),
				nextEl: container.querySelector('.p-shops__swiper-button-next'),
			},
		});

		// ② サムネ（こちらも同じ構造・同じ開始位置）
		const thumbsSwiper = new Swiper(thumbsEl, {
			speed: 1000,
			slidesPerView: 'auto',
			centeredSlides: true,
			spaceBetween: getThumbsSpaceBetween(),
			initialSlide: START,
			slideToClickedSlide: true, // サムネをクリックしたらそのサムネへ
		});

		// 🔗 片方が動いたら、もう片方を「同じ番号」へ動かすだけ
		const sync = (from, to) => {
			if (busy) return;
			busy = true;
			to.slideTo(from.activeIndex, from.params.speed);
			busy = false;
		};

		// 🔄 端の帯まで来たら、見た目そのままで真ん中の帯へ瞬間移動
		const normalize = () => {
			if (busy) return;
			const i = mainSwiper.activeIndex;
			let target = i;
			if (i < baseCount)
				target = i + baseCount; // 左の帯 → 中央へ
			else if (i >= baseCount * 2) target = i - baseCount; // 右の帯 → 中央へ
			if (target === i) return;

			busy = true;
			mainSwiper.slideTo(target, 0); // speed 0 = アニメなしの瞬間移動
			thumbsSwiper.slideTo(target, 0);
			busy = false;
		};

		mainSwiper.on('slideChange', () => sync(mainSwiper, thumbsSwiper));
		thumbsSwiper.on('slideChange', () => sync(thumbsSwiper, mainSwiper));
		mainSwiper.on('transitionEnd', normalize);

		// リサイズ時の余白調整
		const updateSwipers = () => {
			const nextSpace = getThumbsSpaceBetween();
			if (thumbsSwiper.params.spaceBetween !== nextSpace) {
				thumbsSwiper.params.spaceBetween = nextSpace;
				thumbsSwiper.update();
			}
			mainSwiper.update();
		};

		window.addEventListener('load', updateSwipers);

		let resizeTimer;
		window.addEventListener('resize', () => {
			clearTimeout(resizeTimer);
			resizeTimer = setTimeout(updateSwipers, 200);
		});
	});
}
