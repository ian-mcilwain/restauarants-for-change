var gulp   = require('gulp'),
		sass = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		concat = require('gulp-concat');
		jshint = require('gulp-jshint');

gulp.task('default', ['styles', 'watch']);

gulp.task('styles', function() {
	return gulp.src('sass/**/*.scss')
		.pipe(sass({
			'sourcemap=none': true,
			errLogToConsole: true
		}))
		.pipe(concat('style.css'))
		.pipe(autoprefixer('style.css'))
		.pipe(gulp.dest('.'));
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
	gulp.watch('sass/**/*.scss', ['styles']);
});

gulp.task('jshint', function() {
	return gulp.src('js/*.js')
		.pipe(jshint())
});