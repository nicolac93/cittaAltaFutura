var layer = ["CA_nonSpecificato", "CA_residenziale", "CA_ricettivoUfficiale", "CA_serviziAnziani", "CA_serviziIstruzioneCultura", "CA_serviziReligiosi", "CA_misto", "pisteCiclabili", "atbBus", "spaziInutilizzati", "ferrovieBg", "autostradeBg", "parcheggiBg", "aereoportoBGY", "stazioniBiGi", "fermateATB", "eVai"];

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


$(document).ready(function() {
    console.log( "ready!" );
});


function addPopup(msg){

    msg = msg.substring(0, msg.length - 2);
    msg = msg + "]";
    var obj = JSON.parse(msg);

    for(var i=0; i<obj.length; i++){
        
        // create the popup

        var strpopup = "<div class=\"card h-100\">" +
            "<a href=\"#\"><img class='card-img-top' src='img/"+ obj[i].immagine +"'></a>" + 
            "<div class=\"card-body\"><h5 class=\"card-title\">" + obj[i].nome + "</h5>" +
            "<p class=\"card-text\"><strong>Segnalazione: </strong>"+ obj[i].tipologia +"</p>" +
            "<p class=\"card-text\"><strong>Motivazione: </strong>" + obj[i].motivazione + "</p>" + 
            "<p class=\"card-text\"><button style='font-size:12px' onclick=\"like('" + obj[i].id + "')\"><i class='fas fa-thumbs-up'></i> Like</button> " +
            " <button style='font-size:12px' onclick=\"unlike('" + obj[i].id + "')\"><i class='fas fa-thumbs-down'></i> Unlike</button></p></div></div>";

        var popup = new mapboxgl.Popup({ offset: 25 })
        .setHTML(strpopup);

        // create DOM element for the marker
        var el = document.createElement('div');
        el.id = 'marker';
        el.className = 'marker';

        if(obj[i].categoria == 1){
            el.style.backgroundImage = "url('img/cycle.png')";
        }else if(obj[i].categoria == 2){
            el.style.backgroundImage = "url('img/buildingBlack.png')";
        }else if(obj[i].categoria == 3){
            el.style.backgroundImage = "url('img/buildingWhite.PNG')";
        }else if(obj[i].categoria == 4){
            el.style.backgroundImage = "url('img/sync-solid.svg')";
        }
        
        // create the marker
        new mapboxgl.Marker(el)
        .setLngLat([obj[i].longitudine, obj[i].latitudine])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);
    }

}

function like(id) {
    $.ajax({
        type: "POST",
        url: "like.php",
        data: "id=" + id +
            "&opinione=" + 1,
        success: function(msg){
            alert(msg);
        },
        error: function(){
            alert("Votazione fallita");
        }
    });
}

function unlike(id){
    $.ajax({
        type: "POST",
        url: "like.php",
        data: "id=" + id +
            "&opinione=" + 0,
        success: function(msg){
            alert(msg);
        },
        error: function(){
            alert("Votazione fallita");
        }
    });
}

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

/*
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
*/

$('#buttonAccessibilita').on('click', function(event) {
	$('#tematica .btn').not(this).removeClass('active');
    accessibilita();
    $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
});

$('#buttonCostruito').on('click', function(event) {
	$('#tematica .btn').not(this).removeClass('active');
    funzioniCostruito();
    $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
});

$('#buttonSpaziInutilizzati').on('click', function(event) {
	$('#tematica .btn').not(this).removeClass('active');
    spaziInutilizzati();
    $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
});

