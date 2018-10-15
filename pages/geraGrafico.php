<?php
    include("conexao.php");
    $ano = $_GET['ano'];
    $vetor = array();
    for($i = 0; $i < 12; $i++){
        $sql = "select sum(total) from venda where (MONTH(dataVenda) = $i+1 and YEAR(dataVenda) = $ano )";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        $vetor[$i] = $row['sum(total)'];
        if($vetor[$i] == '' or $vetor[$i] == Null){
          $a = 0;
          $vetor[$i]=$a;
        }else{
          $vetor[$i] = $row['sum(total)'];
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
        $despesas[$i] = $row['sum(total)'];
      }
  }
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Meses", "Valor das vendas R$", { role: "style" } ,'Valor das despesas R$',{role:"style"}, 'Lucro em R$', {role: "style"} ],
        ["Janeiro",   <?php echo ($vetor[0]); ?>, "#0D47A1", <?php echo($despesas[0]); ?> ,'#d0181e', <?php echo(($vetor[0]-$despesas[0])); ?>,'#2E7D32'],
        ["Feveiro",   <?php echo ($vetor[1]); ?>, "#0D47A1", <?php echo($despesas[1]); ?> ,'#d0181e', <?php echo(($vetor[1]-$despesas[1])); ?>,'#2E7D32'],
        ["Março",     <?php echo ($vetor[2]); ?>, "#0D47A1", <?php echo($despesas[2]); ?> ,'#d0181e', <?php echo(($vetor[2]-$despesas[2])); ?>,'#2E7D32'],
        ["Abril",     <?php echo ($vetor[3]); ?>, "#0D47A1", <?php echo($despesas[3]); ?> ,'#d0181e', <?php echo(($vetor[3]-$despesas[3])); ?>,'#2E7D32'],
        ["Maio",      <?php echo ($vetor[4]); ?>, "#0D47A1", <?php echo($despesas[4]); ?> ,'#d0181e', <?php echo(($vetor[4]-$despesas[4])); ?>,'#2E7D32'],
        ["Junho",     <?php echo ($vetor[5]); ?>, "#0D47A1", <?php echo($despesas[5]); ?> ,'#d0181e', <?php echo(($vetor[5]-$despesas[5])); ?>,'#2E7D32'],
        ["Julho",     <?php echo ($vetor[6]); ?>, "#0D47A1", <?php echo($despesas[6]); ?> ,'#d0181e', <?php echo(($vetor[6]-$despesas[6])); ?>,'#2E7D32'],
        ["Agosto",    <?php echo ($vetor[7]); ?>, "#0D47A1", <?php echo($despesas[7]); ?> ,'#d0181e', <?php echo(($vetor[7]-$despesas[7])); ?>,'#2E7D32'],
        ["Setembro",  <?php echo ($vetor[8]); ?>, "#0D47A1", <?php echo($despesas[8]); ?> ,'#d0181e', <?php echo(($vetor[8]-$despesas[8])); ?>,'#2E7D32'],
        ["Outubro",   <?php echo ($vetor[9]); ?>, "#0D47A1", <?php echo($despesas[9]); ?> ,'#d0181e', <?php echo(($vetor[9]-$despesas[9])); ?>,'#2E7D32'],
        ["Novembro",  <?php echo ($vetor[10]); ?>, "#0D47A1", <?php echo($despesas[10]); ?> ,'#d0181e', <?php echo($vetor[10]-$despesas[10]); ?>,'#2E7D32'],
        ["Dezembro",  <?php echo ($vetor[11]); ?>, "#0D47A1", <?php echo($despesas[11]); ?> ,'#d0181e', <?php echo($vetor[11]-$despesas[11]); ?>,'#2E7D32']
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([ 0,
                        1,
                        // { calc: "stringify",
                        //     sourceColumn: 1,
                        //     type: "string",
                        //     role: "annotation" 
                        //   },
                        2,3,
                        4,  
                        5,
                        // { calc: "stringify",
                        //     sourceColumn: 5,
                        //     type: "string",
                        //     role: "annotation" 
                        //   },
                          6,]);

      var options = {
        title: "Valor de vendas e despesas meses do ano.",
        // width: 900,
        // height: 400,
        bar: {groupWidth: "90%"},
        legend: { position: "bottom" },
        colors: ['#0D47A1', 'd0181e' ,'#2E7D32']
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("corpo"));
      chart.draw(view, options);
  }
  </script>
<body id='corpo'></body>