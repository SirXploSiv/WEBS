    <?php

    session_start();

    if (isset($_COOKIE['Error'])&&strcmp($_COOKIE['Error'],"invalidUsePwd")
    	||isset($_COOKIE['Error'])&&strcmp($_COOKIE['Error'],"invalidSession")
    	||!isset($_COOKIE['Error'])) {
    	setcookie("Error","invalidSession",time()+3600);
	}
	
	extract($_SESSION);
	$colorsToLoad = unserialize($ColorsToLoad);
	$colorsToLoad = array_flip($colorsToLoad);

	if (!(strlen($Username)>0&&strlen($Password)>0)) {
		header("location: validacio.php");
	}

	$color;

	if (isset($_POST['colorSelected'])) {
		$color = $_POST['colors'];
	}

?>
<!DOCTYPE html>
    <head><title>COLORES</title>
        <!-- Latest compiled and minified CSS -->
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body style="background-color: <?=$color?> !important;">
        <div class="container">
            <header>
                <div class="page-header">
                    <div class="well text-center">
                        <strong><i>Showing your color selected as background</i></strong>
                    </div>
                </div>
            </header>
            <div class="row">
                <div class="col-md-12 text-center">
                	<div class="jumbotron">
                		<div class="form-group">
                			<h2>Hi <?=$Username?> !</h2>
                			<span>You selected the color... <?=$colorsToLoad[$color]?></span>
                			<div class="center-block" style="background-color: <?=$color?>; height: 45px; width: 45px; margin-top: 15px;"></div>
                			<?=$color?>
                		</div>
                	</div>
                </div>
                <div class="col-md-6">
                	<div class="text-left">
						<a href="colors.php" class="btn btn-primary btn-lg active" role="button"><strong>Go select other color</strong></a>
                	</div>
                </div>
                <div class="col-md-6">
                	<div class="text-right">
                		<a href="validacio.php?LogOut" class="btn btn-primary btn-lg active" role="button"><strong>Log Out</strong></a>
                	</div>
                </div>
            </div>
        </div>
    </body>
</html>
