<?php

// Criando a classe Veiculo;
class Veiculo {
	
	// Criando atributos da classe Veiculo;
	private $Id_Cliente;	
	private $Placa;	
	private $Cor;	
	private $Modelo;	
	private $Tipo;
	
	// Criando contrutor da classe Veiculo;
	public function __construct($Id_Cliente, $Placa, $Cor, $Modelo, $Tipo) {
		$this->Id_Cliente = $Id_Cliente;
		$this->Placa = $Placa;
		$this->Cor = $Cor;
		$this->Modelo = $Modelo;
		$this->Tipo = $Tipo;
	}
	
	// Metodos GET e SET;
	public function __get($Var) {
		return $this->$Var;
	}
	
	public function __set($Var, $Val) {
		$this->$Var = $Val;
	}

	// Desconstrutor da classe Veiculo;
	public function __destruct() {
	}
}
