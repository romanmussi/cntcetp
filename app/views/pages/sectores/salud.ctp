<?php 
$this->pageTitle= 'Aeron�utica';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Salud',
        );
        echo $this->element('foro', $vops);
		?>
        
        <br />
        <?php echo $html->link('Ver t�tulos del sector Salud', '/titulos-salud') ?>
    </div>
    
    
</div>