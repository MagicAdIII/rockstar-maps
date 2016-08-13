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
            }
        ]
    }
};