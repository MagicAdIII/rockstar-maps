import elixir from 'laravel-elixir'
import dotenv from 'dotenv'

export const dirs = {
    src: 'resources/assets',
    dist: 'public'
}

export const scripts = {
    src: `${dirs.src}/js/app.js`,
    build: `${dirs.dist}/app.js`
}

export const styles = {
    src: `${dirs.src}/sass/app.scss`,
    build: `${dirs.dist}/app.css`
}

elixir.config.dotenv = dotenv.config()

elixir.config.browserSync = {
    open: false,
    proxy: process.env.APP_URL,
    reloadOnRestart: true,
    notify: false
}