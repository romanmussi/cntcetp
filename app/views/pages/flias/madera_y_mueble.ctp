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
			<th>Figura Formativa y Marco de Referencia (*)</th>
			<th>Perfiles profesionales</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td></td>
                        <td><a href="<?php echo $html->url('/').DIR ?>sec/T�cnico en Industrializaci�n de la Madera y el Mueble - 2011.pdf" target="_blank">T�cnico en Industrializaci�n de la Madera y el Mueble</a></td>
			<td>T�cnico en Industrializaci�n de la Madera y el Mueble</td>
		</tr>
		<tr>
			<td rowspan="2">Primera Transformaci�n</td>
			<td>Auxiliar de  Aserradero</td>
			<td>Auxiliar de  Aserradero</td>
		</tr>
		<tr>
			<td>Operador de M�quina Principal de Aserradero</td>
			<td>Operador de M�quina Principal de Aserradero</td>
		</tr>
		<tr>
                        <td rowspan="4">Segunda Transformaci�n</td>
			<td>Operador de Moldurera</td>
			<td>Operador de Moldurera</td>
		</tr>
		<tr>
			<td>Operador de Secado y Tratamiento T�rmico de la Madera</td>
			<td>Operador de Camara de Secado</td>
		</tr>
                <tr>
			<td>Operador de Protecci�n y Preservaci�n de la Madera</td>
			<td>Operador de Protecci�n y Preservaci�n de la Madera</td>
		</tr>
		<tr>
			<td>Operador de M�quinas de Remanufactura de la madera</td>
			<td>Operador de M�quinas de Remanufactura de la madera</td>
		</tr>
		<tr>
			<td rowspan="7">Tercera Transformaci�n</td>
			<td>Carpintero de Banco</td>
			<td>Carpintero de Banco</td>
		</tr>
		<tr>
			<td>Carpintero de Obra</td>
                        <td>Carpintero de Obra</td>
		</tr>
		<tr>
			<td>Operador de Sala de Afilado (pertinente tambi�n a la Primera y Segunda Transformaci�n)</td>
			<td>Afilador</td>
		</tr>
                <tr>
			<td>Operador de Centro de Mecanizado</td>
                        <td>Operador de Centro de Mecanizado</td>
		</tr>
		<tr>
			<td>Operador en Tratamiento de Superficies</td>
			<td>Operario de tratamiento y acabado de Superficies</td>
		</tr>
		<tr>
			<td>Tapicero de Muebles</td>
			<td>Tapicero de Muebles</td>
		</tr>
                <tr>
			<td>Auxiliar de Carpintero de Banco</td>
			<td>Auxiliar de Carpintero de Banco</td>
		</tr>
	</tbody>
</table>
<br />
(*) Cuando la Figura Formativa tiene Marco de Referencia aprobado por el Consejo Federal de Educaci�n se ha agregado el link correspondiente para facilitar el acceso directo. Por otro lado, es posible consultar el listado completo de Marcos de Referencia del Sector haciendo <?php echo $html->link('click aqu�', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?>.
<br />
<br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Asociaci�n Forestal Argentina',
                'Federaci�n Argentina Industria Maderera y Afines',
                'Instituto Nacional de Tecnolog�a Industrial',
                'Ministerio de Industria de la Naci�n',
                'Red de Instituciones de Desarrollo Tecnol�gico de la Industria Maderera',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
    
        <br />
        <h3>Informes</h3>
            <ul>
                <li><?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/madera-y-mueble-informe-sectorial.pdf') ?></li>
            </ul>
        <br />
        <h3>M�s informaci�n</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?></li>
                <li><?php echo $html->link('Ver t�tulos del sector Madera y Mueble', '/titulos-madera-y-mueble') ?></li>
            </ul>
  </div>
</div>

