<?php
define('DIR', 'files/pdfs/electronica/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Electr�nica</h2>    
        <?php
        $vops = array(
            'foroName' => 'Electr�nica',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>M�s informaci�n</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/electronica')); ?></li>
            <li><?php echo $html->link('Ver t�tulos del sector Electr�nica', '/titulos-electronica') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>