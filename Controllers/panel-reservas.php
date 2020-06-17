<?php
    session_start();
    require_once '../Models/Reserva.php';
    require_once '../Models/Sesion.php';
    require_once '../Models/Pelicula.php';
    require_once '../Models/Sala.php';
    require_once '../Models/Usuario.php';
    if (isset($_POST['añadir'])) {
        $_SESSION['accion'] = "añadir";
        header("location: ./formulario-reservas.php");
    }
    if (isset($_POST['modificar'])) {
        $_SESSION['accion'] = "modificar";
        $_SESSION['idUsuario'] = $_POST['modificar'];
        $_SESSION['idSesion'] = $_POST['sesion'];
        header("location: ./formulario-reservas.php");
    }
    if (isset($_POST['eliminar'])) {  
        $reserva = Reserva::getReserva($_POST['eliminar'], $_POST['sesion']);
        $reserva->delete();
        header("location: ./panel-reservas.php");
    }
    $reservas = Reserva::getReservas();
    include '../Views/content/panel-reservas.php';
?>