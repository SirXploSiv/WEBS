<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <?php if (!isset($_POST["tallaEnviada"])) { ?>
        <h1 class="text-center">Ejercicio #9 - HTML</h1><br />
        <div class="container">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"> 
            <div class="form-group">
                <label for="Talla">Talla</label>
                <!-- 
                        XS és talla extrapetita.

                        S és talla petita.

                        M és talla mitjana

                        L és talla gran.

                        XL és talla extragran.
                -->
                <label for="tallas">Selecciona talla: </label>
                <select class="form-control" id="tallas" name="tallas">
                    <option value="XS" selected="selected">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>      
            <button type="submit" class="btn btn-default" name="tallaEnviada">Submit</button>
            </form>
            <?php } ?>
             <?php
                if (isset($_POST["tallaEnviada"])) {
                    echo '<br /><br /><p class="text-center" style="font-size: 30px;">';
                    echo 'Talla seleccionada , ';
                    echo $_POST["tallas"];
                    echo '</p>';
                    echo '<button class="center-block btn btn-primary glyphicon glyphicon-new-window" value="Atràs" onclick="history.go(-1);">&nbsp;<strong>Atràs</strong></button>';
                } 
            ?>
        </div>
    </body>
</html>