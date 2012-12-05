<div style="margin-bottom: 10px;">
    <div id="<?php echo $foroName; ?>" class=""></div>
    <?php if (!empty($participantes)): ?>
        <h3>Foro</h3>
        <?php
        $i = 0;
        if (!empty($participantes) && count($participantes) > 0) {?>
            Participantes:<br />
            <ul class="grid_8">
                <?php foreach ($participantes as $p) { ?>
                    <li><?php echo $p?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    <?php endif ?>
    <div class="clear"></div>
</div>    
