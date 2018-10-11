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

<form action="cadastrarFornecedor.php" method="get">
    Deseja remover: "<?php echo $row['nomeCliente'] ?>"?
    <a href='removerCliente.php?id=<?php echo ($_GET['id'])?>&remove=1'>Sim</a>
    <a href='removerCliente.php?id=<?php echo ($_GET['id'])?>&remove=0'>Não</a>
</form>

<?php
    if(isset($_GET['remove'])){
        if($_GET['remove'] == '1'){
            $sql = "delete from clientes where idClientes = ".$_GET['id']."";
            mysqli_query($con,$sql);
            echo("<script type='text/javascript'>alert('Removido')</script>");
            header("location: cadastrarCliente.php");
            // echo $sql;
        }
        if($_GET['remove'] == '0'){
            header("location: cadastrarCliente.php");
        }
    }
?>

