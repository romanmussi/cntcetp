<?php
    //debug($this);
    $this->pageTitle = 'Familias Profesionales';
?>

<?php echo $this->element('menu_doc_residual')?>

<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Familias profesionales</h2>
        <p style="color: red">Presentaci&oacute;n [Pablo]</p>
        
        <h3>Listado de familias  </h3>
        <p class="warning">Haciendo click en el nombre de la familia podrá consultar información sobre agrupamientos de figuras, figuras formativas y perfiles de referencia.</p>
        <ul>
            <li><?php echo $html->link('Agropecuaria', '/pages/doc_residual/flias/agropecuaria'); ?></li>
            <li><?php echo $html->link('Construcción', '/pages/doc_residual/flias/construccion'); ?></li>
            <li><?php echo $html->link('Energía Eléctrica', '/pages/doc_residual/flias/energia_electrica'); ?></li>
            <li><?php echo $html->link('Estética Profesional', '/pages/doc_residual/flias/estetica_profesional'); ?></li>
            <li><?php echo $html->link('Hotelería y Gastronomía', '/pages/doc_residual/flias/hoteleria_gastronomia'); ?></li>
            <li><?php echo $html->link('Informática', '/pages/doc_residual/flias/informatica'); ?></li>
            <li><?php echo $html->link('Madera y Mueble', '/pages/doc_residual/flias/madera_y_mueble'); ?></li>
            <li><?php echo $html->link('Mecánica Automotriz', '/pages/doc_residual/flias/mecanica_automotriz'); ?></li>
            <li><?php echo $html->link('Metalmecánica', '/pages/doc_residual/flias/metalmecanica'); ?></li>
            <li><?php echo $html->link('Telecomunicaciones', '/pages/doc_residual/flias/telecomunicaciones'); ?></li>
            <li><?php echo $html->link('Textil', '/pages/doc_residual/flias/textil'); ?></li>
            <hr />
            <p style="color:red">De las siguientes, faltan los cuadros</p>
            <li>Producción Lechera</li>
        </ul>
        
        <h3>M&aacute;s informaci&oacute;n</h3>
        <p style="color:red">Normativa que aprueba familias profesionales [Pablo, a aprobar en breve]</p>
        <p>&nbsp;</p>
    </div>
</div>

