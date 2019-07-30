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
        $("#leggend").load("leggenda/accessibilitaLeggend.html");
        $('#nav-accessiblita-tab').tab('show');
        $('#map-riepilogo').css("display", 'block');
        $('#videoFattoriDinamizzanti').css("display", 'none');
    }
    else if($(this).val() == 'costruito') { 
        $("#leggend").load("leggenda/costruitoLeggend.html");
        $('#nav-funzioniCostruito-tab').tab('show');
        $('#map-riepilogo').css("display", 'block');
        $('#videoFattoriDinamizzanti').css("display", 'none');
    }
    else if($(this).val() == 'spaziInutilizzati') {
        $("#leggend").load("leggenda/riqualificazioneLeggend.html");
        $('#nav-spaziInutilizzati-tab').tab('show');
        $('#map-riepilogo').css("display", 'block');
        $('#videoFattoriDinamizzanti').css("display", 'none');
    }
    else if($(this).val() == 'fattoriDinamizzanti') { 
        $('#nav-fattoriDinamizzanti-tab').tab('show');
        $('#map-riepilogo').css("display", 'none');
        $('#videoFattoriDinamizzanti').css("display", 'block');
    }
    else if($(this).val() == 'cittaAltaPlurale') { 
        $('#nav-cittaAltaFutura-tab').tab('show');
        $('#map-riepilogo').css("display", 'block');
        $('#videoFattoriDinamizzanti').css("display", 'none');
    }
});

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    if($('.tab-content .active')[0].id == "nav-accessiblita"){
        $("#buttonAddSegnalazione").html("<i class='fas fa-bicycle'></i> Completa la mappa");
    }
    else if($('.tab-content .active')[0].id == "nav-funzioniCostruito"){
        $("#buttonAddSegnalazione").html("<i class='fas fa-building'></i> Completa la mappa");
    }
    else if($('.tab-content .active')[0].id == "nav-fattoriDinamizzanti"){
        $("#buttonAddSegnalazione").html("<i class='far fa-building'></i> Completa la mappa");
    }
    else if($('.tab-content .active')[0].id == "nav-spaziInutilizzati"){
        $("#buttonAddSegnalazione").html("<i class='far fa-building'></i> Completa la mappa");
    }
    else if($('.tab-content .active')[0].id == "nav-cittaAltaFutura"){
        $("#buttonAddSegnalazione").html("<i class='fa fa-list'></i> Completa la mappa");
    }
});   


$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });

$('.dropdown-toggle').dropdown();

$(function(){    
    $("#navSurveyAccessibilita").load("survey/accessibilita.html");
    $("#navSurveyFunzioniCostruito").load("survey/funzioniCostruito.html");
    $("#navSurveyFattoriDinamizzanti").load("survey/fattoriDinamizzanti.html");
    $("#navSurveySpaziInutilizzati").load("survey/spaziInutilizzati.html");
    $("#navSurveyCittaAltaFutura").load("survey/cittaAltaFutura.html");
});

/*$("#buttonProposta").on("click", function(){
    alert("subimt");
});*/

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
    domanda51_dettagli = document.getElementById("domanda5_1_dettagli").value;

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
            alert("Step 1 di 4 completato. Vai allo step 2");
            $('#nav-funzioniCostruito-tab').tab('show');
        },  
    });

}

