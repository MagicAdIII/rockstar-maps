var elixir = require('laravel-elixir');
var webpack = require('webpack');
var gutil = require('gulp-util');
var path = require('path');
var plugins = require('gulp-load-plugins')();

// Load environment variables
require('dotenv').config();

// Create tiles for each map with gdal2tiles
gulp.task('generate_tiles', function() {
    gulp.src('resources/maps/**/**.{jpg,png}')
        .pipe(plugins.exec(process.env.GDAL2TILES_PATH + ' -p raster -z 0-5 -w none <%= file.path %> public/maps/<%= file.path.split("/").pop().split(".")[0] %>'));
});

// Minify tiles
gulp.task('minify_tiles', function() {
    return gulp.src('public/maps/**/**.png')
               .pipe(plugins.image())
               .pipe(gulp.dest('public/maps'));
});

// Create & minify tiles
gulp.task('tiles', ['generate_tiles', 'minify_tiles']);

// Create javascript bundle
gulp.task('webpack', function(cb) {
    return webpack({
        entry: './resources/assets/js/app.js',
        output: {
            path: path.join(__dirname, 'public/js'),
            filename: 'app.js'
        },
       plugins: [
            new webpack.DefinePlugin({
                'process.env': {
                    'NODE_ENV': JSON.stringify(elixir.inProduction ? 'production' : 'development')
                }
            })
        ],
        module: {
            loaders: [
                {
                    test: /.jsx?$/,
                    loader: 'babel-loader',
                    exclude: /node_modules/,
                    query: {
                        presets: ['es2015-webpack', 'react']
                    }
                }
            ]
        }
    }, function(err, stats) {
        if (err) {
            throw new gutil.PluginError('webpack', err);
        }

        // @todo somehow pass this through elixir for pretty output
        gutil.log('[webpack]', stats.toString());
        cb();
    });
});

elixir(function(mix) {
    mix.sass('app.scss')
       .task('webpack', 'resources/assets/js/**/*.js')
       .version([
            'css/app.css',
            'js/app.js'
        ]);
});