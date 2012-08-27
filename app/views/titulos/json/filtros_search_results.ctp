<?php 
$filtros_aux = array();
/* @var $paginator PaginatorHelper */
foreach ( $titulos as &$t) {
    $t['Titulo']['name'] = utf8_encode($t['Titulo']['name']);
    $t['Oferta']['name'] = utf8_encode($t['Oferta']['name']);
}

if(!empty($filtros['Oferta'])){
    foreach ( $filtros['Oferta'] as $key=>&$f) {
        $filtros_aux['Oferta'][ $f['Oferta']['id']] = utf8_encode($f['Oferta']['name']);
    }
}
if(!empty($filtros['Sector'])){
    foreach ( $filtros['Sector'] as $key=>&$f) {
        $filtros_aux['Sector'][ $f['Sector']['id']] = utf8_encode($f['Sector']['name']);
    }
}
if(!empty($filtros['Jurisdiccion'])){
    foreach ( $filtros['Jurisdiccion'] as $key=>&$f) {
        $filtros_aux['Jurisdiccion'][ $f['Jurisdiccion']['id']] = utf8_encode($f['Jurisdiccion']['name']);
    }
}
if(!empty($filtros['Departamento'])){
    foreach ( $filtros['Departamento'] as $key=>&$f) {
        $filtros_aux['Departamento'][ $f['Departamento']['id']] = utf8_encode($f['Departamento']['name']);
    }
}
if(!empty($filtros['Localidad'])){
    foreach ( $filtros['Localidad'] as $key=>&$f) {
        $filtros_aux['Localidad'][ $f['Localidad']['id']] = utf8_encode($f['Localidad']['name']);
    }
}
if(!empty($filtros['Gestion'])){
    foreach ( $filtros['Gestion'] as $key=>&$f) {
        $filtros_aux['Gestion'][ $f['Gestion']['id']] = utf8_encode($f['Gestion']['name']);
    }
}

$filtros_aux['TituloName'] = utf8_encode($filtros['TituloName']);
$filtros_aux['InstitName']= utf8_encode($filtros['InstitName']);

$cant = $paginator->counter(array('format' => '%count%'));
$desde = $paginator->counter(array('format' => '%start%'));
$hasta = $paginator->counter(array('format' => '%end%'));

$texto = 'Títulos encontrados';
if ( $cant == 1) {
    $texto = 'Título encontrado';
}

$numbers = $paginator->numbers() ? $paginator->numbers(array('modulus'=>5)) : '';

$paginator = array(
    'desde' => $desde,
    'hasta' => $hasta,
    'cant' => $cant,
    'numbers' => $numbers,
    'prev' => $paginator->prev('«', null, null, array('class' => 'disabled')),
    'next' => $paginator->next('»', null, null, array('class' => 'disabled')),
    'texto' => utf8_encode($texto),
);

$titulos = array(
    'paginator' => $paginator,
    'data' => $titulos,
    'filtros' => $filtros_aux
);

echo $javascript->object($titulos);