function submitFunzioniCostruito(){
    var userID;
    var domanda1 = null;
    var domanda1_dettagli = null;
    if(document.getElementById("domanda1_1_2").checked){
        domanda1 = 1;
        domanda1_dettagli = document.getElementById("domanda1_dettagli_2").value;
    }
    else if(document.getElementById("domanda1_2_2").checked){
        domanda1 = 2;
    }

    var domanda2 = null;
    var domanda2_dettagli = null;
    if(document.getElementById("domanda2_1_2").checked){
        domanda2 = 1;
        domanda2_dettagli = document.getElementById("domanda2_dettagli_2").value;
    }
    else if(document.getElementById("domanda2_2_2").checked){
        domanda2 = 2;
    }

    var domanda3 = null;
    var domanda3_dettagli = null;
    if(document.getElementById("domanda3_1_2").checked){
        domanda3 = 1;
        domanda3_dettagli = document.getElementById("domanda3_dettagli_2").value;
    }
    else if(document.getElementById("domanda3_2_2").checked){
        domanda3 = 2;
    }


    var domanda4 = null;
    var domanda41 = null;
    var domanda41_dettagli = null;
    var domanda42_dettagli = null;

    if(document.getElementById("domanda4_1_2").checked){
        domanda4 = 1;
        
        if(document.getElementById("domanda41_1_2").checked)
            domanda41 = 1;
        else if(document.getElementById("domanda41_2_2").checked)
            domanda41 = 2;
        else if(document.getElementById("domanda41_3_2").checked)
            domanda41 = 3;
        else if(document.getElementById("domanda41_4_2").checked) {
            domanda41 = 4;
            domanda41_dettagli = document.getElementById("domanda41_dettagli_2").value;
        }
    }
    else if(document.getElementById("domanda4_2_2").checked){
        domanda4 = 2;
        domanda42_dettagli = document.getElementById("domanda42_2").value;
    }


    var domanda5 = null;
    var domanda51 = null;
    var domanda51_dettagli = null;

    if(document.getElementById("domanda5_1_2").checked){
        domanda5 = 1;
        domanda51_dettagli = document.getElementById("domanda51_dettagli_2").value;

        if(document.getElementById("domanda51_1_2").checked)
            domanda51 = 1;
        else if(document.getElementById("domanda51_2_2").checked)
            domanda51 = 2;
        else if(document.getElementById("domanda51_3_2").checked)
            domanda51 = 3;

    }
    else if(document.getElementById("domanda5_2_2").checked){
        domanda5 = 2;
    }

    var domanda6 = null;
    var domanda61 = null;
    var domanda61_dettagli =  null;
    var domanda62 = null;
    var domanda62_dettagli = null;

    if(document.getElementById("domanda6_1_2").checked){
        domanda6 = 1;
        domanda61_dettagli = document.getElementById("domanda61_dettagli_2").value;

        if(document.getElementById("domanda61_1_2").checked)
            domanda61 = 1;
        else if(document.getElementById("domanda61_2_2").checked)
            domanda61 = 2;
        else if(document.getElementById("domanda61_3_2").checked)
            domanda61 = 3;
        else if(document.getElementById("domanda61_4_2").checked)
            domanda61 = 4;
        else if(document.getElementById("domanda61_5_2").checked)
            domanda61 = 5;

    }
    else if(document.getElementById("domanda6_2_2").checked){
        domanda6 = 2;

        if(document.getElementById("domanda62_1_2").checked)
            domanda62 = 1;
        else if(document.getElementById("domanda62_2_2").checked)
            domanda62 = 2;
        else if(document.getElementById("domanda62_3_2").checked)
            domanda62 = 3;
        else if(document.getElementById("domanda62_4_2").checked) {
            domanda62 = 4;
            domanda62_dettagli = document.getElementById("domanda62_dettagli_2").value;
        }


    }


    var domanda7 = null;
    var domanda7_dettagli = null;

    if(document.getElementById("domanda7_1_2").checked)
        domanda7 = 1;
    else if(document.getElementById("domanda7_2_2").checked)
        domanda7 = 2;
    else if(document.getElementById("domanda7_3_2").checked)
        domanda7 = 3;
    domanda7_dettagli = document.getElementById("domanda7_dettagli_2").value;


    var domanda8 = null;
    var domanda8_dettagli = null;

    if(document.getElementById("domanda8_1_2").checked)
        domanda8 = 1;
    else if(document.getElementById("domanda8_2_2").checked)
        domanda8 = 2;
    else if(document.getElementById("domanda8_3_2").checked)
        domanda8 = 3;
    else if(document.getElementById("domanda8_4_2").checked)
        domanda8 = 4;
    else if(document.getElementById("domanda8_5_2").checked) {
        domanda8 = 5;
        domanda8_dettagli = document.getElementById("domanda8_5dettagli_2").value;
    }

    var domanda9 = null;
    var domanda9_dettagli = null;

    if(document.getElementById("domanda9_1_2").checked)
        domanda9 = 1;
    else if(document.getElementById("domanda9_2_2").checked)
        domanda9 = 2;
    else if(document.getElementById("domanda9_3_2").checked)
        domanda9 = 3;
    else if(document.getElementById("domanda9_4_2").checked)
        domanda9 = 4;
    else if(document.getElementById("domanda9_5_2").checked) {
        domanda9 = 5;
    }else if(document.getElementById("domanda9_6_2").checked)
        domanda9 = 6;
    else if(document.getElementById("domanda9_7_2").checked) {
        domanda9 = 7;
    }

    domanda9_dettagli = document.getElementById("domanda9_dettagli_2").value;



    
    var userID = 2;

    $.ajax({
        type: "POST",
        url: "./addSurvey/addCostruito.php",
        data: "USER_ID=" + userID +  
            "&DOMANDA_1=" + domanda1 +
            "&DOMANDA_1_DETTAGLI=" + domanda1_dettagli +
            "&DOMANDA_2=" + domanda2 +
            "&DOMANDA_2_DETTAGLI=" + domanda2_dettagli +
            "&DOMANDA_3=" + domanda3 + 
            "&DOMANDA_3_DETTAGLI=" + domanda3_dettagli +
            "&DOMANDA_4=" + domanda4 + 
            "&DOMANDA_41=" + domanda41 +
            "&DOMANDA_41_DETTAGLI=" + domanda41_dettagli +
            "&DOMANDA_42_DETTAGLI=" + domanda42_dettagli +
            "&DOMANDA_5=" + domanda5 +
            "&DOMANDA_51=" + domanda51 + 
            "&DOMANDA_51_DETTAGLI=" + domanda51_dettagli +
            "&DOMANDA_6=" + domanda6 +
            "&DOMANDA_61=" + domanda61 + 
            "&DOMANDA_61_DETTAGLI=" + domanda61_dettagli +
            "&DOMANDA_62=" + domanda62 +
            "&DOMANDA_62_DETTAGLI=" + domanda62_dettagli +
            "&DOMANDA_7=" + domanda7 + 
            "&DOMANDA_7_DETTAGLI=" + domanda7_dettagli +
            "&DOMANDA_8=" + domanda8 +
            "&DOMANDA_8_DETTAGLI=" + domanda8_dettagli +
            "&DOMANDA_9=" + domanda9 +
            "&DOMANDA_9_DETTAGLI=" + domanda9_dettagli,
        dataType: "html",
        success: function(msg){
            alert(msg);
        },  
    });

}

