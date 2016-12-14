<?php

/*

Exercici 2

Realizar un script php anomenat idioma.php el qual carregarà una pàgina index.html en espanyol, català, francès o anglès.

Creeu l'estructura de directoris necessaria de l'estil que mostri segons l'idioma 
(directoris de , el texto español, català, anglés i francés. Utilitzeu el que calgui perquè el codi sigui mínim.

La funció que heu d'utilitzar es header, explicada el darrer dia.

*/

?>
<!DOCTYPE html>
    <head>
        <title>DNI PHP</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    </head>   
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <header>
                        <div class="page-header">
                            <h1>IDIOMA SELECT&copy; Joel García</h1>
                        </div>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                          $value = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

                            switch ($value) {
                                
                                case "en" : echo 'Redirigiendo a página en English ( 3 Segundos ) ';
                                header('Refresh: 3;url=en');
                                //header('location:en');
                                break;

                                case "es" : echo 'Redirigiendo a página en Español ( 3 Segundos ) ';
                                header("refresh=3;url=es");
                                //header('location:es');
                                break;

                                case "ca" : echo 'Redirigiendo a página en Catalan ( 3 Segundos ) ';
                                header("refresh=3;url=ca");
                                //header('location:ca');
                                break;

                                case "fr" : echo 'Redirigiendo a página en frances ( 3 Segundos ) ';
                                header("refresh=3;url=fr");
                                //header('location:fr');
                                break;
                                
                            }
                     ?>
                </div>
            </div>   
        </div> 
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>