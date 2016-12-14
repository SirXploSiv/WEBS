<?php
include 'conexion/conexion.php';
$conexion = new Conexion();
$conexion->connect();
if (isset($_POST['eliminarFiltrado'])) {
    $result = $conexion->getAllTauleta();
    setcookie("ssooFilterCookie","",time()-3600);
    header("location: tauletes.php");
} else if (isset($_GET['precio'])) {
    $precio = $_GET['precio']; 
    if (isset($_GET['sort'])) {
        $result = $conexion->getTauletaByPriceSort($precio,$_GET['sort']);
    } else {
        $result = $conexion->getTauletaByPrice($precio);
    }
} else if (isset($_GET['marca'])) {
    $marca = $_GET['marca']; 
    if (isset($_GET['sort'])) {
        $result = $conexion->getTauletaByMarcaSort($marca,$_GET['sort']);
    } else {
        $result = $conexion->getTauletaByMarca($marca);
    }
} else if (isset($_COOKIE['ssooFilterCookie'])) {
    $ssoo = unserialize($_COOKIE['ssooFilterCookie']);
    $result = $conexion->getMultiFilter($ssoo);
} else {
    $result = $conexion->getAllTauleta();
}
$numResult = pg_num_rows($result);
//echo $conexion->statusConnection();
$conexion->closeConnection();

$form = '';
while ($row = pg_fetch_array($result)) {
      $control = false;

            if (isset($_COOKIE['TABLETS'])) {
                if ( in_array($row['marca'],unserialize($_COOKIE['TABLETS'])) ) {$control = true;} 
            }

            $ok = ($control) ? 'checked' : '';

    $conIva = number_format(((float)$row["preu"])*1.21,2);
    $form .= '
    <div class="form-group"> 
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="img/'.$row["imatge"].'" alt="'.$row["model"].'" title="'.$row["model"].'" />
            </div>
            <table class="table table-condensed table-bsorted">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center text-primary">Especificacions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-center">Marca</th>
                        <td class="success">'.$row["marca"].'</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Model</th>
                        <td class="success">'.$row["model"].'</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">Color</th>
                        <td class="success">'.$row["color"].'</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-center">SSOO</th>
                        <td class="success">'.$row["ssoo"].'</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center precio">
                <h4><strong>'.$conIva.'&euro; </strong><small>'.$row["preu"].'&euro; Sin iva</small></h4>
            </div> 
            <div class="checkbox text-center">
                <label><input type="checkbox" name="productChecked[]" value="'.$row['marca'].'" '.$ok.'>Seleccionar</label>
            </div>
        </div>
    </div>';
}

