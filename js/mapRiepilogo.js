mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb2xhOTMiLCJhIjoiY2l2Y2ozYnZ5MDBocTJ5bzZiM284NGkyMiJ9.4VUvTxBv0zqgjY7t3JTFOQ';
var map = new mapboxgl.Map({
    container: 'mapRiepilogo', // container id
    style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
    center: [9.662884, 45.704280], // starting position [lng, lat]
    zoom: 15, // starting zoom
    pitch: 60
});

map.addControl(new mapboxgl.NavigationControl());

map.on("load", function () {
    $.ajax({
        type: "POST",
        url: "popup.php",

        success: function(msg){
            addPopup(msg);
        },
        error: function(){
            alert("Chiamata fallita!!!");
        }
    });
});

function addPopup(msg){

    msg = msg.substring(0, msg.length - 2);
    msg = msg + "]";
    var obj = JSON.parse(msg);

    for(var i=0; i<obj.length; i++){

        // create the popup

        var strpopup = "<div class=\"card h-100\">" +
            "<a href=\"#\"><img img width='150px' height='100px' class='card-img-top' src='uploads/"+ obj[i].immagine +"'></a>" +
            "<div class=\"card-body\"><h5 class=\"card-title\">" + obj[i].nome + "</h5>" +
            "<p class=\"card-text\"><strong>Proposta: </strong>"+ obj[i].proposta +"</p>" +
            "<p class=\"card-text\"><strong>Motivazione: </strong>" + obj[i].motivazione + "</p>" +
            //"<p class=\"card-text\"><button style='font-size:12px' onclick=\"like('" + obj[i].id + "')\"><i class='fas fa-thumbs-up'></i> Like</button> " +
            //" <button style='font-size:12px' onclick=\"unlike('" + obj[i].id + "')\"><i class='fas fa-thumbs-down'></i> Unlike</button></p></div>";
            "</div>";

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
