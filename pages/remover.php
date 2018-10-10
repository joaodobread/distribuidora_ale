<?php
    session_start();
    if(isset($_GET['id'])) {
        $idproduto = $_GET['id'];
        unset($_SESSION['itens'][$idproduto]);
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=venda.php"/>';
    }