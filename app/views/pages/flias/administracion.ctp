<?php 
define('DIR', 'files/pdfs/administracion/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Administraci�n</h2>
    
    <br />
    	<?php  
        $vops = array(
            'foroName' => 'Administraci�n',
        );
        echo $this->element('foro2', $vops);
		?>
        
        
        <h3>M�s informaci�n</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/administracion'));?></li>
                <li><?php echo $html->link('Ver t�tulos del sector Administraci�n', array('controller'=>'titulos', 'action'=>'search', 0, 1)) ?></li>
            </ul>
    </div>
</div>