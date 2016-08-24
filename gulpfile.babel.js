'use strict'

import elixir from 'laravel-elixir'
import dotenv from 'dotenv'
import './gulp.tasks'

/**
 * Config
 */
dotenv.config()
elixir.config.browserSync = {
    open: false,
    proxy: process.env.APP_URL,
    reloadOnRestart: true,
    notify: false
}

/**
 * Build
 */
elixir(mix => {

    // Compile assets.
    mix.sass('app.scss')
       .rollup('maps/maps.js')

    // Version the assets on production only.
    elixir.inProduction && mix.version([
        'public/css/app.css',
        'public/js/maps.js'
    ])

    // Live reload the browser on file updates.
    elixir.isWatching() && mix.browserSync()
})