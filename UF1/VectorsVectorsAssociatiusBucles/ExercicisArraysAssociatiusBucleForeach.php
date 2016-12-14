
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
                    <h1>EJERCICIOS &copy; Joel García</h1>
                </div>
            </header>
            <div class="container">
                <div class="row">
                        <div class="col-md-12 text-center">
                                <div class="jumbotron">
                                    <div class="page-header">
                                        <h2>Ejercicio # 1</h2>
                                        <p>Emmagatzemar en un vector associatiu la quantitat de dies que té cada mes de l'any. Després accedir-pel seu nom com a subíndex.Preguntar a l’usuari quin mes de l’any vol consultar i que mostre el nombre de dies per pantalla.</p>                                </div>
                                    <?php
                                        if (!isset($_POST['enviarMes'])) {
                                    ?> 
                                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                                        <div class="form-group">
                                            <label for="mes">Meses</label>
                                                <select class="form-control" id="mes" name="mes">
                                                    <option>Enero</option>
                                                    <option>Febrero</option>
                                                    <option>Marzo</option>
                                                    <option>Abril</option>
                                                    <option>Mayo</option>
                                                    <option>Junio</option>
                                                    <option>Julio</option>
                                                    <option>Agosto</option>
                                                    <option>Septiembre</option>
                                                    <option>Octubre</option>
                                                    <option>Noviembre</option>
                                                    <option>Diciembre</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                        <button class="btn btn-primary" name="enviarMes">Obtener días</button>
                                        </div>
                                    </form>
                                    <?php } ?>
                                    <?php 
                                        if (isset($_POST['enviarMes'])) {
                                            $mesSel = $_POST['mes'];
                                            if (strcmp($mesSel,"Febrero")==0) {
                                                $year = date("Y");
                                                if ( ($year%4==0 && $year%100!=0) || $year%400==0) {
                                                    $mesSel = "Febrero_Bisiesto";
                                                }
                                            }
                                            $meses = array(
                                                "Enero"=> 31 ,
                                                "Febrero" => 28,
                                                "Febrero_Bisiesto" => 29,
                                                "Marzo" => 31,
                                                "Abril" => 30,
                                                "Mayo" => 31,
                                                "Junio"=> 30,
                                                "Julio" => 31,
                                                "Agosto" => 31,
                                                "Septiembre"=>30,
                                                "Octubre"=>31,
                                                "Noviembre"=>30,
                                                "Diciembre"=>31
                                            );
                                            echo "<p class='text-center'>Días del mes de ".$mesSel."   :   ".$meses[$mesSel]."</p>";
                                        }
                                    ?>
                                </div>
                        </div>
                    </div>
                <div class="row">
                     <div class="col-md-12  text-center">
                         <div class="jumbotron">
                              <div class="page-header">
                                  <h2>Ejercicio # 2</h2>
                              </div>
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                        <div class="form-group">
                                            <label for="mes">Mes</label>
                                            <input type="number" class="form-control" id="mes" name="mes" placeholder="Introduce el numero del mes" min="1" max="12"/>
                                            <label for="ano">Año</label>
                                            <input type="number" class="form-control" id="ano" name="ano" placeholder="Introduce el numero del año" min="1970"/>
                                        </div>
                                        <button type="submit" name="monthYear" id="submit">Enviar</button>
                                    </form>
                              <?php
                                    // Apuntes --> echo ( date("t",strtotime("now"))); Devuelve el último día del mes actual.
                                    
                                    if (isset($_POST['monthYear'])) {
                                        
                                        $mes = $_POST['mes'];
                                        $ano = $_POST['ano'];

                                        $diaAnterior = 0;
                                        $meses = array();

                                        for ($x = 1; $x <= 12; $x++) {
                                            if ($x<10) {
                                                $meses[$x] = date("d",strtotime($diaAnterior."-0".$x."-".$ano));
                                            } else {
                                                $meses[$x] = date("d",strtotime($diaAnterior."-".$x."-".$ano));
                                            }
                                        }

                                        echo '<br />Días del mes: '.$meses[$mes];

                                       // Resultado en una línea: 
                                       // echo '<br />Días del mes: '.date("d",strtotime($diaAnterior."-".$mes."-".$ano));

                                    }
                              ?> 
                         </div>
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <div class="page-header">
                                <h2>Ejercicio # 3</h2>
                                <p>Definir un array que indique per a cada producte, quin és el seu preu i mostre el preu de tots els productes per pantalla.</p>
                            </div>
                            <?php
                                $productos = array(
                                    "Peluche"=>3,
                                    "Ordenador"=>5,
                                    "Ratón"=>6,
                                    "SmartPhone"=>10
                                );

                            ?>
                            <div class="container table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Preu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $total = 0;
                                        foreach ($productos as $key=>$value) {
                                            echo "<tr><td class='warning'>".$key."</td><td>".$value."</td></tr>";
                                            $total += $value;        
                                        }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr><td class="info">TOTAL</td><td class="success"><?php echo $total; ?></td></tr>
                                </table>
                             </div>
                        </div>
                </div>
            </div>
        </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <body>    
</html>