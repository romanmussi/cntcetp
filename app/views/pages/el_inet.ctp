<script type="text/javascript">
function viewDescription(este) {
    var title = $(este).html();
    
    $(este.hash).dialog({
        width: 600,
        title: title
    });
      
    return false;
}
</script>

<?php echo $html->css('catalogo.el_inet', false);?> 


<div class="grid_12">
    <h1>El Instituto Nacional de Educación Tecnológica</h1>
    <div class="boxblanca boxdocs">
            
        <h3>Estructura</h3>
        <div class="centrado">
                        
            <div id="el_inet_graph">
                <a href="#txt_comision" class="box_roja" id="graph_comision" onclick="return viewDescription(this)">Comisión Federal de Educación Técnico Profesional</a>
                <a href="#txt_consejo_federal" class="box_roja" id="graph_consejo_federal" onclick="return  viewDescription(this)">Consejo Federal de Educación</a>
                <a href="#txt_consejo_nacional" class="box_roja" id="graph_consejo_nacional" onclick="return  viewDescription(this)">Consejo Nacional de Educación Trabajo y Producción (CONETyP)</a>
                <a href="#txt_inet" class="box_azul" id="graph_inet" onclick="return viewDescription(this)">Instituto Nacional de<br />Educación Tecnológica</a>
                <a href="http://www.me.gov.ar/" class="box_azul" target="_blank" id="graph_me">Ministerio de Educación</a>
                
                <span class="box_celeste" id="graph_secretaria_educacion">Secretaria de<br />Educación</span>
                <span class="box_celeste" id="graph_secretaria_politicas_universitarias">Secretaria de Políticas Universitarias</span>
            </div>
            
            <div class="show_in_dialog" id="txt_consejo_federal">
                Ámbito de concertación, acuerdo y coordinación de la política educativa nacional, 
                presidido por el Ministro de Educación Nacional e integrado por las autoridades 
                educativas de las 23 provincias argentinas y de la Ciudad Autónoma de Buenos Aires.
                <br/>
                <p>
                    Para obtener más información 
                    <a target='_blank' href='http://portal.educacion.gov.ar/consejo/el-consejo/'>
                        haga click aquí</a>
                </p>
            </div>
            
            <div class="show_in_dialog" id="txt_inet">
                El INET es el organismo del Ministerio de Educación que tiene a su cargo la coordinación de la aplicación de las políticas públicas de manera concertada y concurrente con las provincias y la Ciudad Autónoma de Buenos Aires, relativas a la educación técnico profesional en los niveles secundario técnico, superior técnico y de formación profesional.<br /> Promueve la mejora continua de la calidad de la ETP, asegurando mayores niveles de inclusión y adecuando en forma permanente la oferta educativa a las necesidades sociales, productivas y territoriales.<br/> La Ley de Educación Técnico Profesional 26.058 en su Art. Nº 45. asigna las responsabilidades y funciones del organismo. Cuenta con dos ámbitos permanentes de consulta y acuerdo: la Comisión Federal de ETP y el Consejo Nacional de Educación Trabajo y Producción (CoNETyP), con quienes elabora las propuestas a ser presentadas para su aprobación al Consejo Federal de Educación.<br/><p>Para obtener más información <a target='_blank' href='http://www.inet.edu.ar/'>haga click aquí</a></p>
            </div>
            
            <div class="show_in_dialog" id="txt_consejo_nacional">
                Este Consejo, cuya Secretaría Permanente lleva la Dirección Ejecutiva del INET, tiene como función asesorar al Ministro de Educación en todos los aspectos que tiendan a la vinculación de la educación con el mundo del trabajo, de la producción, de la ciencia y la tecnología.<BR /> En el marco de dicho Consejo se desarrollan foros sectoriales, constituidos por referentes clave de cada sector, a partir de los cuales se elaboran las propuestas específicas de formación y capacitación.<BR />Para asegurar su representatividad, el CONETyP se conforma con representantes de los Ministerios de Educación, de Trabajo y de Producción, de Ciencia y Tecnología, del Consejo Federal de Educación, de las cámaras empresarias - en particular de la pequeña y mediana empresa -, de las organizaciones de los trabajadores, incluidas las entidades gremiales docentes, las entidades profesionales de técnicos, y de entidades empleadoras que brindan educación técnico profesional de gestión privada.
                <p>
                    Para obtener más información 
                    <a target='_blank' href='http://www.inet.edu.ar/links/conetyp.html'>
                        haga click aquí</a>
                </p>
            </div>
            
            <div class="show_in_dialog" id="txt_comision">
                Esta Comisión creada por Ley de Educación Técnico Profesional Nº 26058, art. 49 y 50 tiene como propósito principal garantizar los circuitos de consulta técnica para la formulación y seguimiento de los programas federales orientados a la aplicación de dicha Ley en el marco de los acuerdos del Consejo Federal de Educación, como organismo de concertación de la política educativa nacional.<br/>La Comisión Federal de Educación Técnico Profesional está integrada por los representantes de las provincias y del Gobierno de la Ciudad Autónoma de Buenos Aires, designados por las máximas autoridades jurisdiccionales respectivas y su actividad está coordinada por la Dirección Ejecutiva del INET.
                <p>
                    Para obtener más información 
                    <a target='_blank' href='http://www.inet.edu.ar/actividades/comision_federal.html'>
                        haga click aquí</a>
                </p>
            </div>
          
        </div>
        <div id="descripcion"></div>
    </div>
</div>
