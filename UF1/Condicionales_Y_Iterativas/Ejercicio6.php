<?php /* 
Crear un vector  anomenat dia el qual tindrà els dies de la setmana en catala.
De manera que utilitzant la funció date i un patró podrem indexar el vector dia i mostrar-lo en català.
Teniu en compte que per defecte el diumenge retorna un 0 com a dia de la setmana. */ ?>


<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #6</h1><br />
            <?php

                $dia = array (
                    1=>"Dilluns",
                    2=>"Dimarts",
                    3=>"Dimecres",
                    4=>"Dijous",
                    5=>"Divendres",
                    6=>"Dissabte",
                    0=>"Diumenge"
                );
                
                $diaActualSemana = date("w");
                $diaActualText_CA =$dia[$diaActualSemana];
            ?>
            <div class="text-center">
            <?php 
                echo 'Avui es.. <b>'.$diaActualText_CA.'</b>';
            ?>
            </div>
    </body>
</html>
