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
                <h3>Datos generales de la institución</h3>
                <dl>
                    <?php if($instit['Instit']['claseinstit_id']) {?>
                    <dt><?php __('Tipo de Institución'); ?>:</dt>
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
                    <dt ><?php __('Orientación'); ?>:</dt>
                    <dd>
                            <?php
                            if(!empty($instit['Orientacion']['name'])) {
                                echo $instit['Orientacion']['name'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
                        <? } ?>
                    <dt ><?php __('Ámbito de Gestión'); ?>:</dt>
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
                    <dt style="width:110px;"><?php __('Dirección'); ?>:</dt>
                    <dd>
                        <?php
                        echo joinNotNull(", ", array($instit['Instit']['direccion'],$instit['Instit']['lugar'],
                        $instit['Localidad']['name'],
                        $instit['Departamento']['name'] == $instit['Localidad']['name']?null:$instit['Departamento']['name'],
                        $instit['Jurisdiccion']['name']));
                        ?>
                    </dd>

                    <dt style="width:110px;"><?php __('Código Postal'); ?>:</dt>
                    <dd>
                        <?php
                        if(!empty($instit['Instit']['cp'])) {
                            echo $instit['Instit']['cp'];
                        }else {
                            echo "<i>No declarado</i>";
                        } ?>
                    </dd>

                    <?php if($instit['Instit']['telefono']): ?>
                    <dt style="width:110px;"><?php __('Teléfono'); ?>:</dt>
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
                                echo $hideMail->hide($instit['Instit']['mail']);
                                echo "&nbsp;"; //pongo un espacio para que el campo tome la altura del texto
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
                                echo $instit['Instit']['web'];
                            }else {
                                echo "<i>No declarado</i>";
                            } ?>
                    </dd>
                    <?php endif;?>
                </dl>
                
                
                <?php 
                echo $html->link(
                        'Notificar información desactualizada',
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
        <h3 class="titulo">Títulos o Certificaciones que ofrece la institución</h3>
        <?php
        if (!empty($planes)) {
            ?>  
        
        <ul id="titulos-list" class="titulos-list items">
        <?php
        $ofertaAnt = '';
        foreach ($planes as $plan) {
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

            ?>
            <li onclick="viewTitulo('<?php echo $html->url('/titulos/view_titulo_plan/'.$plan['Titulo']['id'].'/'.$plan['Plan']['id'])?>', '<?php echo $plan['Titulo']['name']?>');">
                <a class="linkconatiner-more-info">
                    <?php echo $planNombre?>
                </a>
            </li>
            <?php }?>
        </ul>
            <?php
        }
        else {
            ?>
        <i>La institución no presenta Títulos ni Certificaciones</i>
            <?php
        }
        ?>
        <div class="clear"></div>
    </div>
    

    <? /*echo $html->link(
        '<div id="alerta-desactualizada" class="grid_3 boxgris alerta-desactualizada">
Si ha notado algún dato desactualizado, haga click aquí</div>',
        '#',
        array(
           'escape' => false
        ));*/
    ?>
    <div class="clear"></div>

    
</div>