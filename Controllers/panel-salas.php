<?php
    session_start();
    require_once '../Models/Sala.php';
    if (isset($_POST['añadir'])) {
        $_SESSION['accion'] = "añadir";
        header("location: ./formulario-salas.php");
    }
    if (isset($_POST['modificar'])) {
        $_SESSION['accion'] = "modificar";
        $_SESSION['idSala'] = $_POST['modificar'];
        header("location: ./formulario-salas.php");
    }
    if (isset($_POST['eliminar'])) {  
        $sala = Sala::getSala($_POST['eliminar']);
        $sala->delete();
        header("location: ./panel-salas.php");
    }
    $salas = Sala::getSalas();
    include '../Views/content/panel-salas.php';
?>