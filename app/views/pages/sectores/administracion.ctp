<?php 
$this->pageTitle= 'Administraci�n';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Administraci�n',
        );
        echo $this->element('foro', $vops);
		?>
        
    <br />
    <?php echo $html->link('Ver t�tulos del sector Administraci�n', array('controller'=>'titulos', 'action'=>'search', 0, 1)) ?>
    </div>
</div>