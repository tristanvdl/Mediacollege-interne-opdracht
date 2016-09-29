var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');

//sass
gulp.task('sass', function() {
    gulp.src('src/style/app.scss')
        .pipe(sass({
            style: 'compressed'
        }).on('error', sass.logError))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest('build/assets/css'));
});

//javascript
gulp.task('scripts', function() {
    gulp.src('src/js/**/*.js')
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('build/assets/js'));
});

//watch
gulp.task('watch', function() {
    gulp.watch('src/style/scss/**/*.scss', ['sass']);
    gulp.watch('src/js/*.js', ['scripts']);
});

//default
gulp.task('default', ['sass', 'scripts', 'watch']);
