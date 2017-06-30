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
							<h1 class="page-header"> Perfis do Sistema<small>  </small> </h1>
							<ol class="breadcrumb">
								<li class=""> Página Inicial </li>
								<li class="active">Lista de Perfis</li>
							</ol>
						</div>
					</div>
					
					<div class="col-sm-6 col-md-6">
						<a class="btn btn-success" href="principal.php?link=10"><span class="glyphicon glyphicon-plus"></span> Novo</a>
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
										<th width="90" aling="center">Código</th>
										<th width="270" aling="center"><span class="style9"><b>Perfil</b></span></th>
										<th width="260" aling="center"><span class="style9"><b>Descrição</b></span></th>                                                   
										<th width="200" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
							
								<tbody>
									<?php
										$sql_visualizar = mysql_query("SELECT * FROM tb_perfil ORDER BY CDPERFIL");
										while($linhas = mysql_fetch_assoc($sql_visualizar)){
												echo"<tr>";	
													echo "<td>".$linhas['CDPERFIL']."</td>";
													echo "<td>".$linhas['NMPERFIL']."</td>";
													echo "<td>".$linhas['DSPERFIL']."</td>";
												
									?>
													<td> 
														<a class='btn btn-xs btn-warning'  href='principal.php?link=18&id=<?php echo $linhas['CDPERFIL'];?>'>
															<type = 'button'  class='glyphicon glyphicon-pencil'/>
														</a>
														<a class='btn btn-xs btn-danger' data-toggle="modal" data-target="#delete-modal" >
															<type='' class='glyphicon glyphicon-trash'/>
														</a> 
														<!-- Modal -->
														<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
																			<span aria-hidden="true">&times;</span>
																		</button>
																		<h4 class="modal-title" id="modalLabel">Excluir Perfil</h4>
																	</div>
																	<div class="modal-body">
																		Deseja realmente excluir este Perfil?
																	</div>
																	<div class="modal-footer">
																		<a type="button" class="btn btn-danger" href='processa/proc_exc_perfil.php?&id=<?php echo $linhas['CDPERFIL'];?>'>Sim</a>
																		<button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
																	</div>
																</div>
															</div>
														</div> <!-- /.modal -->
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
		</script>
	</body>
</html>
