<?php
class TitulosController extends AppController {

    var $name = 'Titulos';
    var $helpers = array('Html', 'Form');
    var $components = array('RequestHandler');

    var $sesNames = array(
            'nombre' => 'Titulo.tituloName',
            'oferta'   => 'Titulo.oferta_id',
            'sector' => 'Titulo.sector_id',
            'subsector' => 'Titulo.subsector_id',
            'jurisdiccion' => 'Titulo.jurisdiccion_id',
            'departamento' => 'Titulo.departamento_id',
            'localidad' => 'Titulo.localidad_id',
            'tituloJurDepLoc' => 'Titulo.tituloJurDepLoc',
            'gestion' => 'Titulo.gestion_id',
            'page' => 'Titulo.page',
        );

    function search($oferta_id = 0, $sector_id = 0) {
        $localidad = "";
        $this->pageTitle = "Buscador de Títulos";
        
         // preparo los GET params que vienen del formulario enviando type GET
        $getParams = $this->params['url'];
        unset($getParams['url']);
        unset($getParams['ext']);
        
        if (!empty($oferta_id)){
            $this->passedArgs['Titulo.oferta_id'] = $oferta_id;
            $this->set('oferta_id', $oferta_id);
        }
        
        if (!empty($sector_id)){
            $this->passedArgs['SectoresTitulo.sector_id'] = $sector_id;
            $this->set('sector_id', $sector_id);
        }
        debug($this->data);
        // Datos para inputs
        $ofertas = $this->Titulo->Oferta->find('list');
        $sectores = $this->Titulo->Sector->find('list',array('order'=>'Sector.name'));

        $subsectores = array();
        $sectAux = 0;
        if(!empty($getParams['sector_id'])) {
                $sectAux = $getParams['sector_id'];
        }
        if (!empty($sector_id)){
            $subsectores = $this->Titulo->Subsector->find('list', array('conditions'=> array(
                                                                    'Subsector.sector_id' => $sector_id)));
        }
        if (empty($subsectores)) {
            $subsectores = $this->Titulo->Subsector->con_sector('list', $sectAux);
        }

        $this->Titulo->Plan->Instit->Jurisdiccion->recursive = -1;
        $this->Titulo->Plan->Instit->Jurisdiccion->order = 'Jurisdiccion.name';
        $jurisdicciones = $this->Titulo->Plan->Instit->Jurisdiccion->find('list');

        $this->Titulo->Plan->Instit->Departamento->recursive = -1;
        
        $jurAux = 0;
        if(!empty($getParams['jurisdiccion_id'])) {
                $jurAux = $getParams['jurisdiccion_id'];
        }
        $departamentos = $this->Titulo->Plan->Instit->Departamento->con_jurisdiccion('list', $jurAux);
        
        //para mostrar en vista los patrones de busqueda seleccionados
        $this->paginate['viewConditions'] = array();
        
        // primero seteo si vino formulario, fue el paginador, o GET que llegaron datos
        $vino_formulario = (!empty($this->data) || (!empty($this->passedArgs)) || !empty($getParams)) ? true : false;

        if ($vino_formulario) {
                        
            if(!empty($getParams['localidad_id'])) {
                $localidad = $this->Titulo->Plan->Instit->Localidad->find("first", 
                        array(
                            'conditions'=> array('Localidad.id'=>$getParams['localidad_id']),
                            'recursive'=>-1));
            }
            
            if( !empty ($getParams['localidad_name']) ) {
                     $localidad['Localidad']['name'] =  $getParams['localidad_name'];
            }
            
            $url_conditions = array();
            $conditions = array();
            
            /*********    */
            if (!empty($this->data['Titulo']['tituloname'])) {
                $tituloname = $this->data['Titulo']['tituloname'];
            }
            elseif (!empty($getParams['tituloname'])) {
                $tituloname = $getParams['tituloname'];
            }
            elseif (!empty($this->passedArgs['Titulo.name'])) {
                $tituloname = $this->passedArgs['Titulo.name'];
            }
            
            if (!empty($this->data['Titulo']['oferta_id'])) {
                $oferta_id = $this->data['Titulo']['oferta_id'];
            }
            elseif (!empty($getParams['oferta_id'])) {
                $oferta_id = $getParams['oferta_id'];
            }
            elseif (!empty($this->passedArgs['Titulo.oferta_id'])) {
                $oferta_id = $this->passedArgs['Titulo.oferta_id'];
            }
            
            if (!empty($this->data['SectoresTitulo']['sector_id'])) {
                $sector_id = $this->data['SectoresTitulo']['sector_id'];
            }
            elseif (!empty($getParams['sector_id'])) {
                $sector_id = $getParams['sector_id'];
            }
            elseif (!empty($this->passedArgs['SectoresTitulo.sector_id'])) {
                $sector_id = $this->passedArgs['SectoresTitulo.sector_id'];
            }
            
            if (!empty($this->data['SectoresTitulo']['subsector_id'])) {
                $subsector_id = $this->data['SectoresTitulo']['subsector_id'];
            }
            elseif (!empty($getParams['subsector_id'])) {
                $subsector_id = $getParams['subsector_id'];
            }
            elseif (!empty($this->passedArgs['SectoresTitulo.subsector_id'])) {
                $subsector_id = $this->passedArgs['SectoresTitulo.subsector_id'];
            }
            
            if (!empty($this->data['Instit']['jurisdiccion_id'])) {
                $jurisdiccion_id = $this->data['Instit']['jurisdiccion_id'];
            }
            elseif (!empty($getParams['jurisdiccion_id'])) {
                $jurisdiccion_id = $getParams['jurisdiccion_id'];
            }
            elseif (!empty($this->passedArgs['Instit.jurisdiccion_id'])) {
                $jurisdiccion_id = $this->passedArgs['Instit.jurisdiccion_id'];
            }
            
            if (!empty($this->data['Instit']['departamento_id'])) {
                $departamento_id = $this->data['Instit']['departamento_id'];
            }
            elseif (!empty($getParams['departamento_id'])) {
                $departamento_id = $getParams['departamento_id'];
            }
            elseif (!empty($this->passedArgs['Instit.departamento_id'])) {
                $departamento_id = $this->passedArgs['Instit.departamento_id'];
            }
            
            if (!empty($this->data['Instit']['localidad_id'])) {
                $localidad_id = $this->data['Instit']['localidad_id'];
            }
            elseif (!empty($getParams['localidad_id'])) {
                $localidad_id = $getParams['localidad_id'];
            }
            elseif (!empty($this->passedArgs['Instit.localidad_id'])) {
                $localidad_id = $this->passedArgs['Instit.localidad_id'];
            }
            
            if (!empty($this->data['Instit']['localidad_name'])) {
                $localidad_name = $this->data['Instit']['localidad_name'];
            }
            elseif (!empty($getParams['localidad_name'])) {
                $localidad_name = $getParams['localidad_name'];
            }
            elseif (!empty($this->passedArgs['Instit.localidad_name'])) {
                $localidad_name = $this->passedArgs['Instit.localidad_name'];
            }
            /*********    */
            
            if(!empty($tituloname)) {
                $conditions['OR'] = array(
                    array('lower(Titulo.name) SIMILAR TO ?' => convertir_para_busqueda_avanzada(utf8_decode($tituloname)) ),
                    array('lower(Plan.nombre) SIMILAR TO ?' => convertir_para_busqueda_avanzada(utf8_decode($tituloname)) ),
                );
                
                $this->data['Titulo']['tituloname'] = $this->passedArgs['Titulo.name'] = $tituloname;
                $this->paginate['viewConditions']['Nombre de título'] = $tituloname;
            }
            if(!empty($oferta_id)) {
                $conditions['Titulo.oferta_id'] = $oferta_id;
                
                $this->data['Titulo']['oferta_id'] = $this->passedArgs['Titulo.oferta_id'] = $oferta_id;
                
                $this->Titulo->Oferta->id = $oferta_id;
                $this->paginate['viewConditions']['Oferta o Nivel'] = $this->Titulo->Oferta->field('name');
            }
            if(!empty($sector_id)) {
                $conditions['SectoresTitulo.sector_id'] = $sector_id;
                
                $this->data['SectoresTitulo']['sector_id'] = $this->passedArgs['SectoresTitulo.sector_id'] = $sector_id;
                
                $this->Titulo->Sector->id = $sector_id;
                $this->paginate['viewConditions']['Sector'] = $this->Titulo->Sector->field('name');
            }
            if(!empty($subsector_id)) {
                $conditions['SectoresTitulo.subsector_id'] = $subsector_id;
                
                $this->data['SectoresTitulo']['subsector_id'] = $this->passedArgs['SectoresTitulo.subsector_id'] = $subsector_id;
                
                $this->Titulo->Subsector->id = $subsector_id;
                $this->paginate['viewConditions']['Subsector'] = $this->Titulo->Subsector->field('name');
            }
            if(!empty($jurisdiccion_id)) {
                $conditions['Instit.jurisdiccion_id'] = $jurisdiccion_id;
                
                $this->data['Instit']['jurisdiccion_id'] = $this->passedArgs['Instit.jurisdiccion_id'] = $jurisdiccion_id;
            
                $this->Titulo->Plan->Instit->Jurisdiccion->id = $jurisdiccion_id;
                $this->paginate['viewConditions']['Jurisdicción'] = $this->Titulo->Plan->Instit->Jurisdiccion->field('name');
            }
            if(!empty($departamento_id)) {
                $conditions['Instit.departamento_id'] = $departamento_id;
                
                $this->data['Instit']['departamento_id'] = $this->passedArgs['Instit.departamento_id'] = $departamento_id;
            
                $this->Titulo->Plan->Instit->Departamento->id = $departamento_id;
                $this->paginate['viewConditions']['Departamento'] = $this->Titulo->Plan->Instit->Departamento->field('name');
            }
            if(!empty($localidad_id)) {
                $conditions['Instit.localidad_id'] = $localidad_id;
                
                $this->data['Instit']['localidad_id'] = $this->passedArgs['Instit.localidad_id'] = $localidad_id;
            
                $this->Titulo->Plan->Instit->Localidad->id = $localidad_id;
                $this->paginate['viewConditions']['Localidad'] = $this->Titulo->Plan->Instit->Localidad->field('name');
            }
            elseif (!empty($localidad_name)) {
                $conditions['lower(Localidad.name) SIMILAR TO ?'] = convertir_para_busqueda_avanzada(utf8_decode($localidad_name));
                
                $this->data['Instit']['localidad_name'] = $this->passedArgs['Instit.localidad_name'] = $localidad_name;
            }
                 
            //datos de paginacion
            $this->paginate['Titulo']['fields'] = array('Titulo.id', 'Titulo.name','Titulo.marco_ref', 'Titulo.oferta_id', 'Titulo.es_bb', 'Oferta.abrev', 'Oferta.name');
            $this->paginate['Titulo']['group'] = $this->paginate['Titulo']['fields'];
            $this->paginate['Titulo']['conditions'] = $conditions;
            $this->paginate['Titulo']['order'] = array('Titulo.name' => 'ASC', 'Titulo.oferta_id' => 'ASC');
            $this->paginate['Titulo']['recursive'] = 3;
            $titulos = $this->paginate('Titulo');

            // si contiene carreras prioritarias
            $contieneBb = $this->Titulo->contieneBb($titulos);

            $this->set('titulos', $titulos);
            $this->set('url_conditions', $this->passedArgs);
            //devuelve un array para mostrar los criterios de busqueda
            $this->set('conditions', $this->paginate['viewConditions']);
        }
        
        
        //$this->Titulo->recursive = 0;
        //$this->set('titulos', $this->paginate());
        $this->set('vino_formulario', $vino_formulario);
        $this->set(compact('ofertas', 'sectores', 'subsectores', 'jurisdicciones', 
                'departamentos', 'localidad', 'bySession','bloquearOferta', 'contieneBb'));
    }


