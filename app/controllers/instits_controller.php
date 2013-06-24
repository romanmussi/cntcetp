<?php
class InstitsController extends AppController {

    var $name = 'Instits';
    var $helpers = array('Html','Form','Ajax','Cache');
    //var $paginate = array('order'=>array('Instit.cue' => 'asc'),'limit'=>'10');
    var $components = array('Buscable');

    var $sesNames = array(
            'jurisdiccion' => 'Instit.jurisdiccion_id',
            'departamento' => 'Instit.departamento_id',
            'localidad' => 'Instit.localidad_id',
            'jurDepLoc' => 'Instit.JurDepLoc',
            'direccion' => 'Instit.direccion',
            'busqueda_libre' => 'Instit.busqueda_libre',
            'page' => 'Instit.page',
        );

    function index() {
        $this->Instit->recursive = 0;
        $this->set('instits', $this->paginate());
    }

    function view($id = null) {
        $this->pageTitle = "Instituciones";

        if (!$id) {
            $this->Session->setFlash(__('Institución Inválida.', true));
            $this->redirect(array('action'=>'index'));
        }

        $this->Instit->contain(array(   'Localidad', 'Departamento', 'Tipoinstit', 'Jurisdiccion',
                                        'Dependencia', 'Gestion', 'Orientacion', 'Claseinstit', 'EtpEstado',
                                     ));
        
        $instit = $this->Instit->find("first", $id);
        
        $planes =  $this->Instit->Plan->find('all', array(
           'contain' => array(
               'Titulo.Oferta',
               'Oferta',
           ),
           'order' => array( 'Oferta.orden','Plan.nombre' ),
           'conditions' => array(
                'Plan.instit_id' => $id,
            )
        ));

        $programa_de_etp = false;
        // si la institucion es con programa de ETP
        if($instit['EtpEstado']['id']== 1) {
            $programa_de_etp = true;
        }
        
        if (!empty($this->params['referer'])) {
            // Título seleccionado: busca info del titulo y si corresponde a esta instit
            $referer = $this->Instit->Plan->find('first', array(
                'conditions' => array(
                    'Plan.titulo_id' => $this->params['referer'],
                    'Plan.instit_id' => $id,
                    )
            ));
            
            if (!empty($referer)) {
                $this->set('referer', $referer);
            }
        }
        
        $this->set('con_programa_de_etp', $programa_de_etp);
        $this->set('relacion_etp', $instit['EtpEstado']['name']);
        $this->set('instit', $instit);
        $this->set('planes', $planes);
    }
    
    function simpleSearch() {

       if (!empty($this->data)) {
            $this->redirect(array('action' => 'view', $this->data['Instit']['instit_id']));
       }

    }


