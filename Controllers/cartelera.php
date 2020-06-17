<?php
    session_start();
    require_once '../Models/Pelicula.php';
    require_once '../Models/Valoracion.php';
    require_once '../Models/Usuario.php';
    if(isset($_SESSION['usuario'])) {
        $usuario = Usuario::getUsuarioEmail($_SESSION['usuario']);
    }
    if(isset($_POST['comprar'])) {
        //Se le manda la id de la película
        $_SESSION['idPelicula'] = $_POST['comprar'];
        header("location: ./compra-entrada.php");
    }
    $data['peliculas'] = Pelicula::getPeliculas();
    include '../Views/content/cartelera.php';
?>