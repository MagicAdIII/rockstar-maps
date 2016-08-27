'use strict'

import elixir from 'laravel-elixir'
import gutil, { log } from 'gulp-util'
import 'laravel-elixir-eslint'
import plugins from 'gulp-load-plugins'
import dotenv from 'dotenv'
import path from 'path'

plugins()

/**
 * Config
 */
class ConfigObject {

    constructor() {
        this.dotenv = dotenv.config()

        this.browserSync = elixir.config.browserSync = {
            open: false,
            proxy: this.dotenv.APP_URL,
            reloadOnRestart: true,
            notify: false
        }

        this.css = {
            assetsDir: elixir.config.get('assets.css.sass.folder'),
            publicDir: elixir.config.get('public.css.sass.outputFolder')
        }

        this.js = {
            assetsDir: elixir.config.get('assets.js.folder'),
            publicDir: elixir.config.get('public.js.outputFolder')
        }

        this.styles = `${this.css.assetsDir}/app.scss`
        this.scripts = `${this.js.assetsDir}/maps/maps.js`
        this.versioned = [
            `${this.css.publicDir}/**/*.css`,
            `${this.js.publicDir}/**/*.js`
        ]
    }

    static get styles() {
        return this.styles
    }

    static get scripts() {
        return this.scripts
    }

    static get versioned() {
        return this.versioned
    }
}

const Config = new ConfigObject()

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

    // Compile assets.
    mix.sass(Config.styles)
       .eslint(Config.scripts)
       .rollup(Config.scripts)

    // Version the assets on production only.
    elixir.inProduction && mix.version(Config.versioned)

    // Live reload the browser on file updates.
    elixir.isWatching() && mix.browserSync()
})