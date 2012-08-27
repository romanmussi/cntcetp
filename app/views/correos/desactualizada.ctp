<?php echo $html->css('catalogo.correos.desactualizada'); ?>

<h4 style="margin-top:0px;">
    <?php echo $nombre_completo ?>
</h4>

<p>
    Si quiere actualizar, agregar o modificar los datos de una institución complete el siguiente formulario
</p>

<?php
echo $form->create('Correo', array('action' => 'desactualizada', 'class'=>'ficha_info'));
echo $form->hidden('instit_id');
echo $form->hidden('cue_instit');
echo $form->hidden('nombre_completo');
echo $form->input('from', array('label'=>'Nombre', 'class'=> ''));
echo $form->input('mail', array('label'=>'E-mail'));
echo $form->input('telefono', array('label'=>'Teléfono'));
echo $form->input('descripcion', array('label'=>'Descripción', 'type' => 'text', 'rows' => '4'));
?>
<br />
<?php
echo $form->end('Enviar');
?>
