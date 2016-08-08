var elixir = require('laravel-elixir');
var webpack = require('webpack');
var gutil = require('gulp-util');
var path = require('path');
var plugins = require('gulp-load-plugins')();

// Load environment variables
require('dotenv').config();

// Create tiles for each map with gdal2tiles
gulp.task('generate_tiles', function() {
    gulp.src('resources/tiles/**/**.{jpg,png}')
        .pipe(plugins.exec(process.env.GDAL2TILES_PATH + ' -p raster -z 0-5 -w none <%= file.path %> public/tiles/<%= file.path.split("/").pop().split(".")[0] %>'));
});

// Minify tiles
gulp.task('minify_tiles', function() {
    return gulp.src('public/tiles/**/**.png')
               .pipe(plugins.image())
               .pipe(gulp.dest('public/tiles'));
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
        devtool: 'source-maps',
        plugins: [
            new webpack.DefinePlugin({
                'process.env': {
                    'NODE_ENV': JSON.stringify(elixir.inProduction ? 'production' : '0elopment')
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
                        plugins: [
                            'babel-plugin-transform-es2015-template-literals',
                            'babel-plugin-transform-es2015-literals',
                            'babel-plugin-transform-es2015-function-name',
                            'babel-plugin-transform-es2015-arrow-functions',
                            'babel-plugin-transform-es2015-block-scoped-functions',
                            'babel-plugin-transform-es2015-classes',
                            'babel-plugin-transform-es2015-object-super',
                            'babel-plugin-transform-es2015-shorthand-properties',
                            'babel-plugin-transform-es2015-computed-properties',
                            'babel-plugin-transform-es2015-for-of',
                            'babel-plugin-transform-es2015-sticky-regex',
                            'babel-plugin-transform-es2015-unicode-regex',
                            'babel-plugin-check-es2015-constants',
                            'babel-plugin-transform-es2015-spread',
                            'babel-plugin-transform-es2015-parameters',
                            'babel-plugin-transform-es2015-destructuring',
                            'babel-plugin-transform-es2015-block-scoping',
                            'babel-plugin-transform-es2015-typeof-symbol',
                            ['babel-plugin-transform-regenerator', { async: false, asyncGenerators: false }],
                        ],
                        presets: ['react']
                    }
                }
            ]
        }
    }, function(err, stats) {
        if (err) throw new gutil.PluginError('webpack', err);

        // @todo somehow pass this through elixir for pretty output
        gutil.log('[webpack]', stats.toString());
        cb();
    });
});

elixir(function(mix) {

    mix.sass('app.scss')
        .task('webpack', 'resources/assets/js/**/*.js')
        .version(['css/app.css', 'js/app.js'])
        .browserSync({
            proxy: process.env.APP_URL,
            notify: false
        });
});
