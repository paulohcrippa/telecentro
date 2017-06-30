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

      
      $sqlatendimento= mysql_query("SELECT  *  FROM tb_tpatendimento tp inner join tb_atendimentotipo at  on tp.CDTPATENDIMENTO = at.CDTPATENDIMENTO inner join tb_atendimento a on a.CDATENDIMENTO = at.CDATENDIMENTO where DTATENDIMENTO >= '$new_datai'and DTATENDIMENTO <='$new_dataf' group by  DSTPATENDIMENTO ");

      $linhas_atendimento = mysql_num_rows($sqlatendimento);

      
 	
		

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
            text: 'Gráfico de Atendimentos por Tipo '
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
                text: 'Quantidade Tipos de Atendimento'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Quantidade de atendimento: <b>{point.y:.1f}</b>'
        },
        series: [{
            name: 'Tipos de Atendimento',
            data:  [ 

            	<?php
            	
            	
            		for($i=0; $i<$linhas_atendimento; $i++){
                       
                       $linha_grafico = mysql_fetch_array($sqlatendimento);

                       	$codigo = $linha_grafico[CDTPATENDIMENTO];

                       $contar = mysql_query("SELECT  count(CDATENDIMENTO) qtde  FROM tb_atendimentotipo where CDTPATENDIMENTO = '$codigo' ");

            			
                        $resultado = mysql_result($contar, 0);
            			
            			echo "['".$linha_grafico[DSTPATENDIMENTO]."',".$resultado."],";
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

<div id="container" style="min-width: 200px; height: 500px; margin: 0 auto"></div>

  </body>
</html>