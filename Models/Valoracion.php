<?php

require_once 'CineDB.php';

class Valoracion {
  private $dni;
  private $idPelicula;
  private $idValoracion;
  private $puntuacion;

  function __construct($dni, $idPelicula, $puntuacion) {
    $this->dni = $dni;
    $this->idPelicula = $idPelicula;
    $this->puntuacion = $puntuacion;
  }

  public function getDNI() {
    return $this->dni;
  }

  public function getMovie() {
    return $this->idPelicula;
  }

  public function getPunctuation() {
    return $this->puntuacion;
  }

  public function insert() {
    $conexion = CineDB::connectDB();
    $insercion = "INSERT INTO VALORACION (DNI, IdPelicula, Puntuacion) VALUES (\"".$this->dni."\", \"".$this->idPelicula."\", \"".$this->puntuacion."\")";
    $conexion->exec($insercion);
  }

  public function delete() {
    $conexion = CineDB::connectDB();
    $borrado = "DELETE FROM VALORACION WHERE DNI=\"".$this->dni."\" AND IdPelicula=\"".$this->idPelicula."\"";
    $conexion->exec($borrado);
  }

  public static function getUsuarioValorado($dni, $idPelicula) {
    $conexion = CineDB::connectDB();
    $sql = "SELECT Puntuacion FROM VALORACION WHERE DNI = '$dni' AND IdPelicula = '$idPelicula'";
    $result=$conexion->query($sql);
    $rows = $result->rowCount();
    if($rows > 0) {
      $row = $result->fetch((PDO::FETCH_ASSOC));
      return $row['Puntuacion'];
    }  
    return false;
  }

  public static function getValoraciones() {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DNI, IdPelicula, Puntuacion FROM VALORACION";
    $consulta = $conexion->query($seleccion);
    $valoraciones = [];
    while ($registro = $consulta->fetchObject()) {
      $valoraciones[] = new Valoracion($registro->DNI, $registro->IdPelicula, $registro->Puntuacion);
    }
    return $valoraciones;    
  }
}