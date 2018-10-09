<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
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
					<li><a href="./addEstoque.php"><i class="material-icons left">assignment</i>Adicionar ao Estoque</a></li>
					<li><a href="./cadastrarCliente.php"><i class="material-icons left">face</i>Cadastrar Cliente</a></li>
					<li><a href="./cadastroProduto.php"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
					<li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php" class="activeLi"><i class="material-icons left">storage</i>Estoque</a></li>
					<!-- <li><a href="./vendasDiarias.php"><i class="material-icons left">attach_money</i>Vendas diárias</a></li> -->
					<li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<!-- <li><a href=""><i class="material-icons left">perm_identity</i>Adicionar Funcionário</a></li> -->
				</ul>
			</div>
			<div class="row" style="margin: 2% 2% 0%;">
				<h4 class="center blue-text text-darken-4">Estoque</h4>
				<div class="divider black"></div>
				<div class="row"></div>
				<div class="row">
					<table class="highlight centered">
						<thead>
							<tr>
								<th>Fornecedor</th>
								<th>Código</th>
								<th>Nome</th>
								<th>Quantidade</th>
								<th>Valor de Compra</th>
								<th>Valor de Venda</th>
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$total = 0;
								include_once("conexao.php");
								// $sql = "select * from produtos order by produtos.nomeProduto asc";
                                $sql = "select produtos.eanProduto, produtos.idFornecedor, produtos.idProduto, produtos.nomeProduto, produtos.qtdProduto, produtos.valorCompraProduto, produtos.valoVendaProduto, fornecedores.nomeFornecedor from produtos inner join fornecedores on fornecedores.idFornecedor = produtos.idFornecedor order by produtos.nomeProduto asc";							
								$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
								if(!isset($_POST['nomeProduto']) || $nome == '' ){
									if(mysqli_num_rows($resultado) > 0) {
										// $cargo = $_SESSION['cargo'];
										while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
											echo "<tr>";
												echo ("<td>".$row["nomeFornecedor"]."</td>");
												echo ("<td>".$row["eanProduto"]."</td>");
												echo ("<td>".$row["nomeProduto"]."</td>");
												echo ("<td>".$row["qtdProduto"]."</td>");
												echo ("<td>".$row["valorCompraProduto"]."</td>");
												echo ("<td>".$row["valoVendaProduto"]."</td>");
												// if($_SESSION['cargo'] != "VENDEDOR"){
													echo ("<td><a href='editarProduto.php?id=".$row["idProduto"]."' class='btn waves-effect waves-light yellow black-text'>Editar</a></td>");
								           			echo ("<td><a href='deletarProduto.php?id=".$row["idProduto"]."' class='btn waves-effect waves-light red black-text'>Exluir</a></td>");
												// }
											echo "</tr>";
											$total = $total + $row["valorCompraProduto"];
										}
										echo ("<tr><td>Valor total: ".$total."</td></tr>");
									} 
								}
								// else{
								// 	$nome = $_POST['nomeproduto'];
								// 	$sql = "select * from produtos where nomeproduto like '%".$nome."%' order by nomeproduto asc ";
								// 	$resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
								// 	if(mysqli_num_rows($resultado) > 0) {
								// 		$cargo = $_SESSSION['cargo'];
								// 		while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
								// 			echo "<tr>";
								// 				echo ("<td>".$row["codigoean"]."</td>");
								// 				echo ("<td>".$row["nomeproduto"]."</td>");
								// 				echo ("<td>".$row["quantidadeproduto"]."</td>");
								// 				echo ("<td>".$row["precocompraproduto"]."</td>");
								// 				echo ("<td>".$row["precovendaproduto"]."</td>");
								// 				if($_SESSION['cargo'] != "VENDEDOR"){
								// 					echo ("<td><a href='editarProduto.php?id=".$row["idprodutos"]."' class='btn waves-effect waves-light yellow black-text'>Editar</a></td>");
								//            			echo ("<td><a href='deletarProduto.php?id=".$row["idprodutos"]."' class='btn waves-effect waves-light red black-text'>Exluir</a></td>");
								// 				}
								// 			echo "</tr>";
								// 		}
								// 	} 
								// }
								mysqli_close($con);
							?>
						</tbody>
					</table>
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
		
		<script src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<script src="../js/init.js"></script>
	</body>
</html>
        