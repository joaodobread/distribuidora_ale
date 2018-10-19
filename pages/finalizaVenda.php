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
					<li><a href="./cadastrarFornecedor.php"><i class="material-icons left">local_shipping</i>Cadastrar Fornecedor</a></li>
					<li><a href="./cadastrarProduto.php"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
					<li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
					<li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
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
									session_start();
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
											echo "<div class='row blue-text text-darken-4' style='padding:0.3%; '><h5>Total = R$".$_POST['total']."</h5></div>";
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
								<div class="row">
									<div class="input-field col s12 m12 l12 xl12">
										<input type="number" min="0.01" step="0.01" max="2500" name="valorcompra" id="valor" required not null>
										<label for="valor">Valor a ser Pago (R$)</label>
									</div>
									<div class="input-field col s12 m12 l12 xl12">
										<input type="text" id="autocomplete-input" class="autocomplete" name='cliente'>
										<label for="autocomplete-input">Cliente</label>
									</div>
									<div class="col s12 m12 l12 xl12">
										<h6>Forma de Pagamento</h6>
										<p>
											<label>
												<input name="dinheiro" type="radio" checked />
												<span>Dinheiro</span>
											</label>
										</p>
										<p>
											<label>
												<input name="cartao" type="radio" />
												<span>Cartão</span>
											</label>
										</p>
										<p>
											<label>
												<input name="cheque" type="radio"  />
												<span>Cheque</span>
											</label>
										</p>
									</div>
								</div>
								<div class="row center">
									<?php //unset($_SESSION['itens']);?>
									<button type="submit" class="btn waves-effect waves-light green darken-2 white-text">Finalizar Venda</button>
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
