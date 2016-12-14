<?php # Fer el mateix, en lloc d'un quadre de text, serà una llista. ?>
<?php #print_r($arrayAssociativo)  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #9</h1><br />
        <div class="text-center">
            <?php
                if (isset($_POST["tallaEnviada"])) {
                    echo $_POST["tallas"];
                } else {
                    echo 'Permission denied , return in 3 secs to html page';
                    header('Refresh: 3;url=talla_9.html');
                }
            ?>
        </div>
    </body>
</html>