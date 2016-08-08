const config = {

    /**
     * ID of DOM element where the map will be rendered.
     *
     * @type {String}
     */
    containerId: 'map',

    /**
     * Options for Layers Control.
     *
     * @see http://leafletjs.com/reference.html#control-layers
     * @type {Object}
     */
    layersOptions: {
        collapsed: false
    },

    /**
     * This map will load by default, if not specified.
     * Should be the SLUG of the game.
     *
     * @type {String}
     */
    defaultGame: 'gtav',

    /**
     * Game-specific settings.
     *
     * @type {Object}
     */
    gtav: {
        layers: {
            atlas: {
                name: 'Atlas',
                bg: '#0fa8d2',
                minZoom: 1,
                maxZoom: 5,
            },
            road: {
                name: 'Roadmap',
                bg: '#1862ad',
                minZoom: 1,
                maxZoom: 5,
            },
            satellite: {
                name: 'Satellite',
                bg: '#143d6b',
                minZoom: 1,
                maxZoom: 5,
            }
        },
        defaultZoom: 3,
        defaultView: [27.35, -752.05],
        defaultLayer: 'atlas',
        transform: {
            a: 1 / 12446,
            b: 3756 / 8192,
            c: -1 / 12446,
            d: 5525 / 8192
        }
    },

    gtaiv: {
        layers: ['road'],
        defaultLayer: 'road',
        defaultZoom: 5,
        defaultView: [0, 0],
        background: {
            road: '#000',
        }
    }
};

export default config;
