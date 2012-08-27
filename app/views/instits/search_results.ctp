<?php  $paginator->options(array('update' => 'search_results', 'url' => $this->passedArgs,'indicator'=> 'ajax_paginator_indicator')); ?>

<?php echo $html->css(array('catalogo.advanced_search', 'catalogo.instits'), $inline=false); ?>
<div id="search_results">
<? if (sizeof($conditions)>0): ?>	
	<dl class="criterios_busq">
	<?

	 foreach($conditions as $key => $value){
		?><dt><?
			echo '- '.$key.': ';
		?></dt><?
		?><dd><?
			echo $value."&nbsp";
		?></dd><?
	}

	?>
	</dl>
<? endif; ?>
    <div class="list-header">
        <div class="paging">
            <?php echo $paginator->counter(array(
                'format' => __('Instituciones %start%-%end% de <strong>%count%</strong>', true))); ?>
        </div>
        <div class="clear"></div>
    </div>
    <? if (sizeof($instits) > 0) { ?>
        <ul id="items" class="items">
        <?php foreach($instits as $instit) : ?>
            <?  $año_actual = date("Y");
                $fecha_hasta = "$año_actual-07-21"; //hasta julio
                $fecha_desde = "$año_actual-01-01"; //desde enero
                $clase = '';
                if($instit['Instit']['activo']) {
                    $clase .= ' escuela_activa';
                }else {
                    $clase .= ' escuela_inactiva';
                }
            ?>
            <li>
                <a href="<?php echo $html->url(array(
                                    'controller' => 'instits',
                                    'action' => 'view',                                    
                                    'id' => $instit['Instit']['id'],
                                    'slug' => slug($instit['Instit']['nombre_completo'])))
                        ?>" class="linkconatiner-more-info">
                    
                <span class="items-nombre">
                    <?= "".($instit['Instit']['cue']*100)+$instit['Instit']['anexo']." - ". $instit['Instit']['nombre_completo']; ?>
                </span>
                <br />
                <span class="items-gestion"><?= $instit['Gestion']['name'] ?></span>
                <span class="items-domicilio">
                    &nbsp; - 
                    Domicilio: 
                    <?php
                        echo joinNotNull(", ", array($instit['Instit']['direccion'],$instit['Instit']['lugar'],
                                             $instit['Localidad']['name'],
                                             $instit['Departamento']['name'] == $instit['Localidad']['name']?null:$instit['Departamento']['name'],
                                             $instit['Jurisdiccion']['name']));
                    ?>
                </span>
                
                
                <div class="clear"></div>
                </a>
            </li>

        <? endforeach?>
    </ul>
    <?php
    }
    else {
        ?>
    <div id="no_results">No hay resultados</div>
    <?php
    }
    
    if ($paginator->numbers()) { ?>
        <div style="text-align:center; display:block;margin-bottom: 10px">
            <?php
            echo $paginator->prev('« Anterior ',null, null, array('class' => 'disabled', 'tag' => 'span'));
            echo " | ".$paginator->numbers(array('modulus'=>'9'))." | ";
            echo $paginator->next(' Siguiente »', null, null, array('class' => 'disabled'));
            ?>
            <div id="ajax_paginator_indicator" style="display: none;text-align: center"><?php echo $html->image('ajax-loader.gif')?></div>
        </div>
    <?php } ?>
</div>