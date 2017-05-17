<?php @$error=$_REQUEST['error']; ?>
<?php include 'Imports/head.php'; ?>

<body id="log-page">
	<a class="btn btn-default" href="App.zip">Download</a>

	<?php if ($error == "1"): ?>
		<div class="alert alert-info alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
			<p style="text-align: center;"><strong>OPS! Login ou Senha inválidos</strong></p>
		</div>
	<?php endif ?>

	<div id="log-painel">
		<h3>Acesso Cliente</h3>
		<a data-toggle="modal" data-target="#cliacess">
			<img class="img-circle" src="Assets/img/acess-cliente.png" alt="">
		</a>

		<h3>Acesso Empresa</h3>
		<a data-toggle="modal" data-target="#empacess">
			<img class="img-circle" src="Assets/img/acess-empresa.png" alt="">
		</a>
	</div>

	<!-- MODAL CLIENTE -->
	<div class="modal fade" id="cliacess">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h3 class="modal-title">Acesso para Clientes</h3>
				</div>
				<div class="modal-body">
					<form class="form-default" id="form-login" action="App/View/Action.php?action=login" method="post" accept-charset="utf-8">
						<div class="form-group row">
							<label for="Cpf" class="col-sm-3 form-control-label">CPF:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="Cpf" name="Cpf" placeholder="000.000.000-00" title="Informe seu CPF" minlength="14" maxlength="14" required="required" onfocus="$('#Cpf').mask('999.999.999-99')">
							</div>
						</div>
						<div class="form-group row">
							<label for="Pass" class="col-sm-3 form-control-label">SENHA:</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="Pass" name="Pass" placeholder="******" title="Informe sua senha" maxlength="10" minlength="4" required="required">
							</div>
						</div>						
					</div>
					<div class="modal-footer">
						<div id="loading"></div>
						<button type="submit" class="btn btn-default">Login</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- FIM MODAL CLIENTE -->

	<!-- MODAL EMPRESAS -->
	<div class="modal fade" id="empacess">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<h3 class="modal-title">Acesso para Empresas</h3>
				</div>
				<div class="modal-body">
					<p>
						Disponível em breve!!!
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
				</div>
			</div>
		</div>
	</div>
	<!-- FIM MODAL EMPRESAS -->


</body>
</html>