<h1 class="grid_12">Cont�ctenos</h1>
<div class="grid_6">
    <div class='boxblanca formu_6'>
        <h3>Formulario de contacto</h3>
        <p style="margin: 10px 0px;">Cualquier consulta acerca de la oferta, la validez de los t�tulos y certificados, horarios y carga horaria  y/o cualquier otra informaci�n en relaci�n a los establecimientos que figuran en este Cat�logo debe contactarse directamente con la instituci�n mediante la informaci�n provista en la ficha de contacto que figura en el apartado del establecimiento.
            <br />
            <br />
        </p> 
        <?php
        echo $form->create('Correo', array('action' => 'contacto'));
        echo $form->input('from', array('label'=>'Nombre'));
        echo $form->input('mail', array('label'=>'E-Mail', 'after'=>' *'));
        echo $form->input('telefono', array('label'=>'Tel�fono'));
        echo $form->input('descripcion', array('label'=>false, 'rows' => 5, 'cols' => 50, 'after'=>' *'));
        ?>
        <div>(*) Datos obligatorios</div><br />
        <?php
        echo $form->end('Enviar');
        ?>
    </div>
</div>
<div class="grid_6">
    <div class='boxgris' style="height: 232px">
        <h2 style="margin: 10px 20px;">Otras v�as de contacto</h2>
        <p style="margin: 10px 20px;">
            Tambi�n podr� contactarse con la Unidad de Informaci�n del INET mediante las siguientes v�as:
            <br />
            <br />
            <?php echo $html->image('emailButton.png');?>
            <?php echo $hideMail->hide("desarrolloetp@inet.edu.ar");?><br/>
            <?php echo $html->image('phone16x16.png');?> (011) 4129-2000 Interno 4032/4033<br />
            <?php echo $html->image('office-building.png');?> Saavedra 789 CABA, Buenos Aires, Argentina. Oficina 311. <br />
        </p>
    </div>
</div>

