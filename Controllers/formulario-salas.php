<?php
    session_start();
    require_once '../Models/Sala.php';
    if($_SESSION['accion'] == "añadir") {
        if(isset($_POST['guardar'])) {
            if (Sala::comprobarID($_POST['codigo'])) {
                $errorID = "Esta sala ya existe. Utiliza otro.";
            } else {
                $sala = new Sala($_POST['codigo'], $_POST['butacas'], $_POST['tipo']);
                $sala->insert();
                header("location: ./panel-salas.php");
            }
            
        }
    }
    if($_SESSION['accion'] == "modificar") {
        $sala = Sala::getSala($_SESSION['idSala']);
        if(isset($_POST['guardar'])) {
            if (Sala::comprobarID($_POST['codigo']) != $sala->getId()) {
                $errorID = "Esta sala ya existe. Utiliza otro.";
            } else {
                $sala = new Sala($_POST['codigo'], $_POST['butacas'], $_POST['tipo']);
                $sala->update($_SESSION['idSala']);
                header("location: ./panel-salas.php");
            }
        }
    }
    include '../Views/content/formulario-salas.php';

