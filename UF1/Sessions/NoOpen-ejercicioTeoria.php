<?php session_start(); ?>
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
                    <h1>Teoría &copy; Joel García</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="jumbotron">
                        <h2 class="text-info">Crear sesion</h2>
                            <small>Iniciar una nueva sesión o reanudar la existente</small></h2>
                            <div class="well">
                                <code>session_start();</code>
                            </div>
                        <h2 class="text-info">Ver ID sessión</h2>
                            <small>La <strong>primera</strong> vez se mostrará el valor de <strong>session_id()</strong> directamente en cambio</small>
                            <small>la <strong>segunda</strong> vez , mostrará tambien la cookie y mostrará el valor de ambas opciones para ver el ID.</small>
                            <div class="well">
                                <code>session_id(); o $_COOKIE['PHPSESSID'];</code>
                            </div>
                        <h2 class="text-info">Ver NOMBRE session</h2>
                            <small>Obtener y/o establecer el nombre de la sesión actual</small>
                            <div class="well">
                                <code>session_name();</code>
                            </div>
                        <h2 class="text-info">Ver VARIABLES de session</h2>
                            <small><strong>print_r</strong> — Imprime información legible para humanos sobre una variable</small>
                            <small><strong>var_dump</strong> — Muestra información sobre una variable</small>
                            <div class="well">
                                <code>print_r($_SESSION); o var_dump($_SESSION);</code>
                            </div>
                        <h2 class="text-info">Mostrar NUMERO de variables de session</h2>
                            <small><strong>count</strong> — Cuenta todos los elementos de un array o algo de un objeto</small>
                            <div class="well">
                                <code>count($_SESSION);</code>
                            </div>
                        <h2 class="text-info">Crear VARIABLES de session</h2>
                            <div class="well">
                                 <code>$_SESSION['nombreVarSession']</code>
                            </div>
                        <h2 class="text-info">Destruir una sessión</h2>
                            <small>Destruye toda la información registrada de una sesión</small>
                            <div class="well">
                                 <code>$_SESSION['nombreVarSession'] = ""; o $_SESSION = array(); y session_destroy();</code>
                            </div>
                        <h2 class="text-muted">Ejercicio ejemplo , destruir session</h2>
                            <div class="well">
                                 <a href="ejercicioLogOut[Login].php" class="btn btn-primary btn-lg active"></a> 
                            </div>
                    </div>
                 </div>
            </div>
        </div>
    </body>
</html>