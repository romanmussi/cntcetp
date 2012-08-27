<?php
class Dependencia extends AppModel {

	var $name = 'Dependencia';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Instit' => array(
                            'className' => 'Instit',
                            'foreignKey' => 'dependencia_id',
                            'dependent' => false,
                            'conditions' => '',
                            'fields' => '',
                            'order' => '',
                            'limit' => '',
                            'offset' => '',
                            'exclusive' => '',
                            'finderQuery' => '',
                            'counterQuery' => ''
			)
	);
}
?>