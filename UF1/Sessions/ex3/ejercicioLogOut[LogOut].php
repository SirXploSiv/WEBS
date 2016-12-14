<?php
    session_start();

    if (isset($_SESSION)) {
    if (isset($_COOKIE['Okay'])) {
        setcookie("Okay","",time()-3600);
     }
         $_SESSION = array();
         session_destroy();
         define("FECHA",date("Y-m-d H:i:s"));
         setcookie("lastconnection",FECHA,time()+3600);
        header("location: ejercicioLogOut[LogIn].php");
     } else {
         header("location: ejercicioLogOut[LogIn].php");
     }
?>
