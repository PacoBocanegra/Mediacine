<?php
    session_start();
    require_once '../Models/Usuario.php';
    if(isset($_POST['restablecer'])){
        // Valida si existe el usuario con el email y contraseña para cambiar la password
        $valido = Usuario::validarAuth($_POST['email'], $_POST['contraseña-anterior']);
		if($valido) {
            $usuario = Usuario::getUsuarioEmail($_POST['email']);
            $usuario->addPwd($_POST['contraseña1']);
            $usuario->update($usuario->getDNI());
			header("location: ./login.php");
		} else {
			$error = "El email o password son incorrectos";
		}
    }
    include '../Views/content/restablecer-contraseña.php';
?>