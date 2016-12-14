<?php

    if (!isset($_COOKIE['COUNT'])) {
        setcookie("COUNT",0,time()+3600);
    } 

    $tabletsToLoad =  array("TABLET"=>array("Android","blabla",150),"IPAD"=>array("Mac","blabla",110),"SMARTPHONE"=>array("Window","blabla",130),"PORTATIL"=>array("MSI","blabla",150),"GRAFICA"=>array("Gigabyte","blabla",130),"CAMARA"=>array("Nikon","blabla",120));

    $miFormulario = "";

    if (!isset($_POST['table_form'])) {

        foreach ($tabletsToLoad as $key=>$valor) {
            
            $control = false;

            if (isset($_COOKIE['TABLETS'])) {
                if ( in_array($key,unserialize($_COOKIE['TABLETS'])) ) {$control = true;} 
            }

            $ok = ($control) ? 'checked' : '';

            $miFormulario .= 
            "
             <div class='col-md-4'>
                        <div class='thumbnail'>
                            <img src='img/".$valor[0].".png' alt='".$valor[1]."' class='img img-thumbnail img-circle'/>
                            <div class='checkbox'>
                                <label><input type='checkbox' name='check[]' value='".$key."'".$ok.">".$key."</label>
                            </div>
                            <div class='well'>
                                <p>Descripcion ".$valor[1]."</p>
                                <p>Precio ".$valor[2]."€</p>
                            </div>
                       </div>
            </div>
            ";
        }
        $miFormulario .= '<button type="submit" class="btn btn-primary form-control" name="tablet_form" value="submit">Enviar</button>';
    }

    if (isset($_POST['tablet_form'])) {
        $tablets = $_POST["check"];
        $count = 0;

        foreach ($tablets as $valor) {
            if ( strcmp($tablets[$count],$tabletsToLoad[$valor]) ) {
                $tablets[$count] = $tabletsToLoad[$valor];
                $count++;
            }
        }

        setcookie("TABLETS",serialize($tablets),time()+3600);
        setcookie("COUNT",$_COOKIE['COUNT']+1,time()+3600);
        header("location: ExamenEX7[Tauletes].php");
    }
    
?>
<!DOCTYPE html>
<html lang="es">
    <head><title>Ejercicio 2</title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
       
       <!-- DESCOMENTAR LA LINEA DE ABAJO PARA UNA VISUALIZACIÓN MEJOR DE LA WEB -->

       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="page-header">
                    <h1>EJERCICIO #2 COOKIES &copy; Joel García</h1>
                </div>
            </header>
            <?php 
                if ($_COOKIE['COUNT']==0) {
                if (!isset($_POST['tablet_form'])) { ?>
            <div class="row text-center">
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <?php echo $miFormulario; ?>
                </form>
           </div>
           <?php }} else { ?>
                
                <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <?php 

                            $tmpTotal = array();
                            $count = 0;

                            if (isset($_COOKIE['TABLETS'])) {
                                $dataCookie = $_COOKIE['TABLETS'];
                                $dataCookie = unserialize($dataCookie);
                                
                                foreach ($dataCookie as $valor) {
                                        $tmpTotal[$count] = $tabletsToLoad[$valor][2];
                                        $count++;
                                        echo  "
                                        <div class='thumbnail'>
                                                    <img src='img/".$tabletsToLoad[$valor][0].".png' alt='".$tabletsToLoad[$valor][1]."' class='img img-thumbnail img-circle' width='80px' height='80px'/>
                                                     <div class='well'>
                                                        <p>Descripcion ".$tabletsToLoad[$valor][1]."</p>
                                                        <p>Precio ".$tabletsToLoad[$valor][2]."€</p>
                                                    </div>
                                        </div>";
                                }

                                echo '<div class="well text-center"><strong>Total</strong> : '.array_sum($tmpTotal).'€</div>';
                           }
                                            
                            
                        ?>
                    </div>
                </div>
            </div>
           <?php
                setcookie("COUNT",0,time()+3600);
            } ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    </body>
</html> 