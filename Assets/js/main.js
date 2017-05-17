$(document).ready(function() {

	// Rolagem suave ao percorrer menu;
	$(".nav-link").on('click', function(event) {
		if (this.hash !== "") {
			event.preventDefault();
			var hash = this.hash;
			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 900, function(){
				window.location.hash = hash;
			});
		}
	})


	// Configuração do menu fixo.
	$(window).ready(function() {
		if (screen.width < 767) {
			$('.navbar-inverse').attr('data-offset-top', '38');
		}else{
			$('.navbar-inverse').attr('data-offset-top', '160');
		}
	});


	// Loading para o Login;
	$('#form-login').submit(function(event) {
		$('#loading').css({
			position: 'absolute',
			bottom: '5px'
		}).html("<img src='assets/img/loading.gif'>");
	});	


	// Formulário de serviços;
	$('#form-service').submit(function(e) {
		e.preventDefault();
		var form = $(this);
		var post_url = form.attr('action');
		var post_data = form.serialize();								
		$.ajax({
			type: 'POST',
			// dataType: 'json',
			url: post_url, 
			data: post_data,
			success: function(msg) {
				$(form).fadeOut('slow', function() {
					form.html(msg).fadeIn('slow');
				});				
			}

		});
	});



	// Formulário de atualização cadastral;
	$('form-cadUpdate').submit(function(event) {
	});


	// Extender quantidade de serviços;
	$('#Total').change(function(event) {
		var qtd = $(this).val();
		$('#rsqtd').empty().css('display', 'none');		
		var html="";		
		for (var i = 1; i <= qtd; i++) {
			html += "<div class='form-group row'><label for='Placa"+i+"' class='col-sm-4 form-control-label'>Placa "+i+":</label><div class='col-sm-8'><input type='text' class='form-control' id='Placa"+i+"' name='Placa"+i+"' placeholder='AAA-9999' title='Informe Placa do veículo "+i+"' required='required' maxlength='8' minlength='8' onfocus=$('#Placa"+i+"').mask('AAA-9999')></div></div>";
			html += "<div class='form-group row'><label for='Cor"+i+"' class='col-sm-4 form-control-label'>Cor "+i+":</label><div class='col-sm-8'><input type='text' class='form-control' id='Cor"+i+"' name='Cor"+i+"' placeholder='Informe a cor do veículo "+i+"' title='Informe a cor do veículo "+i+"' required='required' maxlength='45' minlength='4'></div></div>";
			html += "<div class='form-group row'><label for='Modelo"+i+"' class='col-sm-4 form-control-label'>Modelo "+i+":</label><div class='col-sm-8'><input type='text' class='form-control' id='Modelo"+i+"' name='Modelo"+i+"' placeholder='Informe o modelo do veículo "+i+"' title='Informe o modelo do veículo "+i+"' required='required' maxlength='45' minlength='4'></div></div>";
			html += "<div class='form-group row'><label for='Tipo"+i+"' class='col-sm-4 form-control-label'>Tipo "+i+":</label><div class='col-sm-8'><select class='form-control' name='Tipo"+i+"' id='Tipo"+i+"' required='required'><option value=''></option><option value='Simples'>Simples</option><option value='Completa'>Completa</option><option value='Lavagem a Seco'>Lavagem a Seco</option><option value='Lavagem de bancos'>Lavagem de bancos</option><option value='Lavagem ecológica'>Lavagem ecológica</option></select></div></div><hr>";
		}
		$('#rsqtd').fadeIn('slow').append(html);		
	});


	// Botão executável para solicitar serviços;
	$('#bt-nservice').click(function(event) {
		$('#bt-service').fadeIn('slow').after("<img id='load01' src='assets/img/loading.gif' style='position: absolute;'>");
		$('.show-nservice').fadeToggle('slow'); //Limpando a tabela
		$('#load01').fadeOut('slow');
	});


	// Botão executavel com listagem de serviços;
	$('#bt-service').click(function(event) {
		$(this).fadeIn('slow').after("<img id='load02' src='assets/img/loading.gif' style='position: absolute;'>");
		$('.show-service').empty().css('display', 'none'); //Limpando a tabela
		$.ajax({
			type:'post',		//Definimos o método HTTP usado
			dataType: 'json',	//Definimos o tipo de retorno
			url: 'App/View/Action.php?action=services',//Definindo o arquivo onde serão buscados os dados
			success: function(dados){
				$('.show-service').fadeIn('slow').append(dados);
				$('#load02').fadeOut();
			},
			error: function(){
				$('#load02').fadeOut();
				$('.show-service').fadeIn('slow').append("<p>OPS! algo deu errado, tente novamente!</p>");
			}		
		});		
	});



});