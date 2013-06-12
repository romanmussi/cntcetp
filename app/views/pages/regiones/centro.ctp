<?php 
$this->pageTitle= 'Región Centro';
?>

<?php echo $this->element('menu_docs_territorial')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2><?php echo $this->pageTitle?></h2>
        <h3>Provincias</h3>
        <ul>
            <li>Buenos Aires</li>
            <li>Ciudad Autónoma de Buenos Aires</li>
            <li>Córdoba</li>
            <li>Entre Ríos</li>
            <li>Santa Fe</li>
        </ul>
        <br />
        <h3>Informes</h3>
        <ul>
            <li><?php echo $html->link('Estructura Socioproductiva', '/files/pdfs/regiones/socioproductiva/centro.pdf', array('target'=>'_blank')) ?></li>
        </ul>
    </div>
</div>
