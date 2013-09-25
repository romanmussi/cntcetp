<?php
define('DIR', 'files/pdfs/administracion/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Administración</h2>
        <?php
        $vops = array(
            'foroName' => 'Administración',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>Más información</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/administracion')); ?></li>
            <li><?php echo $html->link('Ver títulos del sector Administración', '/titulos-administracion') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>