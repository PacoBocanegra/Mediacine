<?php
    session_start();
    require_once '../Models/Usuario.php';
    if($_SESSION['accion'] == "añadir") {
        if(isset($_POST['guardar'])) {
            if (Usuario::comprobarDNI($_POST['dni'])) {
                $errorDNI = "Este DNI ya existe. Utiliza otro.";
            } 
            if (Usuario::comprobarEmail($_POST['email'])) {
                $errorEmail = "Este Email ya existe. Utiliza otro.";
            } else {
                //En la BD admin puede se null. Comprueba si es admin para settear el valor admin. El constructor de Usuario no tiene admin.
                if($_POST['admin'] == "si") {
                    $usuario = Usuario::getDatosFormularioUsuario($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password'], $_POST['admin']);
                } else {
                    $usuario = Usuario::getDatosFormularioUsuario($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password']);
                }
                $usuario->insert();
                header("location: ./panel-usuarios.php");
            }
        }
    }
    if($_SESSION['accion'] == "modificar") {
        $usuario = Usuario::getUsuario($_SESSION['idUsuario']);
        $admin = Usuario::getAdminAuth($usuario->getEmail(), $usuario->getPwd());
        if(isset($_POST['guardar'])) {
            if (Usuario::comprobarDNI($_POST['dni']) != $usuario->getDNI()) {
                $errorDNI = "Este DNI ya existe. Utiliza otro.";
            } 
            if (Usuario::comprobarEmail($_POST['email']) != $usuario->getEmail()) {
                $errorEmail = "Este Email ya existe. Utiliza otro.";
            } else {
                if($_POST['admin'] == "si") {
                    $usuario = Usuario::getDatosFormularioUsuario($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password'], $_POST['admin']);
                } else {
                    $usuario = Usuario::getDatosFormularioUsuario($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password']);
                }
                $usuario->update($_SESSION['idUsuario']);
                header("location: ./panel-usuarios.php");
            }
        }
    }
    include '../Views/content/formulario-usuarios.php';
?>