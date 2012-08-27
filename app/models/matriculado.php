<?php
class Matriculado extends AppModel {

	var $name = 'Matriculado';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Jurisdiccion',
			'Oferta',
	);
}
?>
