const { src, dest, parallel, watch, series} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const gulpif = require('gulp-if');
const del = require('del');
const argv = require('yargs').argv;

const PRODUCTION = !!(argv.production);

let path = {
    build: {
        js: 'web/js/',
        css: 'web/css/',
    },
    src: {
        js: 'assets/src/js/main.js',
        style: 'assets/src/scss/main.scss',
    },
    watch: {
        js: 'assets/src/js/**/*.js',
        style: 'assets/src/scss/**/*.scss',
    }
};

let config = {
    sass: {
        outputStyle: 'compressed',
        sourceMap: true,
        errLogToConsole: true
    },
    cleanCss: {
        compatibility: 'ie8'
    }
};

function css() {
    return src(path.src.style)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(sass(config.sass))
        .pipe(autoprefixer())
        .pipe(cleanCSS(config.cleanCss))
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(dest(path.build.css));
}

function js() {
    return src(path.src.js)
        .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
        .pipe(uglify())
        .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
        .pipe(dest(path.build.js));
}

function images() {
    return src(path.src.img)
        .pipe(imagemin(config.imagemin))
        .pipe(dest(path.build.img));
}

function clean() {
    return del(['web/css/*', 'web/js/*']);
}

function watchFiles() {
    watch(path.watch.style, css);
    watch(path.watch.js, js);
}

exports.js = js;
exports.css = css;
exports.clean = clean;
exports.watch = series(clean, watchFiles);
exports.build = series(clean, parallel(css, js));
