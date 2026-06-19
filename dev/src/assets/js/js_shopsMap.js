// -----------------------------------------------------------
//  Googleマップモーダル
// -----------------------------------------------------------
export function js_shopsMap() {
	const openButtons = document.querySelectorAll('.js_shopsMapOpen');
	if (!openButtons.length) return;

	let scrollPosition = 0;
	let lastFocusedElement = null;

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

	function getFocusableElements(modal) {
		return [...modal.querySelectorAll(
			'button:not([disabled]), [href], iframe, [tabindex]:not([tabindex="-1"])',
		)];
	}

	function openModal(modal, trigger) {
		lastFocusedElement = trigger;
		modal.classList.add('is_open');
		modal.setAttribute('aria-hidden', 'false');
		lockScroll();

		const closeBtn = modal.querySelector('.p-shops__modalClose');
		if (closeBtn) closeBtn.focus();
	}

	function closeModal(modal) {
		modal.classList.remove('is_open');
		modal.setAttribute('aria-hidden', 'true');
		unlockScroll();

		if (lastFocusedElement) {
			lastFocusedElement.focus();
			lastFocusedElement = null;
		}
	}

	openButtons.forEach((button) => {
		button.addEventListener('click', () => {
			const modalId = button.getAttribute('aria-controls');
			const modal = document.getElementById(modalId);
			if (modal) openModal(modal, button);
		});
	});

	document.querySelectorAll('.js_shopsMapClose').forEach((closeEl) => {
		closeEl.addEventListener('click', () => {
			const modal = closeEl.closest('.js_shopsMapModal');
			if (modal) closeModal(modal);
		});
	});

	document.addEventListener('keydown', (e) => {
		const activeModal = document.querySelector('.js_shopsMapModal.is_open');
		if (!activeModal) return;

		if (e.key === 'Escape') {
			closeModal(activeModal);
			return;
		}

		if (e.key !== 'Tab') return;

		const focusables = getFocusableElements(activeModal);
		if (focusables.length === 0) return;

		const first = focusables[0];
		const last = focusables[focusables.length - 1];

		if (e.shiftKey && document.activeElement === first) {
			e.preventDefault();
			last.focus();
		} else if (!e.shiftKey && document.activeElement === last) {
			e.preventDefault();
			first.focus();
		}
	});
}
