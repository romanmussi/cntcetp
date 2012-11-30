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
			<td rowspan="2">Títulos existentes </td>
			<td>Técnico en Computación</td>
			<td>Técnico en Computación</td>
			<td></td>
		</tr>
		<tr>
			<td>Técnico Superior en Análisis de Sistemas </td>
			<td>Técnico Superior en Análisis de Sistemas </td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="2">Funcional</td>
			<td>Administrador de Recursos de Tecnologías de la Información/Integrador/ Analista de Sistemas</td>
			<td>Administrador de Recursos de Tecnologías de la Información/Integrador/ Analista de Sistemas</td>
			<td></td>
		</tr>
		<tr>
			<td>Técnico Superior en Análisis Funcional de Procesos</td>
			<td>Técnico Superior en Análisis Funcional de Procesos</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="3">Desarrollo de software</td>
			<td>Programador</td>
			<td>Programador</td>
			<td></td>
		</tr>
		<tr>
			<td>Técnico en Programación de Computadoras  </td>
			<td>Técnico en Programación de Computadoras  </td>
			<td></td>
		</tr>
		<tr>
			<td>Técnico Superior en Desarrollo de Software</td>
			<td>Técnico Superior en Desarrollo de Software</td>
			<td></td>
		</tr>
		<tr>
			<td rowspan="2">Tecnología y equipamiento</td>
			<td>Técnico en Informática Profesional y Personal</td>
			<td>Técnico en Informática Profesional y Personal</td>
			<td></td>
		</tr>
		<tr>
			<td>Técnico Superior en Soporte de Infraestructura de Tecnología de la Información</td>
			<td>Técnico Superior en Soporte de Infraestructura de Tecnología de la Información</td>
			<td></td>
		</tr>
		<tr>
			<td>Capcitación de Usuarios</td>
			<td>Operador de Informática para Administración y Gestión</td>
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
        
        <h3>Informes</h3>
        <?php //echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/madera y mueble.pdf') ?>
        <br />
        <br />
        <h3>Más información</h3>
        
        <?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/informatica'));?>
        
        <br />
        <?php echo $html->link('Ver títulos del sector Informática', '/titulos-informatica') ?>

  </div>
</div>