    function list_por_oferta_id($oferta_id = 0) {
        $conditions = array();
        if (!empty($oferta_id)) {
            $conditions = array('Titulo.oferta_id'=>$oferta_id);
        }

        if (!empty($this->passedArgs['Plan.oferta_id'])) {
            $conditions = array('Titulo.oferta_id'=>$this->passedArgs['Plan.oferta_id']);
        }

        if (!empty($this->data['Plan']['oferta_id'])) {
            $conditions = array('Titulo.oferta_id'=>$this->data['Plan']['oferta_id']);
        }

        if ($this->RequestHandler->isAjax()) {
            $this->layout = false;
        }
        $this->set('titulos',$this->Titulo->find('list', array('conditions'=>$conditions)));
    }

    function view($id = null) {
        $this->pageTitle = "Títulos";

        if (!$id) {
            $this->flash(__('Invalid Titulo', true), array('action'=>'search'));
        }

        $this->Titulo->recursive = -1;
        $conditions = '';
        $conditions['conditions'] = array('Titulo.id' => $id);
        $conditions['contain'] = array(
                            'Oferta',
                            'SectoresTitulo' => array(
                                'Sector', 
                                'Subsector'),
        );
        $titulo = $this->Titulo->find('first', $conditions);

        // Planes del Titulo
        $this->Titulo->Plan->recursive = 0;
        $this->paginate = array(
                'limit'    => 20,
                'page'    => 1,
                'conditions' => array('Plan.titulo_id' => $id),
                'contain' => array('Instit' => array('Tipoinstit', 'Jurisdiccion(name)')),
                'order'    => array('Plan.nombre' => 'asc')
        );

        $this->set(compact('titulo','planes', 'jurisdicciones'));

        if ( $this->RequestHandler->isAjax() ) {
            Configure::write ( 'debug', 0 );
            $this->layout = false;
            $this->render('view_popup');
        }
    }


