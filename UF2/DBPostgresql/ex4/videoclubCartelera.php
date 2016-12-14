<?php
    include 'object/soci.php';
    include 'conexion/conexion.php';
    session_start();
    $codSoci = $_SESSION['soci'];
    $control = false;
 ?>
    <!DOCTYPE html>
    <head><title></title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <div class="page-header">
                    <h1>EDT <small>videoclub</small></h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-md-3">
                                <h3>Retornar pel·lícules</h3>
                                <div class="alert alert-info text-center">No hi ha cap pel·lícula per retornar</div>
                            </div>
                            <div class="col-md-4 col-md-offset-1">
                                <h3>Reserva pel·lícules</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                    <!-- TODO LEER MÁS -->
                                        <?php require 'movieView.php'; ?>
                                        <?=$rows?>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Mis Datos</h3>
                                        <p><strong>Usuario</strong></p>
                                        <p><?=$codSoci->getLogin()?></p>
                                        <p><strong>Nombre</strong></p>
                                        <p><?=$codSoci->getNom()?></p>
                                        <p><strong>Cognoms</strong></p>
                                        <p><?=$codSoci->getCognoms()?></p>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="btn btn-info">Editar perfil</a>
                                        <a href="#" class="btn btn-danger">Tancar Sessió</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PAGINATION -->
                     <div class="col-md-6 text-center col-md-offset-3">
                        <?php #disabled active?>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm">
                                <?php require 'pagination.php'; ?>    
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>