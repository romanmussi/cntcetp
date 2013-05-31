<?php 
echo $html->css('catalogo.home', false);
$this->pageTitle = "Inicio";
?>
<div class="clear separador"></div> 

<!--                
            El Catálogo
-->
<div class="grid_8 alpha">
    <div class="boxblanca">
        <?php echo $html->image('catalogotitulo.png', array(
                    'border'=> 0,
                    'class' => 'box_catalogo_titulo'
                    )); 
                ?>
        <div class="boxcontent box_catalogo">
            <div class="interna">
               En este sitio usted encontrará la oferta de educación técnico profesional de nivel secundario, superior y formación profesional de gestión estatal y privada. La oferta aquí declarada resulta de la información suministrada por cada una de las jurisdicciones (las 23 provincias y la Ciudad Autónoma de Buenos Aires).
El propósito de este Catálogo es ofrecer un servicio permanente de información actualizada sobre los títulos técnicos y certificaciones de formación profesional, de forma de constituirse en un canal de información contínua sobre la oferta técnica existente en todo el territorio del país.
            </div>

            <div class="clear"></div>

        </div>
    </div>
    
</div>

<!--                
            Buscador
-->
<div class="grid_4 omega">
    <div class="boxgris box_home_buscadores">
        <h2>Buscadores</h2>
        <div class="interna">
            Por medio de los buscadores se facilita a los distintos usuarios una 
            consulta ágil referida a la oferta de títulos y certificados, según 
            sectores, niveles y especialidades, así como su localización en las 
            instituciones educativas de gestión estatal y privada de las provincias 
            y la Ciudad Autónoma de Buenos Aires.
        </div>
        <br />
        <?= $html->image('search.png', array('style'=>'float: right; position: absolute; right: 10px; width: 36px; bottom: -7px'))?>
        <ul>
            <li><?php echo $html->link('Realizar búsquedas', array('controller' => 'pages', 'action' => 'buscadores')); ?></li>
        </ul>
    </div>
</div>

<div class="clear separador"></div>
<!--                
            El INET
-->
<div class="grid_12 alpha">
    <div class="boxblanca inet">
        <h2>El Instituto Nacional de Educación Tecnológica</h2>
        <div class="boxcontent box_inet">
            <div class="picround" style="margin-right: 10px;">
            <?php echo $html->image('material/fotoinet.jpg') ?>
            </div>
            <div class="interna">
               El INET es el organismo del Ministerio de Educación que tiene a su cargo la coordinación de la
aplicación de las políticas públicas de manera concertada y concurrente con las provincias y la
Ciudad Autónoma de Buenos Aires, relativas a la educación técnico profesional en los niveles
secundario técnico, superior técnico y de formación profesional.<br />
Promueve la mejora continua de la calidad de la ETP, asegurando mayores niveles de inclusión
y adecuando en forma permanente la oferta educativa a las necesidades sociales, productivas y
territoriales.<br/>
La Ley de Educación Técnico Profesional 26.058 en su Art. Nº 45. asigna las responsabilidades y
funciones del organismo.
Cuenta con dos ámbitos permanentes de consulta y acuerdo: la Comisión Federal de ETP y
el Consejo Nacional de Educación Trabajo y Producción (CoNETyP), con quienes elabora las
propuestas a ser presentadas para su aprobación al Consejo Federal de Educación.
            </div>

            <div class="clear"></div>

            <ul class="ul-horizontal" style="text-align: right">
                <li><?php echo $html->link('Ver más', array('controller' => 'pages', 'action' => 'el_inet')); ?></li>
            </ul>
        </div>
    </div>
    
</div>
<!--                
            Politicas
-->
<div class="grid_6 alpha">
    <div class="boxblanca box_inferior">
            <h2>Las políticas para la Educación Técnico Profesional en Argentina</h2>
            <h3>Ideas Eje</h3>
            <div class="boxcontent">
                <p>
                    <ul>
                        <li>Carácter estratégico de la educación técnico profesional para el desarrollo social
                y el crecimiento económico.
                        </li>
                        <li>Vinculación con los sectores de la ciencia y la tecnología, el trabajo y la
                producción.
                        </li>
                        <li>Relevancia y pertinencia con necesidades sociales y productivas, sectoriales y
                territoriales.
                        </li>
                        <li>Efectividad político-técnica de la acción conjunta con las jurisdicciones
                educativas, en el marco de los acuerdos federales.
                        </li>
                        <li>Integración sistémica y calidad de las instituciones y las trayectorias formativas.
                        </li>
                        <li>Inversión sostenida para la mejora continua de la educación técnico profesional.
                        </li>
                    </ul>
                </p>
                <ul class="ul-horizontal" style="text-align: right">
                    <li><?php echo $html->link('Ver más', array('controller' => 'pages', 'action' => 'grafo_ley')); ?></li>
                </ul>
            </div>
    </div>
</div>

<!--                
            Graficos
-->
<div class="grid_6 omega">
    <div class="boxblanca box_inferior">
        <h2>La Educación Técnico Profesional en cifras<br />&nbsp;</h2>
            <div class="boxcontent">
               
               
                <p>
                    Información estadística de la Educación Técnico Profesional. 
                </p>
                <p>
                    Las fuentes de información son: 
                </p>
                 <?php echo $html->image('mapaFP.jpg', array('style' => 'float: left; margin: 7px 10px 0px 0px; height: 196px;')); ?>
                <p>                    
                    1) el Relevamiento Anual llevado
a cabo por la Dirección Nacional de Información y Evaluación de la Calidad
Educativa (DINIECE) del Ministerio de Educación de la Nación, y 
<br /><br />
                    2) la información
presentada por las instituciones educativas a la base de datos del Registro Federal de
Instituciones de Educación Técnica Profesional (RFIETP).
                </p>
                <div class="clear"></div>
                <div class="clear" style="height: 33px;"></div>
                <ul class="ul-horizontal" style="text-align: right">
                    <li><?php echo $html->link('Ver más', array('controller' => 'pages', 'action' => 'mapas_y_graficos')); ?></li>
                </ul>
                
            </div>
    </div>
</div>
