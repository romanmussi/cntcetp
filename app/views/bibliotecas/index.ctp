<?php echo $html->css('biblioteca')?>

<div class="biblioteca">
    <div class="grid_6 alpha">
    <?php
    $fileStructureWritter->files = 'files';
    $fileStructureWritter->folders = 'folders';
    //echo $arrayWritter->write($archivos);
    ?>
    </div>
    
    <div class="grid_6 omega">
    <?php
    $fileStructureWritter->files = 'files';
    $fileStructureWritter->folders = 'folders';
    echo $fileStructureWritter->getFileStructure($resoluciones);
    ?>
    </div>
</div>