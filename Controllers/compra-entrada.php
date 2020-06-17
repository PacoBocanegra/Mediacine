<?php
    session_start();
    require_once '../Models/Pelicula.php';
    require_once '../Models/Sesion.php';
    require_once '../Models/Tarifa.php';
    require_once '../Models/Sala.php';
    require_once '../Models/Usuario.php';
    require_once '../Models/Reserva.php';
    if(isset($_POST['comprar'])) {
        //Coge la sesión que se está reservando y se le resta las butacas disponibles según las entradas que compre el usuario
        $sesion = Sesion::getSesionPelicula($_SESSION['idPelicula'], $_POST['fecha'], $_POST['hora']);
        $butacasDisp = $sesion->getSeat() - $_POST['entradas'];
        $sesion->addSeat($butacasDisp);
        $cliente = Usuario::getUsuarioEmail($_SESSION['usuario']);
        $reserva = new Reserva($cliente->getDNI(), $sesion->getId(), $_POST['entradas']);
        $sesion->update($sesion->getId());
        $reserva->insert();
        header("location: ./perfil-usuario.php");
    }
    $pelicula = Pelicula::getPelicula($_SESSION['idPelicula']);
    $fechas = Sesion::getSesionesFechaPelicula($_SESSION['idPelicula']);
    include '../Views/content/compra-entrada.php';
?>