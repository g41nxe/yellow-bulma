var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    browser = require('browser-sync'),
    spawn = require('child_process').spawn,
    chdir = require('chdir'),
    image = require('gulp-image'),
    rm = require('gulp-rm');

var files = {
    css: {
        in: './src/frontend/scss/**/*.scss',
        out: './yellow/system/themes/assets/css'
    },
    js: {
        in: './src/frontend/js/**/*.js',
        out: './yellow/system/themes/assets/js'
    },
    yellow: {
        in: './src/yellow/**/*',
        out: './yellow/'
    },
    images: {
        in: './src/frontend/img/**/*',
        out: './yellow/media/images/'
    }
};

gulp.task('sass', function () {
    return gulp
        .src(files.css.in)
        .pipe(sourcemaps.init())
        .pipe(concat('app.scss'))
        .pipe(gulp.dest(files.css.out))
        .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(autoprefixer({
            browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
        }))
        .pipe(gulp.dest(files.css.out));
});

gulp.task('yellow', function () {
    return gulp
            .src(files.yellow.in)
            .pipe(gulp.dest(files.yellow.out));
});

gulp.task('image', function () {
    gulp.src(files.images.in)
        .pipe(image({
            pngquant: true,
            optipng: false,
            zopflipng: true,
            jpegRecompress: false,
            mozjpeg: true,
            guetzli: false,
            gifsicle: true,
            svgo: true,
            concurrent: 10,
            quiet: true // defaults to false
        }))
        .pipe(gulp.dest(files.images.out));
});

gulp.task('uglify', function () {
    return gulp.src(files.js.in)
        .pipe(sourcemaps.init())
        .pipe(concat('app.js'))
        .pipe(gulp.dest(files.js.out))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(files.js.out));
});

gulp.task('clean', function () {
    return gulp.src('./build', {read: false})
        .pipe(rm({async: false}));

});

gulp.task('build', ['yellow', 'uglify', 'image', 'sass'], function () {
    var ps = spawn('php',
        [
            'yellow.php', 'build', '../build'
        ],
        {
            cwd: './yellow'
        });

    ps.on('exit', function () {
        console.log('[PHP] Site was updated');
        browser.reload();
    });
});

gulp.task('browser-sync', function () {
    browser.init({
        server: {
            baseDir: "./build"
        }
    });
});

gulp.task('watch', function () {
    return gulp
        .watch([files.js.in, files.css.in, files.images.in, files.yellow.in], ['build'])
        .on('change', function (event) {
            console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        }).baseDir;
});

gulp.task('default', ['build', 'browser-sync', 'watch']);