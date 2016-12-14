<?php /* Exercici 7. com l'exercici 2, però amb array associatiu */ ?>

<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #7</h1><br />
            <?php

                $key = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

                $languages = array (
                    "en"=>"English",
                    "es"=>"Español",
                    "ca"=>"Català",
                    "fr"=>"Frances"
                );
                                
                $language =$languages[$key];
            ?>
            <div class="text-center">
            <?php 
                echo 'The language used is... <b>'.$language.'</b>';
            ?>
            </div>
    </body>
</html>


