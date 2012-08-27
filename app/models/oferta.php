<?php
class Oferta extends AppModel {

	var $name = 'Oferta';
        
        var $order = 'Oferta.orden';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Plan' => array('dependent' => false),
	);
        
}
?>