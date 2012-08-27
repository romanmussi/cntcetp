<?php 
$this->pageTitle= 'Est�tica Profesional';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Est�tica Profesional',
            'participantes' => array(
                'Confederaci�n General de Peluqueros y Peinadores de la R:A:',
                'Federaci�n Nacional de Trabajadores de Peluquer�a y Afines.',
                'Confederaci�n Nacional de Patrones Peluqueros',
                'Escuela de Cosmetolog�a, Cosmiatr�a, Est�tica Corporal y Maquillaje. (Viviana Bustos)',
                'FACE',
                'APPYA',
                'Asociaci�n Argentina de Cosmetolog�a y Est�tica',
                'AMRA',
                'ANMAT',
                'Ministerio de Salud ',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Informe_sectorial_estetica_profesional.pdf',
            'fliaProfesional' => array('nombre'=>'Est�tica Profesional',
                                       'link'=>'/pages/flias/estetica_profesional')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver t�tulos del sector Est�tica Profesional', '/titulos-estetica-profesional') ?>
    </div>
</div>
