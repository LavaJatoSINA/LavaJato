<?php
session_start();
if (!@$_SESSION['Cliente']) {
	print("<script>window.location='index.php';alert('Caro usuário, realize o login antes de continuar!');</script>");
}
$Cliente = $_SESSION['Cliente'];
include_once 'Imports/head.php';
?>
<body id="top-page" data-spy="scroll" data-target=".navbar" data-offset="50">

	<header>
		<!-- TOP HEADER -->
		<div class="topheader">
			<img src="Assets/img/logo-top.png" title="LavaJato" alt="logo-top.png">
		</div>

		


		<!-- MENU -->
		<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="160">
			<div class="navbar-content">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myMenu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="myMenu">
					<ul class="nav navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="#top-page">Início</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#servicos">Serviços</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#usuario">Usuário</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="App/View/Action.php?action=exit">Sair</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	
	<!-- CARROUSEL -->
	<div id="myCar" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCar" data-slide-to="0" class="active"></li>
			<li data-target="#myCar" data-slide-to="1"></li>
			<li data-target="#myCar" data-slide-to="2"></li>
			<li data-target="#myCar" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="Assets/img/slider/home-slide01.jpg" title="lava Jato" alt="slideshow01">
			</div>
			<div class="item">
				<img src="Assets/img/slider/home-slide02.jpg" title="lava Jato" alt="slideshow02">
			</div>
			<div class="item">
				<img src="Assets/img/slider/home-slide03.jpg" title="lava Jato" alt="slideshow03">
			</div>
			<div class="item">
				<img src="Assets/img/slider/home-slide04.jpg" title="lava Jato" alt="slideshow04">
			</div>
		</div>
		<a class="left carousel-control" href="#myCar" role="button" data-slide="prev">
			<span class="icon-prev" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCar" role="button" data-slide="next">
			<span class="icon-next" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>


	<!-- SLEEÇÃO DE SERVIÇOS -->
	<section id="servicos">
		<div class="container">
			<h1 id="super">Serviços</h1>
			<hr>
			<h2>Bem vindo <?= $_SESSION['Cliente']['Nome'] ?>,</h2>
			<p>
				Fique a vontade para utilizar o <strong>menu</strong> e percorrer todo o site,<br>
				se você deseja conferir os serviços contratados, clique no botão abaixo <strong>Consultar Serviços</strong>.<br>
				caso deseja solicitar um novo serviço,  clique em <strong>Solicitar Serviços</strong>.
			</p>

			<button type="button" id="bt-nservice" class="btn btn-default">Solicitar Serviços</button>
			<button type="button" id="bt-service" class="btn btn-default">Consultar Serviços</button>	
			
			<!-- Mostrar Serviços -->
			<div class="show-service"></div>

			<!-- Mostrar cadastro de serviços -->
			<div class="show-nservice">
				<fieldset id="fs-default">
					<legend>Solicitar Serviço</legend>
					<form class="form-default" id="form-service" action="App/View/Action.php?action=newService" method="post" accept-charset="utf-8">
						<div class="form-group row">
							<label for="Total" class="col-sm-4 form-control-label">Solicitar:</label>
							<div class="col-sm-8">
								<select class="form-control" name="Total" id="Total" required="required">
									<option value=""></option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>
						<div id="rsqtd"></div>
						<div class="form-group row">
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" class="btn btn-default">Cadastrar</button>
								<button type="reset" class="btn btn-default">Desfazer</button>
							</div>							
						</div>						
					</form>
				</fieldset>
			</div>
		</div>
	</section>


	<!-- SELEÇÃO DE SUSUÁRIOS -->
	<section id="usuario">
		<div class="container">
			<h1 id="super">Usuário</h1>
			<hr>
			<h2>Dados Pessoais</h2>
			<p>
				Caro(a) <?= $_SESSION['Cliente']['Nome'] ?>, porfavor mantenha seus dados atualizados.
			</p>

			<fieldset id="fs-default">
				<form class="form-default" id="form-cadUpdate" action="App/View/Action.php?=cadUpdate" method="post" accept-charset="utf-8">
					<div class="form-group row">
						<label for="Cpf" class="col-sm-4 form-control-label">Cpf:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="Cpf" name="Cpf" placeholder="000.000.000-00" title="Informe o CPF" required="required" maxlength="14" minlength="14" onfocus="$('#Cpf').mask('999.999.999-99')" value="<?= $_SESSION['Cliente']['Cpf']?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="Nome" class="col-sm-4 form-control-label">Nome:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="Nome" name="Nome" placeholder="Informe seu Nome Completo" title="Informe seu Nome Completo" required="required" maxlength="45" minlength="4" value="<?= $_SESSION['Cliente']['Nome'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="End" class="col-sm-4 form-control-label">Endereço:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="End" name="End" placeholder="Informe seu Endereço Completo" title="Informe seu Endereço Completo" required="required" maxlength="300" minlength="4" value="<?= $_SESSION['Cliente']['End'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="Fone" class="col-sm-4 form-control-label">Fone:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="Fone" name="Fone" placeholder="(99)99999-9999" title="Informe seu telefone para contato" required="required" maxlength="14" minlength="14" onfocus="$('#Fone').mask('(99)99999-9999')" value="<?= $_SESSION['Cliente']['Fone'] ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="Pass1" class="col-sm-4 form-control-label">Nova Senha:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="Pass1" name="Pass1" placeholder="Informe sua senha" title="Informe sua senha" required="required" minlength="4" maxlength="10">
						</div>
					</div>
					<div class="form-group row">
						<label for="Pass2" class="col-sm-4 form-control-label">Antiga Senha:</label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="Pass2" name="Pass2" placeholder="Informe sua senha" title="Informe sua senha" required="required" minlength="4" maxlength="10">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-8">
							<div class="checkbox">
								<label>
									<input type="checkbox" required="required">Estou ciente das minhas escolhas.
								</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-default">Atualizar</button>
							<button type="reset" class="btn btn-default">Desfazer</button>
						</div>
					</div>
				</form>
			</fieldset>
		</div>
	</section>

	<!-- FOOTER -->
	<footer>
		<div class="container">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>
		<div id="rodape">
			<p><?= date("Y")?> Powered by <a href="http://www.bfwebsites.com.br" target="_blank">BFwebSites.com</a></p>
		</div>
	</footer>

</body>
</html>