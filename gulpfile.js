const gulp = require('gulp');

const sass = require('gulp-sass');
const concat = require('gulp-concat');
const rename = require('gulp-rename');

gulp.task('sass', function () {
    return gulp.src('./resources/sass/*.sass')
        .pipe(sass())
        .pipe(gulp.dest('./public/css'));
});

gulp.task('fonts', function () {
    return gulp.src(['node_modules/font-awesome/fonts/*'])
        .pipe(gulp.dest('public/fonts/'))
});

gulp.task('default', ['sass', 'fonts']);