<?php
    session_start();
    require_once '../Models/Usuario.php';
    if(isset($_POST['acceder'])){
        $valido = Usuario::validarAuth($_POST['email'], $_POST['contraseña']);
		if($valido) {
            $_SESSION['usuario'] = $valido;
            // Se valida si es admin para acciones privilegiadas
            $admin = Usuario::getAdminAuth($_POST['email'], $_POST['contraseña']);
            $usuario = Usuario::getUsuarioEmail($_SESSION['usuario']);
            $_SESSION['nombreUsuario'] = $usuario->getName();
            if ($admin) {
                $_SESSION['admin'] = $admin;
            }
			header("location: ./index.php");
		} else {
			$error = "El email o password son incorrectos";
		}
    }
    if(isset($_POST['registro'])){
        header("location: ./registro.php");
    }
    if(isset($_POST['restablecer-contra'])){
        header("location: ./restablecer-contraseña.php");
    }
    include '../Views/content/login.php';
?>