'use strict'

import elixir from 'laravel-elixir'
import { styles, scripts } from './gulp.config.js'
import { generateTiles } from './gulp.tasks'

elixir((mix) => {

    // Compile assets.
    mix.sass(styles.src)
       .webpack(scripts.src)

    // Version the assets on production only.
    elixir.inProduction && mix.version([
        styles.build,
        scripts.build
    ])

    // Live reload the browser on file updates.
    elixir.isWatching() && mix.browserSync()
})