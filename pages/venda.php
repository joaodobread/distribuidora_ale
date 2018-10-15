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
					<li><a href="./venda.php" class="activeLi"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
					<li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
				</ul>
			</div>
			<div class="row">
				<?php
					include_once("./conexao.php");
					session_start();
					if(isset($_SESSION['itens'])) {
						foreach($_SESSION['itens'] as $produtos => $quantidade) {
							$sql = "select * from produtos where eanProduto=".$produtos;
							$result = mysqli_query($con, $sql);
							$res = mysqli_fetch_array($result);
							if(($res['qtdProduto'] >= 0)&&($res['qtdProduto'] <= 5)) {
								echo "
								<div class='row'></div>
								<div class='alert' style='margin:0% 2% 0%;'>
									<strong>Produto Acabando!</strong> Faça um novo pedido de <strong>".$res['nomeProduto']."</strong> o mais rápido possível.
								</div>
								";
							}
							if(($res['qtdProduto'] >= 6)&&($res['qtdProduto'] <= 10)) {
								echo "
								<div class='row'></div>
								<div class='alert warning' style='margin:0% 2% 0%;'>
									<strong>Produto Acabando!</strong> Faça um novo pedido de <strong>".$res['nomeProduto']."</strong> o mais rápido possível. <b>Ainda resta(m) ".$res['qtdProduto']." unidades!</b>
								</div>
								";
							}
						}
					}
				?>
                <div class="col s12 m12 l12 xl12">
                    <div class="col s12 m6 l6 xl6">
                        <div class="row" style="margin: 2% 2% 0%;">
                            <h4 class="center blue-text text-darken-4">Venda</h4>
                            <div class="divider black"></div>
                            <div class="row"></div>
                            <form action="venda.php" class="center" method="get">
								<div class="row">
									<div class="input-field col s12 m12 l6 xl6">
										<input type="text" name="codigo" id="codigo">
										<label for="codigo">Código</label>
									</div>
									<div class="input-field col s12 m12 l6 xl6">
										<input type="number" min="1" name="quantidade" id="quantidade" required not null>
										<label for="quantidade">Quantidade (UN)</label>
									</div>
									<div class="input-field col s12 m12 l6 xl6">
										<input disabled type="text" name="nome" id="nome" placeholder="Nome">
									</div>
									<div class="input-field col s12 m12 l6 xl6">
										<input type="number" min="0.01" step="0.01" max="2500" name="valor" id="valor" placeholder="Valor">
									</div>
								</div>
								<div class="row">
									<button type="submit" class="btn waves-effect waves-light blue darken-4 white-text center">Adicionar a Lista</button>
								</div>
							</form>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl6">
                        <div class="row" style="margin: 2% 2% 0%;">
                            <h4 class="center blue-text text-darken-4">Lista de Itens</h4>
                            <div class="divider black"></div>
                            <div class="row"></div>
                            <?php
                                error_reporting(0);
                                $total = 0;
                                if(isset($_SESSION['itens'])) {
                                    if(isset($_GET['codigo'])&&isset($_GET['quantidade'])) {
                                        $_SESSION['itens'][$_GET['codigo']] += $_GET['quantidade'];
                                        echo "<table class='centered highlight'>
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Quantidade</th>
                                                        <th>Preço</th>
                                                        <th>Remover</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
                                                    foreach($_SESSION['itens'] as $produtos => $quantidade) {
                                                        $sql = "select * from produtos where eanProduto=".$produtos;
                                                        $result = mysqli_query($con, $sql);
                                                        $res = mysqli_fetch_array($result);
                                                        $total = $total + $quantidade * floatval($res['valorVendaProduto']);
                                                        echo"<tr>
                                                                <td>".$res['nomeProduto']."</td>
                                                                <td>".$quantidade."</td>
                                                                <td>".$res['valorVendaProduto']."</td>
                                                                <td><a href='remover.php?id=".$res['eanProduto']."' class='btn waves-effect waves-light red darken-2 white-text'>Remover</a></td>
                                                            </tr>";
                                                    }
                                            echo "</tbody>
                                        </table>";
                                        echo "<div class='row'></div>
                                            <div class='col s12 m12 l12 xl12 center'>";
                                                echo "<form action='finalizaVenda.php' method='post'>
														<input type='hidden' name='total' value='".$total."'>
														
                                                        <button type='submit' class='btn waves-effect waves-light green darken-2 white-text'>Finalizar Compra</button>
                                                    </form>";
                                            echo "</div>";
                                    } elseif (isset($_SESSION['itens'])) {
                                        if(is_array($_SESSION['itens'])) {
                                            if(empty($_SESSION['itens'])) {
                                                echo "<p>Não possui nenhum item!</p>";
                                            } else {
                                                echo "<table class='centered highlight'>
                                                    <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Quantidade</th>
                                                            <th>Preço</th>
                                                            <th>Remover</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                                    foreach($_SESSION['itens'] as $produtos => $quantidade) {
                                                        $sql = "select * from produtos where eanProduto=".$produtos;
                                                        $result = mysqli_query($con, $sql);
                                                        $res = mysqli_fetch_array($result);
                                                        $total = $total + $quantidade * floatval($res['valorVendaProduto']);
                                                        echo"<tr>
                                                                <td>".$res['nomeProduto']."</td>
                                                                <td>".$quantidade."</td>
                                                                <td>".$res['valorVendaProduto']."</td>
                                                                <td><a href='remover.php?id=".$res['eanProduto']."' class='btn waves-effect waves-light red darken-2 white-text'>Remover</a></td>
                                                            </tr>";
                                                    }
                                                        echo "</tbody>
                                                    </table>";
                                                    echo "<div class='row'></div>
                                                    <div class='col s12 m12 l12 xl12 center'>";
                                                    echo "<form action='finalizaVenda.php' method='post'>
                                                        <input type='hidden' name='total' value='".$total."'>
                                                        <button type='submit' class='btn waves-effect waves-light green darken-2 white-text'>Finalizar Compra</button>
                                                    </form>";
                                                    echo "</div>";
                                            }
                                        }
                                    } else {
                                        echo "<p>Não possui nenhum item!</p>";
                                    }
                                } else {
                                    $_SESSION['itens'] = array();
                                }
                            ?>
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

		<script type='text/javascript'>
			$(document).ready(function(){
				$("input[name='codigo']").blur(function(){
					let $nome_produto = $("input[name='nome']");
					let $valor = $("input[name='valor']");
					$.getJSON('function.php',{ 
						codigo: $(this).val() 
					},function( json ){
						$nome_produto.val( json.nome_produto );
						$valor.val( json.valor );
					});
				});
			});
		</script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<script src="../js/init.js"></script>
	</body>
</html>
        