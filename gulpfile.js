
/*=============================================
=            Config And Settings            =
=============================================*/

// Change to your url
var baseUrl = 'localhost/_playground/wordpress/';

var gulp         = require('gulp'),
    argv         = require('yargs').argv,
    browserSync  = require('browser-sync'),
    autoprefixer = require('autoprefixer'),
    $            = require('gulp-load-plugins')({ lazy: true });

var is_dev = true;

/*=============================================
=            CSS tasks            =
=============================================*/

gulp.task('css', function () {
    return gulp
        .src(['assets/sass/**/*.scss', '!assets/sass/{rtl,rtl/**/*}', '!assets/sass/{admin,admin/**/*}'])
        .pipe( $.if( is_dev, $.sourcemaps.init() ) )
        .pipe( $.sass().on('error', $.sass.logError) )
        .pipe( $.postcss([autoprefixer(['last 2 version', 'safari 8'])]) )
        .pipe( $.cleanCss() )
        .pipe( $.if( is_dev, $.sourcemaps.write() ) )
		.pipe( gulp.dest('./') )
		.pipe( $.gzip() )
		.pipe( gulp.dest('./') )
		.pipe( $.if( !is_dev, $.gzip(), gulp.dest('./') ) ) // if production, create a gzip file
        .pipe( browserSync.reload({ stream: true }) );
});

gulp.task('rtl', function () {
    return gulp
        .src('assets/sass/rtl/**/*.scss')
        .pipe( $.if( is_dev, $.sourcemaps.init() ) )
        .pipe( $.sass().on('error', $.sass.logError) )
        .pipe( $.postcss([autoprefixer(['last 2 version', 'safari 8'])]) )
        .pipe( $.cleanCss() )
        .pipe( $.if( is_dev, $.sourcemaps.write() ) )
		.pipe( gulp.dest('./') )
		.pipe( $.gzip() )
		.pipe( gulp.dest('./') )
        .pipe( browserSync.reload({ stream: true }) );
});

/*=====  End of CSS tasks  ======*/


/*=============================================
=            Scripts tasks            =
=============================================*/

gulp.task('js', function () {
    return gulp
        .src('assets/js/src/**/*.js')
        .pipe( $.if( is_dev, $.sourcemaps.init() ) )
        .pipe( $.plumber() )
        .pipe( $.concat('app.js') )
        .pipe( $.babel( {
            presets: ['@babel/env']
        }))
        .pipe( $.if( is_dev, $.sourcemaps.write(), $.uglify() ) )
		.pipe( gulp.dest('assets/js') )
		.pipe( $.gzip() ) // if production, create a gzip file
		.pipe( gulp.dest('assets/js') )
        .pipe( browserSync.reload({ stream: true }));
});

/*=====  End of Scripts tasks  ======*/

gulp.task('browser-sync', ['css'], function () {
    browserSync({
        proxy: baseUrl
    });
});

gulp.task('watch', function () {
    gulp.watch("**/*.php").on('change', browserSync.reload); // Watch .html/.php files
    
    gulp.watch('assets/sass/**/*.scss', ['css', 'rtl', browserSync.reload]); // Watch .sass files
    
    gulp.watch('assets/js/**/*.js', ['scripts', browserSync.reload]); // Watch .js files

    // gulp.watch('src/images/**/*', ['images', browserSync.reload]); // Watch image files
});


/*=============================================
=            Tasks to use            =
=============================================*/

// gulp
gulp.task('default', function () {
    gulp.start(
        'styles',
        'scripts',
        'browser-sync',
        'watch'
    );
});

// gulp build --prod
gulp.task('build', function () {
    // if --prod flag is passed, build without source maps and minified
    is_dev = !argv.prod;
    
    gulp.start(
        'styles',
        'scripts'
    );
});

// gulp styles
gulp.task('styles', function(){
    gulp.start(
        'css',
        'rtl'
    );
});

// gulp scripts
gulp.task('scripts', function(){
    gulp.start(
        'js'
    );
});

/*=====  End of Tasks to use  ======*/
