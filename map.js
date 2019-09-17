var layer = ["CA_nonSpecificato", "CA_residenziale", "CA_ricettivoUfficiale", "CA_serviziAnziani", "CA_serviziIstruzioneCultura", "CA_serviziReligiosi", "CA_misto", "pisteCiclabili", "atbBus", "cittaAlta", "ferrovieBg", "autostradeBg", "parcheggiBg", "aereoportoBGY", "stazioniBiGi", "fermateATB", "eVai", "stradeBG"];

var layerStatus = null;
var correntLayerStyle = "satellite";

mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb2xhOTMiLCJhIjoiY2l2Y2ozYnZ5MDBocTJ5bzZiM284NGkyMiJ9.4VUvTxBv0zqgjY7t3JTFOQ';
var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/satellite-v9', // stylesheet location
    center: [9.662884, 45.704280], // starting position [lng, lat]
    zoom: 15, // starting zoom
	pitch: 60
});

map.addControl(new mapboxgl.NavigationControl());

map.on("load", function () {
   accessibilita();
   $('#buttonAccessibilita').addClass('active').siblings().removeClass('active');
   $("#leggend").load("leggenda/accessibilitaLeggend.html");
});

//var layerList = document.getElementById('menu');
//var inputs = layerList.getElementsByTagName('input');
var inputs = "basic";

function switchLayer(layer) {

    if(correntLayerStyle != layer) {

        correntLayerStyle = layer;

        map.setStyle('mapbox://styles/mapbox/' + layer + '-v9');

        map.on('style.load', function () {
            if (layerStatus == "accessibilita") {
                accessibilita();
            }
            if (layerStatus == "funzioniCostruito") {
                funzioniCostruito();
            }
            if (layerStatus == "spaziInutilizzati") {
                spaziInutilizzati();
            }
            if (layerStatus == "fattoriDinamizzanti") {
                fattoriDinamizzanti();
            }
            if (layerStatus == "completaLaMappa") {
                cittaAltaFutura();
            }
        });
    }

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
            "<a href=\"#\"><img width='150px' height='100px' class='card-img-top' src='uploads/"+ obj[i].immagine +"'></a>" +
            "<div class=\"card-body\"><h5 class=\"card-title\">" + obj[i].nome + "</h5>" +
            "<p class=\"card-text\"><strong>Proposta: </strong>"+ obj[i].proposta +"</p>" +
            "<p class=\"card-text\"><strong>Motivazione: </strong>" + obj[i].motivazione + "</p>";

        if(obj[i].userId==0){
            strpopup = strpopup +
                "<p class=\"card-text\"><button id=\"buttonLike_" + obj[i].id + "\" style='font-size:12px' onclick=\"like('" + obj[i].id + "')\" disabled><i class='fas fa-thumbs-up'></i> Like</button> " +
                " <button id=\"buttonUnlike_" + obj[i].id + "\" style='font-size:12px' onclick=\"unlike('" + obj[i].id + "')\" disabled><i class='fas fa-thumbs-down'></i> Unlike</button></p></div></div>";
        }else{
            if(obj[i].opinione == -1){
                strpopup = strpopup +
                    "<p class=\"card-text\"><button id=\"buttonLike_" + obj[i].id + "\" style='font-size:12px' onclick=\"like('" + obj[i].id + "')\"><i class='fas fa-thumbs-up'></i> Like</button> " +
                    " <button id=\"buttonUnlike_" + obj[i].id + "\" style='font-size:12px' onclick=\"unlike('" + obj[i].id + "')\"><i class='fas fa-thumbs-down'></i> Unlike</button></p></div></div>";
            }else if(obj[i].opinione == 1){
                strpopup = strpopup +
                    "<p class=\"card-text\"><button id=\"buttonLike_" + obj[i].id + "\" style='font-size:12px; background-color:#4D94C9;' onclick=\"like('" + obj[i].id + "')\"><i class='fas fa-thumbs-up'></i> Like</button> " +
                    " <button id=\"buttonUnlike_" + obj[i].id + "\" style='font-size:12px' onclick=\"unlike('" + obj[i].id + "')\"><i class='fas fa-thumbs-down'></i> Unlike</button></p></div></div>";
            }else if(obj[i].opinione == 0){
                strpopup = strpopup +
                    "<p class=\"card-text\"><button id=\"buttonLike_" + obj[i].id + "\" style='font-size:12px' onclick=\"like('" + obj[i].id + "')\"><i class='fas fa-thumbs-up'></i> Like</button> " +
                    " <button id=\"buttonUnlike_" + obj[i].id + "\" style='font-size:12px; background-color:#4D94C9;' onclick=\"unlike('" + obj[i].id + "')\"><i class='fas fa-thumbs-down'></i> Unlike</button></p></div></div>";
            }
        }



        var popup = new mapboxgl.Popup({ offset: 25 })
        .setHTML(strpopup);

        // create DOM element for the marker
        var el = document.createElement('div');
        el.id = 'marker';
        el.className = 'marker';

        if(obj[i].tipologia == 1){
            el.style.backgroundImage = "url('img/cycle.png')";
        }else if(obj[i].tipologia == 2){
            el.style.backgroundImage = "url('img/buildingBlack.png')";
        }else if(obj[i].tipologia == 3){
            el.style.backgroundImage = "url('img/buildingWhite.PNG')";
        }else if(obj[i].tipologia == 4){
            el.style.backgroundImage = "url('img/sync-solid.png')";
        }else if(obj[i].tipologia == 5){
            el.style.backgroundImage = "url('img/sync-solid.png')";
        }
        
        // create the marker
        new mapboxgl.Marker(el)
        .setLngLat([obj[i].longitudine, obj[i].latitudine])
        .setPopup(popup) // sets a popup on this marker
        .addTo(map);
    }

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

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    if($('.tab-content .active')[0].id == "nav-accessiblita"){
        $('#tematica .btn').not(this).removeClass('active');
        accessibilita();
        $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
    }
    else if($('.tab-content .active')[0].id == "nav-funzioniCostruito"){
        $('#tematica .btn').not(this).removeClass('active');
        funzioniCostruito();
        $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
    }
    else if($('.tab-content .active')[0].id == "nav-fattoriDinamizzanti"){
        $('#tematica .btn').not(this).removeClass('active');
        fattoriDinamizzanti()
        $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
    }
    else if($('.tab-content .active')[0].id == "nav-spaziInutilizzati"){
        $('#tematica .btn').not(this).removeClass('active');
        spaziInutilizzati();
        $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
    }
    else if($('.tab-content .active')[0].id == "nav-cittaAltaFutura"){
        $('#tematica .btn').not(this).removeClass('active');
        cittaAltaFutura();
        $('html,body').animate({scrollTop: $('#map-intro-div').offset().top-190},'slow');
    }
});




