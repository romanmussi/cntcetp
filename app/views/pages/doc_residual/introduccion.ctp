<?php 
$this->pageTitle= 'Introducci�n';
?>

<?php echo $this->element('menu_doc_residual')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Introducci&oacute;n </h2>
                
        <h3>La Educaci�n T�cnico Profesional en Argentina</h3>
        
        <? echo $html->image('material/inicio2010.jpg', array('class' => 'docimg','style' => 'float: left; width: 230px;')); ?>
        <p>
            La educaci�n t�cnico profesional atiende un amplio abanico de calificaciones relativo a
diversas actividades y profesiones de los distintos sectores y ramas de la producci�n de bienes
y servicios; tales como: agricultura, ganader�a, caza y silvicultura; pesca; minas y canteras;
industrias manufactureras; electricidad, gas y agua; construcci�n; transporte y comunicaciones;
energ�a; inform�tica y telecomunicaciones; salud y ambiente, econom�a y administraci�n,
seguridad e higiene; turismo, gastronom�a y hoteler�a; especialidades art�sticas vinculadas con
lo t�cnico/tecnol�gico.
        </p>
        <p>
        <?php echo $html->link('M�s informaci�n...', '/pages/doc_residual/educ_tec_prof'); ?>
        </p>
        <br/>
        
        <h3>Cat�logo Nacional de T�tulos y Certificaciones</h3>
        
        <p>
            El Cat�logo Nacional de T�tulos y Certificaciones fue creado por la 
            Ley de Educaci�n T�cnico Profesional (Ley N� 26.058), y opera en conjunto 
            con el Registro Federal de Instituciones de Educaci�n T�cnico Profesional y 
            los procesos de Homologaci�n de T�tulos y Certificaciones para la mejora 
            continua de la calidad de la educaci�n t�cnico profesional.
        </p>

         <? echo $html->image('material/escuela-tecnica-1.jpg', array('class' => 'docimg', 'style'=>'border: none')); ?>
        <p>
            El Cat�logo se organiza en funci�n de familias y perfiles profesionales 
            y constituye una fuente de informaci�n sobre certificaciones y t�tulos 
            y sus correspondientes ofertas formativas; en particular de aquellos 
            cuyo ejercicio profesional pone en riesgo la salud, la seguridad, los 
            derechos y los bienes de los habitantes. Como tal, expresa la n�mina 
            exclusiva y excluyente de los t�tulos y/o certificaciones profesionales, 
            y sus propuestas curriculares, que cumplen con las especificaciones de 
            la educaci�n t�cnico profesional reguladas por la Ley de Educaci�n 
            T�cnico Profesional.
        </p>
        <p>
            El Cat�logo tiene como prop�sitos: evitar la duplicaci�n de titulaciones y 
            certificaciones referidas a un mismo perfil profesional y, asimismo, 
            evitar que una misma titulaci�n o certificaci�n posea desarrollos 
            curriculares diversos que no cumplan con los criterios m�nimos de homologaci�n, 
            establecidos por el Consejo Federal de Educaci�n.
        </p>
        <p>
            Una de sus principales funciones es constituirse en fuente de informaci�n para 
            diversos usuarios (entidades de gobierno y administraci�n de la educaci�n 
            nacionales e internacionales - en particular MERCOSUR-, otros sectores de 
            gobierno -en particular Ministerios de Econom�a, de Trabajo y de Desarrollo Social-, 
            colegios profesionales, empleadores - c�maras y empresas-, trabajadores - 
            sindicatos y gremios-, estudiantes potenciales, etc.) sobre certificaciones y 
            t�tulos y sus correspondientes ofertas formativas.
        </p>
        
        <h4>M&aacute;s informaci&oacute;n</h4>
        <ul>
            <li><a href="http://www.inet.edu.ar/" target="_blank">Instituto Nacional de Educaci&oacute;n Tecnol&oacute;gica</a></li>
            <li><?php echo $html->link('Normativa de referencia', '/pages/doc_residual/normativa');?></li>
        </ul>
        <p>&nbsp;</p>
    </div>
</div>
