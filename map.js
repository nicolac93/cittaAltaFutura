mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb2xhOTMiLCJhIjoiY2l2Y2ozYnZ5MDBocTJ5bzZiM284NGkyMiJ9.4VUvTxBv0zqgjY7t3JTFOQ';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/basic-v9', // stylesheet location
    center: [9.660495, 45.704422], // starting position [lng, lat]
    zoom: 14 // starting zoom
});


var layerList = document.getElementById('menu');
var inputs = layerList.getElementsByTagName('input');

function switchLayer(layer) {
    var layerId = layer.target.id;
    map.setStyle('mapbox://styles/mapbox/' + layerId + '-v9');
}

for (var i = 0; i < inputs.length; i++) {
    inputs[i].onclick = switchLayer;
}


// create the popup
var popup = new mapboxgl.Popup({ offset: 25 })
    .setText(' 	Rendere area di sosta la piazza, aumentando i parcheggi della citta.');
// create DOM element for the marker
var el = document.createElement('div');
el.id = 'marker';
el.style.backgroundImage = "url('img/piazzaVecchia.jpg')";
// create the marker
new mapboxgl.Marker(el)
    .setLngLat([9.662965, 45.704083])
    .setPopup(popup) // sets a popup on this marker
    .addTo(map);

// create the popup
var popup2 = new mapboxgl.Popup({ offset: 25 })
    .setText('Rendere la piazza una porta d\'accesso alla corsarola.');
// create DOM element for the marker
var el2 = document.createElement('div');
el2.id = 'marker';
el2.style.backgroundImage = "url('img/piazzaCittadella.jpg')";
// create the marker
new mapboxgl.Marker(el2)
    .setLngLat([9.659408, 45.705815])
    .setPopup(popup2) // sets a popup on this marker
    .addTo(map);

// create the popup
var popup3 = new mapboxgl.Popup({ offset: 25 })
    .setText('Creare delle isole pedonali per renderlo più sicuro ai pedoni.');
// create DOM element for the marker
var el3 = document.createElement('div');
el3.id = 'marker';
el3.style.backgroundImage = "url('img/colleAperto.jpg')";
// create the marker
new mapboxgl.Marker(el3)
    .setLngLat([9.658154, 45.706664])
    .setPopup(popup3) // sets a popup on this marker
    .addTo(map);

// create the popup
var popup4 = new mapboxgl.Popup({ offset: 25 })
    .setText('Fermare i lavori di realizzazione del parcheggio.');
// create DOM element for the marker
var el4 = document.createElement('div');
el4.id = 'marker';
el4.style.backgroundImage = "url('img/parcheggioFara.jpg')";
// create the marker
new mapboxgl.Marker(el4)
    .setLngLat([9.666543, 45.706045])
    .setPopup(popup4) // sets a popup on this marker
    .addTo(map);
