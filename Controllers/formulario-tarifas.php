<?php
    session_start();
    require_once '../Models/Tarifa.php';
    if($_SESSION['accion'] == "añadir") {
        if(isset($_POST['guardar'])) {
            $tarifa = Tarifa::getDatosFormularioTarifa($_POST['descripcion'], $_POST['precio']);
            $tarifa->insert();
            header("location: ./panel-tarifas.php");
        }
    }
    if($_SESSION['accion'] == "modificar") {
        $tarifa = Tarifa::getTarifa($_SESSION['idTarifa']);
        if(isset($_POST['guardar'])) {
            $tarifa = Tarifa::getDatosFormularioTarifa($_POST['descripcion'], $_POST['precio']);
            $tarifa->update($_SESSION['idTarifa']);
            header("location: ./panel-tarifas.php");
        }
    }
    include '../Views/content/formulario-tarifas.php';
?>