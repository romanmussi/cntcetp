<?php
echo $javascript->link('jquery.blockUI',false);
echo $javascript->link('jquery.maphilight.min',false);
echo $javascript->link('https://www.google.com/jsapi',false);
echo $javascript->link('views/pages/mapas_y_graficos',false);

echo $html->css('catalogo.estaticas', false);
?>

<div class="grid_12">
    <h1>La Educación Técnico Profesional en cifras</h1>

    <div class="boxblanca">    
        <p>
            A continuación se presenta información estadística de la Educación Técnico
            Profesional. Las fuentes de información son: 1) el Relevamiento Anual llevado
            a cabo por la Dirección Nacional de Información y Evaluación de la Calidad
            Educativa (DINIECE) del Ministerio de Educación de la Nación, y 2) la información
            presentada por las instituciones educativas a la base de datos del Registro Federal de
            Instituciones de Educación Técnica Profesional (RFIETP).
        </p>
        <div>
            <div class="js-tabs-ofertas tabs">
                <ul id="ofertas-tabs" class="horizontal-shadetabs">
                    <li>
                        <a id="htab-2" href="#ver-oferta-sec">Nivel Secundario</a>
                    </li>
                    <li>
                        <a id="htab-1" href="#ver-oferta-sup">Nivel Superior</a>
                    </li>
                    <li>
                        <a id="htab-3" href="#ver-oferta-fp">Formación Profesional</a>
                    </li>
                </ul>

                <div id="ver-oferta-sup" class="descargas-container" style="">
                    <h3>Institutos Técnicos de Educación Superior</h3>
                    <div style="text-align: center;">
                        <? echo $html->image('home/mapaSup2011.jpg', array('usemap' => '#mapSup', 'class'=>'mapa')); ?> 
                        <map id="mapSup" name="mapSup">
                            <area shape="poly" coords="125,49,138,61,140,47,146,43,148,53,160,67,180,60,182,47,169,43,159,29,163,16,152,16,144,10,132,19,124,30" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','38','Jujuy')" alt="Jujuy" title="Jujuy"   />
                            <area shape="poly" coords="163,16,162,27,172,45,183,44,183,63,177,66,168,67,157,62,149,57,148,48,142,49,141,59,126,52,101,65,100,77,135,81,134,93,139,99,147,94,177,102,178,90,192,90,214,64,214,26,209,17,184,15,180,31,173,21" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','66','Salta')" alt="Salta" title="Salta"   />
                            <area shape="poly" coords="213,58,214,25,233,48,255,57,300,85,281,117,254,89,246,79,233,69" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','34','Formosa')" alt="Formosa" title="Formosa"   />
                            <area shape="poly" coords="217,60,194,88,225,88,225,137,273,139,282,117,260,96,250,82" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','22','Chaco')" alt="Chaco" title="Chaco"   />
                            <area shape="poly" coords="225,90,225,135,213,184,209,182,202,173,189,167,170,164,162,147,166,124,172,116,179,91" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','86','Santiago del Estero')" alt="Santiago del Estero" title="Santiago del Estero"   />
                            <area shape="poly" coords="172,102,164,103,158,99,150,100,145,106,149,114,144,124,160,135,165,126" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','90','Tucumán')" alt="Tucumán" title="Tucumán"   />
                            <area shape="poly" coords="103,79,136,80,131,93,139,104,142,100,150,106,143,123,158,139,167,163,162,178,149,160,141,151,137,142,117,141,92,129,96,119,106,116,100,106,103,97,98,86,101,78" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','10','Catamarca')" alt="Catamarca" title="Catamarca"   />
                            <area shape="poly" coords="326,130,331,150,369,128,371,112,367,98,364,96,355,100,351,115" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','54','Misiones')" alt="Misiones" title="Misiones"   />
                            <area shape="poly" coords="284,124,312,134,323,133,332,150,291,193,280,188,274,185,258,190,260,177,269,154,270,144,277,138" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','18','Corrientes')" alt="Corrientes" title="Corrientes"   />
                            <area shape="poly" coords="225,137,275,139,272,144,264,163,259,175,259,187,249,207,240,216,237,229,238,247,220,265,198,263,219,237,213,214,215,204,220,193,216,185" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','82','Santa Fe')" alt="Santa Fe" title="Santa Fe"   />
                            <area shape="poly" coords="258,193,270,189,281,187,287,201,286,216,280,226,282,245,275,249,273,267,245,250,235,237,236,228,244,217" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','30','Entre Ríos')" alt="Entre Ríos" title="Entre Ríos"   />
                            <area shape="poly" coords="214,184,207,181,202,174,187,168,181,167,164,167,165,174,157,178,156,188,151,195,151,212,161,216,166,225,164,240,163,277,190,278,192,265,199,264,214,240,212,215,213,204,218,195" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','14','Córdoba')" alt="Córdoba" title="Córdoba"   />
                            <area shape="poly" coords="156,179,150,196,150,216,138,217,127,204,127,191,119,189,119,184,106,171,93,170,94,156,92,152,87,147,81,147,91,134,102,133,112,140,123,141,137,142,139,151,148,160" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','46','La Rioja')" alt="La Rioja" title="La Rioja"   />
                            <area shape="poly" coords="77,227,67,210,67,198,75,184,78,165,82,147,93,150,92,172,105,172,119,183,128,195,129,206,135,215,124,213,122,219,109,219,99,222,96,217,88,220" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','70','San Juan')" alt="San Juan" title="San Juan"   />
                            <area shape="poly" coords="162,298,161,243,167,226,161,226,159,218,153,216,137,217,122,215,126,225,129,236,129,247,138,257,136,266,139,277,137,299" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','74','San Luis')" alt="San Luis" title="San Luis"   />
                            <area shape="poly" coords="193,269,188,392,197,403,204,396,201,386,209,373,207,361,240,361,261,355,282,343,299,320,301,315,293,312,289,305,290,301,297,294,289,287,281,273,272,267,242,248,240,253,234,254,220,267" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','6','Buenos Aires')" alt="Buenos Aires" title="Buenos Aires"   />
                            <area shape="poly" coords="415,210,400,215,383,248,383,266,407,295,424,274,441,276,455,260,453,254,448,241,439,235,432,232,425,222" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','2','Ciudad Autónoma de Buenos Aires')" alt="Ciudad Autónoma de Buenos Aires" title="Ciudad Autónoma de Buenos Aires"   />
                            <area shape="poly" coords="193,281,165,281,165,301,113,301,111,329,121,333,121,343,130,345,142,351,167,357,177,358,186,365" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','42','La Pampa')" alt="La Pampa" title="La Pampa"   />
                            <area shape="poly" coords="76,230,86,225,93,219,100,229,106,222,122,223,124,236,132,253,133,264,138,280,134,300,111,299,110,330,95,322,86,321,72,304,77,299,73,288,75,273,83,264,83,243,78,246" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','50','Mendoza')" alt="Mendoza" title="Mendoza"   />
                            <area shape="poly" coords="75,306,84,319,97,323,111,329,110,355,97,369,83,378,85,386,71,389,57,403,57,387,55,382,64,368,61,360,66,359,69,353,63,332,65,321,64,309,70,305" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','58','Neuquén')" alt="Neuquén" title="Neuquén"   />
                            <area shape="poly" coords="188,367,186,393,198,402,185,404,177,403,168,395,157,394,158,403,163,409,160,418,61,422,56,404,68,401,68,392,82,388,86,379,110,356,109,330,119,333,118,340,137,352,158,355,170,356" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','62','Río Negro')" alt="Río Negro" title="Río Negro"   />
                            <area shape="poly" coords="62,423,160,420,170,424,179,419,184,428,180,438,165,432,162,443,157,454,157,469,150,474,153,482,140,481,131,486,124,499,67,504,60,498,67,489,64,483,57,479,69,477,71,470,62,470,60,461,55,452,61,443,50,436,56,434,51,424,59,426" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','26', 'Chubut')" alt="Chubut" title="Chubut"   />
                            <area shape="poly" coords="68,505,126,502,125,510,134,521,148,523,151,541,138,547,126,563,124,579,108,590,108,608,118,632,96,625,71,626,65,612,67,601,63,597,56,601,49,592,47,570,56,568,55,561,62,552,56,541,64,527,62,521,67,518,65,507" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','78','Santa Cruz')" alt="Santa Cruz" title="Santa Cruz"   />
                            <area shape="poly" coords="113,640,113,683,132,683,142,687,156,677,143,675,136,669,128,664,121,653" onclick="viewJurisdiccion('<?php echo SUP_TEC_ID?>','94','Tierra del Fuego')" alt="Tierra del Fuego" title="Tierra del Fuego"   />
                      </map>
                      <a href="<?php echo $html->url('/files/mapas/sup2011.pdf'); ?>" target="_blank" style="clear:both;">Descargar mapa</a>
                    </div>
                    <br />
                    <div style="width: 65%; float: left;">
                        <h3> Alumnos matriculados por sector socioproductivo (***) </h3>
                        <div id="grafico_sup"></div>
                    </div>
                    <div style="width: 35%; float: left;">
                        <h3> Datos generales </h3>
                        <ul>
                            <li>820 instituciones ingresadas al RFIETP (*)</li>
                            <li>57% de las instituciones son de gestión estatal (*)</li>
                            <li>176.817 alumnos matriculados (**)</li>
                        </ul>
                    </div>
                </div>
                <div id="ver-oferta-sec" class="descargas-container" style="">
                    <h3>Escuelas Secundarias de Educación Técnica Profesional</h3>
                    <div style="text-align: center;">
                        <? echo $html->image('home/mapaSec2011.jpg', array('usemap' => '#mapSec', 'class'=>'mapa')); ?> 
                        <map id="mapSec" name="mapSec">
                            <area shape="poly" coords="118,45,132,57,133,43,139,39,141,49,153,63,175,58,174,41,162,39,152,25,156,12,145,12,137,6,125,15,118,26" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','38','Jujuy')" alt="Jujuy" title="Jujuy"   />
                            <area shape="poly" coords="155,14,156,22,166,40,177,39,177,58,171,61,162,62,151,57,143,52,142,43,136,44,135,54,120,47,95,65,95,77,129,76,128,88,134,99,147,95,171,97,172,85,186,85,208,60,208,21,201,14,184,12,174,26,167,16" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','66','Salta')" alt="Salta" title="Salta"   />
                            <area shape="poly" coords="209,56,210,23,229,46,251,55,296,83,277,115,250,87,242,77,229,67" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','34','Formosa')" alt="Formosa" title="Formosa"   />
                            <area shape="poly" coords="212,57,189,85,220,85,220,134,268,136,277,114,255,93,245,79" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','22','Chaco')" alt="Chaco" title="Chaco"   />
                            <area shape="poly" coords="220,86,220,133,212,182,204,180,197,171,181,167,165,162,158,131,161,122,167,114,175,87" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','86','Santiago del Estero')" alt="Santiago del Estero" title="Santiago del Estero"   />
                            <area shape="poly" coords="170,98,161,100,156,95,148,96,143,102,142,113,142,120,155,132,163,117" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','90','Tucumán')" alt="Tucumán" title="Tucumán"   />
                            <area shape="poly" coords="96,78,125,78,127,92,133,103,135,99,141,101,138,122,157,139,163,164,156,178,142,159,134,150,130,141,110,140,87,127,89,118,99,115,93,105,96,96,91,85,94,77" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','10','Catamarca')" alt="Catamarca" title="Catamarca"   />
                            <area shape="poly" coords="323,127,328,147,366,125,368,109,364,95,361,93,352,97,348,112" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','54','Misiones')" alt="Misiones" title="Misiones"   />
                            <area shape="poly" coords="277,122,308,130,319,129,328,146,287,189,276,184,270,181,254,186,256,173,265,150,266,140,273,134" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','18','Corrientes')" alt="Corrientes" title="Corrientes"   />
                            <area shape="poly" coords="222,136,266,136,268,141,260,160,255,172,255,184,245,204,236,213,233,226,234,244,216,262,194,260,214,228,209,211,211,201,216,190,212,184" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','82','Santa Fe')" alt="Santa Fe" title="Santa Fe"   />
                            <area shape="poly" coords="254,187,266,183,277,183,283,195,282,210,276,220,278,239,271,243,269,261,241,244,235,235,233,222,240,211" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','30','Entre Ríos')" alt="Entre Ríos" title="Entre Ríos"   />
                            <area shape="poly" coords="208,183,201,180,196,173,181,167,175,166,165,167,158,178,151,177,150,187,145,194,145,211,155,215,160,224,158,239,157,276,184,277,186,264,193,263,208,239,206,214,207,203,212,194" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','14','Córdoba')" alt="Córdoba" title="Córdoba"   />
                            <area shape="poly" coords="151,176,143,196,143,216,131,217,120,204,120,191,112,189,112,184,99,171,86,170,87,156,85,152,80,147,74,147,86,130,95,133,105,140,116,141,130,142,132,151,141,160" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','46','La Rioja')" alt="La Rioja" title="La Rioja"   />
                            <area shape="poly" coords="69,230,63,213,59,201,67,187,70,168,74,150,85,153,82,170,97,175,111,186,120,198,121,209,127,218,116,216,114,222,101,222,92,228,88,220,80,223" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','70','San Juan')" alt="San Juan" title="San Juan"   />
                            <area shape="poly" coords="157,301,156,246,162,229,156,229,154,221,148,219,132,220,117,218,121,228,124,239,124,250,133,260,131,269,134,280,132,302" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','74','San Luis')" alt="San Luis" title="San Luis"   />
                            <area shape="poly" coords="189,265,184,388,193,399,200,392,197,382,205,369,205,360,224,363,265,354,280,343,295,316,297,311,287,309,282,301,286,297,290,291,285,283,277,269,268,263,238,244,236,249,230,250,216,263" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','6','Buenos Aires')" alt="Buenos Aires" title="Buenos Aires"   />
                            <area shape="poly" coords="407,199,395,207,380,235,375,255,406,287,420,265,433,266,455,251,455,242,446,226,440,219,434,219,422,208" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','2','Ciudad Autónoma de Buenos Aires')" alt="Ciudad Autónoma de Buenos Aires" title="Ciudad Autónoma de Buenos Aires"   />
                            <area shape="poly" coords="189,279,160,280,160,300,108,300,108,329,116,332,116,342,125,345,137,354,162,356,172,357,186,369" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','42','La Pampa')" alt="La Pampa" title="La Pampa"   />
                            <area shape="poly" coords="71,230,81,225,88,219,95,229,101,222,117,223,119,236,127,253,128,264,133,280,129,300,106,299,105,330,90,322,81,321,67,304,72,299,68,288,70,273,78,264,78,243,73,246" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','50','Mendoza')" alt="Mendoza" title="Mendoza"   />
                            <area shape="poly" coords="69,309,78,322,91,326,105,332,104,358,91,372,77,381,77,388,59,400,51,406,51,390,49,385,58,371,55,363,60,362,63,356,57,335,59,324,58,312,66,303" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','58','Neuquén')" alt="Neuquén" title="Neuquén"   />
                            <area shape="poly" coords="186,369,184,395,196,404,183,406,175,405,166,397,155,396,156,405,161,411,158,420,59,424,54,406,61,403,66,394,80,390,80,382,108,358,107,332,117,335,116,342,135,354,156,357,168,358" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','62','Río Negro')" alt="Río Negro" title="Río Negro"   />
                            <area shape="poly" coords="60,426,158,421,168,427,177,422,182,431,178,441,171,439,157,447,155,457,155,472,148,477,151,485,138,484,129,489,122,502,65,507,58,501,65,492,62,486,55,482,67,480,69,473,60,473,58,464,53,455,59,446,48,439,54,437,49,427,57,429" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','26','Chubut')" alt="Chubut" title="Chubut"   />
                            <area shape="poly" coords="65,507,123,504,122,512,130,525,145,525,148,543,135,549,123,565,121,583,106,593,102,609,110,634,93,627,67,631,62,614,64,603,60,599,50,607,45,595,44,572,53,570,52,563,59,554,53,543,61,529,59,523,64,520,62,509" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','78','Santa Cruz')" alt="Santa Cruz" title="Santa Cruz"   />
                            <area shape="poly" coords="109,645,109,688,128,688,138,692,152,682,139,680,132,674,124,669,117,658" onclick="viewJurisdiccion('<?php echo SEC_TEC_ID?>','94','Tierra del Fuego')" alt="Tierra del Fuego" title="Tierra del Fuego"   />
                      </map>
                      <a href="<?php echo $html->url('/files/mapas/sectec2011.pdf'); ?>" target="_blank" style="clear:both;">Descargar mapa</a>
                    </div> 
                    <br />
                    <div style="width: 65%; float: left;">
                        <h3> Alumnos matriculados por sector socioproductivo (***) </h3>
                        <div id="grafico_sec"></div>
                    </div>
                    <div style="width: 35%; float: left;">
                        <h3> Datos generales </h3>
                        <ul>
                            <li>1.578 instituciones ingresadas al RFIETP (*)</li>
                            <li>87% de las instituciones son de gestión estatal (*)</li>
                            <li>610.899 alumnos matriculados (**)</li>
                        </ul>
                    </div>
                </div>
                <div id="ver-oferta-fp" class="descargas-container" style="">
                    <h3>Centros de Formación Técnica Profesional</h3>
                    <div style="text-align: center;">
                        <? echo $html->image('home/mapaCFP2011.jpg', array('usemap' => '#mapCFP', 'class'=>'mapa')); ?> 
                        <map id="mapCFP" name="mapCFP">
                            <area shape="poly" coords="120,60,123,47,120,40,123,33,130,28,137,27,138,20,146,24,158,27,153,36,159,47,165,57,175,56,176,68,168,76,154,75,152,75,148,66,145,64,144,55,138,54,135,62,134,70" onclick="viewJurisdiccion('<?php echo FP_ID?>','38','Jujuy')" alt="Jujuy" title="Jujuy"   />
                            <area shape="poly" coords="159,27,155,36,165,54,176,54,178,70,168,76,150,75,147,67,144,67,142,57,137,57,135,69,121,61,101,73,93,82,100,90,114,91,134,91,130,101,122,100,122,106,132,109,136,115,139,106,145,113,147,108,168,110,173,101,182,98,189,97,211,75,211,35,203,27,203,25,183,26,174,39,170,29" onclick="viewJurisdiccion('<?php echo FP_ID?>','66','Salta')" alt="Salta" title="Salta"   />
                            <area shape="poly" coords="213,37,211,67,229,78,247,92,261,111,280,125,300,98,286,87,258,70,254,67,237,61,233,53" onclick="viewJurisdiccion('<?php echo FP_ID?>','34','Formosa')" alt="Formosa" title="Formosa"   />
                            <area shape="poly" coords="211,69,190,99,222,99,222,132,220,147,272,150,275,137,280,129,281,128,268,112,259,110,258,107,250,94,232,81" onclick="viewJurisdiccion('<?php echo FP_ID?>','22','Chaco')" alt="Chaco" title="Chaco"   />
                            <area shape="poly" coords="222,99,175,100,169,111,168,124,161,133,160,144,158,155,164,170,164,179,178,178,191,181,201,187,202,195,212,195,214,187,220,148,221,132" onclick="viewJurisdiccion('<?php echo FP_ID?>','86','Santiago del Estero')" alt="Santiago del Estero" title="Santiago del Estero"   />
                            <area shape="poly" coords="146,113,149,108,157,108,164,111,171,112,167,122,163,129,161,135,157,146,149,142,143,134,141,129,145,122" onclick="viewJurisdiccion('<?php echo FP_ID?>','90','Tucumán')" alt="Tucumán" title="Tucumán"   />
                            <area shape="poly" coords="97,89,130,91,135,97,127,100,130,111,138,109,144,119,141,134,147,141,156,144,158,158,163,170,162,180,152,190,147,172,135,160,134,153,119,150,112,152,108,148,103,147,97,141,87,141,90,126,100,127,95,116,96,111,100,109,94,96,96,94" onclick="viewJurisdiccion('<?php echo FP_ID?>','10','Catamarca')" alt="Catamarca" title="Catamarca"   />
                            <area shape="poly" coords="353,107,364,107,368,116,369,131,348,147,330,157,324,140,340,132,350,126" onclick="viewJurisdiccion('<?php echo FP_ID?>','54','Misiones')" alt="Misiones" title="Misiones"   />
                            <area shape="poly" coords="322,143,328,158,308,178,285,202,280,198,272,194,262,195,254,198,258,190,255,178,263,171,268,160,267,155,275,144,277,134,290,136,303,143,314,142,323,139" onclick="viewJurisdiccion('<?php echo FP_ID?>','18','Corrientes')" alt="Corrientes" title="Corrientes"   />
                            <area shape="poly" coords="270,151,221,148,211,195,216,205,208,223,209,234,216,246,196,277,215,278,231,262,239,263,241,259,233,244,235,235,237,223,246,219,253,199,257,191,254,184,257,177,267,165,266,158" onclick="viewJurisdiccion('<?php echo FP_ID?>','82','Santa Fe')" alt="Santa Fe" title="Santa Fe"   />
                            <area shape="poly" coords="287,208,285,222,277,231,278,243,280,252,273,257,270,265,274,277,267,273,255,266,239,257,233,242,235,228,241,220,254,198,268,195,281,197" onclick="viewJurisdiccion('<?php echo FP_ID?>','30','Entre Ríos')" alt="Entre Ríos" title="Entre Ríos"   />
                            <area shape="poly" coords="147,225,146,207,153,197,154,186,162,185,160,178,178,177,198,184,202,194,212,197,215,206,212,215,207,223,210,234,215,247,196,277,188,276,186,290,158,289,157,252,163,235,158,235,157,230" onclick="viewJurisdiccion('<?php echo FP_ID?>','14','Córdoba')" alt="Córdoba" title="Córdoba"   />
                            <area shape="poly" coords="86,143,79,154,89,165,88,183,97,180,117,192,123,204,124,216,130,224,145,224,146,209,153,194,152,186,146,171,138,165,134,155,132,152,118,151,108,153,107,148,99,144,96,142" onclick="viewJurisdiccion('<?php echo FP_ID?>','46','La Rioja')" alt="La Rioja" title="La Rioja"   />
                            <area shape="poly" coords="78,158,71,171,72,194,67,196,67,206,61,214,63,224,72,239,78,240,79,232,88,228,94,233,99,231,110,229,118,233,117,226,125,224,124,216,125,206,117,199,114,192,99,180,89,180,91,163,85,160,83,156" onclick="viewJurisdiccion('<?php echo FP_ID?>','70','San Juan')" alt="San Juan" title="San Juan"   />
                            <area shape="poly" coords="156,310,130,310,134,293,132,282,129,279,131,265,122,256,121,244,120,235,116,232,117,225,126,226,135,227,147,226,156,228,156,235,161,235,161,245,158,253,158,268,158,287" onclick="viewJurisdiccion('<?php echo FP_ID?>','74','San Luis')" alt="San Luis" title="San Luis"   />
                            <area shape="poly" coords="232,263,243,263,254,267,272,275,279,285,289,300,285,312,290,324,297,326,295,338,280,352,270,363,247,370,232,372,219,374,204,372,201,379,204,389,200,394,198,402,201,408,194,411,188,408,184,407,188,278,215,280" onclick="viewJurisdiccion('<?php echo FP_ID?>','6','Buenos Aires')" alt="Buenos Aires" title="Buenos Aires"   />
                            <area shape="poly" coords="409,196,397,202,390,207,385,216,378,230,373,254,402,284,420,262,431,263,446,256,453,252,454,240,450,232,447,225,438,219,424,210" onclick="viewJurisdiccion('<?php echo FP_ID?>','2','Ciudad Autónoma de Buenos Aires')" alt="Ciudad Autónoma de Buenos Aires" title="Ciudad Autónoma de Buenos Aires"   />
                            <area shape="poly" coords="186,290,158,290,157,310,105,310,106,341,114,342,114,348,118,355,127,358,135,366,149,368,164,367,178,372,185,379" onclick="viewJurisdiccion('<?php echo FP_ID?>','42','La Pampa')" alt="La Pampa" title="La Pampa"   />
                            <area shape="poly" coords="72,244,81,241,80,233,87,229,95,233,106,229,117,234,122,244,123,257,130,268,128,277,134,284,136,296,133,309,107,310,105,312,106,340,98,338,89,333,80,331,78,324,73,318,67,316,72,307,65,294,72,286,75,276,76,263,75,255,71,253" onclick="viewJurisdiccion('<?php echo FP_ID?>','50','Mendoza')" alt="Mendoza" title="Mendoza"   />
                            <area shape="poly" coords="67,316,59,323,57,340,60,354,65,367,55,374,54,388,52,396,51,409,52,419,62,415,62,409,70,403,78,400,80,391,89,384,102,372,106,364,106,342,95,338,88,334,81,335,79,328" onclick="viewJurisdiccion('<?php echo FP_ID?>','58','Neuquén')" alt="Neuquén" title="Neuquén"   />
                            <area shape="poly" coords="52,416,53,430,158,432,159,422,154,411,159,404,169,409,180,416,193,411,188,407,183,405,185,377,172,371,163,368,149,366,133,365,132,359,122,357,117,355,112,350,117,345,107,344,107,366,100,375,92,385,78,389,80,400,71,404,60,410" onclick="viewJurisdiccion('<?php echo FP_ID?>','62','Río Negro')" alt="Río Negro" title="Río Negro"   />
                            <area shape="poly" coords="56,436,155,433,165,438,176,434,179,442,177,448,171,448,169,444,162,442,159,447,166,453,157,457,152,467,152,480,147,488,148,496,136,494,128,501,123,508,121,513,63,515,59,509,66,501,63,497,54,498,55,491,66,491,69,482,61,483,57,483,56,476,58,469,54,466,58,456,48,455,51,445,47,438" onclick="viewJurisdiccion('<?php echo FP_ID?>','26', 'Chubut')" alt="Chubut" title="Chubut"   />
                            <area shape="poly" coords="63,516,119,515,120,520,126,527,134,536,145,536,147,544,145,555,132,563,124,573,120,581,118,595,109,600,103,605,101,617,104,630,114,646,97,640,80,637,67,638,61,628,62,615,60,610,53,615,48,614,44,607,44,594,42,583,48,584,48,580,55,573,54,568,58,563,53,557,55,551,60,542,59,532,63,527,57,520" onclick="viewJurisdiccion('<?php echo FP_ID?>','78','Santa Cruz')" alt="Santa Cruz" title="Santa Cruz"   />
                            <area shape="poly" coords="110,653,112,696,129,696,141,698,151,696,152,692,153,690,141,689,134,683,124,676,118,665" onclick="viewJurisdiccion('<?php echo FP_ID?>','94','Tierra del Fuego')" alt="Tierra del Fuego" title="Tierra del Fuego"   />
                        </map>
                        <a href="<?php echo $html->url('/files/mapas/cfp2011.pdf'); ?>" target="_blank" style="clear:both;">Descargar mapa</a>
                    </div> 
                    <br />
                    <div style="width: 65%; float: left;">
                        <h3> Alumnos matriculados por sector socioproductivo (***) </h3>
                        <div id="grafico_fp"></div>
                    </div>
                    <div style="width: 35%; float: left;">
                        <h3> Datos generales </h3>
                        <ul>
                            <li>1.082 instituciones ingresadas al RFIETP (*)</li>
                            <li>93% de las instituciones son de gestión estatal (*)</li>
                            <li>235.656 alumnos matriculados (**)</li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <p style="font-size: 9px;">
            (*) ME - INET. Unidad de Información - Área Registro Federal de Instituciones de
            Educación Técnico Profesional (RFIETP). Instituciones ingresadas a la base de datos
            del RFIETP a la fecha.
            <br />
            (**) ME - DINIECE. Área Gestión de la Información. Relevamiento Anual 2009.
            <br />
            (***) ME - INET. Unidad de Información - Área Registro Federal de Instituciones
            de Educación Técnico Profesional (RFIETP) Los datos corresponden a la última
            información presentada por los establecimientos al RFIETP. Información al 30/09/2011.
        </p>
        <div class="clear"></div>
    </div>
</div>