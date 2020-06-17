<?php
    session_start();
    require_once '../Models/Tarifa.php';
    $data['tarifas'] = Tarifa::getTarifas();
    include '../Views/content/tarifas.php';
?>