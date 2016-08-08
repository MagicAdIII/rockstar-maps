import L from 'leaflet';
import 'leaflet-hash';
import config from '../config';

/**
 * Configuration.
 */
const GAME = config[window.GAMESLUG];
const TRANSFORM = GAME.transform;

/**
 * Create game-specific Coordinate Reference System.
 */
const CRS = L.Util.extend({}, L.CRS, {
    projection: {
        project: function project(latlng) {
            return new L.Point(latlng.lat, latlng.lng);
        },
        unproject: function unproject(point) {
            return new L.LatLng(point.x, point.y);
        }
    },
    transformation: new L.Transformation(TRANSFORM.a, TRANSFORM.b, TRANSFORM.c, TRANSFORM.d)
});

/**
 * Create and populate objects for base layers.
 */
var baseMaps = {};
var overlays = {}; // @todo (Marker overlays)

for (let layer in GAME.layers) {
	baseMaps[layer] = L.tileLayer('/tiles/' + window.GAMESLUG + '/' + layer + '/{z}/{x}/{y}.png', {
	    minZoom: GAME.layers[layer].minZoom,
	    maxZoom: GAME.layers[layer].maxZoom,
	    noWrap: true,
	    tms: true,
	    background: GAME.layers[layer].bg
	});
}

/**
 * Render the map.
 */
const MAP = L.map(config.containerId, {
	crs: CRS,
	center: GAME.defaultView,
	zoom: GAME.defaultZoom,
	layers: baseMaps[GAME.defaultLayer],
	attributionControl: false,
});

/**
 * This element contains the map.
 */
const containerElement = MAP.getContainer();

/**
 * Layer controls for base maps and overlays.
 *
 * @todo Replace with something better!
 */
const LAYERS = L.control.layers(baseMaps, overlays, config.layersOptions).addTo(MAP);

// Leaflet uses grey background by default when there are no more tiles to display.
// This changes it to match the background colour of the current layer's tiles.
containerElement.style.backgroundColor = GAME.layers[GAME.defaultLayer].bg;
MAP.on('baselayerchange', function (e) {
    containerElement.style.backgroundColor = e.layer.options.background;
});

/**
 * leaflet-hash: displays zoom level and bounds in the URI.
 */
var hash = new L.Hash(MAP);
