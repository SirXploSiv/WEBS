<?php
    # Exercicis Arrays
    # 1 .Suma total de les cinc components d’un vector
    # 2. Crear un script que demani a l’usuari 5 nombres els guarde a un vector i mostri per pantalla el major i el menor.
    # 3. Programa per a contar el nombre d’ocurrències d’un nombre. En un vector de 10 components obté el nombre de valors que apareixen dos vegades.
    # 4. Programa per a calcular la nota mitjà d’un alumne. La nota està formada per 5 notes que s’introdueixen a través d’un formulari.


    $numeros = array(1 , 2 , 3 , 4 , 5);
    $total = 0;

    foreach ($numeros as $num) {
        $total += $num;
    }

?>

<!DOCTYPE html>
    <head><title></title>
        <!-- Latest compiled and minified CSS -->
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
                                </div>
                                <code>$numeros = array(1 , 2 , 3 , 4 , 5);<br />$total = 0;<br />foreach ($numeros as $num) {<br />$total += $num;}<br />print_r("Total ejercicio 1 : "+$total);</code><br />
                                <?php echo "<br />Resultado : "+$total ?>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <h2>Ejercicio #2</h2>
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group">
                                <label for="num_1">#1</label>
                                <input type="numeric" class="form-control" id="num_1" name="num_1" placeholder="numero [0-9]" min="0" max="9"/>
                                <label for="num_2">#2</label>
                                <input type="numeric" class="form-control" id="num_2" name="num_2" placeholder="numero [0-9]" min="0" max="9"/>
                                <label for="num_3">#3</label>
                                <input type="numeric" class="form-control" id="num_3" name="num_3" placeholder="numero [0-9]" min="0" max="9"/>
                                <label for="num_4">#4</label>
                                <input type="numeric" class="form-control" id="num_4" name="num_4" placeholder="numero [0-9]" min="0" max="9"/>
                                <label for="num_5">#5</label>
                                <input type="numeric" class="form-control" id="num_5" name="num_5" placeholder="numero [0-9]" min="0" max="9"/>
                            </div>
                            <button type="submit" name="submit" id="submit">Enviar</button>
                        </form>
                        <?php 
                            if (isset($_POST["submit"])) {
                                
                                $nums = array( $_POST["num_1"] ,  $_POST["num_2"] ,  $_POST["num_3"] ,  $_POST["num_4"] , $_POST["num_5"]);
                                
                            //   sort($nums);
                                echo '<br />';
                                print_r($nums);

                                $pantalla = "";

                                $nMax = $nums[0];
                                $nMin = $nums[0];

                                for ($j = 0; $j < count($nums); $j++) {
                                    
                                    $tmp = $nums[$j];            
                                    
                                    if ( $nMax < $tmp )  {
                                        $nMax = $tmp;
                                    }

                                    if ($nMin > $tmp) {
                                        $nMin = $tmp;
                                    }

                                }

                                $pantalla .= "<br />MAX VALUE : ".$nMax."<br />";
                                $pantalla .= "<br />MIN VALUE : ".$nMin."<br />";
                                
                                echo "<p class='text-center'>".$pantalla."</p>";

                                }
                        ?>
                    </div>
                    <div class="col-md-6 text-center">
                        <h2>Ejercicio #3</h2>
                        <p>Programa per a contar el nombre d’ocurrències d’un nombre. En un vector de 10 components obté el nombre de valors que apareixen dos vegades.</p>
                        <?php
                        
                        $arrayNumber = array(2,8,5,1,2,3,1,8,9,3);
                            $arrayOcurrencias = array();
                            $indexOcu = 0;
                            $appear = 0;
                            
                            for ($i = 0; $i < count($arrayNumber); $i++) {
                                for ($x = 0; $x < count($arrayNumber); $x++) {
                                    if ( $arrayNumber[$i]==$arrayNumber[$x] ) {
                                        $appear++;
                                    }
                                }
                                if ($appear==2) {
                                    
                                    $control = true;

                                    for ($ocurrencias = 0; $ocurrencias < count($arrayOcurrencias);$ocurrencias++) {
                                        if ($arrayOcurrencias[$ocurrencias] == $arrayNumber[$i]) {
                                            $control = false;
                                        }    
                                    }

                                    if ($control) {
                                        $arrayOcurrencias[$indexOcu] = $arrayNumber[$i];
                                        $indexOcu++;
                                    }

                                    $appear = 0;
                                    
                                } else {
                                    $appear = 0;
                                }
                            }                   
                            
                            
                            print_r($arrayOcurrencias);

                        ?>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 text-center">
                    <div class="jumbotron">
                    <h2>Ejercicio #4</h2>
                    <p>Programa per a calcular la nota mitjà d’un alumne. La nota està formada per 5 notes que s’introdueixen a través d’un formulari.</p>
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group">
                                <label for="nota_1">#1</label>
                                <input type="numeric" class="form-control" id="nota_1" name="nota_1" placeholder="numero [0-10]"/>
                                <label for="nota_2">#2</label>
                                <input type="numeric" class="form-control" id="nota_2" name="nota_2" placeholder="numero [0-10]"/>
                                <label for="nota_3">#3</label>
                                <input type="numeric" class="form-control" id="nota_3" name="nota_3" placeholder="numero [0-10]"/>
                                <label for="nota_4">#4</label>
                                <input type="numeric" class="form-control" id="nota_4" name="nota_4" placeholder="numero [0-10]"/>
                                <label for="nota_5">#5</label>
                                <input type="numeric" class="form-control" id="nota_5" name="nota_5" placeholder="numero [0-10]"/>
                            </div>
                                <button type="submit" name="ejercicio4" >Enviar</button>
                        </form>
                        <p class="well">
                            <?php 
                                if (isset($_POST['ejercicio4'])) {
                                    define("NOTAS",5);
                                    $total = $_POST['nota_1']+$_POST['nota_2']+$_POST['nota_3']+$_POST['nota_4']+$_POST['nota_5'];
                                    $media = $total/NOTAS;
                                    echo $media;
                                }
                            ?>
                        </p>           
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
