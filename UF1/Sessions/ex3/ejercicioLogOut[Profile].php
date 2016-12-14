<?php

    session_start();

    if (isset($_POST['profile'])) {

        if (isset($_POST['RememberMe'])) {

            setcookie("Username",$_POST['Username'],time()+3600);
            $_SESSION['Username'] = $_POST['Username'];

        } else {

            $_SESSION['Username'] = $_POST['Username'];

        }

        $_SESSION['Password']=$_POST['Password'];

        extract($_SESSION);

    } else if (isset($_SESSION['Password'])) {

        extract($_SESSION);

    } else if (isset($_COOKIE['Username'])) {
        $_SESSION['Username'] = $_COOKIE['Username'];
        extract($_SESSION);
    } else if (isset($_COOKIE['Okay'])) {
        extract($_SESSION);
    } else {        
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
                    <div class="jumbotron">
                        <h1>Mis datos de usuario</h1>
                        <p>Hola, <?=$Username?></p>
                        <p>Su ultima conexión fue....<?=$_COOKIE['lastconnection']?></p>
                        <a href="ejercicioLogOut[LogOut].php" class="btn btn-primary active">Log Out</a>
                         <?php if (isset($_POST['RememberMe'])) { ?>
                            <a href="ejercicioLogOut[LogIn].php?noRemember" class="btn btn-primary">No recordarme</a>
                        <?php } ?>
                    </div>
                 </div>
            </div>
        </div>
    </body>
</html>