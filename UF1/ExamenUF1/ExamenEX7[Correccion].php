<?php
    $products = array("TABLETS"=>array("Android","Una tablet de android",250),"LAPTOP"=>array("Window","Un portatil de windows",550),"CAMARA"=>array("Nikon","Camara HD",652));
 ?>
 <!DOCTYPE html>
    <head>
        <title>Corrección Tauletes [PHP] </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="page-header">
                    <h1>ExamenEX7 [CORRECCION]</h1>
                </div>
            </header>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 ">
                    <?php
                        if(isset($_COOKIE["Error"])){
                            echo "<div class='alert alert-danger'>".$_COOKIE['Error']."</div>";
                            setcookie("Error","",time()-100);                            
                        }
                        if (isset($_POST['formProducts'])){
                                    if (!isset($_POST['product'])) {
                                        setcookie("Error","Should be check some product before",time()+100);
                                        setcookie("ProductsCookie","",time()-3600);
                                        header("location:ExamenEX7[Correccion].php");
                                    } else {
                                        $checkedProducts = $_POST['product']; 
                                        setcookie("ProductsCookie",serialize($checkedProducts),time()+3600);
                                        setcookie("F5Form","Done",time()+3600);
                                        $totalPrice = 0;
                                        $totalPriceIva = 0;
                                        $tableProducts = "<table class='table table-condensed '><thead><tr><th>Preview IMG</th><th>Product</th><th>Description</th><th>Price &euro;</th><th>Price IVA</th></tr></thead><tbody>";
                                        foreach ($checkedProducts as $valor) {
                                            $totalPriceIva += ($products[$valor][2])*1.21;
                                            $tableProducts .= "<tr><td><img src='img/".$products[$valor][0].".png' alt='".$products[$valor][1]."' width='75' height='75' class='thumbnail' /></td><td>".$products[$valor][0]."</td><td>".$products[$valor][1]."</td><td>".$products[$valor][2]." &euro;</td><td>".(($products[$valor][2])*1.21)." &euro;</td></tr>";
                                            $totalPrice += $products[$valor][2];
                                        }
                                        echo $tableProducts."</tbody><tfoot><tr><td></td><td></td><td>Total</td><td>".$totalPrice." &euro;</td><td>".$totalPriceIva." &euro;</td></tr></tfoot></table>";
                                    }                            
                        } else {
                     ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <?php 
                                    if (isset($_COOKIE["ProductsCookie"])&&!empty($_COOKIE["ProductsCookie"])) { 
                                            $formContent = "";
                                            foreach ($products as $key=>$value) {
                                                $control = (in_array($key,unserialize($_COOKIE["ProductsCookie"]))) ? 'checked' : '';
                                                $formContent .= "<img src='img/".$value[0].".png' alt='".$value[1]."' width='75' height='75' class='thumbnail' />";
                                                $formContent .= "<div class='form-group'><p class='form-control'>Description: ".$value[1]."</p></div>";
                                                $formContent .= "<div class='form-group'><p class='form-control'>Price: ".$value[2]."&euro;</p></div>";
                                                $formContent .= "<label for='".$key."' class='form-control'>S.O: ".$value[0]."</label>";
                                                $formContent .= "<input class='form-control' type='checkbox' name='product[]'value='".$key."' ".$control."/>";                                  
                                            }
                                            echo $formContent;
                                    } else {                   
                                        $formContent = "";
                                        foreach ($products as $key=>$value) {
                                             $formContent .= "<img src='img/".$value[0].".png' alt='".$value[1]."' width='75' height='75' class='thumbnail' />";
                                             $formContent .= "<div class='form-group'><p class='form-control'>Description: ".$value[1]."</p></div>";
                                             $formContent .= "<div class='form-group'><p class='form-control'>Price: ".$value[2]."&euro;</p></div>";
                                             $formContent .= "<label for='".$key."' class='form-control'>S.O: ".$value[0]."</label>";
                                             $formContent .= "<input class='form-control' type='checkbox' name='product[]'value='".$key."'/>";                                     
                                        }
                                        echo $formContent;
                                    }
                                ?>
                                
                            <button type="submit" class="btn btn-success" name="formProducts">Send</button>
                        </form>                       
                     <?php 
                        }
                     ?>
                </div>
            </div>
        </div>        
    </body>
 </html>