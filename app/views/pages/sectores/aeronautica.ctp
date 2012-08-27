<?php 
$this->pageTitle= 'Aeronáutica';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Aeronáutica',
        );
        echo $this->element('foro', $vops);
		?>
    </div>
    
    
</div>