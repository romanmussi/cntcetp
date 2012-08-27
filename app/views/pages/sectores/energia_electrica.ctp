<?php 
$this->pageTitle= 'Energ�a El�ctrica';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Energ�a El�ctrica',
            'participantes' => array(
                'ACYEDE', 'CADIME','APSE','EDENOR','EDESUR',
                'Ministerio de la Producci�n', 'ATEERA', 'TRANSENER', 
                'Sindicato de Luz y Fuerza', 'FATLyF', 'APSEE', 
                'FACT�c', 'FNPT'
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/INFORME SECTORIAL SECTOR ENERGIA ELECTRICA.pdf',
            'fliaProfesional' => array('nombre'=>'Energ�a El�ctrica',
                                       'link'=>'/pages/flias/energia_electrica')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver t�tulos del sector Energ�a El�ctrica', '/titulos-energia-electrica') ?>
    </div>
</div>