    function search() {
        
        // preparo los GET params que vienen del formulario enviando type GET
        $getParams = $this->params['url'];
        $localidad = "";
        unset($getParams['url']);
        unset($getParams['ext']);
        
        //para mostrar en vista los patrones de busqueda seleccionados
        $this->paginate['viewConditions'] = array();

        // primero seteo si vino formulario o fue el paginador quien llego a este action"
        $vino_formulario = (!empty($this->data) || (!empty($this->passedArgs)) || !empty($getParams)) ? true : false;

        if ($vino_formulario){

                /*******************************************************************
                 *    INICIALIZACION DE FILTROS
                 *
                 *   Los filtros pueden provenir del formulario o de las variables de paginacion.
                 *
                 * 	Para el primer caso se esta leyendo informacion de $this->data
                 * 	en el segundo caso de this->passedArgs
                 *
                 *
                 */

                /*
                 *          BUSQUEDA LIBRE
                 */
                if(!empty($this->data['Instit']['busqueda_libre'])) {
                    $this->passedArgs = array('busqueda_libre' => $this->data['Instit']['busqueda_libre']);
                }
                if( !empty($this->params['url']['busqueda_libre']) ) {
                     $this->passedArgs = array('busqueda_libre' => $this->params['url']['busqueda_libre']);
                }
                if(!empty($this->passedArgs['busqueda_libre'])) {
                    
                    $q = strtolower($this->passedArgs['busqueda_libre']);
                  
                    if(is_numeric($q)){
                        $q = (int) $q;
                        $this->paginate['Instit']['conditions'] = array("to_char(cue*100+anexo, 'FM999999999FM') SIMILAR TO ?" => "%". $q ."%");
                    }
                    else{
                        //debug(convertir_para_busqueda_avanzada($q)); die();
                        $this->paginate['Instit']['conditions'] = array("((lower(Tipoinstit.name)) || ' n ' || (lower(Instit.nroinstit)) || ' ' || lower(Instit.nombre)) SIMILAR TO ?" => convertir_para_busqueda_avanzada($q));
                    }
                    
                    $this->data['Instit']['busqueda_libre'] = $q;

                    $this->paginate['viewConditions']['CUE o Nombre '] = $this->passedArgs['busqueda_libre'];
                }
                
                if(!empty($getParams['localidad_id'])) {
                    $localidad = $this->Instit->Localidad->find("first", 
                            array(
                                'conditions'=> array('Localidad.id'=>$getParams['localidad_id']),
                                'recursive'=>-1));
                }
                
                //////////////// Automagiccccs filter
                 //     Jurisdiccion
                 $ops[] = array(
                    'field' => 'jurisdiccion_id',
                    'friendlyName' => 'Jurisdicción');

                 //      Departamento
                 $ops[] = array(
                    'field' => 'departamento_id',
                    'friendlyName' => 'Departamento');

                 //      Localidad
                 
                 $ops[] = array(
                    'field' => 'localidad_id',
                    'friendlyName' => 'Localidad');
                 
                 //      Localidad
                 $ops[] = array(
                    'field' => 'direccion',
                    'friendlyName' => 'Domicilio');

                 $this->Buscable->aplicarCriteriosDeBusqueda($ops, true);  

                /*********************************************************************/
                /*          FIN -*-CONDITIONS-*- de busqueda                         */
                /*********************************************************************/

                $this->Instit->recursive = 1;//para alivianar la carga del server
                $pagin = $this->paginate('Instit');

                $this->set('instits', $pagin);
                $this->set('url_conditions', $this->passedArgs);      
                $this->set('conditions', $this->paginate['viewConditions']);
            }
            
            $this->set('localidad', $localidad);
            $this->set('vino_formulario', $vino_formulario);
            $this->set('jurisdicciones', $this->Instit->Jurisdiccion->find('list'));
            
            $jurAux = 0;
            if(!empty($this->data['Instit']['jurisdiccion_id'])) {
                    $jurAux = $this->data['Instit']['jurisdiccion_id'];
            }
            $this->set('departamentos', $this->Instit->Departamento->con_jurisdiccion('list', $jurAux));
    }
    
    
    function getDatosJurisdiccionParaMapa($oferta_id, $jurisdiccion_id) {
        if (!$oferta_id || !$jurisdiccion_id) {
            return false;
        }
        
        $total = $estatales = $matriculados = 0;

        // cantidad de instits en esa jurisdiccion con al menos una de esa oferta
        $data = $this->Instit->query("select count(*) from (select i.id from instits i 
                                inner join planes p on p.instit_id = i.id
                                where i.jurisdiccion_id = ".$jurisdiccion_id." and
                                p.oferta_id = ".$oferta_id."
                                group by i.id) as instits");

        if (!empty($data[0][0])) {
            $total = $data[0][0]['count'];
        }
        $this->set('total', $total);
        
        // cantidad de estatales con las mismas condiciones
        $data = $this->Instit->query("select count(*) from (select i.id from instits i 
                                inner join planes p on p.instit_id = i.id
                                where i.jurisdiccion_id = ".$jurisdiccion_id." and
                                p.oferta_id = ".$oferta_id." and i.gestion_id = 1
                                group by i.id) as instits");

        if (!empty($data[0][0])) {
            $estatales = $data[0][0]['count'];
        }
        $this->set('estatales', $estatales);
        
        $promedio = 0;
        if ($total > 0) {
            $promedio = round($estatales * 100 / $total);
        }
        $this->set('promedio', $promedio);
        
        // matriculados
        $this->Instit->Jurisdiccion->bindModel(array('hasMany' => array('Matriculado')));
        $data = $this->Instit->Jurisdiccion->Matriculado->find('first', array(
                                    'fields' => array('Matriculado.cantidad'),
                                    'conditions' => array('Matriculado.oferta_id' => $oferta_id,
                                                          'Matriculado.jurisdiccion_id' => $jurisdiccion_id)
        ));
        
        if (!empty($data)) {
            $matriculados = number_format($data['Matriculado']['cantidad'], 0, ',', '.');
        }
        $this->set('matriculados', $matriculados);
        

        if ( $this->RequestHandler->isAjax() ) {
            Configure::write ( 'debug', 0 );
            $this->layout = false;
            $this->render('infomapa_popup');
        }
    }
    
