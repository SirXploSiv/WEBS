


<?php 

      /*
      
        @author Joel Garcia Nuño

        22/09/2016
      
      
      
      */

       # SENTENCIAS CONDICIONALES Y ITERATIVAS
            
               # Realizar un programa que, a partir de tres variables enteras llamadas $a, $b y $c,

               # muestre por pantalla el valor de la mayor y la menor de ellas.

               # Si por ejemplo asignamos los valores 15, 94 y 73 a $a, $b y $c respectivamente, por

               # pantalla debe mostrarse:

               # El mayor valor de 15, 94 y 73 es 94

               # El menor valor de 15, 94 y 73 es 15

?>

<!DOCTYPE html>
    <head>
        <title>SENTENCIAS CONDICIONALES Y ITERATIVAS</title>
    </head>
    <body>
        <?php
            
            echo '<b>Numeros a valorar : 15 , 94 y 73</b> <br />';

            $a = 15; $b=94; $c=73;
            $menor = 0;
            $mayor = 0;
            
            
            if ( $a > $b && $a > $c ) {

                if ( $b > $c ) {
                    $menor = $c;
                } else {
                    $menor = $b;
                }

                $mayor = $a;

            } else if ( $b > $c && $b > $a) {

                if ( $a > $c ) {
                    $menor = $c;
                } else {
                    $menor = $a;
                }

                $mayor =  $b;
                
            } else {
                $mayor =  $c;
            }

            echo 'El menor valor es: &nbsp;'.$menor.'<br />El mayor valor es:&nbsp;'.$mayor;

        ?>
    </body>
</html>


