var less = require('gulp-less');
var path = require('path');
var gulp = require('gulp');
var watch = require('gulp-watch');
var livereload = require('gulp-livereload');

// Default Task
gulp.task('default', ['less', 'less-main', 'watch']);

gulp.task('less', function () {
  return gulp.src('./style/less/bootstrap.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./style'))
    .pipe(livereload());
});

gulp.task('less-main', function () {
  return gulp.src('./style/main.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./style'))
    .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./style/less/*.less', ['less'] );
    gulp.watch('./style/main.less', ['less-main'] );
});