    function search_results() {
        if ( $this->RequestHandler->isAjax() ) {
          Configure::write ( 'debug', 0 );
        }
        //para mostrar en vista los patrones de busqueda seleccionados
        $this->paginate['viewConditions'] = array();

        // primero seteo si vino formulario o fue el paginador quien llego a este action"
        $vino_formulario = (!empty($this->data)) ? true : false;
        
        /*******************************************************************
         *    INICIALIZACION DE FILTROS
         *
         *   Los filtros pueden provenir del formulario o de las variables de paginacion.
         *
         *      Para el primer caso se esta leyendo informacion de $this->data
         *      en el segundo caso de this->passedArgs
         *
         *
         */

        /*
         *          BUSQUEDA LIBRE
         */

        if(!empty($this->data['Instit']['busqueda_libre'])) {
            $this->passedArgs = array('busqueda_libre' => $this->data['Instit']['busqueda_libre']);
        }
        if(!empty($this->passedArgs['busqueda_libre'])) {
            $q = utf8_decode(strtolower($this->passedArgs['busqueda_libre']));
            
            if(is_numeric($q)){
                $q = (int) $q;
                $this->paginate['Instit']['conditions'] = array("to_char(cue*100+anexo, 'FM999999999FM') SIMILAR TO ?" => "%". $q ."%");
            }
            else{
                //debug(convertir_para_busqueda_avanzada($q)); die();
                $this->paginate['Instit']['conditions'] = array("(to_ascii(lower(Tipoinstit.name)) || ' n ' || to_ascii(lower(Instit.nroinstit)) || ' ' || lower(Instit.nombre)) SIMILAR TO ?" => convertir_para_busqueda_avanzada($q));
            }

            $this->paginate['viewConditions']['CUE o Nombre '] = utf8_decode($this->passedArgs['busqueda_libre']);

            $this->Session->write($this->sesNames['busqueda_libre'], $this->data['Instit']['busqueda_libre']);
        }

        /*
         *          CUE
         */
        if(!empty($this->data['Instit']['cue'])) {
            $is_cue_valido = $this->Instit->isCUEValid($this->data['Instit']['cue']);
            if($is_cue_valido < 1) {
                switch ($is_cue_valido) {
                    case -1:
                        $mensaje = "<H1>El CUE: '".$this->data['Instit']['cue']."' no es válido.</H1> Ingrese un valor <b>numúrico</b> de al menos <b>3 dígitos</b>.";
                        $this->Session->setFlash($mensaje,'default',array('class' => 'flash-warning'));
                        break;
                }
            }
            // con esto hago que no se busque con un cero adelante
            $this->data['Instit']['cue'] = (int)$this->data['Instit']['cue'];
            $this->passedArgs = array('cue' => $this->data['Instit']['cue']);
        }

        if(!empty($this->passedArgs['cue'])) {
            // set the conditions
            $arr_cond1 = array('CAST(((Instit.cue*100)+Instit.anexo) as character(60)) SIMILAR TO ?' => '%'.$this->passedArgs['cue'].'%');
            $this->paginate['Instit']['conditions'] = $arr_cond1;

            // set the Search data, so the form remembers the option
            $this->paginate['viewConditions']['CUE'] = $this->passedArgs['cue'];
        }
        

        /**
         *          ACTIVO
         */
        if(isset($this->data['Instit']['activo'])) {
            switch ((int)$this->data['Instit']['activo']):
                case -1: break; // es el valor vacio. O sea, buscar por todos
                case 0: // inactivas
                case 1: //buscar activas
                    $this->passedArgs['activo'] = $this->data['Instit']['activo'];
                endswitch;
        }
        if(isset($this->passedArgs['activo'])) {
            switch ((int)$this->passedArgs['activo']):
                case -1: $basura = 1;
                    break; // es el valor empty. O sea, buscar por todos
                case 0: //inactivas
                case 1: //activas
                    $this->paginate['Instit']['conditions']['Instit.activo'] = $this->passedArgs['activo'];
                    $aux = $this->passedArgs['activo']? 'Si':'No';
                    $this->paginate['viewConditions']['Ingresada al RFIETP'] = $aux;
                    break;
                endswitch;
        }

        /**
         *      NOMBRE COMPLETO
         */
        if(!empty($this->data['Instit']['nombre_completo'])) {
             $this->passedArgs['nombre_completo'] = utf8_encode($this->data['Instit']['nombre_completo']);
        }
        if(!empty($this->passedArgs['nombre_completo'])) {
            $this->paginate['Instit']['conditions'][
                            "to_ascii(lower(Tipoinstit.name))||' n '||".
                            "to_ascii(lower(Instit.nroinstit))||' '||".
                            "to_ascii(lower(Instit.nombre)) SIMILAR TO ?"] = array(convertir_para_busqueda_avanzada(utf8_decode($this->passedArgs['nombre_completo'])));

            $this->paginate['viewConditions']['Tipo, Número o Nombre '] = utf8_decode($this->passedArgs['nombre_completo']);
        }

        if(!empty($this->data['Titulo']['que'])) {
            $this->paginate['Instit']['conditions']['(lower(Tipoinstit.name) || lower(Titulo.name) || lower(Plan.name) || lower(Sector.name) || lower(Subsector.name)) SIMILAR TO ?'] = convertir_para_busqueda_avanzada(utf8_decode($this->data['Titulo']['que']));
        }
        if(!empty($this->data['Titulo']['donde'])) {
            $this->paginate['Instit']['conditions']['(lower(Jurisdiccion.name) || lower(Departamento.name) || lower(Localidad.name) || lower(Instit.name)) SIMILAR TO ?'] = convertir_para_busqueda_avanzada(utf8_decode($this->data['Titulo']['donde']));
        }


        /*
        para el campo de departamento/localidad
        */
        if (!empty($this->data['Instit']['jur_dep_loc'])) {
            if (!empty($this->data['Instit']['departamento_id'])) {
                $dto = $this->Instit->Departamento->findById($this->data['Instit']['departamento_id']);
                $this->data['Instit']['jur_dep_loc'] = utf8_decode($this->data['Instit']['jur_dep_loc']);
                $nombre = $dto["Departamento"]["name"] . " (" . $dto["Jurisdiccion"]["name"] . ")";
                if ($nombre != $this->data['Instit']['jur_dep_loc']) {
                    unset($this->data['Instit']['departamento_id']);
                    $q = $this->data['Instit']['jur_dep_loc'];
                    $this->paginate['Instit']['conditions']["to_ascii(lower(Localidad.name) || lower(Departamento.name) || lower(Jurisdiccion.name)) SIMILAR TO ?"] = convertir_para_busqueda_avanzada($q);
                }

                $this->Session->write($this->sesNames['departamento'], $this->data['Instit']['departamento_id']);
            }
            elseif (!empty($this->data['Instit']['localidad_id'])) {
                $loc = $this->Instit->Localidad->find("first",
                            array("conditions" => array("Localidad.id"=>$this->data['Instit']['localidad_id']),
                                  "contain"=>array("Departamento"=>array("Jurisdiccion"))));
                $nombre = $loc["Localidad"]["name"] .", " . $loc["Departamento"]["name"] . " (" . $loc["Departamento"]["Jurisdiccion"]["name"] . ")";
                $this->data['Instit']['jur_dep_loc'] = utf8_decode($this->data['Instit']['jur_dep_loc']);
                if ($nombre != $this->data['Instit']['jur_dep_loc']) {
                    unset($this->data['Instit']['localidad_id']);
                    $q = $this->data['Instit']['jur_dep_loc'];
                    $this->paginate['conditions']["to_ascii(lower(Localidad.name) || lower(Departamento.name) || lower(Jurisdiccion.name)) SIMILAR TO ?"] = convertir_para_busqueda_avanzada($q);
                }

                $this->Session->write($this->sesNames['localidad'], $this->data['Instit']['localidad_id']);
            }
            
            $q = $this->data['Instit']['jur_dep_loc'];
            $this->paginate['conditions']["to_ascii(lower(Localidad.name) || lower(Departamento.name) || lower(Jurisdiccion.name)) SIMILAR TO ?"] = convertir_para_busqueda_avanzada($q);

            $this->Session->write($this->sesNames['jurDepLoc'], $this->data['Instit']['jur_dep_loc']);
        }

        if (!empty($this->data['Instit']['jurisdiccion_id'])) {
            $this->Session->write($this->sesNames['jurisdiccion'], $this->data['Instit']['jurisdiccion_id']);
        }
        if (!empty($this->data['Instit']['direccion'])) {
            $this->Session->write($this->sesNames['direccion'], $this->data['Instit']['direccion']);
        }

        if (!empty($this->passedArgs['page'])) {
            //$this->paginate['page'] = $this->passedArgs['page'];
            $this->Session->write($this->sesNames['page'], $this->passedArgs['page']);
        }
        elseif ($this->Session->read($this->sesNames['page'])) {
            $this->paginate['page'] = $this->Session->read($this->sesNames['page']);
        }

        //////////////// Automagiccccs filter

        //     Nro Institucion
         $ops[] = array(
            'model' => 'Instit',
            'field' => 'nroinstit',
            'friendlyName' => 'Nº de Institución',
             'forceText' => true,
             );

         //     Jurisdiccion
         $ops[] = array(
            'field' => 'jurisdiccion_id',
            'friendlyName' => 'Jurisdicción');

         //      Departamento
         $ops[] = array(
            'field' => 'departamento_id',
            'friendlyName' => 'Departamento');

         //      Localidad
         $ops[] = array(
            'field' => 'localidad_id',
            'friendlyName' => 'Localidad');

         //      TIPO INSTIT
         $ops[] = array(
            'field' => 'tipoinstit_id',
            'friendlyName' => 'Tipo Institución');

          //      Nombre
         $ops[] = array(
            'field' => 'nombre',
            'friendlyName' => 'Nombre');

         //      Direccion
         $ops[] = array(
            'field' => 'direccion',
            'friendlyName' => 'Domicilio');
        
         //      GESTION
         $ops[] = array(
            'field' => 'gestion_id',
            'friendlyName' => 'Ámbito de Gestión');

         //      DEPENDENCIA
         $ops[] = array(
            'field' => 'dependencia_id',
            'friendlyName' => 'Dependencia');         

         //      OFERTA
         $ops[] = array(
            'model' => 'Plan',
            'field' => 'oferta_id',
            'friendlyName' => 'Con Oferta',
            'asociarPlan' => true,
             );

         //      SECTOR
         $ops[] = array(
            'model' => 'SectoresTitulo',
            'field' => 'sector_id',
            'friendlyName' => 'Sector',
            'asociarPlan' => true,
             );

         //      Subsector
         $ops[] = array(
            'model' => 'SectoresTitulo',
            'field' => 'subsector_id',
            'friendlyName' => 'Subsector',
             'asociarPlan' => true);

         //      TITULOS REFERENCIALES
         $ops[] = array(
            'model' => 'Plan',
            'field' => 'titulo_id',
            'friendlyName' => 'Título o Certificado',
            'asociarPlan' => true,
             );

         //      ORIENTACION
         $ops[] = array(
            'field' => 'orientacion_id',
            'friendlyName' => 'Orientación');

         //      NORMA
         $ops[] = array(
            'model' => 'Plan',
            'field' => 'norma',
            'friendlyName' => 'Norma',
            'asociarPlan' => true,
             );

         //      Tipo Instit
         $ops[] = array(
            'field' => 'claseinstit_id',
            'friendlyName' => 'Tipo de Institución de ETP');

         //      Tipo Instit
         $ops[] = array(
            'model' => 'Instit',
            'field' => 'etp_estado_id',
            'friendlyName' => 'Relación con ETP');

         
         $this->Buscable->aplicarCriteriosDeBusqueda($ops);         
         
        /*********************************************************************/
        /*          FIN -*-CONDITIONS-*- de busqueda                         */
        /*********************************************************************/

        $this->Instit->recursive = 1;//para alivianar la carga del server
        $pagin = $this->paginate('Instit');

        $this->set('instits', $pagin);
        $this->set('url_conditions', $this->passedArgs);      
        $this->set('conditions', $this->paginate['viewConditions']);
        
        if (!empty($this->passedArgs['Plan.titulo_id'])) {
            $this->set('referer', $this->passedArgs['Plan.titulo_id']);
        }

        if (!$this->RequestHandler->isAjax()) {         
            // si se encontro solo 1 institucion, ir directamente a la vista de esa institucion
            // si el resultado me trajo 1, y eestoy buscando por CUE, entonces ir directamente a la vista d esas institucion
            if(sizeof($pagin) == 1 && $vino_formulario)
                if(!empty($this->data['Instit']['cue'])) 
                    if(($pagin[0]['Instit']['cue'] == $this->data['Instit']['cue']) || (($pagin[0]['Instit']['cue']*100+$pagin[0]['Instit']['anexo'] == $this->data['Instit']['cue']))) {
                        $this->redirect('view/'.$pagin[0]['Instit']['id']);
                    }
        }
    }
}
?>
