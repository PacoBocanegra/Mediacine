<?php

require_once 'CineDB.php';

class Sala {
  private $id;
  private $butacas;
  private $tipoSala;

  function __construct($id, $butacas, $tipoSala) {
    $this->id = $id;
    $this->butacas = $butacas;
    $this->tipoSala = $tipoSala;
  }

  public function getId() {
    return $this->id;
  }

  public function getSeats() {
    return $this->butacas;
  }

  public function getRoomType() {
    return $this->tipoSala;
  }

  public function insert() {
    $conexion = CineDB::connectDB();
    $insercion = "INSERT INTO SALA (IdSala, Butacas, TipoSala) VALUES (\"".$this->id."\", \"".$this->butacas."\", \"".$this->tipoSala."\")";
    $conexion->exec($insercion);
  }

  public function update($id) {
    $conexion = CineDB::connectDB();
    $actualiza = "UPDATE SALA SET IdSala = \"".$this->id."\", Butacas = \"".$this->butacas."\", TipoSala = \"".$this->tipoSala."\" WHERE IdSala = '$id'";
    $conexion->exec($actualiza);
  }

  public function delete() {
    $conexion = CineDB::connectDB();
    $borrado = "DELETE FROM SALA WHERE IdSala=\"".$this->id."\"";
    $conexion->exec($borrado);
  }

  // Comprueba que no se repita el IdPelicula en el formulario pelicula
  public static function comprobarID($id) {
    $conexion = CineDB::connectDB();
    $sql = "SELECT IdSala FROM SALA";
    $consulta=$conexion->query($sql);
    while ($registro = $consulta->fetchObject()) {
      if($registro->IdSala == $id) {
        return true;
      }
    }  
    return false;
  }

  public static function getSala($id) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdSala, Butacas, TipoSala FROM SALA";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $sala = new Sala($registro->IdSala, $registro->Butacas, $registro->TipoSala);
    return $sala;    
  }

  public static function getSalas() {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdSala, Butacas, TipoSala FROM SALA";
    $consulta = $conexion->query($seleccion);
    $salas = [];
    while ($registro = $consulta->fetchObject()) {
      $salas[] = new Sala($registro->IdSala, $registro->Butacas, $registro->TipoSala);
    }
    return $salas;    
  }
}