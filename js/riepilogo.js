$('#radio-riepilogo-toggle').click(function (){
    alert($('input:radio[name=options]:checked').val());
    if($('input:radio[name=options]:checked').val() == 'map') { 
        $('#portfoglio-riepilogo').css("display", 'none');
        $('#table-riepilogo').css("display", 'none');
    }
    else if($('input:radio[name=options]:checked').val() == 'list') { 
        $('#portfoglio-riepilogo').css("display", 'flex');
        $('#table-riepilogo').css("display", 'none');
    }
    else if($('input:radio[name=options]:checked').val() == 'table') { 
        $('#portfoglio-riepilogo').css("display", 'none');
        $('#table-riepilogo').css("display", 'inline');
    }
});

