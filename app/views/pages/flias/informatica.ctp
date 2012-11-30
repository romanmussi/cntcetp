<?php 
define('DIR', 'files/pdfs/informatica/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Inform�tica</h2>
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
			<td rowspan="2">T�tulos existentes </td>
			<td>T�cnico en Computaci�n</td>
			<td>T�cnico en Computaci�n</td>
			<td></td>
		</tr>
		<tr>
			<td>T�cnico Superior en An�lisis de Sistemas </td>
			<td>T�cnico Superior en An�lisis de Sistemas </td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="2">Funcional</td>
			<td>Administrador de Recursos de Tecnolog�as de la Informaci�n/Integrador/ Analista de Sistemas</td>
			<td>Administrador de Recursos de Tecnolog�as de la Informaci�n/Integrador/ Analista de Sistemas</td>
			<td></td>
		</tr>
		<tr>
			<td>T�cnico Superior en An�lisis Funcional de Procesos</td>
			<td>T�cnico Superior en An�lisis Funcional de Procesos</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="3">Desarrollo de software</td>
			<td>Programador</td>
			<td>Programador</td>
			<td></td>
		</tr>
		<tr>
			<td>T�cnico en Programaci�n de Computadoras  </td>
			<td>T�cnico en Programaci�n de Computadoras  </td>
			<td></td>
		</tr>
		<tr>
			<td>T�cnico Superior en Desarrollo de Software</td>
			<td>T�cnico Superior en Desarrollo de Software</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="2">Tecnolog�a y equipamiento</td>
			<td>T�cnico en Inform�tica Profesional y Personal</td>
			<td>T�cnico en Inform�tica Profesional y Personal</td>
			<td></td>
		</tr>
		<tr>
			<td>T�cnico Superior en Soporte de Infraestructura de Tecnolog�a de la Informaci�n</td>
			<td>T�cnico Superior en Soporte de Infraestructura de Tecnolog�a de la Informaci�n</td>
			<td></td>
		</tr>
		<tr>
			<td>Capcitaci�n de Usuarios</td>
			<td>Operador de Inform�tica para Administraci�n y Gesti�n</td>
			<td>Operador de Inform�tica para Administraci�n y Gesti�n</td>
			<td></td>
		</tr>
	</tbody>
</table>

 <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Asociaci�n Argentina de Usuarios de la Inform�tica y las Comunicaciones',
                'C�mara de Empresas de Software y Servicios Inform�ticos de la Rep�blica Argentina',
                'C�mara de Empresas Inform�ticas del Litoral',
                'C�mara de Inform�tica y Comunicaciones de la Rep�blica Argentina',
                'Consejo Profesional de Ingenier�a, de Telecomunicaciones, Electr�nica y Computaci�n', 
                'Consejo Profesional en Ciencias Inform�ticas',
                'C�rdoba Technology, Cluster de Tecnolog�a de la Informaci�n',
                'Foro Nacional de Profesionales T�cnicos',
                'Junta Coordinadora de Asociaciones de la Ense�anza Privada',
                'Ministerio de Industria de la Naci�n',
                'Polo IT Buenos Aires',
                'Sociedad Argentina de Inform�tica',
                'Uni�n Docentes Argentinos',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
        
        <h3>Informes</h3>
        <?php //echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/madera y mueble.pdf') ?>
        <br />
        <br />
        <h3>M�s informaci�n</h3>
        
        <?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/informatica'));?>
        
        <br />
        <?php echo $html->link('Ver t�tulos del sector Inform�tica', '/titulos-informatica') ?>

  </div>
</div>
