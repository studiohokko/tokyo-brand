require('dotenv').config();

const { src, dest, watch, series, parallel, lastRun } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssdeclsort = require('css-declaration-sorter');
const gcmq = require('gulp-group-css-media-queries');
const mode = require('gulp-mode')();
const cssnano = require('cssnano');
const rename = require('gulp-rename');
const browserSync = require('browser-sync');
const htmlBeautify = require('gulp-html-beautify');
const crypto = require('crypto');
const hash = crypto.randomBytes(8).toString('hex');
const replace = require('gulp-replace');
const tinypng = require('gulp-tinypng-extended');
const webp = require('gulp-webp');
const webpackStream = require('webpack-stream');
const webpack = require('webpack');
const webpackConfig = require('./webpack.config');
const cheerio = require('gulp-cheerio');
const fs = require('fs');
const path = require('path');

// 自動生成するSCSSファイルのインデント(タブ3個分。HTML整形の設定に合わせる)
const SCSS_INDENT = '\t\t\t';

const compileSass = () => {
	const postcssPlugins = [
		autoprefixer({
			grid: 'autoplace',
			cascade: false,
		}),
		cssdeclsort({ order: 'smacss' }),
	];
	return src('./src/assets/scss/**/*.scss', { sourcemaps: true })
		.pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
		.pipe(sass({ outputStyle: 'expanded' }))
		.pipe(postcss(postcssPlugins))
		.pipe(mode.production(gcmq()))
		.pipe(dest('./public/assets/css', { sourcemaps: './sourcemaps' }));
};

const minifyCss = () => {
	return src(['./public/assets/css/**.css', '!./public/assets/css/**.min.css'], { sourcemaps: true })
		.pipe(postcss([cssnano()]))
		.pipe(
			rename({
				suffix: '.min',
			}),
		)
		.pipe(dest('./public/assets/css', { sourcemaps: 'sourcemaps' }));
};

const bundleJs = () => {
	return webpackStream(webpackConfig, webpack)
		.on('error', function (e) {
			console.error(e);
			this.emit('end');
		})
		.pipe(dest('public/assets/js'));
};

const formatHTML = () => {
	return src('./src/**/*.html')
		.pipe(
			htmlBeautify({
				indent_size: 3,
				indent_with_tabs: true,
			}),
		)
		.pipe(dest('./public'));
};

const createScss = () => {
	return src(['public/**/*.html', '../*.php']).pipe(
		cheerio(function ($) {
			const layoutIndexScssPath = 'src/assets/scss/layout/_index.scss';
			const projectIndexScssPath = 'src/assets/scss/project/_index.scss';
			const componentIndexScssPath = 'src/assets/scss/component/_index.scss';
			const utilityIndexScssPath = 'src/assets/scss/utility/_index.scss';

			let layoutIndexScssContent = fs.existsSync(layoutIndexScssPath) ? fs.readFileSync(layoutIndexScssPath, 'utf8') : '';
			let projectIndexScssContent = fs.existsSync(projectIndexScssPath) ? fs.readFileSync(projectIndexScssPath, 'utf8') : '';
			let componentIndexScssContent = fs.existsSync(componentIndexScssPath) ? fs.readFileSync(componentIndexScssPath, 'utf8') : '';
			let utilityIndexScssContent = fs.existsSync(utilityIndexScssPath) ? fs.readFileSync(utilityIndexScssPath, 'utf8') : '';

			$('*[class]').each(function () {
				const classes = $(this).attr('class').split(/\s+/);
				classes.forEach(function (className) {
					let targetPath, indexScssContent;
					const baseClassName = className.split('__')[0];
					const scssClassName = `_${baseClassName}`;

					if (className.startsWith('l-')) {
						targetPath = 'src/assets/scss/layout';
						indexScssContent = layoutIndexScssContent;
					} else if (className.startsWith('p-')) {
						targetPath = 'src/assets/scss/project';
						indexScssContent = projectIndexScssContent;
					} else if (className.startsWith('c-')) {
						targetPath = 'src/assets/scss/component';
						indexScssContent = componentIndexScssContent;
					} else if (className.startsWith('u-')) {
						targetPath = 'src/assets/scss/utility';
						indexScssContent = utilityIndexScssContent;
					} else {
						return;
					}

					const scssFilePath = path.join(targetPath, scssClassName + '.scss');
					if (!fs.existsSync(scssFilePath)) {
						fs.writeFileSync(scssFilePath, `@use "../global" as *;\n\n.${baseClassName} {\n${SCSS_INDENT}}`);
						indexScssContent += `@use "${baseClassName}";\n`;
					}

					if (className.startsWith('l-')) {
						layoutIndexScssContent = indexScssContent;
					} else if (className.startsWith('p-')) {
						projectIndexScssContent = indexScssContent;
					} else if (className.startsWith('c-')) {
						componentIndexScssContent = indexScssContent;
					} else if (className.startsWith('u-')) {
						utilityIndexScssContent = indexScssContent;
					}
				});
			});

			fs.writeFileSync(layoutIndexScssPath, layoutIndexScssContent);
			fs.writeFileSync(projectIndexScssPath, projectIndexScssContent);
			fs.writeFileSync(componentIndexScssPath, componentIndexScssContent);
			fs.writeFileSync(utilityIndexScssPath, utilityIndexScssContent);
		}),
	);
};

