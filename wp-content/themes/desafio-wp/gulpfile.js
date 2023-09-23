"use strict";
const {src, dest, parallel, series, watch} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const maps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const rename = require('gulp-rename');
const cleanCSS = require('gulp-clean-css');
const imagemin = require('gulp-imagemin');
const del = require('del');

var paths = {
	styles: {
		src: 'assets/scss/**/*.scss',
		dest: 'dist/css/'
	},
	admin: {
		src: 'assets/scss/admin.scss',
		dest: 'dist/css/'
	},
	bs: {
		src: 'assets/js/bootstrap/*.js',
		dest: 'dist/js/'
	},
	libs: {
		src: 'assets/js/libs/**/*.js',
		dest: 'dist/js/'
	},
	scripts: {
		src: 'assets/js/**/*.js',
		dest: 'dist/js/'
	},
	imgs: {
		src: 'assets/images/**/*.+(png|jpg|gif|svg)',
		dest: 'dist/images/'
	},
	fonts: {
		src: 'assets/fonts/**/*',
		dest: 'dist/fonts/'
	}
};

// Clean assets

function clean() {
	return del(['dist']);
}

// CSS function

function styles() {
	return src('assets/scss/style.scss')
		.pipe(maps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(cleanCSS())
		.pipe(rename({
			basename: 'style',
			suffix: '.min'
		}))
		.pipe(maps.write('./'))
		.pipe(dest(paths.styles.dest));
}

// Admin CSS function

function stylesAdmin() {
	return src('assets/scss/admin.scss')
		.pipe(maps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(cleanCSS())
		.pipe(rename({
			basename: 'admin',
			suffix: '.min'
		}))
		.pipe(maps.write('./'))
		.pipe(dest(paths.admin.dest));
}

// JS function

function scripts() {
	return src([paths.bs.src, paths.libs.src, paths.scripts.src])
		.pipe(maps.init())
		.pipe(uglify())
		.pipe(concat('main.min.js'))
		.pipe(dest(paths.scripts.dest));
}

// Optimize images

function images() {
	return src(paths.imgs.src)
		.pipe(imagemin([
			imagemin.svgo({
				plugins: [
				  { optimizationLevel: 3 },
				  { progessive: true },
				  { interlaced: true },
				  { removeViewBox: false },
				  { removeUselessStrokeAndFill: false },
				  { cleanupIDs: false }
			   ]
			}),
			imagemin.gifsicle(),
			imagemin.jpegtran(),
			imagemin.optipng()
		]))
		.pipe(dest(paths.imgs.dest));
}

// Copy fonts

function copyFonts() {
	return src(paths.fonts.src)
		.pipe(dest(paths.fonts.dest));
}

// Watch files

function watchFiles() {
	watch(paths.styles.src, styles);
	watch(paths.admin.src, stylesAdmin);
	watch(paths.imgs.src, images);
	watch(paths.libs.src, scripts);
	watch(paths.scripts.src, scripts);
	watch(paths.fonts.src, copyFonts);
	watch("**/*.php");
}


// Tasks to define the execution of the functions simultaneously or in series

exports.watch = parallel(watchFiles);
exports.default = series(clean, parallel(scripts, styles, stylesAdmin, images, copyFonts));
