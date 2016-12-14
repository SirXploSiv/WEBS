<!DOCTYPE html>
<html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <?php if (!isset($_POST["enviadoDescuento"])) { ?>
        <h1 class="text-center">Ejercicio #10 GET - HTML</h1><br />
        <div class="container">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET"> 
            <div class="form-group">
                <label for="Import">Import</label>
                <input type="number"  class="form-control" id="import" name="import" placeholder="Introduce el importe . . ."/>
                <label for="descuento">Selecciona descuento: </label>
                <select class="form-control" id="descuento" name="descuento">
                    <option value="10" selected="selected">10%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option>
                </select>
            </div>      
            <button type="submit" class="btn btn-default" name="enviadoDescuento">Submit</button>
            </form>
        </div>
        <?php } ?>
        <div class="container">
          <?php
            if (isset($_GET["enviadoDescuento"])) {
                        if ($_GET["import"]!="") {
                            $import = $_GET["import"];
                            $descuento = $_GET["descuento"];
                            $descuento = $descuento * $import / 100;
                            $total = $import - $descuento;
                            echo '<br /><br /><p class="text-center" style="font-size: 30px;">';
                            echo '<b>Import : '.$import.'<br />';
                            echo $descuento.'% Dte  -'.$descuento.'<br />';
                            echo 'Total : '.$total.'</b>';
                            echo '</p>';
                            echo '<button class="center-block btn btn-primary glyphicon glyphicon-new-window" value="Atràs" onclick="history.go(-1);">&nbsp;<strong>Atràs</strong></button>';
                        } else {
                            echo '<br /><br /><p class="text-center" style="font-size: 30px;">Introduce un importe valido</p>';
                            echo '<br /><br />Redirigiendo en 3 segundos....';
                            header('Refresh: 3;url=Ejercicio_10_1_GET.php');
                        }
            } 
            ?>
        </div>
    </body>
</html>