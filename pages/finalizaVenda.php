<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
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
						<li><a class="white-text" href="./vendaDiaria.php"><i class="material-icons left">bar_chart</i>Venda Diária</a></li>
						<li><a class="white-text" href="./logout.php" class="white-text">Sair</a></li>
					</ul>
				</div>
			</nav>
		</header>

        <main>
			<div class="row">
				<ul id="sidenav-1" class="sidenav sidenav-fixed">
					<li class="subheader white-text center">Menu</li>
					<div class="row"></div>
					<li><a href="./addEstoque.php"><i class="material-icons left">assignment</i>Adicionar ao Estoque</a></li>
					<li><a href="./cadastrarCliente.php"><i class="material-icons left">face</i>Cadastrar Cliente</a></li>
					<li><a href="./cadastrarFornecedor.php"><i class="material-icons left">local_shipping</i>Cadastrar Fornecedor</a></li>
					<li><a href="./cadastrarProduto.php"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
					<li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
					<li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
					<li><a href="./geraGrafico.php?tipo=line"><i class="material-icons left">bar_chart</i>Gráficos</a></li>
					<li><a href="./vendaDiaria.php"><i class="material-icons left">bar_chart</i>Venda Diária</a></li>
				</ul>
			</div>
            <div class="row">
                <div class="col s12 m12 l12 xl12">
					<div class="row" style="margin: 2% 2% 0%;">
						<h4 class="center blue-text text-darken-4">Finalizar Venda</h4>
						<div class="divider black"></div>
						<div class="row"></div>
						<div class="col s12 m12 l12 xl12">
							<form action="finalizaVenda.php" method="post">
								<?php
									include_once("./conexao.php");
									if(isset($_POST['total'])) {
										echo "<table class='centered highlight'>
													<thead>
														<tr>
															<th>Código</th>
															<th>Quantidade</th>
														</tr>
													</thead>
													<tbody>";
														foreach ($_SESSION['itens'] as $produto => $quantidade) {
															// $sql = "insert into venda values (null, '".$produto."', '".$_SESSION['id']."','".$quantidade."','".date("Y-m-d")."')";
															// $exec = true;
															// $query = mysqli_query($con, $sql);
															echo "<tr>
																	<td>".$produto."</td>
																	<td>".$quantidade."</td>
																</tr>";
															// if($query) {
															// 	$exec = true;
															// } else {
															// 	$exec = false;
															// }
														
															// $sql = "update produtos set qtdProduto = qtdProduto-$quantidade where eanProduto=$produto";
															// $query = mysqli_query($con, $sql);
														}
													echo "</tbody>
												</table>";
											echo "<div class='row blue-text text-darken-4 right' style='padding:0.3%; '>
													<h5>Total = R$".$_POST['total']."</h5>
												</div>";
										// if($exec) {
										// 	echo "<script>alert('Venda realizada com sucesso!')</script>";
										// }
									} else {
										// if (isset($_POST['cliente'])) {
										// 	$sql = "select idClientes from clientes where nomeCliente like ".$_POST['cliente'];
										// 	$id = mysqli_query($con, $sql);
										// 	foreach ($_SESSION['itens'] as $produto => $quantidade) {
										// 		$sql = "insert into venda values (null,'".$id."', '".$produto."', '".$quantidade."',".$_SESSION['id']."','".date("Y-m-d")."')";
										// 		$exec = true;
										// 		$query = mysqli_query($con, $sql);
										// 		echo "<tr>
										// 				<td>".$produto."</td>
										// 				<td>".$quantidade."</td>
										// 			</tr>";
										// 		if($query) {
										// 			$exec = true;
										// 		} else {
										// 			$exec = false;
										// 		}
											
										// 		$sql = "update produtos set qtdProduto = qtdProduto-$quantidade where eanProduto=$produto";
										// 		$query = mysqli_query($con, $sql);
										// 	}
										// }
									}
								?>
								<div class="row"></div>
								<h5 class="blue-text text-darken-4">Cliente</h5>
								<div class="divider black"></div>
								<div class="input-field col s12 m12 l12 xl12">
									<input type="text" id="autocomplete-input" class="autocomplete" name='cliente'>
									<label for="autocomplete-input">Cliente</label>
								</div>
								<h5 class='blue-text text-darken-4'>Forma de Pagamento</h5>
								<div class="divider black"></div>
								<ul id="tabs-swipe-demo" class="tabs tabs-fixed-width tab-demo">
									<li class="tab col s12 m12 l12 xl12"><a href="#test1">Dinheiro</a></li>
									<li class="tab col s12 m12 l12 xl12"><a class="active" href="#test2">Cartão</a></li>
									<li class="tab col s12 m12 l12 xl12"><a href="#test3">Cheque</a></li>
								</ul>
								<div id="test1" class="col s12 m12 l12 xl12">
									<h5 class='blue-text text-darken-4 tab-text'>Dinheiro</h5>
									<div class="divider black"></div>
									<div class="input-field s12 m12 l12 xl12">
										<input type="number" min="0.01" step="0.01" max="2500" name="valorcompra" id="valor" required not null>
										<label for="valor">Valor da Entrada (R$)</label>
									</div>
									<div class="row center">
										<button type="submit" class="btn waves-effect waves-light green darken-2 white-text">Finalizar Venda</button>
									</div>
								</div>
								<div id="test2" class="col s12 m12 l12 xl12">
									<h5 class='blue-text text-darken-4 tab-text'>Cartão</h5>
									<div class="divider black"></div>
									<div class="input-field s12 m12 l12 xl12">
										<input type="number" min="0.01" step="0.01" max="2500" name="valorcompra" id="valor" required not null>
										<label for="valor">Valor da Entrada (R$)</label>
									</div>
									<div class="row center">
										<button type="submit" class="btn waves-effect waves-light green darken-2 white-text">Finalizar Venda</button>
									</div>
								</div>
								<div id="test3" class="col s12 m12 l12 xl12">
									<h5 class='blue-text text-darken-4 tab-text'>Cheque</h5>
									<div class="divider black"></div>
									<div class="input-field s12 m12 l12 xl12">
										<input type="number" min="0.01" step="0.01" max="2500" name="valorcompra" id="valor" required not null>
										<label for="valor">Valor da Entrada (R$)</label>
									</div>
									<div class="row center">
										<button type="submit" class="btn waves-effect waves-light green darken-2 white-text">Finalizar Venda</button>
									</div>
								</div>
								
							</form>
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

		<script>
			$(document).ready(function(){
				$('input.autocomplete').autocomplete({
					data: {
						<?php
							$sql = "select * from clientes";
							$resultf = mysqli_query($con, $sql);
							while($rowf = mysqli_fetch_array($resultf,MYSQLI_ASSOC)) {
								$valor = (string)$rowf['nomeCliente'];
								echo ($valor.": null,");
							}
							echo ("'': null");
						?>
					},
				});
			});
		</script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<script src="../js/init.js"></script>
    </body>
</html>
