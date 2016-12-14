<?php

session_start();

include 'conexion/conexion.php';
$conexion = new Conexion();

    // AMBAS REDIRIGEN AL PERFIL
    #
    #SI EL USUARIO , YA NO QUIERE SER RECORDADO
if (isset($_GET['noRemember'])) {
    setcookie("Username","",time()-3600);
    header("location: ejercicioLogOut[Profile].php");
    #SINO SI , EL USUARIO DISPONE DE UNA SESSION EXISTENTE
} else if(isset($_SESSION['Username'])) {
    header("location: ejercicioLogOut[Profile].php");
}
    #
    // FIN 

?>
<!DOCTYPE html>
<head>
    <title>EjercicioTeoria</title>
    <!-- Latest compiled and minified CSS -->
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
        .top-buffer { margin-top:20px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="page-header text-center">
                <h1>Ejercicio <code>$psql_connection</code> [LogIn] &copy; Joel García <small>Validación contra base de datos</small></h1>
            </div>
        </header>
        <div class="row">
            <div class="col-md-12 text-center">
                <!-- SI EXISTE ALGÚN ERROR SERÁ MOSTRADO EN ESTE DIV -->
                <?php if (isset($_COOKIE["Error"])) { ?>
                <div class="alert alert-warning">
                    <strong>Ops! </strong><?=$_COOKIE["Error"];?>
                    <?php setcookie("Error","",time()-3600); ?>
                </div>
                <?php } ?>
                <!-- FIN EMBED -->
                <form action="ejercicioLogOut[Profile].php" method="POST" class="form-inline">
                    <div class="form-group">
                        <!-- SI DISPONE DE RECUERDAME , MOSTRARÁ SU USUARIO -->
                        <label for="Username">Username</label>                                   
                        <input type="text" class="form-control" name="Username" id="Username" placeholder="Insert an username" value="<?php echo (isset($_COOKIE['Username'])) ?  $_COOKIE['Username'] : ''; ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Insert your password" maxlength="20" minlength="4" required/>
                    </div>
                    <div class="form-group">
                        <!-- SI DISPONE DE RECUERDAME , SALDRÁ EL CHECK -->
                        <label for="RememberMe">Remember me</label>                            
                        <input type="checkbox" class="form-control" name="RememberMe" id="RememberMe" maxlength="20" minlength="4" <?php echo (isset($_COOKIE['Username'])) ?  'checked' : ''; ?>/>
                    </div>
                    <button type="submit" class="btn btn-primary form-control" name="profile">Validar</button>
                </form>
            </div>
        </div>
        <!-- EXTRA MOSTRAR LOS USUARIOS DISPONIBLES PARA ACCEDER -->
        <div class="row top-buffer">
            <div class="col-md-6 col-md-offset-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-success text-center" colspan="5">Available Users</th>
                        </tr>
                        <tr>
                            <th class="text-info">Username</th>
                            <th class="text-info">Password</th>
                            <th class="text-info">First Name</th>
                            <th class="text-info">Last Name</th>
                            <th class="text-info">Password Without Encrypt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $indexWithoutMd5 = 0;
                            $passwordWithoutMd5 = array(
                                "berkhamsted",
                                "newyork",
                                "leicester",
                                "cambridge"
                            );                       

                            $result = $conexion->getAllUsers();
                            while ($row = pg_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?=$row['username']?></td>
                            <td><?=$row['password_hash']?></td>
                            <td><?=$row['first_name']?></td>
                            <td><?=$row['last_name']?></td>
                            <td><?=$passwordWithoutMd5[$indexWithoutMd5++]?></td>
                        </tr>
                        <?php
                            }
                            $conexion->closeConnection();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>