    function view_titulo_plan($id, $plan_id) {
        if (!$id) {
            $this->flash(__('Invalid Titulo', true), array('action'=>'search'));
        }

        // info del Plan (incluido ult. ciclo)
        $plan = $this->Titulo->Plan->find('first', array(
                'recursive' => 3,
                'conditions' => array('Plan.id' => $plan_id),
                'contain' => array('Instit' => array('Tipoinstit', 'Jurisdiccion(name)'),
                                    'Oferta',
                                    'Titulo' => array('SectoresTitulo' => array('Sector', 'Subsector'))),
        ));

        $this->set('plan', $plan[0]);

        if ( $this->RequestHandler->isAjax() ) {
            Configure::write ( 'debug', 1 );
            $this->layout = false;
            $this->render('view_popup');
        }
    }



    function ajax_search($q = null) {
        $this->autoRender = false;
        $result = array();
        $jur= 0;

        if (!empty($this->params['url']['oferta_id'])) {
            $oferta_id = utf8_decode(strtolower($this->params['url']['oferta_id']));
        }
        if (!empty($this->params['url']['sector_id'])) {
            $sector_id = utf8_decode(strtolower($this->params['url']['sector_id']));
        }
        if (!empty($this->params['url']['subsector_id'])) {
            $subsector_id = utf8_decode(strtolower($this->params['url']['subsector_id']));
        }

        if(empty($q)) {
            if (!empty($this->params['url']['q'])) {
                $q = utf8_decode(strtolower($this->params['url']['q']));
            } else {
                return utf8_encode("parámetro vacio");
            }
        }

        if ( $this->RequestHandler->isAjax() ) {
            Configure::write ( 'debug', 0 );
        }

        $response = '';

        $conditions = array();
        $subconditions = array();

        $conditions["lower(Titulo.name) SIMILAR TO ?"] = convertir_para_busqueda_avanzada($q);
        $subconditions = array('Titulo.id = SectoresTitulos.titulo_id');

        if(@$oferta_id > 0) {
            $conditions["Titulo.oferta_id"] = $oferta_id;
        }

        if(@$sector_id > 0) {
            $subconditions["SectoresTitulos.sector_id ="] = $sector_id;
        }

        if(@$subsector_id > 0) {
            $subconditions["SectoresTitulos.subsector_id ="] = $subsector_id;
        }

        $this->Titulo->recursive = -1;
        $titulos = $this->Titulo->find("all", array(
                'fields' =>array('DISTINCT Titulo.id','Titulo.name'),
                'conditions'=> $conditions,
                'order' => array('Titulo.name'),
                'joins'=>array(
                        array('table' => 'sectores_titulos',
                                'alias' => 'SectoresTitulos',
                                'type' => 'INNER',
                                'conditions' => $subconditions
                        )
                )
                )
        );


        foreach ($titulos as $item) {
            array_push($result, array(
                    "id" => $item['Titulo']['id'],
                    "type" => "Titulo",
                    "name" => utf8_encode($item['Titulo']['name'])
            ));
        }

        if(sizeof($result) == 0) {
            array_push($result, array(
                    "id" => '',
                    "type" => "Vacio",
                    "name" => 'No se encontraron resultados'
            ));
        }

        echo json_encode($result);
    }


