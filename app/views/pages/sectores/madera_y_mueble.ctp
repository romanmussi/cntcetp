<?php 
$this->pageTitle= 'Madera y Mueble';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Madera y Mueble',
            'participantes' => array(
                'FAIMA',
                'INTI' ,
                'RITIM',
                'Ministerio de Producción',
                'AFOA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf',
            'fliaProfesional' => array('nombre'=>'Madera y Mueble',
                                       'link'=>'/pages/flias/madera_y_mueble')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver títulos del sector Madera y Mueble', '/titulos-madera-y-mueble') ?>
    </div>
</div>
