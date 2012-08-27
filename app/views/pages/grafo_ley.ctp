<?php 
$this->pageTitle = "Las pol�ticas para la Educaci�n T�cnico Profesional en Argentina";
echo $html->css('catalogo.grafo_ley');?> 

<script type="text/javascript">
    function viewDescription(este) {
        var title = $(este).html();
        $(este.hash).dialog({
            width: 600,
                    //position: 'top',
                    zIndex: 3999,
                    title: title
        });

        return false;
    }
</script>

<style type="text/css">
  #descripcion{
    background-color: lightgray;
    border: 2px solid gray;
    border-radius: 10px 10px 10px 10px;
    left: 600px;
    padding: 10px;
    position: absolute;
    top: 50px;
    width: 250px;
    display:none;
  }
</style>
<div class="grid_12">
    <h1>Las pol�ticas para la Educaci�n T�cnico Profesional en Argentina</h1>
    <div class="boxblanca boxdocs">        
        Los lineamientos, las estrategias y los programas llevados a cabo a partir del trabajo conjunto,
        de car�cter federal, entre las veinticuatro jurisdicciones educativas y el Instituto Nacional de
        Educaci�n Tecnol�gica est�n orientados a:
        <ul>
            <li>Fortalecer, en t�rminos de calidad y pertinencia, la educaci�n t�cnico profesional
                para favorecer procesos de inclusi�n social y facilitar la incorporaci�n de la juventud al
                mundo del trabajo y la formaci�n continua de los adultos a lo largo de su vida activa,
                y responder a las nuevas exigencias y requerimientos derivados de la innovaci�n
                tecnol�gica, el crecimiento econ�mico y la reactivaci�n de los sistemas productivos.</li>
            <li>Desarrollar un sistema integrado de educaci�n t�cnico-profesional que articule
                entre s� los niveles de educaci�n secundaria y superior y �stos con las diversas
                instituciones y programas de formaci�n y capacitaci�n para y en el trabajo, en el marco
                de los requerimientos del desarrollo cient�fico, t�cnico y tecnol�gico, de calificaci�n, de
                productividad y de empleo.</li>
            <li>Dar respuesta a la necesidad de otorgar a la educaci�n t�cnico profesional una
                identidad como modalidad del sistema educativo, significar su car�cter estrat�gico
                en t�rminos de desarrollo social y econ�mico, valorar su estatus social y educativo,
                actualizar sus modelos institucionales y estrategias de intervenci�n aproxim�ndola a
                est�ndares internacionales de calidad.</li>
        </ul>
        
        La Ley de Educaci�n T�cnico Profesional, sancionada en 2005, expresa tales pol�ticas a
        trav�s de la creaci�n de tres instrumentos de regulaci�n y de un fondo de inversi�n que
        permiten poner en acci�n criterios federales de unidad nacional. 
        
        <br />
        Esquem�ticamente:
        
        <div class="centrado">

          <div id="grafo">
                <a onclick="return viewDescription(this)" id="graph_proceso" class="circulo" href="#txt_proceso">Procesos de Homologaci�n</a>
                <a onclick="return  viewDescription(this)" id="graph_registro" class="circulo" href="#txt_registro">Registro Federal de Instituciones de ETP</a>
                <a onclick="return  viewDescription(this)" id="graph_catalogo" class="circulo" href="#txt_catalogo">Cat�logo Nacional de T�tulos y Certificaciones</a>
                <a onclick="return viewDescription(this)" id="graph_fondo" href="#txt_fondo">Fondo Nacional Para la ETP</a>
            </div>
        </div>
        <div class="show_in_dialog" id="txt_proceso">
          Consiste en el an�lisis de planes de estudio relativos a titulaciones t�cnicas o certificados de formaci�n profesional y su evaluaci�n comparativa con un conjunto de criterios b�sicos y est�ndares indicados como referencia para cada uno de ellos, a efectos de establecer su correspondencia. Los marcos de referencia enuncian el conjunto de los criterios b�sicos y est�ndares que definen y caracterizan los aspectos sustantivos a ser considerados en el proceso de homologaci�n de los t�tulos o certificados y sus correspondientes ofertas formativas, brindando los elementos necesarios para llevar a cabo las acciones de an�lisis y de evaluaci�n comparativa antes se�aladas.
        </div>
        <div class="show_in_dialog" id="txt_registro">
          Registro Federal de Instituciones de Educaci�n T�cnico Profesional", texto:"El Registro Federal de Instituciones de Educaci�n T�cnico Profesional (RFIETP) es la instancia de inscripci�n de las instituciones que emiten t�tulos y certificados de Educaci�n T�cnica Profesional que presentan cada una de las jurisdicciones provinciales y universidades nacionales. El  RFIETP   contiene los  datos b�sicos de establecimiento (nombre de la instituci�n, direcci�n, localidad, departamento, tel�fono, director, entre otros), e informaci�n referida sus los planes de estudio (t�tulos, cantidad de horas taller en la semana, cantidad de matriculados, de secciones, entre otras); Esta informaci�n resulta de insumo para:        <ol>            <li>Diagnosticar, planificar y llevar a cabo planes de mejora que se apliquen con prioridad a aquellas escuelas que demanden un mayor esfuerzo de reconstrucci�n y desarrollo</li><li>Fortalecer a aquellas instituciones que se puedan preparar como centros de referencia en su especialidad t�cnica y </li><li>Alcanzar en todas las instituciones incorporadas los criterios y par�metros de calidad de la educaci�n profesional acordados por el Consejo Federal de Cultura y Educaci�n (Ley  N� 26.058/2005, Capitulo IV, Art�culo N� 34). El Registro funciona entonces como insumo para la evaluaci�n de los programas de fortalecimiento institucional que presentan las instituciones educativas al INET en el marco de los planes de mejora continua de la calidad de la educaci�n t�cnico profesional del Fondo Nacional para la Educaci�n T�cnico Profesional</li></ol>
        </div>
        <div class="show_in_dialog" id="txt_catalogo">
          Constituye una fuente de informaci�n para m�ltiples usuarios sobre certificados y t�tulos de educaci�n t�cnico profesional y sus correspondientes ofertas formativas. Se organiza a partir de criterios sectoriales y territoriales y en funci�n de familias y figuras profesionales.
        </div>
        <div class="show_in_dialog" id="txt_fondo">
          Tiene como prop�sito garantizar la inversi�n necesaria para asegurar el acceso a todos los ciudadanos a una educaci�n t�cnico profesional de calidad en todo el territorio de la Naci�n Argentina. Se financia con un monto anual que no puede ser inferior al 0,2% del total de los Ingresos Corrientes previstos en el Presupuesto Anual Consolidado para el Sector P�blico Nacional.
        </div>
        <div id="descripcion"></div>
        <br />
    </div>
</div>