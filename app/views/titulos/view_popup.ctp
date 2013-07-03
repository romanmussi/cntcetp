<?php header('Content-Type: text/html; charset=ISO-8859-15'); ?>
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
<div class="titulosview">
    <ul>
        <li class="">
            <strong><?php __('Nivel'); ?>:</strong> <?php echo $plan['Oferta']['name']; ?>
        </li>
        <li class="">
            <strong><?php echo ($plan['Titulo']['marco_ref']==1)? "Especialidad con marco de referencia":"Especialidad sin marco de referencia"; ?></strong>
            
        </li>
        <li class="">
            <strong><?php __('Sectores / Subsectores'); ?>:</strong>
        <?php
        foreach ($plan['Titulo']['SectoresTitulo'] as $sector) {
        ?>
                <?php echo $sector['Sector']['name']; ?>
                <?php echo (!empty($sector['Subsector']['name']) ? ' / '.$sector['Subsector']['name'] : '' ); ?>
        <?php
        }
        ?>
        </li>
        <?php
        if ($plan['Titulo']['es_bb']) {
        ?>
        <li class="">
            Carrera prioritaria <?php echo $html->image('bb.png', array(
                        'alt'=> __(BB_ALT, true),
                        'title'=> __(BB_ALT, true),
                        'border'=>"0",
                        'class'=>'prioritaria-icon'
                        )); ?>
        </li>
        <?php 
        }
        ?>
        <?php
        if (!empty($plan['Plan']['ultimo_ciclo'])) {
        ?>
        <li class="">
            <strong>Información suministrada al:</strong> <?php echo $plan['Plan']['ultimo_ciclo']; ?>
        </li>
        <?php }?>
    </ul>
   
</div>
