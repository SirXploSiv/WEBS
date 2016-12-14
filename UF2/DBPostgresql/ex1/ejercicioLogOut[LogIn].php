<?php

    session_start();

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
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div class="page-header text-center">
                    <h1>Ejercicio <code>$_SESSION</code> [LogIn] &copy; Joel García <small>Validación por sessiones</small></h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="alert alert-info">
                        <strong>Username: Joel &amp; Password: clave123</strong>
                    </div>
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
        </div>
    </body>
</html>