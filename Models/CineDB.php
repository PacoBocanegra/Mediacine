<?php
abstract class CineDB {

	private static $server = 'localhost';
	private static $db = 'cine';
	private static $user = 'cine';
	private static $password = 'cine';
	private static $port=3306;

	public static function connectDB() {
		try {
			$connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";port=".self::$port.";charset=utf8", self::$user, self::$password);
		} 
		catch (PDOException $e) {
			echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
			die ("Error: " . $e->getMessage());
		}
		return $connection;
	}
}