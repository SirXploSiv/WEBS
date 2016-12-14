<?php

    session_start();

    if (isset($_COOKIE['Error'])&&strcmp($_COOKIE['Error'],"invalidUsePwd")
        ||isset($_COOKIE['Error'])&&strcmp($_COOKIE['Error'],"invalidSession")
        ||!isset($_COOKIE['Error'])) {
        setcookie("Error","invalidSession",time()+3600);
    }

    extract($_SESSION);
    $colorsToLoad = unserialize($ColorsToLoad);

    if (!strlen($Username)>0&&!strlen($Password)>0) {
          header("location: validacio.php");
    }

?>
<!DOCTYPE html>
    <head><title>COLORES</title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <header>
                <div class="page-header">
                    <div class="well text-center">
                        <strong><i>Select a color from combo box to set as background of your main page</i></strong>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 text-left">
                <form action="colors2.php" method="POST">
                        <div class="form-group">
                            <select name="colors" class="form-control">
                               <?php
                                    foreach ($colorsToLoad as $key=>$colorCode) {
                                        echo '<option value="'.$colorCode.'">'.$key.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary form-control" name="colorSelected"><strong>I WILL SELECT THIS COLOR</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
