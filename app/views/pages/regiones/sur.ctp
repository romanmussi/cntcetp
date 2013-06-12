<?php 
$this->pageTitle= 'Región Sur';
?>

<?php echo $this->element('menu_docs_territorial')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2><?php echo $this->pageTitle?></h2>
        <h3>Provincias</h3>
        <ul>
            <li>Chubut</li>
            <li>La Pampa</li>
            <li>Neuquén</li>
            <li>Río Negro</li>
            <li>Santa Cruz</li>
            <li>Tierra del Fuego</li>
        </ul>
        <br />
        <h3>Informes</h3>
        <ul>
            <li><?php echo $html->link('Estructura Socioproductiva', '/files/pdfs/regiones/socioproductiva/sur.pdf', array('target'=>'_blank')) ?></li>
        </ul>
    </div>
</div>
