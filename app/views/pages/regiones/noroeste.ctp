<?php 
$this->pageTitle= 'Regi�n Noroeste';
?>

<?php echo $this->element('menu_docs_territorial')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2><?php echo $this->pageTitle?></h2>
        <h3>Provincias</h3>
        <ul>
            <li>Catamarca</li>
            <li>Jujuy</li>
            <li>La Rioja</li>
            <li>Salta</li>
            <li>Santiago del Estero</li>
            <li>Tucum�n</li>
        </ul>
        <br />
        <h3>Informes</h3>
        <ul>
            <li><?php echo $html->link('Estructura Socioproductiva', '/files/pdfs/regiones/socioproductiva/noa.pdf', array('target'=>'_blank')) ?></li>
        </ul>
    </div>
</div>
