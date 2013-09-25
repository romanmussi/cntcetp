<?php
define('DIR', 'files/pdfs/mineria/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Minería e Hidrocarburos</h2>    
        <?php
        $vops = array(
            'foroName' => 'Minería e Hidrocarburos',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>Más información</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/mineria')); ?></li>
            <li><?php echo $html->link('Ver títulos del sector Minería e Hidrocarburos', '/titulos-mineria') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>