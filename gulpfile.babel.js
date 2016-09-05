'use strict'

import elixir from 'laravel-elixir'
import gutil, { log } from 'gulp-util'
import 'laravel-elixir-eslint'
import plugins from 'gulp-load-plugins'
import dotenv from 'dotenv'
import path from 'path'

plugins()
dotenv.config()

elixir.config.browserSync = {
    open: false,
    proxy: process.env.APP_URL,
    reloadOnRestart: true,
    notify: false
}

/**
 * Create tiles for each map with gdal2tiles.
 */
gulp.task('tiles:generate', () => {
    gulp.src('resources/tiles/**/**.{jpg,png}')
        .pipe(plugins().exec(process.env.GDAL2TILES_PATH + ' -p raster -z 0-5 -w none <%= file.path %> public/tiles/<%= file.path.split("/").pop().split(".")[0] %>'))
})

/**
 * Minify tiles.
 */
gulp.task('tiles:compress', () => {
    return gulp.src('public/tiles/**/**.png')
               .pipe(plugins().image())
               .pipe(gulp.dest('public/tiles'))
})

/**
 * Generate and compress tiles.
 */
gulp.task('tiles', ['tiles:generate', 'tiles:compress'])

/**
 * Build.
 */
elixir(mix => {
    let isWatching = elixir.isWatching()

    // Lint files, if not watching.
    ! isWatching && mix.eslint('resources/assets/js/**/*.js')

    // Compile assets.
    mix.sass('app.scss')
       .rollup('maps/index.js')

    // Version the assets on production only.
    elixir.inProduction && mix.version([
        'public/css/app.css',
        'public/js/maps.js',
    ])

    // Live reload the browser on file updates.
    isWatching && mix.browserSync()
})