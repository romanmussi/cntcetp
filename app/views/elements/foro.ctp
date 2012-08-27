<h2><?php echo "Sector $foroName"; ?></h2>
<div style="padding-bottom: 10px;">
    <div id="<?php echo $foroName; ?>" class=""></div>
    <?php if (!empty($participantes)): ?>
        <h3>Foro</h3>
        <?php
        $i = 0;
        if (!empty($participantes) && count($participantes) > 0) {?>
            Participantes:<br />
            <ul class="grid_4">
                <?php foreach ($participantes as $p) { ?>
                    <?php $i++; if($i == ceil(count($participantes)/2)+1):?>
                        </ul><ul class="grid_3">
                    <?php endif ?>
                    <li><?php echo $p?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    <?php endif ?>   
    <p>
        <!-- Informe Sectorial -->    
        <div class="clear"></div>
        <?php if (!empty($docInfoSectorial) ):?>

            <?php echo $html->link('Informe sectorial', $docInfoSectorial, array('target'=>'_blank')) ?>
        <?php else: ?>
            <!--<p style="color:red">Falta Informe Sectorial</p>-->
        <?php endif ?>
        <br />
        <!-- Familia Profesional -->
        <div class="clear"></div>    
        <?php if (!empty($fliaProfesional) ):?>        
            <?php echo $html->link('Familia profesional del sector '.$fliaProfesional["nombre"], $fliaProfesional["link"], array('target'=>'_blank')) ?>
        <?php else: ?>
            <!--<p style="color:red">Falta familia profesional</p>-->
        <?php endif ?>
    </p>
</div>    


<?php echo $this->element('marcos_ref')?>
