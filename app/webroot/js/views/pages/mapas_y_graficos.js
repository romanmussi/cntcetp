data_sup = [["Administración", 46101 ],
            ["Salud", 32913 ],
            ["Informática", 22716 ],
            ["Seguridad, Ambiente e Higiene", 1115 ],
            ["Agropecuario", 11133 ],
            ["Industria Gráfica y Multimedial", 11049 ],
            ["Turismo", 10884 ],
            ["Gastronomía y Hotelería", 9000 ],
            ["Actividades Artísticas Técnicas", 4432 ],
            ["Electrónica", 4163 ],
            ["Industria de la Alimentación", 3227 ],
            ["Textil e Indumentaria", 2259 ],
            ["Electromecánica", 1785 ],
            ["Industria de Procesos", 1714 ],
            ["Construcción", 1298 ],
            ["Minería e Hidrocarburos", 1089 ],
            ["Automotriz", 880 ],
            ["Energía", 386 ],
            ["Energia Eléctrica", 253 ],
            ["Madera y Mueble", 204 ],
            ["Mecánica Metalmecánica y Metalurgia", 167 ],
            ["Naval", 121 ],
            ["Estética Profesional", 51]];
		
data_sec = [["Electromecánica", 72378 ],
            ["Agropecuario", 40897 ],
            ["Construcción", 32458 ],
            ["Informática", 27001 ],
            ["Administración", 26253 ],
            ["Electrónica", 22105 ],
            ["Industria de Procesos", 20623 ],
            ["Automotriz", 8043 ],
            ["Mecánica, Metalmecánica y Metalurgia", 665 ],
            ["Industria de la Alimentación", 6153 ],
            ["Energia Eléctrica", 4781 ],
            ["Industria Gráfica y Multimedial", 4313 ],
            ["Aeronáutica", 3058 ],
            ["Turismo", 2951 ],
            ["Seguridad, Ambiente e Higiene", 2273 ],
            ["Minería e Hidrocarburos", 203 ],
            ["Actividades Artísticas Técnicas", 992 ],
            ["Salud", 689 ],
            ["Naval", 550 ],
            ["Textil e Indumentaria", 327 ],
            ["Madera y Mueble", 314 ],
            ["Gastronomía y Hotelería", 227 ],
            ["Energía", 206 ]];
					
data_fp = [["Informática", 94269 ],
        ["Textil e Indumentaria", 57633 ],
        ["Gastronomía y Hotelería", 55001 ],
        ["Construcción", 47042 ],
        ["Administración", 31460 ],
        ["Energia Eléctrica", 29748 ],
        ["Estética Profesional", 28966 ],
        ["Automotriz", 22440 ],
        ["Agropecuario", 22215 ],
        ["Mecánica, Metalmecánica y Metalurgia", 2821 ],
        ["Madera y Mueble", 19032 ],
        ["Industria Gráfica y Multimedial", 18521 ],
        ["Actividades Artísticas Técnicas", 15639 ],
        ["Electrónica", 13288 ],
        ["Industria de la Alimentación", 11933 ],
        ["Idioma", 10057 ],
        ["Electromecánica", 6224 ],
        ["Seguridad, Ambiente e Higiene", 113 ],
        ["Cuero y Calzado", 3855 ],
        ["Turismo", 3707 ],
        ["Salud", 3243 ],
        ["Industria de Procesos", 2755 ],
        ["Aeronáutica", 141 ],
        ["Minería e Hidrocarburos", 91 ],
        ["Energía", 76 ]];


google.load("visualization", "1", {packages:["corechart"]});

jQuery(document).ready(function(){

    

    jQuery('.mapa').maphilight({
        fade: false,
        fillColor: '045FB4',
        fillOpacity: 0.2,
        stroke: false
    });


    crear_cuadro('grafico_sup', data_sup);
    crear_cuadro('grafico_sec', data_sec);
    crear_cuadro('grafico_fp', data_fp);

    jQuery('.js-tabs-ofertas').tabs({
        fx: { 
        opacity: 'toggle' 
        },
    });
});
    


    
    

    function viewJurisdiccion(oferta_id, jurisdiccion_id, titulo) {
        var dialog = jQuery('<div id="create_dialog"></div>')
        .html('... cargando información <span class="ajax-loader"></span>')
        .dialog({
            width: 350,
            //position: 'top',
            zIndex: 3999,
            title: titulo,
            draggable: false,
            modal: true,
            resizable: false,
            beforeclose: function(event, ui) {
                jQuery(".ui-dialog").remove();
                jQuery("#create_dialog").remove();
            }
        });

        jQuery.ajax({
            url: urlDomain + '/instits/getDatosJurisdiccionParaMapa/'+oferta_id+'/'+jurisdiccion_id,
            cache: false,
            success: function(data) {
                dialog.html(data);
            }
        });

        return false;
    }
    
    function crear_cuadro(id, raw_data){
    	var data = new google.visualization.DataTable();
	    data.addColumn('string', 'Sector');
        data.addColumn('number', 'Cantidad');
	    data.addRows(raw_data);
	    data.sort({column: 1, desc: true});

		$("#"+id).click(function(){popupCuadro(raw_data)});	    
	    var chart = new google.visualization.BarChart(document.getElementById(id));
		chart.draw(data, {
                                      width: 400, 
                                      height: 700, 
                                      backgroundColor: '#FCFDFD',
                                      fontSize: 11,
                                      legend:'none', 
                                      chartArea: {left:200,top:20,width:"90%",height:"85%"}, 
                                      colors:["#0082CA"]
                                  });

    }
    