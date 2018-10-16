<?php 
    if(!isset($_GET['id'])){
        header("location: cadastrarProduto.php");
    }else{
        $sql = "delete from produtos where idProduto = ".$_GET['id']."";
        include("conexao.php");
        mysqli_query($con,$sql);
        // echo $sql;
        header("location: cadastrarProduto.php");
    }
?>