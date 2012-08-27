
<?php echo $this->element('menu_doc_residual')?>

<div class="grid_9">
    <div class="boxblanca boxdocs">
        <h2>Foros sectoriales</h2>
     
         <? echo $html->image('material/foro.jpg', array('class' => 'docimg')); ?>

        <p>
        La ley 26.058 crea tres instrumentos para la mejora continua de la calidad de la Educación Técnica Profesional: el Registro Federal de Instituciones de Educación Técnica Profesional, el proceso de Homologación de Títulos y Certificaciones y el Catálogo Nacional de Títulos y Certificaciones. Durante los últimos años, una de las tareas centrales del INET ha sido la construcción del Catálogo Nacional de Títulos y Certificaciones que, tal como indica la ley, se organiza en función de las familias y perfiles profesionales adoptados para la definición de las ofertas formativas.
</p>

<p>
Si bien el Catálogo es una nómina de los títulos y/o certificaciones profesionales y sus propuestas curriculares que cumplen con las especificaciones reguladas por la ley para la educación técnico profesional, su construcción no se reduce a una simple enumeración de títulos y certificados pues tiene que estructurarse de modo que responda a dos lógicas diferentes: la del mundo educativo y la del mundo del trabajo. 
</p>

<p>
Para asegurar la pertinencia productiva de los títulos y certificados que conforman el Catálogo, se han convocado Foros Sectoriales. Se entiende por Foro Sectorial un grupo de trabajo cuyo objetivo ?en este caso- consiste en identificar diferentes funciones, posiciones y figuras laborales y en caracterizar los diferentes perfiles que permitan construir y ordenar las ofertas formativas correspondientes y enmarcarlas en las familias profesionales del sector.
 </p>

 <p>
La identificación de familias profesionales responde a la necesidad de determinar carencias formativas en el mundo productivo y al mismo tiempo es un puente eficaz y válido para el desarrollo de políticas de empleo. Por tanto, el Foro se constituye tanto como instancia proveedora de insumos como mecanismo de validación de las ofertas que se generen. 
</p>

<p>
Estos Foros se constituyen en el marco del CoNETyP y están integrados por representantes de los trabajadores, empresarios, de instituciones de ciencia y tecnología y por personas de reconocida trayectoria en la materia de los sectores de actividad de relevancia estratégica económica seleccionados.
</p>

