<?php
    echo $html->css('documentacion', false);
?>
<h1 class="grid_12 no-print">Informaci&oacute;n Territorial</h1>

<div id="menu1" class="grid_3 no-print">
    <div class="boxblanca">    
	    <ul>    
	        <li>
	            Regiones
	            <ul>
                        <li><?php echo $html->link('Regi�n Noroeste', array('controller' => 'pages', 'action' => 'display', 'regiones/noroeste'));?></li>
                        <li><?php echo $html->link('Regi�n Noreste', array('controller' => 'pages', 'action' => 'display', 'regiones/noreste'));?></li>
                        <li><?php echo $html->link('Regi�n Cuyo', array('controller' => 'pages', 'action' => 'display', 'regiones/cuyo'));?></li>
                        <li><?php echo $html->link('Regi�n Centro', array('controller' => 'pages', 'action' => 'display', 'regiones/centro'));?></li>
                        <li><?php echo $html->link('Regi�n Patagonia', array('controller' => 'pages', 'action' => 'display', 'regiones/patagonia'));?></li>
	            </ul>
	        </li>
	    </ul>
    </div>
</div>

