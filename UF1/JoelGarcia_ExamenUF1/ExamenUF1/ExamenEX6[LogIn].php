<?php 
    //INICIAMOS SESSION
    session_start();
    //USUARIO PREDETERMINADO (Control de errores.. etc).
    $user = "Joel";  $pass="123";
    //CONTROLA EL TIEMPO EN MINUTOS - TIEMPO_MINUTOS SE MULTIPLICARÁ POR 60 - ES DECIR -> TIEMPO_MINUTOS(valor 1) * 60 = 1 MINUTO.
    define("TIEMPO_MINUTOS",1);
    //MODIFICAR PARA PRUEBAS RÁPIDAS -> PONER POR EJEMPLO *4 PARA QUE SEAN UNOS 4~5 SEGUNDOS LA DURACIÓN DE LA SESSION.
    define("SEGUNDOS_A_MULTIPLICAR",3);
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
                        //AQUÍ COMPROBAMOS SI HA EXISTIDO ALGÚN ERROR
                        if (isset($_COOKIE['Error'])) {
                            //EN EL CASO DE EXISTIR MOSTRARÁ DE UNA FORMA ADEQUADA EL MENSAJE DE ERROR.
                            echo '<div class="alert alert-danger"><strong>Ops!</strong> '.$_COOKIE['Error'].'</div><br />';
                            //DESTRUIREMOS LA COOKIE DE ERROR , PARA QUE NO SEA UN INCORDIO PARA EL USUARIO.
                            setcookie("Error","",time()-20);
                        }
                     ?>
                    <div class="well">Usuario valido : Joel | Password valida: 123</div>
                    <!-- EL FORMULARIO ACTUARÁ SOBRE ESTÁ MISMA PÁGINA , PARA PODER HACER UN CONTROL AQUÍ DEL USUARIO & PASS ADEMAS DE OBTENER UN TIEMPO INICIAL -->
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="form-inline">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" name="Username" id="Username" placeholder="Insert an username"/>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" name="Password" id="Password" placeholder="Insert your password" maxlength="20" minlength="4"/>
                        </div>
                        <button type="submit" class="btn btn-primary form-control" name="profile">Validar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 
    //"SI SE HA ENVIADO EL FORMULARIO"
    if (isset($_POST['profile'])) {
        //COMPROBAMOS SI LOS DATOS INTRODUCIDOS POR EL USUARIO SÓN LOS CORRECTOS EN NUESTRAS VARIABLES DEL USUARIO PREDETERMINADO
        if (strcmp($_POST['Username'],$user)==0&&strcmp($_POST['Password'],$pass)==0) {
            //CREAMOS UNA SESSION CON EL NOMBRE DE USUARIO PREDETERMINADO PARA UTILIZARLO EN LA SIGUIENTE HOJA.
            $_SESSION['Username'] = $user;
            //OBTENEMOS EL TIEMPO ACTUAL , AL CUAL LE SUMAREMOS EL TIEMPO DE EXPIRACIÓN , COMO UNA COOKIE  
            $_SESSION['setTimeout'] = time() + TIEMPO_MINUTOS*SEGUNDOS_A_MULTIPLICAR; 
            //REDIRIGIMOS NUESTRO USUARIO EXITOSAMENTE LOGEADO A SU "PERFIL"
            header("location:ExamenEX6[Profile].php");
        } else {
              //SI LOS DATOS DEL USUARIO HAN SIDO MAL INTRODUCIDOS MOSTRAREMOS UN MENSAJE DE ERROR , CON NUESTRO SISTEMA DE COOKIE [ERROR]
              setcookie("Error","Usuario/Clave invalidos !!",time()+20);
        }
    }
?>