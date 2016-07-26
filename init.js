(function () {

	var atlas = L.tileLayer('atlas/{z}/{x}/{y}.png', {
	    minZoom: 1,
	    maxZoom: 5,
	    noWrap: true,
	    tms: true,
	    background: '#0fa8d2'
	});

	var satellite = L.tileLayer('satellite/{z}/{x}/{y}.png', {
	    minZoom: 1,
	    maxZoom: 5,
	    noWrap: true,
	    tms: true,
	    background: '#143d6b'
	});

	var road = L.tileLayer('road/{z}/{x}/{y}.png', {
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
	var map = L.map('map', {
		layers: atlas,
		attributionControl: false,
		crs: CRS
	});

	map.setView([0, 2000], 2);

	// Leaflet uses grey background by default when there are no more tiles to display.
    // This changes it to match the background colour of our tiles.
	map.on('baselayerchange', function (e) {
        this.getContainer().style.backgroundColor = e.layer.options.background;
    });

	var hash = new L.Hash(map);

	L.control.layers({"Satellite": satellite, "Atlas": atlas, "Road": road}, {}).addTo(map);
	L.marker([0, 0]).addTo(map);

	atlas.bringToFront();

})();

