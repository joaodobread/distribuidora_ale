<?php
    include("conexao.php");
    if(!isset($_GET['id'])){
        header("location: cadastrarCliente.php");    
    }else{
        $sql = "update clientes set status = 0 where idClientes = ".$_GET['id']."";
        mysqli_query($con,$sql);
        echo("<script type='text/javascript'>alert('Removido')</script>");
        header("location: cadastrarCliente.php");
        // echo($sql);
    }
    // if(isset($_GET['remove'])){
    //     if($_GET['remove'] == '1'){
    //         $sql = "delete from clientes where idClientes = ".$_GET['id']."";
    //         mysqli_query($con,$sql);
    //         echo("<script type='text/javascript'>alert('Removido')</script>");
    //         header("location: cadastrarCliente.php");
    //         // echo $sql;
    //     }
    //     if($_GET['remove'] == '0'){
    //         header("location: cadastrarCliente.php");
    //     }
    // }
?>

