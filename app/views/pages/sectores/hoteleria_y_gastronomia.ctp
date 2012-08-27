<?php 
$this->pageTitle= 'Hotelería y Gastronomía';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Hotelería y Gastronomía',
            'participantes' => array(
                'Escuela de Cocineros "Gato Dumas"',
                'FEDUTEC',
                'Ministerio de TESS',
                'UTHGRA',
                'FEHGRA',
                'Unión Docentes Argentinos',
                'CTERA' ,
                'CAIEP',
                'AMET',
            ),
            'fliaProfesional' => array('nombre'=>'Hotelería y Gastronomía',
                           'link'=>'/pages/flias/hoteleria_gastronomia')
        );
        echo $this->element('foro', $vops);
		?>
    <br />
        <?php echo $html->link('Ver títulos del sector Hotelería y Gastronomía', array('controller'=>'titulos', 'action'=>'search', 0, 34)) ?>
    </div>
</div>
