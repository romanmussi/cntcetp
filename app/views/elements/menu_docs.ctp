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
                        
<!--                        <li><?php echo $html->link('Alimentos', array('controller' => 'pages', 'action' => 'display', 'sectores/alimentos'));?>
                            <ul>
                               <li><?php echo $html->link('Industria Av�cola', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_avicola'));?>
                               <li><?php echo $html->link('Industria Lechera', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_lechera'));?>
                            </ul>
                        </li>
-->
                        <li><?php echo $html->link('Administraci�n', array('controller' => 'pages', 'action' => 'display', 'sectores/administracion'));?></li>
<!--                        <li><?php echo $html->link('Aeron�utica', array('controller' => 'pages', 'action' => 'display', 'sectores/aeronautica'));?></li>-->
                        
                        <li>
                            <?php echo $html->link('Agropecuario', array('controller' => 'pages', 'action' => 'display', 'sectores/agropecuaria'));?>
<!--                            <ul>
                                <li><?php echo $html->link('Ap�cola', array('controller' => 'pages', 'action' => 'display', 'sectores/apicola'));?></li>
                                <li><?php echo $html->link('Av�cola', array('controller' => 'pages', 'action' => 'display', 'sectores/avicola'));?></li>
                                <li><?php echo $html->link('Flor�cola', array('controller' => 'pages', 'action' => 'display', 'sectores/floricola'));?></li>
                                <li><?php echo $html->link('Forestal', array('controller' => 'pages', 'action' => 'display', 'sectores/forestal'));?></li>
                                <li><?php echo $html->link('Frut�cola - Olivicultura', array('controller' => 'pages', 'action' => 'display', 'sectores/fruticola_olivicultura'));?></li>
                                <li><?php echo $html->link('Hort�cola', array('controller' => 'pages', 'action' => 'display', 'sectores/horticola'));?></li>
                                <li><?php echo $html->link('Producci�n Lechera', array('controller' => 'pages', 'action' => 'display', 'sectores/produccion_lechera'));?></li>
                                <li><?php echo $html->link('Vitivinicultura', array('controller' => 'pages', 'action' => 'display', 'sectores/vitivinicultura'));?></li>
                            </ul>-->
                        </li>
	                <li><?php echo $html->link('Automotriz', array('controller' => 'pages', 'action' => 'display', 'sectores/automotriz'));?></li>
                        <li><?php echo $html->link('Construcciones', array('controller' => 'pages', 'action' => 'display', 'sectores/construcciones'));?></li>
<!--                        <li><?php echo $html->link('Cuero y Calzado', array('controller' => 'pages', 'action' => 'display', 'sectores/cuero_y_calzado'));?></li>-->
<!--                        <li><?php echo $html->link('Electr�nica', array('controller' => 'pages', 'action' => 'display', 'sectores/electronica'));?>
                            <ul>
                                <li><?php echo $html->link('Telecomunicaciones', array('controller' => 'pages', 'action' => 'display', 'sectores/telecomunicaciones'));?></li>
                                <li><?php echo $html->link('Electr�nica Industrial', array('controller' => 'pages', 'action' => 'display', 'sectores/electronica_industrial'));?></li>
                                <li><?php echo $html->link('Instrumentaci�n y Control', array('controller' => 'pages', 'action' => 'display', 'sectores/instrumentacion_y_control'));?></li>
                            </ul>
                        </li>-->
	                <li><?php echo $html->link('Energ�a El�ctrica', array('controller' => 'pages', 'action' => 'display', 'sectores/energia_electrica'));?></li>
	                <li><?php echo $html->link('Est�tica Profesional', array('controller' => 'pages', 'action' => 'display', 'sectores/estetica_profesional'));?></li>
                        <li><?php echo $html->link('Hoteler�a y Gastronom�a', array('controller' => 'pages', 'action' => 'display', 'sectores/hoteleria_y_gastronomia'));?></li>
                        <li><?php echo $html->link('Industria Alimentaria', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_alimentaria'));?></li>
<!--                        <li><?php echo $html->link('Industria Naval', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_naval'));?></li>-->
	                <li><?php echo $html->link('Inform�tica', array('controller' => 'pages', 'action' => 'display', 'sectores/informatica'));?></li>
	                <li><?php echo $html->link('Madera y Mueble', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?></li>
	                <li><?php echo $html->link('Metalmec�nica', array('controller' => 'pages', 'action' => 'display', 'flias/metalmecanica'));?></li>
<!--                        <li><?php echo $html->link('Mineria', array('controller' => 'pages', 'action' => 'display', 'sectores/mineria'));?></li>-->
<!--                        <li><?php echo $html->link('Pesca', array('controller' => 'pages', 'action' => 'display', 'sectores/pesca'));?>
                            <ul>
                                <li><?php echo $html->link('Mar�timo', array('controller' => 'pages', 'action' => 'display', 'sectores/maritimo'));?></li>
                                <li><?php echo $html->link('Portuario', array('controller' => 'pages', 'action' => 'display', 'sectores/portuario'));?></li>
                            </ul>
                        </li>-->
<!--                        <li><?php echo $html->link('Petr�leo y Gas', array('controller' => 'pages', 'action' => 'display', 'sectores/petroleo_y_gas'));?></li>-->
<!--                        <li><?php echo $html->link('Qu�mica y Farmacia', array('controller' => 'pages', 'action' => 'display', 'sectores/quimica_y_farmacia'));?></li>-->
                        <li><?php echo $html->link('Salud', array('controller' => 'pages', 'action' => 'display', 'sectores/salud'));?></li>
                        <li><?php echo $html->link('Textil e Indumentaria', array('controller' => 'pages', 'action' => 'display', 'sectores/textil_indumentaria'));?></li>
<!--                        <li><?php echo $html->link('Turismo', array('controller' => 'pages', 'action' => 'display', 'sectores/turismo'));?></li>-->
	            </ul>
	        </li>
	    </ul>
    </div>
</div>

