<?php 
    session_start(); //Iniciar una nueva sesión o reanudar la existente
    session_destroy(); //Destruye la sesión
    //Se destruye el valor de las sesiones principales
    unset($_SESSION["usuario"]);
    unset($_SESSION["admin"]);
    header('location: index.php'); //Redirecciona la inicio
?>