function submitSpaziInutilizzati(){
    var userID;
    var domanda1 = null;
    var domanda1_dettagli = null;

    if(document.getElementById("domanda11").checked)
        domanda1 = 1;
    else if(document.getElementById("domanda12").checked)
        domanda1 = 2;
    else if(document.getElementById("domanda13").checked)
        domanda1 = 3;
    else if(document.getElementById("domanda14").checked){
        domanda1 = 4;
        domanda1_dettagli = document.getElementById("domanda14_dettagli").value;
    }


    var domanda2 = null;
    var domanda2_dettagli = null;

    if(document.getElementById("domanda21").checked)
        domanda2 = 1;
    else if(document.getElementById("domanda22").checked)
        domanda2 = 2;
    else if(document.getElementById("domanda23").checked)
        domanda2 = 3;
    else if(document.getElementById("domanda24").checked)
        domanda2 = 4;
    else if(document.getElementById("domanda25").checked){
        domanda2 = 5;
        domanda2_dettagli = document.getElementById("domanda25_dettagli").value;
    }

    var domanda3 = document.getElementById("domanda3").value;

    var userID = 2;
    $.ajax({
        type: "POST",
        url: "./addSurvey/addSpaziInutilizzati.php",
        data: "USER_ID=" + userID +  
            "&DOMANDA_1=" + domanda1 +
            "&DOMANDA_1_DETTAGLI=" + domanda1_dettagli +
            "&DOMANDA_2=" + domanda2 + 
            "&DOMANDA_2_DETTAGLI=" + domanda2_dettagli +
            "&DOMANDA_3=" + domanda3,
        dataType: "html",
        success: function(msg){
            alert("Step 3 di 4 completato. Vai allo step 4");
            $('#nav-fattoriDinamizzanti-tab').tab('show');
        },  
    });
    
}

