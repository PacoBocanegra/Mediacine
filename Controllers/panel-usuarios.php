<?php
    session_start();
    require_once '../Models/Usuario.php';
    if (isset($_POST['añadir'])) {
        $_SESSION['accion'] = "añadir";
        header("location: ./formulario-usuarios.php");
    }
    if (isset($_POST['modificar'])) {
        $_SESSION['accion'] = "modificar";
        $_SESSION['idUsuario'] = $_POST['modificar'];
        header("location: ./formulario-usuarios.php");
    }
    if (isset($_POST['eliminar'])) {  
        $usuario = Usuario::getUsuario($_POST['eliminar']);
        $usuario->delete();
        header("location: ./panel-usuarios.php");
    }
    $data['usuarios'] = Usuario::getUsuarios();
    include '../Views/content/panel-usuarios.php';
?>