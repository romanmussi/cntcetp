<?php

class FileReaderComponent extends Object {

    /* @var $controller Controller */
    var $controller;
    
     
    /* 
     * @var $pdfs_path String
     * 
     * path hacia la carpeta aque contiene los pdfs,
     * es inicializada en la funcion initialize 
     */
    var $pdfs_path;


    function initialize(&$controller, $settings=array()){
        $this->controller =& $controller;
    }
    
    
    function getFiles($carpeta, &$vArchivos = array()){
        // agarro el nombre de la carpeta que estoy leyendo
        $carpetaSplitted = split(DS, $carpeta);
        $folderName = array_pop($carpetaSplitted);
        
        $fol =& new Folder($carpeta);
        $dir = $fol->read(true, true);
        $subfolders = $dir[0];
        $files = $dir[1];
        $vArchivos[$folderName]['folders'] = array();
        foreach ( $subfolders as $sf) {
            $this->getFiles($carpeta . DS . $sf, &$vArchivos[$folderName]['folders']);
        }
                
        $vArchivos[$folderName]['files'] = $files; // 1 lee solo los archivos (creo) no lee las carpetas
        
        return $vArchivos;
    }   


    
}
?>
