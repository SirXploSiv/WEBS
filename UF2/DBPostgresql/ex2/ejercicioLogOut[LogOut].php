<?php
    session_start();   
    # SI EXISTE CUALQUIER SESSION LA DESTRUIREMOS
    if (isset($_SESSION)) {
        $_SESSION = array();
        session_destroy();
        define("FECHA",date("Y-m-d H:i:s"));
        setcookie("lastconnection",FECHA,time()+3600);
        header("location: ejercicioLogOut[LogIn].php");
    # SINO SERÁ INTERPRETADO COMO QUE HA INTENTADO ACCEDER A UNA PAGINA SIN SESSION Y SERÁ DEVUELTO A INICIO.
     } else {
         header("location: ejercicioLogOut[LogIn].php");
     }
?>
