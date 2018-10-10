<?php
	include_once ("./conexao.php");

	function retorna($codigo, $con){
		$sql = "SELECT * FROM produtos WHERE eanProduto = $codigo LIMIT 1";
		$result = mysqli_query($con, $sql);
		if($result->num_rows){
			$row = mysqli_fetch_assoc($result);
			$valores['nome_produto'] = $row['nomeProduto'];
			$valores['valor'] = $row['valoVendaProduto'];
			$valores['valorc'] = $row['valorCompraProduto'];
		}
		return json_encode($valores);
	}

	if(isset($_GET['codigo'])){
		echo retorna($_GET['codigo'], $con);
	}
?>