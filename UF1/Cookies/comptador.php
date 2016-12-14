<?php

        //ini_set('display_errors', 'On');
        //error_reporting(E_ALL);

        if (!isset($_COOKIE['contador'])) {
            setcookie("contador",0,time()+3600);
        } else {
            setcookie("contador",$_COOKIE['contador']+1,time()+3600);
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
                    <h1>EJERCICIOS COOKIES &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <?php 
                            if ($firstTime) {
                                echo '<p>Hola es tú primera vez, hemos creado una cookie para contar tus visitas</p>';
                                echo '<p>Numero de visitas : 0</p>';
                            } else {
                                echo '<p>Bienvenido de nuevo !!</p>';
                                echo '<p>Numero de visitas : '.$_COOKIE["contador"].'</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>