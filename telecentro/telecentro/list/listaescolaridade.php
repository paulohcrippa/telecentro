<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
	<head>
		<script language="Javascript"></script>
	</head>
	<body>
		<div id="wrapper"> <!--inicio da div wrapper-->
			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Cadastro de Escolaridade<small>  </small> </h1>
							<ol class="breadcrumb">
								<li class=""> Página Inicial </li>
								<li class="active">Lista de Escolaridades</li>
							</ol>
						</div>
					</div>
					
					<div class="col-sm-7 col-md-7">
						<a class="btn btn-success" href="principal.php?link=35"><span class="glyphicon glyphicon-plus"></span> Novo</a>
					</div>
					
					<div class="col-md-3 col-md-offset-2 ">
						<form class="navbar-form navbar-left"  role="search">
						
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-search" id="basic-addon1"></span>
								<input type="text" class="input-medium search-query form-control" id="pesquisarescolaridade"  name="pesquisarescolaridade" placeholder="Pesquisar" aria-describedby="basic-addon1">
							</div>
						</form>
					</div>
					</br></br>
					<!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<table  class = " table table-striped ">
								<thead>
									<tr class="info">
										<th width="100" aling="center">Código</th>
										<th width="500" aling="center"><span class="style9"><b>Descrição da Escolaridade</b></span></th>									    
										<th width="50" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
							
								<tbody>
									<?php
										$sql_visualizar = mysql_query("SELECT * FROM tb_escolaridade ORDER BY DSESCOLARIDADE");
										while($linhas = mysql_fetch_assoc($sql_visualizar)){
												echo"<tr>";	
													echo "<td>".$linhas['CDESCOLARIDADE']."</td>";
													echo "<td>".$linhas['DSESCOLARIDADE']."</td>";																			
									?>
													<td> 
														<a class='btn btn-xs btn-warning'  href='principal.php?link=36&id=<?php echo $linhas['CDESCOLARIDADE'];?>'>
															<type = 'button'  class='glyphicon glyphicon-pencil'/>
														</a>
														<a class='btn btn-xs btn-danger'  onclick="excluir(<?php echo $linhas['CDESCOLARIDADE']; ?> )" > <type='' class='glyphicon glyphicon-trash'/> </a> 
														
														
													</td> 
									<?php
												echo "</tr>";
											}
									?>	
								</tbody>
							</table>
						</div> <!-- fim da div col-xs-12 col-md-12 -->
					</div><!-- /.row -->
				</div><!-- /#page-wrapper -->
			</div>
		</div><!-- /#wrapper -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="js/plugins/morris/raphael.min.js"></script>
		<script src="js/plugins/morris/morris.min.js"></script>
		<script src="js/plugins/morris/morris-data.js"></script>
	
		<script>
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
	                responsive: true
				});
			});
		</script language ="JavaScript">
		<script>
		function excluir(id)
		 {
		 	
			  
			  var apagar = confirm('Deseja excluir esta Escolaridade');
		   
		    if (apagar){
		        location.href = 'processa/proc_exc_escolaridade.php?id='+ id;
		        }else{
		        
		        }    
		} 
		</script>
	</body>
</html>
