<?php
    #EL LOGOUT !!!!!
    if (isset($_GET['LogOut'])) {
        setcookie("Error","",time()-3600);
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location:".$_SERVER['PHP_SELF']);
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
                    <h1>EJERCICIO <code>$_SESSION</code> &copy; Joel García</h1>
                    <div class="well text-center">
                        Validación
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 text-left">
                    <?php
                        if (isset($_COOKIE['Error']) ){

                            switch ($_COOKIE['Error']) {
                                case "invalidUsePwd":
                                     echo '
                                    <div class="alert alert-danger">
                                        <strong>Ops!</strong> Usuario/Contraseña Incorrectos (Password should be > 4 and < 20 characters) 
                                    </div>';
                                    setcookie("Error","",time()-3600);
                                    break;

                                case "invalidSession":
                                     echo '
                                     <div class="alert alert-info">
                                         <strong>Ops!</strong> You must log in first ! 
                                     </div>';
                                     setcookie("Error","",time()-3600);
                                    break;
                                
                                default:
                                    # code...
                                    break;
                            }

                        }
                     ?>
                    <form action="verificar.php" method="POST">
                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" name="Username" id="Username" placeholder="Insert an username"/>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" class="form-control" name="Password" id="Password" placeholder="Insert your password" maxlength="20" minlength="4"/>
                        </div>
                        <button type="submit" class="btn btn-primary form-control" name="validar">Validar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>