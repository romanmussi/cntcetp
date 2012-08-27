<?php 
$this->pageTitle= 'Aeronáutica';
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
        <?php echo $html->link('Ver títulos del sector Salud', '/titulos-salud') ?>
    </div>
    
    
</div>