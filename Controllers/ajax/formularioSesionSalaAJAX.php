<?php 
    //Respuesta petición ajax que te devuelve los asientos de una sala que seleccione el usuario
    require_once '../../Models/Sala.php';
    $sala = Sala::getSala($_POST['sala']);
    $butacas = $sala->getSeats();
    echo json_encode($butacas);
?>