    /**
     * Esta accion es el procesamiento del formulario de busqueda
     * maneja las condiciones de la busqueda y el paginador
     *
     */
    function filtros_search_results($oferta_id = 0) {
        Configure::write('debug', 0);

        $array_condiciones = array();
        $array_condiciones_ubicacion = array();
        $url_conditions = array();
        $filtros = array();

        // si se realizó una búsqueda se limpia la session
        foreach ($this->sesNames as $sesName) {
            if ($sesName != $this->sesNames['page']) {
                $this->Session->write($sesName, '');
            }
        }
        if (!empty($this->data)) {
            if (!empty($this->data['Titulo']['busquedanueva']) && !$this->data['Titulo']['bysession']) {
                $this->Session->write($this->sesNames['page'], '');
            }

            if(!empty($this->data['Titulo']['tituloName'])) {
                $this->passedArgs['tituloName'] = $this->data['Titulo']['tituloName'];
                $this->Session->write($this->sesNames['nombre'], $this->data['Titulo']['tituloName']);
            }
            if(!empty($this->data['Titulo']['oferta_id'])) {
                $this->passedArgs['ofertaId'] = $this->data['Titulo']['oferta_id'];
                $this->Session->write($this->sesNames['oferta'], $this->data['Titulo']['oferta_id']);
            }
            if(!empty($this->data['Titulo']['sector_id'])) {
                $this->passedArgs['sectorId'] = $this->data['Titulo']['sector_id'];
                $this->Session->write($this->sesNames['sector'], $this->data['Titulo']['sector_id']);
            }
            if(!empty($this->data['Titulo']['subsector_id'])) {
                $this->passedArgs['subsectorId'] = $this->data['Titulo']['subsector_id'];
                $this->Session->write($this->sesNames['subsector'], $this->data['Titulo']['subsector_id']);
            }
            if(!empty($this->data['Instit']['jurisdiccion_id'])) {
                $this->passedArgs['jurisdiccionId'] = $this->data['Instit']['jurisdiccion_id'];
                $this->Session->write($this->sesNames['jurisdiccion'], $this->data['Instit']['jurisdiccion_id']);
            }
            if(!empty($this->data['Instit']['departamento_id'])) {
                $this->passedArgs['departamentoId'] = $this->data['Instit']['departamento_id'];
                $this->Session->write($this->sesNames['departamento'], $this->data['Instit']['departamento_id']);
                $this->Session->write($this->sesNames['tituloJurDepLoc'], $this->data['Instit']['jur_dep_loc']);
            }
            if(!empty($this->data['Instit']['localidad_id'])) {
                $this->passedArgs['localidadId'] = $this->data['Instit']['localidad_id'];
                $this->Session->write($this->sesNames['localidad'], $this->data['Instit']['localidad_id']);
                $this->Session->write($this->sesNames['tituloJurDepLoc'], $this->data['Instit']['jur_dep_loc']);
            }
            if(!empty($this->data['Instit']['gestion_id'])) {
                $this->passedArgs['gestionId'] = $this->data['Instit']['gestion_id'];
                $this->Session->write($this->sesNames['gestion'], $this->data['Instit']['gestion_id']);
            }
            if(!empty($this->data['Instit']['nombre'])) {
                $this->passedArgs['institName'] = utf8_decode($this->data['Instit']['nombre']);
                $this->Session->write($this->sesNames['institName'], utf8_decode($this->data['Instit']['nombre']));
            }
        }

        if(!empty($this->passedArgs['tituloName'])) {
            $q = utf8_decode(strtolower($this->passedArgs['tituloName']));
            $array_condiciones['conditions']['lower(Titulo.name) SIMILAR TO ?'] = convertir_texto_plano($q);
        }
        if(!empty($this->passedArgs['ofertaId'])) {
            $q = ($this->passedArgs['ofertaId']);
            $array_condiciones['conditions']['Titulo.oferta_id'] = $q;
        }
        if(!empty($this->passedArgs['sectorId']) || !empty($this->passedArgs['subsectorId']) ) {

            if(!empty($this->passedArgs['sectorId'])){
                $q = $this->passedArgs['sectorId'];
                $array_condiciones['conditions']['SectoresTitulo.sector_id'] = $q;
            }
            if(!empty($this->passedArgs['subsectorId'])){
                $q = $this->passedArgs['subsectorId'];
                $array_condiciones['conditions']['SectoresTitulo.subsector_id'] = $q;
            }
        }
        if(!empty($this->passedArgs['jurisdiccionId'])) {
            $q = ($this->passedArgs['jurisdiccionId']);
            $array_condiciones['conditions']['Instit.jurisdiccion_id'] = $q;
            $array_condiciones_ubicacion['Instit.jurisdiccion_id'] = $q;
        }
        if(!empty($this->passedArgs['departamentoId'])) {
            $q = ($this->passedArgs['departamentoId']);
            $array_condiciones['conditions']['Instit.departamento_id'] = $q;
            $array_condiciones_ubicacion['Instit.departamento_id'] = $q;
        }
        if(!empty($this->passedArgs['localidadId'])) {
            $q = ($this->passedArgs['localidadId']);
            $array_condiciones['conditions']['Instit.localidad_id'] = $q;
            $array_condiciones_ubicacion['Instit.localidad_id'] = $q;
        }
        if(!empty($this->passedArgs['gestionId'])) {
            $q = ($this->passedArgs['gestionId']);
            $array_condiciones['conditions']['Instit.gestion_id'] = $q;
            $array_condiciones_ubicacion['Instit.gestion_id'] = $q;
        }
        if(!empty($this->passedArgs['institName'])){
            $q = ($this->passedArgs['institName']);
            $array_condiciones['conditions']["lower(Instit.nombre) SIMILAR TO ?"] = convertir_para_busqueda_avanzada($q);
            $array_condiciones_ubicacion['conditions']["lower(Instit.nombre) SIMILAR TO ?"] = convertir_para_busqueda_avanzada($q);
        }

        if (!empty($this->passedArgs['page'])) {
            //$this->paginate['page'] = $this->passedArgs['page'];
            $this->Session->write($this->sesNames['page'], $this->passedArgs['page']);
        }
        elseif ($this->Session->read($this->sesNames['page'])) {
            $array_condiciones['page'] = $this->Session->read($this->sesNames['page']);
        }

        $array_condiciones['fields'] = array('Titulo.id', 'Titulo.name','Titulo.marco_ref', 'Titulo.oferta_id', 'Titulo.es_bb', 'Oferta.abrev');
        
        $array_condiciones['group'] = $array_condiciones['fields'];
        $array_condiciones['order'] = array('Titulo.name ASC, Titulo.oferta_id ASC');
        $array_condiciones['recursive'] = 3;   // find completo

        $this->paginate = $array_condiciones;
        $titulos = $this->paginate();

        // si contiene carreras prioritarias
        $contieneBb = $this->Titulo->contieneBb($titulos);
        
        //FILTROS
        $array_condiciones['recursive'] = -1;
        $array_condiciones['contain'] = null;
        $array_condiciones['order'] = null;
        $array_condiciones['joins'] = array(
            array(
                'table' => 'planes',
                'type' => 'LEFT',
                'alias' => 'Plan',
                'conditions' => array('Titulo.id = Plan.titulo_id'),
            ),
            array(
                'table' => 'instits',
                'type' => 'LEFT',
                'alias' => 'Instit',
                'conditions' => array('Instit.id = Plan.instit_id'),
            ),
            array(
                'table' => 'gestiones',
                'type' => 'LEFT',
                'alias' => 'Gestion',
                'conditions' => array('Gestion.id = Instit.gestion_id'),
            ),
            array(
                'table' => 'jurisdicciones',
                'type' => 'LEFT',
                'alias' => 'Jurisdiccion',
                'conditions' => array('Jurisdiccion.id = Instit.jurisdiccion_id'),
            ),
            array(
                'table' => 'departamentos',
                'type' => 'LEFT',
                'alias' => 'Departamento',
                'conditions' => array('Departamento.id = Instit.departamento_id'),
            ),
            array(
                'table' => 'localidades',
                'type' => 'LEFT',
                'alias' => 'Localidad',
                'conditions' => array('Localidad.id = Instit.localidad_id'),
            ),
            array(
                'table' => 'sectores_titulos',
                'type' => 'LEFT',
                'alias' => 'SectoresTitulo',
                'conditions' => array('SectoresTitulo.titulo_id = Titulo.id'),
            ),
            array(
                'table' => 'sectores',
                'type' => 'LEFT',
                'alias' => 'Sector',
                'conditions' => array('SectoresTitulo.sector_id = Sector.id'),
            ),
            array(
                'table' => 'subsectores',
                'type' => 'LEFT',
                'alias' => 'Subsector',
                'conditions' => array('SectoresTitulo.subsector_id = Subsector.id'),
            ),
            array(
                'table' => 'ofertas',
                'type' => 'LEFT',
                'alias' => 'Oferta',
                'conditions' => array('Titulo.oferta_id = Oferta.id'),
            )
        );

        $array_condiciones['fields'] = array('Oferta.id', 'Oferta.name');
        $array_condiciones['group'] = array('Oferta.id', 'Oferta.name');
        $array_condiciones['order'] = array('Oferta.name');
        $filtros['Oferta'] = $this->Titulo->find('all',$array_condiciones);

        $array_condiciones['fields'] = array('Sector.id', 'Sector.name');
        $array_condiciones['group'] = array('Sector.id', 'Sector.name');
        $array_condiciones['order'] = array('Sector.name');
        $filtros['Sector'] = $this->Titulo->find('all',$array_condiciones);

        $array_condiciones['fields'] = array('Jurisdiccion.id', 'Jurisdiccion.name');
        $array_condiciones['group'] = array('Jurisdiccion.id', 'Jurisdiccion.name');
        $array_condiciones['order'] = array('Jurisdiccion.name');
        $filtros['Jurisdiccion'] = $this->Titulo->find('all',$array_condiciones);

        $array_condiciones['fields'] = array('Departamento.id', 'Departamento.name');
        $array_condiciones['group'] = array('Departamento.id', 'Departamento.name');
        $array_condiciones['order'] = array('Departamento.name');
        $filtros['Departamento'] = $this->Titulo->find('all',$array_condiciones);

        $array_condiciones['fields'] = array('Localidad.id', 'Localidad.name');
        $array_condiciones['group'] = array('Localidad.id', 'Localidad.name');
        $array_condiciones['order'] = array('Localidad.name');
        $filtros['Localidad'] = $this->Titulo->find('all',$array_condiciones);

        $array_condiciones['fields'] = array('Gestion.id', 'Gestion.name');
        $array_condiciones['group'] = array('Gestion.id', 'Gestion.name');
        $array_condiciones['order'] = array('Gestion.name');
        $filtros['Gestion'] = $this->Titulo->find('all',$array_condiciones);

        if(empty($this->passedArgs['jurisdiccionId']) && (count($filtros['Jurisdiccion']) > 1)) {
            $filtros['Departamento'] = null;
        }

        if((empty($this->passedArgs['departamentoId']) && (count($filtros['Departamento']) > 1 || count($filtros['Jurisdiccion']) > 1 ))) {
            $filtros['Localidad'] = null;
        }

        $filtros['TituloName'] = empty($this->passedArgs['tituloName'])?'':$this->passedArgs['tituloName'];
        $filtros['InstitName'] = empty($this->passedArgs['institName'])?'':$this->passedArgs['institName'];
        
        $this->set('titulos', $titulos);
        $this->set('filtros', $filtros);
        $this->set('contieneBb', $contieneBb);
    }




