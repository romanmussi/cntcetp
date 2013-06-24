<div class="grid_12">
    <h1>Mapa del sitio</h1>

    <div class="boxblanca boxdocs"> 
        <ul>
            <li><?php echo $html->link('Inicio', array('controller' => 'pages', 'action' => 'home')); ?></li>
            <li><?php echo $html->link('El Instituto Nacional de Educación Tecnológica', array('controller' => 'pages', 'action' => 'el_inet')); ?>
                <ul>
                    <li>Propósitos</li>
                    <li>Ideas eje</li>
                    <li>Entidades relacionadas</li>
                </ul>
            </li>
            
            <li><?php echo $html->link('Las políticas para la Educación Técnico Profesional en Argentina', array('controller' => 'pages', 'action' => 'grafo_ley')); ?>
                <ul>
                    <li>Grafo de la ley</li>
                </ul>
            </li>
            
            <li><?php echo $html->link('La Educación Técnico Profesional en cifras', array('controller' => 'pages', 'action' => 'mapas_y_graficos')); ?></li>
            
            <li><?php echo $html->link('Buscadores', array('controller' => 'pages', 'action' => 'buscadores')); ?>
                <ul>
                    <li><?php echo $html->link('Guía del Estudiante',array('controller'=>'titulos', 'action'=>'guiaDelEstudiante')); ?></li>
                    <li><?php echo $html->link('Búsqueda de títulos y certificaciones',array('controller'=>'titulos', 'action'=>'search')); ?>
                        <ul>
                            <li><?php echo $html->link('Nivel Secundario Técnico',array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID)); ?></li>
                            <li><?php echo $html->link('Nivel Superior Técnico', array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID)); ?></li>
                            <li><?php echo $html->link('Formación Profesional', array('controller'=>'titulos', 'action'=>'search', FP_ID)); ?></li>
                        </ul>
                    </li>
                    <li><?php echo $html->link('Búsqueda por instituciones',array('controller'=>'instits', 'action'=>'search')); ?></li>
                </ul>
            </li>
            
            <li><?php echo $html->link('Información Sectorial', array('controller' => 'pages', 'action' => 'doc_index')); ?>
                <ul>
                    <li><?php echo $html->link('Administración', array('controller' => 'pages', 'action' => 'display', 'flias/administracion'));?></li>
                    <li><?php echo $html->link('Agropecuario', array('controller' => 'pages', 'action' => 'display', 'flias/agropecuaria'));?></li>
                    <li><?php echo $html->link('Automotriz', array('controller' => 'pages', 'action' => 'display', 'flias/automotriz'));?></li>
                    <li><?php echo $html->link('Construcciones', array('controller' => 'pages', 'action' => 'display', 'flias/construcciones'));?></li>
                    <li><?php echo $html->link('Cuero y Calzado', array('controller' => 'pages', 'action' => 'display', 'flias/cuero_y_calzado'));?></li>
                    <li><?php echo $html->link('Energía Eléctrica', array('controller' => 'pages', 'action' => 'display', 'flias/energia_electrica'));?></li>
                    <li><?php echo $html->link('Estética Profesional', array('controller' => 'pages', 'action' => 'display', 'flias/estetica_profesional'));?></li>
                    <li><?php echo $html->link('Hotelería y Gastronomía', array('controller' => 'pages', 'action' => 'display', 'flias/hoteleria_y_gastronomia'));?></li>
                    <li><?php echo $html->link('Industria Alimentaria', array('controller' => 'pages', 'action' => 'display', 'flias/industria_alimentaria'));?></li>
                    <li><?php echo $html->link('Informática', array('controller' => 'pages', 'action' => 'display', 'flias/informatica'));?></li>
                    <li><?php echo $html->link('Madera y Mueble', array('controller' => 'pages', 'action' => 'display', 'flias/madera_y_mueble'));?></li>
                    <li><?php echo $html->link('Metalmecánica', array('controller' => 'pages', 'action' => 'display', 'flias/metalmecanica'));?></li>
                    <li><?php echo $html->link('Salud', array('controller' => 'pages', 'action' => 'display', 'flias/salud'));?></li>
                    <li><?php echo $html->link('Telecomunicaciones', array('controller' => 'pages', 'action' => 'display', 'flias/telecomunicaciones'));?></li>
                    <li><?php echo $html->link('Textil e Indumentaria', array('controller' => 'pages', 'action' => 'display', 'flias/textil_indumentaria'));?></li>
                </ul>
                
            </li>
            <li><?php echo $html->link('Información socio-productiva', array('controller' => 'pages', 'action' => 'doc_territorial_index')); ?></li>
            <li><?php echo $html->link('Glosario', array('controller' => 'pages', 'action' => 'glosario')); ?></li>
            <li><?php echo $html->link('Contacto', array('controller' => 'correos', 'action' => 'contacto')); ?></li>
        </ul>
    </div>
</div>