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
      <td rowspan="6">Hoteler�a</td>
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
      <td rowspan="9">Gastronom�a</td>
      <td><a href="<?php echo $html->url('/').DIR ?>fp/Mozo-Camarero de Sal�n - 2011.pdf" target="_blank">Mozo</a></td>
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
      <td>Gastron�mico profesional</td>
      <td>Gastron�mico profesional</td>
      <td></td>
    </tr>
    <tr>
      <td>Organizador de operaciones gastron�micas</td>
      <td>Organizador de operaciones gastron�micas</td>
      <td></td>
    </tr>
  </tbody>
</table>

 <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'Asociaci�n del Magisterio de Ense�anza T�cnica',
                'Confederaci�n Argentina de Instituciones Educativas Privadas',
                'Confederaci�n de Trabajadores de la Educaci�n de la Rep�blica Argentina',
                'Escuela de Cocineros "Gato Dumas"',
                'Federaci�n Empresaria Hotelera Gastron�mica de la Rep�blica Argentina',
                'Federaci�n para el Desarrollo de la Educaci�n T�cnico Profesional de Argentina y el Mercosur',
                'Ministerio de Trabajo, Empleo y Seguridad Social de la Naci�n',
                'Uni�n de Trabajadores del Turismo, Hoteleros y Gastron�micos de la Rep�blica Argentina',
                'Uni�n Docentes Argentinos',
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
        <h3>M�s informaci�n</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/hotele<ria_y_gastronomia'));?></li>
                <li><?php echo $html->link('Ver t�tulos del sector Hoteler�a y Gastronom�a', array('controller'=>'titulos', 'action'=>'search', 0, 34)) ?></li>
            </ul>
  </div>
</div>

