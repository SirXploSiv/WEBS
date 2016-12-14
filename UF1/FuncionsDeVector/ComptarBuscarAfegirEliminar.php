<?php

 #Comptar, buscar, afegir i eliminar

 #   count()
 #   array_key_exists()
 #   in_array()
 #   afegir element manualment vs array_unshift()/array_push()
 #   unset() vs array_pop()/array_shift()

 $prueba = array(1,2,3,4,5,6);

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
            <div class="row">
                <div class="col-md-12">
                    <p>Array de prueba : <code>$prueba = array(1,2,3,4,5,6);</code></p>
                    <p><u>Funciones</u></p>
                    <p><code>count($prueba);</code> Resultado : <?php echo count($prueba); ?></p>
                    <p><code>(array_key_exists(1,$prueba)) ? "true" : "false";</code> Resultado : <?php echo (array_key_exists(1,$prueba)) ? "true" : "false"; ?></p>
                    <p><code>(array_key_exists(8,$prueba)) ? "true" : "false";</code> Resultado : <?php echo (array_key_exists(8,$prueba)) ? "true" : "false"; ?></p>

                    <!-- in_array valor_a_buscar , array , true (true para que el TYPE  sea igual en el array que el que buscamos); -->  

                    <p><code>(in_array(1,$prueba)) ? "true" : "false";</code> Resultado : <?php echo (in_array(1,$prueba)) ? "true" : "false"; ?></p>
                    <p><code>(in_array(8,$prueba)) ? "true" : "false";</code> Resultado : <?php echo (in_array(8,$prueba)) ? "true" : "false"; ?></p>

                    <?php
                    /*

                    <?php
                    $str = "Hello world. It's a beautiful day.";
                    print_r (explode(" ",$str));
                    ?>
                    
                     <?php
                    $arr = array('Hello','World!','Beautiful','Day!');
                    echo implode(" ",$arr);
                    ?>

                    Añade un elemento al final del array -> $mes[] = "gener";
                    Añade un elemento referente a esa key -> $mes['gener'] = 31;
                    
                    array_unshift() --> PRINCIPO DEL ARRAY
                    array_push() --> AL FINAL DEL ARRAY
                    
                    sí el array associativo no tiene la key especificada , comprobará sí
                    hay una key númerica y sino lo añadira con la key 0.                    
                    $mes[] = 30;

                    unset() y array_pop() --> Quita uno del final
                    array_shift --> Quita el principio
                    
                    EJEMPLO:

                            Sí no especificamos la posición del elemento del array a borrar, eliminara la variable $dia "El array" lo desetea...

                            Unset elimina el index del array por lo tanto al intentar insertar en la ultima posicion
                            dia[] = "Domingo";
                            Con un index +2 al anterior.


                            unset($dia[3]);
                            php > print_r($dia);
                            Array
                            (
                                [0] => Lunes
                                [1] => Martes
                                [2] => Miercoles
                                [4] => Viernes
                                [5] => Sabado
                                [6] => Domingo
                            )

                            array_shift($dia);
                            print_r($dia);
                                            Array
                        (
                            [1] => Martes
                            [2] => Miercoles
                            [3] => Jueves
                            [4] => Viernes
                            [5] => Sabado
                            [6] => Domingo
                        )
                        php > array_unshift($dia,"Lunes");
                        php > print_r($dia);
                        Array
                        (
                            [0] => Lunes
                            [1] => Martes
                            [2] => Miercoles
                            [3] => Jueves
                            [4] => Viernes
                            [5] => Sabado
                            [6] => Domingo
                        )
                        php > array_pop($dia);
                        php > print_r($dia);
                        Array
                        (
                            [0] => Lunes
                            [1] => Martes
                            [2] => Miercoles
                            [3] => Jueves
                            [4] => Viernes
                            [5] => Sabado
                        )
                        php > array_push($dia,"Domingo");
                        php > print_r($dia);
                        Array
                        (
                            [0] => Lunes
                            [1] => Martes
                            [2] => Miercoles
                            [3] => Jueves
                            [4] => Viernes
                            [5] => Sabado
                            [6] => Domingo
                        )


                        ArrayAssociativo:

                        array_reverse($array) --> Gira el array 
                        array_reverse($array,TRUE) --> Gira el array manteniendo los indices

                        array_flip($array) --> VALOR PASA A SER KEY Y KEY PASA A SER VALOR.



                        --> reset() inicio del vector
                        --> end() final del vector
                        -->next() siguiente elemento del vector
                        -->key() --> devuelve una clave dada una posición
                        --> current() -->devuelve un valor dada una posición
                        -->prev() --> anterior elemento del vector

                        each() --> devuelve clau ( indice o key ) - valor ( indice o key ) | en un array asociativo.


*/                      

                    $pruebaManipulacionPunteroVector = array("Pepe","Marta","Laura","Paco","Joel","Claudia","Nerea","Tania");

                    //Recorro por key 
                    while (key($pruebaManipulacionPunteroVector)!==null) {
                            //Con each recojo un array associativo
                            $elemento = each($pruebaManipulacionPunteroVector);
                            //Muestro el elemento por key
                            echo $elemento['value'];                            
                    }
                    //Puntero al inicio
                    reset($pruebaManipulacionPunteroVector);
                    //Recorro por key
                    while (key($pruebaManipulacionPunteroVector)!==null) {
                            //Muestro el actual
                            echo current($pruebaManipulacionPunteroVector);
                            //Puntero un elemento alante
                            next($pruebaManipulacionPunteroVector);                         
                    }

                    //Puntero al final
                    end($pruebaManipulacionPunteroVector);
                    //Recorro por key
                    while (key($pruebaManipulacionPunteroVector)!==null) {
                        //Muestro el actual
                        echo current($pruebaManipulacionPunteroVector);
                        //Puntero un elemento atrás
                        prev($pruebaManipulacionPunteroVector);                         
                    }

                    /*
                    
                        cookies
                         --> Petit fragment d'informació emmagatzem al client'
                         --> no han de contenir informació confidencial (pwd,...);
                         --> Tipus:
                            -> Cookie de session --> Cerrar al navegador desaparece --> (Nombre y Valor)
                            -> Cookie de permanent --> Con un tiempo assignado de expiración --> (TTL time to life) --> (Nombre , Valor y Caducidad) ('Usuario','Pepe75',time()+86400

                        setcookie(nom,[valor],[Caducidad], , , );



                        Para setCookie y sesiones deben enviarse antes del código de la propia página es decir :
                        <?php setCookie(); ?>
                        <html>
                        </html>
                        
                        *--> Firefox guarda las cookies en sqlite;

                    */
                    

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>