$('#buttonFattoriDinamizzanti').on('click', function(event) {
	$('#tematica .btn').not(this).removeClass('active');
	fattoriDinamizzanti()
	$('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
});

$('#buttonCittaAltaFutura').on('click', function(event) {
	$('#tematica .btn').not(this).removeClass('active');
    cittaAltaFutura();
    $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
});

function accessibilita(){
    document.getElementById("surveys").style.display = "block";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('ACCESSIBILIT&Agrave;');
	$('.map-intro-text').html('Città Alta può essere raggiunta mediante autobus e funicolari, mezzi privati e percorsi pedonali o combinando tali modalità per affrontare l’altimetria. Essa infatti prevede più accessi che andrebbero potenziati per incentivare una migliore distribuzione dei flussi.');

    var color = ["#00cb00", "#ffb915", "#000000", "#ffffff"];
    var layerName = ["pisteCiclabili", "atbBus", "ferrovieBg", "autostradeBg"];

    for(i=0; i< layerName.length; i++){
        loadLayer(layerName[i], color[i]);
    }

    var color = ["#4272db", "#5a5a5a"];
    var layerName = ["parcheggiBg", "aereoportoBGY"];
    
    for(i=0; i< layerName.length; i++){
        loadLayerSuperfici(layerName[i], color[i]);
    }

    loadLayerPoint("fermateATB", "bus");
    loadLayerPoint("stazioniBiGi", "bicycle");
    loadLayerPoint("eVai", "car");

}

function funzioniCostruito(){
    document.getElementById("surveys").style.display = "block";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('FUNZIONI DEGLI EDIFICI');
	$('.map-intro-text').html('Gli edifici di Città Alta rispondono a molteplici funzioni: residenziale, commerciale, turistica, formativa e culturale. Per evitare la concentrazione solo in alcune aree, bisognerebbe promuovere interventi che rispondano ai bisogni dei diversi abitanti. ');

    var color = ["#6f6f6f", "#ffffff", "#ffff00", "#ff007f", "#0000ff", "#00ffff", "#aa0000"];
    var layerName = ["CA_nonSpecificato", "CA_residenziale", "CA_ricettivoUfficiale", "CA_serviziAnziani", "CA_serviziIstruzioneCultura", "CA_serviziReligiosi", "CA_misto"];

    for(i=0; i< layerName.length; i++){
        loadBuilding(layerName[i], color[i]);
    }


    
}

function spaziInutilizzati(){
    document.getElementById("surveys").style.display = "block";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('EDIFICI DA RIQUALIFICARE');
	$('.map-intro-text').html('Città Alta è un borgo compatto che non consente un’ulteriore espansione del costruito. Essa, tuttavia, mostra la presenza di diversi edifici dismessi o poco utilizzati che potrebbero essere adibiti a nuova funzione per soddisfare i bisogni degli abitanti.');

    var color = ["#00007f"];
    var layerName = ["spaziInutilizzati"];

    for(i=0; i< layerName.length; i++){
        loadBuilding(layerName[i], color[i]);
    }

}

function fattoriDinamizzanti(){
    document.getElementById("surveys").style.display = "block";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('FATTORI DINAMIZZANTI');
	$('.map-intro-text').html('Città Alta è il cuore pulsante di Bergamo: vi accedono diverse categorie di abitanti che hanno in comune il movimento e a seconda del periodo disegnano tanti volti mutevoli che attestano quanto la Città sia abitata da cittadini mobili.');

}


function cittaAltaFutura(){
    document.getElementById("surveys").style.display = "none";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('COMPLETA LA MAPPA');
	$('.map-intro-text').html('Punta il marker azzurro sul punto esatto del luogo per il quale vuoi fare una segnalazione');
    
    $.ajax({
    type: "POST",
    url: "popup.php",

    success: function(msg){
        addPopup(msg);
    },
    error: function(){
        alert("Chiamata fallita!!!");
    },
});

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

function loadLayerSuperfici(nameLayer, colorLayer){
    map.addLayer({
		'id': nameLayer,
		'type': 'fill',
		'source': {
			// GeoJSON Data source used in vector tiles, documented at
			// https://gist.github.com/ryanbaumann/a7d970386ce59d11c16278b90dde094d
			'type': 'geojson',
			'data': 'geojson/' + nameLayer +'.geojson'
		},
		'paint': {
			"fill-color": colorLayer,
		}
	});
}

function loadLayerPoint(nameLayer, icon){
    map.addLayer({
		'id': nameLayer,
		'type': 'symbol',
		'source': {
			// GeoJSON Data source used in vector tiles, documented at
			// https://gist.github.com/ryanbaumann/a7d970386ce59d11c16278b90dde094d
			'type': 'geojson',
			'data': 'geojson/' + nameLayer +'.geojson'
		},
		'layout': {
			'icon-image': icon+'-15'
		}
	});
}



function addSegnalazione(){
    alert("Clicca sul luogo che vuoi fare una segnalazione");

    map.on('click', addMarker);
   /* 
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
*/
    

}

function addMarker(e){

    alert("add");

    $('#exampleModal').modal();
    $("#panelTipologiaSegnalazione").load("modalNewProposta/modalAccessibilita.html");

 /*   if (typeof circleMarker !== "undefined" ){ 
      map.removeLayer(circleMarker);         
    }
    //add marker
    circleMarker = new  L.circle(e.latlng, 200, {
                  color: 'red',
                  fillColor: '#f03',
                  fillOpacity: 0.5
              }).addTo(map);
*/
    map.off('click', addMarker);           
}

$("#buttonProposta").on("click", function(){
    
    var tipologia = $('#selectTipologiaSegnalazione').val();
    var nameBuilding = $('#inputNameBuilding').val()
    var motivazione = $('#textAreaMotivazione').val()

    alert(motivazione);


    if($('#selectTipologiaSegnalazione').val() == 1){
       // alert("a");

    }
    if($('#selectTipologiaSegnalazione').val() == 2){
       // alert("b");

    }
    if($('#selectTipologiaSegnalazione').val() == 3){
        //$("#panelTipologiaSegnalazione").load("modalNewProposta/modalEdificiDaRiqualificare.html");

    }
    if($('#selectTipologiaSegnalazione').val() == 4){
        //$("#panelTipologiaSegnalazione").load("modalNewProposta/modalFattoriDinamizzanti.html");

    }
    if($('#selectTipologiaSegnalazione').val() == 5){
        //$("#panelTipologiaSegnalazione").load("modalNewProposta/modalCittaAltaPerTutti.html");

    }
    
});
