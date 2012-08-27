<?php
class Instit extends AppModel {

	var $name = 'Instit';

        var $order = array('Instit.cue', 'Instit.anexo');

        /* @var $nombreCompleto String */
        /* es el nombre de la institucion adicionandole el tipoinstit + n° instit + nombre propio */
        var $nombreCompleto = '';
	
	/**
	 * Esto es para el paginador customizado
	 * @var boolean
	 */
	var $asociarPlan = false;
        
	var $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(			
			'Dependencia' => array('className' => 'Dependencia',
								'foreignKey' => 'dependencia_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Tipoinstit' => array('className' => 'Tipoinstit',
								'foreignKey' => 'tipoinstit_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Jurisdiccion' => array('className' => 'Jurisdiccion',
								'foreignKey' => 'jurisdiccion_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Departamento' => array('className' => 'Departamento',
								'foreignKey' => 'departamento_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Localidad' => array('className' => 'Localidad',
								'foreignKey' => 'localidad_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Claseinstit' => array('className' => 'Claseinstit',
								'foreignKey' => 'claseinstit_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'EtpEstado' => array('className' => 'EtpEstado',
								'foreignKey' => 'etp_estado_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
                        'Orientacion',
                        'Gestion' => array('className' => 'Gestion',
								'foreignKey' => 'gestion_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
	);

	var $hasMany = array(
                        'Plan' => array('className' => 'Plan',
                                        'foreignKey' => 'instit_id',
                                        'dependent'=> true, // borra en cascada
                                        'conditions' => '',
                                        'fields' => '',
                                        'order' => '',
                                        'limit' => '',
                                        'offset' => '',
                                        'exclusive' => '',
                                        'finderQuery' => '',
                                        'counterQuery' => ''
                        ),                        
	);

	

        /**
  	 * Callback que se ejecuta luego de cada find() del model Instit
         * Añade el nombre completo de la institución como un campo más.
         * Esta adaptada a los distintos niveles de key del array $results.
  	 *
  	 * @param array $results
  	 * @return array $results
  	 */
        function afterFind($results) {
            return $this->__agregarDataExtra($results);
        }


        function __agregarDataExtra($results){

            if (empty($results)) {
                return null;
            }

            list($key, $idata) = each($results);
            $aux = "$key";
            if (is_array($idata)) {
                if ($aux == "Instit") {
                    $profundidad = 1;
                }
                else {  // data[0]['Instit']
                    $profundidad = 2;
                }
            }
            else {  // data['id']; data['nombre']; etc
                $profundidad = 0;
            }

            if ($profundidad > 0) {
                foreach ($results as &$item) {
                    if (isset($item['Instit']['tipoinstit_id']) || isset($item['Instit']['nombre']) || isset($item['Instit']['nroinstit'])) {
                        $item_aux = &$item['Instit'];
                    }
                    elseif (isset($item['tipoinstit_id']) || isset($item['nombre']) || isset($item['nroinstit'])) {
                        $item_aux = &$item;
                    }

                    if (isset($item['Tipoinstit'])) {
                        $item_aux['Tipoinstit'] = &$item['Tipoinstit'];
                    }

                    $nombre_tipoinstit = '';
                    if (!empty($item_aux)) {
                        if (!empty($item_aux['Tipoinstit'])) {
                            $nombre_tipoinstit = isset($item_aux['Tipoinstit']['name']) ? $item_aux['Tipoinstit']['name'] : '';
                        }
                        /*elseif (!empty($item_aux['tipoinstit_id'])) {
                            // si no tiene, tipo instit para armar nombre
                            $this->Tipoinstit->recursive = -1;
                            $tipoinstit = $this->Tipoinstit->find('first', array('conditions' => array('Tipoinstit.id' => $item_aux['tipoinstit_id'])));
                            if (!empty($tipoinstit)) {
                                $nombre_tipoinstit = isset($tipoinstit['Tipoinstit']['name']) ? $tipoinstit['Tipoinstit']['name'] : '';
                            }
                        }*/

                        $item_aux['nombre_completo'] = $this->getNombreCompleto($item_aux['nombre'], $item_aux['nroinstit'], $nombre_tipoinstit);
                        //$item_aux['ultimo_ciclo'] = $this->getUltimoCiclo($item_aux['id']);
                    }

                    unset($item_aux);
                }
            }
            else {
                $nombre_tipoinstit = isset($results['Tipoinstit']['name']) ? $results['Tipoinstit']['name'] : '';

                $results['nombre_completo'] = $this->getNombreCompleto($results['nombre'], $results['nroinstit'], $nombre_tipoinstit);
                //$results['ultimo_ciclo'] = $this->getUltimoCiclo($item_aux['id']);
            }

            return $results;
        }


        /**
         * Arma el nombre completo con el Tipo instit + N° + nombre propio
         * se le pueden pasar los parametros para concatenar el nombre, o bien
         * pasarle un array al final, si no se le pasa nuingun array, toma el
         * $this->data para extraer la info
         * 
         * @param string $nombre
         * @param string $nroinstit
         * @param string $tipoinstit
         * @param array $arrayParaCompletar si se lo pasa con el puntero de referencia lo modifica directamente ahi mismo
         * @return string el nombre completo
         */
        function getNombreCompleto($nombre='', $nroinstit='', $tipoinstit='') {
            $nombreCompleto = "";

            if (!empty($tipoinstit) && $tipoinstit == 'SIN DATOS') {
                $tipoinstit = '';
            }
            
            if (!empty($tipoinstit)) {
                $nombreCompleto = $tipoinstit.' ';
                $nombreCompleto .= ($nroinstit > 0 || $nroinstit != '')?"N° $nroinstit ":"";
                if (($tipoinstit != 'SIN DATOS' ||  $nroinstit > 0) && $nombre){
                    $nombreCompleto .= " ";
                }
                $nombreCompleto .= ($nombre != '')?'"'.$nombre.'"':"";
            }
            else {
                $nombreCompleto .= ($nroinstit > 0 || $nroinstit != '')?"N° $nroinstit ":"";
                $nombreCompleto .= ($nombre != '')?'"'.$nombre.'"':"";
            }

            return $nombreCompleto;
        }

        
  		
  	/**
  	 *  
  	 *  me dice si una institucion cambio de cue
  	 *  si el cue fue modificado, entonces me devuelve un array con lso datos viejos
  	 *  caso contrario me devuelve null 
  	 * 
  	 * @param $institData es el $this->data del formulario
  	 * @return array son los datos de la Institucion
  	 */
  	function cambioCue($institData) {
            $this->id = $institData['Instit']['id'];
            $instit = $this->read(array('id','cue','anexo'));

            if(isset($institData['Instit']['cue']) && isset($institData['Instit']['anexo']) && isset($institData['Instit']['id'])){
                    if (($this->data['Instit']['cue']*100+$this->data['Instit']['anexo']) != ($institData['Instit']['cue']*100+$institData['Instit']['anexo'])){
                            return $instit;
                    }
                    return null;
            }
            //else debug('vino vacio el cue, anexo o id de institucion y no se puede comprobar si hubo cambio de cue');
  	}
  	
  	 

        public function find($conditions = null, $fields = null, $order = null, $recursive = null) {
            if ($this->asociarPlan == true) {
                $parametersAux = compact('order');
                $parametersAux = array_merge($fields, $parametersAux);
                if ($recursive != $this->recursive) {
                        $parametersAux['recursive'] = $recursive;
                }
                if ($conditions == 'count') {
                    return $this->__asociarPlanParamsSetup($parametersAux,'count');
                }
                else {
                    $inst = $this->__asociarPlanParamsSetup($parametersAux);
                    return $inst;
                }
            } else {
                return parent::find($conditions, $fields, $order, $recursive);
            }
        }

        

        
        /**
         * Esta funcion simplemente inicializa los arrays para luego
         * hacer la busqueda cuando seteo asociarPlan en true
         * @param array $parameters
         * @param string $buscaroSoloContar
         *                          admite los strings: 'buscar' o 'count'
         * @return array
         */
        private function __asociarPlanParamsSetup($parameters = array(), $buscaroSoloContar = 'buscar') {
                
                //$parameters['recursive'] = -1;
                $parameters['joins'] = array(
                    array(
                        'table' => 'tipoinstits',
                        'type' => 'LEFT',
                        'alias' => 'Tipoinstit',
                        'conditions' => array('Tipoinstit.id = Instit.tipoinstit_id'),
                    ),
                    array(
                        'table' => 'planes',
                        'type' => 'LEFT',
                        'alias' => 'Plan',
                        'conditions' => array('Plan.instit_id = Instit.id'),
                    ),
                    array(
                        'table' => 'titulos',
                        'type' => 'LEFT',
                        'alias' => 'Titulo',
                        'conditions' => array('Titulo.id = Plan.titulo_id'),
                    ),
                    array(
                        'table' => 'sectores_titulos',
                        'alias' => 'SectoresTitulo',
                        'type' => 'LEFT',
                        'conditions' => array('Titulo.id = SectoresTitulo.titulo_id')
                    ),
                    array(
                        'table' => 'subsectores',
                        'alias' => 'Subsector',
                        'type' => 'LEFT',
                        'conditions' => array('SectoresTitulo.subsector_id = Subsector.id')
                    ),
                    array(
                        'table' => 'sectores',
                        'alias' => 'Sector',
                        'type' => 'LEFT',
                        'conditions' => array('SectoresTitulo.sector_id = Sector.id')
                    ),
                    array(
                        'table' => 'jurisdicciones',
                        'type' => 'LEFT',
                        'alias' => 'Jurisdiccion',
                        'conditions' => array('Jurisdiccion.id = Instit.jurisdiccion_id'),
                    ),
                    array(
                        'table' => 'localidades',
                        'type' => 'LEFT',
                        'alias' => 'Localidad',
                        'conditions' => array('Localidad.id = Instit.localidad_id'),
                    ),
                    array(
                        'table' => 'departamentos',
                        'type' => 'LEFT',
                        'alias' => 'Departamento',
                        'conditions' => array('Departamento.id = Instit.departamento_id'),
                    ),
                );                

                
                // le pongo en el Group lo que quiero ordenar, porque
                /// sino me tira error
                $groupsVars = array();
                if (!empty($parameters['order'])) {
                    if (is_string($parameters['order'])) {
                        $parameters['order'] = explode(',', $parameters['order']);
                    }
                    $parameters['order'] = array_merge($parameters['order'], $this->order);
                    
                    foreach ( $parameters['order'] as $k=>$or) {
                        if (is_string($k) ) {
                            $groupsVars[] = $k;
                        } else {
                            $letrasBorrar = array(' ASC', ' asc', ' DESC', ' desc');
                            $campo = str_replace($letrasBorrar, '', $or);
                            if ( !empty($campo)) $groupsVars[] = $campo;
                        }                        
                    }

                } else {
                    $groupsVars = $this->order;
                }
                $parameters['group'] = array_merge(array('Instit.id'),$groupsVars);
                
                if ($buscaroSoloContar == 'count') {
                    // si solo es para obtener el total no necesito seguir...
                    return count(parent::find('list', $parameters));
                }

                $parameters['fields']= 'Instit.id';
                

                // recojo todas las instituciones que cumplan con los criterios de busqueda
                $institsIds = parent::find('list', $parameters);
                if (empty($institsIds) ) {
                    // no hay instituciones que cumplan con esos criterios de busqueda
                    return array();
                }
                $parameters['conditions'] = array('Instit.id' => $institsIds);
                

                unset($parameters['limit']);
                unset($parameters['page']);
                unset($parameters['joins']);
                unset($parameters['group']);
                unset($parameters['fields']);

                $instits = parent::find('all', $parameters);
                
                return $instits;
        }
  	

   /**
    * si me encuentra algo me tira FALSO, asi evitamos duplicados
    * @return boolean
    */
	function cue_y_anexo_unico()
  	{
  		return (count($this->__getInstitByCUEandAnexo())==0)?true:false;
  	}

  	
  	
  	/**
  	 * me inserta 1 array pero se fija antes que la institucion no exista
  	 * si existe, no me lo inserta. hace que siempre sean unicas las instits
  	 * 
  	 * @param array $vector1[key_index][Instit][campo]
  	 * @param array $vector2[key_index][Instit][campo]
  	 * @return array 
  	 */
  	private function __armarVectorSinInstitsRepetidas($vector1, $vector2)
  	{
  		$v_final = array();
  		if(empty($vector2)){
  			return $vector1;
  		}
  		if(empty($vector1)){
  			return $vector2;
  		}
  		foreach($vector2 as $v2):
  			$encontro = false;
  			foreach($vector1 as $v1):  				
  				if($v2['Instit']['id'] == $v1['Instit']['id']){
  					$encontro = true;
  					break;
  				}
  			endforeach;
  			if(!$encontro){
  				$v_final[] = $v2;
  			}
  		endforeach;
  		
  		$v_final = array_merge($vector1, $v_final);
  		
  		return $v_final;
  	}
   
  	
  	/**
  	 * Me busca instituciones que tengan el mismo CUE y Anexo pasados como parametros. 
  	 * me devuelve un array del tipo find('all') de las instituciones 
  	 * @param integer $cue
  	 * @param integer $anexo
  	 * @return array del tipo find('all') de Intits
  	 */
  	private function __buscarSimilaresPorCueYAnexo($cue, $anexo) 
  	{
  		$similars = array(); 
  		// busco por cue y anexo
		if( $this->data['Instit']['cue'] != "" && $this->data['Instit']['anexo'] != "")
		{
			$similars = $this->__getInstitByCUEandAnexo();
			if(count($similars)>0) 
			{
				$this->validationErrors += array( 'cue' => 'Hay una institución con éste mismo CUE y Anexo');
				$this->validationErrors += array( 'anexo' => '');
			}
		}
		return $similars;
  	}
  	
  	
  	/**
  	 * Me busca las instituciones similares teniendo en cuenta la Localidad, el Domicilio
  	 * y la Jurisdiccion. Me lee los datos de $this->data['Instit']
  	 * @return array del tipo find('all') 
  	 */
  	private function __buscarSimilaresPorSuUbicacion() 
  	{
  		$similars = array();
  		
  		if (!empty($this->data['Instit']['localidad_id']) &&
  			!empty($this->data['Instit']['direccion'])
  		) { 
			
			$conditions = array("localidad_id" => $this->data['Instit']['localidad_id'], 
								"lower(direccion)  SIMILAR TO ?" => convertir_para_busqueda_avanzada($this->data['Instit']['direccion']));
			
			$txtError = 'Hay una institución con la misma dirección en ésta localidad';
			if ( !empty($this->data['Instit']['jurisdiccion_id'])) {
				$conditions['Instit.jurisdiccion_id'] = $this->data['Instit']['jurisdiccion_id'];
				$txtError .= " y/o jurisdiccion"; 
			}
			
			if (!empty($this->data['Instit']['id'])) {
				$conditions['Instit.id <>'] = $this->data['Instit']['id']; 
			}
						
			$similars = $this->find('all',array('conditions'=> $conditions));
			if(count($similars)>0)
			{
				$this->validationErrors += array( 'direccion' => $txtError);
				$this->validationErrors += array( 'localidad_id' => '');
			}
  		}
  		return $similars;
  	}
  	
  	
  	/**
  	 * busca las instituiciones similares por su Nombre y Localidad
  	 * utiliza el $this->data
  	 * @return array del tipo find('all')
  	 */
  	private function __buscarSimilaresPorNombreYLocalidad()
  	{
  		$similars = array();
  		if( !empty($this->data['Instit']['nombre']) && 
  			!empty($this->data['Instit']['localidad_id']))
		{
			$nombre = convertir_para_busqueda_avanzada($this->data['Instit']['nombre']);
		
			$conditions = array("lower(nombre)  SIMILAR TO ?" => $nombre,
								"localidad_id" => $this->data['Instit']['localidad_id']);
			
			if (!empty($this->data['Instit']['id'])) {
				$conditions['Instit.id <>'] = $this->data['Instit']['id']; 
			}
						
			$similars = $this->find('all',array('conditions'=> $conditions));
			if(count($similars)>0) 
			{
				$this->validationErrors += array( 'nombre' => 'Hay una institución con éste nombre en la misma localidad');
				$this->validationErrors += array( 'localidad_id' => '');
			}
		}
		return $similars;
  	}
   
  	
  	/**
  	 * busca instituciones similares por:
  	 * Nombre + Nro Instit + Tipo de Instit. Utiliza $this->data
  	 * @return array del tipo find('all')
  	 */
  	private function __buscarSimilaresPorNombreCompleto()
  	{
  		$similars = array();
  		if( !empty($this->data['Instit']['nombre'])    &&
			!empty($this->data['Instit']['nroinstit']) &&
			!empty($this->data['Instit']['tipoinstit_id'])
			){
			$nombre = convertir_para_busqueda_avanzada($this->data['Instit']['nombre']);
			$conditions = array("lower(nombre)  SIMILAR TO ?" => $nombre,
								"lower(nroinstit)  SIMILAR TO ?" => convertir_para_busqueda_avanzada($this->data['Instit']['nroinstit']),
								"tipoinstit_id" => $this->data['Instit']['tipoinstit_id']);
			
			if (!empty($this->data['Instit']['id'])) {
				$conditions['Instit.id <>'] = $this->data['Instit']['id']; 
			}
			
			$similars = $this->find('all',array('conditions'=> $conditions));
			if (count($similars)>0) {
				$this->validationErrors += array( 'nombre' => 'Hay una institución con el mismo nombre, tipo y número');
				$this->validationErrors += array( 'nroinstit' => '');
				$this->validationErrors += array( 'tipoinstit_id' => '');
			}
		}
		return $similars;
  	}
  	
  	
  	/**
  	 * busca similares por Tipo instit + Nro Instit en la misma Jurisdiccion
  	 * utiliza $this->data
  	 * @return array del tipo find('all')
  	 */
  	private function __buscarSimilaresPorTipoYNumeroEnJurisiccion()
  	{
  		$similars = array();
  		if( !empty($this->data['Instit']['localidad_id']) &&
			!empty($this->data['Instit']['nroinstit'])    &&
			!empty($this->data['Instit']['tipoinstit_id']))
		{
			$conditions = array("Instit.localidad_id" => $this->data['Instit']['localidad_id'],
								"lower(nroinstit)  SIMILAR TO ?" => convertir_para_busqueda_avanzada($this->data['Instit']['nroinstit']),
								"tipoinstit_id" => $this->data['Instit']['tipoinstit_id']);
			
			if (!empty($this->data['Instit']['id'])){
				$conditions['Instit.id <>'] = $this->data['Instit']['id']; 
			}
			
			$similars = $this->find('all',array('conditions'=> $conditions));
			if(count($similars)>0) 
			{
				$this->validationErrors += array( 'nroinstit' => 'Hay una institución en la misma localidad, con el mismo tipo y número');
				$this->validationErrors += array( 'localidad_id' => '');
				$this->validationErrors += array( 'tipoinstit_id' => '');
			}
		}
		return $similars;
  	}
  	
  	
  	
	/**
	 * Me devuelve todas la Instituciones similares
	 * @param $this->$data
	 * @return array de Instituciones del tipo find('all')
	 */
	function getSimilars($data) 
	{
		$similars = array();
		$this->data = $data;
		
		// busco por cue y anexo
		$v = $this->__buscarSimilaresPorCueYAnexo( $this->data['Instit']['cue'], $this->data['Instit']['anexo'] );
		$similars = $this->__armarVectorSinInstitsRepetidas($similars, $v);
		
		// busco por ubicacion
		$v = $this->__buscarSimilaresPorSuUbicacion();
		$similars = $this->__armarVectorSinInstitsRepetidas($similars, $v);		
		
		// busco por nombre y localidad
		$v = $this->__buscarSimilaresPorNombreYLocalidad();
		$similars = $this->__armarVectorSinInstitsRepetidas($similars, $v);	
		
		// busco por nombre
		$v = $v = $this->__buscarSimilaresPorNombreCompleto();
		$similars = $this->__armarVectorSinInstitsRepetidas($similars, $v);
		
		// busco por juridiccion, tipo y numero
		$this->__buscarSimilaresPorTipoYNumeroEnJurisiccion();
		$similars = $this->__armarVectorSinInstitsRepetidas($similars, $v);
		
		return $similars;
	}
	
	
	/**
	 * Me devuelve instituciones cuyo cue y anexo coinciden
	 * toma los valores de $this->data
	 * @return array find('all')
	 */
	function __getInstitByCUEandAnexo()
	{
		$condiciones = array();	
			
		// cuando se edita uina institucion
		// tengo que buscar todas las intituciones que no sea ésta misma en cuestión
		if (isset($this->data[$this->name]['id'])){
			if($this->data[$this->name]['id']!= null){
				$condiciones = array_merge($condiciones, array('Instit.id <>'=>$this->data[$this->name]['id']));
			}
		}	
		if (isset($this->data[$this->name]['cue'])){
			if($this->data[$this->name]['cue']!= null){
				$condiciones = array_merge($condiciones, array('cue'=>$this->data[$this->name]['cue']));
			}
		}	
		if (isset($this->data[$this->name]['anexo'])){
			if($this->data[$this->name]['anexo']!= null){
				$condiciones = array_merge($condiciones, array('anexo'=>$this->data[$this->name]['anexo']));
			}
		}
 		$this->recursive = -1;
  		return $this->find('all',array('conditions'=>$condiciones));
	}
	
	
	
	/**
	 *  Cambia el "*" utilizado en la busqueda por un "%"
	 * @param string $texto con *
	 * @return string @return texto con % para el LIKE de SQL
	 */
	function cambioComodin($texto) {
		return str_replace('*', '%', $texto);
	}
	
		
	/**
	 * 
	 * @param  integer $instit_id
	 * @return integer $orientacion_id
	 */
	function getOrientacionSegunSusPlanes($instit_id=0)
        {
            if(!empty($instit_id)) {
                $this->id = $instit_id;
            }
            $instit_id = $this->id;

            $planes = $this->Plan->find('all', array(
                    'conditions'=>array('Plan.instit_id'=>$instit_id),
                    'contain'=>array(
                        'Titulo' => array(
                            'SectoresTitulo'=>array(
                                'Subsector',
                                'Sector',
                                )
                            )
                        )
                )
                    );
            $cantPlanes = count($planes);
            
            $ant = -1;

            foreach ($planes as $p) {
                if (empty($p['Titulo']['SectoresTitulo'])) continue;
                foreach ( $p['Titulo']['SectoresTitulo'] as $st ) {
                    if( $ant != -1 && $st['Sector']['orientacion_id']!= $ant ) {
                        return 0;
                    }
                    $ant = $st['Sector']['orientacion_id'];
                }
            }

            return $ant;

        }


        /***************************
         *
         * LOG DE LAS BUSQUEDAS REALIZADAS
         */
        function searchLog($data, $user, $group, $cantEncontradas){
            if (!empty($data)) {
                $posi  = strrpos($_SERVER['HTTP_REFERER'], "/");
                $nombre_form = substr($_SERVER['HTTP_REFERER'],$posi+1);

                $logTxt = $headTxt = '';
                $logTxt .= '|'. @$nombre_form; $headTxt .= '|'.'Formulario';
                $logTxt .= '|'. $user; $headTxt .= '|'.'Usuario';
                $logTxt .= '|'. $group; $headTxt .= '|'.'Rol';
                $logTxt .= '|'. $cantEncontradas; $headTxt .= '|'.'Cant. Encontradas';
                $logTxt .= '|'. @$data['Instit']['cue']; $headTxt .= '|'.'CUE';
                $logTxt .= '|'. @utf8_decode($data['Instit']['busqueda_libre']); $headTxt .= '|'.'Nombre Libre(solo buscador rapido)';
                $logTxt .= '|'. @utf8_decode($data['Instit']['nombre_completo']); $headTxt .= '|'.'Nombre Completo';
                $logTxt .= '|'. @$data['Instit']['nroinstit']; $headTxt .= '|'.'Nro Instit';
                $logTxt .= '|'. @$data['Instit']['jurisdiccion_id']; $headTxt .= '|'.'Jurisdiccion ID';
                $logTxt .= '|'. @$data['Instit']['tipoinstit_id']; $headTxt .= '|'.'Tipo Instit ID';
                $logTxt .= '|'. @utf8_decode($data['Instit']['nombre']); $headTxt .= '|'.'Nombre Instit';
                $logTxt .= '|'. @utf8_decode($data['Instit']['direccion']); $headTxt .= '|'.'Direccion';
                $logTxt .= '|'. @$data['Departamento']['id']; $headTxt .= '|'.'Departamento ID';
                $logTxt .= '|'. @$data['Localidad']['id']; $headTxt .= '|'.'Localidad ID';
                $logTxt .= '|'. @$data['Instit']['gestion_id']; $headTxt .= '|'.'Gestion ID';
                $logTxt .= '|'. @$data['Instit']['dependencia_id']; $headTxt .= '|'.'Dependencia ID';
                $logTxt .= '|'. @$data['Instit']['activo']; $headTxt .= '|'.'Activo';
                $logTxt .= '|'. @$data['Plan']['oferta_id']; $headTxt .= '|'.'Plan Oferta ID';
                $logTxt .= '|'. @$data['Plan']['sector_id']; $headTxt .= '|'.'Plan Sector ID';
                $logTxt .= '|'. @$data['Plan']['subsector_id']; $headTxt .= '|'.'Plan Sub-Sector ID';
                $logTxt .= '|'. @$data['Plan']['titulo_id']; $headTxt .= '|'.'Plan Titulo ID';
                $logTxt .= '|'. @$data['Instit']['orientacion_id']; $headTxt .= '|'.'Orientacion ID';
                $logTxt .= '|'. @utf8_decode($data['Plan']['norma']); $headTxt .= '|'.'Plan Norma';
                $logTxt .= '|'. @$data['Instit']['claseinstit_id']; $headTxt .= '|'.'Clase Instit ID';
                $logTxt .= '|'. @$data['Instit']['etp_estado_id']; $headTxt .= '|'.'ETP Estado ID';

                $log_file_name = 'search_'.date('m_Y',strtotime('now'));
                $archivo = APP . 'tmp' . DS . 'logs' . DS . $log_file_name.'.log';
                if (!file_exists($archivo)){
                     // armo el encabezado del CSV
                     $this->log($headTxt,$log_file_name);
                }
                //meto la data en el log
                $this->log($logTxt,$log_file_name);
            }
        }

       
        /**
         * Lista todos los sectores de una determinada institucion para una
         * determinada oferta.
         * @param integer $instit_id
         * @param integer $oferta_id
         * @return array del find('list') con 'id' => 'nombre del sector'
         */
        function listSectoresConOferta($instit_id, $oferta_id = 0){
            $conditions = array('Plan.instit_id'=>$instit_id);
            
            if (!empty($oferta_id)) {
                $conditions['Titulo.oferta_id'] = $oferta_id;
            }
            
            $sectores = $this->Plan->find("all",array(
                'fields'=>array(
                        'DISTINCT Sector.id', 'Sector.name'
                ),
                'joins'=>array(
                   array(
                          'table' => 'sectores_titulos',
                          'alias' => 'SectoresTitulo',
                          'type' => 'INNER',
                          'conditions' => array('SectoresTitulo.titulo_id = Plan.titulo_id')
                    ),
                    array(
                          'table' => 'sectores',
                          'alias' => 'Sector',
                          'type' => 'INNER',
                          'conditions' => array('Sector.id = SectoresTitulo.sector_id')
                    )
                ),
                'conditions'=> $conditions,
                'contain'=>array(
                        'Titulo' => array(
                            'Sector',
                            'order' => array('Sector.name'),
                            ),
                ),
                )
            );
            $sectores_aux = array();

            foreach($sectores as $s){
                $sectores_aux[$s['Sector']['id']] = $s['Sector']['name'];
            }
            return $sectores_aux;
        }

        
        
        function instit_con_anexo_marcado(){
            if ( $this->data['Instit']['esanexo']){
                if (!$this->data['Instit']['anexo']){
                    return false;
                }
            }
            return true;
        }
        
        
        function instit_con_anexo_desmarcado(){
            if ( !$this->data['Instit']['esanexo']){
                if ($this->data['Instit']['anexo']){
                    return false;
                }
            }
            return true;
        }
        
        
        /**
         * Si el tipo de dependencia es provincial 
         * entonces el nombre de la dependencia debe estar vacio
         * @return boolean 
         * 
         */
        function tipo_dependencia_provincial_y_nombre_dep_vacio(){
            if ( $this->data['Instit']['dependencia_id'] == DEPENDENCIA_PROVINCIAL ){
                if ( $this->data['Instit']['nombre_dep']) {
                    return false;
                }
            }
            return true;
        }

        /**
         * Si el tipo de dependencia es nacional
         * entonces el nombre de la dependencia no debe estar vacio
         * @return boolean 
         * 
         */
        function tipo_dependencia_nacional_y_nombre_dep_no_vacio(){
            if ( $this->data['Instit']['dependencia_id'] == DEPENDENCIA_NACIONAL ){
                if (!$this->data['Instit']['nombre_dep']){
                    return false;
                }
            }
            return true;
        }
        
}
?>