<p>
Para obtener más información sobre <b>características, objetivos y modos de funcionamiento</b> de los foros consulte el siguiente documento: <?echo $html->link('metodología de trabajo para los foros','/pages/doc_residual/foros_metodologia');?>
</p>
        
        <h3>Foros</h3>
        
        <!--<h4>Índice de foros</h4>
        <ul>
            <li><a href="#Automotriz">Automotriz</a></li>
            <li><a href="#Energía Eléctrica">Energía Eléctrica</a></li>
            <li><a href="#Estética Profesional">Estética Profesional</a></li>
            <li><a href="#Hortícola">Hortícola</a></li>
            <li><a href="#Informática">Informática</a></li>
            <li><a href="#Madera y Mueble">Madera y Mueble</a></li>
            <li><a href="#Metalmecánica">Metalmecánica</a></li>
            <li><a href="#Producción Lechera">Producción Lechera</a></li>
            <li><a href="#Textil / Indumentaria">Textil / Indumentaria</a></li>
        </ul>-->
        
        <p style="color:red">Falta informe de: Informatica, Construcciones y Hoteleria y Gastronomia</p>

        <?php 
                
        
        $vops = array(
            'foroName' => 'Automotriz',
            'participantes' => array(
                'ACRABA',
                'APTA' ,
                'ATAAP' ,
                'ATRAR',
                'FNPT' ,
                'Ministerio de la Producción',
                'SMATA' ,
                'MTEySS',
                'UDA' ,
                'UTMAN' ,
                'FAATRA',
                'AMET',
                'UMAM',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Sector automotriz - Informe Final.pdf',
            'fliaProfesional' => array('nombre'=>'Mecánica Automotriz',
                                       'link'=>'/pages/doc_residual/flias/mecanica_automotriz')
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Energía Eléctrica',
            'participantes' => array(
                'ACYEDE', 'CADIME','APSE','EDENOR','EDESUR',
                'Ministerio de la Producción', 'ATEERA', 'TRANSENER', 
                'Sindicato de Luz y Fuerza', 'FATLyF', 'APSEE', 
                'FACTéc', 'FNPT'
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/INFORME SECTORIAL SECTOR ENERGIA ELECTRICA.pdf',
            'fliaProfesional' => array('nombre'=>'Energía Eléctrica',
                                       'link'=>'/pages/doc_residual/flias/energia_electrica')
        );
        echo $this->element('foro', $vops);
        
        
        $vops = array(
            'foroName' => 'Estética Profesional',
            'participantes' => array(
                'Confederación General de Peluqueros y Peinadores de la R:A:',
                'Federación Nacional de Trabajadores de Peluquería y Afines.',
                'Confederación Nacional de Patrones Peluqueros',
                'Escuela de Cosmetología, Cosmiatría, Estética Corporal y Maquillaje. (Viviana Bustos)',
                'FACE',
                'APPYA',
                'Asociación Argentina de Cosmetología y Estética',
                'AMRA',
                'ANMAT',
                'Ministerio de Salud ',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/Informe_sectorial_estetica_profesional.pdf',
            'fliaProfesional' => array('nombre'=>'Estética Profesional',
                                       'link'=>'/pages/doc_residual/flias/estetica_profesional')
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Hortícola',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/horticultura_informe_final.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        
        $vops = array(
            'foroName' => 'Informática',
            'participantes' => array(
                'COORDIEP',
                'CPCI',
                'CESSI',
                'UDA',
                'Polo IT Buenos Aires',
                'SADIO',
                'USUARIA',
                'Córdoba Technology, Cluster de Tecnología de la Información',
                'Ministerio de la Producción',
                'COPITEC',
                'CICOMRA',
                'CEIL',
                'FNPT' ,
            ),
            'docInfoSectorial' => '',
            'fliaProfesional' => array('nombre'=>'Informática',
                                       'link'=>'/pages/doc_residual/flias/informatica')
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Madera y Mueble',
            'participantes' => array(
                'FAIMA',
                'INTI' ,
                'RITIM',
                'Ministerio de Producción',
                'AFOA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf',
            'fliaProfesional' => array('nombre'=>'Madera y Mueble',
                                       'link'=>'/pages/doc_residual/flias/madera_y_mueble')
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Metalmecánica',
            'participantes' => array(
                'Ministerio de la Producción.',
                'CAME',
                'UOM',
                'UDA',
                'ASIMRA',
                'FNPT',
                'AMET' ,
                'ADIMRA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/madera y mueble.pdf',
            'fliaProfesional' => array('nombre'=>'Metalmecánica',
                                       'link'=>'/pages/doc_residual/flias/metalmecanica')
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Producción Lechera',
            'participantes' => array(),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf'
        );
        echo $this->element('foro', $vops);
        
        
        
        $vops = array(
            'foroName' => 'Textil / Indumentaria',
            'participantes' => array(
                'Asociación Confeccionistas de Pergamino',
                'FAIIA',
                'Unión Cortadores de la Indumentaria',
                'AAQCT',
                'INTI',
                'AOT',
                'Fundación Pro-Tejer',
                'UIA',
            ),
            'docInfoSectorial' => '/files/pdfs/info_sectorial/sector_indumentaria.pdf',
            'fliaProfesional' => array('nombre'=>'Textil',
                                       'link'=>'/pages/doc_residual/flias/textil')
        );
        echo $this->element('foro', $vops);
        
        
        ?>
        
       
    </div>
</div>