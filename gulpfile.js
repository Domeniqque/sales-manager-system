const gulp = require('gulp');

const sass = require('gulp-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');

gulp.task('sass', function () {
    return gulp.src('./resources/sass/*.sass')
        .pipe(sass())
        .pipe(gulp.dest('./public/css'));
});

gulp.task('default', ['sass']);