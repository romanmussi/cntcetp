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
			<td>Orientaci�n a lo Funcional</td>
			<td>T�cnico Superior en An�lisis Funcional de Sistemas Inform�ticos</td>
			<td>T�cnico Superior en An�lisis Funcional de Sistemas Inform�ticos</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="3">Orientaci�n al desarrollo de software</td>
			<td>Programador</td>
			<td>Programador</td>
			<td></td>
		</tr>
		<tr>
			<td><a href="<?php echo $html->url('/').DIR ?>sec/T�cnico en Programaci�n - 2011.pdf" target="_blank">T�cnico en Programaci�n de Computadoras</a></td>
			<td>T�cnico en Programaci�n de Computadoras</td>
			<td></td>
		</tr>
                <tr>
			<td><a href="<?php echo $html->url('/').DIR ?>sup/T�cnico Superior en Desarrollo de Software - 2011.pdf" target="_blank">T�cnico Superior en Desarrollo de Software</a></td>
			<td>T�cnico Superior en Desarrollo de Software</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="2">Orientado a la Tecnolog�a y equipamiento</td>
			<td><a href="<?php echo $html->url('/').DIR ?>sec/T�cnico en Inform�tica Profesional y Personal - 2007.pdf" target="_blank">T�cnico en Inform�tica Profesional y Personal</a></td>
			<td>T�cnico en Inform�tica Profesional y Personal</td>
			<td></td>
		</tr>
		<tr>
			<td><a href="<?php echo $html->url('/').DIR ?>sup/T�cnico Superior en Soporte de Infraestructura de Tecnolog�a de la Informaci�n - 2010.pdf" target="_blank">T�cnico Superior en Soporte de Infraestructura de Tecnolog�a de la Informaci�n</a></td>
			<td>T�cnico Superior en Soporte de Infraestructura de Tecnolog�a de la Informaci�n</td>
			<td></td>
		</tr>
		<tr>
			<td>Capacitaci�n de usuarios</td>
			<td><a href="<?php echo $html->url('/').DIR ?>fp/Operador de Inform�tica para Administraci�n y Gesti�n - 2007.pdf" target="_blank">Operador de Inform�tica para Administraci�n y Gesti�n</a></td>
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
        
        <br />
        <h3>Informes</h3>
            <ul>
                <li><?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/informatica-informe-sectorial.pdf') ?></li>
            </ul>
        <br />
        <h3>M�s informaci�n</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/informatica'));?></li>
                <li><?php echo $html->link('Ver t�tulos del sector Inform�tica', '/titulos-informatica') ?></li>
            </ul>
  </div>
</div>
