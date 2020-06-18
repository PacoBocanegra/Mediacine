<?php

require_once 'CineDB.php';
require_once 'Pelicula.php';

class Sesion {
  private $id;
  private $fecha;
  private $hora;
  private $butacasDips;
  private $idSala;
  private $idTarifa;
  private $idPelicula;

  function __construct($fecha, $hora, $butacasDips, $idSala, $idTarifa, $idPelicula) {
    $this->fecha = $fecha;
    $this->hora = $hora;
    $this->butacasDips = $butacasDips;
    $this->idSala = $idSala;
    $this->idTarifa = $idTarifa;
    $this->idPelicula = $idPelicula;
  }

  public function getId() {
    return $this->id;
  }

  public function addId($id) {
    $this->id = $id;
  }

  public function getDate() {
    return $this->fecha;
  } 

  public function getHour() {
    return $this->hora;
  } 

  public function getSeat() {
    return $this->butacasDips;
  }

  public function addSeat($butacas) {
    $this->butacasDips = $butacas;
  }

  public function getRoom() {
    return $this->idSala;
  }

  public function getRate() {
    return $this->idTarifa;
  }

  public function getMovie() {
    return $this->idPelicula;
  }


  public function insert() {
    $conexion = CineDB::connectDB();
    $insercion = "INSERT INTO SESION (Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula) VALUES (\"".$this->fecha."\", \"".$this->hora."\",  \"".$this->butacasDips."\", \"".$this->idSala."\", \"".$this->idTarifa."\", \"".$this->idPelicula."\")";
    $conexion->exec($insercion);
  }

  public function update($id) {
    $conexion = CineDB::connectDB();
    $actualiza = "UPDATE SESION SET Fecha = \"".$this->fecha."\", Hora = \"".$this->hora."\", ButacasDisp = \"".$this->butacasDips."\", IdSala = \"".$this->idSala."\", IdTarifa = $this->idTarifa, IdPelicula = $this->idPelicula WHERE IdSesion = $id";
    $conexion->exec($actualiza);
  }

  public function delete() {
    $conexion = CineDB::connectDB();
    $borrado = "DELETE FROM SESION WHERE IdSesion=$this->id";
    $conexion->exec($borrado);
  }

  // Comprueba si la sala está ocupada en una hora y fecha determinada
  public static function comprobarSalaSesion($sala, $fecha, $hora) {
    $conexion = CineDB::connectDB();
    $sesionSala = "SELECT IdSesion FROM SESION WHERE IdSala = '$sala' AND Fecha = '$fecha' AND Hora = '$hora'";
    $consultasesionSala=$conexion->query($sesionSala);
    $rows = $consultasesionSala->rowCount();
    if($rows > 0) {
      return true;
    }
    return false;
  }

  // Devuelve una sesión por su ID
  public static function getSesion($id) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdSesion, Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula FROM SESION WHERE IdSesion = $id";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $sesion = new Sesion($registro->Fecha, $registro->Hora, $registro->ButacasDisp, $registro->IdSala, $registro->IdTarifa, $registro->IdPelicula);
    $sesion->addId($registro->IdSesion);
    return $sesion;    
  }

  // Devuelve todas las sesiones
  public static function getSesiones() {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdSesion, Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula FROM SESION ORDER BY IdSesion DESC";
    $consulta = $conexion->query($seleccion);
    $sesiones = [];
    while ($registro = $consulta->fetchObject()) {
      $sesion = new Sesion($registro->Fecha, $registro->Hora, $registro->ButacasDisp, $registro->IdSala, $registro->IdTarifa, $registro->IdPelicula);
      $sesion->addId($registro->IdSesion);
      $sesiones[] = $sesion;
    }
    return $sesiones;    
  }

  // Devuelve todas las sesiones de una fecha en concreto
  public static function getSesionesFecha($fecha) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdSesion, Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula FROM SESION WHERE Fecha = '$fecha' ORDER BY IdPelicula DESC";
    $consulta = $conexion->query($seleccion);
    $sesiones = [];
    while ($registro = $consulta->fetchObject()) {
      $sesion = new Sesion($registro->Fecha, $registro->Hora, $registro->ButacasDisp, $registro->IdSala, $registro->IdTarifa, $registro->IdPelicula);
      $sesion->addId($registro->IdSesion);
      $sesiones[] = $sesion;
    }
    return $sesiones;    
  }

  // Devuelve las sesiones de una película en concreto de días posteriores a hoy.
  public static function getSesionesFechaPelicula($idPelicula) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DISTINCT Fecha FROM SESION WHERE IdPelicula = $idPelicula";
    $consulta = $conexion->query($seleccion);
    $fechas = [];
    while ($registro = $consulta->fetchObject()) {
      $fechaSesion = str_replace("/", "-", $registro->Fecha);
      $fechaMod = new DateTime(date($fechaSesion));
      $fechaHoy = new DateTime(date("d-m-yy"));
      if ($fechaHoy < $fechaMod) {
        $fechas[] = $registro->Fecha;
      }
    }
    return $fechas;    
  }

  // Devuelve las horas de una fecha de sesión
  public static function getHorasSesiones($idPelicula, $fecha) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DISTINCT Hora FROM SESION WHERE IdPelicula = $idPelicula AND Fecha = '$fecha'";
    $consulta = $conexion->query($seleccion);
    $horas = [];
    while ($registro = $consulta->fetchObject()) {
      $horas[] = $registro->Hora;
    }
    return $horas; 
  }

  // Devuelve la sesión en concreto de la película, fecha y hora
  public static function getSesionPelicula($idPelicula, $fecha, $hora) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdSesion, Fecha, Hora, ButacasDisp, IdSala, IdTarifa, IdPelicula FROM SESION WHERE IdPelicula = $idPelicula AND Fecha = '$fecha' AND Hora = '$hora'";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $sesion = new Sesion($registro->Fecha, $registro->Hora, $registro->ButacasDisp, $registro->IdSala, $registro->IdTarifa, $registro->IdPelicula);
    $sesion->addId($registro->IdSesion);
    return $sesion;    
  }

  // Procesa los datos del formulario para insert
  public function getDatosFormularioSesion($fecha, $hora, $butacasDips, $idSala, $idTarifa, $idPelicula) {
    $sesion = new Sesion($fecha, $hora, $butacasDips, $idSala, $idTarifa, $idPelicula);
    return $sesion;
  }
}