<?php   
    echo $html->css(array('jquery.loadmask', 'catalogo.advanced_search', 'catalogo.titulos'), null, array(), false);
?>
<script type="text/javascript">
    $(document).ready(function(){
        init__SearchFormJs("<? echo $html->url(array('controller' => 'localidades', 'action' => 'ajax_search_localidades')); ?>");
    });
</script>
<div class="grid_12 titulos search">
    
    <h1><?php __('Búsqueda de Títulos');?><?php echo empty($oferta_id)?'':' de Nivel: '.$ofertas[$oferta_id]?></h1>

    <div class="boxblanca inputs_largos">
        <h3>Seleccione criterios de búsqueda</h3>
        <?php
        $oferta = empty($oferta_id) ? '' : '/'.$oferta_id;
        echo $form->create('Titulo', array(
            'url' => array('action' => $this->action, $oferta),
            'name'=>'TituloSearchForm',
            'id' =>'TituloSearchForm',
            'type' => 'get',
            )
        );
        ?>
        <div class="box_izquierda inputs_largos">
            <h4>Nivel y Sector</h4>
            <?php
                echo $form->input('oferta_id',array( 'div' => true,
                                                    'class' => 'autosubmit ',
                                                    'label'=> 'Nivel',
                                                    'id' => 'ofertaId',
                                                    'empty' => 'Todos',
                                                    'type' => (empty($oferta_id) ? 'select' : 'hidden'),
                                                   ));
                
                
                echo $form->input('SectoresTitulo.sector_id',array(
                    'label'=>'Sector',
                    'id'=>'SectorId',
                    'empty'=>'Todos'
                ));

                echo $form->input('SectoresTitulo.subsector_id',array(
                    'type' => 'select',
                    'id'=>'SubsectorId',
                    'label'=>'Subsector'.$html->image('indicator.gif', array('style' =>'height: 23px; margin-bottom: -7px; display: none', 'id'=>'subsector-loader')),
                    'empty'=>'Todos',
                ));

                echo $form->input('tituloname', array( 'label'=> 'Nombre del Título' ));
                ?>
        </div>
        <div class="box_derecha">
            <h4>Localización</h4>
            <?php
            
            echo $form->input('Instit.jurisdiccion_id', array('label'=>'Jurisdicción',
                                                                  'div' => false,
                                                                  'class' => 'autosubmit ',
                                                                  'empty' => array('0'=>'Todas'),
                                                                  'id'=>'jurisdiccion_id'));
                
            echo $form->input('Instit.departamento_id', array(
                'id' => 'departamento_id',
                'label'=>'Departamento'.$html->image('indicator.gif', array('style' =>'height: 23px; margin-bottom: -7px; display: none', 'id'=>'depto-loader')), 
                'empty' => 'Todos'));

            $localidad_name =  "";
                $localidad_id = "";
            if($localidad != null){
               $localidad_name =  $localidad['Localidad']['name'];
               if (!empty($localidad['Localidad']['id'])) {
                    $localidad_id = $localidad['Localidad']['id'];
               }
            }
            elseif (!empty($this->data['Titulo']['localidad_name'])){
                $localidad_name =  $this->data['Titulo']['localidad_name'];
            }

            echo $form->input('Instit.localidad_name', array('label' => 'Localidad','value'=>$localidad_name, 'id' => 'LocalidadName'));

            ?>
            <input id="hiddenLocId" name="localidad_id" type="hidden" value="<?php echo $localidad_id?>" />
            
            <div class="clear" style="height:23px;"></div>
            
            <?php
            echo $form->end('Buscar');
            ?>

        </div>
        <div class="clear" style="height:15px;"></div>

        <div class="clear"></div>
    </div>




    <div class="clear separador"></div>

<?php

if ($vino_formulario) {
    

    $paginator->options(array( 'url' => $this->passedArgs,
                               'indicator'=> 'ajax_paginator_indicator'));
    ?>

    <div id="search_results" class="boxblanca">
        <h3>Listado de resultados</h3>
    <? if (sizeof($conditions)>0): ?>
            Criterios de búsqueda seleccionados:
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
        <?php endif; ?>
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
            <?php
            $i = 0;
            foreach ($titulos as $titulo):
                $url = array(
                        'controller' => 'titulos',
                        'action' => 'view',
                        'id' => $titulo['Titulo']['id'],
                        'slug' => slug($titulo['Titulo']['name'])
                    );
            
            if (!empty($this->passedArgs['Instit.jurisdiccion_id']) ){
                $url['Instit.jurisdiccion_id'] = $this->passedArgs['Instit.jurisdiccion_id'];
            }
            if (!empty($this->passedArgs['Instit.departamento_id']) ){
                $url['Instit.departamento_id'] = $this->passedArgs['Instit.departamento_id'];
            }
            if (!empty($this->passedArgs['Instit.localidad_id']) ){
                $url['Instit.localidad_id'] = $this->passedArgs['Instit.localidad_id'];
            }
            ?>
            <li>
                <a href="<?php echo $html->url($url)?>"
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
            <div class="clear"></div><br />
            <div id="no_results" style="color: red">No hay resultados</div><br />
            
        <?php
        }
        ?>
            <div class="clear separador"></div>
        
        <?php
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
<?php } ?>
    
</div>