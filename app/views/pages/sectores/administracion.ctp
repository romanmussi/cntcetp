<?php 
$this->pageTitle= 'Administración';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Sector Administración</h2>
	<?php echo $this->element('marcos_ref')?>
        <br />
        <?php echo $html->link('< Volver a la familia profesional', array('controller' => 'pages', 'action' => 'display', 'flias/administracion'));?>
    </div>
</div>
