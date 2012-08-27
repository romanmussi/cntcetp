<?php
    //debug($this);
    $this->pageTitle = 'Familias Profesionales';
?>

<?php echo $this->element('menu_docs')?>

<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Familias profesionales</h2>
        <p style="color: red">Presentaci&oacute;n [Pablo]</p>
        
        <h3>Listado de familias  </h3>
        <p class="warning">Haciendo click en el nombre de la familia podrá consultar información sobre agrupamientos de figuras, figuras formativas y perfiles de referencia.</p>
        <ul>
            <li><?php echo $html->link('Agropecuaria', '/pages/flias/agropecuaria'); ?></li>
            <li><?php echo $html->link('Construcción', '/pages/flias/construccion'); ?></li>
            <li><?php echo $html->link('Energía Eléctrica', '/pages/flias/energia_electrica'); ?></li>
            <li><?php echo $html->link('Estética Profesional', '/pages/flias/estetica_profesional'); ?></li>
            <li><?php echo $html->link('Hotelería y Gastronomía', '/pages/flias/hoteleria_gastronomia'); ?></li>
            <li><?php echo $html->link('Informática', '/pages/flias/informatica'); ?></li>
            <li><?php echo $html->link('Madera y Mueble', '/pages/flias/madera_y_mueble'); ?></li>
            <li><?php echo $html->link('Mecánica Automotriz', '/pages/flias/mecanica_automotriz'); ?></li>
            <li><?php echo $html->link('Metalmecánica', '/pages/flias/metalmecanica'); ?></li>
            <li><?php echo $html->link('Telecomunicaciones', '/pages/flias/telecomunicaciones'); ?></li>
            <li><?php echo $html->link('Textil', '/pages/flias/textil'); ?></li>
            <hr />
            <p style="color:red">De las siguientes, faltan los cuadros</p>
            <li>Producción Lechera</li>
        </ul>
        
        <h3>M&aacute;s informaci&oacute;n</h3>
        <p style="color:red">Normativa que aprueba familias profesionales [Pablo, a aprobar en breve]</p>
        <p>&nbsp;</p>
    </div>
</div>

