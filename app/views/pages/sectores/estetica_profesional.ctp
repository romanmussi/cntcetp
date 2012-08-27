<?php 
$this->pageTitle= 'Estética Profesional';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Estética Profesional',
            'participantes' => array(
                'Confederación General de Peluqueros y Peinadores de la R:A:',
                'Federación Nacional de Trabajadores de Peluquería y Afines.',
                'Confederación Nacional de Patrones Peluqueros',
                'Escuela de Cosmetología, Cosmiatría, Estética Corporal y Maquillaje. (Viviana Bustos)',
                'FACE',
                'APPYA',
                'Asociación Argentina de Cosmetología y Estética',
                'AMRA',
                'ANMAT',
                'Ministerio de Salud ',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Informe_sectorial_estetica_profesional.pdf',
            'fliaProfesional' => array('nombre'=>'Estética Profesional',
                                       'link'=>'/pages/flias/estetica_profesional')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver títulos del sector Estética Profesional', '/titulos-estetica-profesional') ?>
    </div>
</div>
