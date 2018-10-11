<?php
    include("conexao.php");
    if(!isset($_GET['id'])){
        header("location: cadastrarCliente.php");
    }else{
        $sql = "select * from clientes where idClientes = ".$_GET['id']."";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Remover: "<?php echo $row['nomeCliente'] ?>"?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <form action="remover"></form>
</body>
</html>