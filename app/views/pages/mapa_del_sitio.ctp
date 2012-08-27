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
                        
<!--                        <li><?php echo $html->link('Alimentos', array('controller' => 'pages', 'action' => 'display', 'sectores/alimentos'));?>
                            <ul>
                               <li><?php echo $html->link('Industria Avícola', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_avicola'));?>
                               <li><?php echo $html->link('Industria Lechera', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_lechera'));?>
                            </ul>
                        </li>
-->
<!--                        <li><?php echo $html->link('Aeronáutica', array('controller' => 'pages', 'action' => 'display', 'sectores/aeronautica'));?></li>-->
                        
                        <li>
                            <?php echo $html->link('Agropecuario', array('controller' => 'pages', 'action' => 'display', 'sectores/agropecuaria'));?>
<!--                            <ul>
                                <li><?php echo $html->link('Apícola', array('controller' => 'pages', 'action' => 'display', 'sectores/apicola'));?></li>
                                <li><?php echo $html->link('Avícola', array('controller' => 'pages', 'action' => 'display', 'sectores/avicola'));?></li>
                                <li><?php echo $html->link('Florícola', array('controller' => 'pages', 'action' => 'display', 'sectores/floricola'));?></li>
                                <li><?php echo $html->link('Forestal', array('controller' => 'pages', 'action' => 'display', 'sectores/forestal'));?></li>
                                <li><?php echo $html->link('Frutícola - Olivicultura', array('controller' => 'pages', 'action' => 'display', 'sectores/fruticola_olivicultura'));?></li>
                                <li><?php echo $html->link('Hortícola', array('controller' => 'pages', 'action' => 'display', 'sectores/horticola'));?></li>
                                <li><?php echo $html->link('Producción Lechera', array('controller' => 'pages', 'action' => 'display', 'sectores/produccion_lechera'));?></li>
                                <li><?php echo $html->link('Vitivinicultura', array('controller' => 'pages', 'action' => 'display', 'sectores/vitivinicultura'));?></li>
                            </ul>-->
                        </li>
	                <li><?php echo $html->link('Automotriz', array('controller' => 'pages', 'action' => 'display', 'sectores/automotriz'));?></li>
                        <li><?php echo $html->link('Construcciones', array('controller' => 'pages', 'action' => 'display', 'sectores/construcciones'));?></li>
<!--                        <li><?php echo $html->link('Cuero y Calzado', array('controller' => 'pages', 'action' => 'display', 'sectores/cuero_y_calzado'));?></li>-->
<!--                        <li><?php echo $html->link('Electrónica', array('controller' => 'pages', 'action' => 'display', 'sectores/electronica'));?>
                            <ul>
                                <li><?php echo $html->link('Telecomunicaciones', array('controller' => 'pages', 'action' => 'display', 'sectores/telecomunicaciones'));?></li>
                                <li><?php echo $html->link('Electrónica Industrial', array('controller' => 'pages', 'action' => 'display', 'sectores/electronica_industrial'));?></li>
                                <li><?php echo $html->link('Instrumentación y Control', array('controller' => 'pages', 'action' => 'display', 'sectores/instrumentacion_y_control'));?></li>
                            </ul>
                        </li>-->
	                <li><?php echo $html->link('Energía Eléctrica', array('controller' => 'pages', 'action' => 'display', 'sectores/energia_electrica'));?></li>
	                <li><?php echo $html->link('Estética Profesional', array('controller' => 'pages', 'action' => 'display', 'sectores/estetica_profesional'));?></li>
<!--                        <li><?php echo $html->link('Hotelería y Gastronomía', array('controller' => 'pages', 'action' => 'display', 'sectores/hoteleria_y_gastronomia'));?></li>-->
<!--                        <li><?php echo $html->link('Industria Naval', array('controller' => 'pages', 'action' => 'display', 'sectores/industria_naval'));?></li>-->
	                <li><?php echo $html->link('Informática', array('controller' => 'pages', 'action' => 'display', 'sectores/informatica'));?></li>
	                <li><?php echo $html->link('Madera y Mueble', array('controller' => 'pages', 'action' => 'display', 'sectores/madera_y_mueble'));?></li>
	                <li><?php echo $html->link('Metalmecánica', array('controller' => 'pages', 'action' => 'display', 'sectores/metalmecanica'));?></li>
<!--                        <li><?php echo $html->link('Mineria', array('controller' => 'pages', 'action' => 'display', 'sectores/mineria'));?></li>-->
<!--                        <li><?php echo $html->link('Pesca', array('controller' => 'pages', 'action' => 'display', 'sectores/pesca'));?>
                            <ul>
                                <li><?php echo $html->link('Marítimo', array('controller' => 'pages', 'action' => 'display', 'sectores/maritimo'));?></li>
                                <li><?php echo $html->link('Portuario', array('controller' => 'pages', 'action' => 'display', 'sectores/portuario'));?></li>
                            </ul>
                        </li>-->
<!--                        <li><?php echo $html->link('Petróleo y Gas', array('controller' => 'pages', 'action' => 'display', 'sectores/petroleo_y_gas'));?></li>-->
<!--                        <li><?php echo $html->link('Química y Farmacia', array('controller' => 'pages', 'action' => 'display', 'sectores/quimica_y_farmacia'));?></li>-->
                        <li><?php echo $html->link('Salud', array('controller' => 'pages', 'action' => 'display', 'sectores/salud'));?></li>
                        <li><?php echo $html->link('Textil e Indumentaria', array('controller' => 'pages', 'action' => 'display', 'sectores/textil_indumentaria'));?></li>
<!--                        <li><?php echo $html->link('Turismo', array('controller' => 'pages', 'action' => 'display', 'sectores/turismo'));?></li>-->
	            </ul>
                
                
            
            </li>
            <li><?php echo $html->link('Contacto', array('controller' => 'correos', 'action' => 'contacto')); ?></li>
        </ul>
    </div>
</div>