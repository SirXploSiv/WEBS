<!DOCTYPE html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #3</h1>
        <?php
        /*
            Realizar un programa que muestre en una columna valores desde el 32 al

            212, los cuales representan grados Fahrenheit, y en una segunda columna

            muestre su equivalente en grados Centígrados.

            La fórmula es:  C=  (F-32 ) / 1.8

            

            Fahrenheit                    Centígrados

            32                                            z

            33                                            x

            34                                            y */

        ?>

        <table width="100%" class="table-hover" border="1">
        <tr>
            <th class="text-center">Fahrenheit</th>
            <th class="text-center">Centígrados</th>
        </tr>
        <?php 

            for ($i = 32; $i <= 212;$i++) {
                $valor = ($i-32) / 1.8;
                echo '<tr><td><small>'.$i.'</small></td><td>'.$valor.'</td></tr>'; 
            }        
         ?>

         </table>

    </body>
</html>