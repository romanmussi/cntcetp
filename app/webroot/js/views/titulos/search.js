$(function(){

    $('#SectorId').change(function(){
        var url = urlDomain+'/subsectores/ajax_select_subsector_form_por_sector';
        var loader = $('#subsector-loader');
        loader.show();
        $.post(url,{'data[sector_id]':$(this).val()},function(data){
            $('#SubsectorId').html(data);
            loader.hide();
        })
    });
    
    $('#jurisdiccion_id').live("change",function(event){
        reloadCombo($(this).val());
        $('#LocalidadName').val('');
        $("#hiddenLocId").val('');
    });

    $('#departamento_id').live("change",function(event){
        $('#LocalidadName').val('');
        $("#hiddenLocId").val('');
    });

    $("#LocalidadName").live("keyup",function(event){
        if($("#LocalidadName").val().length == 0){
            $("#hiddenLocId").val('');
            $("#jurisdiccion_id").val('');
            $("#departamento_id").val('');
        }
    });
    

    function reloadCombo(jur, depto){
        var url = urlDomain+'/departamentos/ajax_select_departamento_form_por_jurisdiccion';
        var loader = $('#depto-loader');
        var domDepto = $('#departamento_id');
        loader.show();
        $.post(url,{'data[jurisdiccion_id]':jur},function(data){
            domDepto.html(data);
            domDepto.val(depto);
            loader.hide();
        })
    }

});


function init__SearchFormJs(locUrl) {
    $( "#LocalidadName" ).autocomplete({
            source: function( request, response ) {
                    $.ajax({
                            url: locUrl,
                            dataType: "json",
                            data: {
                                    featureClass: "P",
                                    style: "full",
                                    maxRows: 30,
                                    q: request.term,
                                    jur: function() { return jQuery('#jurisdiccion_id').val(); },
                                    depto: function() { return jQuery('#departamento_id').val(); }
                            },
                            success: function( data ) {
                                    response( $.map( data, function( item ) {
                                            return {
                                                    label: item.localidad_id == '' ? item.localidad : item.localidad + ', ' + item.departamento + ' (' + item.jurisdiccion + ')',
                                                    value: item.localidad,
                                                    localidad_id: item.localidad_id,
                                                    jurisdiccion_id: item.jurisdiccion_id,
                                                    departamento_id: item.departamento_id,
                                                    shortlabel: item.localidad
                                            }
                                    }));
                            }
                    });
            },
            minLength: 2,
            select: function( event, ui ) {
                    if(ui.item && ui.item.jurisdiccion_id) {
                        $("#jurisdiccion_id").val(ui.item.jurisdiccion_id);
                        $("#departamento_id").val(ui.item.departamento_id);
                        $("#LocalidadName").val(ui.item.shortlabel);
                        $("#hiddenLocId").val(ui.item.localidad_id);
                    }
                    else {
                        $("#LocalidadName").val('');
                        $("#hiddenLocId").val('');
                    }
                     
            },
            open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
    });
    
}
