<?php
echo $html->css('catalogo.titulos', false);

$this->pageTitle =  $titulo['Titulo']['name'];
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        if (jQuery("#arrowlink").attr("src") == "<?php echo $html->url('/img'); ?>/arrow_down.png") {
            jQuery("#arrowlink").attr("src", "<?php echo $html->url('/img'); ?>/arrow_up.png");
        }
        else {
            jQuery("#arrowlink").attr("src", "<?php echo $html->url('/img'); ?>/arrow_down.png");
        }
    });
</script>
<div class="grid_12">
    <h1><?php echo $titulo['Titulo']['name']?></h1>
    <div class="boxblanca">
        <h3 class="titulo">Datos generales del título o certificación</h3>
        <dl>
            <dt style="width: 168px;"><?php __('Nivel'); ?>:</dt>
            <dd>
                <?php
                if(!empty($titulo['Oferta']['name'])) {
                    echo $titulo['Oferta']['name'];
                }else {
                    echo "<i>No declarado</i>";
                } ?>
            </dd>

            <dt style="width: 168px;"><?php __('Sectores / Subsectores'); ?>:</dt>
            <dd>
                <?php
                foreach ($titulo['SectoresTitulo'] as $sector) {
                    echo $sector['Sector']['name'];
                    echo (!empty($sector['Subsector']['name']) ? ' / '.$sector['Subsector']['name'] : '' );
                    echo "<br />";
                } ?>
            </dd>

            <dt style="width: 268px;"><?php echo ($titulo['Titulo']['marco_ref']==1)? "Especialidad con marco de referencia":"Especialidad sin marco de referencia"; ?></dt>
            <dd>
                &nbsp;
            </dd>
        </dl>
        <br />
    </div>
    
    <div class="clear" style="height: 10px;"></div>
    
    <div id="tituloPlanes">
        <div class="boxblanca" id="search_results">
            <h3 class="instit"><?php  __('Instituciones que ofrecen el t&iacute;tulo o certificaci&oacute;n');?></h3>
            
            <?php 
            $reqUrl = '/instits/search_results/Plan.titulo_id:'.$titulo['Titulo']['id'];
            $tieneFiltro = false;
            foreach ($this->passedArgs as $k=>$v) {
                $reqUrl .= '/'.$k.':'.$v;
                $tieneFiltro = true;
            }
            if ( $tieneFiltro ) {
                 echo "Criterios de búsqueda seleccionados:<br />";
            }
            echo $this->requestAction( $reqUrl, array('return') ); 
            ?>
    
        </div>
    </div>
    
    <div class="clear"></div>
</div>
