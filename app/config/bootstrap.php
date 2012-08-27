<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 *
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php is loaded
 * This is an application wide file to load any function that is not used within a class define.
 * You can also use this to include or require any files in your application.
 *
 */
/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * $modelPaths = array('full path to models', 'second full path to models', 'etc...');
 * $viewPaths = array('this path to views', 'second full path to views', 'etc...');
 * $controllerPaths = array('this path to controllers', 'second full path to controllers', 'etc...');
 *
 */

require_once('config.email.php');

define('NOMBRE_CONTACTO', 'Unidad de Información');
define('EMAIL_CONTACTO', 'desarrolloetp@inet.edu.ar');


define('FECHA_ACTUALIZACION_DDBB','Julio de 2012');

/**
 * ID`s de OFERTAS
 */
define('SEC_TEC_ID',3);
define('ITINERARIO_ID',2);
define('FP_ID',1);
define('SUP_TEC_ID',4);


/**
 * ID`s de ETAPAS
 */
define('ETAPA_CB',4);
define('ETAPA_EGB3',1);
define('ETAPA_PC',102);

/**
 * ID`s de DEPENDENCIAS
 */
define('DEPENDENCIA_PROVINCIAL', 1);
define('DEPENDENCIA_NACIONAL', 2);
define('DEPENDENCIA_OTROS', 9);



function limpiar_nombre($string) {
    // replace accented chars
    $accents = '/&([A-Za-z]{1,2})(grave|acute|circ|cedil|uml|lig);/';
    $string_encoded = htmlentities($string,ENT_NOQUOTES,'UTF-8');

    //$string = preg_replace($accents,'$1',$string_encoded);

    // clean out the rest
    $replace = array('([\40])','(-{2,})');
    $with = array('-','-');
    $tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
    $replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
    $string = strtr($string,$tofind,$replac);

    $string = preg_replace($replace,$with,$string);

    return low($string);
}


/**
 *
 * Lo que hace es convertir una cadena en una expresion regular para
 * buscar el texto sin tener en cuenta los acentos y la eñe. Busca tipo instits
 *
 * @param $text
 */
function convertir_para_busqueda_avanzada($text){
    $text = strtolower($text);

        // reemplado las palabras abreviadas por su version con puntos
        //  EJ: a EET quedaria: E.E.T, es para mejorar la busqueda
        /*
         * $tipoInstitsAbreviadas = array(
            'ipem'  => 'i.p.e.m',
            'cfp'   => 'c.f.p',
            'eet'   => 'e.e.t',
            'cent'  => 'c.e.n.t',
            'cea'   => 'c.e.a',
            'eea'   => 'e.e.a',
            'cfr'   => 'c.f.r',
        );*/
        /* @var $tipoInstit Tipoinstit */
        $tipoInstit =& ClassRegistry::init('Tipoinstit');
        $tipoInstitsAbreviadas = $tipoInstit->getAbreviados();

        if (!empty($tipoInstitsAbreviadas))
            $text = str_replace(array_keys($tipoInstitsAbreviadas), array_values($tipoInstitsAbreviadas), $text);

        $posiblesA = '(á|a|A|Á)';
        $posiblesE = '(é|e|E|É)';
        $posiblesI = '(í|i|I|Í)';
        $posiblesO = '(ó|o|O|Ó)';
        $posiblesU = '(ú|u|ü|Ú|U|Ü)';

        $text = trim($text);
        $text = "%$text%";
        $patron = array (
                // Espacios, puntos y comas por guion
                ',' => '\.',
                '.' => '\.',

                // Vocales
                'a' => $posiblesA,
                'e' => $posiblesE,
                'i' => $posiblesI,
                'o' => $posiblesO,
                'u' => $posiblesU,

                'Ü' => $posiblesU,
                'ü' => $posiblesU,

                'A' => $posiblesA,
                'E' => $posiblesE,
                'I' => $posiblesI,
                'O' => $posiblesO,
                'U' => $posiblesU,

                'Á' => $posiblesA,
                'É' => $posiblesE,
                'Í' => $posiblesI,
                'Ó' => $posiblesO,
                'Ú' => $posiblesU,

                'á' => $posiblesA,
                'é' => $posiblesE,
                'í' => $posiblesI,
                'ó' => $posiblesO,
                'ú' => $posiblesU,

                'ñ' => '(n|ñ)',

                // Agregar aqui mas caracteres si es necesario
                '°'  => '',
                'º'  => '',
                'n°' => '%',
                'nº' => '%',
                ' '  => '%',
                '('  => '%',
                ')'  => '%',

        );
        // caracteres especiales de expresiones regulares
        //$text = preg_quote($text);

        $text_aux = '';
        for($i=0; $i<strlen($text); $i++){
                $caracter =  low($text[$i]);

                if ( key_exists($caracter, $patron) ) {
                    $text_aux .= $patron[$caracter];
                } else {
                    $text_aux .= $caracter;
                }
        }

        return $text_aux;
}

