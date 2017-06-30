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
							<h1 class="page-header">Fornecedores <small>  </small> </h1>
							<ol class="breadcrumb">
								<li class=""> Página Inicial </li>
								<li class="active">Lista de Fornecedores</li>
							</ol>
						</div>
					</div>
					
					<div class="col-sm-6 col-md-6">
						<a class="btn btn-success" href="principal.php?link=53"><span class="glyphicon glyphicon-plus"></span> Novo</a>
					</div>
					
					<div class="col-md-4 col-md-offset-2 ">
						<form class="navbar-form navbar-left" method="GET" action="pesquisar.php" role="search">
							<div  class="form-group">
								<input type="text" name="pesquisar" class="form-control" placeholder="Pesquisar">
							</div>
							<button type="submit" class="btn btn-primary">Pesquisar</button>
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
										<th width="500" aling="center"><span class="style9"><b>Nome do Fornecedor</b></span></th>									    
										<th width="50" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
							
								<tbody>
									<?php
										$sql_visualizar = mysql_query("SELECT * FROM tb_fornecedor ORDER BY NMFORNECEDOR");
										while($linhas = mysql_fetch_assoc($sql_visualizar)){
												echo"<tr>";	
													echo "<td>".$linhas['CDFORNECEDOR']."</td>";
													echo "<td>".$linhas['NMFORNECEDOR']."</td>";																			
									?>
													<td> 
														<a class='btn btn-xs btn-warning'  href='principal.php?link=54&id=<?php echo $linhas['CDFORNECEDOR'];?>'>
															<type = 'button'  class='glyphicon glyphicon-pencil'/>
														</a>
														<a class='btn btn-xs btn-danger'  onclick="excluir(<?php echo $linhas['CDFORNECEDOR']; ?> )" > <type='' class='glyphicon glyphicon-trash'/> </a> 
														
														
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
		 	
			  
			  var apagar = confirm('Deseja excluir este Fornecedor');
		   
		    if (apagar){
		        location.href = 'processa/proc_exc_fornecedor.php?id='+ id;
		        }else{
		        
		        }    
		} 
		</script>
	</body>
</html>
