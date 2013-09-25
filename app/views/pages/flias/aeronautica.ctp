<?php
define('DIR', 'files/pdfs/aeronautica/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Aeronáutica</h2>
        <?php
        $vops = array(
            'foroName' => 'Aeronáutica',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>Más información</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/aeronautica')); ?></li>
            <li><?php echo $html->link('Ver títulos del sector Aeronáutica', '/titulos-aeronautica') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>