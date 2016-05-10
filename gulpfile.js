'use strict';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    cleanCSS = require('gulp-clean-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    del = require('del');

var path = {
    build: {
        js: 'web/js/',
        css: 'web/css/',
        img: 'web/img/'
    },
    src: {
        js: 'assets/src/js/main.js',
        style: 'assets/src/scss/main.scss',
        img: 'assets/src/img/**/*.*'
    },
    watch: {
        js: 'assets/src/js/**/*.js',
        style: 'assets/src/scss/**/*.scss',
        img: 'assets/src/img/**/*.*'
    }
};

var config = {
    sass: {
        outputStyle: 'compressed',
        sourceMap: true,
        errLogToConsole: true
    },
    imagemin: {
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()],
        interlaced: true
    },
    autoprefixer: {
        browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
    },
    cleanCss: {
        compatibility: 'ie8'
    }
};

gulp.task('styles', function () {
    gulp.src(path.src.style)
        .pipe(sourcemaps.init())
        .pipe(sass(config.sass))
        .pipe(autoprefixer(config.autoprefixer))
        .pipe(cleanCSS(config.cleanCss))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css));
});

gulp.task('scripts', function () {
    gulp.src(path.src.js)
        .pipe(rigger())
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.js));
});

gulp.task('images', function () {
    gulp.src(path.src.img)
        .pipe(imagemin(config.imagemin))
        .pipe(gulp.dest(path.build.img));
});

gulp.task('build', ['styles', 'scripts', 'images']);

gulp.task('watch', function() {
    watch(path.watch.style, function() {
        gulp.start('styles');
    });
    watch(path.watch.js, function() {
        gulp.start('scripts');
    });
    watch(path.watch.img, function() {
        gulp.start('images');
    });
});

gulp.task('clean', function() {
    del(['web/css/*', 'web/js/*', 'web/img/*']);
});

gulp.task('default', ['build', 'watch']);