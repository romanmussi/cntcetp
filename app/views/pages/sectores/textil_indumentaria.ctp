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
                'Asociaci�n Confeccionistas de Pergamino',
                'FAIIA',
                'Uni�n Cortadores de la Indumentaria',
                'AAQCT',
                'INTI',
                'AOT',
                'Fundaci�n Pro-Tejer',
                'UIA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf',
            'fliaProfesional' => array('nombre'=>'Textil',
                                       'link'=>'/pages/flias/textil')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver t�tulos del sector Textil e Indumentaria', '/titulos-textil-e-indumentaria') ?>
    </div>
</div>
