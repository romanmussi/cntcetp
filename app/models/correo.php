<?php
class Correo extends AppModel {

	var $name = 'Correo';
        var $useTable = false;

	var $validate = array(
                        'from' => array(
                            'notEmpty'=> array(
                                'rule' => VALID_NOT_EMPTY,
                                'required' => true,
                                'allowEmpty' => false,
                                'message' => 'Debe ingresar su nombre'
                            )
                        ),
                        'mail' => array(
                            'rule' => 'email',
                            'message' => 'Por favor ingrese un email válido'
                            )
	);

}
?>