<?php 
$this->pageTitle= 'Región Noreste';
?>

<?php echo $this->element('menu_docs_territorial')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2><?php echo $this->pageTitle?></h2>
        <h3>Provincias</h3>
        <ul>
            <li>Chaco</li>
            <li>Corrientes</li>
            <li>Formosa</li>
            <li>Misiones</li>
        </ul>
        <br />
        <h3>Informes</h3>
        <ul>
            <li><?php echo $html->link('Estructura Socioproductiva', '/files/pdfs/regiones/socioproductiva/nea.pdf', array('target'=>'_blank')) ?></li>
        </ul>
    </div>
</div>
