<?php
/*

Exercici 3

Implementa l'script usuari.php, el qual ha de demanar el nom, el cognom, el gènere (home o dona) amb radio button,
Aficions presentant checkbox per cadascuna de les següents opcions: Lectura, Música, Viatges i Esports.

La tasca de l'script serà mostrar el seu nom sercer de l'usuari, si és home o dona i les aficions que té.
A més a més, li indicarà quin serà el seu nickname per connectarse. Aquest login es calcula en base a la seva inicial del nom concatenat amb el cognom sencer,
fins a una longitud màxima de 8 en total i tot en minúscules.

*/ 
?>

<!DOCTYPE html>
    <head>
        <title>USUARI</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    </head>   
    <body>
    <?php if(!isset($_POST['usuari_form'])) { ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <header>
                        <div class="page-header">
                            <h1>FORMULARIO USUARI</h1>
                        </div>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <div  class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"/>
                            <label for="apellido">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos"/>
                            <label for="Genero">Genero</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="genero" value="home" checked="checked">
                                    HOMBRE
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="genero" value="dona">
                                    MUJER
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="check[]" value="Lectura">
                                    Lectura
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="check[]" value="Musica">
                                    Musica
                                </label>
                            </div>  
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="check[]" value="Viatges">
                                    Viatges
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="check[]" value="Esports">
                                    Esports
                                </label>
                            </div>  
                            <button type="submit" class="btn btn-primary form-control" name="usuari_form" value="submit">Enviar</button>
                        </form>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-12 text-center">
                    <?php

                       $nombre = $_POST["nombre"];
                       $apellido = $_POST["apellido"];
                       $genero = $_POST["genero"];
                       $aficiones = $_POST["check"];
                       $resultado_aficiones = "";

                        if (isset($_POST['usuari_form'])) {

                        # key=>value | $clau => $checkbox ->>> Muestra la clave y el valor.
                        # 0123 -> Array normal.. 

                       foreach ( $aficiones as $clau=>$checkbox ) {
                           $resultado_aficiones .= "  "."$checkbox";
                       }

                       echo '<br />';
                       echo '<p><strong>NOMBRE COMPLETO</strong></p>'.$nombre.' '.$apellido.'<br />';
                       echo '<br /><p><strong>GENERO</strong></p>'.$genero.'<br />';
                       echo '<br /><p><strong>AFICIONES</strong></p>'.$resultado_aficiones.'<br />';
                       echo '<br /><p><strong>NICKNAME</strong></p>'.substr(strtolower(substr($nombre,0,1).$apellido),0,8).'<br />';

                        }

                    ?> 
                </div>
            </div>   
        </div>    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>