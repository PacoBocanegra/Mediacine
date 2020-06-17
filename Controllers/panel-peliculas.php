<?php
    session_start();
    require_once '../Models/Pelicula.php';
    if (isset($_POST['añadir'])) {
        $_SESSION['accion'] = "añadir";
        header("location: ./formulario-peliculas.php");
    }
    if (isset($_POST['modificar'])) {
        $_SESSION['accion'] = "modificar";
        $_SESSION['idPelicula'] = $_POST['modificar'];
        header("location: ./formulario-peliculas.php");
    }
    if (isset($_POST['eliminar'])) {  
        $pelicula = Pelicula::getPelicula($_POST['eliminar']);
        $pelicula->delete();
        header("location: ./panel-peliculas.php");
    }
    $data['peliculas'] = Pelicula::getPeliculas();
    include '../Views/content/panel-peliculas.php';
?>