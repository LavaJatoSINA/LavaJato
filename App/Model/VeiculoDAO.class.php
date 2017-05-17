<?php
// Importanto arquivos de conexão e classes;
include_once 'Conn.class.php';

// Criando a classe VeiculoDAO;
class VeiculoDAO {

	
	public function cadastrarVeiculo($Veiculo) {
		$Conn = Conn::connOpen();
		$SQL = "INSERT INTO veiculo VALUES('{$Veiculo->Id_Cliente}', '{$Veiculo->Placa}', '{$Veiculo->Cor}', '{$Veiculo->Modelo}', '{$Veiculo->Tipo}')";
		if (mysqli_query($Conn, $SQL)) {			
			return true;
		} else {
			return false;
		}
		$Conn->close();
	}

	
	public function editarVeiculo($Veiculo) {
		return false;
	}

	
	public function listarVC($Id_Cliente) {
		$Conn = Conn::connOpen();
		$i=0;
		$SQL = "SELECT * FROM veiculo WHERE Id_Cliente='{$Id_Cliente}'";
		$Result = mysqli_query($Conn, $SQL);
		while ($Dados = mysqli_fetch_assoc($Result)) {
			$Lista[$i] = $Dados;
			$i++;
		}		
		$Conn->close();
		if (isset($Lista)) {
			return $Lista;
		}else{
			return false;
		}
	}

	
	public function buscarVeiculo($Placa) {
		return null;
	}

	
	public function excluirVC($Id_Cliente) {
		return false;
	}

	
	public function excluirVeiculo($Placa) {
		return false;
	}

	
	public function __destruct() {
	}
}
