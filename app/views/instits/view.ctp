<?php
echo $html->css('catalogo.instits', false);
$cue_instit = ($instit['Instit']['cue']*100)+$instit['Instit']['anexo'];
$this->pageTitle =  $cue_instit.' '.$instit['Instit']['nombre_completo'];
?>
<div class="grid_12">
    <h1>
        <?php echo $cue_instit ?> <?php echo $instit['Instit']['nombre_completo'] ?>
    </h1>

        <div class="boxblanca">
            <div class="ficha_info">
                <h3>Datos generales de la instituci�n</h3>
                <dl>
                    <?php if($instit['Instit']['claseinstit_id']) {?>
                    <dt><?php __('Tipo de Instituci�n'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Claseinstit']['name'])) {
                                echo $instit['Claseinstit']['name'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
                        <?php }?>


                    <? if($instit['Orientacion']['name']) {?>
                    <dt ><?php __('Orientaci�n'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Orientacion']['name'])) {
                                echo $instit['Orientacion']['name'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
                        <? } ?>
                    <dt ><?php __('�mbito de Gesti�n'); ?>:</dt>
                    <dd>
                        <?php
                        if(!empty($instit['Gestion']['name'])) {
                            echo $instit['Gestion']['name'];
                        }else {
                            echo "<i>No declarado</i>";
                        } ?>
                    </dd>

                    <dt><?php __('Tipo de Dependencia'); ?>:</dt>
                    <dd>
                        <?php
                        if(!empty($instit['Dependencia']['name'])) {
                            echo $instit['Dependencia']['name'];
                        }else {
                            echo "<i>No declarado</i>";
                        } ?>
                    </dd>
                   
                </dl>
            </div>    
            <div class="ficha_info right">
                <h3 class="instit">Ficha de contacto</h3>
                <dl>
                    <dt style="width:110px;"><?php __('Direcci�n'); ?>:</dt>
                    <dd>
                        <?php
                        echo joinNotNull(", ", array($instit['Instit']['direccion'],$instit['Instit']['lugar'],
                        $instit['Localidad']['name'],
                        $instit['Departamento']['name'] == $instit['Localidad']['name']?null:$instit['Departamento']['name'],
                        $instit['Jurisdiccion']['name']));
                        ?>
                    </dd>

                    <dt style="width:110px;"><?php __('C�digo Postal'); ?>:</dt>
                    <dd>
                        <?php
                        if(!empty($instit['Instit']['cp'])) {
                            echo $instit['Instit']['cp'];
                        }else {
                            echo "<i>No declarado</i>";
                        } ?>
                    </dd>

                    <?php if($instit['Instit']['telefono']): ?>
                    <dt style="width:110px;"><?php __('Tel�fono'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Instit']['telefono'])) {
                                echo $instit['Instit']['telefono'];
                            }?>
                    </dd>
                    <?php endif;?>

                    <?php if($instit['Instit']['mail']): ?>
                    <dt style="width:110px;"><?php __('E-Mail'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Instit']['mail'])) {
                                echo $html->link($instit['Instit']['mail'], 'mailto:'.$instit['Instit']['mail'] , array('target'=>'_blank'));
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
                    <?php endif;?>
                    <?php if($instit['Instit']['web']): ?>
                    <dt style="width:110px;"><?php __('Web'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Instit']['web'])) {
                                echo $html->link($instit['Instit']['web'], 'http://'.$instit['Instit']['web'] , array('target'=>'_blank'));
                                //echo $instit['Instit']['web'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
                    <?php endif;?>
                </dl>
                
                
                <?php 
                echo $html->link(
                        'Notificar informaci�n desactualizada',
                        array(
                            'controller'  => 'correos',
                            'action'      => 'desactualizada',
                            'nombre_completo' => urlencode($instit['Instit']['nombre_completo']),
                            'cue_instit' => $cue_instit,
                        ),
                        array(
                            'id' => 'alerta-desactualizada',
                            )); 
                ?>                      
                            
            </div>
        <div class="clear"></div>
    </div>

    <div class="clear" style="height: 10px;"></div>

    
    <div class="boxblanca">
        <h3 class="titulo">T�tulos o Certificaciones que ofrece la instituci�n</h3>
        <?php
        if (!empty($referer)) {
            
            $planNombre = '';
            $planNombre .= $referer['Plan']['nombre'];
            
            if (!empty($referer['Titulo']) && strcasecmp(trim($referer['Plan']['nombre']), trim($referer['Titulo']['name'])) != 0) {

                $planNombre .= ' (' .  $referer['Titulo']['name'] . ')';
            }
            
            if ($instit['Instit']['gestion_id'] == 1 && $referer['Titulo']['es_bb']) {
                $planNombre .= " ". $html->image('bb.png', array(
                    'alt'=> __(BB_ALT, true),
                    'title'=> __(BB_ALT, true),
                    'border'=>"0",
                    'class'=>'prioritaria-icon'
                    ));

                $contieneBb = true;
            }
        ?>
            <h4 style='margin-top: 15px;'>T�tulo o Certificado seleccionado</h4>
            <ul id="titulos-list" class="titulos-list items">
                <li onclick="viewTitulo('<?php echo $html->url('/titulos/view_titulo_plan/'.$referer['Titulo']['id'].'/'.$referer['Plan']['id'])?>', '<?php echo $referer['Titulo']['name']?>');">
                    <a class="linkconatiner-more-info">
                        <?php echo $planNombre?>
                    </a>
                </li>
            </ul>
        <?php
        }
        
        if ( !empty($planes) && !(count($planes) == 1 && !empty($referer)) ) {
        ?>  
            <h4 style='margin-top: 15px;'>Otras ofertas de la instituci�n</h4>
            <ul id="titulos-list" class="titulos-list items">
            <?php
            $ofertaAnt = '';
            foreach ($planes as $plan) {
                if (empty($referer) || (!empty($referer) && $plan['Titulo']['id'] != $referer['Titulo']['id'])) {
                    
                    if ($ofertaAnt != $plan['Oferta']['id'] ) {
                        echo "<h4 style='margin-top: 15px;'>". $plan['Oferta']['name'] ."</h4>";
                        $ofertaAnt = $plan['Oferta']['id'];
                    }
                    // inicializo el nombre del titulo que voy a escribir
                    $planTituloNombre = '';
                    $planNombre = '';
                    // le agrego un link hacia el titulo de referencias

                    $planNombre .= $plan['Plan']['nombre'];


                    // si el titulo de referencia es distinto que el nombre del
                    // plan se lo tengo que agregar entre parentesis
                    // entonces quedaria: Asistente de Peluquero (Titulo: Peluquero)
                    if (!empty($plan['Titulo']) && strcasecmp(trim($plan['Plan']['nombre']), trim($plan['Titulo']['name'])) != 0) {

                        $planNombre .= ' (' .  $plan['Titulo']['name'] . ')';
                    }

                    if ($instit['Instit']['gestion_id'] == 1 && $plan['Titulo']['es_bb']) {
                        $planNombre .= " ". $html->image('bb.png', array(
                            'alt'=> __(BB_ALT, true),
                            'title'=> __(BB_ALT, true),
                            'border'=>"0",
                            'class'=>'prioritaria-icon'
                            ));

                        $contieneBb = true;
                    }
                    ?>
                    <li onclick="viewTitulo('<?php echo $html->url('/titulos/view_titulo_plan/'.$plan['Titulo']['id'].'/'.$plan['Plan']['id'])?>', '<?php echo $plan['Titulo']['name']?>');">
                        <a class="linkconatiner-more-info">
                            <?php echo $planNombre?>
                        </a>
                    </li>
        <?php 
                }
            }
        }
        
        if (empty($planes)) {
        ?>
            <i>La instituci�n no presenta T�tulos ni Certificaciones</i>
        <?php
        }
        ?>
        </ul>
        <div class="clear"></div>
    </div>
    
    <?php 
    if ($instit['Instit']['gestion_id'] == 1 && !empty($contieneBb) && $contieneBb) {
        echo $this->element('aclaracion_bb');
    } ?>
    

    <? /*echo $html->link(
        '<div id="alerta-desactualizada" class="grid_3 boxgris alerta-desactualizada">
Si ha notado alg�n dato desactualizado, haga click aqu�</div>',
        '#',
        array(
           'escape' => false
        ));*/
    ?>
    <div class="clear"></div>

    
</div>