<?php
    session_start();
    require_once '../Models/Usuario.php';
    require_once '../Models/Reserva.php';
    require_once '../Models/Sesion.php';
    require_once '../Models/Pelicula.php';
    $usuario = Usuario::getUsuarioEmail($_SESSION['usuario']);
    $reservasUsuario = Reserva::getReservasUsuario($usuario->getDNI());
    $totalReservas = sizeof($reservasUsuario);
    // Instancia para las reservas finalizadas y un array con las fechas de las próximas fechas reservadas
    $reservasCompletadas = 0;
    $fechasPendientes = [];
    foreach ($reservasUsuario as $reserva) {
        $sesion = Sesion::getSesion($reserva->getSesion());
        $pelicula = Pelicula::getPelicula($sesion->getMovie());
        //Se muestran en el perfil solo las fechas superiores al día de hoy
        $fechaReserva = str_replace("/", "-", $sesion->getDate());
        $fechaMod = new DateTime(date($fechaReserva));
        $fechaHoy = new DateTime(date("d-m-yy"));
        if ($fechaHoy < $fechaMod) {
            $fechasPendientes[] = $sesion->getDate() . " - " . $sesion->getHour() . " - " . $pelicula->getTitle();
        } else {
            $reservasCompletadas++;
        }
    }
    include '../Views/content/perfil-usuario.php';
?>