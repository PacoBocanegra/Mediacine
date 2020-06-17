<?php

require_once 'CineDB.php';

class Pelicula {
  private $id;
  private $año;
  private $titulo;
  private $pais;
  private $genero;
  private $duracion;
  private $fechaEstreno;
  private $valoracion;
  private $sinopsis;
  private $enlace;

  function __construct($año, $titulo, $pais, $genero, $duracion, $fechaEstreno, $valoracion, $sinopsis, $enlace) {
    $this->año = $año;
    $this->titulo = $titulo;
    $this->pais = $pais;
    $this->genero = $genero;
    $this->duracion = $duracion;
    $this->fechaEstreno = $fechaEstreno;
    $this->valoracion = $valoracion;
    $this->sinopsis = $sinopsis;
    $this->enlace = $enlace;
  }

  public function getId() {
    return $this->id;
  }
  public function addId($id) {
    $this->id = $id;
  }

  public function getAge() {
    return $this->año;
  }

  public function getTitle() {
    return $this->titulo;
  }

  public function getCountry() {
    return $this->pais;
  }

  public function getGenre() {
    return $this->genero;
  }

  public function getLength() {
    return $this->duracion;
  }

  public function getDate() {
    return $this->fechaEstreno;
  } 

  public function getValuation() {
    return $this->valoracion;
  }

  public function addValuation($valoracion) {
    $this->valoracion = $valoracion;
  } 

  public function getSynopsis() {
    return $this->sinopsis;
  } 

  public function getImage() {
    return $this->enlace;
  } 

  public function insert() {
    $conexion = CineDB::connectDB();
    $insercion = "INSERT INTO PELICULA (Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace) VALUES (\"".$this->año."\", \"".$this->titulo."\",  \"".$this->pais."\", \"".$this->genero."\", \"".$this->duracion."\", \"".$this->fechaEstreno."\", \"".$this->valoracion."\", \"".$this->sinopsis."\", \"".$this->enlace."\")";
    $conexion->exec($insercion);
  }
  
  public function update($id) {
    $conexion = CineDB::connectDB();
    $actualiza = "UPDATE PELICULA SET Año = \"".$this->año."\", Titulo = \"".$this->titulo."\", Pais = \"".$this->pais."\", Genero = \"".$this->genero."\", Duracion = \"".$this->duracion."\", FechaEstreno = \"".$this->fechaEstreno."\", Valoracion = \"".$this->valoracion."\", Sinopsis = \"".$this->sinopsis."\", Enlace = \"".$this->enlace."\" WHERE IdPelicula = $id";
    $conexion->exec($actualiza);
  }

  public function delete() {
    $conexion = CineDB::connectDB();
    $borrado = "DELETE FROM PELICULA WHERE IdPelicula= $this->id";
    $conexion->exec($borrado);
    var_dump($borrado);
  }

  // Comprueba que no se repita el título en el formulario pelicula
  public static function comprobarTitle($titulo) {
    $conexion = CineDB::connectDB();
    $sql = "SELECT Titulo FROM PELICULA";
    $consulta=$conexion->query($sql);
    while ($registro = $consulta->fetchObject()) {
      if($registro->Titulo == $titulo) {
        return true;
      }
    }  
    return false;
  }

  public static function getPelicula($id) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdPelicula, Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace FROM PELICULA WHERE IdPelicula = $id";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $pelicula = new Pelicula($registro->Año, $registro->Titulo, $registro->Pais, $registro->Genero, $registro->Duracion, $registro->FechaEstreno, $registro->Valoracion, $registro->Sinopsis, $registro->Enlace);
    $pelicula->addId($registro->IdPelicula);
    return $pelicula;    
  }

  public static function getPeliculas() {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT IdPelicula, Año, Titulo, Pais, Genero, Duracion, FechaEstreno, Valoracion, Sinopsis, Enlace FROM PELICULA ORDER BY IdPelicula DESC";
    $consulta = $conexion->query($seleccion);
    $peliculas = [];
    while ($registro = $consulta->fetchObject()) {
      $pelicula = new Pelicula($registro->Año, $registro->Titulo, $registro->Pais, $registro->Genero, $registro->Duracion, $registro->FechaEstreno, $registro->Valoracion, $registro->Sinopsis, $registro->Enlace);
      $pelicula->addId($registro->IdPelicula);
      $peliculas[] = $pelicula;
    }
    return $peliculas;    
  }

  public function getDatosFormularioPelicula($titulo, $generos, $duracion, $fechaEstreno, $año, $pais, $sinopsis, $imagen, $valoracion ) {
    $genero = "";
    for ($i = 0; $i <= sizeof($generos); $i++) {
        if($i == 0) {
            $genero = $generos[$i];
        } elseif($i+1 == sizeof($generos)){ //Evita repetir el último bucle y poner otro símbolo /.
            $genero = $genero . "/" . $generos[$i];
            break;
        } else {
            $genero = $genero . "/" . $generos[$i];
        } 
    } 
    $urlImagen = "../Views/images/" . $imagen;
    $pelicula = new Pelicula($año, $titulo, $pais, $genero, $duracion, $fechaEstreno, $valoracion, $sinopsis, $urlImagen);
    return $pelicula;
  }
}
?>