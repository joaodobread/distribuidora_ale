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
                    <li><a href="./cadastrarFornecedor.php" class="activeLi"><i class="material-icons left">local_shipping</i>Cadastrar Fornecedor</a></li>
                    <li><a href="./cadastrarProduto.php"><i class="material-icons left">edit</i>Cadastrar Produto</a></li>
                    <li><a href="./venda.php"><i class="material-icons left">add_shopping_cart</i>Efetuar Venda</a></li>
                    <li><a href="./estoque.php"><i class="material-icons left">storage</i>Estoque</a></li>
                    <li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
                    <li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
                    <li><a href="./geraGrafico.php?tipo=line"><i class="material-icons left">bar_chart</i>Gráficos</a></li>
                </ul>
            </div>
            <div class="row" style="margin: 2% 2% 0%;">
                <h4 class="center blue-text text-darken-4">Cadastro de Fornecedor</h4>
                <div class="divider black"></div>
                <div class="row"></div>
                <?php
                    include_once("conexao.php");
					if(isset($_GET['editar'])) {
						if(isset($_GET['id'])) {
                            $sql = "select * from fornecedores where idFornecedor=".$_GET['id'];
							$result = mysqli_query($con, $sql);
							if(mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                    echo "<form action='cadastrarFornecedor.php' method='post' class='center'>
                                            <div class='row'>
                                                <div class='input-field col s12 m12 l6 xl6'>
                                                    <input type='text' name='nome' id='nome' value='".$row["nomeFornecedor"]."' required autofocus not null>
                                                    <label for='nome'>Nome</label>
                                                </div>
                                                <div class='input-field col s12 m12 l6 xl6'>
                                                    <input type='tel' name='telefone' id='telefone' value='".$row["telefoneFornecedor"]."' required not null>
                                                    <label for='telefone'>Telefone</label>
                                                </div>
                                                <div class='input-field col s12 m12 l12 xl12'>
                                                    <input type='email' name='email' id='email' value='".$row["emailFornecedor"]."' required not null>
                                                    <label for='email'>Email</label>
                                                </div>
                                            </div>
                                            <input type='hidden' name='editado'>
                                            <input type='hidden' name='id' value='".$row["idFornecedor"]."'>
                                            <button type='submit' class='btn waves-effect waves-light blue darken-4 white-text'>Editar</button>
                                        </form>";
								}
							}
						}
					} else {
						echo "<form action='cadastrarFornecedor.php' method='post' class='center'>
								<div class='row'>
                                    <div class='input-field col s12 m12 l6 xl6'>
                                        <input type='text' name='nome' id='nome' required autofocus not null>
                                        <label for='nome'>Nome</label>
                                    </div>
                                    <div class='input-field col s12 m12 l6 xl6'>
                                        <input type='tel' name='telefone' id='telefone' required not null>
                                        <label for='telefone'>Telefone</label>
                                    </div>
                                    <div class='input-field col s12 m12 l12 xl12'>
                                        <input type='email' name='email' id='email'>
                                        <label for='email'>Email</label>
                                    </div>
								</div>
								<button type='submit' class='btn waves-effect waves-light blue darken-4 white-text'>Cadastrar</button>
							</form>";
					}
                ?>
            </div>
            <div class="row" style="margin: 2% 2% 0%;">
                <h4 class="center blue-text text-darken-4">Fornecedores Cadastrados</h4>
                <div class="divider black"></div>
                <div class="row">
                    <table class="highlight centered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_POST['editado'])) {
                                    $id = $_POST['id'];
                                    $nome = strtoupper($_POST['nome']);
                                    $telefone = strtoupper($_POST['telefone']);
                                    $email = ($_POST['email']);
                                    $sql = "update fornecedor set nomeFornecedor=$nome, telefoneFornecedor=$telefone, emailFornecedor=$email where idFornecedor=$id";
                                    mysqli_query($con, $sql);
                                    echo ("<script>alert('Fornecedor alterado com sucesso!');</script>");
                                } else {
                                    if(isset($_POST['nome'])) {
                                        $telefone = ($_POST['telefone']);
                                        $nomefornecedor = ($_POST['nome']);
                                        $email = ($_POST['email']);
                                        $sql = "select * from fornecedores where telefoneFornecedor = '".$telefone."'";
                                        $result = mysqli_query($con, $sql);
                                        if(mysqli_num_rows($result) > 0){
                                            echo ("<script>alert('Fornecedor já cadastrado');</script>");
                                        }else{
                                            $sql = "insert into fornecedores values(null,'$nomefornecedor','$telefone','$email')";
                                            mysqli_query($con, $sql);
                                            echo ("<script>alert('Fornecedor cadastrado');</script>");
                                        }
                                    }
                                }
                                
                                $sql = "select * from fornecedores";
                                $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                                if(mysqli_num_rows($resultado) > 0) {
                                    while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
                                        echo "<tr>";
                                            echo ("<td>".$row["nomeFornecedor"]."</td>");
                                            echo ("<td>".$row["telefoneFornecedor"]."</td>");
                                            echo ("<td>".$row["emailFornecedor"]."</td>");
                                            echo ("<td><a href='cadastrarFornecedor.php?editar=true&id=".$row['idFornecedor']."' class='btn waves-effect waves-light yellow black-text'><b>Editar</b></a></td>");
                                            echo ("<td><a href='#modal".$row["idFornecedor"]."' class='btn waves-effect waves-light red black-text modal-trigger'><b>Excluir</b></a></td>");
                                        echo "</tr>";
                                        echo "<div id='modal".$row["idFornecedor"]."' class='modal' style='margin-top: 15%; '>
											<div class='modal-content' style='padding:0px;'>
												<div class='row blue darken-4 white-text' style='margin-top:0%; padding-top:1%;'>
													<h4 class='center'>Remover</h4>
												</div>
												<div class='row'><p>Deseja remover o cliente: <b>".$row["nomeFornecedor"]."</b>?</p></div>
											</div>
											<div class='modal-footer' style=''>
												<a href='#!' class='modal-close waves-effect waves-light btn-flat red'><b>Cancelar</b></a>
												<a href='removerCliente.php?id=".$row['idFornecedor']."' class='waves-effect waves-light btn-flat green'><b>Aceitar</b></a>
											</div>
										</div>";
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