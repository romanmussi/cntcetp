<?php
define('DIR', 'files/pdfs/electromecanica/');
echo $this->element('menu_docs')
?>
<div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
        <h2>Sector Electromec�nica</h2>    
        <?php
        $vops = array(
            'foroName' => 'Electromec�nica',
        );
        echo $this->element('foro2', $vops);
        ?>
        <h3>M�s informaci�n</h3>
        <ul>
            <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/electromecanica')); ?></li>
            <li><?php echo $html->link('Ver t�tulos del sector Electromec�nica', '/titulos-electromecanica') ?></li>
        </ul>
        <br />
        <br />
    </div>
</div>