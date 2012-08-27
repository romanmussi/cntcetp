<?php 
echo $html->css('catalogo.estaticas', false);
?>

<h2 class="grid_12">Búsquedas según características del usuario</h2>
<div class="clear"></div>

<div class="grid_8">
    <div class="boxblanca boxestudiantes">
        <h3>Empresas, profesionales, funcionarios, sindicatos, etc.</h3>
        <div class="box_home_buscadores">
            <div class="box_pad_wrapper" style="margin-right: 15px">
                <h4><?php echo $html->link('Búsqueda de títulos y certificaciones',array('controller'=>'titulos', 'action'=>'search'));?></h4>
               
                <?php 
                     echo $html->link('más información',
                        array('controller'=>'titulos', 'action'=>'search'),
                        array('class'=>'mas_info_azul'));
                     ?>
                <p>
                    Para obtener un listado de títulos y certificaciones filtrando por sector de actividad socio productiva y/o localización de la oferta (jurisdicción, departamento, localidad).
                </p>
            </div>
        </div>

        <div class="box_home_buscadores_separador">&nbsp;</div>

        <div class="box_home_buscadores">
            <div class="box_pad_wrapper" style="margin-left: 20px; padding-right: 0px;">
                <h4><?php echo $html->link('Búsqueda por instituciones',array('controller'=>'instits', 'action'=>'search'))?></h4>
               
                <?php echo $html->link('más información',
                        array('controller'=>'instits', 'action'=>'search'),
                        array('class'=>'mas_info_azul', 'style'=> 'margin-right: 5px'));?>
                <p>
                    Para obtener el detalle de los títulos y certificaciones que ofrece una institución educativa.
                </p>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>

<div class="grid_4">
    <div class="boxblanca boxestudiantes">
        <h3>Estudiantes</h3>
        <h4><?php echo $html->link('Guía del Estudiante',array('controller'=>'titulos', 'action'=>'guiaDelEstudiante'));?></h4>
        
        <?php echo $html->link('más información',
                array('controller'=>'titulos', 'action'=>'guiaDelEstudiante'),
                array('class'=>'mas_info_azul'));?>
        <p>
            Usá este buscador para encontrar <strong>qué</strong> y <strong>dónde</strong> estudiar mediante tres sencillos pasos.
            <br /><br /><br />
        </p>
    </div>
</div>

<h2 class="grid_12">Búsqueda por nivel de la oferta</h2>

<div class="clear"></div>

<div class="grid_4">
    <div class="boxgris boxoferta">
        <h4><?php echo $html->link('Nivel Secundario Técnico',array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID));?></h4>

         <?php echo $html->link('más información',
                array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID),
                array('class'=>'mas_info_azul'));?>
        <ul style="margin-left: 0px; padding-left: 17px;">
            <li>Requisitos de ingreso: Primaria completa</li>
            <li>Duración: 6 o 7 años</li>
            <li>Título otorgado: Técnico (en distintas especialidades).</li>
        </ul>
        <br />
    </div>

</div>

<div class="grid_4">
    <div class="boxgris boxoferta">
        <h4><?php echo $html->link('Nivel Superior Técnico', array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID));?></h4>

        <?php echo $html->link('más información',
        array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID),
        array('class'=>'mas_info_azul'));?>
        <ul style="margin-left: 0px; padding-left: 17px;">
            <li>Requisitos de ingreso: Secundaria completa</li>
            <li>Duración: 3 o 4 años</li>
            <li>Título otorgado: Técnico Superior (en distintas especialidades).</li>
        </ul>
        <br />
    </div>
</div>


<div class="grid_4">
    <div class="boxgris boxoferta">
        <h4><?php echo $html->link('Formación Profesional', array('controller'=>'titulos', 'action'=>'search', FP_ID));?></h4>
         <?php echo $html->link('más información',
                array('controller'=>'titulos', 'action'=>'search', FP_ID),
                array('class'=>'mas_info_azul'));?>
        
        <ul style="margin-left: 0px; padding-left: 17px;">
            <li>Requisitos de ingreso y duración variables</li>
            <li>Certificaciones: <br />Certificados de Formación Profesional, Certificados de Formación Continua, Certificados de Capacitación Laboral.</li>
        </ul>
    </div>
</div>