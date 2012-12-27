<?php 
define('DIR', 'files/pdfs/industria_alimentaria/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Industria Alimentaria</h2>

    	<?php  
        $vops = array(
            'foroName' => 'Industria Alimentaria',
        );
        echo $this->element('foro2', $vops);
		?>
        
        <br />
        <h3>Más información</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_alimentaria'));?></li>
                <li><?php echo $html->link('Ver títulos del sector Industria Alimentaria', array('controller'=>'titulos', 'action'=>'search', 0, 15)) ?></li>
            </ul>
    </div>
</div>