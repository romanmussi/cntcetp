<?php 
$this->pageTitle= 'Informática';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Informática',
            'participantes' => array(
                'COORDIEP',
                'CPCI',
                'CESSI',
                'UDA',
                'Polo IT Buenos Aires',
                'SADIO',
                'USUARIA',
                'Córdoba Technology, Cluster de Tecnología de la Información',
                'Ministerio de la Producción',
                'COPITEC',
                'CICOMRA',
                'CEIL',
                'FNPT' ,
            ),
            'docInfoSectorial' => '',
            'fliaProfesional' => array('nombre'=>'Informática',
                                       'link'=>'/pages/flias/informatica')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver títulos del sector Informática', '/titulos-informatica') ?>
    </div>
</div>
