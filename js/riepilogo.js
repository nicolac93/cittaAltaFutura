$('#selector button').click(function() {
    alert("ciao1");
    $(this).addClass('active').siblings().removeClass('active');

    if($(this).val() == 'map') { 
        $('#portfoglio-riepilogo').css("display", 'none');
        $('#table-riepilogo').css("display", 'none');
        $('#map-riepilogo').css("display", 'block');
    }
    else if($(this).val() == 'list') { 
        $('#portfoglio-riepilogo').css("display", 'flex');
        $('#table-riepilogo').css("display", 'none');
        $('#map-riepilogo').css("display", 'none');
    }
    else if($(this).val() == 'table') { 
        $('#portfoglio-riepilogo').css("display", 'none');
        $('#table-riepilogo').css("display", 'inline');
        $('#map-riepilogo').css("display", 'none');
    }
});

$('#tematica button').click(function() {
    $(this).addClass('active').siblings().removeClass('active');

    if($(this).val() == 'accessibilita') { 
        $("#questionario").load("survey/accessibilita.html");
    }
    else if($(this).val() == 'costruito') { 
        $("#questionario").load("survey/funzioniCostruito.html");
        alert("ciao");
        $("#leggend").load("leggenda/costruitoLeggend.html");
    }
    else if($(this).val() == 'spaziInutilizzati') { 
        $("#questionario").load("survey/spaziInutilizzati.html");
    }
    else if($(this).val() == 'cittaAltaPlurale') { 
        $("#questionario").load("survey/cittaAltaFutura.html");
    }
});


$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });

$('.dropdown-toggle').dropdown();

$(function(){
    $("#questionario").load("survey/accessibilita.html"); 
});

$("#buttonProposta").on("click", function(){
    alert("subimt");
});

function submitAccessibilita(){
    var domanda1 = null;
    if(document.getElementById("domanda1_1").checked)
        domanda1 = 1;
    else if(document.getElementById("domanda1_2").checked)
        domanda1 = 2;
    else if(document.getElementById("domanda1_3").checked)
        domanda1 = 3;
    
    var domanda2 = null;
    if(document.getElementById("domanda2_1").checked)
        domanda2 = 1;
    else if(document.getElementById("domanda2_2").checked)
        domanda2 = 2;

    var domanda21 = null;
    var domanda21_dettagli = null;
    if(document.getElementById("domanda21_1").checked){
        domanda21 = 1;
        domanda21_dettagli = document.getElementById("domanda21_1_dettagli").value;
    }
    else if(document.getElementById("domanda21_2").checked){
        domanda21 = 2;
        domanda21_dettagli = document.getElementById("domanda21_2_dettagli").value;
    }
        
    var domanda3 = null;
    if(document.getElementById("domanda3_1").checked)
        domanda3 = 1;
    else if(document.getElementById("domanda3_2").checked)
        domanda3 = 2;

    var domanda31_dettagli = null;
    domanda31_dettagli = document.getElementById("domanda31_dettagli").value;
    
    var domanda4 = null;
    var domanda41 = null;
    var domanda42 = null;
    if(document.getElementById("domanda4_1").checked){
        domanda4 = 1;
        domanda41 = document.getElementById("domanda41_1").value;
        domanda42 = document.getElementById("domanda42_1").value;
    }
    else if(document.getElementById("domanda4_2").checked){
        domanda4 = 2;
        domanda41 = document.getElementById("domanda41_2").value;
        domanda42 = document.getElementById("domanda42_2").value;
    }

    var domanda5 = null;
    if(document.getElementById("domanda5_1").checked)
        domanda5 = 1;
    else if(document.getElementById("domanda5_2").checked)
        domanda5 = 2;

    var domanda51_dettagli = null;
    domanda51_dettagli = document.getElementById("domanda51").value;

    var userID = 2;

    $.ajax({
        type: "POST",
        url: "./addSurvey/addAccessibilita.php",
        data: "USER_ID=" + userID +  
            "&DOMANDA_1=" + domanda1 +
            "&DOMANDA_2=" + domanda2 +
            "&DOMANDA_21=" + domanda21 + 
            "&DOMANDA_21_DETTAGLI=" + domanda21_dettagli +
            "&&DOMANDA_3=" + domanda3 + 
            "&DOMANDA_31_DETTAGLI=" + domanda31_dettagli +
            "&DOMANDA_4=" + domanda4 + 
            "&DOMANDA_41=" + domanda41 +
            "&DOMANDA_42=" + domanda42 +
            "&DOMANDA_5=" + domanda5 + 
            "&DOMANDA_5_DETTAGLI=" + domanda51_dettagli,
        dataType: "html",
        success: function(msg){
            alert(msg);
        },  
    });

}
