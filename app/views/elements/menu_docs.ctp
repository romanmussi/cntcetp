<?php
echo $html->css('documentacion', false);
?>
<h1 class="grid_12 no-print">Informaci&oacute;n Sectorial</h1>

<div id="menu1" class="grid_3 no-print">
    <div class="boxblanca">    
<ul>    
<li>
    Sectores
    <ul>
    <li><?php echo $html->link('Administración', array('controller' => 'pages', 'action' => 'display', 'flias/administracion')); ?></li>
    <li><?php echo $html->link('Aeronáutica', array('controller' => 'pages', 'action' => 'display', 'flias/aeronautica')); ?></li>
    <li><?php echo $html->link('Agropecuario', array('controller' => 'pages', 'action' => 'display', 'flias/agropecuaria')); ?></li>
    <li><?php echo $html->link('Automotriz', array('controller' => 'pages', 'action' => 'display', 'flias/automotriz')); ?></li>
    <li><?php echo $html->link('Construcciones', array('controller' => 'pages', 'action' => 'display', 'flias/construcciones')); ?></li>
    <li><?php echo $html->link('Cuero y Calzado', array('controller' => 'pages', 'action' => 'display', 'flias/cuero_y_calzado')); ?></li>
    <li><?php echo $html->link('Electromecánica', array('controller' => 'pages', 'action' => 'display', 'flias/electromecanica')); ?></li>
    <li><?php echo $html->link('Electrónica', array('controller' => 'pages', 'action' => 'display', 'flias/electronica')); ?></li>
    <li><?php echo $html->link('Energía', array('controller' => 'pages', 'action' => 'display', 'flias/energia')); ?></li>
    <li><?php echo $html->link('Energía Eléctrica', array('controller' => 'pages', 'action' => 'display', 'flias/energia_electrica')); ?></li>
    <li><?php echo $html->link('Estética Profesional', array('controller' => 'pages', 'action' => 'display', 'flias/estetica_profesional')); ?></li>
    <li><?php echo $html->link('Hotelería y Gastronomía', array('controller' => 'pages', 'action' => 'display', 'flias/hoteleria_y_gastronomia')); ?></li>
    <li><?php echo $html->link('Industria Alimentaria', array('controller' => 'pages', 'action' => 'display', 'flias/industria_alimentaria')); ?></li>
    <li><?php echo $html->link('Industria de Procesos', array('controller' => 'pages', 'action' => 'display', 'flias/industria_de_procesos')); ?></li>
    <li><?php echo $html->link('Informática', array('controller' => 'pages', 'action' => 'display', 'flias/informatica')); ?></li>
    <li><?php echo $html->link('Madera y Mueble', array('controller' => 'pages', 'action' => 'display', 'flias/madera_y_mueble')); ?></li>
    <li><?php echo $html->link('Mecánica, Metalmecánica y Metalurgia', array('controller' => 'pages', 'action' => 'display', 'flias/metalmecanica')); ?></li>
    <li><?php echo $html->link('Minería e Hidrocarburos', array('controller' => 'pages', 'action' => 'display', 'flias/mineria')); ?></li>
    <li><?php echo $html->link('Salud', array('controller' => 'pages', 'action' => 'display', 'flias/salud')); ?></li>
    <li><?php echo $html->link('Seguridad, Ambiente e Higiene', array('controller' => 'pages', 'action' => 'display', 'flias/seguridad')); ?></li>
    <li><?php echo $html->link('Telecomunicaciones', array('controller' => 'pages', 'action' => 'display', 'flias/telecomunicaciones')); ?></li>
    <li><?php echo $html->link('Textil e Indumentaria', array('controller' => 'pages', 'action' => 'display', 'flias/textil_indumentaria')); ?></li>
    </ul>
</li>
</ul>
    </div>

    <div class="boxblanca">
        <?php echo $html->link('Información socio-productiva', array('controller' => 'pages', 'action' => 'doc_territorial_index'), array('class' => 'menu-item')); ?>
    </div>
</div>
