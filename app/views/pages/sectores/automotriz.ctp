<?php 
$this->pageTitle= 'Automotríz';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
	        $vops = array(
	            'foroName' => 'Automotriz',
	            'participantes' => array(
	                'ACRABA',
	                'APTA' ,
	                'ATAAP' ,
	                'ATRAR',
	                'FNPT' ,
	                'Ministerio de la Producción',
	                'SMATA' ,
	                'MTEySS',
	                'UDA' ,
	                'UTMAN' ,
	                'FAATRA',
	                'AMET',
	                'UMAM',
	            ),
	            'docInfoSectorial' => '/files/pdfs/info_sectorial/Sector automotriz - Informe Final.pdf',
	            'fliaProfesional' => array('nombre'=>'Mecánica Automotriz',
	                                       'link'=>'/pages/flias/mecanica_automotriz')
	        );
	        echo $this->element('foro', $vops);
                
                ?>
        <br />
        <?php echo $html->link('Ver títulos del sector Automotriz', '/titulos-automotriz') ?>
    </div>
</div>
