<?php
    session_start();
    require_once '../Models/Pelicula.php';
    if($_SESSION['accion'] == "añadir") {
        if(isset($_POST['guardar'])) {
            if (Pelicula::comprobarTitle($_POST['titulo'])) {
                $errorTitle = "Esta película ya existe. Utiliza otro título.";
                if(isset($_POST['genero'])) {
                    $generos = $_POST['genero'];
                }
            } else {
                //Guarda el nombre de la imagen y mueve la imagen al directorio que images de la View
                $nombre_archivo = $_FILES['imagen']['name'];
                $directorio_definitivo = "../Views/images/";
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio_definitivo.$nombre_archivo);
                $pelicula = Pelicula::getDatosFormularioPelicula($_POST['titulo'], $_POST['genero'], $_POST['duracion'], $_POST['fechaEstreno'], $_POST['año'], $_POST['pais'], $_POST['sinopsis'], $_FILES['imagen']['name'], $_POST['valoracion']);
                $pelicula->insert();
                header("location: ./panel-peliculas.php");
            }
            
        }
    }
    if($_SESSION['accion'] == "modificar") {
        $pelicula = Pelicula::getPelicula($_SESSION['idPelicula']);
        $generos = explode("/", $pelicula->getGenre());
        if(isset($_POST['guardar'])) {
            if ($_POST['titulo'] != $pelicula->getTitle()) {
                if (Pelicula::comprobarTitle($_POST['titulo'])) {
                    $errorTitle = "Esta película ya existe. Utiliza otro título.";
                    $generos = $_POST['genero'];
                } 
            } else {
                if($_FILES['imagen']['name']) {
                    $imagen = $_FILES['imagen']['name'];
                    $directorio_definitivo = "../Views/images/";
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio_definitivo.$imagen);
                } else {
                    $imagenUrl = explode("/", $pelicula->getImage());
                    $imagen = end($imagenUrl);
                }
                $pelicula = Pelicula::getDatosFormularioPelicula($_POST['titulo'], $_POST['genero'], $_POST['duracion'], $_POST['fechaEstreno'], $_POST['año'], $_POST['pais'], $_POST['sinopsis'], $imagen, $_POST['valoracion']);
                $pelicula->update($_SESSION['idPelicula']);
                header("location: ./panel-peliculas.php");
            }
        }
    }
    include '../Views/content/formulario-peliculas.php';

