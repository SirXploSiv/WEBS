<?php 
    if (isset($_COOKIE['Error'])&&strcmp($_COOKIE['Error'],"invalidSession")||!isset($_COOKIE['Error'])) {
        setcookie("Error","invalidUsePwd",time()+3600);
    }

    if (!isset($_SESSION['Username'])&&!isset($_SESSION['Password'])) {
            header("location: validacio.php");
    }

    session_start();

    if (isset($_POST['validar'])) {
        $user = $_POST['Username'];
        $pwd = $_POST['Password'];        
        if (strlen($pwd)>=4&&strlen($pwd)<=20&&strlen($user)>0&&!empty($user)) {
            $_SESSION['Username'] = $user;
            $_SESSION['Password'] = $pwd;
            $_SESSION['ColorsToLoad'] = serialize(array(
                "Purple"=>"#8000FF",
                "Yellow"=>"#FFFF00",
                "Orange"=>"#FE9A2E",
                "Blue"=>"#2E64FE",
                "Green"=>"#04B404",
                "Black"=>"#2C2C2C",
                "White"=>"#FFF"
            ));
            header("location: colors.php");
        } else {
            header("location: validacio.php");
        }
    }    
?>