const buildServer = (done) => {
	// .env の BS_PROXY に値があれば動的サイト(プロキシ)、空なら静的サイト(public配信)
	const proxy = process.env.BS_PROXY;
	const serverConfig = proxy ? { proxy } : { server: { baseDir: './public' } };

	browserSync.init({
		...serverConfig,
		port: Number(process.env.BS_PORT) || 8080,
		open: true,
		// リロードは gulp の watch から browserReload で明示的に行うため、
		// browser-sync 自体のファイル監視は無効化する
		notify: false,
	});
	done();
};

const browserReload = (done) => {
	browserSync.reload();
	done();
};

// public 配下の png/jpg を TinyPNG で圧縮する(ソースは変更しない)
const tinyPng = () => {
	const sigFilePath = './src/assets/img/.tinypng-sigs';

	// シグネチャファイルが存在しない場合は作成
	if (!fs.existsSync(sigFilePath)) {
		fs.writeFileSync(sigFilePath, '{}');
		console.log('TinyPNG signature file created');
	}

	return src('./public/assets/img/**/*.{png,jpg,jpeg}', {
		since: lastRun(tinyPng), // 前回実行以降に変更されたファイルのみ
	})
		.pipe(plumber())
		.pipe(
			tinypng({
				key: process.env.TINYPNG_API_KEY,
				sigFile: sigFilePath,
				log: true,
				summarise: true,
				sameDest: true,
				parallel: 10,
			}),
		)
		.pipe(dest('./public/assets/img'));
};

const copyImages = () => {
	return src(['./src/assets/img/**/*'], {
		since: lastRun(copyImages),
		encoding: false,
	}).pipe(dest('./public/assets/img'));
};

const generateWebp = () => {
	return src('./public/assets/img/**/*.{png,jpg,jpeg}', { since: lastRun(generateWebp) })
		.pipe(webp())
		.pipe(dest('public/assets/img'));
};

const cacheBusting = () => {
	return src('./public/**/*.html')
		.pipe(replace(/\.(js|css)\?ver/g, '.$1?ver=' + hash))
		.pipe(replace(/\.(webp|jpg|jpeg|png|svg|gif)\?ver/g, '.$1?ver=' + hash))
		.pipe(dest('./public'));
};

const watchFiles = () => {
	watch('./src/assets/scss/**/*.scss', series(compileSass, minifyCss, browserReload));
	watch('./src/assets/js/**/*.js', series(bundleJs, browserReload));
	watch('./src/assets/img/**/*', series(copyImages, tinyPng, generateWebp, browserReload));
	watch('./src/**/*.html', series(formatHTML, createScss, browserReload));
	watch('../*.php', series(createScss, browserReload));
};

module.exports = {
	sass: compileSass,
	mini: minifyCss,
	bundle: bundleJs,
	format: formatHTML,
	create: createScss,
	tinypng: tinyPng,
	webp: generateWebp,
	image: series(copyImages, tinyPng, generateWebp),
	cache: cacheBusting,
	build: series(compileSass, parallel(minifyCss, bundleJs, formatHTML, createScss), copyImages, tinyPng, generateWebp, cacheBusting),
	default: parallel(buildServer, watchFiles),
};
