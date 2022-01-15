const {src, dest, series} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');

function styles() {
  return src('./assets/src/scss/main.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(dest('./public/css/'));
}

function scripts() {
  return src('./assets/src/js/main.js')
    .pipe(uglify())
    .pipe(dest('./public/js/'));
}

exports.build = series(styles, scripts);
