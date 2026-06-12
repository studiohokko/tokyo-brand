// -----------------------------------------------------------
//  Googleマップモーダル
// -----------------------------------------------------------
export function js_shopsMap() {
	const openButtons = document.querySelectorAll('.js_shopsMapOpen');
	if (!openButtons.length) return;

	let scrollPosition = 0;

	function lockScroll() {
		scrollPosition = window.scrollY;
		document.body.classList.add('is_fixed');
		document.body.style.top = `-${scrollPosition}px`;
	}

	function unlockScroll() {
		document.body.classList.remove('is_fixed');
		document.body.style.top = '';
		window.scrollTo(0, scrollPosition);
	}

	function openModal(modal) {
		modal.classList.add('is_open');
		modal.setAttribute('aria-hidden', 'false');
		lockScroll();
	}

	function closeModal(modal) {
		modal.classList.remove('is_open');
		modal.setAttribute('aria-hidden', 'true');
		unlockScroll();
	}

	openButtons.forEach((button) => {
		button.addEventListener('click', () => {
			const modalId = button.getAttribute('aria-controls');
			const modal = document.getElementById(modalId);
			if (modal) openModal(modal);
		});
	});

	document.querySelectorAll('.js_shopsMapClose').forEach((closeEl) => {
		closeEl.addEventListener('click', () => {
			const modal = closeEl.closest('.js_shopsMapModal');
			if (modal) closeModal(modal);
		});
	});

	document.addEventListener('keydown', (e) => {
		if (e.key !== 'Escape') return;
		const activeModal = document.querySelector('.js_shopsMapModal.is_open');
		if (activeModal) closeModal(activeModal);
	});
}
