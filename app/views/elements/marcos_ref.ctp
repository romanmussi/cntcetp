<?php 
//
// En la carpeta /webroot/files/pdfs/nombre_del_sector si hay archivos, los ennumero


$nombreCarpetas[SEC_TEC_ID] = array( 'folder' => 'sec', 'title' => 'Nivel Secundario Técnico' );
$nombreCarpetas[SUP_TEC_ID] = array( 'folder' => 'sup', 'title' => 'Nivel Superior Técnico' );
$nombreCarpetas[FP_ID] = array( 'folder' => 'fp', 'title' => 'Formación Profesional' );

$debug = '';

$carpetaDeEsteSector = 'files/pdfs/'.basename($this->here);
//debug(WWW_ROOT.$carpetaDeEsteSector);
//debug(is_dir(WWW_ROOT.$carpetaDeEsteSector));
if (is_dir(WWW_ROOT.$carpetaDeEsteSector) && $fileStructureWritter->tieneArchivos( $carpetaDeEsteSector )) {
?>
    <h3>Marcos de Referencia</h3>
    <?php
    foreach ($nombreCarpetas as $f) {
        $folder = $carpetaDeEsteSector . '/' . $f['folder'];
        if ($fileStructureWritter->tieneArchivos( $folder )) {
            echo "<h4>" . $f['title'] . "</h4>";
            $fileStructureWritter->write( $folder );
        } else {
            $debug .= "- No existe la carpeta $folder. No se mostrará ".$f['title'].".<br />";
        }
    }
}


// mostrar mensajes de debug al final de todo
if ($debug) {
    debug($debug);
}
?>
