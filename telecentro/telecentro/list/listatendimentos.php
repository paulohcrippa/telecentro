
<?php 

    session_start();
	date_default_timezone_set('America/Sao_Paulo');
	include_once("login/seguranca.php");
?>
<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

<head>
<link rel="stylesheet" href="css/jquery-ui.min.css">
	<script>
function formatar(mascara, documento){
var i = documento.value.length;
var saida = mascara.substring(0,1);
var texto = mascara.substring(i)

if (texto.substring(0,1) != saida){
documento.value += texto.substring(0,1);
}

}


function select(VALOR) {
				   	 var $this = VALOR;

				    var codigo = VALOR.value;
				    var nome = VALOR.options[VALOR.selectedIndex].innerHTML
				  
			
					$('tr').show();



				    if(nome !='Selecionar Instrutor(a)'){
				    
				    	$('tbody tr:not([data-nomeinstrutor="'+ nome +'"])').hide();
				    }
				    	
				    console.log(nome);
}
function inicio() {
	var atual = $('input[name="datainicial"]').val();
	alert(atual);
	$('tbody tr').each(function(index,element){
		var inicial = $(this).data('dtinicio');
		var final = $(this).data('dtfinal');

		alert(inicial + ' ' + final);

		if(true){
			$(this).show();
		} else {
			$(this).hide();
		}

	})

}
function termino() {
	alert($('input[name="datafinal"]').val());

}

		
</script>
</head>


