<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login</title>
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
						<li>Distribuidora Ale</li>
						<li style='margin-right: 0%; padding: 0px;'><a class='sidenav-close' href='#!' style='padding: 0px;'><i class='material-icons right white-text'>close</i></a></li>
						<li><a href="./admin.php" class="white-text">Administrativo</a></li>
						<li><a href="/logout.php" class="white-text">Sair</a></li>
					</ul>
				</div>
			</nav>
		</header>

		<main>
			<div class="row"></div>
			<div class="row" style="margin: 2% 2% 0%;">
				<h4 class="center blue-text text-darken-4">Painel Administrativo</h4>
				<div class="divider black"></div>
				<div class="row">
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center" >
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">face</i></h2>
							<a href="./cadastrarCliente.php" class="waves-effect waves-light btn blue darken-4 white-text">Cadastrar Cliente</a>
						</div>
					</div>
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center">
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">add_shopping_cart</i></h2>
							<a href="./venda.php" class="waves-effect waves-light btn blue darken-4 white-text darken-2">Efetuar Venda</a>
						</div>
					</div>
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center">
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">edit</i></h2>
							<a href="./cadastroProduto.php" class="waves-effect waves-light btn blue darken-4 white-text darken-2">Cadastrar Produto</a>
						</div>
					</div>
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center">
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">assignment</i></h2>
							<a href="./addEstoque.php" class="waves-effect waves-light btn blue darken-4 white-text darken-2">Adicionar no estoque</a>
						</div>
					</div>
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center">
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">storage</i></h2>
							<a href="./estoque.php" class="waves-effect waves-light btn blue darken-4 white-text darken-2">Estoque</a>
						</div>
					</div>
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center">
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">attach_money</i></h2>
							<a href="./vendasDia.php" class="waves-effect waves-light btn blue darken-4 white-text darken-2">Vendas diárias</a>
						</div>
					</div>
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center">
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">description</i></h2>
							<a href="./imprimir.php" class="waves-effect waves-light btn blue darken-4 white-text darken-2">Relatório De Produtos</a>
						</div>
					</div>
					<div class="col s12 m3 l3 xl3 hoverable" style="padding-bottom:1.5%;">
						<div class="icon-block center">
							<h2 class="center blue-text text-darken-4"><i class="material-icons large">perm_identity</i></h2>
							<a href="./cadastroFuncionario.php" class="waves-effect waves-light btn blue darken-4 white-text darken-2">Adicionar Funcionário</a>
						</div>
					</div>
				</div>
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

		<!--JavaScript at end of body for optimized loading-->
		<script src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<script src="../js/init.js"></script>
	</body>
</html>
        