/**
 *
 * Lo que hace es convertir una cadena en una expresion regular para
 * buscar el texto sin tener en cuenta los acentos y la eñe
 *
 * @param $text
 */
function convertir_texto_plano($text){
    $text = strtolower($text);

        $posiblesA = '(á|a|A|Á)';
        $posiblesE = '(é|e|E|É)';
        $posiblesI = '(í|i|I|Í)';
        $posiblesO = '(ó|o|O|Ó)';
        $posiblesU = '(ú|u|ü|Ú|U|Ü)';

        $text = trim($text);
        $text = "%$text%";
        $patron = array (
                // Espacios, puntos y comas por guion
                '/.,/' => '\.',

                // Vocales
                '/a/' => $posiblesA,
                '/e/' => $posiblesE,
                '/i/' => $posiblesI,
                '/o/' => $posiblesO,
                '/u/' => $posiblesU,

                '/Ü/' => $posiblesU,
                '/ü/' => $posiblesU,

                '/A/' => $posiblesA,
                '/E/' => $posiblesE,
                '/I/' => $posiblesI,
                '/O/' => $posiblesO,
                '/U/' => $posiblesU,

                '/Á/' => $posiblesA,
                '/É/' => $posiblesE,
                '/Í/' => $posiblesI,
                '/Ó/' => $posiblesO,
                '/Ú/' => $posiblesU,

                '/á/' => $posiblesA,
                '/é/' => $posiblesE,
                '/í/' => $posiblesI,
                '/ó/' => $posiblesO,
                '/ú/' => $posiblesU,

                '/s/' => '(z|s|c)',
                '/c/' => '(z|s|c)',
                '/z/' => '(z|s|c)',

                // Agregar aqui mas caracteres si es necesario
                '/°/' => '',
                '/º/' => '',
                '/n°/' => '%',
                '/nº/' => '%',
                '/ /' => '%',

        );
        // caracteres especiales de expresiones regulares
        //$text = preg_quote($text);

        $text_aux = '';
        for($i=0; $i<strlen($text); $i++){
                $caracter =  $text[$i];
                $text_aux .= preg_replace(array_keys($patron),array_values($patron),$caracter,1);
        }

        return $text_aux;
}



function ordenarPlanesPorEtapaOrden($planes)
{
    $arrayOrdenKeys = array();
    $planetes = array('Plan'=> array());

    // agrupo los Planes por Orden de la etapa
    foreach ( $planes['Plan'] as $p ) {
        $ordenPlan = $p['EstructuraPlan']['Etapa']['orden'];
        $arrayOrdenKeys[$ordenPlan][] = $p;
    }

    // ordeno por Orden
    ksort(&$arrayOrdenKeys);

    // armo el array de Planes para devolver, desagrupandolos del arrayOrden
    foreach ($arrayOrdenKeys as $ops) {
        foreach ($ops as $p) {
            $planetes['Plan'][] = $p;
        }
    }
    $planes = $planetes;
    return $planetes;
}

function isNull($val,$nullString)
{
    return (strlen($val) == 0)?$nullString:$val;
}

function notEmpty($var)
{
    return !empty($var);
}

function joinNotNull($glue, $val){
    $values = array_filter($val, "notEmpty");
    echo join($glue, $values);
}

/**
 * Returns a lower case string with all spaces converted to $replacement and non word characters removed.
 *
 * @param string $string
 * @param string $replacement
 * @param int $length  max string length
 * @return string
 * @access public
 */
function slug($string, $replacement = '-', $length = 100) {
    $tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
    $replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
    $string = strtolower(strtr($string,$tofind,$replac));
    
    $posParentesisIni = strpos($string, '(');
    $posParentesisFin = strpos($string, ')');
    if ($posParentesisIni !== false && $posParentesisFin !== false && $posParentesisFin > $posParentesisIni) {
        // existe algo entre paréntesis, se elimina
        $string = substr_replace($string, '', $posParentesisIni, $posParentesisFin - $posParentesisIni);
    }

    $string = Inflector::slug($string, $replacement);

    if (strlen($string) > $length) {
        $string = substr($string, 0, $length);
    }

    return $string;
}

    function actual_date ()  
    {  
        $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
        $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
        $year_now = date ("Y");  
        $month_now = date ("n");  
        $day_now = date ("j");  
        $week_day_now = date ("w");  
        $date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
        return $date;    
    }  
    
    



?>
