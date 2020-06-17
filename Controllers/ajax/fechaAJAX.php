<?php 
    session_start();
    //Respuesta de la petición ajax que devuelve las horas de una fecha concreta de la película
    require_once '../../Models/Sesion.php';
    $_SESSION['fechaSesion'] = $_POST['fecha'];
    $_SESSION['horasSesion'] = Sesion::getHorasSesiones($_SESSION['idPelicula'], $_SESSION['fechaSesion']);
    echo json_encode($_SESSION['horasSesion']);
?>