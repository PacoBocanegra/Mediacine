<?php
    session_start();
    require_once '../Models/Tarifa.php';
    if (isset($_POST['añadir'])) {
        $_SESSION['accion'] = "añadir";
        header("location: ./formulario-tarifas.php");
    }
    if (isset($_POST['modificar'])) {
        $_SESSION['accion'] = "modificar";
        $_SESSION['idTarifa'] = $_POST['modificar'];
        header("location: ./formulario-tarifas.php");
    }
    if (isset($_POST['eliminar'])) {  
        $tarifa = Tarifa::getTarifa($_POST['eliminar']);
        $tarifa->delete();
        header("location: ./panel-tarifas.php");
    }
    $data['tarifas'] = Tarifa::getTarifas();
    include '../Views/content/panel-tarifas.php';
?>