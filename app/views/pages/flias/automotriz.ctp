<?php 
define('DIR', 'files/pdfs/automotriz/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Automotriz</h2>

    	<?php  
        $vops = array(
            'foroName' => 'Administración',
            'participantes' => array(
                'Asociación de Cámaras Reparadores de Automotores de la Provincia de Buenos Aires',
                'Asociación del Magisterio de Enseñanza Técnica',
                'Asociación Propietarios Talleres Automotores Zona Norte',
                'Asociación Talleres Reparaciones de Automotores y Afines de Rosario',
                'Federación Argentina de Asociaciones de Talleres de Reparación de Automotores y Afines',
                'Foro Nacional de Profesionales Técnicos',
                'Ministerio de Industria de la Nación',
                'Ministerio de Trabajo, Empleo y Seguridad Social de la Nación',
                'Sindicato de Mecánicos y Afines del Transporte Automotor de la República Argentina',
                'Unión de Talleres Mecánicos y Afines de La Matanza',
                'Unión Docentes Argentinos',
                'Unión Talleristas Automotores y Afines Zona Oeste',
            )
        );
        echo $this->element('foro2', $vops);
		?>
        
        
        <h3>Más información</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/automotriz'));?></li>
                <li><?php echo $html->link('Ver títulos del sector Automotriz', '/titulos-automotriz') ?></li>
    </div>  </ul>
</div>