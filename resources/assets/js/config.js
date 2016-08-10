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
        collapsed: false,
        groupCheckboxes: true
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
        defaultLayer: 'Atlas',
        defaultZoom: 3,
        defaultView: [27.35, -752.05],
        transform: {
            a: 1 / 12446,
            b: 3756 / 8192,
            c: -1 / 12446,
            d: 5525 / 8192
        }
    },

    gtaiv: {
        layers: {
            road: {
                name: 'Roadmap',
                bg: '#5D7C8D',
                minZoom: 1,
                maxZoom: 5,
            },
        },
        defaultLayer: 'road',
        defaultZoom: 3,
        defaultView: [-0.30, 0.34],
        transform: {
            a: 0.5,
            b: 0.5,
            c: 0.5,
            d: 0.5
        }
    }
};

export default config;
