<?php 
$this->pageTitle= 'Agropecuaria';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Sector Agropecuaria</h2>
	<?php echo $this->element('marcos_ref')?>
        <br />
		<h3>Subsectores</h3>
		<ul>
			<li>Apí­cola</li>
			<li>Avícola</li>
			<li>Florí­cola</li>
			<li>Forestal</li>
			<li>Frutí­cola - Olivicultura</li>
			<li>Hortícola
				<ul>
					<li><?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/horticultura_informe_final.pdf', array('target'=>'_blank')) ?></li>
				</ul>
			</li>
			<li>Producción Lechera
			<ul>
				<li><?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/informe_lechero.pdf', array('target'=>'_blank')) ?></li>
			</ul>
                        </li>
			<li>Vitivinicultura</li>
		</ul>
    
        <br />
        <?php echo $html->link('< Volver a la familia profesional', array('controller' => 'pages', 'action' => 'display', 'flias/agropecuaria'));?>
    </div>
</div>
