<?php
echo $javascript->link('jquery/jquery.tmpl.min', false);
echo $javascript->link('jquery.loadmask.min', false);
echo $javascript->link('jquery.blockUI', false);
echo $html->css(array('jquery.loadmask', 'catalogo.guia_del_estudiante'), $inline = false);
?>
<script id="tituloTemplate" type="text/x-jquery-tmpl">
    <li titulo-id="${Titulo.id}">
        <input type="radio" class="styled_checkbox" name="data[Plan][titulo_id]" value="${Titulo.id}" id="check_${Titulo.id}" />
        <label for="check_${Titulo.id}" class="titulo_label">
        <span class="items-nombre">
            <strong>${Titulo.name}</strong>
        </span>
        <br />
        <span class="items-oferta">
                ${Oferta.name}
        </span>
        </label>
        <div class="clear"></div>
    </li>
</script>

<script id="institTemplate" type="text/x-jquery-tmpl">
    <li>
        <a href="${Instit.url}">
            <div class="items-nombre">
                ${Instit.nombre_completo}
            </div>
            <div class="items-domicilio">
                ${Localidad.name}, ${Departamento.name}, ${Jurisdiccion.name}
            </div>
        </a>
    </li>
</script>
<?php  //$paginator->options(array('update' => 'consoleResult', 'url' => $this->passedArgs,'indicator'=> 'ajax_indicator')); ?>
<script id="paginatorTemplate" type="text/x-jquery-tmpl">
    <div class="list-header">
        <div class="sorter">
           ${desde}-${hasta} de <b>${cant}</b> ${texto}
        </div>
        <div class="paging">
             <span class="numbers">{{html numbers}}</span>
        </div>
        <div class="clear"></div>
    </div>
</script>

<div class="grid_12">
    <h1>Guía del Estudiante</h1>
    <p>La Guía del Estudiante ayudará a que puedas encontrarar dónde estudiar y obtener un título o certificación según tus gustos e intereses. </p>

    <div class="boxblanca">
        <?php echo $html->image('step1.gif', array('class' => 'step'));?>
       
        <div id="filtro">
             <h3>Seleccioná criterios de búsqueda</h3>
            <?php echo $form->create('Titulo', array(
            'action' => 'guia_del_estudiante', 'name'=>'TituloSearchForm',
            'id' =>'TituloSearchForm', ));
            ?>
            <div id="filtrosContainer">
                <?php echo $this->element('filtros');?>
            </div>
            <?php echo $form->end();?>
            <div class="clear"></div>
        </div>
        <div class="filtros-aplicados ">
            <h3>Criterios aplicados</h3>
            <?php echo $form->create('Titulo', array(
            'action' => 'guia_del_estudiante', 'name'=>'FiltrosAplicadosForm',
            'id' =>'FiltrosAplicadosForm' ));
            ?>
            <p id="sin_filtros">No hay fitros aplicados</p>

            <?php echo $form->end();?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="clear" style="height:20px;"></div>

<div id="resultados" class="grid_12">
    <div class="grid_6 alpha">
        <div id="li_titulos" class="boxblanca">
            <?php echo $form->create('Instit', array(
            'controller'=>'instits', 'action'=>'search_results.json',
            'id'=>'InstitSearchForm', 'name'=>'InstitSearchForm' ));
            ?>
            <?php echo $html->image('step2.gif', array('class' => 'step'));?>
            
            <h3>Seleccioná el titulo de interés</h3>
            <div class="results_titulos">
                <div class="paginatorContainer"></div>
                <ul class="seleccionados"></ul>
                <ul id="items" class="items results">
                    Sin Resultados
                </ul>
            </div>
            <?php echo $form->end(); ?>
        </div>
    </div>

    <div class="grid_6 omega">
        <div id="li_instits" class="boxblanca">
            <?php echo $html->image('step3.gif', array('class' => 'step'));?>
            
            <h3>Listado de Instituciones</h3>
            <div class="results_instits">
                <div class="paginatorContainer"></div>
                <ul id="items" class="items results" style="margin-top: 15px;">
                    Sin Resultados
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo $javascript->link('views/titulos/guia_del_estudiante_tail'); ?>

<script type="text/javascript">
jQuery(document).ready(function() {
    <?php
    if ($bySession) {
    ?>
        jQuery("#TituloSearchForm").submit();
    <?php
    }
    ?>
});
</script>