    function guiaDelEstudiante() {
        $this->pageTitle = "Guía del Estudiante";

        $bySession = false;
        // si existe búsqueda en Session, realiza búsqueda
        /*if ($this->Session->read($this->sesNames['nombre'])) {
            $this->data['Titulo']['tituloName'] = $this->passedArgs['tituloName'] = $this->Session->read($this->sesNames['nombre']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['oferta'])) {
            $this->data['Titulo']['oferta_id'] = $this->passedArgs['ofertaId'] = $this->Session->read($this->sesNames['oferta']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['sector'])) {
            $this->data['Titulo']['sector_id'] = $this->passedArgs['sectorId'] = $this->Session->read($this->sesNames['sector']);
            $bySession = true;

            $subsectores = $this->Titulo->Subsector->con_sector('list', $this->Session->read($this->sesNames['sector']));
        }
        if ($this->Session->read($this->sesNames['subsector'])) {
            $this->data['Titulo']['subsector_id'] = $this->passedArgs['subsectorId'] = $this->Session->read($this->sesNames['subsector']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['jurisdiccion'])) {
            $this->data['Instit']['jurisdiccion_id'] = $this->passedArgs['jurisdiccionId'] = $this->Session->read($this->sesNames['jurisdiccion']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['departamento'])) {
            $this->data['Instit']['departamento_id'] = $this->passedArgs['departamentoId'] = $this->Session->read($this->sesNames['departamento']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['localidad'])) {
            $this->data['Instit']['localidad_id'] = $this->passedArgs['localidadId'] = $this->Session->read($this->sesNames['localidad']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['tituloJurDepLoc'])) {
            $this->data['Instit']['jur_dep_loc'] = $this->passedArgs['tituloJurDepLoc'] = $this->Session->read($this->sesNames['tituloJurDepLoc']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['gestion'])) {
            $this->data['Instit']['gestion_id'] = $this->passedArgs['gestionId'] = $this->Session->read($this->sesNames['gestion']);
            $bySession = true;
        }
        if ($this->Session->read($this->sesNames['page'])) {
            $bySession = true;
        }*/

        $this->set('bySession', $bySession);
        $this->set('sectores', $this->Titulo->Sector->find('list'));
        $this->set('ofertas', $this->Titulo->Oferta->find('list'));
        $this->set('gestiones', $this->Titulo->Plan->Instit->Gestion->find('list'));
        $this->set('jurisdicciones', $this->Titulo->Plan->Instit->Jurisdiccion->find('list', array('order' => 'Jurisdiccion.name')));
    }

}
?>
