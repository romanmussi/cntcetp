<?php
define('DIR', 'files/pdfs/mineria/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Miner�a e Hidrocarburos</h2>    
        <?php
        $vops = array(
            'foroName' => 'Miner�a e Hidrocarburos',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>M�s informaci�n</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/mineria')); ?></li>
            <li><?php echo $html->link('Ver t�tulos del sector Miner�a e Hidrocarburos', '/titulos-mineria') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>