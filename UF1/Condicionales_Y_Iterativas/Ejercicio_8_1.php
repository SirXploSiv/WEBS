<?php 
    echo 'htmlspecialchars($_SERVER["PHP_SELF"])';
    echo 'The $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script.'
?>

<!DOCTYPE html>
<html>
    <head>
     <?php  if (!isset($_POST["tallaEnviada"])) { ?>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
        <link rel="stylesheet" type="text/css" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1 class="text-center">Ejercicio #8 - HTML</h1><br />
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
                <input type="text"  class="form-control" id="talla" name="talla" placeholder="XS S M L XL" />
            </div>      
            <button type="submit" class="btn btn-default" name="tallaEnviada">Submit</button>
            </form>
        <?php } ?>
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
                                
                                default : 
                                
                                if (empty($_POST["talla"])) {
                                    echo '<br /><br /><p class="text-center" style="font-size: 30px;">';
                                    echo 'You should write a size , the textbox is empty';
                                    echo '</p>';
                                    echo '<br /><br />Redirigiendo en 3 segundos....';
                                    header('Refresh: 3;url=Ejercicio_8_1.php');
                                } else {
                                    echo '<br /><br /><p class="text-center" style="font-size: 30px;">';
                                    echo 'That was an incorrect value '.$_POST["talla"];
                                    echo '</p>';
                                    echo '<br /><br />Redirigiendo en 3 segundos....';
                                    header('Refresh: 3;url=Ejercicio_8_1.php');
                                }
                        }

                        if ($check) {
                            echo '<br /><br /><p class="text-center" style="font-size: 30px;">';
                            echo 'Correct !! , '.$_POST["talla"];
                            echo '</p>';
                            echo '<button class="center-block btn btn-primary glyphicon glyphicon-new-window" value="Atràs" onclick="history.go(-1);">&nbsp;<strong>Atràs</strong></button>';
                        }
                }
            ?>        </div>
    </body>
</html>