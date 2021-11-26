const { src, dest, parallel, watch} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const mode = require('gulp-mode')({
  modes: ["prod", "dev"],
  default: "dev"
});

function buildStyles() {
    return src('./assets/src/scss/main.scss')
        .pipe(mode.dev(sourcemaps.init()))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(mode.dev(sourcemaps.write()))
        .pipe(dest('./web/css/'));
}

function buildJs() {
    return src('./assets/src/js/main.js')
        .pipe(mode.prod(uglify()))
        .pipe(dest('./web/js/'));
}

exports.watch = function() {
    watch('./assets/src/js/**/*.js', buildJs);
    watch('./assets/src/scss/**/*.scss', buildStyles);
};
exports.build = parallel(buildStyles, buildJs);
