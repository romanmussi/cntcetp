<?php 
$this->pageTitle= 'Administración';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Administración',
        );
        echo $this->element('foro', $vops);
		?>
        
    <br />
    <?php echo $html->link('Ver títulos del sector Administración', array('controller'=>'titulos', 'action'=>'search', 0, 1)) ?>
    </div>
</div>