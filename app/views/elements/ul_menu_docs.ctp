<ul>
            
        <li><?php echo $html->link('Introducción', array('controller' => 'pages', 'action' => 'display', 'doc_residual/introduccion'));?></li>
        
        <li>
            Informaci&oacute;n sectorial
            <ul>
                <li><?php echo $html->link('Familias profesionales', array('controller' => 'pages', 'action' => 'display', 'doc_residual/familias'));?></li>
                <li>
                    <?php echo $html->link('Foros sectoriales', array('controller' => 'pages', 'action' => 'display', 'doc_residual/foros'));?>

                </li>
                <li><?php echo $html->link('Entidades participantes', array('controller' => 'pages', 'action' => 'display', 'doc_residual/entidades'));?></li>
            </ul>
        </li>

        <li>
            <?php echo $html->link('Procesos de homologación', array('controller' => 'pages', 'action' => 'display', 'doc_residual/homologacion'));?>
        </li>
        <li>
            <?php echo $html->link('Marcos de referencia', array('controller' => 'pages', 'action' => 'display', 'doc_residual/marcos'));?>
            <ul>
                <li><?php echo $html->link('Perfiles profesionales', array('controller' => 'pages', 'action' => 'display', 'doc_residual/fp/perfiles'));?></li>
            </ul>
            
        </li>    
        <li>
            Niveles y Modalidades
            <ul>
                <li>
                   <?php echo $html->link('Educación Técnica de Nivel Medio y Superior', array('controller' => 'pages', 'action' => 'display', 'doc_residual/mediaysuperior'));?>
                </li>
                <li>
                   <?php echo $html->link('Formación Profesional', array('controller' => 'pages', 'action' => 'display', 'doc_residual/fp'));?>
                </li>
            </ul>
        </li>
        
        <li>
            <?php echo $html->link('Normativa de referencia', array('controller' => 'pages', 'action' => 'display', 'doc_residual/normativa'));?>
        </li>
        
    </ul>