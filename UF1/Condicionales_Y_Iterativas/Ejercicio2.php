<?php 

      /*
      
        @author Joel Garcia Nuño

        22/09/2016


       # SENTENCIAS CONDICIONALES Y ITERATIVAS
      
      Exercici 2

        Realizar un script anomenat que mostri segons l'idioma, el texto español, català, anglés

        i francés (utilitzeu un switch) i l'array associatiu $_SERVER["HTTP_ACCEPT_LANGUAGE"].
      
      */

?>

<!DOCTYPE html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
    </head>
    <body>
        <h1>Ejercicio #2</h1>
        <?php
            
            //en-US,en;q=0.5
            
            $value = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

            switch ($value) {
                
                case "en" : echo 'English';
                break;

                case "es" : echo 'Español';
                break;

                case "ca" : echo 'Català';
                break;
                
            }

         ?>
    </body>
</html>