<?php 
$this->pageTitle= 'Construcciones';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Construcciones',
            'fliaProfesional' => array('nombre'=>'Construcciones',
                           'link'=>'/pages/flias/construccion')
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver títulos del sector de Construcciones', '/titulos-construcciones') ?>
    </div>
    
</div>
