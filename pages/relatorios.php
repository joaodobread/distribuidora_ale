<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Distribuidora Ale</title>
		<style>
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
            }
            
            .alert.warning {
                background-color: #ff9800;
            }

            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }
		</style>
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
                        <li class="subheader white-text center">Menu</li>
						<li style='margin-right: 0%; padding: 0px;'><a class='sidenav-close' href='#!' style='padding: 0px;'><i class='material-icons right white-text'>close</i></a></li>
						<li><a class="white-text" href="./addEstoque.php"><i class="material-icons white-text left">assignment</i>Adicionar ao Estoque</a></li>
                        <li><a class="white-text" href="./cadastrarCliente.php"><i class="material-icons white-text left">face</i>Cadastrar Cliente</a></li>
                        <li><a class="white-text" href="./cadastrarFornecedor.php" class="activeLi"><i class="material-icons white-text left">local_shipping</i>Cadastrar Fornecedor</a></li>
                        <li><a class="white-text" href="./cadastrarProduto.php"><i class="material-icons white-text left">edit</i>Cadastrar Produto</a></li>
                        <li><a class="white-text" href="./venda.php"><i class="material-icons white-text left">add_shopping_cart</i>Efetuar Venda</a></li>
                        <li><a class="white-text" href="./estoque.php"><i class="material-icons white-text left">storage</i>Estoque</a></li>
                        <li><a class="white-text" href="./relatorios.php"><i class="material-icons white-text left">description</i>Relatório De Produtos</a></li>
                        <li><a class="white-text" href="./cadastrarDespesa.php"><i class="material-icons white-text left">attach_money</i>Despesas</a></li>
                        <li><a class="white-text" href="./geraGrafico.php?tipo=line"><i class="material-icons white-text left">bar_chart</i>Gráficos</a></li>
						<li><a class="white-text" href="./admin.php" class="white-text">Administrativo</a></li>
						<li><a class="white-text" href="./logout.php" class="white-text">Sair</a></li>
					</ul>
				</div>
			</nav>
		</header>

		<main>
            <div class="row">
				<ul id="sidenav-1" class="sidenav sidenav-fixed grey lighten-5">
					<li class="subheader white-text center">Menu</li>
					<div class="row"></div>
					<li><a href="./addEstoque.php"><i class="material-icons left">assignment</i>Adicionar ao Estoque</a></li>
					<li><a href="./cadastrarCliente.php"><i class="material-icons left">face</i>Cadastrar Cliente</a></li>
					<li><a href="./cadastrarFornecedor.php"><i class="material-icons left">local_shipping</i>Cadastrar Fornecedor</a></li>
					<li><a href="./cadastrarProduto.php"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
					<li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
					<li><a href="./relatorios.php" class="activeLi"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
					<li><a href="./geraGrafico.php?tipo=line"><i class="material-icons left">bar_chart</i>Gráficos</a></li>
				</ul>
			</div>
		    <div class="row" style="margin: 2% 2% 0%;">
                <h4 class="center blue-text text-darken-4">Cadastro de produtos</h4>
                <div class="divider black"></div>
				<div class="row"></div>
				
				<div id="chartContainer" style="height: 400px; width: 100%;"></div>
				
				
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
		
		<script src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<script src="../js/init.js"></script>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</body>
</html>
        