if ( $numResult == 0) {
 $form .= "<div class='alert alert-danger'><strong>Eps ! </strong>No hem trobat cap.</div>";
} else {
 $form .= '<button type="submit" class="btn btn-success btn-block" name="selected">Enviar Seleccion</button><br />';
}
?>
<!DOCTYPE html>
<head>
    <title>Tauletes | PHP &amp; Bootstrap </title>
    <!-- Latest compiled and minified CSS -->
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <div class="container">
       <header>
            <div class="page-header">
                <h1>EJERCICIO <code>pg_fetch_array($result)</code> &copy; Joel García</h1>
            </div>
        </header>
        <?php
        if (!isset($_POST['selected'])) {
            if (isset($_COOKIE['Error'])) {
                echo $_COOKIE['Error'];
                setcookie("Error","",time()-3600);
            }
            ?>
            <!-- MODAL FILTRADO -->
            <div class="modal fade modalPrecio" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Filtre Únic</h4>
                    </div>
                    <div class="modal-body text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                        Seleccioni un preu<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="?precio=200">Fins a 200€</a></li>
                                        <li><a href="?precio=400">Fins a 400€</a></li>
                                        <li><a href="?precio=800">Fins a 800€</a></li>
                                        <li><a href="?precio=801">Més de 800€</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                        Seleccioni una marca<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="?marca=Xiaomi">Xiaomi</a></li>
                                        <li><a href="?marca=Windows">Windows</a></li>
                                        <li><a href="?marca=HP">HP</a></li>
                                        <li><a href="?marca=Apple">Apple</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <br />
                                <div class="modal-header">
                                    <h4 class="modal-title">Multifiltre</h4>
                                </div>
                                <h4>Seleccioni sistemes operatius:</h4>
                                <?php 
                                    # sortnar asc y desc , cuando seleccione el filtro deseado...
                                    # $_GET[] comprobar si existe precio, marca, ssoo... 

                                    if (isset($_POST['ssooFilter'])) { 
                                        if (!empty($_POST['SSOO'])) {
                                            setcookie("ssooFilterCookie",serialize($_POST['SSOO']),time()+3600);
                                            header("location:tauletes.php");
                                        } else {
                                            setcookie("ssooFilterCookie","",time()-3600);
                                            header("location:tauletes.php");
                                        }
                                    }
                                    
                                ?>
                                <form method="POST">
                                    <?php
                                       
                                            $conexion->connect();
                                            $resultLoadFilter = $conexion->getAllSSOO();
                                            $loadCheck = "";
                                            while ($row = pg_fetch_array($resultLoadFilter)) {
                                                $control = false;         
                                                if (isset($_COOKIE['ssooFilterCookie'])) {                                   
                                                    if ( in_array($row['ssoo'],unserialize($_COOKIE['ssooFilterCookie'])) ) {$control = true;}
                                                } 
                                                $ok = ($control) ? 'checked' : '';
                                                $loadCheck .= "<div class='checkbox-inline'><label><input type='checkbox' name='SSOO[]' value='".$row['ssoo']."' ".$ok."> ".$row['ssoo']."<label></div>";
                                            }   
                                            $conexion->closeConnection();                                  
                                    ?>
                                    <?=$loadCheck?>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success form-control" name="ssooFilter">Seleccionar</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger form-control" name="eliminarFiltrado">Eliminar Filtros</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="row">
                <div class="col-md-12">
                            <div class="pull-left">
                                <h2 class="titulo-subrayado"><strong>Tauletes </strong><small>Resultados <span class="badge"><?=$numResult?></span></small></h2>
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-success glyphicon glyphicon-shopping-cart"></a>
                                </div>
                                <div class="btn-group">
                                    <?php
                                        if (isset($_GET['precio'])||isset($_GET['marca'])) {
                                            $currentURL = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
                                            if (!isset($_GET['sort'])) {
                                                $currentURLASC = $currentURL.'&sort=asc';
                                                $currentURLDESC = $currentURL.'&sort=desc';
                                            } else {
                                                $currentURL = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
                                                $currentURLASC = preg_replace('/\bsort=desc\b/u', 'sort=asc', $currentURL);
                                                $currentURLDESC = preg_replace('/\bsort=asc\b/u', 'sort=desc', $currentURL);
                                            }
                                        }                                       
                                     ?>
                                    <a href="<?=$currentURLASC?>" class="btn btn-success glyphicon glyphicon-chevron-up"></a>
                                    <a href="<?=$currentURLDESC?>" class="btn btn-success glyphicon glyphicon-chevron-down"></a>
                                </div>
                                <button type="button" class="btn btn-success glyphicon glyphicon-filter" data-toggle="modal" data-target=".modalPrecio"></button>
                            </div>
                            <div class="clearfix"></div>
    
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method='POST'>
                        <?php echo $form; ?>
                    </form>
                </div>
            </div>
            <?php
        } else {
            $select = 0;
            $count = 0; //
            $serialize = array();
            if (isset($_POST['productChecked'])) {
                $checked = $_POST['productChecked'];
                if (isset($checked)) {
                    $select = count($checked);
                }
            }

            #En el caso de tener guardadas selecciones anteriores y retirarlas e enviar el formulario sin checks
            #Muestra el error de no tener ninguna seleccionada pero devuelve las cookies existentes
            #Lo que hacemos aquí es quitar la cookie que guarda la seleccion  #Vacio sin ningun check..            
            if ($select === 0) {
                setcookie("TABLETS","",time()-3600);
            }

            $conexion->connect();
            $result = $conexion->getAllTauleta();
            $numResult = pg_num_rows($result);
            //echo $conexion->statusConnection();
            $conexion->closeConnection();
            $selected = '';
            $totalConIva = 0;
            $totalSinIva = 0;
            $totalCon = 0;
            $totalSin = 0;
            if ($select>0) {
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                    for ($i = 0; $i < $select; $i++) {
                        if (strcmp($row['marca'],$checked[$i])==0) {
                            $serialize[$count] = $row['marca'];
                            $totalSinIva = $row["preu"];
                            $totalConIva = number_format(((float)$totalSinIva)*1.21,2);
                            $totalCon += $totalConIva;
                            $totalSin += $totalSinIva;
                            $selected .= '
                                <tr class="text-center">
                                    <td class="space success">
                                        <div class="thumbnail">
                                            <img src="img/'.$row["imatge"].'" alt="'.$row["model"].'" title="'.$row["model"].'" width="50" height="50"/>
                                        </div>
                                    </td>
                                    <td class="space  success">'.$row['marca'].'</td>
                                    <td class="space successs">'.$row['model'].'</td>
                                    <td class="space success">'.$row['color'].'</td>
                                    <td class="space successs">'.$row['ssoo'].'</td>
                                    <td class="space success">'.$totalConIva.'&euro;</td>
                                    <td class="space successs">'.$totalSinIva.'&euro;</td>
                                </tr>
                           ';
                        }
                        $count++;//
                    }
                }
                setcookie("TABLETS",serialize($serialize),time()+3600);
            } else {
                setcookie("Error","<div class='alert alert-info'><strong>Eps ! </strong>No has seleccionat cap.</div>",time()+3600);
                header('location: tauletes.php');     
            }
            ?>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="titulo-subrayado"><strong>Tauletes </strong><small>Seleccionades <span class="badge"><?=$select?></span></small></h2>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center">Producte</th>
                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Model</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">SO</th>
                                    <th class="text-center">Preu</th>
                                    <th class="text-center">Preu sense iva</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?=$selected?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4">&nbsp;</th>
                                    <th class="text-center">Total</th>
                                    <td class="success text-center"><?=$totalCon?>&euro;</td>
                                    <td class="successs text-center"><?=$totalSin?>&euro;</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <footer></footer>
        </div>
    </body>
    </html> 
    <?php
}
?>
