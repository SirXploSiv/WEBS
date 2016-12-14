<?php
/*
Crear l'script formulari_dte.html, en el qual ha d'haver-hi un quadre de text per a introduir un import (euros)
i una llista, amb els següents descomptes: 10%, 20% i 30%. El mètode per enviar la informació proveu-lo primer 
GET i quan us funcioni, canvieu-lo a POST.

Creeu un segon script anomenat processa_dte.php, el qual ha de fer el descompte corresponent i mostrar-lo per pantalla.

Exemple: Suposem que posem un import de 150 euros i triem un descompte del 20%, el resultat per pantalla hauria de ser el següent:

Import        150 euros

20 % Dte    - 30 euros   

Total        120 euros

        CALCULAR DESCUENTO EJEMPLO :
          - Descuento = 38 * preciobruto / 100  | precio neto= precio bruto - descuento 
        

*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #10</h1><br />
        <div class="text-center">
            <?php
            if (isset($_POST["enviadoDescuento"])) {
                    $import = $_POST["import"];
                    $descuento = $_POST["descuento"];

                    $descuento = $descuento * $import / 100;
                    $total = $import - $descuento;

                    echo '<b>Import : '.$import.'<br />';
                    echo $descuento.'% Dte  -'.$descuento.'<br />';

                    echo 'Total : '.$total.'</b>';
            } else { 
                   echo 'Permission denied';
            }
            ?>
        </div>
    </body>
</html>
