//$('#radio-riepilogo-toggle').click(function (){
//    //alert($('input:radio[name=options]:checked').val());
//    if($('input:radio[name=options]:checked').val() == 'map') { 
//        $('#portfoglio-riepilogo').css("display", 'none');
//        $('#table-riepilogo').css("display", 'none');
//    }
//    else if($('input:radio[name=options]:checked').val() == 'list') { 
//        $('#portfoglio-riepilogo').css("display", 'flex');
//        $('#table-riepilogo').css("display", 'none');
//    }
//    else if($('input:radio[name=options]:checked').val() == 'table') { 
//        $('#portfoglio-riepilogo').css("display", 'none');
//        $('#table-riepilogo').css("display", 'inline');
//    }
//});

$('#selector button').click(function() {
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


$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })

