var elixir = require('laravel-elixir');
var webpack = require('webpack');

module.exports = {
	devtool: 'source-maps',
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
                    presets: [
                        // modules: false for exlcuding commonjs plugin from the preset, so Webpack tree shaking can work
                        ['es2015', { modules: false }],
                        'react'
                    ]
                }
            }
        ]
    }
};