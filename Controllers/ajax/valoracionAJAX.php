<?php
    session_start();
    //Calculos de la petición ajax para gestionar que el usuario valore una película y calcule la media y la suba a la BD
    require_once '../../Models/Pelicula.php';
    require_once '../../Models/Valoracion.php';
    require_once '../../Models/Usuario.php';
    $pelicula = Pelicula::getPelicula($_POST['pelicula']);
    $usuario = Usuario::getUsuarioEmail($_SESSION['usuario']);
    $media = ($pelicula->getValuation() + intval($_POST['estrellas'])) / 2;
    $valoracion = new Valoracion($usuario->getDNI(), $pelicula->getId(), $_POST['estrellas']);
    $pelicula->addValuation($media);
    $pelicula->update($pelicula->getId());
    $valoracion->insert();
    $arrayDatos = [];
    $arrayDatos[] = $pelicula->getId();
    $arrayDatos[] = $pelicula->getValuation();
    echo json_encode($arrayDatos);
?>