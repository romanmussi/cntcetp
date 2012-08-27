
<?php echo $this->element('menu_doc_residual')?>


<div class="grid_9">
    <div class="boxblanca boxdocs">

        <h2>Marcos de referencia    </h2>
   
        <p>
        Los marcos de referencia enuncian el conjunto de los criterios b�sicos y est�ndares que definen y caracterizan los aspectos sustantivos a ser considerados en el proceso de homologaci�n de los t�tulos o certificados y sus correspondientes ofertas formativas, brindando los elementos necesarios para llevar a cabo las acciones de an�lisis y de evaluaci�n de planes de estudio relativos a titulaciones t�cnicas o certificados de formaci�n profesional. Son aprobados por el Consejo Federal de Educaci�n.
        </p>
        
        <? echo $html->image('material/marcoref.jpg', array('class' => 'docimg', 'style' => 'width: 200px; float: left; border: none')); ?>
        <p>
        En distintas Reuniones de la Comisi�n Federal de Educaci�n T�cnica Profesional y en talleres espec�ficos se han definido y desarrollado una serie de Marcos de referencia para la homologaci�n de T�tulos y Certificados, priorizando seg�n el volumen de oferta formativa a nivel nacional y tecnicaturas que deben estar a resguardo del estado en virtud de que el ejercicio profesional pone en riesgo de modo directo el medio ambiente, la salud y los bienes de los habitantes.
        </p>
        <p>
        Cada marco de referencia contiene informaci�n relativa a la identificaci�n del t�tulo o certificaci�n (sector de actividad socio productiva de pertenencia, perfil profesional, familia profesional, t�tulo de referencia), un referencial al perfil profesional (alcance del perfil, funciones, �rea ocupacional, habilitaciones profesionales), y una descripci�n de las trayectorias formativas que se deben respetar (formaci�n general y espec�fica, pr�cticas profesionalizantes, carga horaria m�nima).
        </p>        
        
        <p>
            Puede obtener mayor informaci�n sobre los perfiles profesionales haciendo <?php echo $html->link('click aqu�', '/pages/doc_residual/fp/perfiles'); ?>
        </p>
        
        <h4>Referencia  normativa</h4>
        <ul>
            Proceso de Homologaci�n y Marcos de Referencia de T�tulos y Certificaciones de Educaci&oacute;n T&eacute;cnico Profesional. <?php echo $html->link('Res. C.F.C.y E. N� 261/06.', '/files/pdfs/otros/Res. CFCyE nro. 261-06.pdf')?>
        </ul>
        
        <h3>Marcos de  referencia aprobados</h3>
        <h4>Educaci&oacute;n  T&eacute;cnica de Nivel Medio</h4>

        <ul class="marcos">
            <?php $dir = '/files/pdfs/marcos/secundario_tecnico/' ?>
            <li><?php echo $html->link("Aerofotogram�trico",  $dir . '15-07-anexo12 Aerofotogramatrico.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Aeron�utico",  $dir . '15-07-anexo10 Aeronautico.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Alimentos",  $dir . '77-09-anexo02 Alimentos secundario.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Automotriz",  $dir . '15-07-anexo09 Automotriz.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Construcciones edilicias",  $dir . '15-07-anexo02 Construcciones edilicias.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Electricidad",  $dir . '15-07-anexo04 Electricidad.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Electromec�nico",  $dir . '15-07-anexo05 Electromecnica.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Electr�nico",  $dir . '15-07-anexo03 Electronico.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Energ�as renovables",  $dir . '15-07-anexo06 Energas Renovables.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Industrias de Procesos",  $dir . '15-07-anexo14 Industrias de Procesos.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Inform�tico",  $dir . '15-07-anexo16 Informtica.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Mec�nico",  $dir . '15-07-anexo07 Mecnico.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Mecanizaci�n agropecuaria",  $dir . '15-07-anexo08 Mecanizacin agropecuaria.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Minero",  $dir . '15-07-anexo15 Minero.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("�ptico",  $dir . 'An01 - Marco de referencia - optica.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Producci�n Agropecuaria",  $dir . '15-07-anexo01 Agropecuaria.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Soporte de infraestructura de tecnolog�a de la informaci�n",  $dir . 'An02 - Marco de referencia - Soporte.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Qu�mico",  $dir . '15-07-anexo13 Qumico.pdf', array('target'=>'_blank'));?></li>
        </ul>
        
        <h4>Educaci�n  T�cnica de Nivel Superior</h4>
        <ul class="marcos">
            <?php $dir = '/files/pdfs/marcos/superior/' ?>
            <li><?php echo $html->link("Esterilizacion",  $dir . '34-07-anexo02 Superior en Esterilizacion.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Hemoterapia",  $dir . '34-07-anexo04 Superior en Hemoterapia.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Instrumentaci�n Quir�rgica",  $dir . '34-07-anexo03 Superior en Instrumentacion Quirurgica.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Medicina Nuclear",  $dir . '34-07-anexo01 Superior en Medicina Nuclear.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Producci�n Agropecuaria",  $dir . '77-09-anexo01 Agropecuaria Superior.pdf', array('target'=>'_blank'));?></li>            
            <li><?php echo $html->link("Soporte de infraestructura de tecnolog�a de la informaci�n",  $dir . 'An02 - Marco de referencia - Soporte.pdf', array('target'=>'_blank'));?></li>

        </ul>

        <h4>Formaci�n  Profesional</h4>
        <ul class="marcos">
            <?php $dir = '/files/pdfs/marcos/formacion_profesional/' ?>
            <li><?php echo $html->link("Alba�il",  $dir . 'MR Albanil - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Apicultor",  $dir . '25-07-anexo01 FP Apicultor.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Armador de Hierros para Hormig�n Armado",  $dir . 'MR Armador de Hierros para H A - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Asistente Ap�cola",  $dir . '25-07-anexo02 FP Asistente Apicola.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Auxiliar en Construcciones",  $dir . 'MR Auxiliar en Construcciones - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Auxiliar en Instalaciones El�ctricas Domiciliarias",  $dir . 'MR Auxiliar en Instal Elec Dom - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Auxiliar en Instalaciones Sanitarias y de Gas Domiciliarias",  $dir . 'MR Auxiliar en Instal Sanitarias y de Gas Dom - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Auxiliar Mec�nico de Motores Diesel",  $dir . '36-07-anexo02 FP Auxiliar Mecanico Motores Diesel.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Auxiliar Mec�nico de Motores Nafteros",  $dir . '36-07-anexo01 FP Auxiliar Mecanico de Motores Nafteros.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Carpintero de Obra Fina",  $dir . 'MR Carpintero de Obra Fina - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Carpintero para Hormig�n Armado",  $dir . 'MR Carpintero para H A - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Colocador de Revestimientos con Base H�meda",  $dir . 'MR Colocador de Revest Base Humeda - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Construcciones Sismorresistentes en Mamposter�a",  $dir . '78-09-anexo01 Construcciones Sismorresistentes en Mamposteria.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Fresador",  $dir . '48-08-anexo5 FP Fresador.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Herrero",  $dir . 'Marco de referencia del Herrero para CF.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Mec�nico de Sistemas de Encendido y Alimentaci�n",  $dir . '48-08-anexo2 FP Mecanico de Sistemas de Encendido y Alimentacion.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Mec�nico de Sistemas de Frenos",  $dir . '48-08-anexo1 FP Mecanico de Sistemas de Frenos.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Mec�nico de Sistemas de Inyecci�n Diesel",  $dir . '48-08-anexo3 FP Mecanico de Sistemas de Inyeccion Diesel.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Mec�nico Instalador de Equipos de GNC",  $dir . 'MR Mec Inst de Equipos a GNC - V.4.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Montador de Instalaciones Domiciliarias de Gas",  $dir . 'MR Montador de Instal Gas Dom - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Montador de Instalaciones Sanitarias Domiciliaria",  $dir . 'MR Montador de Instal Sanit Dom - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Montador Electricista Domiciliario",  $dir . 'MR Montador Elec Dom - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Operador de Inform�tica Operador de Inform�tica para Administraci�n y Gesti�n",  $dir . '36-07-anexo03 FP Operador de Informtica Admin Gestion.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Operario Ap�cola",  $dir . '25-07-anexo03 FP Operario Apicola.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Rectificador",  $dir . 'MR Rectificador para CF.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Soldador B�sico",  $dir . 'MR_Soldador Basico_CF.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Soldador",  $dir . 'MR_Soldador_CF.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Techista de Faldones Inclinados",  $dir . 'MR Techista de Faldones Inclinados - Junio 2010.pdf', array('target'=>'_blank'));?></li>
            <li><?php echo $html->link("Tornero",  $dir . '48-08-anexo4 FP Tornero.pdf', array('target'=>'_blank'));?></li>
        </ul>      
    </div>
</div>
