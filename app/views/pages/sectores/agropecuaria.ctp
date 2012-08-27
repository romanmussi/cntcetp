<?php 
$this->pageTitle= 'Agropecuaria';
?>

<?php echo $this->element('menu_docs')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
		<?php  
        $vops = array(
            'foroName' => 'Agropecuario',
            'fliaProfesional' => array('nombre'=>'Agropecuario',
                           'link'=>'/pages/flias/agropecuaria')
        );
        echo $this->element('foro', $vops);
		?>
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
        <?php echo $html->link('Ver títulos del sector Agropecuario', array('controller'=>'titulos', 'action'=>'search', 0, 3)) ?>
    </div>
</div>
