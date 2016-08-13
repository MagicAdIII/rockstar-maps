import L from 'leaflet';
import 'leaflet-hash';
import 'leaflet-groupedlayercontrol';
import config from '../config';
import $ from 'jquery'; // temp

import CRS from './CRS'
import Layer from './Layer'
import './Control.LayersTree'
import getTraversed from './traverse'

export default class {

    constructor(game, debug = false) {
        this._gameslug = game || config.defaultGame
        this._game = config[this._gameslug]
        this._baseLayers = {}
        this._overlays = {}

        this.setMap()
        this.setHash()

        debug && this._setDebug()
    }

    setMap() {
        var defaultLayer = this.setBaseLayers(),
            crs = this.crs = CRS(this._game.crs)

        var map = this.map = L.map(config.containerId, {
            crs: crs,
            layers: defaultLayer,
            center: this._game.defaultView,
            zoom: this._game.defaultZoom,
            attributionControl: false
        })

        this.setOverlays()

        // Set initial background of default layer.
        this.mapContainer = map.getContainer()
        this.mapContainer.style.backgroundColor = defaultLayer.options.background

        this.map.on('baselayerchange', this.onBaseLayerChange, this)
    }

    onBaseLayerChange(event) {
        // Leaflet uses grey background by default when there are no more tiles to display.
        // This changes it to match the background colour of the current layer's tiles.
        this.mapContainer.style.backgroundColor = event.layer.options.background
    }

    getDefaultLayer() {
        return this._baseLayers[this._game.defaultLayer]
    }

    setHash() {
        this._hash = new L.Hash(this.map)
    }

    setBaseLayers() {
        this._game.layers.forEach(layer => {
            this._baseLayers[layer.name] = new Layer(this._gameslug, layer.id, {
                minZoom: layer.minZoom,
                maxZoom: layer.maxZoom,
                background: layer.bg
            })
        })

        return this.getDefaultLayer()
    }

    setOverlays() {
        $.getJSON('/api/maps/' + this._gameslug + '/tree').then(data => {
            // var prev = 0
            // var overlays = {}
            // let tree = getTraversed(data, function(item) {
            //     console.log(item);
            //     while (item.depth > prev) {
            //         overlays[item.title]
            //     }
            //     prev = item.depth
            // })

            // this.addControls()
        })
    }

    addControls() {
        this._controlOptions = { // @todo will be moved to own L.Control class
            collapsed: false
        }

        L.control.layersTree(this._baseLayers, this._overlays, this._controlOptions).addTo(this.map)
    }

    _setDebug() {
        this.map.on('click', function (e) {
            console.log('[DEBUG] Clicked @ lat', e.latlng.lat, 'lon', e.latlng.lng);
        });
        L.marker([0, 0], { icon: L.divIcon() }).bindPopup('[0, 0] coords for reference.').addTo(this.map);
    }
}
