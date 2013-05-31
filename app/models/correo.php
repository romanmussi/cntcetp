<?php
class Correo extends AppModel {

	var $name = 'Correo';
        var $useTable = false;

	var $validate = array(
                        'mail' => array(
                            'rule' => 'email',
                            'message' => 'Por favor ingrese un email válido'
                            ),
                        'descripcion' => array(
                            'rule' => VALID_NOT_EMPTY,
                            'message' => 'Por favor ingrese el texto'
                            )
	);

}
?>