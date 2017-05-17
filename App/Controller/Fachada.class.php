<?php
include_once '../Model/ClienteDAO.class.php';
include_once '../Model/VeiculoDAO.class.php';

// Criando a classe Fachada;
class Fachada {
	
	// Atributos da classe Fachada;
	private static $Instance;	
	private $Act_Cliente;	
	private $Act_Veiculo;
	
	// Construtor privado para o padrão singleton;
	private function __construct() {
		$this->Act_Cliente = new ClienteDAO();
		$this->Act_Veiculo = new VeiculoDAO();
	}

	// Funcão para o singleton;
	public static function getInstance() {
		if (self::$Instance == null) {
			self::$Instance = new Fachada();
		}
		return self::$Instance;
	}

	// INÍCIO PARA OS METODOS DOS CLIENTES;
	public function cadastrarCliente($Cliente) {
		return $this->Act_Cliente->cadastrarCliente($Cliente);
	}
	
	public function buscarCliente($Cpf) {
		return $this->Act_Cliente->buscarCliente($Cpf);
	}
	
	public function excluirCliente($Cpf) {
		return $this->Act_Cliente->excluirCliente($Cpf);
	}
	
	public function editarCliente($Cliente) {
		return $this->Act_Cliente->editarCliente($Cliente);
	}

	


	// INÍCIO PARA OS METODOS DOS VEICULOS;
	public function cadastrarVeiculo($Veiculo) {
		return $this->Act_Veiculo->cadastrarVeiculo($Veiculo);
	}
	
	public function listarVC($Id_Cliente) {
		return $this->Act_Veiculo->listarVC($Id_Cliente);
	}
	
	public function buscarVeiculo($Placa) {
		return $this->Act_Veiculo->buscarVeiculo($Placa);
	}
	
	public function excluirVC($Id_Cliente) {
		return $this->Act_Veiculo->excluirVC($Id_Cliente);
	}
	
	public function excluirVeiculo($Placa) {
		return $this->Act_Veiculo->excluirVeiculo($Placa);
	}
	
	public function editarVeiculo($Veiculo) {
		return $this->Act_Veiculo->editarVeiculo($Veiculo);
	}
}