function submitFattoriDinamizzanti(){
    var userID;

    var domanda1 = null;
    var domanda1_dettagli = null;

    if(document.getElementById("domanda1_1_4").checked) {
        domanda1 = 1;
    }
    else if(document.getElementById("domanda1_2_4").checked) {
        domanda1 = 2;
    }
    domanda1_dettagli = document.getElementById("domanda1_dettagli_4").value;


    var domanda2 = null;
    var domanda2_dettagli = null;

    if(document.getElementById("domanda2_1_4").checked){
        domanda2 = 1;
    }
    else if(document.getElementById("domanda2_2_4").checked){
        domanda2 = 2;
    }
    domanda2_dettagli = document.getElementById("domanda2_dettagli_4").value;


    var domanda3 = null;
    var domanda3_dettagli = null;

    if(document.getElementById("domanda3_1_4").checked){
        domanda3 = 1;
    }
    else if(document.getElementById("domanda3_2_4").checked){
        domanda3 = 2;
    }
    domanda3_dettagli = document.getElementById("domanda3_dettagli_4").value;


    var domanda4 = null;
    var domanda4_dettagli = null;

    if(document.getElementById("domanda4_1_4").checked){
        domanda4 = 1;
    }
    else if(document.getElementById("domanda4_2_4").checked){
        domanda4 = 2;
    }
    else if(document.getElementById("domanda4_3_4").checked){
        domanda4 = 3;
    }
    else if(document.getElementById("domanda4_4_4").checked){
        domanda4 = 4;
        domanda4_dettagli = document.getElementById("domanda4_4_dettagli_4").value;
    }


    var domanda5 = null;
    var domanda5_dettagli = null;

    if(document.getElementById("domanda5_1_4").checked){
        domanda5 = 1;
        domanda5_dettagli = document.getElementById("domanda5_1_dettagli_4").value;
    }
    else if(document.getElementById("domanda5_2_4").checked){
        domanda5 = 2;
        domanda5_dettagli = document.getElementById("domanda5_2_dettagli_4").value;
    }
    else if(document.getElementById("domanda5_3_4").checked){
        domanda5 = 3;
        domanda5_dettagli = document.getElementById("domanda5_3_dettagli_4").value;
    }
    else if(document.getElementById("domanda5_4_4").checked){
        domanda5 = 4;
        domanda5_dettagli = document.getElementById("domanda5_4_dettagli_4").value;
    }
    else if(document.getElementById("domanda5_5_4").checked){
        domanda5 = 5;
        domanda5_dettagli = document.getElementById("domanda5_5_dettagli_4").value;
    }

    var userID = 2;
    $.ajax({
        type: "POST",
        url: "./addSurvey/addFattoriDinamizzanti.php",
        data: "USER_ID=" + userID +
            "&DOMANDA_1=" + domanda1 +
            "&DOMANDA_1_DETTAGLI=" + domanda1_dettagli +
            "&DOMANDA_2=" + domanda2 +
            "&DOMANDA_2_DETTAGLI=" + domanda2_dettagli +
            "&DOMANDA_3=" + domanda3 +
            "&DOMANDA_3_DETTAGLI=" + domanda3_dettagli +
            "&DOMANDA_4=" + domanda4 +
            "&DOMANDA_4_DETTAGLI=" + domanda4_dettagli +
            "&DOMANDA_5=" + domanda5 +
            "&DOMANDA_5_DETTAGLI=" + domanda5_dettagli,
        dataType: "html",
        success: function(msg){
            alert("Step 4 di 4 completato! \nGrazie per la collaborazione");
        },
        error: function(msg){
            alert(msg);
        }
    });


}




