<?php
class Jurisdiccion extends AppModel {

	var $name = 'Jurisdiccion';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array('Tipoinstit','Instit','Departamento');

        var $order = array('Jurisdiccion.name');

      

}
?>