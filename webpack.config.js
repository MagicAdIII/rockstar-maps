module.exports = {
    stats: {
        assets: true,
        version: false,
        errorDetails: true
    },
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