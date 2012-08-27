<?php
/**
 *
 * Esta funcion sirve para settear la clase "current" para la
 * solapa del menu principal. Por lo general hay varias paginas que hacen referencia a la misma solapa
 * por ejemplo, hay 5 buscadores. Si estoy en cualquier pagina del buscador, entonces 
 * quiero que este marcada la solapa buscadores como activa -'current'-
 * 
 * @param type $donde String, es el nombre del link
 * @return string es el nombre de la clase activa
 */
function currentPara($view, $donde){
    $nombreDeClaseCss = 'current';

    $pgs['Home'] = array(
        $view->base.'/pages/home',
        $view->base.'/',
        $view->base,
    );

    $pgs['Buscadores'] = array(
        $view->base.'/guia-del-estudiante',
        $view->base.'/titulos-nivel-secundario-tecnico',
        $view->base.'/titulos-nivel-superior-tecnico',
        $view->base.'/titulos-formacion-profesional',
        $view->base.'/buscador-de-titulos-y-certificaciones',
        $view->base.'/buscador-de-instituciones',
        $view->base.'/pages/buscadores',
    );

    return (in_array($view->here, $pgs[$donde] ))?$nombreDeClaseCss:'';
}
?>
<ul id="menu" class="nav sf-menu">
        <li class="<?php echo currentPara($this, 'Home');?>">
            <?php echo $html->link('Inicio', '/pages/home', array('class'=>'menu-item')); ?>
        </li>

        <li class="<?php echo currentPara($this, 'Buscadores');?>">
            <?php echo $html->link('Buscadores', array('controller'=>'pages', 'action'=>'buscadores'), array('class'=>'menu-item')); ?>
        </li>

        <li class="<?php echo ($this->here == $this->base.'/pages/doc_index')?'current':''?> ">
            <?php echo $html->link('Información Sectorial', array('controller'=>'pages', 'action'=>'doc_index'), array('class'=>'menu-item')); ?>
        </li>
        <li class="<?php echo (strstr($this->here,$this->base.'/contacto'))?'current':''?>">
            <?php echo $html->link('Contacto', array(
                                                'controller' => 'correos',
                                                'action'    => 'contacto'),
                                                array('class'=>'menu-item'))?>
        </li>
</ul>