function accessibilita(){
    layerStatus = "accessibilita";
    switchLayer('satellite');
    document.getElementById("surveys").style.display = "block";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('ACCESSIBILIT&Agrave;');
	$('.map-intro-text').html('Città Alta può essere raggiunta mediante autobus e funicolari, mezzi privati e percorsi pedonali o combinando tali modalità per affrontare l’altimetria. Essa infatti prevede più accessi che andrebbero potenziati per incentivare una migliore distribuzione dei flussi.');

    var color = ["#ffffff", "#00cb00", "#ffb915", "#000000", "#ffffff"];
    var layerName = ["stradeBG", "pisteCiclabili", "atbBus", "ferrovieBg", "autostradeBg"];

    for(i=0; i< layerName.length; i++){
        loadLayer(layerName[i], color[i]);
    }

    var color = ["#808080", "#5a5a5a"];
    var layerName = ["parcheggiBg", "aereoportoBGY"];
    
    for(i=0; i< layerName.length; i++){
        loadLayerSuperfici(layerName[i], color[i]);
    }

    loadLayerPoint("fermateATB", "bus");
    loadLayerPoint("stazioniBiGi", "bicycle");
    loadLayerPoint("eVai", "car");

}

function funzioniCostruito(){
    layerStatus = "funzioniCostruito";
    switchLayer('satellite');
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
    layerStatus = "spaziInutilizzati";
    switchLayer('streets');
    document.getElementById("surveys").style.display = "block";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('EDIFICI DA RIQUALIFICARE');
	$('.map-intro-text').html('Città Alta è un borgo compatto che non consente un’ulteriore espansione del costruito. Essa, tuttavia, mostra la presenza di diversi edifici dismessi o poco utilizzati che potrebbero essere adibiti a nuova funzione per soddisfare i bisogni degli abitanti.');

    var color = ["#ececec"];
    var layerName = ["cittaAlta"];

    for(i=0; i< layerName.length; i++){
        loadBuilding(layerName[i], color[i]);
    }

}

function fattoriDinamizzanti(){
    layerStatus = "fattoriDinamizzanti";
    document.getElementById("surveys").style.display = "block";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('FATTORI DINAMIZZANTI');
	$('.map-intro-text').html('Città Alta è il cuore pulsante di Bergamo: vi accedono diverse categorie di abitanti che hanno in comune il movimento e a seconda del periodo disegnano tanti volti mutevoli che attestano quanto la Città sia abitata da cittadini mobili.');

}


