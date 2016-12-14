<?php /*Feu un formulari talla.html on en un quadre de text se li passa la talla. Ha de tenir un botó per fer l'enviament. 
        L’ script que processa la informació es diu processar_talla.php. A partir del valor de la talla (els valors tan sols poden ser XS, S,M, L, XL),
        heu de mostrar per pantalla un missatge que digui el següent:

        XS és talla extrapetita.

        S és talla petita.

        M és talla mitjana

        L és talla gran.

        XL és talla extragran.
 */ ?>

<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #8</h1><br />
        <div class="text-center">
            <?php
                if (isset($_POST["tallaEnviada"])) {

                    $check = false;
   
                    switch ( strToUpper($_POST["talla"]) ) {
                        
                            case "XS" : $check = true;
                            break;
                            case "S" : $check = true;
                            break;
                            case "M" : $check = true;
                            break;
                            case "L": $check = true;
                            break;
                            case "XL": $check = true;
                            break;
                    }
                    
                    if (!$check) {
                        echo "The value isn't correct, return in 3 secs to html page";
                        header('Refresh: 3;url=talla_8.html');
                    } else {
                        echo $_POST["talla"];
                    }                    


                } else {
                    echo 'Permission denied , return in 3 secs to html page';
                    header('Refresh: 3;url=talla_8.html');
                }
            ?>
            </div>
    </body>
</html>
