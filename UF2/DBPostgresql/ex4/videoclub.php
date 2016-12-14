<?php
    include 'conexion/conexion.php';
    include 'object/soci.php';
    session_start();
 ?>
<!DOCTYPE html>
    <head>
        <title>EDT Videoclub</title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container">
            <header>
                <div class="page-header">
                    <h1>EDT <small>videoclub</small></h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                       <div class="row display-table">
                            <div class="col-md-3 display-cell">
                                <img src="img/marilynMonroe.png" alt="" width="350" height="450" class="img img-circle"/>  
                            </div>
                            <div class="col-md-6 display-cell">
                                <form action="" method="POST">
                                    <div class="form-group <?php echo (isset($_COOKIE['Error'])) ? $_COOKIE['Error'] : '' ;?>">
                                        <label class="control-label" for="username">Usuari</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Introdueix el nom d'usuari"/>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo (isset($_COOKIE['Error'])) ? $_COOKIE['Error'] : '' ;?>">
                                        <label  class="control-label" for="password">Contrasenya</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Introdueix la contrasenya"/>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger center-block" name="enter">Entrar</button>
                                </form>
                                <?php
                                    if (isset($_COOKIE['Error'])) {
                                        setcookie('Error','',time()-30);
                                    }
                                 ?>
                            </div>
                            <div class="col-md-3 display-cell">
                                <img src="img/cameraBoy.png" alt="" width="370" height="450" class="img img-rounded"/>  
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 
<?php
    if (isset($_POST['enter'])) {
        if (isset($_POST['username'])&&isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $conexion = new Conexion();
            $conexion->connect();
            $validate = $conexion->checkSoci($username,$password);
            if ( $validate === 1 ) {
                $conexion->closeConnection();
                $conexion->connect();
                $result = $conexion->getAllSocis($username);
                $row = pg_fetch_array($result);
                $soci = new Soci($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
                $_SESSION['soci'] = $soci;
                $conexion->closeConnection();                
                header('location: videoclubCartelera.php');
            } else {
                $conexion->closeConnection();
                setcookie('Error','has-error',time()+30);
                header('location:'.$_SERVER["PHP_SELF"]);                
            }
        }
    }
 ?>