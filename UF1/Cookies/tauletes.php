<?php
#Crear una llista de tauletes en el mercat dels diferents sistemes operatius 
#(MAC,ANDROID,WINDOWS 8) i guardar en una cookie les diferents taules seleccionades 
#( utilitzar serialització).

    if (!isset($_COOKIE['COUNT'])) {
        setcookie("COUNT",0,time()+3600);
    } 

    $tabletsToLoad = array("TABLET"=>"Android","IPAD"=>"Mac","SMARTPHONE"=>"Window","PORTATIL"=>"MSI","GRAFICA"=>"Gigabyte","CAMARA"=>"Nikon");
    $miFormulario = "";

    if (!isset($_POST['table_form'])) {

        $tmpTabletsToLoad = array_flip($tabletsToLoad);

        foreach ($tmpTabletsToLoad as $key=>$valor) {
            
            $control = false;

            if (isset($_COOKIE['TABLETS'])) {
                if ( in_array($key,unserialize($_COOKIE['TABLETS'])) ) {$control = true;} 
            }

            $ok = ($control) ? 'checked' : '';

            $miFormulario .= 
            "
             <div class='col-md-4'>
                        <div class='thumbnail'>
                            <img src='img/".$key.".png' alt='".$key."' class='img img-thumbnail img-circle'/>
                            <div class='checkbox'>
                                <label><input type='checkbox' name='check[]' value='".$valor."'".$ok.">".$key."</label>
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
        header("location: tauletes.php");
    }
    
?>
<!DOCTYPE html>
<html lang="es">
    <head><title>Ejercicio 2</title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
       <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
       <link rel="stylesheet" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
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

                            if (isset($_COOKIE['TABLETS'])) {
                                $dataCookie = $_COOKIE['TABLETS'];
                                $dataCookie = unserialize($dataCookie);
                                
                                foreach ($dataCookie as $valor) {
                                        echo  "
                                        <div class='thumbnail'>
                                                    <img src='img/".$valor.".png' alt='".$valor."' class='img img-thumbnail img-circle'/>
                                        </div>";
                                }
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