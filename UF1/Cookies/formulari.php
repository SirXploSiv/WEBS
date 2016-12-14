

<?php

        
        ini_set('display_errors', 'On');
        error_reporting(E_ALL);

    if (isset($_POST['enviadoDatos'])) {

        $cookies = serialize(array( "nombre" => setcookie("nombre",$_POST['nombre']), "apellidos"=>setcookie("apellidos",$_POST['apellidos']), "dni"=>setcookie("dni",$_POST['dni']) ));
        setcookie("datosUsuario",$cookies,time()+3600);
    }
  
    
?>


<!DOCTYPE html>
    <head><title></title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="page-header">
                    <h1>EJERCICIO #1 COOKIES &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if (!isset($_POST['enviadoDatos'])) {
                    ?>
                     <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"> 
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text"  class="form-control" id="Nombre" name="nombre" placeholder="Introduce el nombre . . ."/>
                            <label for="Apellidos">Apellidos</label>
                            <input type="text"  class="form-control" id="Apellidos" name="apellidos" placeholder="Introduce los apellidos . . ."/>
                            <label for="Dni">DNI</label>
                            <input type="text"  class="form-control" id="dni" name="dni" placeholder="Introduce el DNI . . ."/>
                            <input type="hidden" name="submitCtrl" value="true"/>
                        </div>      
                        <button type="submit" class="btn btn-default" name="enviadoDatos">Submit</button>
                    </form>
                    <?php
                        } else {                            
                            if (isset($_COOKIE['datosUsuario'])) {

                                $dataCookie = $_COOKIE['datosUsuario'];
                                $dataCookie = stripslashes($dataCookie);
                                $dataCookie = unserialize($dataCookie);

                                $dataCookies = "";

                                foreach ($dataCookie as $key=>$value) {
                                    $dataCookies .= $_COOKIE[$key].' ';
                                }

                                echo $dataCookies;
                                
                            }

                        } 
                     ?>
                </div>
            </div>
        </div>
    </body>
</html>