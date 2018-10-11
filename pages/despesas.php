<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        red{
            color:red;
        }
        green{
            color:green;
        }
        yellow{
            color: yellow;
        }
    </style>
</head>
<body>
<form action='despesas.php' method='get'>
    <select name="data" id="mes">
        <option value="0"disabled selected >--Mês--</option>
        <option value="1">Janeiro</option>
        <option value="2">Fevereiro</option>
        <option value="3">Março</option>
        <option value="4">Abril</option>
        <option value="5">Maio</option>
        <option value="6">Junho</option>
        <option value="7">Julho</option>
        <option value="8">Agosto</option>
        <option value="9">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
    </select>
    <input type="submit" value="Pesquisar">
</form>

<table border='1' class="highlight centered">
                        <thead>
                            <tr>
                                <!-- <th>Código</th> -->
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Data Vencimento</th>
                                <th>Data Pagamento</th>
                                <th>Status de Pagamento</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php
                                include("conexao.php");
                                    if(isset($_GET['data'])) {
                                    $total_lucro=0;
                                    $sql = "select total from venda where `date` like '%-".$_GET['data']."-%' ";
                                    $resultado = mysqli_query($con,$sql);
                                    while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
                                        $total_lucro = $total_lucro + $row["total"];
                                    }
                                    $total_despesas=0;
                                    $total_despesasPagas = 0;
                                    $sql = "select * from despesas where dataPagamento like '%-".$_GET['data']."-%'";
                                    // echo $sql;
                                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                                    if(mysqli_num_rows($resultado) > 0) {
                                        while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
                                            $total_despesas = $total_despesas + $row["valorDespesa"];
                                            if($row['status'] == '1'){
                                                $total_despesasPagas = $total_despesasPagas + $row["valorDespesa"];
                                            }
                                            echo "<tr>";
                                            echo ("<td>".$row["nomeDespesa"]."</td>");
                                            echo ("<td><red>".$row["valorDespesa"]."</red></td>");
                                            echo ("<td>".$row["dataVencimento"]."</td>");
                                            if($row["dataPagamento"] == '' || $row["dataPagamento"] == NULL){
                                                echo ("<td>Sem data de pagamento</td>");
                                            }else{
                                                echo ("<td>".$row["dataPagamento"]."</td>");
                                            }
                                            if($row["status"] == 1){
                                                echo ("<td><green>Conta já paga<green></td>");
                                            }else{
                                                echo ("<td><red>Não consta pagamento<red></td>");
                                            }
                                            echo ("<td><a href='cadastrarDespesas.php?editar=true&id=".$row['idDespesa']." ' class='btn waves-effect waves-light yellow black-text'><b>Editar</b></a></td>");
                                            echo ("<td><a href='' class='btn waves-effect waves-light red black-text'><b>Excluir</b></a></td>");
                                            echo "</tr>";
                                            }
                                        } 
								}else{
                                    $sql = "select * from despesas";
                                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                                    if(mysqli_num_rows($resultado) > 0) {
                                        while($row = mysqli_fetch_array($resultado,MYSQLI_ASSOC)) {
                                            echo "<tr>";
                                            echo ("<td>".$row["nomeDespesa"]."</td>");
                                            echo ("<td><red>-".$row["valorDespesa"]."</red></td>");
                                            echo ("<td>".$row["dataVencimento"]."</td>");
                                            if($row["dataPagamento"] == '' || $row["dataPagamento"] == NULL){
                                                echo ("<td>Sem data de pagamento</td>");
                                            }else{
                                                echo ("<td>".$row["dataPagamento"]."</td>");
                                            }
                                            if($row["status"] == 1){
                                                echo ("<td><green>Conta já paga<green></td>");
                                            }else{
                                                echo ("<td><red>Não consta pagamento<red></td>");
                                            }
                                            echo ("<td><a href='cadastrarDespesas.php?editar=true&id=".$row['idDespesa']." ' class='btn waves-effect waves-light yellow black-text'><b>Editar</b></a></td>");
                                            echo ("<td><a href='' class='btn waves-effect waves-light red black-text'><b>Excluir</b></a></td>");
                                            echo "</tr>";
                                            }
                                        } 
                                }
                                mysqli_close($con);
                                ?>
                        </tbody>
                    </table>
                    <?php
                        echo ("Valor de despesas do mês: <red>".$total_despesas."</red><br>");
                        echo ("Valor de vendas do mês: <green>".$total_lucro."</green><br>");
                        echo ("Valor de despesas pagas do mês: <red>".$total_despesasPagas."</red><br>");
                        $lucro = $total_lucro-$total_despesasPagas;
                        if($lucro > 0.0){
                            echo("Lucro: <green>+".$lucro."</green>");
                        }else{
                            echo("Lucro: <red>-".$lucro."</red>");
                        }
                    ?>
    </body>
</html>