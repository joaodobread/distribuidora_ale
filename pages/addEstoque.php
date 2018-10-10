<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="../js/jquery.js"></script>
		<title>Distribuidora Ale</title>
	</head>
	<body>
		<header>
			<nav class="blue darken-4">
				<div class="nav-wrapper">
					<a  class="brand-logo center white-text" href="#" style="margin-top: 0%;">Distribuidora Ale</a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons white-text">menu</i></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right:5%;">
						<li><a href="./admin.php" class="white-text">Administrativo</a></li>
						<li><a href="./logout.php" class="white-text">Sair</a></li>
					</ul>
					<ul class="sidenav grey darken-4" id="mobile-demo">
						<li class="center">Distribuidora Ale</li>
						<li><a href="./admin.php" class="white-text">Administrativo</a></li>
						<li><a href="./logout.php" class="white-text">Sair</a></li>
					</ul>
				</div>
			</nav>
		</header>

		<main>
			<div class="row">
				<ul id="sidenav-1" class="sidenav sidenav-fixed grey lighten-5">
					<li><a class="subheader blue darken-4 white-text">Menu</a></li>
					<div class="row"></div>
					<li><a href="./addEstoque.php" class="activeLi"><i class="material-icons left">assignment</i>Adicionar ao Estoque</a></li>
					<li><a href="./cadastrarCliente.php"><i class="material-icons left">face</i>Cadastrar Cliente</a></li>
					<li><a href="./cadastrarFornecedor.php"><i class="material-icons left">local_shipping</i>Cadastrar Fornecedor</a></li>
					<li><a href="./cadastrarProduto.php"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
					<li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
					<li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
					<!-- <li><a href="./vendasDiarias.php"><i class="material-icons left">attach_money</i>Vendas diárias</a></li> -->
					<!-- <li><a href=""><i class="material-icons left">perm_identity</i>Adicionar Funcionário</a></li> -->
				</ul>
			</div>
			<div class="row" style="margin: 2% 2% 0%;">
				<h4 class="center blue-text text-darken-4">Inserir no estoque</h4>
				<div class="divider black"></div>
				<div class="row"></div>
				<form action="addEstoque.php" method="post" class="center">
					<div class="row">
						<div class='input-field col s12 m12 l6 xl6'>
							<input type='text' name='codigo' id='codigo' required autofocus not null>
							<label for='codigo'>Código</label>
						</div>
						<div class='input-field col s12 m12 l6 xl6'>
							<input type='number' min="0.01" step="0.01" max="2500" name='valorvenda' id='valorvenda' required  not null>
							<label for='valorvenda'>Preço de venda</label>
						</div>
						<div class='input-field col s12 m12 l6 xl6'>
							<input type='number' min="0.01" step="0.01" max="2500" name='valorcompra' id='valorcompra' required  not null>
							<label for='valorcompra'>Preço de compra</label>
						</div>
						<div class='input-field col s12 m12  l6 xl6'>
							<input type='number' min='1' name='quantidade' id='quantidade' required not null>
							<label for='quantidade'>Quantidade (UN)</label>
						</div>
						<div class='input-field col s12 m12 l12 xl12'>
							<input disabled type='text' name='nome' id='nome' placeholder="Nome">
							<!-- <label for='nome'>Nome</label> -->
						</div>
					</div>
					<button type="submit" class="btn waves-effect waves-light blue darken-4 white-text">Inserir</button>
				</form>
            </div>
		</main>

		<footer class="page-footer blue darken-4 hide-on-small-only">
			<div class="row container">
				<div class="left">
					Made by: <b>LG Informática</b>
				</div>
				<div class="right">
					Copyright © 2018 - Todos os direitos reservados.
				</div>
			</div>
		</footer>
		
		
		
		<script type='text/javascript'>
			$(document).ready(function(){
				$("input[name='codigo']").blur(function(){
					let $nome_produto = $("input[name='nome']");
					let $valor = $("input[name='valorvenda']");
					let $valorc = $("input[name='valorcompra']");
					console.log($valor, $valorc);
					$.getJSON('function.php',{ 
						codigo: $(this).val() 
					},function( json ){
						$nome_produto.val( json.nome_produto );
						$valor.val( json.valor );
						$valorc.val( json.valorc );
					});
				});
			});
		</script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<script src="../js/init.js"></script>
	</body>
</html>
        