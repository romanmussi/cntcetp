<?php

//header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); // // HTTP/1.1
//header("Pragma: no-cache");
//header("Expires: Mon, 17 Dec 2007 00:00:00 GMT"); // Date in the past

/* @var $html HtmlHelper */
$html;
/* @var $javascript JavascriptHelper */
$javascript;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <?php echo $html->charset(); ?>

        <title>
            <?php
            if (!empty($title_for_layout)) {
                echo  $title_for_layout;
                echo Configure::read('version')." - ";
            } ?>
            <?php __('Catálogo Nacional de Títulos y Certificaciones de Educación Técnico Profesional'); ?>
        </title>

        <script type="text/javascript">

            // URL global que apunta al path de mi sitio, sirve para hacer llamadas
            // ajax a controlador/action sin problema utilizando:
            // urlDomain+'controlador/action'
            var urlDomain = "<?php echo $this->base?>";


            // Edit to suit your needs.
            var ADAPT_CONFIG = {
                // Where is your CSS?
                path: "<?php echo $html->url('/css/adapt/'); ?>",

                // false = Only run once, when page first loads.
                // true = Change on window resize and page tilt.
                dynamic: false,

                // First range entry is the minimum.
                // Last range entry is the maximum.
                // Separate ranges by "to" keyword.
                range: [
                    '760px  to 980px  = 720.min.css',
                    '980px  to 1920px = 960.min.css'
                ]
            };
        </script>
        <?php
        echo $html->meta('icon');

        echo $javascript->link('http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js');
        
        $combinator->prepend_libs('css', array(
            'catalogo',
            'catalogo.menu',
            'iconize',
            'catalogo.default_header',
        ));

        $combinator->prepend_libs('js', array(
            'adapt.min.js',
            'views/layout/default',
        ));

        echo $combinator->scripts('css');

        
        echo $html->css('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/redmond/jquery-ui.css','stylesheet');
//        echo $html->css('ui-redmond/jquery-ui-1.8.12.custom','stylesheet');
        echo $html->css('printer','stylesheet', array('media'=>'print'));
        echo $html->css('catalogo800x600',
                        'stylesheet', array(
                            'media' => 'screen and (max-width: 960px)'
                            ));

        echo $combinator->scripts('js');

        $jsPoner = 'views'.DS.Inflector::underscore($this->name).DS.$this->action;
        $jsView = WWW_ROOT.'js'.DS.$jsPoner;
        if (file_exists($jsView.'.js')) {
            echo $javascript->link($jsPoner);
        }
//        echo $javascript->link('jquery-ui-1.8.16.custom.min');
        echo $javascript->link('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
        
        
        echo $scripts_for_layout;

        ?>
        
        <!--[if IE 6]>
        <?php echo $html->css('catalogo.ie6_fix');?>
        <![endif]-->
        

    </head>
    <body>
        <div class="wrapper">
              <!--[if lt IE 7]>
              <div style='border: 1px solid #F7941D; background: #FEEFDA; text-align: center; clear: both; height: 75px; position: relative;'>
                <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'><a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-cornerx.jpg' style='border: none;' alt='Cierra este aviso'/></a></div>
                <div style='width: 640px; margin: 0 auto; text-align: left; padding: 0; overflow: hidden; color: black;'>
                  <div style='width: 75px; float: left;'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-warning.jpg' alt='¡Aviso!'/></div>
                  <div style='width: 275px; float: left; font-family: Arial, sans-serif;'>
                    <div style='font-size: 14px; font-weight: bold; margin-top: 12px;'>Usted está usando un navegador obsoleto.</div>
                    <div style='font-size: 12px; margin-top: 6px; line-height: 12px;'>Para navegar mejor por este sitio, por favor, actualice su navegador.</div>
                  </div>
                  <div style='width: 75px; float: left;'><a href='http://www.mozilla-europe.org/es/firefox/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-firefox.jpg' style='border: none;' alt='Get Firefox 3.5'/></a></div>
                  <div style='width: 75px; float: left;'><a href='http://www.microsoft.com/downloads/details.aspx?FamilyID=341c2ad5-8c3d-4347-8c03-08cdecd8852b&DisplayLang=es' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-ie8.jpg' style='border: none;' alt='Get Internet Explorer 8'/></a></div>
                  <div style='width: 73px; float: left;'><a href='http://www.apple.com/es/safari/download/' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-safari.jpg' style='border: none;' alt='Get Safari 4'/></a></div>
                  <div style='float: left;'><a href='http://www.google.com/chrome?hl=es' target='_blank'><img src='http://www.ie6nomore.com/files/theme/ie6nomore-chrome.jpg' style='border: none;' alt='Get Google Chrome'/></a></div>
                </div>
              </div>
              <![endif]-->
              
              <!--[if !IE 7]>
                    <style type="text/css">
                            #wrap {display:table;height:100%}
                    </style>
            <![endif]-->


            
            <!--     Header       -->
            <?php echo $this->element('default_header')?>
            <!--     Fin del Header       -->

            <?php $session->flash(); ?>
            <?php $session->flash('auth'); ?>
            
            <div id="container" class ="container_12">
                <?php echo $content_for_layout; ?>
                
                <?php echo $cakeDebug; ?>
                <div class="clear" style="height: 15px;"></div>
            </div> <!-- FIN div #container -->

            
            
            
    </div>  

            
            <div id="footer" class="no-print">                
                <div class="container_12">
                    <div class="sponsors grid_3">
                        <?php echo $html->link(
                                    $html->image('logoinet.gif', array(
                                            'alt'=> __("Inet", true),
                                            'border'=>"0",
                                            'style' => 'height: 50px;'
                                            )),
                                    'http://www.inet.edu.ar',
                                    array(
                                        'target'=>'_blank'),
                                    null,
                                    false
                            );
                        ?>
                    </div>
                    
                    <div class="grid_6">
                        <div class="clear separador"></div>
                        <b><i>Instituto Nacional de Educación Tecnológica</i></b>
                        <br />
                        Saavedra 789 C1229ACE | (011) 4129-2000
                        <br /><br />
                        
                        
                         <p>
                            Fecha de actualización: <b><?php echo FECHA_ACTUALIZACION_DDBB ?></b>
                        </p>
                        
                        
                        <?php echo $html->link('Mapa del sitio', array('controller' => 'pages', 'action' => 'mapa_del_sitio')); ?>
                         - 
                        <?php echo $html->link('Contacto', array('controller' => 'correos', 'action' => 'contacto')); ?>
                         
                         
                    </div>


                    <div class="sponsors grid_3">
                        <?php echo $html->link($html->image('me_trans.png', array( 'border'=> 0,'style' => 'height: 50px;')),'http://www.me.gov.ar/', array('target' => '_blank'), null, false); ?>
                    </div>

                </div>
            </div>
            
        <script type="text/javascript">

         var _gaq = _gaq || [];
         _gaq.push(['_setAccount', 'UA-15728470-2']);
         _gaq.push(['_trackPageview']);

         (function() {
           var ga = document.createElement('script'); ga.type = 'text/javascript'; 
           ga.async = true;
           ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
           var s = document.getElementsByTagName('script')[0];
           s.parentNode.insertBefore(ga, s);
         })();

        </script>
    </body>

</html>
