import L from 'leaflet';

/**
 * Temporary - should be cut into parts.
 */

var mapContainer = 'map';
var spaceshipParts = L.layerGroup([
	L.marker([ -1219, -3495.9 ]),
	L.marker([ 606.9, -3250.19 ]),
	L.marker([ 1590.6, -2810.17 ]),
	L.marker([ 327.99, -2757.61 ]),
	L.marker([ 1134.42, -2607.02 ]),
	L.marker([ 368.93, -2118.53 ]),
	L.marker([ 1741.82, -1623.85 ]),
	L.marker([ 287.73, -1444.4 ]),
	L.marker([ 17.6, -1213.2 ]),
	L.marker([ -910.02, -1147.44 ]),
	L.marker([ 1237.73, -1099.15 ]),
	L.marker([ 87.7, 810.37 ]),
	L.marker([ -1907.52, 1388.69 ]),
	L.marker([ 467.37, -730.75 ]),
	L.marker([ 202.1, -569.72 ]),
	L.marker([ 159.39, -563.82 ]),
	L.marker([ -1183.15, -518.54 ]),
	L.marker([ -228.05, -236.42 ]),
	L.marker([ -407.7, -151.8 ]),
	L.marker([ -1169.4, -56.77 ]),
	L.marker([ 1679.06, 39.44 ]),
	L.marker([ 1964.25, 553.68 ]),
	L.marker([ 24.22, 637.12 ]),
	L.marker([ 2901.2, 796.12 ]),
	L.marker([ -1531.9, 870.32 ]),
	L.marker([ -404.32, 1100.89 ]),
	L.marker([ -2809.35, 1449.64 ]),
	L.marker([ 3144.05, 2184.41 ]),
	L.marker([ 815.76, 1850.88 ]),
	L.marker([ -1944.24, 1941.07 ]),
	L.marker([ -1452.23, 2127.4 ]),
	L.marker([ 1367.41, 2180.63 ]),
	L.marker([ 170.16, 2217.64 ]),
	L.marker([ 889.32, 2870.05 ]),
	L.marker([ 1980.2, 2914.8 ]),
	L.marker([ -390.38, 2963.26 ]),
	L.marker([ 71.66, 3279.37 ]),
	L.marker([ 1924.19, 3471.26 ]),
	L.marker([ -583.16, 3580.38 ]),
	L.marker([ 2514.3, 3789.52 ]),
	L.marker([ 1517.61, 3803.93 ]),
	L.marker([ -530.27, 4474.36 ]),
	L.marker([ 3815.05, 4447.34 ]),
	L.marker([ -1946.95, 4584.36 ]),
	L.marker([ 2437.55, 4779.96 ]),
	L.marker([ -1441.5, 5414.89 ]),
	L.marker([ 2196.25, 5599.03 ]),
	L.marker([ -503.95, 5673.55 ]),
	L.marker([ -378.42, 6080.78 ]),
	L.marker([ 440.95, 6459.64]),
]);

