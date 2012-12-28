<?php 
define('DIR', 'files/pdfs/cuero_y_calzado/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Cuero y Calzado</h2>
    <h3>Familia profesional</h3>
<table>
  <thead>
    <tr>
      <th colspan="2">Agrupamiento</th>
      <th>Figura Formativa y Marco de Referencia</th>
      <th>Perfiles de referencia</th>
    </tr>
  </thead>
		<tr>
                        <td rowspan="7">Industria del Curtido</td>
			<td rowspan="3">Procesos H�medos</td>
			<td rowspan="3">Fulonero de Ribera</td>
			<td>Fulonero de Depilado</td>
		</tr>
		<tr>
			<td>Maquinista de Descarnado y de Desencalado</td>
		</tr>
		<tr>
			<td>Fulonero de Curtido</td>
		</tr>
                <tr>
			<td rowspan="4">Procesos Secos</td>
			<td>Acondicionador de Cueros</td>
			<td>Acondicionador de Cueros</td>
		</tr>
		<tr>
			<td>Operador de M�quina de Procesos Secos</td>
			<td>Operador de M�quina de Secado</td>
		</tr>
		<tr>
			<td>Clasificador de Cueros</td>
			<td>Clasificador de Cueros Semiterminado</td>
		</tr>
                <tr>
			<td>Operario de Terminaci�n del Cuero</td>
			<td>Operario de Terminaci�n</td>
		</tr>
                <tr>
			<td rowspan="15">Industria del Calzado y Marroquiner�a</td>
                        <td rowspan="9">Calzado</td>
			<td>Dise�ador</td>
			<td>Dise�ador</td>
		</tr>
		<tr>
			<td>Modelista</td>
			<td>Modelista</td>
		</tr>
		<tr>
			<td rowspan="2">Cortador de Cuero</td>
			<td>Cortador de Cuero a Mano</td>
		</tr>
                <tr>
			<td>Cortador de Cuero a M�quina</td>
		</tr>
                <tr>
			<td>Rebajador</td>
			<td>Rebajador</td>
		</tr>
                <tr>
			<td>Aparador</td>
			<td>Maquinista y Mesista: Aparador completo</td>
		</tr>
                <tr>
			<td>Armador</td>
			<td>Armador</td>
		</tr>
                <tr>
			<td>Suelero</td>
			<td>Suelero</td>
		</tr>
                <tr>
			<td>Empaquista</td>
			<td>Empaquista</td>
		</tr>
                <tr>
			<td rowspan="6">Marroquiner�a</td>
			<td>Dise�ador</td>
			<td>Dise�ador</td>
		</tr>
		<tr>
			<td>Modelista</td>
			<td>Modelista</td>
		</tr>
                <tr>
			<td>Cortador</td>
			<td>Cortador</td>
		</tr>
                <tr>
			<td>Rebajador</td>
			<td>Rebajador</td>
		</tr>
                <tr>
			<td>Oficial de Mesa</td>
			<td>Oficial de Mesa</td>
		</tr>
                <tr>
			<td>Maquinista Marroquinero</td>
			<td>Ofic. Maquinista (Cosedor)</td>
		</tr>
  </table>
  <br />
    	<?php  
        $vops = array(
            'foroName' => '',
            'participantes' => array(
                'C�mara Argentina de Industriales Proveedores de la Industria del Calzado',
                'C�mara de la Industria Curtidora Argentina',
                'C�mara de la Industria del Calzado',
                'C�mara Industrial de las Manufacturas del Cuero de la Rep�blica Argentina',
                'Centro de Formaci�n de Recursos Humanos y Tecnolog�a para la Industria del Calzado',
                'Instituto Nacional de Tecnolog�a Industrial',
                'Ministerio de Ciencia, Tecnolog�a e Innovaci�n Productiva',
                'Uni�n Docentes Argentinos',
            ),
        );
        echo $this->element('foro2', $vops);
		?>
    
        <br />
        
        <h3>M�s informaci�n</h3>
            <ul>
                <!--<li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?></li>-->
                <li><?php echo $html->link('Ver t�tulos del sector Cuero y Calzado', '/titulos-cuero-y-calzado') ?></li>
            </ul>
  </div>
</div>
