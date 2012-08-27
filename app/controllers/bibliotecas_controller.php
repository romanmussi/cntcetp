<?php

class BibliotecasController extends AppController{
    
    // sin tablas asociadas
    var $uses = array();
    var $helpers = array('FileStructureWritter');
    var $components = array('FileReader');
    
    function index(){

        $this->pageTitle = "Biblioteca";

        $this->cacheAction = true;
        
        $pdfs_path = WWW_ROOT . 'files' . DS. 'pdfs' . DS;       
        
        $this->set('archivos', $this->FileReader->getFiles($pdfs_path));
        $this->set('resoluciones', $this->FileReader->getFiles($pdfs_path.DS.'resoluciones'));
    }
}
