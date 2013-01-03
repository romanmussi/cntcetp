<?php 
define('DIR', 'files/pdfs/informatica/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Informática</h2>
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
			<td>Orientación a lo Funcional</td>
			<td>Técnico Superior en Análisis Funcional de Sistemas Informáticos</td>
			<td>Técnico Superior en Análisis Funcional de Sistemas Informáticos</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="3">Orientación al desarrollo de software</td>
			<td>Programador</td>
			<td>Programador</td>
			<td></td>
		</tr>
		<tr>
			<td><a href="<?php echo $html->url('/').DIR ?>sec/Técnico en Programación - 2011.pdf" target="_blank">Técnico en Programación de Computadoras</a></td>
			<td>Técnico en Programación de Computadoras</td>
			<td></td>
		</tr>
                <tr>
			<td><a href="<?php echo $html->url('/').DIR ?>sup/Técnico Superior en Desarrollo de Software - 2011.pdf" target="_blank">Técnico Superior en Desarrollo de Software</a></td>
			<td>Técnico Superior en Desarrollo de Software</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="2">Orientado a la Tecnología y equipamiento</td>
			<td><a href="<?php echo $html->url('/').DIR ?>sec/Técnico en Informática Profesional y Personal - 2007.pdf" target="_blank">Técnico en Informática Profesional y Personal</a></td>
			<td>Técnico en Informática Profesional y Personal</td>
			<td></td>
		</tr>
		<tr>
			<td><a href="<?php echo $html->url('/').DIR ?>sup/Técnico Superior en Soporte de Infraestructura de Tecnología de la Información - 2010.pdf" target="_blank">Técnico Superior en Soporte de Infraestructura de Tecnología de la Información</a></td>
			<td>Técnico Superior en Soporte de Infraestructura de Tecnología de la Información</td>
			<td></td>
		</tr>
		<tr>
			<td>Capacitación de usuarios</td>
			<td><a href="<?php echo $html->url('/').DIR ?>fp/Operador de Informática para Administración y Gestión - 2007.pdf" target="_blank">Operador de Informática para Administración y Gestión</a></td>
			<td>Operador de Informática para Administración y Gestión</td>
			<td></td>
		</tr>
	</tbody>
</table>

 <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Asociación Argentina de Usuarios de la Informática y las Comunicaciones',
                'Cámara de Empresas de Software y Servicios Informáticos de la República Argentina',
                'Cámara de Empresas Informáticas del Litoral',
                'Cámara de Informática y Comunicaciones de la República Argentina',
                'Consejo Profesional de Ingeniería, de Telecomunicaciones, Electrónica y Computación', 
                'Consejo Profesional en Ciencias Informáticas',
                'Córdoba Technology, Cluster de Tecnología de la Información',
                'Foro Nacional de Profesionales Técnicos',
                'Junta Coordinadora de Asociaciones de la Enseñanza Privada',
                'Ministerio de Industria de la Nación',
                'Polo IT Buenos Aires',
                'Sociedad Argentina de Informática',
                'Unión Docentes Argentinos',
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
        <h3>Más información</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/informatica'));?></li>
                <li><?php echo $html->link('Ver títulos del sector Informática', '/titulos-informatica') ?></li>
            </ul>
  </div>
</div>
