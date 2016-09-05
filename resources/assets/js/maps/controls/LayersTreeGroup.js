// import L from 'leaflet'

// L.LayersTreeGroup = L.Class.extend(L.LayerGroup, {
//     options: {},
//     initialize: function (layers, options) {
//         L.setOptions(this, options)
//         this._layers = {};

//         var i, len;

//         if (layers) {
//             for (i = 0, len = layers.length; i < len; i++) {
//                 this.addLayer(layers[i]);
//             }
//         }
//     },

//     addLayer: function (layer) {
//         var id = this.getLayerId(layer);

//         this._layers[id] = layer;

//         if (this._map) {
//             this._map.addLayer(layer);
//         }

//         return this;
//     },

//     removeLayer: function (layer) {
//         var id = layer in this._layers ? layer : this.getLayerId(layer);

//         if (this._map && this._layers[id]) {
//             this._map.removeLayer(this._layers[id]);
//         }

//         delete this._layers[id];

//         return this;
//     },

//     hasLayer: function (layer) {
//         if (!layer) { return false; }

//         return (layer in this._layers || this.getLayerId(layer) in this._layers);
//     },

//     clearLayers: function () {
//         this.eachLayer(this.removeLayer, this);
//         return this;
//     },

//     invoke: function (methodName) {
//         var args = Array.prototype.slice.call(arguments, 1),
//             i, layer;

//         for (i in this._layers) {
//             layer = this._layers[i];

//             if (layer[methodName]) {
//                 layer[methodName].apply(layer, args);
//             }
//         }

//         return this;
//     },

//     onAdd: function (map) {
//         this._map = map;
//         this.eachLayer(map.addLayer, map);
//     },

//     onRemove: function (map) {
//         this.eachLayer(map.removeLayer, map);
//         this._map = null;
//     },

//     addTo: function (map) {
//         map.addLayer(this);
//         return this;
//     },

//     eachLayer: function (method, context) {
//         for (var i in this._layers) {
//             method.call(context, this._layers[i]);
//         }
//         return this;
//     },

//     getLayer: function (id) {
//         return this._layers[id];
//     },

//     getLayers: function () {
//         var layers = [];

//         for (var i in this._layers) {
//             layers.push(this._layers[i]);
//         }
//         return layers;
//     },

//     setZIndex: function (zIndex) {
//         return this.invoke('setZIndex', zIndex);
//     },

//     getLayerId: function (layer) {
//         return L.stamp(layer);
//     }
// });

// L.layersTreeGroup = function (layers, options) {
//     return new L.LayersTreeGroup(layers, options);
// };

// export default L.layersTreeGroup