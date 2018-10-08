<?php
	include_once ("../configs/conection.php");

	function retorna($codigo, $con){
		$sql = "SELECT * FROM produtos WHERE codigoean = $codigo LIMIT 1";
		$result = mysqli_query($con, $sql);
		if($result->num_rows){
			$row = mysqli_fetch_assoc($result);
			$valores['nome_produto'] = $row['nomeproduto'];
			$valores['valor'] = $row['precovendaproduto'];
			$valores['valorc'] = $row['precocompraproduto'];

		}
		return json_encode($valores);
	}

	if(isset($_GET['codigo'])){
		echo retorna($_GET['codigo'], $con);
	}
?>