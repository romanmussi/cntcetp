(function($){ 
    /////////////////////////////////////////////////////////////////
    // Parametros de configuracion
    // Elementos utilizados

    var paginatorTemplate = $('#paginatorTemplate');
    
    
    var titulosForm = $('#TituloSearchForm');
    var titulosContainer = $( "#li_titulos ul.results" );
    var titulosPaginator = $("#li_titulos .paginatorContainer");
    var titulosTemplate = $("#tituloTemplate");
    var tituloOfertaSection = $("#ofertas_section");
    var tituloSectorCombo = $("#TituloSectorId");
    var tituloName = $("#TituloTituloName");

    
    var institsForm = $('#InstitSearchForm');
    var institsContainer = $( "#li_instits ul.results" );
    var institsTemplate = $("#institTemplate");
    var institsPaginator = $("#li_instits .paginatorContainer");
    var institJurisdiccionCombo = $("#InstitJurisdiccionId");
    var institDepartamentoCombo = $("#InstitDepartamentoId");
    var institLocalidadCombo = $("#InstitLocalidadId");
    var institGestionSection = $("#gestion_section");
    var institName = $("#InstitNombre");

    var filtrosForm = $("#FiltrosAplicadosForm");
    var filtrosContainer = $("#filtrosContainer");

    var __parentFilters = [];
    __parentFilters["data[Instit][jurisdiccion_id]"] = ["data[Instit][departamento_id]"];
    __parentFilters["data[Instit][departamento_id]"] = ["data[Instit][localidad_id]"];
  
    //Eventos
    //
    $(".deleteable").live("click",function(event){
        var idToDelete = jQuery(event.currentTarget).siblings("input").attr('id');
        deleteFilter(idToDelete);
        titulosForm.submit();
        return false;
    });

    $(".add_filter").live("click",function(event){
        titulosForm.submit();
    });

    $(".styled_checkbox").live("click",function(event){
        $("#items li").removeClass("selected_title");
        $(this).parent().addClass("selected_title");
    });
    
    $('input[type=text]').live("keypress", function(e){
        if(e.which === 13){
            titulosForm.submit();   
        }
    });

    $(".autosubmit").live("change",function(event){
        titulosForm.submit();
    });
    
    function deleteFilter(id){
        var escapedId = id.replace(/\[/g, "\\[");
        var childId;
        escapedId = escapedId.replace(/\]/g, "\\]");
        jQuery("#" + escapedId).parent().remove();
        if(__parentFilters[id]){
            for(childId in __parentFilters[id]) {
                if (__parentFilters[id].hasOwnProperty(childId)){
                    deleteFilter(__parentFilters[id][childId]);
                }
            }
        }
    }

    /////////////////////////////////////////////////////////////////
    // functiones Principales
    //
    var __blockResultConsole = function () {
        jQuery(institsContainer).html('');
        jQuery('.results_titulos').mask('Buscando');
        jQuery('#filtro, .filtros-aplicados ').block({
            message: '',
            css: {
                backgroundColor: 'transparent'
            },
            overlayCSS:  {
                backgroundColor: 'transparent',
                opacity:         0.0
            }
        });
        return true;
    };

    var __unblockResultConsole = function () {
        jQuery('.results_titulos').unmask();
        jQuery('#filtro, .filtros-aplicados ').unblock();
    };

    var __hideWithLabel = function(input){
        var label = titulosForm.find("label[for=" + input.attr("id") + "]");
        var plus = $(input).next('.add_filter');
        label.hide();
        input.hide();
        input.attr('disabled','disabled');
        plus.hide();
    };

    var __showWithLabel = function(input){
         var label = titulosForm.find("label[for=" + input.attr("id") + "]");
         var plus = $(input).next('.add_filter');
         label.show();
         input.show();
         input.removeAttr('disabled');
         plus.show();
         $(input).effect("highlight", {}, 1000);
    };
    
    /**
     * Trae los titulos en JSON, usando ajax
     */
    function getTitulos(href) {

        var url = '';

//        $('#filtro,.filtros-aplicados').block({ message: null,
//                                                css: { backgroundColor: 'transparent'}
//        });

        __blockResultConsole();

        if (typeof href === 'object') {
            url = urlDomain + '/titulos/filtros_search_results.json';
            __blanquearContainers();
        } else {
            url = href;
        }
        __recargarFiltrosAplicados(titulosForm.serializeArray());

        var postvar = $.post(
                url,
                filtrosForm.serialize(),
                __actualizarTitulos,
                'json'
            );


        postvar.error(function (XMLHttpRequest, textStatus, errorThrown) {
        //console.debug(XMLHttpRequest);
        //console.debug(textStatus);
        //console.debug(errorThrown);
        });
        return false;
    }
    
    
    // trae las instituciones de los titulos seleccionados
    function getInstits(e) {
        var url = '';

        $('.results_instits').mask('Buscando');
        jQuery('#filtro, .filtros-aplicados ').block({
            message: '',
            css: {
                backgroundColor: 'transparent'
            },
            overlayCSS:  {
                backgroundColor: 'transparent',
                opacity:         0.0
            }
        });

        if (typeof e === 'object') {
            url = e.target.action;
        } else {
            url = e;
        }

        var params = filtrosForm.serialize() + "&" + institsForm.serialize();
        var postvar = $.post(
                url,
                params,
                __meterInstitsEnTemplate,
                'json'
            );

        postvar.error(function (XMLHttpRequest, textStatus, errorThrown) {
            console.debug(XMLHttpRequest);
            console.debug(textStatus);
            console.debug(errorThrown);
        });
        return false;
    }
    
    // este sera llamado luego de hacver click en alguna pagina del paginator
    function getTitulosDelPaginator(e) {      
        e.preventDefault();

        var href = e.target.href;
        if (href) {
            getTitulos(href + '.json');
        }
        return false;        
    }
    
    
    
    // este sera llamado luego de hacver click en alguna pagina del paginator
    function getInstitsDelPaginator(e) {
        e.preventDefault();

        var href = e.target.href;
        if (href) {
            getInstits(href + '.json');
        }
        return false;        
    }
    
    
    
    /////////////////////////////////////////////////////////////////
    //
    // Funciones extra
    //
    /////////////////////////////////////////////////////////////////
    
    var __actualizarTitulos = function (data) {
        __recargarFiltros(data.filtros);
        __meterTitulosEnTemplate(data);
        __ajustarAlturas(['.results_titulos','.results_instits']);
        __ajustarAlturas(['#li_instits', '#li_titulos']);
        
    };

    var __recargarFiltrosAplicados = function (params) {
        var i;
        var len = params.length;
        for(i = 0; i< len;i++)
        {
            if(params[i].name !== '_method' && params[i].value !== ''){
                input = titulosForm.find("[name='" + params[i].name + "']");
                
                if(input.size() > 1){
                    input = jQuery.grep(input, function(n, j){
                      return $(n).val() == params[i].value;
                    });
                    input = $(input);
                }
                
                if(input.is('select')){
                    valor = titulosForm.find("[name='" + params[i].name + "']").find("option[value='"+params[i].value+"']").html();
                    nombre = titulosForm.find("label[for=" + input.attr("id") + "]").html().replace("<br>", "");
                }
                else if(input.is('input[type=radio]')){
                    valor = titulosForm.find("label[for=" + input.attr("id") + "]").html().replace("<br>", "");
                    nombre = titulosForm.find("label[for='" + params[i].name + "']").html().replace("<br>", "");
                }
                else if(input.is('input')){
                    valor = titulosForm.find("[name='" + params[i].name + "']").val();
                    nombre = titulosForm.find("label[for=" + input.attr("id") + "]").html().replace("<br>", "");
                }
                
                $('<span class="filtro"/>').html("<span><strong>" + nombre + "</strong>" + valor + "</span><a href='#' class='deleteable' alt='Quitar este criterio de b&uacute;squeda'> X </a><div class='clear'></div>")
                .append(
                    $('<input>').attr({
                        type: 'hidden',
                        id: params[i].name,
                        name: params[i].name,
                        value: params[i].value
                    })
                ).appendTo('#FiltrosAplicadosForm');
            }
        }
        var cont = $(".filtros-aplicados .filtro").length;
        if(cont > 0){
            $("#sin_filtros").hide();
        }
        else{
            $("#sin_filtros").show();
        }
        __ajustarAlturas(['#filtro', '.filtros-aplicados']);
        
        $(".filtros-aplicados").effect("highlight", {}, 3000);
    };

    var __recargarFiltros = function (data) {
        if(typeof data.TituloName === 'undefined' || data.TituloName === ''){
            __showWithLabel(tituloName);
        }
        else{
            tituloName.val('');
            __hideWithLabel(tituloName);
        }

        if(typeof data.InstitName === 'undefined' || data.InstitName === ''){
            __showWithLabel(institName);
        }
        else{
            institName.val('');
            __hideWithLabel(institName);
        }
        __recargaRadio(tituloOfertaSection,data.Oferta, 'TituloOfertaId','data[Titulo][oferta_id]');
        __recargaCombo(tituloSectorCombo,data.Sector);
        
        __recargaCombo(institJurisdiccionCombo,data.Jurisdiccion);
        __recargaCombo(institDepartamentoCombo,data.Departamento);
        __recargaCombo(institLocalidadCombo,data.Localidad);
        __recargaRadio(institGestionSection,data.Gestion, 'InstitGestionId','data[Instit][gestion_id]');

        $(".seccion").each(function() {
            var size = 0;

            size += $(this).find("input:visible").size();
            size += $(this).find("select:visible").size();

            if(size === 0 ){
                $(this).find('.msj-vacio').show();
            }
            else{
                $(this).find('.msj-vacio').hide();
            }
        });

        __ajustarAlturas(['#filtro', '.filtros-aplicados']);
    };

    var __recargaCombo = function (combo,data){
        var options = [];
        var label = titulosForm.find("label[for=" + combo.attr("id") + "]");
        options.push('<option value="">Seleccione...</option>');
        var n = 0;
        var key;
        for (key in data) {
            if(data.hasOwnProperty(key)){
                if(key !== "" && data[key] !== ""){
                options.push('<option value="',
                             key, '">',
                             data[key], '</option>');
                n++;
                }
            }
        }
        

        if(n >= 2){
            combo.html(options.join(''));
            __showWithLabel(combo);
        }
        else{
            __hideWithLabel(combo);
        }
        
    };

    var __recargaRadio = function (section,data, id,name){
        var options = [];
        var n = 0;
        var key;

        section.html('');
                
        for (key in data) {
            if(data.hasOwnProperty(key)){
                if(key !== "" && data[key] !== ""){
                    options.push('<input type="radio" value="' +
                                 key +
                                 '" class="autosubmit" id="' + id +
                                 n +
                                 '" name="' + name + '"/>' +
                                 '<label for="' + id +  n + '">' + data[key] + '</label>'
                                );
                    n++;
                }
            }
        }

        if(n >= 2){
            section.html(options.join(''));
            __showWithLabel(section);
            titulosForm.find("label[for='" + name + "']").show();

        }
        else{
            __hideWithLabel(section);
             titulosForm.find("label[for='" + name + "']").hide();
        }

    };

    var __meterTitulosEnTemplate = function (data) {
        // primero borro el contenido
        titulosContainer.html('');
        
        __updatePaginatorElement(data, titulosPaginator, getTitulosDelPaginator);       
        
        // meto la nueva data
        titulosTemplate.tmpl( data.data ).appendTo( titulosContainer );

        //titulosContainer.delegate('li','click',onChangeHandlerTitulos );
        titulosContainer.find('li > input').change( onChangeHandlerTitulos );

        __unblockResultConsole();
        //$('#filtro,.filtros-aplicados').unblock();
    };

    var __checkParentClick = function(eventObject){
        jQuery(eventObject.currentTarget).find('.styled_checkbox').click();
    };
    
    var __updatePaginatorElement = function(data, paginatorContainer, callback) {
        paginatorContainer.html('');
        paginatorTemplate.tmpl( data.paginator ).appendTo( paginatorContainer );
        var pagNumbers = paginatorContainer.find('.numbers');
        pagNumbers.unbind('click');
        pagNumbers.bind('click', callback );
                
    };
    
    
    var onChangeHandlerTitulos = function( e ) {   
        institsForm.submit();
    };
    
    
    var __meterInstitsEnTemplate = function ( data ) {
       institsContainer.html('');
       institsTemplate.tmpl( data.data ).appendTo( institsContainer );
       
       __updatePaginatorElement(data, institsPaginator, getInstitsDelPaginator);

       $('.results_instits').unmask();
       jQuery('#filtro, .filtros-aplicados ').unblock();
       __ajustarAlturas(['.results_titulos','.results_instits']);
       __ajustarAlturas(['#li_instits', '#li_titulos']);
    };
    
    var __blanquearContainers = function() {
        institsContainer.html('');
        institsPaginator.html('');
    };

    function __ajustarAlturas(selectores) {
        alturaMax = 0;
        alturaSelector = 0;
        selectoresText = selectores.join(",");

        $(selectoresText).attr('style', '');

        for (x=0;x<selectores.length;x++){
            alturaSelector = $(selectores[x]).outerHeight();
            alturaMax = alturaSelector > alturaMax ? alturaSelector : alturaMax;
        }

        $(selectoresText).outerHeight(alturaMax);
     }

    $(function(){
       __ajustarAlturas(['#filtro', '.filtros-aplicados']);
    });


    /////////////////////////////////////////////////////////////////
    // Inicializacion de los formularios
    titulosForm.submit(getTitulos);
    
    institsForm.submit(getInstits);

    __hideWithLabel(institDepartamentoCombo);
    __hideWithLabel(institLocalidadCombo);
    /////////////////////////////////////////////////////////////////

}(jQuery));
