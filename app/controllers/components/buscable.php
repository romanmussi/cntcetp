<?php
/**
 * Inicializa el paginator con las condiciones especificadas
 * 
 */
class BuscableComponent extends Object {

    /* @var $controller Controller */
    var $controller;

    /**
     *
     * @var array, listado de opciones a buscar
     * Opciones psibles son:
     *      string model => nombre del modelo
     *      string field => nombre del campo que quiero buscar
     *      string friendlyName => es el nombre que aparecerá en la pàgina de resultados de la búsqueda. Por ejemplo "Nombre de la Institución"
     *      boolean forceText => hace que el valor buscado sea un texto si o si. Aunque venga un número como filtro de bñusqueda.
     *      boolean asociarPlan => para realizar busquedas avanzadas en el sector del titulo por ejemplo
     * 
     */
    var $searchOptions = array();


    function initialize(&$controller, $settings=array()){
        $this->controller = $controller;
    }


    function aplicarCriteriosDeBusqueda($ops, $fillThisData = false) {
        if (empty($ops)) {
            $ops = $this->searchOptions;
        }
        if (count($ops) == 0) return -1; // no hay nada que buscar

        foreach ($ops as $o) {
                 $this->__aplicarCriterio($o, $fillThisData);
        }
    }
    
    /**
     *
     * @param array $o -- Options array
     * @param boolean $fillThisData si esta en true, cada field pasado lo agrega al this->data
     * Opciones psibles son:
     *      string model => nombre del modelo
     *      string field => nombre del campo que quiero buscar
     *      string friendlyName => es el nombre que aparecerá en la pàgina de resultados de la búsqueda. Por ejemplo "Nombre de la Institución"
     *      boolean forceText => hace que el valor buscado sea un texto si o si. Aunque venga un número como filtro de bñusqueda.
     *      boolean asociarPlan => para realizar busquedas avanzadas en el sector del titulo por ejemplo
     *
     */
    private function __aplicarCriterio($o = null, $fillThisData = false) {
        
        if (empty($o)) return -1; // no hay nada que buscar

        // inicializo variables del array de opciones
        $model = empty($o['model'])?$this->controller->modelClass:$o['model'] ;
        $field = $o['field'];
        $inputName = empty($o['input-name'])? $o['field'] : $o['input-name'];
        $friendlyName = empty($o['friendlyName']) ? $field : $o['friendlyName'];
        $forceText = empty($o['forceText']) ? false : true;
        $valor = null; // es el valor DATO del campo que voy a buscar
        $asociarPlan = empty($o['asociarPlan']) ? false : true;
        $modelField = $model.'.'.$field;

        // lista de modelos que se van a consultar en la query
        $this->controller->paginate['modelosInvolucrados'] = array();

        // paso al vector del paginador para unificar la busqueda
        if(!empty($this->controller->data[$model][$inputName])) {
            $valor = $this->controller->data[$model][$inputName];
        }
        
        if( !empty($this->controller->params['url'][$inputName]) ) {
            $valor = $this->controller->passedArgs[$modelField] = $this->controller->params['url'][$inputName];
        }

        if( !empty($this->controller->passedArgs[$modelField]) ) {
            $valor = $this->controller->passedArgs[$modelField];
        }
        $this->controller->passedArgs[$modelField] = $valor;

        if( !empty($valor) ) {

            if ($asociarPlan) {
                $this->controller->Instit->asociarPlan = true;
            }

            $this->controller->paginate['modelosInvolucrados'][] = $model;
            
            if ($fillThisData){
                $this->controller->data[$model][$inputName] = $valor;
            }

            $friendlyName = empty($friendlyName) ?  $field : $friendlyName;
            $this->controller->paginate['viewConditions'][$friendlyName] = $valor;

            if ( (!is_numeric($valor) && !is_array($valor)) && is_string($valor) || $forceText === true) {
                // es texto
                $this->controller->paginate[$this->controller->modelClass]['conditions']['lower('.$modelField.') SIMILAR TO ?']
                    = convertir_para_busqueda_avanzada(utf8_decode($valor));
                $array_condiciones[$modelField] = utf8_decode($valor);
                $url_conditions[$field] = utf8_decode($valor);
            } else {
                if (substr($field,-3) == '_id') {

                    // es FK, por lo tanto me traigo el nombre
                    // para mostrar en el resutado de busquedas (para mostrar en la vista el camp "name" del Modelo
                    $miniModel = substr($field, 0, strlen($field)-3);
                    $model  = Inflector::camelize($miniModel);
                    $rModel =& ClassRegistry::init($model);

                    $rModel->id = $valor;
                    $this->controller->paginate['viewConditions'][$friendlyName] = $rModel->field('name');
                }

                // es un numero, como por ejemplo una FK
                $this->controller->paginate[$this->controller->modelClass]['conditions'][$modelField] = $valor;
            }
        }
    }
}
?>
