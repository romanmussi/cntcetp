<?php
class SectoresController extends AppController {

	var $name = 'Sectores';
	var $helpers = array('Html', 'Form');

	function index() {
		//$this->Sector->recursive = 0;
		$this->paginate = array ('contain' => 'Orientacion');
		$this->set('sectores', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Sector.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('sector', $this->Sector->read(null, $id));
	}
}
?>