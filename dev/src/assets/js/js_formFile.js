// -----------------------------------------------------------
//  ファイルの送信（複数対応版）
// -----------------------------------------------------------
export function js_formFile() {
	const fileWrappers = document.querySelectorAll('.js_fileWrapper');

	fileWrappers.forEach((wrapper) => {
		const customButton = wrapper.querySelector('.js_fileButton');
		const fileDisplay = wrapper.querySelector('.js_fileDisplay');
		const removeButton = wrapper.querySelector('.js_removeButton');

		const wpcf7Wrap = wrapper.nextElementSibling;
		const realInput = wpcf7Wrap?.querySelector('input[type="file"]');

		if (!customButton || !fileDisplay || !removeButton || !realInput) {
			console.warn('必要な要素が見つかりませんでした:', wrapper);
			return;
		}

		// 🎯 ラッパー全体にクリックイベント
		wrapper.addEventListener('click', (e) => {
			// 削除ボタンがクリックされた場合は除外
			if (e.target === removeButton || removeButton.contains(e.target)) {
				return;
			}
			realInput.click();
		});

		// ⌨️ キーボード操作
		wrapper.addEventListener('keydown', (e) => {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				realInput.click();
			}
		});

		// 📁 ファイル選択時
		realInput.addEventListener('change', function (e) {
			const file = e.target.files[0];
			if (file) {
				displayFile(file, fileDisplay, removeButton);
			} else {
				clearFile(fileDisplay, removeButton);
			}
		});

		// ❌ 削除ボタン
		removeButton.addEventListener('click', (e) => {
			e.stopPropagation(); // 👈 重要！親へのイベント伝播を止める
			realInput.value = '';
			clearFile(fileDisplay, removeButton);
		});
	});

	function displayFile(file, displayElement, removeBtn) {
		displayElement.textContent = file.name;
		displayElement.classList.remove('-empty');
		removeBtn.classList.add('-show');
	}

	function clearFile(displayElement, removeBtn) {
		displayElement.textContent = '選択されていません';
		displayElement.classList.add('-empty');
		removeBtn.classList.remove('-show');
	}
}
