var gulp = require('gulp'),
    autoprefixer = require('autoprefixer'),
    browserSync = require('browser-sync'),
    $ = require('gulp-load-plugins')({ lazy: true }),
    sourcemaps = require('gulp-sourcemaps');

var baseUrl = 'localhost/wp/';

gulp.task('styles', function () {
    return gulp
        .src(['assets/sass/**/*.scss', '!assets/sass/{rtl,rtl/**/*}'])
        .pipe(sourcemaps.init())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.postcss([autoprefixer(['last 2 version', 'safari 8'])]))
        .pipe($.cleanCss())
        // on prod remove sourcemaps
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({ stream: true }));
});

gulp.task('rtl', function () {
    return gulp
        .src('assets/sass/rtl/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.postcss([autoprefixer(['last 2 version', 'safari 8'])]))
        .pipe($.cleanCss())
        // on prod remove sourcemaps
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({ stream: true }));
});

gulp.task('browser-sync', ['styles'], function () {
    browserSync({
        proxy: baseUrl
    });
});

gulp.task('watch', function () {
    // Watch .html files
    gulp.watch("**/*.php").on('change', browserSync.reload);
    // Watch .sass files
    gulp.watch('assets/sass/**/*.scss', ['styles', 'rtl', browserSync.reload]);
    // Watch .js files
    gulp.watch('assets/js/*.js').on('change', browserSync.reload)
    // Watch .js files
    gulp.watch('assets/js/vendor/*', ['vendorScripts', browserSync.reload]);
    // Watch image files
    gulp.watch('src/images/**/*', ['images', browserSync.reload]);
});

gulp.task('default', function () {
    gulp.start(
        'styles',
        'rtl',
        'browser-sync',
        'watch'
    );
});