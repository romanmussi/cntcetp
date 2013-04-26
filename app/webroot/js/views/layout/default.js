
(function($) {
    
    /*** ----------------------------------------- 
     *
     *              jQuery ON DOM READY
     *
     *---------------------------------------- ***/
    $(document).ready(function () {
    
        // Si la sesion del usuario caducó, capturar el Error 
        // cuando se hace una peticion Ajax
        $(document).ajaxError( function(event, xhr, ajaxSettings, thrownError){
            if (xhr.status == 401){
                // primero pregunta, antes de hacer un reload
                // no vaya a ser cosa que pierda lo que estaba haciendo
                if ( confirm('Ha caducado su sesión, ¿desea ingrear nuevamente al sistema?') ) {
                    window.location.reload(true);
                }
            }
        });
       
        //__ajustarAlturas(['.boxestudiantes']);
        //__ajustarAlturas(['.boxoferta']);
    });
    


    /**************************************************************************/
    /*** ---        Funciones Extra                                     --- ***/

    /**
     *
     *  Controla la altura de los elementos pasados como parámetros ajustandolos
     *  para que tengan la misma altura.
     *  Iguala en base al selector. Por ejemplo si le paso '.boxes' me ajusta todos
     *  los elementos con la clase .boxes
     *  
     *  
     *  @param selectores Array de elementos DOM que quiero igualar en altura
     */
    function __ajustarAlturas(selectores) {
        alturaMax = 0;
        alturaSelector = 0;
        selectoresText = selectores.join(",");

        $(selectoresText).attr('style', '');
        $(selectoresText).outerHeight(0);

        for (x=0;x<selectores.length;x++){
            jQuery.each($(selectores[x]), function() {
                alturaSelector = $(this).height();
                alturaMax = alturaSelector > alturaMax ? alturaSelector : alturaMax;
            });
        }

        $(selectoresText).height(alturaMax);
    }


})(jQuery);






    
     

