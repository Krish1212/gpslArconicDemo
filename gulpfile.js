var gulp = require('gulp');

var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minifyHTML = require('gulp-minify-html');
var minifyCSS = require('gulp-cssmin');

// Lint Task
gulp.task('lint', function() {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src(['css/*.scss'])
		.pipe(concat('bundle'))
        .pipe(sass())
        .pipe(gulp.dest('./dist/css'))
        .pipe(rename('bundle.min.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('./dist/css'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    gulp.src(['js/*.js'])
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest('./dist/js'))
        .pipe(rename('bundle.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js'));

    return gulp.src(['js/libs/*.js'])
        .pipe(gulp.dest('./dist/js/'));
});

// COPY files
gulp.task('copy', function() {
    return gulp.src(['*.html'])
        .pipe(gulp.dest('./dist'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('*.html', ['copy']);
    gulp.watch('js/*.js', ['lint', 'scripts']);
    gulp.watch('css/*.scss', ['sass']);
});

gulp.task('default', ['lint', 'sass', 'scripts', 'copy', 'watch']);

