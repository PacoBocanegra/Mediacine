<?php 
    session_start();
    //Respuesta de la petición ajax que devuelve la sala y la tarifa según la sesión que haya seleccionado el usuario
    require_once '../../Models/Sesion.php';
    require_once '../../Models/Tarifa.php';
    $sesion = Sesion::getSesionPelicula($_SESSION['idPelicula'], $_SESSION['fechaSesion'], $_POST['hora']);
    $tarifa = Tarifa::getTarifa($sesion->getRate());
    $infoSesion = [];
    $infoSesion[] = $sesion->getRoom();
    $infoSesion[] = $sesion->getSeat();
    $infoSesion[] = $tarifa->getType();
    $infoSesion[] = $tarifa->getPrice();
    echo json_encode($infoSesion);
?>