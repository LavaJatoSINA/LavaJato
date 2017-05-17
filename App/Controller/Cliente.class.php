<?php

// Criando classe Cliente;
class Cliente {
	
	// Criando atributos da classe Cliete;
	private $Cpf;	
	private $Nome;	
	private $End;	
	private $Fone;	
	private $Pass;
	
	// Criando construtor da classe Cliente;
	public function __construct($Cpf, $Nome, $End, $Fone, $Pass) {
		$this->Cpf = $Cpf;
		$this->Nome = $Nome;
		$this->End = $End;
		$this->Fone = $Fone;
		$this->Pass = $Pass;
	}
	
	// Metodos GET e SET;
	public function __get($Var) {
		return $this->$Var;
	}
	
	public function __set($Var, $Val) {
		$this->$Var = $Val;
	}

	// Desconstrutor da classe Cliente;
	public function __destruct() {
	}
}
