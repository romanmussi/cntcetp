<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
        
        Router::connect('/docs/*', array('controller' => 'pages', 'action' => 'display'));
        
        Router::connect('/files', '/app/webroot/files');

        Router::connect('/guia-del-estudiante', array('controller' => 'titulos', 'action' => 'guiaDelEstudiante'));

        Router::connect('/titulos-nivel-secundario-tecnico', array('controller' => 'titulos', 'action' => 'search', 3));
        Router::connect('/titulos-nivel-superior-tecnico', array('controller' => 'titulos', 'action' => 'search', 4));
        Router::connect('/titulos-formacion-profesional', array('controller' => 'titulos', 'action' => 'search', 1));
        
        /* buscador con sector preseleccionado */
        Router::connect('/titulos-agropecuarios', array('controller' => 'titulos', 'action' => 'search', 0, 3));
        Router::connect('/titulos-automotriz', array('controller' => 'titulos', 'action' => 'search', 0, 4));
        Router::connect('/titulos-construcciones', array('controller' => 'titulos', 'action' => 'search', 0, 8));
        Router::connect('/titulos-energia-electrica', array('controller' => 'titulos', 'action' => 'search', 0, 7));
        Router::connect('/titulos-estetica-profesional', array('controller' => 'titulos', 'action' => 'search', 0, 25));
        Router::connect('/titulos-informatica', array('controller' => 'titulos', 'action' => 'search', 0, 16));
        Router::connect('/titulos-madera-y-mueble', array('controller' => 'titulos', 'action' => 'search', 0, 17));
        Router::connect('/titulos-metalmecanica', array('controller' => 'titulos', 'action' => 'search', 0, 18));
        Router::connect('/titulos-salud', array('controller' => 'titulos', 'action' => 'search', 0, 30));
        Router::connect('/titulos-textil-e-indumentaria', array('controller' => 'titulos', 'action' => 'search', 0, 40));
        

        Router::connect('/buscador-de-titulos-y-certificaciones', array('controller' => 'titulos', 'action' => 'search'));
        Router::connect('/buscador-de-instituciones', array('controller' => 'instits', 'action' => 'search'));

        Router::connect('/contacto', array('controller' => 'correos', 'action' => 'contacto'));
        

        Router::connect(    // E.g. /titulos/CakePHP_Rocks-3
            '/titulo/:slug-:id',
            array('controller' => 'titulos', 'action' => 'view'),
            array(
                // order matters since this will simply map ":id" to $id in your action
                'pass' => array('id', 'slug'),
                'id' => '[0-9]+'
            )
        );

        Router::connect(    // E.g. /instits/CakePHP_Rocks-3
            '/institucion/:slug-:id',
            array('controller' => 'instits', 'action' => 'view'),
            array(
                // order matters since this will simply map ":id" to $id in your action
                'pass' => array('id', 'slug'),
                'id' => '[0-9]+'
            )
        );
        
        
        Router::parseExtensions('json');
?>