var letterScraps = L.layerGroup([
	L.marker([ 1034.27, -3026.28 ]),
	L.marker([ -1040.98, -2743.5 ]),
	L.marker([ -93.9, -2711.31 ]),
	L.marker([ -917.7, -2527.38 ]),
	L.marker([ 746.45, -2310.32 ]),
	L.marker([ 1509.74, -2126.04 ]),
	L.marker([ 76, -1970.47 ]),
	L.marker([ -1.82, -1732.61 ]),
	L.marker([ -1377.77, -1409.84 ]),
	L.marker([ 2864.8, -1372.84 ]),
	L.marker([ -1035.81, -1273.08 ]),
	L.marker([ -1821.14, -1201.36 ]),
	L.marker([ 643.01, -1035.65 ]),
	L.marker([ -119.06, -977.22 ]),
	L.marker([ -1243.1, -507.8 ]),
	L.marker([ 83.8, -431.93 ]),
	L.marker([ 1095.95, -210.46 ]),
	L.marker([ -1724.52, -196 ]),
	L.marker([ 265.37, -199.55 ]),
	L.marker([ -3020.47, 36.55 ]),
	L.marker([ -347.53, 53.37 ]),
	L.marker([ 1052.25, 167.61 ]),
	L.marker([ -2303.8, 217.43 ]),
	L.marker([ -138.94, 868.39 ]),
	L.marker([ 688.1, 1204.67 ]),
	L.marker([ -1548.76, 1380.17 ]),
	L.marker([ -432.14, 1598.46 ]),
	L.marker([ 3081.93, 1648.3 ]),
	L.marker([ -594.38, 2092 ]),
	L.marker([ 3069.21, 2160.99 ]),
	L.marker([ 180.21, 2263.83 ]),
	L.marker([ 926.96, 2445.36 ]),
	L.marker([ -2380.21, 2655.18 ]),
	L.marker([ -861.38, 2753.3 ]),
	L.marker([ -289.02, 2848.85 ]),
	L.marker([ 288.84, 2871.91 ]),
	L.marker([ 1297.38, 2988.71 ]),
	L.marker([ 1568.65, 3572.8 ]),
	L.marker([ -1608.62, 4274.25 ]),
	L.marker([ -3.52, 4332.45 ]),
	L.marker([ 1336.74, 4307.2 ]),
	L.marker([ -1007.1, 4836.94 ]),
	L.marker([ 1877.09, 5078.98 ]),
	L.marker([ 3366.1, 5182.46 ]),
	L.marker([ -576.12, 5472.24 ]),
	L.marker([ 444.65, 5571.78 ]),
	L.marker([ -403, 6319.28 ]),
	L.marker([ 1439.6, 6335.2 ]),
	L.marker([ 1466.1, 6552.27 ]),
	L.marker([ 66.2, 6668.89]),
]);

var atlas = L.tileLayer('maps/gtav/atlas/{z}/{x}/{y}.png', {
    minZoom: 1,
    maxZoom: 5,
    noWrap: true,
    tms: true,
    background: '#0fa8d2'
});

var satellite = L.tileLayer('maps/gtav/satellite/{z}/{x}/{y}.png', {
    minZoom: 1,
    maxZoom: 5,
    noWrap: true,
    tms: true,
    background: '#143d6b'
});

var road = L.tileLayer('maps/gtav/road/{z}/{x}/{y}.png', {
    minZoom: 1,
    maxZoom: 5,
    noWrap: true,
    tms: true,
    background: '#1862ad'
});

// Custom Coordinate Reference System to match GTA V's world.
var CRS = L.Util.extend({}, L.CRS, {
    projection: {
        project: function project(latlng) {
            return new L.Point(latlng.lat, latlng.lng);
        },
        unproject: function unproject(point) {
            return new L.LatLng(point.x, point.y);
        }
    },

    transformation: new L.Transformation(1 / 12446, 3756 / 8192, -1 / 12446, 5525 / 8192)
});

// Init the map.
var map = L.map(mapContainer, {
	layers: atlas,
	attributionControl: false,
	crs: CRS
});

var baseMaps = {
	"Műhold": satellite,
	"Domborzat": atlas,
	"Utak": road
};

var overlays = {
	"Spaceship parts": spaceshipParts,
	"Letter scraps": letterScraps
};

var layersOptions = {
	collapsed: false
};

var layers = L.control.layers(baseMaps, overlays, layersOptions).addTo(map);

map.setView([27.35, -752.05], 3);

// Leaflet uses grey background by default when there are no more tiles to display.
// This changes it to match the background colour of our tiles.
map.on('baselayerchange', function (e) {
    this.getContainer().style.backgroundColor = e.layer.options.background;
});

var hash = new L.Hash(map);

L.marker([0, 0]).bindPopup('Center of the game map [0.0, 0.0]').addTo(map);

atlas.bringToFront();