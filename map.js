var layer = ["CA_nonSpecificato", "CA_residenziale", "CA_ricettivoUfficiale", "CA_serviziAnziani", "CA_serviziIstruzioneCultura", "CA_serviziReligiosi", "CA_misto", "pisteCiclabili", "atbBus", "spaziInutilizzati"];

mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb2xhOTMiLCJhIjoiY2l2Y2ozYnZ5MDBocTJ5bzZiM284NGkyMiJ9.4VUvTxBv0zqgjY7t3JTFOQ';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/satellite-v9', // stylesheet location
    center: [9.662884, 45.704280], // starting position [lng, lat]
    zoom: 15, // starting zoom
	pitch: 60
});

//var layerList = document.getElementById('menu');
//var inputs = layerList.getElementsByTagName('input');
var inputs = "basic";

function switchLayer(layer) {
    map.setStyle('mapbox://styles/mapbox/' + layer + '-v9');
	loadEdifici();
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

/*	
map.on('load', function() {
    // Insert the layer beneath any symbol layer.
    var layers = map.getStyle().layers;

    var labelLayerId;
    for (var i = 0; i < layers.length; i++) {
        if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
            labelLayerId = layers[i].id;
            break;
        }
    }
});*/

function loadEdifici(){
	map.addLayer({
		'id': 'room-extrusion',
		'type': 'fill-extrusion',
		'source': {
			// GeoJSON Data source used in vector tiles, documented at
			// https://gist.github.com/ryanbaumann/a7d970386ce59d11c16278b90dde094d
			'type': 'geojson',
			'data': 'cittaAlta.geojson'
		},
		'paint': {
			// See the Mapbox Style Specification for details on data expressions.
		// https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions
		 
		// Get the fill-extrusion-color from the source 'color' property.
		'fill-extrusion-color': "#ffffff",
		 
		// Get fill-extrusion-height from the source 'height' property.
		'fill-extrusion-height': ['get', 'un_vol_av'],
		 
		// Get fill-extrusion-base from the source 'base_height' property.
		'fill-extrusion-base': 0,
		 
		// Make extrusions slightly opaque for see through indoor walls.
		'fill-extrusion-opacity': 0.8
		}
	});
	
}

map.on('load', function() {
	//loadEdifici();
});

var marker = new mapboxgl.Marker({
    draggable: true
})
.setLngLat([9.662884, 45.704280])
.addTo(map);
     

function onDragEnd() {
    var lngLat = marker.getLngLat();
    coordinates.style.display = 'block';
    coordinates.innerHTML = 'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
    $("#exampleModal").load("modalNewProposta/modalAccessibilita.html");
    $('#exampleModal').modal();
}
     
marker.on('dragend', onDragEnd);

$('#buttonAccessibilita').on('click', function(event) {
    accessibilita();
});

$('#buttonCostruito').on('click', function(event) {
    funzioniCostruito();
});

$('#buttonSpaziInutilizzati').on('click', function(event) {
    spaziInutilizzati();
});

$('#buttonCittaAltaFutura').on('click', function(event) {
    cittaAltaFutura();
});

function accessibilita(){
    removeLayer();

    var color = ["#00cb00", "#ffb915"];
    var layerName = ["pisteCiclabili", "atbBus"];

    for(i=0; i< layerName.length; i++){
        loadLayer(layerName[i], color[i]);
    }
}

function funzioniCostruito(){
    removeLayer();

    var color = ["#6f6f6f", "#ffffff", "#ffff00", "#ff007f", "#0000ff", "#00ffff", "#aa0000"];
    var layerName = ["CA_nonSpecificato", "CA_residenziale", "CA_ricettivoUfficiale", "CA_serviziAnziani", "CA_serviziIstruzioneCultura", "CA_serviziReligiosi", "CA_misto"];

    for(i=0; i< layerName.length; i++){
        loadBuilding(layerName[i], color[i]);
    }


    
}

function spaziInutilizzati(){
    removeLayer();

    var color = ["#00007f"];
    var layerName = ["spaziInutilizzati"];

    for(i=0; i< layerName.length; i++){
        loadBuilding(layerName[i], color[i]);
    }

}

function cittaAltaFutura(){
    removeLayer();
}

function removeLayer(){
    for(i=0; i< layer.length; i++){
        
        var mapLayer = map.getLayer(layer[i]);
        if(typeof mapLayer !== 'undefined') {
            // Remove map layer & source.
            map.removeLayer(layer[i]).removeSource(layer[i]);
        }
    }

}

function loadBuilding(nameLayer, colorLayer){
    map.addLayer({
		'id': nameLayer,
		'type': 'fill-extrusion',
		'source': {
			// GeoJSON Data source used in vector tiles, documented at
			// https://gist.github.com/ryanbaumann/a7d970386ce59d11c16278b90dde094d
			'type': 'geojson',
			'data': 'geojson/' + nameLayer +'.geojson'
		},
		'paint': {
			// See the Mapbox Style Specification for details on data expressions.
		// https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions
		 
		// Get the fill-extrusion-color from the source 'color' property.
		'fill-extrusion-color': colorLayer,
		 
		// Get fill-extrusion-height from the source 'height' property.
		'fill-extrusion-height': 10, //['get', 'un_vol_av']
		 
		// Get fill-extrusion-base from the source 'base_height' property.
		'fill-extrusion-base': 0,
		 
		// Make extrusions slightly opaque for see through indoor walls.
		'fill-extrusion-opacity': 0.8
		}
	});
}

function loadLayer(nameLayer, colorLayer){
    map.addLayer({
		'id': nameLayer,
		'type': 'line',
		'source': {
			// GeoJSON Data source used in vector tiles, documented at
			// https://gist.github.com/ryanbaumann/a7d970386ce59d11c16278b90dde094d
			'type': 'geojson',
			'data': 'geojson/' + nameLayer +'.geojson'
		},
		'paint': {
			'line-color': colorLayer,
            'line-width': 3
		}
	});
}


