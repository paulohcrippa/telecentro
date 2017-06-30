<!DOCTYPE html>

<?php
	$id = $_GET['id'];
	// execulta a query e conta quantas linhas e traz somente um usuario
	$consulta = mysql_query("SELECT * FROM tb_atendimento a 	
								INNER JOIN tb_usuario u on a.CDUSUARIO = u.CDUSUARIO
								INNER JOIN tb_pessoa p on a.CDPESSOA = p.CDPESSOA 
                                WHERE a.cdatendimento = '$id' LIMIT 1 ");
	$atendimento = mysql_fetch_assoc($consulta);

	$consulta_atividades = mysql_query("SELECT * FROM tb_atendimentotipo JOIN tb_tpatendimento ON tb_tpatendimento.CDTPATENDIMENTO = tb_atendimentotipo.CDTPATENDIMENTO WHERE tb_atendimentotipo.CDATENDIMENTO = '$id'");

	$consulta_impressao = mysql_query("SELECT * FROM tb_impressao JOIN tb_tpimpressao ON tb_tpimpressao.CDTPIMP = tb_impressao.CDTPIMP WHERE tb_impressao.CDATENDIMENTO = '$id'");

			
			$Hinicial=$atendimento['HRINICIO'];
			$Hfinal=$atendimento['HRFINAL'];

			if($Hinicial<>"" && $Hfinal<>""){


				$unix_inicial = strtotime($Hinicial);
				$unix_final = strtotime($Hfinal);

				$nHoras   = ($unix_final - $unix_inicial) / 3600;
				$nMinutos = (($unix_final - $unix_inicial) % 3600) / 60;

				$tempo = sprintf('%02d:%02d', $nHoras , $nMinutos);
				
			}
	
?>


<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">


<body>

    <div id="wrapper">
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Visualizar Atendimentos<small>  </small>
							
							
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                 Página inicial
                            </li>
							<li class="">
                                Lista de Atendimentos
                            </li>
							<li class="active">
                                 Visualizar Atendimentos
                            </li>
                        </ol>
                    </div>
                </div>
				<div class="col-sm-12">
    

        </div></br></br>
                <!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							
							<form class="form-horizontal" role="form" method = "POST" action = "">
								
								<div class="form-group">
									<label class="control-label col-sm-2" for="nome">Código:</label> 
									<div class="col-sm-1">
									  <input type="text" class="form-control" name="codigo" id="codigo"  disabled Value ="<?php echo $atendimento['CDATENDIMENTO']; ?>"> 
									</div>
								</div>


								<div class="form-group">
									<label class="control-label col-sm-2" for="nome">Nome:</label> 
									<div class="col-sm-3">
									  <input type="text" class="form-control" name="nome" id="nome"  disabled Value ="<?php echo $atendimento['NMPESSOA']; ?>"> 
									</div>
							 
								
									<label class="control-label col-sm-2" for="instrutor"> Instrutor(a):</label> 
									<div class="col-sm-3"> 
										 <input type="text" class="form-control" name="instrutor" id="instrutor"  disabled Value ="<?php echo $atendimento['NMUSUARIO']; ?>"> 
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-2" for="hinico">Tempo:</label> 
									<div class="col-md-2 "> 
										<input type="text" class="form-control" name="tempoatend" disabled Value ="<?php echo $tempo?>"> 
									</div>

									<label class="control-label col-md-3" for="dtatendimento"><font color="red">*</font> Data do Atendimento:</label>
									<div class="col-md-3">
										<input type="text" class="form-control"  name="dtatendimento" disabled Value ="<?php echo $atendimento['DTATENDIMENTO']; ?>" >
									</div>
								</div>

								

								<div class="row" style=" padding-top: 50px;" >
									<div class="col-xs-10 col-md-10 col-md-offset-1">
										<table class = " table table-striped ">
												<thead>
												<tr class="info">
													<th width="130" aling="center">Nº</th>
													<th width="300" aling="center"><span class="style9"><b>Atividades</b></span></th>  
													<th width="300" aling="center"><span class="style9"><b>Impressões</b></span></th>
													<th width="250" align="center"><span class="style9"><b>Quantidade</b></span></th> 
													<th width="" aling="center"><span class="style9"><b>Observação</b></span></th>
												</tr>
											</thead>
											<tbody>		
													
												 <?php 
												 	while($atividades = mysql_fetch_assoc($consulta_atividades)){
												 		echo"<tr>";
												 				echo'<td style="white-space: initial">'.$atividades[CDTPATENDIMENTO].' </td>';
												 				echo'<td style="white-space: initial">'.$atividades[DSTPATENDIMENTO].'</td>';
												 				
												 				if($atendimento['IMPRESSAO']== 'S'){
												 					$impressao = mysql_fetch_array($consulta_impressao);
													 				echo '<td>'.$impressao[DSTPIMP].'</td>';
													 				echo '<td>'.$impressao[QTDIMPRESSAO].'</td>';
												 				}else{
												 					echo '<td> - </td>';
													 				echo '<td> - </td>';
												 				}
												 				echo '<td>'.$atendimento[OBSATENDIMENTO].'</td>';

												 		echo "</tr>";



												 	}
												 ?>
														
													<!--<?php //while($atividades = mysql_fetch_assoc($consulta_atividades)){
													/*echo "<tr>";
														echo '<td style="white-space: initial">'.$atividades[CDTPATENDIMENTO].'</td>';
														
														echo '<td style="white-space: initial">'.$atividades[DSTPATENDIMENTO].'</td>';
														  
														  if($atendimento['IMPRESSAO']==S){
														  	 while($impressao = mysql_fetch_assoc($consulta_impressao)){
														  	 	
														  	 	echo '<td style="white-space: initial">'.$impressao[DSTPIMP].'</td>';
		
																echo '<td style="white-space: initial">'.$impressao[QTDIMPRESSAO].'</td>';


														  	}
														}
														echo'<td style="white-space: initial">'.$atendimento[OBSATENDIMENTO].' </td>';
											 		echo "</tr>";
											 }*/?> -->


												
													


											</tbody>
										</table>
									</div>
									
								</div>

								<div class="col-sm-offset-9 col-sm-10">	
									<button type="button" class="btn btn-primary" onclick='javascript:history.back(-1);'>Voltar</button>
								</div>
							</form>


							
							
						</div>
						
					</div><!-- /.container-fluid -->

        </div><!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	
	
 
 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	
	<script>

</script>

</body>

</html>