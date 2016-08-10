import L from 'leaflet';
import 'leaflet-hash';
import 'leaflet-groupedlayercontrol';
import config from '../config';
import $ from 'jquery'; // temp

/**
 * Configuration.
 */
const GAME = config[window.GAMESLUG];
var TRANSFORM = GAME.transform;

/**
 * Create game-specific Coordinate Reference System.
 */
var CRS = L.Util.extend({}, L.CRS, {
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
var baseLayers = {};
var overlays = {}; // @todo (Marker overlays)

for (let layer in GAME.layers) {
	baseLayers[GAME.layers[layer].name] = L.tileLayer('/tiles/' + window.GAMESLUG + '/' + layer + '/{z}/{x}/{y}.png', {
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
	layers: baseLayers[GAME.defaultLayer],
	attributionControl: false,
});

/**
 * This element contains the map.
 */
const containerElement = MAP.getContainer();

L.marker([0, 0], { icon: L.divIcon() }).bindPopup('[0, 0] coords for reference.').addTo(MAP);


/**
 * Layer controls for base maps and overlays.
 *
 * @todo @fixme shitty test of getting marker layers via AJAX.
 */
$.getJSON('/api/maps/' + window.GAMESLUG + '/tree', function (data) {
    var groupedOverlays = {};
    for (let i in data) {
        var group = data[i];
        var points = [];
        for (let j in group.markers) {
            var marker = group.markers[j];
            points.push(L.marker([marker.x, marker.y], { icon : L.divIcon() }).bindPopup(
                '<h4>' + marker.title + '</h4>' + marker.description
            ));
        }
        groupedOverlays[group.title] = L.layerGroup(points);
    }

    // const LAYERS = L.control.groupedLayers(baseLayers, groupedOverlays, config.layersOptions).addTo(MAP);
    L.control.layers(baseLayers, groupedOverlays, config.layersOptions).addTo(MAP);
});

// Leaflet uses grey background by default when there are no more tiles to display.
// This changes it to match the background colour of the current layer's tiles.
containerElement.style.backgroundColor = GAME.layers[GAME.defaultLayer.toLowerCase()].bg;
MAP.on('baselayerchange', function (e) {
    containerElement.style.backgroundColor = e.layer.options.background;
});

// Debug click positions.
MAP.on('click', function (e) {
    console.log('[DEBUG] Clicked @ lat', e.latlng.lat, 'lon', e.latlng.lng);
});

/**
 * leaflet-hash: displays zoom level and bounds in the URI.
 */
var hash = new L.Hash(MAP);
