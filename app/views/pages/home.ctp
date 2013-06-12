<?php 
echo $html->css('catalogo.home', false);
$this->pageTitle = "Inicio";
?>
<div class="clear separador"></div> 

<!--                
            El Cat�logo
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
               En este sitio usted encontrar� la oferta de educaci�n t�cnico profesional de nivel secundario, superior y formaci�n profesional de gesti�n estatal y privada. La oferta aqu� declarada resulta de la informaci�n suministrada por cada una de las jurisdicciones (las 23 provincias y la Ciudad Aut�noma de Buenos Aires).
El prop�sito de este Cat�logo es ofrecer un servicio permanente de informaci�n actualizada sobre los t�tulos t�cnicos y certificaciones de formaci�n profesional, de forma de constituirse en un canal de informaci�n cont�nua sobre la oferta t�cnica existente en todo el territorio del pa�s.
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
            consulta �gil referida a la oferta de t�tulos y certificados, seg�n 
            sectores, niveles y especialidades, as� como su localizaci�n en las 
            instituciones educativas de gesti�n estatal y privada de las provincias 
            y la Ciudad Aut�noma de Buenos Aires.
        </div>
        <br />
        <?= $html->image('search.png', array('style'=>'float: right; position: absolute; right: 10px; width: 36px; bottom: -7px'))?>
        <ul>
            <li><?php echo $html->link('Realizar b�squedas', array('controller' => 'pages', 'action' => 'buscadores')); ?></li>
        </ul>
    </div>
</div>

<div class="clear separador"></div>
<!--                
            El INET
-->
<div class="grid_12 alpha">
    <div class="boxblanca inet">
        <h2>El Instituto Nacional de Educaci�n Tecnol�gica</h2>
        <div class="boxcontent box_inet">
            <div class="picround" style="margin-right: 10px;">
            <?php echo $html->image('material/fotoinet.jpg') ?>
            </div>
            <div class="interna">
               El INET es el organismo del Ministerio de Educaci�n que tiene a su cargo la coordinaci�n de la
aplicaci�n de las pol�ticas p�blicas de manera concertada y concurrente con las provincias y la
Ciudad Aut�noma de Buenos Aires, relativas a la educaci�n t�cnico profesional en los niveles
secundario t�cnico, superior t�cnico y de formaci�n profesional.<br />
Promueve la mejora continua de la calidad de la ETP, asegurando mayores niveles de inclusi�n
y adecuando en forma permanente la oferta educativa a las necesidades sociales, productivas y
territoriales.<br/>
La Ley de Educaci�n T�cnico Profesional 26.058 en su Art. N� 45. asigna las responsabilidades y
funciones del organismo.
Cuenta con dos �mbitos permanentes de consulta y acuerdo: la Comisi�n Federal de ETP y
el Consejo Nacional de Educaci�n Trabajo y Producci�n (CoNETyP), con quienes elabora las
propuestas a ser presentadas para su aprobaci�n al Consejo Federal de Educaci�n.
            </div>

            <div class="clear"></div>

            <ul class="ul-horizontal" style="text-align: right">
                <li><?php echo $html->link('Ver m�s', array('controller' => 'pages', 'action' => 'el_inet')); ?></li>
            </ul>
        </div>
    </div>
    
</div>
<!--                
            Politicas
-->
<div class="grid_6 alpha">
    <div class="boxblanca box_inferior">
            <h2>Las pol�ticas para la Educaci�n T�cnico Profesional en Argentina</h2>
            <h3>Ideas Eje</h3>
            <div class="boxcontent">
                <p>
                    <ul>
                        <li>Car�cter estrat�gico de la educaci�n t�cnico profesional para el desarrollo social
                y el crecimiento econ�mico.
                        </li>
                        <li>Vinculaci�n con los sectores de la ciencia y la tecnolog�a, el trabajo y la
                producci�n.
                        </li>
                        <li>Relevancia y pertinencia con necesidades sociales y productivas, sectoriales y
                territoriales.
                        </li>
                        <li>Efectividad pol�tico-t�cnica de la acci�n conjunta con las jurisdicciones
                educativas, en el marco de los acuerdos federales.
                        </li>
                        <li>Integraci�n sist�mica y calidad de las instituciones y las trayectorias formativas.
                        </li>
                        <li>Inversi�n sostenida para la mejora continua de la educaci�n t�cnico profesional.
                        </li>
                    </ul>
                </p>
                <ul class="ul-horizontal" style="text-align: right">
                    <li><?php echo $html->link('Ver m�s', array('controller' => 'pages', 'action' => 'grafo_ley')); ?></li>
                </ul>
            </div>
    </div>
</div>

<!--                
            Graficos
-->
<div class="grid_6 omega">
    <div class="boxblanca box_inferior">
        <h2>La Educaci�n T�cnico Profesional en cifras<br />&nbsp;</h2>
            <div class="boxcontent">
               
               
                <p>
                    Informaci�n estad�stica de la Educaci�n T�cnico Profesional. 
                </p>
                <p>
                    Las fuentes de informaci�n son: 
                </p>
                 <?php echo $html->image('mapaFP.jpg', array('style' => 'float: left; margin: 7px 10px 0px 0px; height: 196px;')); ?>
                <p>                    
                    1) el Relevamiento Anual llevado
a cabo por la Direcci�n Nacional de Informaci�n y Evaluaci�n de la Calidad
Educativa (DINIECE) del Ministerio de Educaci�n de la Naci�n, y 
<br /><br />
                    2) la informaci�n
presentada por las instituciones educativas a la base de datos del Registro Federal de
Instituciones de Educaci�n T�cnica Profesional (RFIETP).
                </p>
                <div class="clear"></div>
                <div class="clear" style="height: 33px;"></div>
                <ul class="ul-horizontal" style="text-align: right">
                    <li><?php echo $html->link('Ver m�s', array('controller' => 'pages', 'action' => 'mapas_y_graficos')); ?></li>
                </ul>
                
            </div>
    </div>
</div>
