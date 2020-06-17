<?php 
    session_start();
    //Respuesta de petición ajax que devuelve las fechas de las sesiones de una película
    require_once '../../Models/Sesion.php';
    $_SESSION['idPelicula'] = $_POST['pelicula'];
    $fechas = Sesion::getSesionesFechaPelicula($_POST['pelicula']);
    echo json_encode($fechas);
?>