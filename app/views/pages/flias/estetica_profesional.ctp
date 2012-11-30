<?php 
define('DIR', 'files/pdfs/estetica_profesional/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Est�tica Profesional</h2>
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
			<td rowspan="6">Est�tica Profesional</td>
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
			<td>Especializaci�n en Prost�tica</td>
			<td>Especializaci�n en Prost�tica</td>
			<td></td>
		</tr>
		<tr>
			<td>Cosmet�loga</td>
			<td>Cosmet�loga</td>
			<td></td>
		</tr>
		<tr>
			<td>Depilaci�n y manicur�a</td>
			<td>Depilaci�n y manicur�a</td>
			<td></td>
		</tr>
		<tr>
			<td>Micropigmentaci�n</td>
			<td>Micropigmentaci�n</td>
			<td></td>
		</tr>
	</tbody>
</table>

  <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Administraci�n Nacional de Medicamentos, Alimentos y Tecnolog�a M�dica',
                'Asociaci�n Argentina de Cosmetolog�a y Est�tica',
                'Asociaci�n de Maquilladores de la Rep�blica Argentina',
                'Asociaci�n de Patronos Peinadores y Afines',
                'Confederaci�n General de Peluqueros y Peinadores de la Rep�blica Argentina',
                'Confederaci�n Nacional de Patrones Peluqueros',
                'Escuela de Cosmetolog�a, Cosmiatr�a, Est�tica Corporal y Maquillaje Viviana Bustos',
                'Federaci�n Argentina de Cosmetolog�a y Est�tica',
                'Federaci�n Nacional de Trabajadores de Peluquer�a y Afines.',
                'Ministerio de Salud de la Naci�n',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
        
        <h3>Informes</h3>
        <?php //echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/madera y mueble.pdf') ?>
        <br />
        <br />
        <h3>M�s informaci�n</h3>
        
        <?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/estetica_profesional'));?>
        
        <br />
        <?php echo $html->link('Ver t�tulos del sector Est�tica Profesional', '/titulos-estetica-profesional') ?>

  </div>
</div>