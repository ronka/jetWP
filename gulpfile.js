var gulp = require('gulp'),
    autoprefixer = require('autoprefixer'),
    browserSync = require('browser-sync'),
    $ = require('gulp-load-plugins')({ lazy: true }),
    sourcemaps = require('gulp-sourcemaps'),
    del = require('del');

var baseUrl = 'localhost/wp/',
    jsFile = 'dist',
    cssFile = 'style';

function buildDelete(done) {
    console.log('Deleteing old build files');

    del([
        './assets/js/' + jsFile + '.js',
        './assets/js/' + jsFile + '.min.js',
        './assets/js/' + jsFile + '.min.js.gz',
        './' + cssFile + '.css',
        './' + cssFile + '.min.css',
        './' + cssFile + '.min.css.gz'
    ], {
        silent: true,
        strict: false
    });
    done();
}

function buildCompress(done) {
    setTimeout(function(){
        console.log('Transpiling & minifiying scss files');

        gulp.src(['./assets/sass/**/*.scss', '!assets/sass/{rtl,rtl/**/*}'])
        .pipe(sourcemaps.init())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.postcss([autoprefixer(['last 2 version', 'safari 8'])]))
        .pipe($.cleanCss())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'+ cssFile +'.css'))
        .pipe($.cssmin())
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({ stream: true }));

        console.log('Transpiling & minifiying rtl version scss files');

        gulp.src(['assets/sass/rtl/**/*.scss'])
        .pipe(sourcemaps.init())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.postcss([autoprefixer(['last 2 version', 'safari 8'])]))
        .pipe($.cleanCss())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./'))
        .pipe($.cssmin())
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest('./'))
        .pipe(browserSync.reload({ stream: true }));
    }, 1000);

    setTimeout(function(){
        console.log('Compressing & minifiying js files');

        gulp.src([
            './assets/js/*.js'
        ])
        .pipe($.concat(jsFile + '.js'))
        .pipe(gulp.dest('./assets/js'))
        .pipe($.rename({suffix: '.min'}))
        .pipe($.uglify().on('error', function(uglify) {
            console.error(uglify.message, uglify);
        }))
        .pipe(gulp.dest('./assets/js'));

        done();
    }, 3000);
}

function buildGzip(done) {
    console.log('Creating gzip encoded versions');

    setTimeout(function(){
        gulp.src('./assets/js/' + jsFile + '.min.js')
            .pipe($.gzip({append: true}))
            .pipe(gulp.dest('./assets/js'));

        gulp.src('./'+ cssFile +'.min.css')
            .pipe($.gzip({append: true}))
            .pipe(gulp.dest('./'));

        gulp.src('./rtl.min.css')
            .pipe($.gzip({append: true}))
            .pipe(gulp.dest('./'));

        done();
    }, 10000);
}

function browserSyncProxy(done) {
    browserSync({
        proxy: baseUrl
    });

    done();
}

function watch(done) {
    // Watch .html files
    gulp.watch("**/*.php").on('change', browserSync.reload);
    // Watch .sass files
    gulp.watch('assets/sass/**/*.scss', gulp.series(['buildDelete','buildCompress', 'buildGzip', browserSync.reload]));
    // Watch .js files
    gulp.watch('assets/js/*.js').on('change', browserSync.reload)
    // Watch .js files
    gulp.watch('vendor/*', gulp.series(['buildDelete','buildCompress', 'buildGzip', browserSync.reload]));
    // Watch image files
    gulp.watch('src/images/**/*', browserSync.reload);

    done();
}


gulp.task('buildDelete', buildDelete);
gulp.task('buildCompress', buildCompress);
gulp.task('buildGzip', buildGzip);
gulp.task('browserSyncProxy', browserSyncProxy);
gulp.task('watch', watch);
gulp.task('default', gulp.series(['buildDelete', 'buildCompress', 'buildGzip', 'browserSyncProxy', 'watch']));