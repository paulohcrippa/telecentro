<?php 
 	
 	date_default_timezone_set('America/Sao_Paulo');
	$date = date('d/m/Y H:i'); 
	$data = date('d/m/Y');
	
	include_once("login/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
	<body>
		<div id="wrapper">
			<div id="page-wrapper">
				<div class="container-fluid">

					 <font size="5">Bem vindo:</font> <font size="3">  <?php echo $_SESSION['usuarioNome']; ?></font>

				  <br> <br>

				  	<font size="2"> <b> Acesso em:</b> </font> <?php echo $date ?>
				  	<br><br>
			
						<div class="panel panel-primary col-md-5 col-md-offset-2">
                          <div class="panel-heading">
                            <h3 class="panel-title">Agenda</h3>
                          </div>
                            <div class="panel-body">
                                <div class="agenda">
                             	    <div class="table-responsive">
                             	    	<?php 
	                             	    	$agenda = mysql_query("SELECT * FROM tb_agenda");
											$linhasagenda = mysql_num_rows($agenda);

                             	    	?>
                             	 	    <table class="table table-condensed table-bordered">
	               					 	  	<thead>
	               					 	  		
							                    <tr>
							                        <th>Data/Horas</th>
							                        <th>Pessoa</th>
							                        <th>Descrição</th>
							                    </tr>
						                    </thead>

						                    <tbody>

						                    	<?php 
	               					 	  				
	               					 	  			     for($i=0; $i<$linhasagenda; $i++){
	               					 	  					$linhaagenda = mysql_fetch_array($agenda);
	               					 	  					  if($linhaagenda['start_normal'] || $linhaagenda['end_normal']==$data){

	               					 	  					  		echo'<tr>';
	               					 	  					  				
	               					 	  					  			echo '<td class="agenda-time">'.$linhaagenda[start_normal].' </td>';
	               					 	  					  			echo '<td class="agenda-events">
	               					 	  					  				<div class="agenda-event">'
	               					 	  					  				.$linhaagenda[title].
	               					 	  					  				'</div</td>';
	               					 	  					  			echo '<td class="agenda-events">
	               					 	  					  				<div class="agenda-event">'
	               					 	  					  				.$linhaagenda[TPATENDIMENTO].
	               					 	  					  				'</div</td>';

	               					 	  					  		echo'</tr>';
	               					 	  					  }
	               					 	  				}
	               					 	  				?>
	               					 	  		
	               					 	  	
							                </tbody>
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
		
		<!-- Morris Charts JavaScript -->
		<script src="js/plugins/morris/raphael.min.js"></script>
		<script src="js/plugins/morris/morris.min.js"></script>
		<script src="js/plugins/morris/morris-data.js"></script>
		
	</body>
</html>
