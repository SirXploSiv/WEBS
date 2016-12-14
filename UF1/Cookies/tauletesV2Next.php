<!DOCTYPE html>
    <head><title></title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="../../../css/bootstrap-3.3.7-dist/css/bootstrap.min.css" />

    </head>
    <body>
        <div class="container">
            <header>
                <div class="page-header">
                    <h1>EJERCICIO #3 COOKIES &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <?php 

                            if (isset($_COOKIE['TABLETS'])) {
                                $dataCookie = $_COOKIE['TABLETS'];
                                $dataCookie = unserialize($dataCookie);
                                
                                foreach ($dataCookie as $valor) {
                                        echo  "
                                        <div class='thumbnail'>
                                                    <img src='../../../img/".$valor.".png' alt='".$valor."' class='img img-thumbnail img-circle'/>
                                        </div>";
                                }
                           }
                                            
                            
                        ?>
                        <a href="tauletesV2.php"><button class="btn btn-primary" value="back">Volver atrás</button></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>