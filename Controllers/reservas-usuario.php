<?php
    session_start();
    require_once '../Models/Tarifa.php';
    require_once '../Models/Reserva.php';
    require_once '../Models/Usuario.php';
    require_once '../Models/Sesion.php';
    require_once '../Models/Pelicula.php';
    $usuario = Usuario::getUsuarioEmail($_SESSION['usuario']);
    $reservas = Reserva::getReservasUsuario($usuario->getDNI());
    include '../Views/content/reservas-usuario.php';
?>