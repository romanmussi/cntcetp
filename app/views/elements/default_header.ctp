

<div id="header">
    <div class="header_wrapper">
        
        <div class="logo">
            <a href="<?php echo $html->url('/')?>"class="no-print">
                <?php echo $html->image('../css/img/logo.png', array(
                    'border'=> 0,
                    'class' => 'inet_logo',
                    )); 
                ?>
            </a>
        </div>

        <div id="bandera_header" class="">
            <h1 class="">
                &nbsp;<?php echo $html->link(__('Catálogo Nacional de Títulos y Certificaciones de Educación Técnico Profesional', true), '/pages/home', array('class' => '')); ?>
            </h1>
         

            <div class="menu_wrapper no-print"  style="z-index: 50; ">
                    <?php echo $this->element('menu');?>                
            </div>
             
        </div>
        <!--<span class="fecha" style="float: right; margin-top: -20px; color: white;"> <?php echo actual_date();?></span>-->
    </div>
   
</div>
