<?php
// INCLUINDO ARQUIVOS PARA ACESSO AO CONTROLADOR;
include_once '../Controller/Fachada.class.php';
include_once '../Controller/Cliente.class.php';
include_once '../Controller/Veiculo.class.php';

// INICIANDO E VALIDANDO SESSÃO...
session_start(); 
// if (!@$_SESSION['Cliente']) {
// 	print("<script>window.location='../../index.php';alert('Caro usuário, realize o login antes de continuar!');</script>");
// }

// CAPTURA VARIÁVEL DE AÇÃO; 
@$action = $_REQUEST['action'];

// AÇÃO PARA REALIZAR LOGIN;
if ($action == "login") {
	$Cpf = $_REQUEST['Cpf'];
	$Pass = md5($_REQUEST['Pass']);
	// Verifica existência do cliente;
	if ($Cliente = Fachada::getInstance()->buscarCliente($Cpf)) {
		// Verifica senha do cliente;
		if ($Pass == $Cliente->Pass) {
			// Monsta sessão do cliente em forma de array;
			$_SESSION['Cliente'] = array('Cpf'=>$Cliente->Cpf, 'Nome'=>$Cliente->Nome, 'End'=>$Cliente->End, 'Fone'=>$Cliente->Fone, 'Pass'=>$Cliente->Pass);
			header("location: ../../portal.php");
		} else {
			header("location: ../../index.php?error=1");
			session_destroy();
		}		
	}else{
		header("location: ../../index.php?error=1");
		session_destroy();
	}
	die();
}

// LISTAGEM COMPLETA DE VEICULOS E SERVIÇOS;
if ($action == "services") {
	if($Lista = Fachada::getInstance()->listarVC($_SESSION['Cliente']['Cpf'])){
		// Head da tabela
		$table = "<table id='table-default'><caption>Listagem de veículos e dos tipos de serviços</caption><thead><tr><th width='20%'>Placa</th><th width='20%'>Cor</th><th width='35%'>Modelo</th><th width='25%'>Tipo</th></tr></thead><tbody>";

		// Dados da tabela;
		for ($i=0; $i < count($Lista); $i++) { 
			$table .= "<tr><td>{$Lista[$i]['Placa']}</td><td>{$Lista[$i]['Cor']}</td><td>{$Lista[$i]['Modelo']}</td><td>{$Lista[$i]['Tipo']}</td></tr>";
		}

		// Fechamento e envio da tabela;
		$table .= "</tbody>";
		echo json_encode($table);
	}else{
		$msg = "<div style='margin:20px 0;' class='alert alert-info alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Nenhum serviço foi localizado!</strong></div>";

		echo json_encode($msg);
	}
	die();
}

if ($action == "newService") {
	// Montando Objetos do tipo Veiculo;
	for ($i=1; $i <= $_REQUEST['Total']; $i++) { 
		$Veiculo = new Veiculo($_SESSION['Cliente']['Cpf'], $_REQUEST['Placa'.$i], $_REQUEST['Cor'.$i], $_REQUEST['Modelo'.$i], $_REQUEST['Tipo'.$i]);

		if (Fachada::getInstance()->cadastrarVeiculo($Veiculo)) {
			if ($i == $_REQUEST['Total']) {
				echo "<div class='alert alert-success alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Cadastro realizado com sucesso!</strong></div>";
			}
		} else {
			break;
			echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>OPS! Algo deu errado, tente novamente.</strong></div>";			
		}		
	}
	die();
}

if ($action == "cadUpdate") {

	die();
}


// LOGOFF
if ($action == "exit") {
	session_destroy();
	header("location: ../../index.php");
	die();
}

?>