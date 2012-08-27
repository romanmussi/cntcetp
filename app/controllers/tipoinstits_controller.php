<?php
class TipoinstitsController extends AppController {

	var $name = 'Tipoinstits';
	var $helpers = array('Html', 'Form','Ajax');
	


	function index() {
		$this->Tipoinstit->recursive = 0;
		$this->set('tipoinstits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Tipoinstit.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('tipoinstit', $this->Tipoinstit->read(null, $id));
	}

	
	
	/********************************************************************
	 * 
	 * 
	 *  RequestAction
	 * 
	 * 
	 */
	function ajax_select_form_por_jurisdiccion(){
		 $this->layout = 'ajax';
         Configure::write('debug',0);
         $jurisdiccion = 0;
         
          if (isset($this->params['url']['jurisdiccion_id'])){
			$jurisdiccion = $this->params['url']['jurisdiccion_id']; //este viene del depuradores/tipoinstits porque lo hago directamente con PROTOTYPE y no con el ajax helper
          }
          
          if (isset($this->data['Instit']['jurisdiccion_id'])){
          	$jurisdiccion = $this->data['Instit']['jurisdiccion_id'];
          }
              
          $inss = $this->Tipoinstit->dame_por_jurisdiccion($jurisdiccion);
      
         
	     $this->set('tipoinstits', $inss);
	         
	         //prevent useless warnings for Ajax
	     $this->render('ajax_select_form_por_jurisdiccion','ajax');
         	
	}

	function get_name($id = 0){
		if($id == 0){
			return '';
		}
		else{
			$this->Tipoinstit->recursive = -1;
			$varaux = $this->Tipoinstit->read(null,$id);
			return $varaux['Tipoinstit']['name'];
		}
	}

}
?>