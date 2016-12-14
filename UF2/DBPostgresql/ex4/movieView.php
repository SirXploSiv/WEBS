                                        <div class="caption">
                                        <?php
                                            $conexion = new Conexion();
                                            $conexion->connect();
                                            $result = $conexion->getPelicules();
                                            $totalMovies = pg_num_rows($result);
                                            
                                            if (isset($_GET['pag'])) {
                                                $pag = $_GET['pag'];
                                                if ($pag < 0 || $pag > $totalMovies-1) {
                                                    setcookie('Error','<strong>Ops!</strong> No se ha encontrado la página',time()+30);
                                                    $conexion->closeConnection();
                                                    header('location:'.$_SERVER['PHP_SELF']);
                                                }
                                            } else {
                                                $pag = 0;
                                            }

                                            $rows = ""; 
                                            if (isset($_COOKIE['Error'])) {
                                                echo '<div class="alert alert-danger text-center">'.$_COOKIE['Error'].'</div>';
                                                setcookie('Error','',time()-30);
                                                $conexion->closeConnection();  
                                            } else {
                                                $result = $conexion->getPeliculesLimit(1,$pag);
                                                $conexion->closeConnection();  
                                                while ($row = pg_fetch_array($result)) {
                                                    $rows .= '
                                                                <h4>'.$row['titol'].'</h4>
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td rowspan="5"><img src="..." alt="'.$row['foto'].'"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Preu</td>
                                                                            <td class="text-success">'.$row['preu'].' &euro;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Genere</td>
                                                                            <td>'.$row['codgen'].'</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Director</td>
                                                                            <td>'.$row['coddir'].'</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Data Estrena</td>
                                                                            <td>'.$row['dataestrena'].'</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <p class="text-sm">'.$row['sinopsi'].'</p>
                                                                <p class="text-center"><a href="#" class="btn btn-warning" role="button"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Reserva</a></p>
                                                    '; 
                                                }
                                            }
                                        ?>
                                        </div>