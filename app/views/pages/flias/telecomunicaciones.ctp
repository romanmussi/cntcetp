<?php 
define('DIR', 'files/pdfs/telecomunicaciones/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Telecomunicaciones</h2>
    <h3>Familia profesional</h3>
<table>
  <thead>
    <tr>
      <th>Agrupamiento</th>
      <th>Figura Formativa y Marco de Referencia</th>
      <th>Perfiles profesionales</th>
      <th></th>
    </tr>
  </thead>
		<tr>
			<td rowspan="8">Soporte F�sico e Infraestructura de Comunicaciones</td>
			<td>Auxiliar Reparador de Fallas Simples</td>
			<td></td>
                        <td></td>
		</tr>
		<tr>
			<td>Auxiliar Instalador de Antena y Accesorios</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Auxiliar Empalmador de Cables de Cobre Multipar</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Auxiliar Empalmador de Cables de Fibras �pticas</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Auxiliar Instalador de Cableado de Comunicaciones en Inmuebles</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Instalador de Cableado de Comunicaciones en Inmuebles</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Revisador de Instalaciones de Comunicaciones</td>
			<td></td>
			<td></td>
		</tr>
                <tr>
			<td>Auxiliar para Montaje de Componentes y Equipos</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="4">Operaci�n y Administraci�n de Comunicaciones</td>
			<td>Administrador de Redes Locales</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Auxiliar Administrador de Redes Locales</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Auxiliar en Sistemas de Telefonia</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Operador de Servicios de Telecomunicaciones</td>
			<td></td>
			<td></td>
		</tr>
  </table>
  <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'C�mara de Inform�tica y Comunicaciones de la Rep�blica Argentina',
                'CLARO',
                'Comisi�n Nacional de Comunicaciones',
                'Consejo Asesor de T�cnicos de Cuerpos Colegiados',
                'Consejo Profesional de Ingenier�a de Telecomunicaciones, Electr�nica y Computaci�n',
                'Coordinaci�n de Formaci�n Profesional Gobierno de la Ciudad de Buenos Aires',
                'Federaci�n Argentina de Cooperativas de Electricidad y otros Servicios P�blicos Ltda.', 
                'Federaci�n de Cooperativas de Telecomunicaciones Ltda.',
                'Foro Nacional de Profesionales T�cnicos',
                'Sindicato de los Trabajadores de las Tecnolog�as de la Informaci�n y la Comunicaci�n',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
    
        <br />
        <h3>Informes</h3>
            <ul>
                <li><?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/telecomunicaciones-informe-sectorial.pdf') ?></li>
            </ul>
        <br />
        <!--<h3>M�s informaci�n</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?></li>
                <li><?php echo $html->link('Ver t�tulos del sector Telecomunicaciones', '/titulos-madera-y-mueble') ?></li>
            </ul> -->
  </div>
</div>
