<?php
    define("HOST","localhost");
    define("PORT","5432");
    define("DBNAME","test");
    define("USER","test");
    define("PASSWORD","test");
    //CONFIGURACION_PARA_PG_CONNECT
    define("CONNECT_PARAMETERS","host=".HOST." port=".PORT." dbname=".DBNAME." user=".USER." password=".PASSWORD);
    $pgsql_conn = pg_pconnect(CONNECT_PARAMETERS) or die("No se pudo conectar");
    $result = pg_query("SELECT * FROM tauleta");
    $columnas = "";
    while ($row = pg_fetch_array($result)) {
        $marca = $row['marca'];
        $ssoo = $row['ssoo'];
        $columnas .= "<tr><td class='text-success'>".$marca."</td><td class='text-info'>".$ssoo."</td></tr>";
    }
    pg_close($pgsql_conn);
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
                    <h1>EJERCICIO #  &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Marca</th>
                                <th>SSOO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$columnas?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>