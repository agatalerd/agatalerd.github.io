ymaps.ready(init);
var adress_needed = [55.37875912894288,36.75500467196647];

function init() {
    var myMap = new ymaps.Map('map', {
        center:[55.37875912894288,36.75500467196647],
        zoom: 16,
        controls: []
    });


    ymaps.geocode(adress_needed, {
        results: 1
    }).then(function (res) {
        myMap.controls.add('zoomControl', { left: 5, top: 5 });
        var firstGeoObject = res.geoObjects.get(0),
            coords = firstGeoObject.geometry.getCoordinates(),
            bounds = firstGeoObject.properties.get('boundedBy');

        myMap.setBounds(bounds, {
            checkZoomRange: true
        });

        var myPlacemark = new ymaps.Placemark(coords, {
            balloonContent: 'Мы здесь, друг!',
            hintContent: '',
            iconCaption: 'ул. Московская, д. 9К'
        }, {
            preset: 'islands#dotIcon',
            iconColor: '#ff3535'
        });           

        

        myMap.geoObjects.add(myPlacemark);

        //myPlacemark.balloon.open();
    });


}