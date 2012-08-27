<?php

class LocalidadesController extends AppController {

    var $name = 'Localidades';
    var $helpers = array('Html', 'Form', 'Ajax');
    var $components = array('RequestHandler');

    function ajax_select_localidades_form_por_jurisdiccion() {
        $this->layout = 'ajax';
        Configure::write('debug', 0);

        $jur_id = 0;
        if (isset($this->data['Instit']['jurisdiccion_id'])):
            $jur_id = $this->data['Instit']['jurisdiccion_id'];
        endif;

        $localidades = $this->Localidad->con_depto_y_jurisdiccion('all', $jur_id);

        $this->set('todos', ($jur_id != 0) ? false : true);
        $this->set('localidades', $localidades);

        //prevent useless warnings for Ajax
        $this->render('ajax_select_localidades_form_por_jurisdiccion', 'ajax');
    }

    function ajax_select_localidades_form_por_departamento() {
        $this->layout = 'ajax';
        Configure::write('debug', 0);
        $this->Localidad->recursive = 0;

        $this->Localidad->unBindModel(array('hasMany' => array('Instit')));

        $this->Localidad->bindModel(array(
            'belongsTo' => array(
                'Jurisdiccion' => array(
                    'foreignKey' => false,
                    'conditions' => array('Jurisdiccion.id = Departamento.jurisdiccion_id')
                )
                )));



        $localidades = array();
        $depto_id = 0;

        if (isset($this->data['Departamento']['id'])):
            $depto_id = $this->data['Departamento']['id'];
        endif;
        if (isset($this->data['Instit']['departamento_id'])):
            $depto_id = $this->data['Instit']['departamento_id'];
        endif;

        $todos = false;
        if ($depto_id != 0) {
            $localidades = $this->Localidad->find('all', array(
                        'conditions' => array('departamento_id' => $depto_id),
                        'order' => 'Localidad.name ASC'
                    ));
        } else {
            $localidades = $this->Localidad->find('all', array('order' => 'Localidad.name ASC'));
            $todos = true;
        }

        $this->set('todos', $todos);
        $this->set('localidades', $localidades);

        //prevent useless warnings for Ajax
        $this->render('ajax_select_localidades_form_por_departamento', 'ajax');
    }

    function ajax_search_localidades($q = null) {
        $this->autoRender = false;
        $result = array();
        $jur = 0;
        $depto = 0;

        if (!empty($this->params['url']['jur'])) {
            $jur = utf8_decode(strtolower($this->params['url']['jur']));
        }

        if (!empty($this->params['url']['depto'])) {
            $depto = utf8_decode(strtolower($this->params['url']['depto']));
        }

        if (empty($q)) {
            if (!empty($this->params['url']['q'])) {
                $q = utf8_decode(strtolower($this->params['url']['q']));
            } else {
                return utf8_encode("parámetro vacio");
            }
        }

        if ($this->RequestHandler->isAjax()) {
            Configure::write('debug', 0);
        }

        $response = '';

        $localidades = $this->Localidad->find("all", array(
                    'contain' => array(
                        'Departamento' => array('Jurisdiccion')
                    ),
                    'conditions' => array(
                        "(lower(Localidad.name)) SIMILAR TO ?" => convertir_para_busqueda_avanzada($q)),
                    'order' => array('Departamento.id')
                        )
        );
        foreach ($localidades as $item) {
            if (($jur == 0 || $item['Departamento']['jurisdiccion_id'] == $jur) &&
                    ($depto == 0 || $item['Departamento']['id'] == $depto)
            ) {
                array_push($result, array(
                    "localidad_id" => $item['Localidad']['id'],
                    "departamento_id" => $item['Departamento']['id'],
                    "jurisdiccion_id" => $item['Departamento']['Jurisdiccion']['id'],
                    "localidad" => utf8_encode($item['Localidad']['name']),
                    "departamento" => utf8_encode($item['Departamento']['name']),
                    "jurisdiccion" => utf8_encode($item['Departamento']['Jurisdiccion']['name'])
                ));
            }
        }

        if (sizeof($result) == 0) {
            array_push($result, array(
                "localidad_id" => '',
                "type" => "Vacio",
                "localidad" => 'No se encontraron resultados'
            ));
        }

        echo json_encode($result);
    }

    function ajax_search_localidades_y_departamentos($q = null) {
        $this->autoRender = false;
        $result = array();
        $jur = 0;

        if (!empty($this->params['url']['jur'])) {
            $jur = utf8_decode(strtolower($this->params['url']['jur']));
        }

        if (empty($q)) {
            if (!empty($this->params['url']['q'])) {
                $q = utf8_decode(strtolower($this->params['url']['q']));
            } else {
                return utf8_encode("parámetro vacio");
            }
        }

        if ($this->RequestHandler->isAjax()) {
            Configure::write('debug', 0);
        }

        $response = '';

        if ($jur != 0) {
            $conditions = array(
                "lower(Departamento.name) SIMILAR TO ?" => convertir_para_busqueda_avanzada($q),
                "Jurisdiccion.id" => $jur
            );
        } else {
            $conditions = array(
                "lower(Departamento.name) SIMILAR TO ?" => convertir_para_busqueda_avanzada($q)
            );
        }

        $deptos = $this->Localidad->Departamento->find("all", array(
                    'contain' => array(
                        'Jurisdiccion'
                    ),
                    'conditions' => $conditions,
                    'order' => array('Jurisdiccion.id')
                        )
        );

        foreach ($deptos as $item) {

            array_push($result, array(
                "id" => $item['Departamento']['id'],
                "type" => "Departamento",
                "localidad_id" => '0',
                "localidad" => '',
                "departamento" => utf8_encode($item['Departamento']['name']),
                "departamento_id" => $item['Departamento']['id'],
                "jurisdiccion" => utf8_encode($item['Jurisdiccion']['name'])
            ));
        }

        $localidades = $this->Localidad->find("all", array(
                    'contain' => array(
                        'Departamento' => array('Jurisdiccion')
                    ),
                    'conditions' => array(
                        "OR" => array(
                            "lower(Localidad.name) SIMILAR TO ?" => convertir_para_busqueda_avanzada($q),
                            "lower(Departamento.name) SIMILAR TO ?" => convertir_para_busqueda_avanzada($q),
                        ),
                    //  "Jurisdiccion.id" => $jur,
                    ),
                    'order' => array('Departamento.id')
                        )
        );
        foreach ($localidades as $item) {
            if ($jur == 0 || $item['Departamento']['jurisdiccion_id'] == $jur) {
                array_push($result, array(
                    "id" => $item['Localidad']['id'],
                    "type" => "Localidad",
                    "localidad" => utf8_encode($item['Localidad']['name']),
                    "localidad_id" => $item['Localidad']['id'],
                    "departamento" => utf8_encode($item['Departamento']['name']),
                    "departamento_id" => $item['Departamento']['id'],
                    "jurisdiccion" => utf8_encode($item['Departamento']['Jurisdiccion']['name'])
                ));
            }
        }

        if (sizeof($result) == 0) {
            array_push($result, array(
                "id" => '',
                "type" => "Vacio",
                "localidad" => 'No se encontraron resultados'
            ));
        }

        echo json_encode($result);
    }

}

?>