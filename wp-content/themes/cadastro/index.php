<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>

	<?php wp_head(); ?>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo CSS; ?>/app.css?v=2">
</head>
<body>

<div class="header">
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">Logo</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="sass.html">Sass</a></li>
				<li><a href="badges.html">Components</a></li>
				<li><a href="collapsible.html">JavaScript</a></li>
			</ul>
		</div>
	</nav>
</div>

<section class="container">
	<div class="row">
		<form class="col s12" id="frmCadastro">
			<div class="row">
				<div class="input-field col s12">
					<input id="first_name" type="text" class="validate">
          			<label class="font" for="first_name">Nome completo (sem abreviações)</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="email" type="email" class="validate">
					<label class="font" for="email">E-mail</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="cpf" type="text" class="validate cpf">
					<label class="font" for="icon_prefix">CPF</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="icon_telephone" type="tel" class="validate">
          			<label class="font" for="icon_telephone">Telefone</label>
				</div>
			</div>
			<div class="button">
				<input type="submit" value="Cadastrar" class="waves-effect waves-light btn-large"/>
			</div>
		</form>
	</div>
	
</section>
        
<script>
	(function($){
		$(".cpf").mask("000.000.000-00");

		$("#frmCadastro").on("submit",function(){
		    alert('leandro'); 
		    return false;     
		});

	})(jQuery);
</script>

</body>
</html>