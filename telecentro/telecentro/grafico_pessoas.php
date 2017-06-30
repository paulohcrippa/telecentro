<?php 
 include_once("mpdf/mpdf.php");
  include_once("login/conexao.php");
  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d/m/Y H:i');

  	 $datainicio= $_POST['datainicio'];
     $datafinal = $_POST['datafinal'];
     $pessoa = $_POST['pessoa'];

     $datai = strtotime($datainicio); 
     $new_datai = date('d/m/Y', $datai);

     $dataf = strtotime($datafinal); 
     $new_dataf = date('d/m/Y', $dataf);

      $sqlpessoa= mysql_query("SELECT *,date_format(DTINCREG, '%d/%m/%Y') as DTINCREG  from tb_pessoa where DTINCREG >= '$datainicio 00:00:00'and DTINCREG <='$datafinal 00:00:00' order by DTINCREG");

      $linhas_pessoa = mysql_num_rows($sqlpessoa);

?>
<!DOCTYPE HTML>
<html>
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gráfico Atendimento</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
    <script type="text/javascript">
$(function () {
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Gráfico de Pessoas por idade '
        },
        subtitle: {
            text: <?php echo "'perido de:".$new_datai."  até  ".$new_dataf."'"; ?> 
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -35,
                style: {
                    fontSize: '12px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Quantidade Pessoas Cadastradas'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Quantidade de Pessoas: <b>{point.y:.1f}</b>'
        },
        series: [{
            name: 'Pessoas por idade',
            data:  [ 

            	<?php
            		for($i=0; $i<$linhas_pessoa; $i++){

            			$linha_pessoa = mysql_fetch_array($sqlpessoa);

                    if($linha_pessoa[IDADE] >='12' && $linha_pessoa[IDADE] <'16'){

                          $contarpes = mysql_query("SELECT count(CDPESSOA) qtdepessoa FROM tb_pessoa where IDADE >= '12' < '16' ");
                          $resultado = mysql_result($contarpes, 0);

                         echo "['12 á 16 anos',".$resultado."],";
                    }
                      if($linha_pessoa[IDADE] >='16' && $linha_pessoa[IDADE] <'19'){

                          $contar = mysql_query("SELECT count(CDPESSOA) qtdepessoa FROM tb_pessoa where IDADE >= '16' < '19' ");
                          
                          $resultado = mysql_result($contar, 0);
                       
                        echo "['16 á 19 anos',".$resultado."],";
                    }
                    if($linha_pessoa[IDADE] >='19' && $linha_pessoa[IDADE] <'30'){

                         $contar = mysql_query("SELECT count(CDPESSOA) qtdepessoa FROM tb_pessoa where IDADE >= '19' < '30' ");
                          
                          $resultado = mysql_result($contar, 0);

                        echo "['19 á 30 anos',".$resultado."],";
                    }
                     if($linha_pessoa[IDADE] >='30' && $linha_pessoa[IDADE] <='40'){

                          $contar = mysql_query("SELECT count(CDPESSOA) qtdepessoa FROM tb_pessoa where IDADE >= '30' < '40' ");
                          
                          $resultado = mysql_result($contar, 0);


                         echo "['30 á 40 anos',".$resultado."],";
                     }else{
                       $contar = mysql_query("SELECT count(CDPESSOA) qtdepessoa FROM tb_pessoa where IDADE >= '40' ");
                          
                          $resultado = mysql_result($contar, 0);

                        echo "['Acima dos 40 anos',".$resultado."],";
                     }
                      
                     

            	  }
            	?>    
               
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
    </script>
  </head>
  <body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 300px; height: 500px; margin: 0 auto"></div>

  </body>
</html>



<script type="text/javascript" src="../../js/jquery-2.2.3.min.js"></script>
      <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
      <!-- Script que carrega algumas dependencias do JS para a Google -->
      <script type="text/javascript" src="../../js/loader.js"></script>
      <!-- Script onde estão as configurações de criação do gráfico. Esse script tem pronto no site da Google. -->
      <script type="text/javascript">
            google.charts.load('current', {'packages'😞'corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
               // Aqui é onde você edita as informações do gráfico, nesse script somente aqui e mais um lugar você edita,
               // Nos arrays, primeira linha é o título de cada informação
               // As linhas subsequentes são os dados, sendo cada posição correspondente ao título.
                              var data = google.visualization.arrayToDataTable([
                  ['Data da Avaliação', 'Peso', 'Massa Magra', 'Massa Gorda', 'BF'],
                  <?php
                     $sqlChart = "SELECT * FROM pessoa p
                        INNER JOIN avaliacao a ON (p.cdpessoa = a.cdpessoa)
                        INNER JOIN av_morfo mor ON (a.cdavaliacao = mor.cdavaliacao)
                        WHERE a.cdpessoa =".$_GET['cdpessoa'];

                     $consultaChart = $mysqli->query($sqlChart);
                     while ($dadoChart = $consultaChart->fetch_array()) {
                        echo "['".date ("d/m/Y", strtotime($dadoChart ["dtavaliacao"]))."', ".$dadoChart["peso"].", ".$dadoChart["massamagra"].", ".$dadoChart["massagorda"].", ".$dadoChart["percentualgordura"]."],\n";
                     }
                  ?>
               ]);

              var options = {
                title: 'Comparação Entre Avalições',
                curveType: 'function',
                legend: { position: 'bottom' }
              };

              var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

              chart.draw(data, options);
            }
          </script>
      <script>
         $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip(); 
         });
      </script>