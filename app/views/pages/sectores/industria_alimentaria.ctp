<?php 
$this->pageTitle= 'Industria Alimentaria';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Industria Alimentaria',
        );
        echo $this->element('foro', $vops);
		?>
        
    <br />
    <?php echo $html->link('Ver títulos del sector Industria Alimentaria', array('controller'=>'titulos', 'action'=>'search', 0, 15)) ?>
    </div>
</div>