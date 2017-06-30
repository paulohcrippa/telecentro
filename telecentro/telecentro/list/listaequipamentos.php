
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
<script language="Javascript" src="js/jquery-1.11.1.min.js"></script>




</head>


<body>

	<div id="wrapper"> <!--inicio da div wrapper-->

		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"> Equipamentos <br><small> Lista de equipamentos cadastrados no sistema </small> </h1>
							<ol class="breadcrumb">
								<li class=""> Página Inicial </li>
								<li class="active">Equipamentos </li>
							</ol>
					</div>
				</div>
	
				<div class="col-sm-7 col-md-7 ">
					<a class="btn btn-success" href="principal.php?link=50"><span class="glyphicon glyphicon-plus"></span> Novo</a>

				</div>

				<div class="col-md-3 col-md-offset-2 ">
					<form class="navbar-form navbar-left"  role="search">
					
					  <div  class="form-group">
					    	<type  class='glyphicon glyphicon-search'/> <input type="text" id="pesquisar_equipamento"  name="pesquisarequipamento"   placeholder="Pesquisar" class="input-medium search-query form-control">
					  </div>
					</form>
				</div>

				</br></br>
				<!-- /.row --> 
				<div id="resultadoequipamento"> 
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<table class = " table table-striped ">
								<thead>
									<tr class="info">
										<th width="90" aling="center">Código</th>
										<th width="270" aling="center"><span class="style9"><b>Descrição</b></span></th>
										<th width="260" aling="center"><span class="style9"><b>Estado de Conservação</b></span></th>     
										<th width="200" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
								<tbody>
								 
										<?php

										//paginacao verifica se esta sendo passado na url a pagina atual

										$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
																				
										$sql_visualizar = mysql_query("SELECT  * FROM tb_equipamento ORDER BY DSEQUIPAMENTO");

										//contar o total de pessoas
										$total_equipamento = mysql_num_rows($sql_visualizar);

										// setar a quantidade de pessoas por pagina

										$quantidade_pg = 10;

										// calcula o numero de pagina para apresentar as pessoas

										$num_pagina = ceil($total_equipamento/$quantidade_pg);

										// calcular o inicio da visualização 

										$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

										$result_equipamentos = mysql_query("SELECT  * FROM tb_equipamento limit $incio, $quantidade_pg");

										$total_equipamentos = mysql_num_rows($result_equipamentos);

										
										while($linhas = mysql_fetch_assoc($result_equipamentos)){
												echo"<tr>";
													echo "<td>".$linhas['CDEQUIPAMENTO']."</td>";
													echo "<td>".$linhas['DSEQUIPAMENTO']."</td>";
													echo "<td>".$linhas['ESTCONSERVA']."</td>";																							
												?>
												
												<td> 

														<?php if($_SESSION['usuarioPerfil'] == '1'){ ?>

														 <a class='btn btn-xs btn-primary' href='principal.php?link=20&id=<?php 
														 
														echo $linhas['CDEQUIPAMENTO'];?>'>
															 <type='button' class="glyphicon glyphicon-eye-open"/>
														 </a> 
														 
														 <a class='btn btn-xs btn-warning'  href='principal.php?link=51&id=<?php 
														 
														echo $linhas['CDEQUIPAMENTO'];?>'>
															<type = 'button'  class='glyphicon glyphicon-pencil'/>
														 </a>
														 																								
														<a class='btn btn-xs btn-danger'  onclick="excluir(<?php echo $linhas['CDEQUIPAMENTO']; ?> )" > <type='' class='glyphicon glyphicon-trash'/> </a> 


													<?php } else { ?>

														<a class='btn btn-xs btn-primary' href='principalinst.php?link=20&id=<?php 
														 
														echo $linhas['CDEQUIPAMENTO'];?>'>
															 <type='button' class="glyphicon glyphicon-eye-open"/>
														 </a> 
														 
														 <a class='btn btn-xs btn-warning'  href='principalinst.php?link=51&id=<?php 
														 
														echo $linhas['CDEQUIPAMENTO'];?>'>
															<type = 'button'  class='glyphicon glyphicon-pencil'/>
														 </a>
														 																								
														<a class='btn btn-xs btn-danger'  onclick="excluir(<?php echo $linhas['CDEQUIPAMENTO']; ?> )" > <type='' class='glyphicon glyphicon-trash'/> </a> 



													<?php } ?>
													

													
												 </td>
												<?php
													echo "</tr>";
										}
												?>
								
								</tbody>

								

							</table>
						</div> <!-- fim da div col-xs-12 col-md-12 -->
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
										<a href="principal.php?link=49&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php }  ?>
								</li>
								<?php 
								//Apresentar a paginacao
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="principal.php?link=49&pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php } ?>
								<li>
									<?php
									if($pagina_posterior <= $num_pagina){ ?>
										<a href="principal.php?link=49&pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&raquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&raquo;</span>
								<?php }  ?>
								</li>
							</ul>
						</nav>
					</div><!-- /.row -->			
				</div>	
			</div><!-- /#page-wrapper -->
		</div>
	</div><!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/pesquisa.js"></script>
	
	<script language ="JavaScript">
		
		function excluir(id)
		 {
		 	
			  
			  var apagar = confirm('Deseja Excluir o equipamento');
		   
		    if (apagar){
		        location.href = 'processa/proc_exc_equipamento.php?id='+ id;
		        }else{
		        
		        }    
		} 
	</script>

 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	

</body>

</html>
