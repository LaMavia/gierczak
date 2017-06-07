var gulp = require('gulp');
var postcss = require('gulp-postcss');


gulp.task('styles', function() {
  return gulp.src('style3.less')
        .pipe(postcss())
        .pipe(gulp.dest('css-less_files'));
});

gulp.task('watch:styles', function(){
    gulp.watch('**/*.less', ['styles']);
});