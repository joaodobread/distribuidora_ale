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
					<li><a href="./cadastrarCliente.php" class="activeLi"><i class="material-icons left">face</i>Cadastrar Cliente</a></li>
					<li><a href="./cadastrarFornecedor.php"><i class="material-icons left">local_shipping</i>Cadastrar Fornecedor</a></li>
					<li><a href="./cadastrarProduto.php"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
					<li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
					<li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
					<li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
					<li><a href="./geraGrafico.php?tipo=line"><i class="material-icons left">bar_chart</i>Gráficos</a></li>
				</ul>
			</div>
			<div class="row" style="margin: 2% 2% 0%;">
				<h4 class="center blue-text text-darken-4">Cadastrar Cliente</h4>
				<div class="divider black"></div>
				<div class="row"></div>
				<form action="cadastrarCliente.php" method="post" class="center">
					<div class="row">
						<div class="input-field col s12 m12 l6 xl6">
							<input type="text" name="nome" id="nome" required not null>
							<label for="nome">Nome</label>
						</div>
						<div class="input-field col s12 m12 l6 xl6">
							<input type="text" name="telefone" id="telefone" required not null>
							<label for="telefone">Telefone</label>
						</div>
						<div class="input-field col s12 m12 l12 xl12">
							<input type="email" name="email" id="email" >
							<label for="email">Email</label>
						</div>
						<div class="input-field col s12 m12 l12 xl12">
							<input type="text" name="endereco" id="endereco">
							<label for="endereco">Endereço</label>
						</div>
					</div>
					<button type="submit" class="btn waves-effect waves-light blue darken-4 white-text">Cadastrar</button>
				</form>
			</div>
			<div class="row" style="margin: 2% 2% 0%;">
                <h4 class="center blue-text text-darken-4">Clientes Cadastrados</h4>
                <div class="divider black"></div>
                <div class="row">
                    <table class="highlight centered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
								<th>Email</th>
								<th>Endereço</th>
								<th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once("conexao.php");
                                if(isset($_POST['nome'])) {
                                    $nome = strtoupper($_POST['nome']);
                                    $telefone = strtoupper($_POST['telefone']);
                                    $email = ($_POST['email']);
                                    $endereco = strtoupper($_POST['endereco']);
                                    //verifica se existe ean cadastrados no banco
                                    $sql = "select * from clientes where emailCliente = '".$email."'";
                                    $result = mysqli_query($con, $sql);
                                    if(mysqli_num_rows($result) > 0){
                                        echo ("<script>alert('Cliente já cadastrado');</script>");
                                    }else{
                                        $sql = "insert into clientes values(null,'$nome','$telefone','$email','$endereco')";
										// echo $sql;
										mysqli_query($con, $sql);
                                        echo ("<script>alert('Cliente cadastrado');</script>");
                                    }
                                }
                                $sql = "select * from clientes order by clientes.nomeCliente asc";
                                $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                                if(mysqli_num_rows($resultado) > 0) {
                                    while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
                                        echo "<tr>";
                                            // echo ("<td>".$row["idClientes"]."</td>");
                                            echo ("<td>".$row["nomeCliente"]."</td>");
                                            echo ("<td>".$row["telefoneCliente"]."</td>");
                                            echo ("<td>".$row["emailCliente"]."</td>");
                                            echo ("<td>".$row["enderecoCliente"]."</td>");
                                            echo ("<td><a href='' class='btn waves-effect waves-light yellow black-text'><b>Editar</b></a></td>");
                                            echo ("<td><a href='removerCliente.php?id=".$row["idClientes"]."' class='btn waves-effect waves-light red black-text'><b>Excluir</b></a></td>");
                                        echo "</tr>";
                                    }
                                } 
                                // mysqli_close($con);
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