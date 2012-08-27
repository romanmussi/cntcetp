<?php 
$this->pageTitle= 'Textil / Indumentaria';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Textil / Indumentaria',
            'participantes' => array(
                'Asociación Confeccionistas de Pergamino',
                'FAIIA',
                'Unión Cortadores de la Indumentaria',
                'AAQCT',
                'INTI',
                'AOT',
                'Fundación Pro-Tejer',
                'UIA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf',
            'fliaProfesional' => array('nombre'=>'Textil',
                                       'link'=>'/pages/flias/textil')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver títulos del sector Textil e Indumentaria', '/titulos-textil-e-indumentaria') ?>
    </div>
</div>
