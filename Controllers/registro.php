<?php
    session_start();
    require_once '../Models/Usuario.php';
    if ($_POST) {
        //Comprueba que no existe el mismo email o DNI
        $validaEmail = Usuario::comprobarEmail($_POST['email']);
        $validaDNI = Usuario::comprobarDNI($_POST['dni']);
        if($validaDNI) {
            $errorDNI = "Este DNI no es v&aacute;lido.";
        }
        if($validaEmail) {
            $errorEmail = "El email ya existe. Prueba con otro.";
        } else {
            $usuario = new Usuario($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['password']);
            $usuario->insert();
            //Se guarda el nombre del usuario para el menú del usuario y el email para acciones del usuario.
            $_SESSION['nombreUsuario'] = $usuario->getName();
            $_SESSION['usuario'] = $_POST['email'];
            header("location: ./index.php");
        }
    }
    include '../Views/content/registro.php';
?>