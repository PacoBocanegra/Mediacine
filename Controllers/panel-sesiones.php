<?php
    session_start();
    require_once '../Models/Sesion.php';
    require_once '../Models/Pelicula.php';
    if (isset($_POST['añadir'])) {
        $_SESSION['accion'] = "añadir";
        header("location: ./formulario-sesiones.php");
    }
    if (isset($_POST['modificar'])) {
        $_SESSION['accion'] = "modificar";
        $_SESSION['idSesion'] = $_POST['modificar'];
        header("location: ./formulario-sesiones.php");
    }
    if (isset($_POST['eliminar'])) {  
        $sesion = Sesion::getSesion($_POST['eliminar']);
        $sesion->delete();
        header("location: ./panel-sesiones.php");
    }
    if(isset($_POST['filtro'])) {
        //Conversión del tipo de datos del input date del buscador de sesiones por fecha
        $fechaFiltro = new DateTime($_POST['fechaFiltro']);
        $fecha = $fechaFiltro->format('d/m/Y');
        $data['sesiones'] = Sesion::getSesionesFecha($fecha);
        if(empty($data['sesiones'])) {
            $noSesiones = "No hay ninguna sesión disponible para esta fecha";
        }
    } else {
        $data['sesiones'] = Sesion::getSesiones();
    }
    
    include '../Views/content/panel-sesiones.php';
?>