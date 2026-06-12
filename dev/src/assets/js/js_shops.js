// -----------------------------------------------------------
//  店舗タブ切り替え
// -----------------------------------------------------------
export function js_shops() {
	const shops = document.querySelectorAll('.js_shops');
	if (!shops.length) return;

	shops.forEach((shop) => {
		const tabs = shop.querySelectorAll('.js_shopsTab');
		const panelsContainer = shop.querySelector('.p-shops__panels');
		const panels = shop.querySelectorAll('.js_shopsPanel');

		const updatePanelHeight = (activePanel) => {
			if (!activePanel || !panelsContainer) return;

			const content = activePanel.querySelector('.p-shops__content');
			if (!content) return;

			const styles = getComputedStyle(panelsContainer);
			const paddingBlock =
				parseFloat(styles.paddingTop) + parseFloat(styles.paddingBottom);

			panelsContainer.style.height = `${content.offsetHeight + paddingBlock}px`;
		};

		let resizeObserver;
		const observeActivePanel = (panel) => {
			const content = panel?.querySelector('.p-shops__content');
			if (!content) return;

			resizeObserver?.disconnect();
			resizeObserver = new ResizeObserver(() => {
				updatePanelHeight(panel);
			});
			resizeObserver.observe(content);
		};

		const syncHeight = (panel) => {
			requestAnimationFrame(() => {
				updatePanelHeight(panel);
				observeActivePanel(panel);
			});
		};

		const activePanel = shop.querySelector('.js_shopsPanel.is_show');
		syncHeight(activePanel);

		window.addEventListener('load', () => {
			updatePanelHeight(shop.querySelector('.js_shopsPanel.is_show'));
		});

		tabs.forEach((tab) => {
			tab.addEventListener('click', () => {
				// タブの切り替え
				tabs.forEach((t) => {
					t.setAttribute('aria-selected', 'false');
					t.setAttribute('tabindex', '-1');
					t.classList.remove('is_show');
				});
				tab.setAttribute('aria-selected', 'true');
				tab.setAttribute('tabindex', '0');
				tab.classList.add('is_show');

				// パネルの切り替え
				const panelId = tab.getAttribute('aria-controls');
				panels.forEach((panel) => {
					panel.classList.remove('is_show');
				});
				const nextPanel = document.getElementById(panelId);
				nextPanel.classList.add('is_show');

				syncHeight(nextPanel);
			});
		});
	});
}
