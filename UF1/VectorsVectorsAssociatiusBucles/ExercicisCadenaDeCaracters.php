<?php 
    # 1. Donada la cadena: “Aquesta cadena conté moltes lletres”
    # Fer un script que:
    #   a. Compte el nombre de lletres de la cadena sense espais en blanc.
    #   b. Mostri la primera posició de la lletra “a” i de la lletra “l”
    #   c. Substitueix la paraula lletres per LLETRES
    #   d. Cerca “aquesta cadena”, substitueix per “aquest conjunt”
    #   c. Converteix la cadena a majúscules, sabent que el codi ascii de la 'A' és el 65 i el de la 'a' el 97 (useu les funcions chr i ord).
    #
    # 2.  Donades les següents cadenes:
    # Cadena1=“Cadena per a comparar”
    # Cadena2=“Cadena per a comparar 2”
    # Script que compare si dos cadenes són iguals i mostri per pantalla el resultat.
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
                                    <?php
                                        $characters = 0;
                                        define("CADENA","Aquesta cadena conte moltes lletres");
                                        $longCadena = strlen(CADENA);

                                        for ($i = 0 ; $i < $longCadena; $i++) {    
                                            $miCadena = substr(CADENA,$i,1);
                                            if ((strcmp($miCadena," "))!=0) {
                                                $characters ++;
                                            }                                            
                                        }
                                        
                                        echo "Compte el nombre de lletres de la cadena sense espais en blanc.<br />";
                                        echo "a)&nbsp;&nbsp;".$characters."<br />";

                                        $posicion = array(
                                            "a"=>0,
                                            "l"=>0
                                        );

                                        $aTrue = false;
                                        $lTrue = false;

                                        for ($j = 0; $j < $longCadena;$j++) {
                                            
                                            $miCadena = substr(CADENA,$j,1);
                                            
                                            if (strcasecmp($miCadena,"a") == 0 && $aTrue==false) {
                                                $aTrue = true;
                                                $posicion["a"] = $j;
                                            } else if (strcasecmp($miCadena,"l") == 0 && $lTrue==false) {
                                                $lTrue = true;
                                                $posicion["l"] = $j;
                                            }

                                            if ($aTrue&&$lTrue) { break; }

                                        }                                    

                                        echo "<br />Mostri la primera posició de la lletra \"a\" i de la lletra \"l\" <br />";
                                        echo " b)&nbsp;&nbsp; A: ".$posicion["a"]." L: ".$posicion["l"]."<br />";

                                        echo "<br />Substitueix la paraula lletres per LLETRES<br />";
                                        echo " c)&nbsp;&nbsp; ".substr(CADENA,0,28)." ".strToUpper(substr(CADENA,28))." <br />";

                                        $find = "Aquesta cadena";
                                        $lenStrToFind = strlen($find);

                                        $subs = "Aquest conjunt";
                                        $acumulador = "";

                                        for ($x = 0; $x < $longCadena; $x++) {
                                            $acumulador .= substr(CADENA,$x,1);
                                            if (strlen($acumulador)==$lenStrToFind) {
                                                if ( strcasecmp($acumulador,$find) ) {
                                                    $acumulador = $subs." ".substr(CADENA,$i);
                                                    //SUSTITUYE PARA PRINCIPIO DE CADENA
                                                    $acumulador .= substr(CADENA,strlen($acumulador));                                                    
                                                    break;            
                                                } else {
                                                    $acumulador = "";
                                                }
                                            }
                                        }

                                        echo "<br />Cerca \"aquesta cadena\", substitueix per \"aquest conjunt\" <br />";
                                        echo " d)&nbsp;&nbsp; ".$acumulador."<br />";

                                        
                                        $diff = 97-65;
                                        $cadenaMayus = "";
                                        for ($l = 0; $l < $longCadena; $l++) {
                                            $char = substr(CADENA,$l,1);
                                            $asciiChar = ord($char);
                                            if ($asciiChar>96) {
                                                $upperLetter = chr($asciiChar-$diff);                                          
                                                $cadenaMayus .= $upperLetter;
                                            } else {
                                                $cadenaMayus .= $char;
                                            }
                                        }

                                        echo "<br />Converteix la cadena a majúscules, sabent que el codi ascii de la 'A' és el 65 i el de la 'a' el 97 (useu les funcions chr i ord).<br />";
                                        echo "e)&nbsp;&nbsp;  ".$cadenaMayus."<br />";

                                        $cadena1="Cadena per a comparar";
                                        $cadena2="Cadena per a comparar 2";
                                        $resultado = "No són iguales";

                                        if ( strcasecmp($cadena1,$cadena2)==0 ) {
                                            $resultado = "Són iguales";
                                        } 

                                        echo "<br />Donades les següents cadenes: Cadena1=“Cadena per a comparar“ Cadena2=“Cadena per a comparar 2“<br />";
                                        echo "<br />d) ".$resultado;

                                     ?>
                               </div>
                          </div>
                     </div>
                 </div>
           </div>
     </body>
</html>