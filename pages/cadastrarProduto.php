<?php 
include_once("conexao.php");
?>
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
						<li>Distribuidora Ale</li>
						<li style='margin-right: 0%; padding: 0px;'><a class='sidenav-close' href='#!' style='padding: 0px;'><i class='material-icons right white-text'>close</i></a></li>
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
					<li><a href="./cadastrarProduto.php" class="activeLi"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
					<li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
                    <li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
                    <li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
					<!-- <li><a href="./vendasDiarias.php"><i class="material-icons left">attach_money</i>Vendas diárias</a></li> -->
					<!-- <li><a href=""><i class="material-icons left">perm_identity</i>Adicionar Funcionário</a></li> -->
				</ul>
			</div>
		    <div class="row" style="margin: 2% 2% 0%;">
                <h4 class="center blue-text text-darken-4">Cadastro de produtos</h4>
                <div class="divider black"></div>
                <div class="row"></div>
                <form action="cadastrarProduto.php" method="post" class="center">
                    <div class="row">
                        <div class="input-field col s12 m12 l6 xl6">
                            <input type="text" name="codigo" id="codigo" required autofocus not null>
                            <label for="codigo">Código</label>
                        </div>
                        <div class="input-field col s12 m12 l6 xl6">
                            <input type="text" name="nome" id="nome" required not null>
                            <label for="nome">Nome</label>
                        </div>
                        <div class="input-field col s12 m4 l4 xl4">
                            <input type="number" min="1" name="quantidade" id="quantidade" required not null>
                            <label for="quantidade">Quantidade (UN)</label>
                        </div>
                        <div class="input-field col s12 m4 l4 xl4">
                            <input type="number" min="0.01" step="0.01" max="2500" name="valorcompra" id="valor" required not null>
                            <label for="valor">Preço de compra (R$)</label>
                        </div>
                        <div class="input-field col s12 m4 l4 xl4">
                            <input type="number" min="0.01" step="0.01" max="2500" name="valorvenda" id="valor" required not null>
                            <label for="valor">Preço de venda (R$)</label>
                        </div>
                        <div class="input-field col s12 m12 l12 xl12">
                            <select name='fornecedor'>
                                <option value="" disabled selected>Selecione um dos fornecedores</option>
                                <?php
                                    $select = "select * from fornecedores";
                                    $resultf = mysqli_query($con, $select);
                                    while($rowf = mysqli_fetch_array($resultf,MYSQLI_ASSOC)) {
                                        echo("
                                             <option value='".$rowf['idFornecedor']."'>".$rowf['nomeFornecedor']."</option>
                                            ");
                                            
                                    }
                                ?>
                            </select>
                            <label>Fornecedor</label>
                        </div>
                    </div>
                    <button type="submit" class="btn waves-effect waves-light blue white-text darken-4 center">Cadastrar</button>
                </form>
            </div>
            <div class="row" style="margin: 2% 2% 0%;">
                <h4 class="center blue-text text-darken-4">Produtos Cadastrados</h4>
                <div class="divider black"></div>
                <div class="row">
                    <table class="highlight centered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Fornecedor</th>
                                <th>Nome</th>
                                <th>Quantidade em estoque</th>
                                <th>Valor de Compra</th>
                                <th>Valor de Venda</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_POST['nome'])) {
                                    $codigoean = strtoupper($_POST['codigo']);
                                    $nomeproduto = strtoupper($_POST['nome']);
                                    $quantidade = strtoupper($_POST['quantidade']);
                                    $valorcompra = strtoupper($_POST['valorcompra']);
                                    $valorvenda = strtoupper($_POST['valorvenda']);
                                    $fornecedor = strtoupper($_POST['fornecedor']);
                                    //verifica se existe ean cadastrados no banco
                                    $sql = "select * from produtos where eanProduto = '".$codigoean."'";
                                    $result = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($result) > 0){
                                        echo ("<script>alert('Produto já cadastrado');</script>");
                                    }else{
                                        $sql = "insert into produtos values(null,$fornecedor,'$codigoean','$nomeproduto',$valorcompra,$valorvenda,$quantidade)";
                                        // echo $sql;
                                        mysqli_query($con, $sql);
                                        echo ("<script>alert('Produto cadastrado');</script>");
                                    }
                                }
                                $sql = "select produtos.eanProduto, produtos.idFornecedor, produtos.idProduto, produtos.nomeProduto, produtos.qtdProduto, produtos.valorCompraProduto, produtos.valoVendaProduto, fornecedores.nomeFornecedor from produtos inner join fornecedores on fornecedores.idFornecedor = produtos.idFornecedor order by produtos.nomeProduto asc";
                                $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                                if(mysqli_num_rows($resultado) > 0) {
                                    while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
                                        echo "<tr>";
                                            echo ("<td>".$row["eanProduto"]."</td>");
                                            echo ("<td>".$row["nomeFornecedor"]."</td>");
                                            echo ("<td>".$row["nomeProduto"]."</td>");
                                            echo ("<td>".$row["qtdProduto"]."</td>");
                                            echo ("<td>".$row["valorCompraProduto"]."</td>");
                                            echo ("<td>".$row["valoVendaProduto"]."</td>");
                                            echo ("<td><a href='' class='btn waves-effect waves-light yellow black-text'><b>Editar</b></a></td>");
                                            echo ("<td><a href='' class='btn waves-effect waves-light red black-text'><b>Excluir</b></a></td>");
                                            echo "</tr>";
                                    }
                                } 
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
        