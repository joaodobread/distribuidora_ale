<?php
	include("conexao.php");
	if(isset($_GET['tipo'])) {
		$grafico = $_GET['tipo'];
	} else {
		$grafico = 'line';
	}
	$ano = 2018;
	$vendido = array();
	for($i = 0; $i < 12; $i++){
			$sql = "select sum(total) from venda where (MONTH(dataVenda) = $i+1 and YEAR(dataVenda) = $ano )";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result);
			$vendido[$i] = $row['sum(total)'];
			if($vendido[$i] == '' or $vendido[$i] == Null){
				$a = 0;
				$vendido[$i]=$a;
			}else{
				$vendido[$i] = $row['sum(total)'];
			}
	}
	$despesas = array();
	for($i = 0; $i < 12; $i++){
		$sql = "select sum(valorDespesa) from despesas where (MONTH(dataVencimento) = $i+1 and YEAR(dataVencimento) = $ano);";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result);
		$despesas[$i] = $row['sum(valorDespesa)'];
		if($despesas[$i] == '' or $despesas[$i] == Null){
			$a = 0;
			$despesas[$i]=$a;
		}else{
			$despesas[$i] = $row['sum(valorDespesa)'];
		}
	}
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
			#corpo{
				height: 500px;
			}
		</style>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load("current", {packages:['corechart','line']});
			google.charts.setOnLoadCallback(drawChart);

			function drawChart() {
				var dataLine = new google.visualization.DataTable();
				dataLine.addColumn('string', 'Mês');
				dataLine.addColumn('number', 'Valor vendido em R$');
				dataLine.addColumn('number', 'Despesa em R$');
				dataLine.addColumn('number', 'Lucro em R$');

				dataLine.addRows([
					["Janeiro",   <?php echo ($vendido[0]); ?>, <?php echo($despesas[0]); ?> , <?php echo(($vendido[0]-$despesas[0])); ?>],
					["Feveiro",   <?php echo ($vendido[1]); ?>, <?php echo($despesas[1]); ?> , <?php echo(($vendido[1]-$despesas[1])); ?>],
					["Março",     <?php echo ($vendido[2]); ?>, <?php echo($despesas[2]); ?> , <?php echo(($vendido[2]-$despesas[2])); ?>],
					["Abril",     <?php echo ($vendido[3]); ?>, <?php echo($despesas[3]); ?> , <?php echo(($vendido[3]-$despesas[3])); ?>],
					["Maio",      <?php echo ($vendido[4]); ?>, <?php echo($despesas[4]); ?> , <?php echo(($vendido[4]-$despesas[4])); ?>],
					["Junho",     <?php echo ($vendido[5]); ?>, <?php echo($despesas[5]); ?> , <?php echo(($vendido[5]-$despesas[5])); ?>],
					["Julho",     <?php echo ($vendido[6]); ?>, <?php echo($despesas[6]); ?> , <?php echo(($vendido[6]-$despesas[6])); ?>],
					["Agosto",    <?php echo ($vendido[7]); ?>, <?php echo($despesas[7]); ?> , <?php echo(($vendido[7]-$despesas[7])); ?>],
					["Setembro",  <?php echo ($vendido[8]); ?>, <?php echo($despesas[8]); ?> , <?php echo(($vendido[8]-$despesas[8])); ?>],
					["Outubro",   <?php echo ($vendido[9]); ?>, <?php echo($despesas[9]); ?> , <?php echo(($vendido[9]-$despesas[9])); ?>],
					["Novembro",  <?php echo ($vendido[10]); ?>, <?php echo($despesas[10]); ?> , <?php echo($vendido[10]-$despesas[10]); ?>],
					["Dezembro",  <?php echo ($vendido[11]); ?>, <?php echo($despesas[11]); ?> , <?php echo($vendido[11]-$despesas[11]); ?>]
				]);

				var optionsLine = {
					chart: {
						title: 'Valor de vendas, despesas e lucro por meses do ano.',
						subtitle: 'Em reais (R$)'
					},
					width: '100%',
					height: 500,
					axes: {
						x: {
							0: {side: 'bottom'}
						}
					},
					legend: { position: "bottom" },				
					colors: ['#0D47A1', 'd0181e','#2E7D32']
				};

				var chartLine = new google.charts.Line(document.getElementById('corpo'));

				var data_column = google.visualization.arrayToDataTable([
					["Meses", "Valor das vendas R$", { role: "style" } ,'Valor das despesas R$',{role:"style"}, 'Lucro em R$', {role: "style"} ],
					["Janeiro",   <?php echo ($vendido[0]); ?>, "#0D47A1", <?php echo($despesas[0]); ?> ,'#d0181e', <?php echo(($vendido[0]-$despesas[0])); ?>,'#2E7D32'],
					["Feveiro",   <?php echo ($vendido[1]); ?>, "#0D47A1", <?php echo($despesas[1]); ?> ,'#d0181e', <?php echo(($vendido[1]-$despesas[1])); ?>,'#2E7D32'],
					["Março",     <?php echo ($vendido[2]); ?>, "#0D47A1", <?php echo($despesas[2]); ?> ,'#d0181e', <?php echo(($vendido[2]-$despesas[2])); ?>,'#2E7D32'],
					["Abril",     <?php echo ($vendido[3]); ?>, "#0D47A1", <?php echo($despesas[3]); ?> ,'#d0181e', <?php echo(($vendido[3]-$despesas[3])); ?>,'#2E7D32'],
					["Maio",      <?php echo ($vendido[4]); ?>, "#0D47A1", <?php echo($despesas[4]); ?> ,'#d0181e', <?php echo(($vendido[4]-$despesas[4])); ?>,'#2E7D32'],
					["Junho",     <?php echo ($vendido[5]); ?>, "#0D47A1", <?php echo($despesas[5]); ?> ,'#d0181e', <?php echo(($vendido[5]-$despesas[5])); ?>,'#2E7D32'],
					["Julho",     <?php echo ($vendido[6]); ?>, "#0D47A1", <?php echo($despesas[6]); ?> ,'#d0181e', <?php echo(($vendido[6]-$despesas[6])); ?>,'#2E7D32'],
					["Agosto",    <?php echo ($vendido[7]); ?>, "#0D47A1", <?php echo($despesas[7]); ?> ,'#d0181e', <?php echo(($vendido[7]-$despesas[7])); ?>,'#2E7D32'],
					["Setembro",  <?php echo ($vendido[8]); ?>, "#0D47A1", <?php echo($despesas[8]); ?> ,'#d0181e', <?php echo(($vendido[8]-$despesas[8])); ?>,'#2E7D32'],
					["Outubro",   <?php echo ($vendido[9]); ?>, "#0D47A1", <?php echo($despesas[9]); ?> ,'#d0181e', <?php echo(($vendido[9]-$despesas[9])); ?>,'#2E7D32'],
					["Novembro",  <?php echo ($vendido[10]); ?>, "#0D47A1", <?php echo($despesas[10]); ?> ,'#d0181e', <?php echo($vendido[10]-$despesas[10]); ?>,'#2E7D32'],
					["Dezembro",  <?php echo ($vendido[11]); ?>, "#0D47A1", <?php echo($despesas[11]); ?> ,'#d0181e', <?php echo($vendido[11]-$despesas[11]); ?>,'#2E7D32']
				]);

				var viewColumn = new google.visualization.DataView(data_column);
				viewColumn.setColumns([0, 1, 2, 3, 4, 5,6,]);

				var optionsColumn = {
					title: "Valor de vendas, despesas e lucro por meses do ano.",
					bar: {
						groupWidth: "90%"
					},
					width:'100%',
					height: 500,
					legend: { 
						position: "bottom" 
					},
					colors: ['#0D47A1', 'd0181e' ,'#2E7D32']
				};
				var chart = new google.visualization.ColumnChart(document.getElementById("corpo"));
				
				<?php 
					if($grafico == 'line'){
						echo ("chartLine.draw(dataLine, google.charts.Line.convertOptions(optionsLine));");
					}else{
						echo ("chart.draw(viewColumn, optionsColumn);");
					}
				?>
			}
		</script>
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
						<li>Distribuidora Ale</li>
						<li style='margin-right: 0%; padding: 0px;'><a class='sidenav-close' href='#!' style='padding: 0px;'><i class='material-icons right white-text'>close</i></a></li>
						<li><a href="./logout.php" class="white-text">Sair</a></li>
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
					<li><a href="./estoque.php" ><i class="material-icons left">storage</i>Estoque</a></li>
					<li><a href="./relatorios.php"><i class="material-icons left">description</i>Relatório De Produtos</a></li>
					<li><a href="./cadastrarDespesa.php"><i class="material-icons left">attach_money</i>Despesas</a></li>
					<li><a href="./geraGrafico.php?tipo=line" class="activeLi"><i class="material-icons left">bar_chart</i>Gráficos</a></li>
					<li><a href="./vendaDiaria.php"><i class="material-icons left">bar_chart</i>Venda Diária</a></li>
				</ul>
			</div>
			<div class="row" style="margin: 2% 2% 0%;">
				<h4 class="center blue-text text-darken-4">Gráficos</h4>
				<div class="divider black"></div>
				<div class="row right">
					<?php
						if($grafico == 'line'){
							echo ('<a href="./geraGrafico.php?tipo=coluna" class="btn waves-effect waves-light blue white-text darken-4 center"><i class="material-icons left">bar_chart</i>Alterar para barras</a>');
						}else{
							echo ('<a href="./geraGrafico.php?tipo=line" class="btn waves-effect waves-light blue white-text darken-4 center"><i class="material-icons left">show_chart</i>Alterar para linhas</a>');
						}
					?>
				</div>
				<div class="row"></div>
				<div class="row">
					<div class="col s12 m12 l12 xl12">
						<div id="corpo"></div>
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
		
		<script src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/materialize.min.js"></script>
		<script src="../js/init.js"></script>
	</body>
</html>