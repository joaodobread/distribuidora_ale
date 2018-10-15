<?php 
    if(!isset($_GET['id'])){
        header("location: cadastrarDespesa.php");
    }else{
        $sql = "delete from despesas where idDespesa = ".$_GET['id']."";
        include("conexao.php");
        mysqli_query($con,$sql);
        // echo $sql;
        header("location: cadastrarDespesa.php");
    }
?>