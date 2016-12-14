
<?php

/*

Exercici 1
 
Heu de fer un script anomenat dni.php el qual demana a l'usuari que introdueixi un dni en un quadre de text a tal efecte.
L'script validarà si el dni és correcte o no en funció de l'algorisme que hi ha a sota.

Actualment, quan es parla de DNI ens estem referint als 8 dígits més la lletra.
 

Algorisme:

La lletra del DNI s'obté a partir d'un algorisme conegut com a mòdul 23. L'algorisme consisteix a aplicar l'operació aritmètica de mòdul 23 sobre els 8 dígits numèrics del DNI.
El resultat és un número comprès entre el 0 i el 22. Sobre la base d'una taula coneguda s'obté una lletra.

    No s'utilitzen les lletres: I, Ñ, O, U
    La I i la O s'eviten per evitar confusions amb altres caràcters, com 1, l o 0.
    S'usen vint-i lletres per ser aquest un número primer.


Us deixo el text literal perquè el pugueu copiar per crear la variable corresponent: TRWAGMYFPDXBNJZSQVHLCKE

*/ 

$letras = array(T,R,W,A,G,M,Y,F,P,D,X,B,N,J,Z,S,Q,V,H,L,C,K,E);

?>

<!DOCTYPE html>
    <head>
        <title>DNI PHP</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    </head>   
    <body>
        <?php if(!isset($_POST['submit'])) { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <header>
                        <div class="page-header">
                            <h1>Validar DNI &copy; Joel García</h1>
                        </div>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <div  class="form-group">
                        <input type="numeric" class="form-control" name="numerosIn" placeholder="Introduce numero DNI ej. ( 45654654 )" max="99999999"/>
                        <button class="btn btn-primary" type="submit" value="Submit" name="submit" style="margin-top:10px;">Obtener letra</button>
                    </div> 
                    </form>
                </div>
            </div>   
        </div> 
        <?php } ?>
        <?php
         if (isset($_POST['submit'])) {
            $numero = substr($_POST['numerosIn'],0,8);
            $letra = substr($_POST['numerosIn'],8,9);
            if ($numero>=10000000&&$numero<=999999999) {
                $obtenerLetra = $numero % 23 ;
                if (strcmp($letras[$obtenerLetra],$letra)==0) {
                    echo '<br /><p class="text-center" style="font-size: 30px;"> Correcto , '.$numero.' - '.$letra.'</p>';
                } else {
                    echo '<br /><p class="text-center" style="font-size: 30px;"> Letra incorrecta , '.$numero.' - '.$letra.' | La correcta es : '.$letras[$obtenerLetra].'</p>';
                }
            } else {
                echo '<br /><p class="text-center" style="font-size: 30px;">Valor introducido invalido</p>';
            }
        } ?>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>