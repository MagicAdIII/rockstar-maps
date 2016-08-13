import plugins from 'gulp-load-plugins'
import gutil, { log } from 'gulp-util'
import path from 'path'
plugins()

/**
 * Create tiles for each map with gdal2tiles.
 *
 * @return {Function}
 */
gulp.task('tiles:generate', () => {
    gulp.src('resources/tiles/**/**.{jpg,png}')
        .pipe(plugins().exec(process.env.GDAL2TILES_PATH + ' -p raster -z 0-5 -w none <%= file.path %> public/tiles/<%= file.path.split("/").pop().split(".")[0] %>'))
})

/**
 * Minify tiles.
 *
 * @return {Function}
 */
gulp.task('tiles:compress', () => {
    return gulp.src('public/tiles/**/**.png')
               .pipe(plugins().image())
               .pipe(gulp.dest('public/tiles'))
})

/**
 * Generate and compress tiles.
 *
 * @return {Function}
 */
gulp.task('tiles', ['tiles:generate', 'tiles:compress'])