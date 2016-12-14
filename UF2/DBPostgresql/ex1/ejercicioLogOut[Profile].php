<?php
    session_start();
    //DATOS VALIDOS DE USUARIO
    $validarUsername = "Joel";
    $validarPassword = md5("clave123");
        // ¿ SE HA ENVIADO EL FORMULARIO ?
        if (isset($_POST['profile'])) {
            //RECOGIDA DE DATOS
            $username = $_POST['Username'];
            $password = md5($_POST['Password']);
            //EL USUARIO A MARCADO LA CASILLA DE RECUERDAME
            if (isset($_POST['RememberMe'])) { setcookie("Username",$username,time()+3600); }
                //VALIDACIÓN DE DATOS
                if ( strcmp($username,$validarUsername) != 0 && strcmp($password,$validarPassword) != 0) {
                    setcookie("Username","",time()-3600);
                    $_SESSION=array();
                    session_destroy();
                    setcookie("Error"," No se encuentra en la base de datos !",time()+3600);
                    header("location: ejercicioLogOut[LogIn].php");
                } else {
                    #echo $conexion->message_log; //IMPRIME COMO HA IDO EL CIERRE
                    //INICIAMOS LAS VARIABLES DE SESSION DEL USUARIO            
                    $_SESSION['Username'] = $username;
                    $_SESSION['Password']= $password;
                    //EXTRAEMOS LAS VARIABLES PARA SU USO
                    extract($_SESSION);
                }
        //SI EXISTE LA SESSION DE USUARIO
        } else if (isset($_SESSION['Username'])) {
                extract($_SESSION);
        //NO EXISTE SESSION Y NO SE HA ENVIADO EL FORMULARIO
        } else {        
            setcookie("Error"," Accede primero !",time()+3600);
            header("location: ejercicioLogOut[LogIn].php");
        }
?>
<!DOCTYPE html>
    <head>
        <title>EjercicioTeoria</title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div class="page-header text-center">
                    <h1>Ejercicio Teoría [Profile] &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Mis datos de usuario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nick de usuario</td>
                                        <td><?=$Username?></td>
                                    </tr>
                                    <tr>
                                        <td>Ultima conexión</td>
                                        <!-- SI DISPONE DE UNA ULTIMA CONEXIÓN MOSTRARÁ LA FECHA SINO AHORA -->
                                        <td><?php if(isset($_COOKIE['lastconnection'])){echo $_COOKIE['lastconnection'];} else{ echo 'Ahora';}?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <a href="ejercicioLogOut[LogOut].php" class="btn btn-primary active">Log Out</a>
                                            <!-- SI MARCO EL RECUERDAME , PODRÁ DESACTIVARLO DESDE AQUÍ -->
                                            <?php if (isset($_POST['RememberMe'])) { ?>
                                                <a href="ejercicioLogOut[LogIn].php?noRemember" class="btn btn-primary">No recordarme</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </body>
</html>