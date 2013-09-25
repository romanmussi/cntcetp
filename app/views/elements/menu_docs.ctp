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
    <li><?php echo $html->link('Administraci�n', array('controller' => 'pages', 'action' => 'display', 'flias/administracion')); ?></li>
    <li><?php echo $html->link('Aeron�utica', array('controller' => 'pages', 'action' => 'display', 'flias/aeronautica')); ?></li>
    <li><?php echo $html->link('Agropecuario', array('controller' => 'pages', 'action' => 'display', 'flias/agropecuaria')); ?></li>
    <li><?php echo $html->link('Automotriz', array('controller' => 'pages', 'action' => 'display', 'flias/automotriz')); ?></li>
    <li><?php echo $html->link('Construcciones', array('controller' => 'pages', 'action' => 'display', 'flias/construcciones')); ?></li>
    <li><?php echo $html->link('Cuero y Calzado', array('controller' => 'pages', 'action' => 'display', 'flias/cuero_y_calzado')); ?></li>
    <li><?php echo $html->link('Electromec�nica', array('controller' => 'pages', 'action' => 'display', 'flias/electromecanica')); ?></li>
    <li><?php echo $html->link('Electr�nica', array('controller' => 'pages', 'action' => 'display', 'flias/electronica')); ?></li>
    <li><?php echo $html->link('Energ�a', array('controller' => 'pages', 'action' => 'display', 'flias/energia')); ?></li>
    <li><?php echo $html->link('Energ�a El�ctrica', array('controller' => 'pages', 'action' => 'display', 'flias/energia_electrica')); ?></li>
    <li><?php echo $html->link('Est�tica Profesional', array('controller' => 'pages', 'action' => 'display', 'flias/estetica_profesional')); ?></li>
    <li><?php echo $html->link('Hoteler�a y Gastronom�a', array('controller' => 'pages', 'action' => 'display', 'flias/hoteleria_y_gastronomia')); ?></li>
    <li><?php echo $html->link('Industria Alimentaria', array('controller' => 'pages', 'action' => 'display', 'flias/industria_alimentaria')); ?></li>
    <li><?php echo $html->link('Industria de Procesos', array('controller' => 'pages', 'action' => 'display', 'flias/industria_de_procesos')); ?></li>
    <li><?php echo $html->link('Inform�tica', array('controller' => 'pages', 'action' => 'display', 'flias/informatica')); ?></li>
    <li><?php echo $html->link('Madera y Mueble', array('controller' => 'pages', 'action' => 'display', 'flias/madera_y_mueble')); ?></li>
    <li><?php echo $html->link('Mec�nica, Metalmec�nica y Metalurgia', array('controller' => 'pages', 'action' => 'display', 'flias/metalmecanica')); ?></li>
    <li><?php echo $html->link('Miner�a e Hidrocarburos', array('controller' => 'pages', 'action' => 'display', 'flias/mineria')); ?></li>
    <li><?php echo $html->link('Salud', array('controller' => 'pages', 'action' => 'display', 'flias/salud')); ?></li>
    <li><?php echo $html->link('Seguridad, Ambiente e Higiene', array('controller' => 'pages', 'action' => 'display', 'flias/seguridad')); ?></li>
    <li><?php echo $html->link('Telecomunicaciones', array('controller' => 'pages', 'action' => 'display', 'flias/telecomunicaciones')); ?></li>
    <li><?php echo $html->link('Textil e Indumentaria', array('controller' => 'pages', 'action' => 'display', 'flias/textil_indumentaria')); ?></li>
    </ul>
</li>
</ul>
    </div>

    <div class="boxblanca">
        <?php echo $html->link('Informaci�n socio-productiva', array('controller' => 'pages', 'action' => 'doc_territorial_index'), array('class' => 'menu-item')); ?>
    </div>
</div>
