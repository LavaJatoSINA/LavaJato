<?php
// Importanto arquivos de conexão e classes;
include_once 'Conn.class.php';

// Criando a classe ClienteDAO;
class ClienteDAO {

	
	public function cadastrarCliente($Cliente) {
		return false;
	}

	
	public function editarCliente($Cliente) {
		return false;
	}

	
	public function buscarCliente($Cpf) {
		$Conn = Conn::connOpen();
		$SQL = "SELECT * FROM cliente where Cpf='{$Cpf}'";
		$Result = mysqli_query($Conn, $SQL);
		if ($Result = mysqli_fetch_assoc($Result)) {
			// Montando obeto Cliente;
			$Cliente = new Cliente($Result['Cpf'], $Result['Nome'], $Result['End'], $Result['Fone'], $Result['Pass']);
			$Conn->close();
			return $Cliente;
		} else {
			$Conn->close();
			return false;
		}
	}

	
	public function excluirCliente($Cpf) {
		return false;
	}

	
	public function __destruct() {
	}
}
