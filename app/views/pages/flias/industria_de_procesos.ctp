<?php
define('DIR', 'files/pdfs/industria_de_procesos/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Industria de Procesos</h2>
        <?php
        $vops = array(
            'foroName' => 'Industria de Procesos',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>Más información</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_de_procesos')); ?></li>
            <li><?php echo $html->link('Ver títulos del sector Industria de Procesos', '/titulos-industria-de-procesos') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>