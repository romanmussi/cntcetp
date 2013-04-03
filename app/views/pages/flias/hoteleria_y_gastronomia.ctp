<?php
define('DIR', 'files/pdfs/hoteleria_y_gastronomia/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Hoteleria y Gastronomia</h2>
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
  <tbody>
    <tr>
      <td rowspan="6">Hotelería</td>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Mucama - 2011.pdf" target="_blank">Mucama</a></td>
      <td>Mucama</td>
      <td></td>
    </tr>
    <tr>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Recepcionista de Hotel - 2011.pdf" target="_blank">Recepcionista</a></td>
      <td>Recepcionista</td>
      <td></td>
    </tr>
    <tr>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Ama de Llaves - 2011.pdf" target="_blank">Ama de llaves</a></td>
      <td>Ama de llaves</td>
      <td></td>
    </tr>
    <tr>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Organizador de Operaciones de Hoteleras - 2011.pdf" target="_blank">Organizador de operaciones hoteleras</a></td>
      <td>Organizador de operaciones hoteleras</td>
      <td></td>
    </tr>
    <tr>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Organizador de Eventos - 2011.pdf" target="_blank">Organizador de eventos</a></td>
      <td>Organizador de eventos</td>
      <td></td>
    </tr>
    <tr>
      <td>Reservas</td>
      <td>Reservas</td>
      <td></td>
    </tr>
    <tr>
      <td rowspan="9">Gastronomía</td>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Mozo-Camarero de Salón - 2011.pdf" target="_blank">Mozo</a></td>
      <td>Mozo</td>
      <td></td>
    </tr>
    <tr>
      <td>Bartender</td>
      <td>Bartender</td>
      <td></td>
    </tr>
    <tr>
      <td>Sommelier</td>
      <td>Sommelier</td>
      <td></td>
    </tr>
    <tr>
      <td>Especialista en Sommellerie</td>
      <td>Especialista en Sommellerie</td>
      <td></td>
    </tr>
    <tr>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Cocinero - 2011.pdf" target="_blank">Cocinero</a></td>
      <td>Cocinero</td>
      <td></td>
    </tr>
    <tr>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Pastelero - 2011.pdf" target="_blank">Pastelero</a></td>
      <td>Pastelero</td>
      <td></td>
    </tr>
    <tr>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Panadero - 2011.pdf" target="_blank">Panadero</a></td>
      <td>Panadero</td>
      <td></td>
    </tr>
    <tr>
      <td>Gastronómico profesional</td>
      <td>Gastronómico profesional</td>
      <td></td>
    </tr>
    <tr>
      <td>Organizador de operaciones gastronómicas</td>
      <td>Organizador de operaciones gastronómicas</td>
      <td></td>
    </tr>
  </tbody>
</table>

 <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Asociación del Magisterio de Enseñanza Técnica',
                'Confederación Argentina de Instituciones Educativas Privadas',
                'Confederación de Trabajadores de la Educación de la República Argentina',
                'Escuela de Cocineros "Gato Dumas"',
                'Federación Empresaria Hotelera Gastronómica de la República Argentina',
                'Federación para el Desarrollo de la Educación Técnico Profesional de Argentina y el Mercosur',
                'Ministerio de Trabajo, Empleo y Seguridad Social de la Nación',
                'Unión de Trabajadores del Turismo, Hoteleros y Gastronómicos de la República Argentina',
                'Unión Docentes Argentinos',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
 
        <br />
        <h3>Informes</h3>
            <ul>
                <li><?php echo $html->link('Informe sectorial', '/files/pdfs/info_sectorial/hoteleria-gastronomia-informe-sectorial.pdf') ?></li>
            </ul>
        <br />
        <h3>Más información</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/hotele<ria_y_gastronomia'));?></li>
                <li><?php echo $html->link('Ver títulos del sector Hotelería y Gastronomía', array('controller'=>'titulos', 'action'=>'search', 0, 34)) ?></li>
            </ul>
  </div>
</div>

