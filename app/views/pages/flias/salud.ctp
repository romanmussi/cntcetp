<?php 
define('DIR', 'files/pdfs/salud/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Salud</h2>

    	<?php  
        $vops = array(
            'foroName' => 'Salud',
        );
        echo $this->element('foro2', $vops);
		?>
        
        
        <h3>M�s informaci�n</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/salud'));?></li>
                <li><?php echo $html->link('Ver t�tulos del sector Salud', '/titulos-salud') ?></li>
            </ul>
    </div>
</div>