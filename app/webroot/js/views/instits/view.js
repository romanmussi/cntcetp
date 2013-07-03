(function($){
    // EVENTOS MANEJADOS on dom loaded
    $(function(){
        $('#alerta-desactualizada').click( handleAlertaDesactualizada );
        $('.js-masinfo-titulo').click( viewTitulo );
    });

    
    // Abre el poppu de envio de email. que es como un formulario de contacto
    function handleAlertaDesactualizada(e) {
        
        e.preventDefault();
        var ventanitaDelAmor = $("<div id='dialog'>");
        ventanitaDelAmor.title = 'Formulario de Envío';

        ventanitaDelAmor.load( this.href, function(data){
            ventanitaDelAmor.find('form').submit( function(e) {
                if ($.trim($("#CorreoDescripcion").val()) == '') {
                    alert("Debe especificar una descripción sobre la desactualización");
                    return false;
                }
                e.preventDefault();
                $('#CorreoDesactualizadaForm').html('<p style="text-align: center;">Enviando ...</p>');
                $.post(this.action, $(this).serialize(), function(e,t){
                    ventanitaDelAmor.dialog('close');
                })
            });
        } );
        
        $('body').append(ventanitaDelAmor);
        $("#dialog").dialog({
            width: 500,
            position: 'top',
            zIndex: 3999,
            draggable: true,
            modal: true,
            resizable: false,
            title:"Notificar información desactualizada",
            beforeClose: function(event, ui) {
                $("#dialog").remove();
            }
        });

        return false;
    }

})(jQuery);


function viewTitulo(url, title) {
    var dialog = jQuery('<div id="create_dialog"></div>')
    .html('<p style="text-align: center">... cargando información <span class="ajax-loader"></span></p>')
    .dialog({
        width: 500,
        //position: 'top',
        zIndex: 3999,
        title: title,
        draggable: true,
        modal: true,
        resizable: false,
        beforeclose: function(event, ui) {
            jQuery(".ui-dialog").remove();
            jQuery("#create_dialog").remove();
        }
    });

    jQuery.ajax({
        url: url,
        cache: false,
        success: function(data) {
            dialog.html(data);
        }
    });

    return false;
}