(function () {
	"use strict";

	var addClass = function (el, className) {
	    if (el.classList) el.classList.add(className);
	    else el.className += ' ' + className;
	};

	var atlas = L.tileLayer('atlas/{z}/{x}/{y}.png', {
	    minZoom: 1, maxZoom: 5, noWrap: true, tms: true
	});

	var satellite = L.tileLayer('satellite/{z}/{x}/{y}.png', {
	    minZoom: 1, maxZoom: 5, noWrap: true, tms: true
	});
	var road = L.tileLayer('road/{z}/{x}/{y}.png', {
	    minZoom: 1, maxZoom: 5, noWrap: true, tms: true
	});
	var map = L.map('map', {
		layers: atlas,
		attributionControl: false,
		maxBoundsViscosity: 1.0
	});
	map.setView([0, 0], 2);
	var hash = new L.Hash(map);
	L.control.layers({"Satellite": satellite, "Atlas": atlas, "Road": road}, {}).addTo(map);

	atlas.bringToFront();

})();