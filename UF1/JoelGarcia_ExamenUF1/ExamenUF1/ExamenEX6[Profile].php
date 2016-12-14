<?php 
    session_start();  
    //EVITAR ACCESO MALINTENCIONADO
    if (!isset($_SESSION['Username'])) {
         //Destruye el session start..
         session_destroy();
         //Mensaje error
         setcookie("Error","Logueate primero para acceder !!",time()+20);
         //Vuelve al login por no estar "logeado"...
         header("location:ExamenEX6[LogIn].php");
    }
    //OBETENER VARIABLES DE SESSION !
    extract($_SESSION); 
?>
<!DOCTYPE html>
    <head><title></title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>

        <!-- DESCOMENTAR LA LINEA DE ABAJO PARA UNA VISUALIZACIÓN MEJOR DE LA WEB -->

      <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    </head>
    <body>
        <div class="container">
            <header>
                <div class="page-header">
                    <h1>EJERCICIO #  &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12">
                   <?php 
                        //SI NO ESTA VACIA
                        if (!empty($Username)) {
                            //OBTENGO EL TIEMPO ACTUAL
                            $timeNow = time();
                            //COMPRUEBO CON EL TIEMPO ANTERIOR GUARDADO EN MI VARIABLE GLOBAL DE SESSION CON LA KEY setTimeout
                            if ($timeNow>$setTimeout) {
                                  //DESTRUYO EN EL CASO DE A VER SUPERADO DICHO TIEMPO , TODAS LAS VARIABLES DE $_SESSION
                                  $_SESSION = array();
                                  session_destroy();
                                  //INFORMO DEL ERROR AL USUARIO , QUE SE MOSTRARA EN LA PANTALLA DE LOGIN
                                  setcookie("Error","Se ha destruido su session !!",time()+20);
                                  //REDIRECCION
                                  header("location:ExamenEX6[LogIn].php");
                            } else {
                                //MENSAJE DE BIENVENIDA , MIENTRAS LA SESSION EXISTA
                                echo 'Bienvenido , '.$Username;
                            }
                        }
                   ?>
                </div>
            </div>
        </div>
    </body>
</html>