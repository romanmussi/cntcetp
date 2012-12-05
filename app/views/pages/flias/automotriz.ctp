<?php 
define('DIR', 'files/pdfs/automotriz/');
echo $this->element('menu_docs')
?>
  <div id="cuerpo1" class="grid_9">
    <div class=" boxblanca boxdocs">
    <h2>Sector Automotriz</h2>

    	<?php  
        $vops = array(
            'foroName' => 'Administraci�n',
            'participantes' => array(
                'Asociaci�n de C�maras Reparadores de Automotores de la Provincia de Buenos Aires',
                'Asociaci�n del Magisterio de Ense�anza T�cnica',
                'Asociaci�n Propietarios Talleres Automotores Zona Norte',
                'Asociaci�n Talleres Reparaciones de Automotores y Afines de Rosario',
                'Federaci�n Argentina de Asociaciones de Talleres de Reparaci�n de Automotores y Afines',
                'Foro Nacional de Profesionales T�cnicos',
                'Ministerio de Industria de la Naci�n',
                'Ministerio de Trabajo, Empleo y Seguridad Social de la Naci�n',
                'Sindicato de Mec�nicos y Afines del Transporte Automotor de la Rep�blica Argentina',
                'Uni�n de Talleres Mec�nicos y Afines de La Matanza',
                'Uni�n Docentes Argentinos',
                'Uni�n Talleristas Automotores y Afines Zona Oeste',
            )
        );
        echo $this->element('foro2', $vops);
		?>
        
        
        <h3>M�s informaci�n</h3>
            <ul>
                <li><?php echo $html->link('Listado de Marcos de Referencia del sector', array('controller' => 'pages', 'action' => 'display', 'sectores/automotriz'));?></li>
                <li><?php echo $html->link('Ver t�tulos del sector Automotriz', '/titulos-automotriz') ?></li>
    </div>  </ul>
</div>