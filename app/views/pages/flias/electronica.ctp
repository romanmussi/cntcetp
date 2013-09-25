<?php
define('DIR', 'files/pdfs/electronica/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Electrónica</h2>    
        <?php
        $vops = array(
            'foroName' => 'Electrónica',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>Más información</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/electronica')); ?></li>
            <li><?php echo $html->link('Ver títulos del sector Electrónica', '/titulos-electronica') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>