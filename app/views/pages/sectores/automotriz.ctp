<?php 
$this->pageTitle= 'Automotr�z';
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
	                'Ministerio de la Producci�n',
	                'SMATA' ,
	                'MTEySS',
	                'UDA' ,
	                'UTMAN' ,
	                'FAATRA',
	                'AMET',
	                'UMAM',
	            ),
	            'docInfoSectorial' => '/files/pdfs/info_sectorial/Sector automotriz - Informe Final.pdf',
	            'fliaProfesional' => array('nombre'=>'Mec�nica Automotriz',
	                                       'link'=>'/pages/flias/mecanica_automotriz')
	        );
	        echo $this->element('foro', $vops);
                
                ?>
        <br />
        <?php echo $html->link('Ver t�tulos del sector Automotriz', '/titulos-automotriz') ?>
    </div>
</div>
