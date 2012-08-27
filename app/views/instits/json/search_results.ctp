<?php

foreach( $instits as &$i) {
    $i['Instit']['url'] = utf8_encode($html->url(array(
                                    'controller' => 'instits',
                                    'action' => 'view',
                                    'id' => $i['Instit']['id'],
                                    'slug' => slug($i['Instit']['nombre_completo']))));
    $i['Instit']['nombre_completo'] = utf8_encode($i['Instit']['nombre_completo']);
    $i['Departamento']['name'] = utf8_encode($i['Departamento']['name']);
    $i['Localidad']['name'] = utf8_encode($i['Localidad']['name']);
    $i['Jurisdiccion']['name'] = utf8_encode($i['Jurisdiccion']['name']);
}


$cant = $paginator->counter(array('format' => '%count%'));

if ($cant > 1 ) {
    $texto = 'Instituciones encontradas';
} elseif( $cant == 1 ) {
    $texto = 'Institución encontrada';
} else {
    $texto = 'Instituciones encontradas. Redefina su búsqueda';
}

$numbers = $paginator->numbers() ? $paginator->numbers(array('modulus'=>5)) : '';
$desde = $paginator->counter(array('format' => '%start%'));
$hasta = $paginator->counter(array('format' => '%end%'));

$paginator = array(
    'desde' => $desde,
    'hasta' => $hasta,
    'cant' => $cant,
    'numbers' => $numbers,
    'prev' => $paginator->prev('«', null, null, array('class' => 'disabled')),
    'next' => $paginator->next('»', null, null, array('class' => 'disabled')),
    'texto' => utf8_encode($texto),
);


 $objeto = array(     
     'paginator' => $paginator,
     'data'      => $instits,
 );
 
 echo $javascript->object($objeto);
 ?>