function cittaAltaFutura(){
    layerStatus = "completaLaMappa";
    switchLayer('streets');
    document.getElementById("surveys").style.display = "none";
    $( ".marker" ).remove();
    removeLayer();
	$('.map-intro').html('COMPLETA LA MAPPA');
	$('.map-intro-text').html('Clicca sul pulsante "Aggiungi una segnalazione" e seleziona la tipologia di proposta che vuoi inserire');
    
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

// --------------------------------- GESTIONE SEGNALAZIONE START ----------------------------------------------------

var pointSegnalazione;

function addSegnalazione(){
    $("#modalSceltaTipologiaSegnalazione").modal();
}

$("#buttonConfermaTipologiaSegnalazione").click(function(){

    $("#buttonTipologiaSegnalazione").html($('input:radio[name="radioTipologia"]:checked').val());

    //Chiudo la finestra precedente
    $("#modalSceltaTipologiaSegnalazione").modal("hide");

    //Apro l'avviso di come posizionare il marker
    $("#modalSegnalazione").modal();

    //Cambio il botton (o il testo)
    $('#addSegnalazione').css("display", 'none');
    $('#confermaPosizioneSegnalazione').css("display", 'block');

    //Visualizzo il marker
    pointSegnalazione = new mapboxgl.Marker({
        draggable: true
    })
        .setLngLat([9.662884, 45.704280])
        .addTo(map);

});


function confermaPosizioneSegnalazione(){
    $('#exampleModal').modal();

    var tipologia = $("#buttonTipologiaSegnalazione").html();

    if(tipologia == 1){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalAccessibilita.html");
    }
    if(tipologia == 2){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalFunzioneDegliEdifici.html");
    }
    if(tipologia == 3){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalEdificiDaRiqualificare.html");
    }
    if(tipologia == 4){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalFattoriDinamizzanti.html");
    }
    if(tipologia == 5){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalCittaAltaPerTutti.html");
    }

    $("#tipologiaSegnalazioneHidden").val(tipologia);

    var lngLat = pointSegnalazione.getLngLat();
    $("#coordinateSegnalazioneLat").val(lngLat.lat);
    $("#coordinateSegnalazioneLng").val(lngLat.lng);
}
function addMarker(e){

    $('#exampleModal').modal();
    $("#panelTipologiaSegnalazione").load("modalNewProposta/modalAccessibilita.html");

    $("#coordinateSegnalazione").val(JSON.stringify(e.lngLat));

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
    
    var tipologia = $("#buttonTipologiaSegnalazione").html();
    var nameBuilding = $('#inputNameBuilding').val();
    var motivazione = $('#textAreaMotivazione').val();
    var selectProposta = null;
    var textAreaProposta = null;


    if($('#selectTipologiaSegnalazione').val() == 1){
        selectProposta = $("#selectProposta").val();

    }
    if($('#selectTipologiaSegnalazione').val() == 2){
        selectProposta = $("#selectProposta").val();

    }
    if($('#selectTipologiaSegnalazione').val() == 3){
        selectProposta = $("#selectProposta").val();

    }
    if($('#selectTipologiaSegnalazione').val() == 4){
        selectProposta = $("#selectProposta").val();

    }
    if($('#selectTipologiaSegnalazione').val() == 5){
        textAreaProposta = $("#textAreaProposta").val();
    }

    var lngLat = pointSegnalazione.getLngLat();
    $("#coordinateSegnalazioneLat").val(lngLat.lat);
    $("#coordinateSegnalazioneLng").val(lngLat.lng);

    var userID = 2;
    //var immagine = document.getElementById("inputImgFileName");
    //alert(immagine.files[0].webkitRelativePath);
/*
    $.ajax({
        type: "POST",
        url: "./addSurvey/addSegnalazione.php",
        data: "id_utente=" + userID +
            "&tipologia=" + tipologia +
            "&nameBuilding=" + nameBuilding +
            "&motivazione=" + motivazione +
            "&selectProposta=" + selectProposta +
            "&textAreaProposta=" + textAreaProposta +
            "&immagine" + immagine +
            "&lat=" + lngLat.lat +
            "&long=" + lngLat.lng,
        dataType: "html",
        success: function(msg){
            $("#modalNewSegnalazione").modal();
            $('#exampleModal').modal("hide");
            cittaAltaFutura();

        },
    });
*/
    pointSegnalazione.remove();
    $('#addSegnalazione').css("display", 'block');
    $('#confermaPosizioneSegnalazione').css("display", 'none');




});
