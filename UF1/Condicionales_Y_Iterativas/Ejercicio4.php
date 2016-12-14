<?php /* Imprimir los dias del mes empezando en el primer dia hasta el dia de hoy (incluido) */ ?>

<!DOCTYPE html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #4</h1>
        <?php 

            $diaActual = date("d");
            $mesActual = date("m");
            $anoActual = date("Y");
            $numeroDiasMesActual = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anoActual);

            echo 'Día Actual : '.$diaActual.' Mes Actual : '.$mesActual.' Año Actual : '.$anoActual.' Numero de días en el mes : '.$numeroDiasMesActual.'<br />';

            
            for ($i=1;$i<=$diaActual;$i++) {
                echo $i.'&nbsp;';
            }           
  
        ?>
    </body>
</html>