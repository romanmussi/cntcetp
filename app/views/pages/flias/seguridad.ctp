<?php
define('DIR', 'files/pdfs/seguridad/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Seguridad, Ambiente e Higiene</h2>    
        <?php
        $vops = array(
            'foroName' => 'Seguridad, Ambiente e Higiene',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>Más información</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/seguridad')); ?></li>
            <li><?php echo $html->link('Ver títulos del sector Seguridad, Ambiente e Higiene', '/titulos-seguridad') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>