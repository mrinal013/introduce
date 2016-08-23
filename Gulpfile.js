var less = require('gulp-less');
var path = require('path');
var gulp = require('gulp');
var watch = require('gulp-watch');

gulp.task('default', function() {


});

gulp.task('less', function () {
  return gulp.src('./style/less/bootstrap.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./style'));
});

gulp.task('watch', function () {
    gulp.watch('./style/less/bootstrap.less', ['less'] );
});
