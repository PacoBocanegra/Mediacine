<?php
    session_start();
    require_once '../Models/Valoracion.php';
    require_once '../Models/Pelicula.php';
    $valoraciones = Valoracion::getValoraciones();
    include '../Views/content/panel-valoraciones.php';
?>