function subimtCittaAltaFutura(){
    var userID;
    var domanda1 = null;
    var domanda1_dettagli = null;

    if(document.getElementById("domanda11").checked)
        domanda1 = 1;
    else if(document.getElementById("domanda12").checked)
        domanda1 = 2;
    else if(document.getElementById("domanda13").checked)
        domanda1 = 3;
    else if(document.getElementById("domanda14").checked){
        domanda1 = 4;
        domanda1_dettagli = document.getElementById("domanda14_dettagli").value;
    }

    var domanda2 = null;
    var domanda2_dettagli = null;

    if(document.getElementById("domanda21").checked){
        domanda2 = 1;
        domanda2_dettagli = document.getElementById("domanda21_dettagli").value;
    }
    else if(document.getElementById("domanda22").checked){
        domanda2 = 2;
        domanda2_dettagli = document.getElementById("domanda22_dettagli").value;
    }
    else if(document.getElementById("domanda23").checked){
        domanda2 = 3;
        domanda2_dettagli = document.getElementById("domanda23_dettagli").value;
    }
    else if(document.getElementById("domanda24").checked){
        domanda2 = 4;
        domanda2_dettagli = document.getElementById("domanda24_dettagli").value;
    }
    else if(document.getElementById("domanda25").checked){
        domanda2 = 5;
        domanda2_dettagli = document.getElementById("domanda25_dettagli").value;
    }
    else if(document.getElementById("domanda26").checked){
        domanda2 = 6;
        domanda2_dettagli = document.getElementById("domanda26_dettagli").value;
    }

    var domanda3 = null;
    var domanda3_dettagli = null;

    if(document.getElementById("domanda31").checked){
        domanda3 = 1;
        domanda3_dettagli = document.getElementById("domanda31_dettagli").value;
    }
    else if(document.getElementById("domanda32").checked){
        domanda3 = 2;
        domanda3_dettagli = document.getElementById("domanda32_dettagli").value;
    }
    else if(document.getElementById("domanda33").checked){
        domanda3 = 3;
        domanda3_dettagli = document.getElementById("domanda33_dettagli").value;
    }
    else if(document.getElementById("domanda34").checked){
        domanda3 = 4;
        domanda3_dettagli = document.getElementById("domanda34_dettagli").value;
    }
    else if(document.getElementById("domanda35").checked){
        domanda3 = 5;
        domanda3_dettagli = document.getElementById("domanda35_dettagli").value;
    }
    else if(document.getElementById("domanda36").checked){
        domanda3 = 6;
        domanda3_dettagli = document.getElementById("domanda36_dettagli").value;
    }

    var userID = 2;
    $.ajax({
        type: "POST",
        url: "./addSurvey/addCittaAltaFutura.php",
        data: "USER_ID=" + userID +  
            "&DOMANDA_1=" + domanda1 +
            "&DOMANDA_1_DETTAGLI=" + domanda1_dettagli +
            "&DOMANDA_2=" + domanda2 + 
            "&DOMANDA_2_DETTAGLI=" + domanda2_dettagli +
            "&DOMANDA_3=" + domanda3 +
            "&DOMANDA_3_DETTAGLI=" + domanda3_dettagli,
        dataType: "html",
        success: function(msg){
            alert(msg);
        },  
    });

}


function saveProposta(){
    alert("ciao");
}

$('#selectTipologiaSegnalazione').on('change',function() {

    if($(this).val() == 1){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalAccessibilita.html");
    }
    if($(this).val() == 2){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalFunzioneDegliEdifici.html");
    }
    if($(this).val() == 3){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalEdificiDaRiqualificare.html");
    }
    if($(this).val() == 4){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalFattoriDinamizzanti.html");
    }
    if($(this).val() == 5){
        $("#panelTipologiaSegnalazione").load("modalNewProposta/modalCittaAltaPerTutti.html");
    }
  });