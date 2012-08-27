<?php 
$this->pageTitle= 'Introducción';
?>

<?php echo $this->element('menu_doc_residual')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Introducci&oacute;n </h2>
                
        <h3>La Educación Técnico Profesional en Argentina</h3>
        
        <? echo $html->image('material/inicio2010.jpg', array('class' => 'docimg','style' => 'float: left; width: 230px;')); ?>
        <p>
            La educación técnico profesional atiende un amplio abanico de calificaciones relativo a
diversas actividades y profesiones de los distintos sectores y ramas de la producción de bienes
y servicios; tales como: agricultura, ganadería, caza y silvicultura; pesca; minas y canteras;
industrias manufactureras; electricidad, gas y agua; construcción; transporte y comunicaciones;
energía; informática y telecomunicaciones; salud y ambiente, economía y administración,
seguridad e higiene; turismo, gastronomía y hotelería; especialidades artísticas vinculadas con
lo técnico/tecnológico.
        </p>
        <p>
        <?php echo $html->link('Más información...', '/pages/doc_residual/educ_tec_prof'); ?>
        </p>
        <br/>
        
        <h3>Catálogo Nacional de Títulos y Certificaciones</h3>
        
        <p>
            El Catálogo Nacional de Títulos y Certificaciones fue creado por la 
            Ley de Educación Técnico Profesional (Ley Nº 26.058), y opera en conjunto 
            con el Registro Federal de Instituciones de Educación Técnico Profesional y 
            los procesos de Homologación de Títulos y Certificaciones para la mejora 
            continua de la calidad de la educación técnico profesional.
        </p>

         <? echo $html->image('material/escuela-tecnica-1.jpg', array('class' => 'docimg', 'style'=>'border: none')); ?>
        <p>
            El Catálogo se organiza en función de familias y perfiles profesionales 
            y constituye una fuente de información sobre certificaciones y títulos 
            y sus correspondientes ofertas formativas; en particular de aquellos 
            cuyo ejercicio profesional pone en riesgo la salud, la seguridad, los 
            derechos y los bienes de los habitantes. Como tal, expresa la nómina 
            exclusiva y excluyente de los títulos y/o certificaciones profesionales, 
            y sus propuestas curriculares, que cumplen con las especificaciones de 
            la educación técnico profesional reguladas por la Ley de Educación 
            Técnico Profesional.
        </p>
        <p>
            El Catálogo tiene como propósitos: evitar la duplicación de titulaciones y 
            certificaciones referidas a un mismo perfil profesional y, asimismo, 
            evitar que una misma titulación o certificación posea desarrollos 
            curriculares diversos que no cumplan con los criterios mínimos de homologación, 
            establecidos por el Consejo Federal de Educación.
        </p>
        <p>
            Una de sus principales funciones es constituirse en fuente de información para 
            diversos usuarios (entidades de gobierno y administración de la educación 
            nacionales e internacionales - en particular MERCOSUR-, otros sectores de 
            gobierno -en particular Ministerios de Economía, de Trabajo y de Desarrollo Social-, 
            colegios profesionales, empleadores - cámaras y empresas-, trabajadores - 
            sindicatos y gremios-, estudiantes potenciales, etc.) sobre certificaciones y 
            títulos y sus correspondientes ofertas formativas.
        </p>
        
        <h4>M&aacute;s informaci&oacute;n</h4>
        <ul>
            <li><a href="http://www.inet.edu.ar/" target="_blank">Instituto Nacional de Educaci&oacute;n Tecnol&oacute;gica</a></li>
            <li><?php echo $html->link('Normativa de referencia', '/pages/doc_residual/normativa');?></li>
        </ul>
        <p>&nbsp;</p>
    </div>
</div>
