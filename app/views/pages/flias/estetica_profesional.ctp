<?php 
define('DIR', 'files/pdfs/estetica_profesional/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Estética Profesional</h2>
    <h3>Familia profesional</h3>
<table>
		<thead>
			<tr>
				<th>Agrupamiento</th>
				<th>Figura Formativa y Marco de Referencia</th>
				<th>Perfiles de referencia</th>
				<th></th>
			</tr>
		</thead>
	<tbody>

		<tr>
			<td rowspan="6">Estética Profesional</td>
			<td>Peluquero/a</td>
			<td>Peluquero/a</td>
			<td></td>
		</tr>
		<tr>
			<td>Maquillador/a</td>
			<td>Maquillador/a</td>
			<td></td>
		</tr>
		<tr>
			<td>Especialización en Prostética</td>
			<td>Especialización en Prostética</td>
			<td></td>
		</tr>
		<tr>
			<td>Cosmetóloga</td>
			<td>Cosmetóloga</td>
			<td></td>
		</tr>
		<tr>
			<td>Depilación y manicuría</td>
			<td>Depilación y manicuría</td>
			<td></td>
		</tr>
		<tr>
			<td>Micropigmentación</td>
			<td>Micropigmentación</td>
			<td></td>
		</tr>
	</tbody>
</table>

  <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Administración Nacional de Medicamentos, Alimentos y Tecnología Médica',
                'Asociación Argentina de Cosmetología y Estética',
                'Asociación de Maquilladores de la República Argentina',
                'Asociación de Patronos Peinadores y Afines',
                'Confederación General de Peluqueros y Peinadores de la República Argentina',
                'Confederación Nacional de Patrones Peluqueros',
                'Escuela de Cosmetología, Cosmiatría, Estética Corporal y Maquillaje Viviana Bustos',
                'Federación Argentina de Cosmetología y Estética',
                'Federación Nacional de Trabajadores de Peluquería y Afines.',
                'Ministerio de Salud de la Nación',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
        
        <h3>Informes</h3>
        <?php //echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/madera y mueble.pdf') ?>
        <br />
        <br />
        <h3>Más información</h3>
        
        <?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/estetica_profesional'));?>
        
        <br />
        <?php echo $html->link('Ver títulos del sector Estética Profesional', '/titulos-estetica-profesional') ?>

  </div>
</div>