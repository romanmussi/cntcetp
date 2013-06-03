data_sup = [["Administraci�n", 46101 ],
            ["Salud", 32913 ],
            ["Inform�tica", 22716 ],
            ["Seguridad, Ambiente e Higiene", 16115 ],
            ["Agropecuario", 11133 ],
            ["Industria Gr�fica y Multimedial", 11049 ],
            ["Turismo", 10884 ],
            ["Gastronom�a y Hoteler�a", 9000 ],
            ["Actividades Art�sticas T�cnicas", 4432 ],
            ["Electr�nica", 4163 ],
            ["Industria de la Alimentaci�n", 3227 ],
            ["Textil e Indumentaria", 2259 ],
            ["Electromec�nica", 1785 ],
            ["Industria de Procesos", 1714 ],
            ["Construcci�n", 1298 ],
            ["Miner�a e Hidrocarburos", 1089 ],
            ["Automotriz", 880 ],
            ["Energ�a", 386 ],
            ["Energia El�ctrica", 253 ],
            ["Madera y Mueble", 204 ],
            ["Mec�nica Metalmec�nica y Metalurgia", 167 ],
            ["Naval", 121 ],
            ["Est�tica Profesional", 51]];
		
data_sec = [["Electromec�nica", 72378 ],
            ["Agropecuario", 40897 ],
            ["Construcci�n", 32458 ],
            ["Inform�tica", 27001 ],
            ["Administraci�n", 26253 ],
            ["Electr�nica", 22105 ],
            ["Industria de Procesos", 20623 ],
            ["Automotriz", 8043 ],
            ["Mec�nica, Metalmec�nica y Metalurgia", 7665 ],
            ["Industria de la Alimentaci�n", 6153 ],
            ["Energia El�ctrica", 4781 ],
            ["Industria Gr�fica y Multimedial", 4313 ],
            ["Aeron�utica", 3058 ],
            ["Turismo", 2951 ],
            ["Seguridad, Ambiente e Higiene", 2273 ],
            ["Miner�a e Hidrocarburos", 1203 ],
            ["Actividades Art�sticas T�cnicas", 992 ],
            ["Salud", 689 ],
            ["Naval", 550 ],
            ["Textil e Indumentaria", 327 ],
            ["Madera y Mueble", 314 ],
            ["Gastronom�a y Hoteler�a", 227 ],
            ["Energ�a", 206 ]];
					
data_fp = [["Inform�tica", 94269 ],
        ["Textil e Indumentaria", 57633 ],
        ["Gastronom�a y Hoteler�a", 55001 ],
        ["Construcci�n", 47042 ],
        ["Administraci�n", 31460 ],
        ["Energia El�ctrica", 29748 ],
        ["Est�tica Profesional", 28966 ],
        ["Automotriz", 22440 ],
        ["Agropecuario", 22215 ],
        ["Mec�nica, Metalmec�nica y Metalurgia", 21821 ],
        ["Madera y Mueble", 19032 ],
        ["Industria Gr�fica y Multimedial", 18521 ],
        ["Actividades Art�sticas T�cnicas", 15639 ],
        ["Electr�nica", 13288 ],
        ["Industria de la Alimentaci�n", 11933 ],
        ["Idioma", 10057 ],
        ["Electromec�nica", 6224 ],
        ["Seguridad, Ambiente e Higiene", 4113 ],
        ["Cuero y Calzado", 3855 ],
        ["Turismo", 3707 ],
        ["Salud", 3243 ],
        ["Industria de Procesos", 2755 ],
        ["Aeron�utica", 141 ],
        ["Miner�a e Hidrocarburos", 91 ],
        ["Energ�a", 76 ]];


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
        .html('... cargando informaci�n <span class="ajax-loader"></span>')
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
    