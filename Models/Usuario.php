<?php

require_once 'CineDB.php';

class Usuario {

  private $dni;
  private $nombre;
  private $apellidos;
  private $email;
  private $password;
  private $admin;

  function __construct($dni, $nombre, $apellidos, $email, $password) {
    $this->dni = $dni;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->email = $email;
    $this->password = $password;
  }

  public function getDNI() {
    return $this->dni;
  }

  public function getName() {
    return $this->nombre;
  }

  public function getLastName() {
    return $this->apellidos;
  }

  public function getPwd() {
    return $this->password;
  }

  public function addPwd($password) {
    $this->password = $password;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getAdmin() {
    return $this->admin;
  }

  public function addAdmin() {
    $this->admin = "X";
  } 

  public function insert() {
    $conexion = CineDB::connectDB();
    $insercion = "INSERT INTO USUARIO (DNI, Nombre, Apellidos, Email, Password, Admin) VALUES (\"".$this->dni."\", \"".$this->nombre."\", \"".$this->apellidos."\",  \"".$this->email."\", \"".$this->password."\", \"".$this->admin."\")";
    $conexion->exec($insercion);
  }

  public function update($dni) {
    $conexion = CineDB::connectDB();
    $actualiza = "UPDATE USUARIO SET DNI = \"".$this->dni."\", Nombre = \"".$this->nombre."\", Apellidos = \"".$this->apellidos."\", Email = \"".$this->email."\", Password = \"".$this->password."\", Admin = \"".$this->admin."\" WHERE DNI = '$dni'";
    $conexion->exec($actualiza);
  }

  public function delete() {
    $conexion = CineDB::connectDB();
    $borrado = "DELETE FROM USUARIO WHERE DNI=\"".$this->dni."\"";
    $conexion->exec($borrado);
  }

  // Valida que el email y el password para el acceso al usuario
  public static function validarAuth($email, $password) {
    $conexion = CineDB::connectDB();
    $sql = "SELECT Email FROM USUARIO WHERE Email = '$email' AND Password = '$password'";
    $result=$conexion->query($sql);
    $rows = $result->rowCount();
    if($rows > 0) {
      $row = $result->fetch((PDO::FETCH_ASSOC));
      return $row['Email'];
    }  
    return false;
  }

  // Comprueba que no se repita el email en el registro
  public static function comprobarEmail($email) {
    $conexion = CineDB::connectDB();
    $sql = "SELECT Email FROM USUARIO";
    $consulta=$conexion->query($sql);
    while ($registro = $consulta->fetchObject()) {
      if($registro->Email == $email) {
        return true;
      }
    }  
    return false;
  }

  // Comprueba que no se repita el dni en el registro
  public static function comprobarDNI($dni) {
    $conexion = CineDB::connectDB();
    $sql = "SELECT DNI FROM USUARIO";
    $consulta=$conexion->query($sql);
    while ($registro = $consulta->fetchObject()) {
      if($registro->DNI == $dni) {
        return true;
      }
    }  
    return false;
  }

  //Devuelve si el usuario es admin en el login
  public static function getAdminAuth($email, $password) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT Admin FROM USUARIO WHERE Email = '$email' AND Password = '$password'";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    if($registro->Admin == "X") {
      return $registro->Admin; 
    }
  }

  //Devuelve un usuario según el dni
  public static function getUsuario($dni) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DNI, Nombre, Apellidos, Email, Password, Admin FROM USUARIO WHERE DNI = '$dni'";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $usuario = new Usuario($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Email, $registro->Password, $registro->Admin);
    return $usuario; 
  }

  //Devuelve un usuario según el email
  public static function getUsuarioEmail($email) {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DNI, Nombre, Apellidos, Email, Password, Admin FROM USUARIO WHERE Email = '$email'";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();
    $usuario = new Usuario($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Email, $registro->Password, $registro->Admin);
    return $usuario; 
  }
  
  //Devuelve todos los usuarios
  public static function getUsuarios() {
    $conexion = CineDB::connectDB();
    $seleccion = "SELECT DNI, Nombre, Apellidos, Email, Password, Admin FROM USUARIO";
    $consulta = $conexion->query($seleccion);
    $usuarios = [];
    while ($registro = $consulta->fetchObject()) {
      $usuario = new Usuario($registro->DNI, $registro->Nombre, $registro->Apellidos, $registro->Email, $registro->Password, $registro->Admin);
      if($registro->Admin) {
        $usuario->addAdmin();
      }
      $usuarios []= $usuario; 
    }
    return $usuarios;    
  }

  public function getDatosFormularioUsuario($dni, $nombre, $apellidos, $email, $password, $admin="") {
    $usuario = new Usuario($dni, $nombre, $apellidos, $email, $password);
    if ($admin != ""){
      $usuario->addAdmin();
    }
    return $usuario;
  }
}