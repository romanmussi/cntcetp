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
                        
<!--                        <li><?php echo $html->link('Alimentos', array('controller' => 'pages', 'action' => 'display', 'flias/alimentos'));?>
                            <ul>
                               <li><?php echo $html->link('Industria Avícola', array('controller' => 'pages', 'action' => 'display', 'flias/industria_avicola'));?>
                               <li><?php echo $html->link('Industria Lechera', array('controller' => 'pages', 'action' => 'display', 'flias/industria_lechera'));?>
                            </ul>
                        </li>
-->
                        <li><?php echo $html->link('Administración', array('controller' => 'pages', 'action' => 'display', 'flias/administracion'));?></li>
<!--                        <li><?php echo $html->link('Aeronáutica', array('controller' => 'pages', 'action' => 'display', 'flias/aeronautica'));?></li>-->
                        
                        <li>
                            <?php echo $html->link('Agropecuario', array('controller' => 'pages', 'action' => 'display', 'flias/agropecuaria'));?>
<!--                            <ul>
                                <li><?php echo $html->link('Apícola', array('controller' => 'pages', 'action' => 'display', 'flias/apicola'));?></li>
                                <li><?php echo $html->link('Avícola', array('controller' => 'pages', 'action' => 'display', 'flias/avicola'));?></li>
                                <li><?php echo $html->link('Florícola', array('controller' => 'pages', 'action' => 'display', 'flias/floricola'));?></li>
                                <li><?php echo $html->link('Forestal', array('controller' => 'pages', 'action' => 'display', 'flias/forestal'));?></li>
                                <li><?php echo $html->link('Frutícola - Olivicultura', array('controller' => 'pages', 'action' => 'display', 'flias/fruticola_olivicultura'));?></li>
                                <li><?php echo $html->link('Hortícola', array('controller' => 'pages', 'action' => 'display', 'flias/horticola'));?></li>
                                <li><?php echo $html->link('Producción Lechera', array('controller' => 'pages', 'action' => 'display', 'flias/produccion_lechera'));?></li>
                                <li><?php echo $html->link('Vitivinicultura', array('controller' => 'pages', 'action' => 'display', 'flias/vitivinicultura'));?></li>
                            </ul>-->
                        </li>
	                <li><?php echo $html->link('Automotriz', array('controller' => 'pages', 'action' => 'display', 'flias/automotriz'));?></li>
                        <li><?php echo $html->link('Construcciones', array('controller' => 'pages', 'action' => 'display', 'flias/construcciones'));?></li>
<!--                        <li><?php echo $html->link('Cuero y Calzado', array('controller' => 'pages', 'action' => 'display', 'flias/cuero_y_calzado'));?></li>-->
<!--                        <li><?php echo $html->link('Electrónica', array('controller' => 'pages', 'action' => 'display', 'flias/electronica'));?>
                            <ul>
                                <li><?php echo $html->link('Telecomunicaciones', array('controller' => 'pages', 'action' => 'display', 'flias/telecomunicaciones'));?></li>
                                <li><?php echo $html->link('Electrónica Industrial', array('controller' => 'pages', 'action' => 'display', 'flias/electronica_industrial'));?></li>
                                <li><?php echo $html->link('Instrumentación y Control', array('controller' => 'pages', 'action' => 'display', 'flias/instrumentacion_y_control'));?></li>
                            </ul>
                        </li>-->
	                <li><?php echo $html->link('Energía Eléctrica', array('controller' => 'pages', 'action' => 'display', 'flias/energia_electrica'));?></li>
	                <li><?php echo $html->link('Estética Profesional', array('controller' => 'pages', 'action' => 'display', 'flias/estetica_profesional'));?></li>
                        <li><?php echo $html->link('Hotelería y Gastronomía', array('controller' => 'pages', 'action' => 'display', 'flias/hoteleria_y_gastronomia'));?></li>
                        <li><?php echo $html->link('Industria Alimentaria', array('controller' => 'pages', 'action' => 'display', 'flias/industria_alimentaria'));?></li>
<!--                        <li><?php echo $html->link('Industria Naval', array('controller' => 'pages', 'action' => 'display', 'flias/industria_naval'));?></li>-->
	                <li><?php echo $html->link('Informática', array('controller' => 'pages', 'action' => 'display', 'flias/informatica'));?></li>
	                <li><?php echo $html->link('Madera y Mueble', array('controller' => 'pages', 'action' => 'display', 'flias/madera_y_mueble'));?></li>
	                <li><?php echo $html->link('Metalmecánica', array('controller' => 'pages', 'action' => 'display', 'flias/metalmecanica'));?></li>
<!--                        <li><?php echo $html->link('Mineria', array('controller' => 'pages', 'action' => 'display', 'flias/mineria'));?></li>-->
<!--                        <li><?php echo $html->link('Pesca', array('controller' => 'pages', 'action' => 'display', 'flias/pesca'));?>
                            <ul>
                                <li><?php echo $html->link('Marítimo', array('controller' => 'pages', 'action' => 'display', 'flias/maritimo'));?></li>
                                <li><?php echo $html->link('Portuario', array('controller' => 'pages', 'action' => 'display', 'flias/portuario'));?></li>
                            </ul>
                        </li>-->
<!--                        <li><?php echo $html->link('Petróleo y Gas', array('controller' => 'pages', 'action' => 'display', 'flias/petroleo_y_gas'));?></li>-->
<!--                        <li><?php echo $html->link('Química y Farmacia', array('controller' => 'pages', 'action' => 'display', 'flias/quimica_y_farmacia'));?></li>-->
                        <li><?php echo $html->link('Salud', array('controller' => 'pages', 'action' => 'display', 'flias/salud'));?></li>
                        <li><?php echo $html->link('Textil e Indumentaria', array('controller' => 'pages', 'action' => 'display', 'flias/textil_indumentaria'));?></li>
<!--                        <li><?php echo $html->link('Turismo', array('controller' => 'pages', 'action' => 'display', 'flias/turismo'));?></li>-->
	            </ul>
	        </li>
	    </ul>
    </div>
</div>

