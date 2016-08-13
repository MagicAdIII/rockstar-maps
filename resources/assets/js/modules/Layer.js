import L from 'leaflet'

export default class Layer {

	constructor(gameslug, layerId, options) {
        let format = options.tileFormat || 'png'
		this._tilepath = `/tiles/${gameslug}/${layerId}/{z}/{x}/{y}.${format}`

		return L.tileLayer(this._tilepath, {
            minZoom: options.minZoom || 1,
            maxZoom: options.maxZoom || 5,
            noWrap: true,
            tms: true,
            background: options.background
        });
	}

}