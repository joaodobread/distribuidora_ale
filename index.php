<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Login</title>
	</head>
	<body>
		<header>
			<nav class="blue darken-4">
				<div class="nav-wrapper">
					<a href="index.php" class="brand-logo center">Distribuidora Ale</a>
				</div>
			</nav>
		</header>

		<main class='bg'>
			<div id="index-banner" class="parallax-container ">
				<div class="section no-pad-bot center-align" style="top: 50%; left: 50%; margin-top:5%;">
					<div class="container">
						<div class="row">
							<div class="col s12 m6 l6 xl6 offset-xl3 offset-l3 grey lighten-3">
								<div class="row blue darken-4">
									<h2 style="margin-top:0%; padding-top:1%;">Login</h2>
								</div>
								<div class="row"></div>
								<form class="col s12 center" method="POST">
									<div class="row">
										<div class="input-field col s12 m12 l12 xl12">
											<i class="material-icons prefix blue-text text-darken-4">account_circle</i>
											<input id="icon_prefix" type="text" class="validate" name="user">
											<label for="icon_prefix">Usuário</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s12 m12 l12 xl12">
											<i class="material-icons prefix blue-text text-darken-4">lock</i>
											<input id="icon_telephone " type="password" class="validate" name="pass">
											<label for="icon_telephone">Senha</label>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m12 l12 xl12">
											<button type="submit" class="btn btn-large waves-effect waves-light blue darken-4" style="border-radius: 500px;">Entrar</button>
										</div>
									</div>
								</form>
							</div>
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

		<?php 
			if(isset($_POST['user'])) {
				include("pages/conexao.php");
				$userlog = $_POST['user'];
				$passlog = $_POST['pass'];
				// $sql = "select * from usuarios where loginUsuario='".$userlog."' and senhaUsuario='".sha1($passlog)."' limit 1;";
				$sql = "select * from usuarios where loginUsuario='".$userlog."' and senhaUsuario='".($passlog)."' limit 1;";
				$result = mysqli_query($con,$sql);
				$numrow = mysqli_num_rows($result);
				$field = $result->fetch_array();
				// $shasenha = sha1($passlog);
				$shasenha = ($passlog);
				$usuario = $field['loginUsuario'];
				$senhausuario = $field['senhaUsuario'];
				if ($usuario == $userlog && $senhausuario == $shasenha){
					echo "entrou";
					session_start();
					$_SESSION['login'] = true;
					$_SESSION['loginUsuario'] = $field['nomeUsuario'];
					$_SESSION['cargo'] = $field['cargoUsuario'];
					$_SESSION['id'] = $field['idUsuarios'];
					if ($_SESSION['cargo'] === "VENDEDOR") {
						header("location: pages/func.php");
					} else {
						header("location: pages/admin.php");
					}
				}
				mysqli_close($con);
			}
		?>

		<!--JavaScript at end of body for optimized loading-->
		<script src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script src="js/init.js"></script>
	</body>
</html>
        