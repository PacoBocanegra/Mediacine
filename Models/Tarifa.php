<?php

require_once 'CineDB.php';

class Tarifa {
  private $id;
  private $tipoTarifa;
  private $precio;

  function __construct($tipoTarifa, $precio) {
    $this->tipoTarifa = $tipoTarifa;
    $this->precio = $precio;
  }

  public function getId() {
    return $this->id;
  }

  public function addId($id) {
    $this->id = $id;
  }

  public function getType() {
    return $this->tipoTarifa;
  }

  public function getPrice() {
    return $this->precio;
  }

  public function insert() {
    $conexion = CineDB::connectDB();
    $insercion = "INSERT INTO TARIFA (TipoTarifa, Precio) VALUES (\"".$this->tipoTarifa."\", \"".$this->precio."\")";
    $conexion->exec($insercion);
  }

  public function delete() {
    $conexion = CineDB::connectDB();
    $borrado = "DELETE FROM TARIFA WHERE IdTarifa=$this->id";
    $conexion->exec($borrado);
  }

  public function update($id) {
    $conexion = CineDB::connectDB();
    $actualiza = "UPDATE TARIFA SET TipoTarifa = \"".$this->tipoTarifa."\", Precio = \"".$this->precio."\" WHERE IdTarifa = $id";
    $conexion->exec($actualiza);
  }

  public static function getTarifa($id) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdTarifa, TipoTarifa, Precio FROM TARIFA WHERE IdTarifa = $id";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $tarifa = new Tarifa($registro->TipoTarifa, $registro->Precio);
    $tarifa->addId($registro->IdTarifa);
    return $tarifa;    
  }

  public static function getTarifas() {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdTarifa, TipoTarifa, Precio FROM TARIFA";
    $consulta = $conexion->query($seleccion);
    $tarifas = [];
    while ($registro = $consulta->fetchObject()) {
      $tarifa = new Tarifa($registro->TipoTarifa, $registro->Precio);
      $tarifa->addId($registro->IdTarifa);
      $tarifas[] = $tarifa;
    }
    return $tarifas;    
  }

  public function getDatosFormularioTarifa($tipoTarifa, $precio) {
    $tarifa = new Tarifa($tipoTarifa, $precio);
    return $tarifa;
  }
}