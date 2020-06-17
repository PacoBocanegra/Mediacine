<?php

require_once 'CineDB.php';

class Reserva {
  private $dni;
  private $idSesion;
  private $numButacas;

  function __construct($dni, $idSesion, $numButacas) {
    $this->dni = $dni;
    $this->idSesion = $idSesion;
    $this->numButacas = $numButacas;
  }

  public function getDNI() {
    return $this->dni;
  }

  public function addDNI($dni) {
    $this->dni = $dni;
  }

  public function getSesion() {
    return $this->idSesion;
  }

  public function addSesion($idSesion) {
    $this->idSesion = $idSesion;
  }

  public function getNumSeat() {
    return $this->numButacas;
  }
  public function addNumSeat($butacas) {
    $this->numButacas = $butacas;
  }

  public function insert() {
    $conexion = CineDB::connectDB();
    $insercion = "INSERT INTO RESERVA (DNI, IdSesion, numButacas) VALUES (\"".$this->dni."\", \"".$this->idSesion."\", \"".$this->numButacas."\")";
    $conexion->exec($insercion);
  }

  public function update($dni, $idSesion) {
    $conexion = CineDB::connectDB();
    $actualiza = "UPDATE RESERVA SET DNI = \"".$this->dni."\", IdSesion = \"".$this->idSesion."\", numButacas = \"".$this->numButacas."\" WHERE DNI = '$dni' AND IdSesion = '$idSesion'";
    $conexion->exec($actualiza);
  }


  public function delete() {
    $conexion = CineDB::connectDB();
    $borrado = "DELETE FROM RESERVA WHERE DNI=\"".$this->dni."\" AND IdSesion=\"".$this->idSesion."\"";
    $conexion->exec($borrado);
  }

  // Comprueba si un usuario reserva la misma sesión
  public static function comprobarReserva($dni, $idSesion) {
    $conexion = CineDB::connectDB();
    $sql = "SELECT DNI, IdSesion FROM RESERVA WHERE DNI = '$dni' AND IdSesion = '$idSesion'";
    $consulta=$conexion->query($sql);
    $rows = $consulta->rowCount();
    if($rows > 0) {
      return true;
    }  
    return false;
  }

  public static function getReserva($dni, $idSesion) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DNI, IdSesion, numButacas FROM RESERVA WHERE DNI = '$dni' AND IdSesion = '$idSesion'";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $reserva = new Reserva($registro->DNI, $registro->IdSesion, $registro->numButacas);
    return $reserva;    
  }

  public static function getReservas() {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DNI, IdSesion, numButacas FROM RESERVA";
    $consulta = $conexion->query($seleccion);
    $reservas = [];
    while ($registro = $consulta->fetchObject()) {
      $reservas[] = new Reserva($registro->DNI, $registro->IdSesion, $registro->numButacas);
    }
    return $reservas;    
  }

  public static function getReservasUsuario($dni) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DNI, IdSesion, numButacas FROM RESERVA WHERE DNI = '$dni'";
    $consulta = $conexion->query($seleccion);
    $reservas = [];
    while ($registro = $consulta->fetchObject()) {
      $reservas[] = new Reserva($registro->DNI, $registro->IdSesion, $registro->numButacas);
    }
    return $reservas;    
  }
}