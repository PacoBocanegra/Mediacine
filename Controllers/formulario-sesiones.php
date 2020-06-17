<?php
    session_start();
    require_once '../Models/Sesion.php';
    require_once '../Models/Tarifa.php';
    require_once '../Models/Sala.php';
    require_once '../Models/Pelicula.php';

    $peliculas = Pelicula::getPeliculas();
    $salas = Sala::getSalas();
    $tarifas = Tarifa::getTarifas();
    if($_SESSION['accion'] == "añadir") {
        if(isset($_POST['guardar'])) {
            if (Sesion::comprobarSalaSesion($_POST['sala'], $_POST['fecha'], $_POST['hora'])) {
                $errorSala = "Sala ocupada para esta fecha y hora";
            } else {
                $sesion = Sesion::getDatosFormularioSesion($_POST['fecha'], $_POST['hora'], $_POST['butacas'], $_POST['sala'], $_POST['tarifa'], $_POST['pelicula']);
                $sesion->insert();
                header("location: ./panel-sesiones.php");
            }
        }
    }
    if($_SESSION['accion'] == "modificar") {
        $sesion = Sesion::getSesion($_SESSION['idSesion']);
        if(isset($_POST['guardar'])) {
            //Comprueba que no haya ninguna sala repetida. Primero comprueba si los valores son distintos a los introducidos
            if($sesion->getRoom() != $_POST['sala'] || $sesion->getDate() != $_POST['fecha'] || $sesion->getHour() != $_POST['hora'] ) {
                if (Sesion::comprobarSalaSesion($_POST['sala'], $_POST['fecha'], $_POST['hora'])) {
                    $errorSala = "Sala ocupada para esta fecha y hora";
                } else {
                    //Si lo valores introducidos no son los mismos que antes y no corresponde a otra sala se graba
                    $sesion = Sesion::getDatosFormularioSesion($_POST['fecha'], $_POST['hora'], $_POST['butacas'], $_POST['sala'], $_POST['tarifa'], $_POST['pelicula']);
                    $sesion->update($_SESSION['idSesion']);
                    header("location: ./panel-sesiones.php");
                }
            } else {
                //Si los valores introducidos de sala, fecha y hora son los mismos, se guarda.
                $sesion = Sesion::getDatosFormularioSesion($_POST['fecha'], $_POST['hora'], $_POST['butacas'], $_POST['sala'], $_POST['tarifa'], $_POST['pelicula']);
                $sesion->update($_SESSION['idSesion']);
                header("location: ./panel-sesiones.php");
            }
        }
    }
    include '../Views/content/formulario-sesiones.php';
?>