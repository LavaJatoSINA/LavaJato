<?php

// Criando a classe para conexão ao banco de dados;
class Conn {
	
	// Criando atributos estáticos para usar na conexão;
	private static $Host = "localhost";	
	private static $User = "root";	
	private static $Pass = "";	
	private static $Db_Name = "fjn";
	
	// Metodo para abrir conexão com o banco;
	public static function connOpen() {
		if ($Conn = mysqli_connect(self::$Host, self::$User, self::$Pass, self::$Db_Name)) {
			mysqli_query($Conn, "SET NAMES 'utf8'");
			mysqli_query($Conn, 'SET character_set_connection=utf8');
			mysqli_query($Conn, 'SET character_set_client=utf8');
			mysqli_query($Conn, 'SET character_set_results=utf8');
			return $Conn;
		} else {
			return false;
		}
	}

	// Desconstrutor da classe Conn;
	public function __destruct() {
	}
}
