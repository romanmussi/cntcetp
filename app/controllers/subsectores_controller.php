<?php
class SubsectoresController extends AppController {

	var $name = 'Subsectores';
	var $helpers = array('Html', 'Form');
        var $components = array('RequestHandler');

	function ajax_select_subsector_form_por_sector(){
		 $this->layout = 'ajax';
                 Configure::write('debug',0);
                 $sector_id = 0;
                 if (!empty($this->data['Plan']['sector_id'])) {
                        $sector_id = $this->data['Plan']['sector_id'];
                 }
                 if (!empty($this->data['sector_id'])) {
                        $sector_id = $this->data['sector_id'];
                 }
                 else if(!empty($this->data['SectoresTitulo']['sector_id'])){
                        $sector_id = $this->data['SectoresTitulo']['sector_id'];
                 }
                 else{
                     if ($sector = current($this->data)):
                            if (isset($sector)):
                                    $sector_id = $sector['sector_id'];
                            endif;
                     endif;
                 }

                 $subsectores = $this->Subsector->con_sector('all',$sector_id);

                 $this->set('todos', ($sector_id != 0 )?false:true);
                 $this->set('subsectores', $subsectores);                  
         
		 //prevent useless warnings for Ajax
	     $this->render('ajax_select_subsector_form_por_sector','ajax');
	}

        function getSubSectoresBySector(){
            $this->autoRender = false;

            if ( $this->RequestHandler->isAjax() ) {
              Configure::write ( 'debug', 0 );
            }
            
            $sector = $this->params['url']['sector'];
            $items = $this->Subsector->find("all", 
                                            array('conditions'=> array("sector_id" => $sector))
                    );

            $result = array();


            foreach ($items as $item) {

                array_push($result, array(
                        "id" => $item['Subsector']['id'],
                        "name" => utf8_encode($item['Subsector']['name'])
                ));
            }

            return json_encode($result);
        }
}
?>