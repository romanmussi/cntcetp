<?php
class Plan extends AppModel {

  var $name = 'Plan';


  /*
         * $asociarAnio lo que hace es agregar la Estructura y la Etapa a
         * la cual pertenece el año.
         * Esto es agregado en el vector de Anios que devuelve el Plan
         *
         * O sea, sólo sirve para que el array de Planes me traiga más info
         * sobre los Anios
         *
         * Para poder utilizar esta variable es necesario pasar como parametro
         * en la busqueda al mismo estilo que se pasa un 'conditions', o 'contain'
         * seria algo asi $params['asociarAnio'] = true
         *
         * Esta variable es inicializada en "false" luego de cada find
         *
         * @var $this->asociarAnio boolean
         */
  private $__asociarAnio = false; // Se utiliza en el paginador (asocia ultimo anio y todos los models relacionados por joins)

  /*
         * $__asociarCompleto sirve para realizar busquedas avanzadas
         *
         * Si asociarCompleto esta setteado en true, entonces el SELECT
         * se realizará con infinidad de JOINS para que pueda buscar
         * Los modelos Joineados son:
                'Instit'
                'EstructuraPlan'
                'Etapa'
                'Anio'
                'Titulo'
                'SectoresTitulo',
         *
         * Para poder utilizar esta variable es necesario pasar como parametro
         * en la busqueda al mismo estilo que se pasa un 'conditions', o 'contain'
         * seria algo asi $params['asociarCompleto'] = true
         *
         *
         * Esta variable es inicializada en "false" luego de cada find
         */
  private $__asociarCompleto = false;


  var $maxCiclo = "";
  var $traerUltimaAct = false; // se utiliza en el paginador.

  var $actsAs = array( 'Containable' );

  var $order = array();

  //The Associations below have been created with all possible keys, those that are not needed can be removed
  var $belongsTo = array(
    'Instit' ,
    'Oferta',
    'Titulo',
  );

  
  /**
   * Redefinición de find() del parent. Si trae recursive en 3 realiza
   * una "búsqueda completa", utilizando campos de tablas a 2 niveles de
   * relación de distancia
   */
  public function find( $conditions = null, $fields = null, $order = null, $recursive = null ) {
    //if ($conditions == 'completo' || $conditions == 'countCompleto') {
    if ( !empty( $fields['recursive'] ) && $fields['recursive'] == 3 ) {
      if ( $conditions == 'count' ) {
        $ret = $this->__findCompleto( 'count', $fields, $order, $recursive );
      } else {
        $ret = $this->__findCompleto( 'buscar', $fields, $order, $recursive );
      }
    } else {
      $ret = parent::find( $conditions, $fields, $order, $recursive );
    }
    return $ret;
  }


  /**
   * Devuelve un find "all" con un monton de JOINs extra.
   * Los JOINs fueron utilizados porque CakePHP llega al nivel de Belongs To
   * y en el Contain no utiliza Joins sino que realiza un Select por item,
   * por este motivo no se podía ordenar o filtrar por un campo de esos Contain.
   *
   * @param array   $parameters
   * @param string  $buscaroSoloContar
   *                      Los valores posibles son: 'buscar' (por default)  o 'count'
   * @return array
   */
  function __findCompleto( $buscaroSoloContar = 'buscar', $parameters = array(), $order = null, $recursive = null ) {

    $parameters = array_merge( $parameters, compact( 'conditions', 'fields', 'order', 'recursive' ) );
    $ciclo = 0;
    if ( isset( $parameters['conditions']['ciclo_id'] ) ) {
      $ciclo = $parameters['conditions']['ciclo_id'];
    }
    if ( isset( $parameters['conditions']['Anio.ciclo_id'] ) ) {
      $ciclo = $parameters['conditions']['Anio.ciclo_id'];
    }
    if ( isset( $parameters['conditions']['Ciclo.id'] ) ) {
      $ciclo = $parameters['conditions']['Ciclo.id'];
    }

    $parameters['joins'] = array(
      array(
        'table' => 'instits',
        'type' => 'LEFT',
        'alias' => 'Instit',
        'conditions' => array( 'Instit.id = Plan.instit_id' ),
      ),
      array(
        'table' => 'titulos',
        'type' => 'LEFT',
        'alias' => 'Titulo',
        'conditions' => array( 'Titulo.id = Plan.titulo_id' ),
      ),
      array(
        'table' => 'sectores_titulos',
        'type' => 'LEFT',
        'alias' => 'SectoresTitulo',
        'conditions' => array( 'SectoresTitulo.titulo_id = Titulo.id' ),
      ),
      array(
        'table' => 'sectores',
        'type' => 'LEFT',
        'alias' => 'Sector',
        'conditions' => array( 'SectoresTitulo.sector_id = Sector.id' ),
      ),
      array(
        'table' => 'orientaciones',
        'type' => 'LEFT',
        'alias' => 'Orientacion',
        'conditions' => array( 'Orientacion.id = Sector.orientacion_id' ),
      ),
    );

    if ( empty( $parameters['order'] ) )
      $parameters['order'] = array( "Plan.nombre" );
    $parametersForList = $parameters;
    $parametersForList['fields']= 'Plan.id';
    $parametersForList['group']= array( 'Plan.id', 'Plan.nombre' );
    unset( $parametersForList['contain'] );
    //unset($parametersForList['order']);

    //debug($parametersForList);
    $planesIds = parent::find( 'list', $parametersForList );
    if ( $buscaroSoloContar == 'count' ) {
      return count( $planesIds );
    }

    // recojo todos los planes que cumplan con los criterios de busqueda
    if ( empty( $planesIds ) ) {
      // no hay planes que cumplan con esos criterios de busqueda
      return array();
    }

    $parameters['conditions'] = array( 'Plan.id' => $planesIds );

    unset( $parameters['limit'] );
    unset( $parameters['page'] );
    unset( $parameters['joins'] );
    unset( $parameters['fields'] );
    unset( $parameters['group'] );

    if ( empty( $parameters['contain'] ) ) {
      $parameters['contain'] = array(
        'Instit' => array(
          'Orientacion'
        ),
        'Oferta',
        'Titulo' => array(
          'SectoresTitulo' => array(
            'Sector' => array(
              'Orientacion'
            ),
            'Subsector',
          ),
        ),
      );
    }

    return parent::find( 'all', $parameters );
  }

  function filtrar_planes( $planes, $filtro_titulo, $filtro_sector, $filtro_ciclo ) {
    return $planes;
  }


  /*
         * Trae los planes de la misma institucion con nombre igual o similar al dado por parametro
         */
  function getSimilars( $name, $instit_id, $plan_id=null ) {
    $similars = array();

    if ( !empty( $name ) ) {
      $nombre = $name;
    }
    elseif ( !empty( $this->data['Plan']['nombre'] ) ) {
      $nombre = $this->data['Plan']['nombre'];
    }

    if ( !empty( $plan_id ) ) {
      $id = $plan_id;
    }
    elseif ( !empty( $this->data['Plan']['id'] ) ) {
      $id = $this->data['Plan']['id'];
    }

    if ( !empty( $nombre ) ) {
      $conditions = array( 'lower(Plan.nombre)  SIMILAR TO ?' => convertir_texto_plano( $nombre ),
        'Plan.instit_id' => $instit_id );

      if ( !empty( $id ) ) {
        // si esta editando, que no sea el mismo
        $conditions['Plan.id <>'] = $id;
      }

      $similars = $this->find( 'all', array(
          'conditions' => $conditions ) );
    }

    return $similars;
  }


}
?>
