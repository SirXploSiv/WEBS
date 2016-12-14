<?php

    if (isset($_GET['noRemember'])) {
        setcookie("Username","",time()-3600);
        setcookie("Okay","disabled",time()+3600);
        header("location: ejercicioLogOut[Profile].php");
    } else if(isset($_COOKIE['Username'])) {
        header("location: ejercicioLogOut[Profile].php");
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
                    <h1>Ejercicio Teoría [LogIn] &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 text-center">
                     <form action="ejercicioLogOut[Profile].php" method="POST" class="form-inline">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" name="Username" id="Username" placeholder="Insert an username"/>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" name="Password" id="Password" placeholder="Insert your password" maxlength="20" minlength="4"/>
                        </div>
                        <div class="form-group">
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