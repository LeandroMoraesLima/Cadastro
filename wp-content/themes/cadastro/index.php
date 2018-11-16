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
			<a href="#" class="brand-logo">Cadastros</a>			
		</div>
	</nav>
</div>

<section class="container">
	<div class="row">
		<form class="col s12" id="frmCadastro">
			<div class="row">
				<div class="input-field col s12">
          			<label class="font" for="first_name">Nome completo (sem abreviações)</label>
					<input id="name" type="text" class="validate">
					<span class="name"></span>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="email" type="email" class="validate">
					<label class="font" for="email">E-mail</label>
					<span class="email"></span>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="cpf" type="text" class="validate cpf">
					<label class="font" for="icon_prefix">CPF</label>
					<span class="cpf"></span>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="phone" type="tel" class="validate">
          			<label class="font" for="icon_telephone">Telefone</label>
          			<span class="phone"></span>
				</div>
			</div>
			<div class="button">
				<input type="submit" value="Cadastrar" id="btnSalvar" class="waves-effect waves-light btn-large"/>
			</div>
		</form>
	</div>
	<div class="row">		
		<table id="tblListar" class="striped responsive-table">
 
    	</table>
    </div>
</section>
        
<script>
	(function($){

	    var operacao = "A"; //"A"=Adição; "E"=Edição
	    var indice_selecionado = -1; //Índice do item selecionado na lista
	    var tbClientes = localStorage.getItem("tbClientes");// Recupera os dados armazenados
	    tbClientes = JSON.parse(tbClientes); // Converte string para objeto
	    //console.log(tbClientes);
	    if(tbClientes == null) // Caso não haja conteúdo, iniciamos um vetor vazio
	    	tbClientes = [];
	    else
	    	Listar();
	
		function Adicionar(){
		    var cliente = JSON.stringify({
		        Nome     : $("#name").val(),
		        Email    : $("#email").val(),
		        CPF      : $("#cpf").val(),
		        Phone : $("#phone").val(),
		    });
		    tbClientes.push(cliente);
		    localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
		    alert("Registro adicionado.");
		    location.reload();
		    return false;
		}
		 
		function Editar(){
		    tbClientes[indice_selecionado] = JSON.stringify({
		            Nome     : $("#name").val(),
			        Email    : $("#email").val(),
			        CPF      : $("#cpf").val(),
			        Phone : $("#phone").val(),
		        });//Altera o item selecionado na tabela
		    localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
		    alert("Informações editadas.")
		    operacao = "A"; //Volta ao padrão
		    return true;
		}
		 
		function Excluir(){
		    tbClientes.splice(indice_selecionado, 1);
		    localStorage.setItem("tbClientes", JSON.stringify(tbClientes));
		    alert("Registro excluído.");
		}
		 
		function Listar(){
		    $("#tblListar").html("");
		    $("#tblListar").html(
		        "<thead>"+
		        "   <tr>"+
		        "   <th></th>"+
		        "   <th>Nome</th>"+
		        "   <th>Cpf</th>"+
		        "   <th>Phone</th>"+
		        "   <th>Email</th>"+
		        "   </tr>"+
		        "</thead>"+
		        "<tbody>"+
		        "</tbody>"
		        );
		    for(var i in tbClientes){
		        var cli = JSON.parse(tbClientes[i]);
		        $("#tblListar tbody").append(
		        	"<tr>"
			        	+"<td>"
			        		+ "<img class='btnEditar' src='<?php echo IMG; ?>/editar.png' alt='"+i+"' height='16' width='16'>"
		        			+ "<img class='btnExcluir' src='<?php echo IMG; ?>/excluir.png' alt='"+i+"' height='16' width='16'>"
		        		+ "</td>"
		        		+ "<td>"+cli.Nome+"</td>"
		        		+ "<td>"+cli.CPF+"</td>"
		        		+ "<td>"+cli.Phone+"</td>"
		        		+ "<td>"+cli.Email+"</td>"
		        	+"</tr>"
		        );
		    }
		}

		function Validar(){
			var error = false;
			var nome  = $("#name").val();
			var email = $("#email").val();
			var cpf   = $("#cpf").val();
			var phone = $("#phone").val();

			if(nome.length < 3){
				error = true;
				$("span.name").html("Campo deve conter 3 caracteres ou mais");
				$("#name").addClass('error');
			}
			else{
				$("span.name").html("");
				$("#name").removeClass('error');
			}

			if(ValidateEmail(email)==false){
				error = true;
				$("span.email").html("Adicione um E-mail valido");
				$("#email").addClass('error');
			}
			else{
				$("span.email").html("");
				$("#email").removeClass('error');
			}

			if(cpf.length < 14){
				error = true;
				$("span.cpf").html("Campo deve conter 14 caracteres");
				$("#cpf").addClass('error');
			}
			else{
				$("span.cpf").html("");
				$("#cpf").removeClass('error');
			}

			if(phone.length < 19){
				error = true;
				$("span.phone").html("Campo deve conter 13 caracteres");
				$("#phone").addClass('error');
			}
			else{
				$("span.phone").html("");
				$("#phone").removeClass('error');
			}

			// alert(email);
			return error;
		}
		 
		$("#frmCadastro").on("submit",function(){

			/*alert(Validar());
			return false;*/
			
			if(Validar()===true){
				console.log("aviso");
				return false;
			}

		    if(operacao == "A"){
		        return Adicionar();
		    }
		    else{
		       return Editar();       
		    }
		});	

		function ValidateEmail(mail) {
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
				return (true)
			}
			return (false)
		}
		 
		$("#tblListar").on("click", ".btnEditar", function(){
		    operacao = "E";
		    indice_selecionado = parseInt($(this).attr("alt"));
		    var cli = JSON.parse(tbClientes[indice_selecionado]);
		    $("#name").val(cli.Nome);

		    $("#email").val(cli.Email);
		    //var p = $("#name").parent('div');
		    //$("label", p).addClass('active');

		    $("#cpf").val(cli.CPF);
		    $("#phone").val(cli.Phone);

		    $("#name").focus();
		});
		 
		$("#tblListar").on("click", ".btnExcluir",function(){
		    indice_selecionado = parseInt($(this).attr("alt"));
		    Excluir();
		    Listar();
		});

		$("#cpf").mask("000.000.000-00");
		$("#phone").mask("(+00) 00 00000-0000");
	})(jQuery);
</script>

</body>
</html>