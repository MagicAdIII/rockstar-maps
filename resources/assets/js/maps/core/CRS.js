import L from 'leaflet'

export default function (transform) {

    return L.Util.extend({}, L.CRS, {
        projection: {
            project: function project(latlng) {
                return new L.Point(latlng.lat, latlng.lng)
            },
            unproject: function unproject(point) {
                return new L.LatLng(point.x, point.y)
            }
        },
        transformation: new L.Transformation(
            transform.a,
            transform.b,
            transform.c,
            transform.d
        )
    })

}