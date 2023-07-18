const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const plumber = require('gulp-plumber');
const rename = require('gulp-rename');
const inject = require('gulp-inject');
const htmlmin = require('gulp-htmlmin');

const sourcePaths = {
  css: 'resources/css/**/*.css', // Update this path to match your CSS files location
  html: 'resources/views/**/*.blade.php',
};

const buildPaths = {
  css: 'public/css',
};

gulp.task('css', function () {
  return gulp
    .src(sourcePaths.css)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(cleanCSS())
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(buildPaths.css));
});

gulp.task('html', function () {
  return gulp
    .src(sourcePaths.html)
    .pipe(htmlmin({ collapseWhitespace: true }))
    .pipe(gulp.dest('public'));
});

gulp.task('default', gulp.series('css', 'html'));
