var gulp = require('gulp'),
    autoprefixer = require('autoprefixer'),
    browserSync = require('browser-sync'),
    $ = require('gulp-load-plugins')({ lazy: true }),
    sourcemaps = require('gulp-sourcemaps'),
    del = require('del');

    const config = require( './jetwp.config.js' );
    const utils = require('./jetwp.functions.js');

function buildDelete(done) {
    console.log('Deleteing old build files');

    del(utils.getCompiledAssets(), {
        silent: true,
        strict: false
    });
    done();
}

function buildCompress(done) {
    setTimeout(function(){
        console.log('Transpiling & minifiying scss files');

        gulp.src(utils.getSaasSources('ltr'))
        .pipe(sourcemaps.init())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.postcss([autoprefixer(config.browsers)]))
        .pipe($.cleanCss())
        .pipe(sourcemaps.write())
        .pipe($.rename(config.prod.names.css +'.css'))
        .pipe(gulp.dest(config.prod.paths.css))
        .pipe($.cssmin())
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.prod.paths.css))
        .pipe(browserSync.reload({ stream: true }));

        console.log('Transpiling & minifiying rtl version scss files');

        gulp.src(utils.getSaasSources('rtl'))
        .pipe(sourcemaps.init())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.postcss([autoprefixer(config.browsers)]))
        .pipe($.cleanCss())
        .pipe(sourcemaps.write())
        .pipe($.rename(config.prod.names.css + '.css'))
        .pipe(gulp.dest(config.prod.paths.css))
        .pipe($.cssmin())
        .pipe($.rename({suffix: '.min'}))
        .pipe(gulp.dest(config.prod.paths.css))
        .pipe(browserSync.reload({ stream: true }));
    }, 1000);

    setTimeout(function(){
        console.log('Compressing & minifiying js files');

        gulp.src([
            './assets/js/*.js'
        ])
        .pipe($.concat(config.prod.names.js + '.js'))
        .pipe(gulp.dest(config.prod.paths.js))
        .pipe($.rename({suffix: '.min'}))
        .pipe($.uglify().on('error', function(uglify) {
            console.error(uglify.message, uglify);
        }))
        .pipe(gulp.dest(config.prod.paths.js));

        done();
    }, 3000);
}

function buildGzip(done) {
    console.log('Creating gzip encoded versions');

    setTimeout(function(){
        gulp.src(config.prod.paths.js + config.prod.names.js + '.min.js')
            .pipe($.gzip({append: true}))
            .pipe(gulp.dest(config.prod.paths.js));

        gulp.src(config.prod.paths.css + config.prod.names.css + '.min.css')
            .pipe($.gzip({append: true}))
            .pipe(gulp.dest(config.prod.paths.css));

        gulp.src(config.prod.paths.css + 'rtl.min.css')
            .pipe($.gzip({append: true}))
            .pipe(gulp.dest(config.prod.paths.css));

        done();
    }, 10000);
}

function browserSyncProxy(done) {
    browserSync({
        proxy: config.url
    });

    done();
}

function watch(done) {
    // Watch .html files
    gulp.watch("**/*.php").on('change', browserSync.reload);
    // Watch .sass files
    gulp.watch('assets/sass/**/*.scss', gulp.series(['buildDelete','buildCompress', browserSync.reload]));
    // Watch .js files
    gulp.watch('assets/js/*.js').on('change', browserSync.reload)
    // Watch .js files
    gulp.watch('vendor/*', gulp.series(['buildDelete','buildCompress', browserSync.reload]));
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