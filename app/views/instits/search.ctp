<?

echo $html->css(array(
    'jquery.loadmask',
    'catalogo.advanced_search',
    'catalogo.instits',
        ), $inline = false);
?>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        init__SearchFormJs("<? echo $html->url(array('controller' => 'localidades', 'action' => 'ajax_search_localidades')); ?>");
    });
</script>

<div class="grid_12 titulos search">
<h1><? __('Búsqueda de Instituciones') ?></h1>
<div class="boxblanca instits search_form">

    <h3>Seleccione criterios de búsqueda</h3>

    <div class="box_izquierda inputs_largos">
        <?php
        echo $form->create('Instit', array(
            'action' => $this->action,
            'name' => 'InstitSearchForm',
            'id' => 'InstitSearchForm',
            'type' => 'get',
                )
        );

        echo $form->input('jurisdiccion_id', array('label' => 'Jurisdicción',
            'empty' => array('0' => 'Todas'),
            'id' => 'jurisdiccion_id'));
        echo $form->input('departamento_id', array(
            'label' => 'Departamento'.$html->image('indicator.gif', array('style' =>'height: 23px; margin-bottom: -7px; display: none', 'id'=>'depto-loader')),
            'empty' => 'Todos',
            'id' => 'departamento_id',
        ));
        
        if($localidad != null){
           $localidad_name =  $localidad['Localidad']['name'];
           $localidad_id = $localidad['Localidad']['id'];
        }
        else{
            $localidad_name =  "";
            $localidad_id = "";
        }
        
        echo $form->input('Localidad.name', array('label' => 'Localidad','value'=>$localidad_name));
        
                ?>
        <input id="hiddenLocId" name="localidad_id" type="hidden" value="<?php echo $localidad_id?>" />
    </div>

    <div class="box_derecha inputs_largos">
<?php
echo $form->input('direccion', array('label' => 'Domicilio',));

echo $form->input('busqueda_libre', array(
    'id' => 'InstitCue',
    'label' => 'CUE o Nombre de la Institución',
));
?>

        <div class="clear" style="height: 29px;"></div>
        <?php
        echo $form->end('Buscar');
        ?>
        
    </div>
    <div class="clear separador"></div>
</div>



<div class="clear separador"></div>

<?php
if (!empty($vino_formulario)) {
    ?>

    <?php $paginator->options(array('url' => $this->passedArgs)); ?>

    <div class="boxblanca" id="search_results">

        <h3>Listado de resultados</h3>
    <? if (sizeof($conditions) > 0): ?>
            Criterios de búsqueda seleccionados:
            <dl class="criterios_busq">
        <?
        foreach ($conditions as $key => $value) {
            ?><dt><?
            echo '- ' . $key . ': ';
            ?></dt><?
            ?><dd><?
            echo $value . "&nbsp";
            ?></dd><?
        }
        ?>
            </dl>
            <? endif; ?>
        <div class="list-header">
            <div class="sorter">
        <?php
        $sort = 'cue';
        if (isset($this->passedArgs['sort'])) {
            $sort = $this->passedArgs['sort'];
        }
        ?>
                Ordenar por:
                <? $class = ($sort == 'cue') ? 'marcada' : ''; ?>
                <span class="<?= $class ?>"><?php echo $paginator->sort('CUE', 'cue'); ?></span>,

                <? $class = ($sort == 'Jurisdiccion.name') ? 'marcada' : ''; ?>
                <span class="<?= $class ?>"><?php echo $paginator->sort('Jurisdicción', 'Jurisdiccion.name'); ?></span>,

                <? $class = ($sort == 'Departamento.name') ? 'marcada' : ''; ?>
                <span class="<?= $class ?>"><?php echo $paginator->sort('Departamento', 'Departamento.name'); ?></span>,

                <? $class = ($sort == 'Localidad.name') ? 'marcada' : ''; ?>
                <span class="<?= $class ?>"><?php echo $paginator->sort('Localidad', 'Localidad.name'); ?></span>

            </div>
            <div class="paging">
    <?php echo $paginator->counter(array(
        'format' => __('Instituciones %start%-%end% de <strong>%count%</strong>', true))); ?>
            </div>
            <div class="clear"></div>
        </div>
                <? if (sizeof($instits) > 0) { ?>
            <ul id="items" class="items">
        <?php foreach ($instits as $instit) : ?>
                <?
                $anio_actual = date("Y");
                $fecha_hasta = "$anio_actual-07-21"; //hasta julio
                $fecha_desde = "$anio_actual-01-01"; //desde enero
                $clase = '';
                if ($instit['Instit']['activo']) {
                    $clase .= ' escuela_activa';
                } else {
                    $clase .= ' escuela_inactiva';
                }
                ?>
                    <li>
                        <a href="<?php
            echo $html->url(array(
                'controller' => 'instits',
                'action' => 'view',
                'id' => $instit['Instit']['id'],
                'slug' => slug($instit['Instit']['nombre_completo'])))
                ?>" class="linkconatiner-more-info">

                            <span class="items-nombre">
            <?= "" . ($instit['Instit']['cue'] * 100) + $instit['Instit']['anexo'] . " - " . $instit['Instit']['nombre_completo']; ?>
                            </span>
                            <br />
                            <span class="items-gestion"><?= $instit['Gestion']['name'] ?></span>
                            <span class="items-domicilio">
                                &nbsp; - 
                                Domicilio: 
            <?php
            echo joinNotNull(", ", array($instit['Instit']['direccion'], $instit['Instit']['lugar'],
                $instit['Localidad']['name'],
                $instit['Departamento']['name'] == $instit['Localidad']['name'] ? null : $instit['Departamento']['name'],
                $instit['Jurisdiccion']['name']));
            ?>
                            </span>


                            <div class="clear"></div>
                        </a>
                    </li>

        <? endforeach ?>
            </ul>
                <?php
            } else {
                ?>
            <div class="clear"></div><br />
            <div id="no_results" style="color: red">No hay resultados</div><br />

        <?php
    }
    ?>
        <div class="clear separador"></div>

        <?php if ($paginator->numbers()) { ?>
            <div style="text-align:center; display:block;margin-bottom: 10px">
            <?php
            echo $paginator->prev('« Anterior ', null, null, array('class' => 'disabled', 'tag' => 'span'));
            echo " | " . $paginator->numbers(array('modulus' => '9')) . " | ";
            echo $paginator->next(' Siguiente »', null, null, array('class' => 'disabled'));
            ?>
                <div id="ajax_paginator_indicator" style="display: none;text-align: center"><?php echo $html->image('ajax-loader.gif') ?></div>
            </div>
            <?php } ?>
    </div>
        <?php } ?>
</div>