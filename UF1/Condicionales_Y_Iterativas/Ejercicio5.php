<?php /* Crear una tabla dinàmicamente (con php) de 5x5, la cual se rellenará por columnas empezando por la primera. Utilizaremos define("CONSTANTE",X)
para definir constantes. en nuestro caso número de filas y número de columnas. A diferencia de las variables,
a las constantes se hace referencia sin el símbolo $. */ ?>


<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #5</h1>
        <table width="100%" border="1" class="table-striped">
            <?php

                const COLUMNAS = 5;
                const FILAS = 5;

                define("COLUMNAS",5);
                define("FILAS",5);

                for ($i=0;$i<=COLUMNAS;$i++) {

                    echo '<tr>';
                    
                    for ($x=0;$x<FILAS;$x++) {
                        echo '<td>&nbsp;'.$x.'</td>';
                    }

                    echo '</tr>';
                }

            ?>
        </table>
    </body>
</html>



