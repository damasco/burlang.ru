const {src, dest, parallel} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');

function buildStyles() {
  return src('./assets/src/scss/main.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(cleanCSS())
    .pipe(dest('./public/css/'));
}

function buildJs() {
  return src('./assets/src/js/main.js')
    .pipe(uglify())
    .pipe(dest('./public/js/'));
}

exports.build = parallel(buildStyles, buildJs);
