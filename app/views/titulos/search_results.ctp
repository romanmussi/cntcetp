<?php
$paginator->options(array( 'url' => $this->passedArgs,
                           'indicator'=> 'ajax_paginator_indicator'));
?>

<div id="search_results" class="boxblanca">
    <h3>Listado de resultados</h3>
    <div class="list-header">
        <div class="sorter">
            <?php
            $sort = 'Titulo.name';
            if(isset($this->passedArgs['sort'])){
            $sort = $this->passedArgs['sort'];
            }
            ?>
            Ordenar por:
            <? $class = ($sort == 'Titulo.name')?'marcada':'';?>
            <span class="<?= $class?>"><?php echo $paginator->sort('Nombre','Titulo.name');?></span>,

            <? $class = ($sort == 'Oferta.name')?'marcada':'';?>
            <span class="<?= $class?>"><?php echo $paginator->sort("Nivel",'Oferta.name');?></span>

        </div>
        <div class="paging">
            <?php echo $paginator->counter(array(
                'format' => __('Títulos %start%-%end% de <strong>%count%</strong>', true))); ?>
        </div>
        <div class="clear"></div>
    </div>
    <? if (!empty($titulos)) {?>
    <ul id="items" class="items">
        <li>
            <div>
                <span class="items-oferta" style="color: #b1cc2f">
                        Nivel
                </span>
                <span class="items-nombre" style="color: #b1cc2f">
                        Nombre del Título o Certificado
                </span>
            <div class="clear"></div>
            </div>
        </li>
        
        <?php
        $i = 0;
        foreach ($titulos as $titulo):
        ?>
        <li>
            <a href="<?php echo $html->url(array(
                                    'controller' => 'titulos',
                                    'action' => 'view',
                                    'id' => $titulo['Titulo']['id'],
                                    'slug' => slug($titulo['Titulo']['name'])))
                    ?>"
                    class="linkconatiner-more-info">
                    
                    <span class="items-oferta">
                        <?php
                        echo (empty($titulo['Oferta']['name']))? "" : $titulo['Oferta']['name'];
                        ?>
                    </span>
                    <span class="items-nombre">
                                <strong><?php
                                /*$linkTitulo = $html->link(
                                        " (".count($titulo['Plan'])." planes)",
                                        '/titulos/corrector_de_planes/Plan.titulo_id:'.$titulo['Titulo']['id'],
                                        array('target'=>'_blank')
                                        );*/
                                echo $titulo['Titulo']['name']; ?>
                                </strong>
                    </span>
                    
            
                    
            <div class="clear"></div>
            </a>
        </li>
            <?php endforeach; ?>
    </ul>
        <?php
    }
    else {
        ?>
    <div id="no_results">No hay resultados</div>
    <?php
    }

    if ($paginator->numbers()) {
    ?>
        <div style="text-align:center; margin-bottom: 10px">
            <?php
            echo $paginator->prev('« Anterior ',null, null, array('class' => 'disabled', 'tag' => 'span'));
            echo " | ".$paginator->numbers(array('modulus'=>'9'))." | ";
            echo $paginator->next(' Siguiente »', null, null, array('class' => 'disabled'));
            ?>
        </div>

        <div id="ajax_paginator_indicator" style="display: none;text-align: center"><?php echo $html->image('ajax-loader.gif')?></div>
        <?php  } ?>
    <div class="clear"></div>
</div>