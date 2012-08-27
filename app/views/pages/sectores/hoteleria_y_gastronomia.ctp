<?php 
$this->pageTitle= 'Hoteler�a y Gastronom�a';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Hoteler�a y Gastronom�a',
            'participantes' => array(
                'Escuela de Cocineros "Gato Dumas"',
                'FEDUTEC',
                'Ministerio de TESS',
                'UTHGRA',
                'FEHGRA',
                'Uni�n Docentes Argentinos',
                'CTERA' ,
                'CAIEP',
                'AMET',
            ),
            'fliaProfesional' => array('nombre'=>'Hoteler�a y Gastronom�a',
                           'link'=>'/pages/flias/hoteleria_gastronomia')
        );
        echo $this->element('foro', $vops);
		?>
    <br />
        <?php echo $html->link('Ver t�tulos del sector Hoteler�a y Gastronom�a', array('controller'=>'titulos', 'action'=>'search', 0, 34)) ?>
    </div>
</div>