<body>

    <div id="wrapper">
		
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista de Atendimentos <br/><small> Lista de atendimentos cadastrados </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                Página inicial
                            </li>
							<li class="active">
                                 Lista de Atendimentos
                            </li>
                        </ol>
                    </div>
                </div>
              
			

				<div class="col-sm-3">

						<?php
				    	if($_SESSION['usuarioPerfil'] == '1'){

				    		echo "<a class='btn btn-success' href='principal.php?link=11'><span class='glyphicon glyphicon-plus'></span> Novo Atendimento</a>";
				    	}else
				    	{
				    		echo "<a class='btn btn-success' href='principalinst.php?link=11'><span class='glyphicon glyphicon-plus'></span> Novo</a>";
				    	}

				     ?>
           
          		</div>

          		<div class="row">

					<div class="col-md-9 col-md-offset-3 ">
					<label class="control-label col-sm-2" for="instrutor" >Instrutor(a):</label> 
						<div class="col-sm-4"> 
							<select class="form-control" id="pesquisarinstrutor" onchange="select(this)" name="pesquisarinstrutor"><option>Selecionar Instrutor(a)</option>
								<?php 
									$query = mysql_query ("select * FROM tb_usuario ");
									while($res=mysql_fetch_array($query)){
										echo "<option value='{$res["CDUSUARIO"]}'>{$res["NMUSUARIO"]}</option>";
									}
								?>
							</select>
						</div>

					</div>
				</div> <br>

          		
                <!-- /.row --> 
                <div id="resultadoatendimento">
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<table  id="tabelatendimento" class = " table table-striped ">
									<thead>
									<tr class="info" data-nomeinstrutor='$linhas[NMUSUARIO]' data-dtinicio='$linhas[DTATENDIMENTO]'  data-dtfinal='$linhas[DTATENDIMENTO]'>
										<th width="80" aling="center">Nº</th>
										<th width="260" aling="center"><span class="style9"><b>Nome</b></span></th>
										<th width="50" aling="center"><span class="style9"><b></b></span></th>
										<th width="" aling="center"><span class="style9"><b>Tempo Atendido</b></span></th>
										<th width="" aling="center"><span class="style9"><b>Instrutor (a)</b></span></th>
										<th width="" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
								<tbody>		


									<?php
									
									//paginacao verifica se esta sendo passado na url a pagina atual

									$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
									
									$sql_visualizar = mysql_query("SELECT * 
									FROM tb_atendimento a INNER JOIN tb_usuario u ON a.CDUSUARIO = u.CDUSUARIO
														  INNER JOIN tb_pessoa p  ON a.CDPESSOA = p.CDPESSOA
														  									
														   ORDER BY CDATENDIMENTO  " );
									//contar o total de pessoas
								    $total_atendimento = mysql_num_rows($sql_visualizar);

								    // setar a quantidade de pessoas por pagina

									$quantidade_pg = 12;

									// calcula o numero de pagina para apresentar as pessoas

									$num_pagina = ceil($total_atendimento/$quantidade_pg);

									// calcular o inicio da visualização 

									$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

									//selecionar as pessoas a serem apresentados na pagina 

									$result_atendimento = mysql_query("SELECT * 
									FROM tb_atendimento a INNER JOIN tb_usuario u ON a.CDUSUARIO = u.CDUSUARIO
														  INNER JOIN tb_pessoa p  ON a.CDPESSOA = p.CDPESSOA ORDER BY NMPESSOA ASC limit $incio, $quantidade_pg");
									
									$total_atendimentos = mysql_num_rows($result_atendimento);


									
											while($linhas = mysql_fetch_array($result_atendimento)){
												
													$Hinicial=$linhas['HRINICIO'];
													$Hfinal=$linhas['HRFINAL'];

													if($Hinicial<>"" && $Hfinal<>""){


														$unix_inicial = strtotime($Hinicial);
														$unix_final = strtotime($Hfinal);

														$nHoras   = ($unix_final - $unix_inicial) / 3600;
														$nMinutos = (($unix_final - $unix_inicial) % 3600) / 60;

														$tempo = sprintf('%02d:%02d', $nHoras , $nMinutos);
														
													}

													
													echo"<tr data-nomeinstrutor='$linhas[NMUSUARIO]' data-dtincio='$linhas[DTATENDIMENTO]'  data-dtfinal='$linhas[DTATENDIMENTO]'>";	
													
													echo "<td>".$linhas['CDATENDIMENTO']."</td>";


													echo "<td>".$linhas['NMPESSOA']."</td>";

													if($linhas['IMPRESSAO']=='S'){
														echo "<td><i class='glyphicon glyphicon-print'></i> </td>";
													}
													else{
														echo "<td> </td>";
													}
													
													
													
													if($tempo< 1){
														echo "<td>".$tempo."<b>&nbsp; min</b></td>";
													}else{
														echo "<td>".$tempo."<b>&nbsp; hr</b></td>";
													}
													
													echo "<td>".$linhas['NMUSUARIO']."</td>";
												
											?>
											<td> 
													
													<?php if($_SESSION['usuarioPerfil'] == '1'){ ?>

														 <a class='btn btn-xs btn-primary' href='principal.php?link=14&id=<?php 
													 
														echo $linhas['CDATENDIMENTO'];?>'>
															 <type='button' class="glyphicon glyphicon-eye-open"/>
														 </a> 
														 
														 <a class='btn btn-xs btn-warning' href='principal.php?link=12&id=<?php 
														 
														echo $linhas['CDATENDIMENTO'];?>'>
															<type = 'button'  class='glyphicon glyphicon-plus'/>
														 </a>

													<?php } else { ?>

														<a class='btn btn-xs btn-primary' href='principalinst.php?link=14&id=<?php 
													 
														echo $linhas['CDATENDIMENTO'];?>'>
															 <type='button' class="glyphicon glyphicon-eye-open"/>
														 </a> 
														 
														 <a class='btn btn-xs btn-warning' href='principalinst.php?link=12&id=<?php 
														 
														echo $linhas['CDATENDIMENTO'];?>'>
															<type = 'button'  class='glyphicon glyphicon-plus'/>
														 </a>


													<?php } ?>
													
													 		
													 
											 </td>
											<?php
												echo "</tr>";
											}
											?>

								</tbody>
							</table>
						</div>

						<?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
						<nav class="text-center">
							<ul class="pagination">
								<li>
									<?php
									if($pagina_anterior != 0){ ?>
										<a href="principal.php?link=8&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php }  ?>
								</li>
								<?php 
								//Apresentar a paginacao
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="principal.php?link=8&pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php } ?>
								<li>
									<?php
									if($pagina_posterior <= $num_pagina){ ?>
										<a href="principal.php?link=8&pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&raquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&raquo;</span>
								<?php }  ?>
								</li>
							</ul>
						</nav>
						
					</div><!-- /.container-fluid -->
				</div>
        </div><!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/pesquisa.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	

<script src="js/jquery-ui.min.js"></script>
	    <script src="js/datepicker-pt-BR.js"></script>
	    <script>
	    		
	    		$("#datai").datepicker($.datepicker.regional[ "pt-br" ]);

	    </script>

</body>

</html>
