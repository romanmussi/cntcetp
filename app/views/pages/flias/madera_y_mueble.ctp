<?php 
define('DIR', 'files/pdfs/madera_y_mueble/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Madera y Mueble</h2>
    <h3>Familia profesional</h3>
<table>	
	<thead>
		<tr>
			<th>Agrupamiento</th>
			<th>Figura Formativa</th>
			<th>Perfiles de referencia</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td></td>
			<td>Técnico en Industrialización de la Madera y el Mueble</td>
			<td>Técnico en Industrialización de la Madera y el Mueble</td>
		</tr>
		<tr>
			<td rowspan="4">PrimeraTransformación</td>
			<td>Auxiliar de  Aserradero</td>
			<td>Auxiliar de  Aserradero</td>
		</tr>
		<tr>
			<td>Operador de Máquina Principal de Aserradero</td>
			<td>Operador de Máquina Principal de Aserradero</td>
		</tr>
		<tr>
			<td></td>
			<td>Oficial de mantenimiento</td>
		</tr>
		<tr>
			<td>Operador de Moldurera</td>
			<td>Operador de Moldurera</td>
		</tr>
		<tr>
			<td rowspan="3">Segunda Transformación</td>
			<td>Operador de Secado y Tratamiento Térmico de la Madera</td>
			<td>Operador de Camara de Secado</td>
		</tr>
		<tr>
			<td>Operador de Máquinas de Remanufactura de la madera</td>
			<td>Operador de Máquinas de Remanufactura de la madera</td>
		</tr>
		<tr>
			<td>Operador de Protección y Preservación de la Madera</td>
			<td>Operador de Protección y Preservación de la Madera</td>
		</tr>
		<tr>
			<td rowspan="7">TerceraTransformación</td>
			<td>Auxiliar Carpintero de Banco</td>
			<td>Auxiliar Carpintero de Banco</td>
		</tr>
		<tr>
			<td>Carpintero de Banco</td>
			<td rowspan="2">Carpintero de banco</td>
		</tr>
		<tr>
			<td>Carpintero de Obra</td>
			</tr>
		<tr>
			<td>Operador de Sala de Afilado (pertinente también a la Primera Transforamción)</td>
			<td>Afilador</td>
		</tr>
		<tr>
			<td>Operador de Máquinas y Herramientas para manufacturas en madera</td>
			<td>Operador de Máquinas y Herramientas para manufacturas en madera</td>
		</tr>
		<tr>
			<td>Operador en Tratamiento de Superficies</td>
			<td>Operario de tratamiento y acabado de superficies</td>
		</tr>
		<tr>
			<td>Tapicero de Muebles</td>
			<td>Tapicero de Muebles</td>
		</tr>
	</tbody>
</table>
     
    <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Asociación Forestal Argentina',
                'Federación Argentina Industria Maderera y Afines',
                'Instituto Nacional de Tecnología Industrial',
                'Ministerio de Industria de la Nación',
                'Red de Instituciones de Desarrollo Tecnológico de la Industria Maderera',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
        
        <h3>Informes</h3>
            <ul>
                <li><?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/madera y mueble.pdf') ?></li>
            </ul>
        <br />
        <br />
        <h3>Más información</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?></li>
                <li><?php echo $html->link('Ver títulos del sector Madera y Mueble', '/titulos-madera-y-mueble') ?></li>
            </ul>
  </div>
</div>

