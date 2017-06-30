 <?php 
 	
 	date_default_timezone_set('America/Sao_Paulo');
	$date = date('d/m/Y H:i'); 
	
	include_once("login/conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script>
    function select(VALOR) {
             var $this = VALOR;

            var codigo = VALOR.value;
            var nome = VALOR.options[VALOR.selectedIndex].innerHTML
        
            console.log(nome);

}
  
  </script>


	
	</head>
	<body>
		<div id="wrapper">
			<div id="page-wrapper">
				<div class="container-fluid">
					<br>
				  
				  <font size="5">Bem vindo:</font> <font size="3">  <?php echo $_SESSION['usuarioNome']; ?></font>

				  <br> <br>

				  	<font size="2"> <b> Acesso em:</b> </font> <?php echo $date ?>
				  	<br><br>

				  	

				  	<!--
				  	<div class="row col-md-offset-1" >
					
						<button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Agendamento</button>

						<button type="button" class="btn btn-warning btn-lg btn3d"><span class="glyphicon glyphicon-warning-sign"></span> Atendimento</button>

						<button type="button" class="btn btn-magick btn-lg btn3d"><span class="glyphicon glyphicon-gift"></span> Relatórios</button>

						<button type="button" class="btn btn-danger btn-lg btn3d"><span class="glyphicon glyphicon-off"></span></button>

					</div> -->
					

					<br><br>

					<div class= "row ">
						<div class="panel panel-primary col-md-4 col-md-offset-1">
              <div class="panel-heading">
                <h3 class="panel-title">Atendimento Geral</h3>
              </div>
              	<div class="panel-body">
              		<div class="span12 well">

                                     
              
                   <?php   

                     

                    $resultadoatendimento = mysql_query("SELECT count(CDATENDIMENTO) AS qtdatendimento FROM tb_atendimento ");

                    if( mysql_num_rows( $resultadoatendimento ) )
                    {
                       $dados = mysql_fetch_object( $resultadoatendimento );
                    }

                     $resultadoimpressao = mysql_query("SELECT sum(i.QTDIMPRESSAO) AS qtdimpressao FROM tb_impressao i inner join tb_atendimento a on i.CDATENDIMENTO = a.CDATENDIMENTO");

                    if( mysql_num_rows( $resultadoimpressao ) )
                    {
                       $dadosimp = mysql_fetch_object( $resultadoimpressao);
                    }

                    $resultadopes = mysql_query("SELECT count(p.CDPESSOA) AS qtdepessoa FROM tb_pessoa p inner join tb_atendimento a on p.CDPESSOA=a.CDPESSOA where a.CDATENDIMENTO = a.CDATENDIMENTO");

                    if( mysql_num_rows( $resultadopes) )
                    {
                       $dadospes = mysql_fetch_object( $resultadopes);
                    }

                  ?>

                               		<table  width="100%" cellpadding="3" cellspacing="3" border="2" style="font-family:arial">
                               			<tr height="30" >
                               				<td><b>Total de Atendimentos</b></td>
                               				<td width="30%" align="center"><?php echo $dados->qtdatendimento ?></td>
                               			<tr>
                               			<tr height="30" >
                               				<td><b>Quantidade de Impressão</b></td>
                               				<td width="30%" align="center"><?php echo $dadosimp->qtdimpressao ?></td>
                               			<tr>
                               			<tr height="30">
                               				<td><b>Tempo de Utilização</b></td>
                               				<td width="30%" align="center">18:00:00</td>
                               			<tr>
                               			<tr height="30" >
                               				<td><b>Nº de Pessoas Atendidas</b></td>
                               				<td width="30%" align="center"> <?php echo $dadospes->qtdepessoa ?> </td>
                               			<tr>
                               		</table>
                               	</div>
                          	</div>
                        </div>

                        <div class="panel panel-primary col-md-4 col-md-offset-1">
                          <div class="panel-heading">
                            <h3 class="panel-title">Programas Sociais</h3>
                          </div>
                          <div class="panel-body">
                          	<div class="span12 well">

                              <?php



                              $resultadocadunico = mysql_query("SELECT count(CDPESSOA) qtdcadunico FROM tb_programapessoa WHERE CDPROGRAMA = '4' ");

                                if( mysql_num_rows( $resultadocadunico) )
                                {
                                   $dadoscadunico = mysql_fetch_object( $resultadocadunico);
                                }


                                $resultadobolsafamilia = mysql_query("SELECT count(CDPESSOA) qtdbolsa FROM tb_programapessoa WHERE CDPROGRAMA = '3' ");

                                if( mysql_num_rows( $resultadobolsafamilia) )
                                {
                                   $dadosbolsa = mysql_fetch_object( $resultadobolsafamilia);
                                }

                                $resultado = mysql_query("SELECT count(CDPESSOA) qtderes FROM tb_pessoa p where p.CDPESSOA NOT IN (
                                  SELECT CDPESSOA from tb_programa pr inner join tb_programapessoa pp on pr.CDPROGRAMA = pp.CDPROGRAMA and pp.CDPROGRAMA ='3')");

                                 if( mysql_num_rows( $resultado) )
                                {
                                   $dadossem = mysql_fetch_object( $resultado);
                                }
                              ?>

                             	<table  width="100%" cellpadding="3" cellspacing="3" border="2" style="font-family:arial">
                           			<tr height="30" >
                           				<td><b>Cadastrados no Cad Único</b></td>
                           				<td width="30%" align="center"><?php echo $dadoscadunico->qtdcadunico ?></td>
                           			<tr>
                           			<tr height="30" >
                           				<td><b>Recebe Bolsa Familia</b></td>
                           				<td width="30%" align="center"> <?php echo $dadosbolsa->qtdbolsa ?></td>
                           			<tr>
                           			<tr height="30" >
                           				<td><b>Não Recebe Bolsa Familia</b></td>
                           				<td width="30%" align="center"> <?php echo $dadossem->qtderes ?> </td>
                           			<tr>
                           			<tr height="30" >
                           				<td><b>Não Informaram</b></td>
                           				<td width="30%" align="center">3</td>
                           			<tr>
                             	</table>
                            </div>
                          </div>
                        </div>

					</div>


				</div>


					
				<!-- /.container-fluid -->
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
		
		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>


      
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="js/plugins/morris/raphael.min.js"></script>
		<script src="js/plugins/morris/morris.min.js"></script>
		<script src="js/plugins/morris/morris-data.js"></script>
		
	</body>
</html>
