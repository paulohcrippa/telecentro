<!DOCTYPE html>
<?php 
	session_start();

	include_once("login/seguranca.php");
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
                            Cadastro de Pessoas<small> <br />Lista de Pessoas Cadastradas no Sistema </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                Página Inicial
                            </li>
							<li class="active">
                                Lista de Pessoas
                            </li>
                        </ol>
                    </div>
                </div>
				<div class="col-sm-7">
				    <?php
				    	if($_SESSION['usuarioPerfil'] == '1'){

				    		echo "<a class='btn btn-success' href='principal.php?link=6'><span class='glyphicon glyphicon-plus'></span> Novo</a>";
				    	}else
				    	{
				    		echo "<a class='btn btn-success' href='principalinst.php?link=6'><span class='glyphicon glyphicon-plus'></span> Novo</a>";
				    	}

				     ?>
                	
        		</div>

        		<div class="col-md-3 col-md-offset-2 ">
					<form class="navbar-form navbar-left"  role="search">
					
						 <div class="input-group">
						  <span class="input-group-addon glyphicon glyphicon-search" id="basic-addon1"></span>
						  <input type="text" class="input-medium search-query form-control" id="pesquisarpessoa"  name="pesquisarpessoa" placeholder="Pesquisar" aria-describedby="basic-addon1">
						</div>
					</form>
				</div>

        		</br></br>

        		<div id="resultadopessoa">
                <!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<table class = " table table-striped ">
									<thead>
										<tr class="info">
											<th width= "80" aling="center">Código</th>
											<th width="300" aling="center"><span class="style9"><b>Nome</b></span></th>
											<th width="180" aling="center"><span class="style9"><b>Contato</b></span></th>
											<th width="150" aling="center"><span class="style9"><b>Idade</b></span></th>     
											<th width="200" aling="center"><span class="style9"><b>Situação Escolar</b></span></th>
											<th width="" aling="center"><span class="style9"><b>Ações</b></span></th>
										</tr>
									</thead>
								<tbody>
										<?php

											//paginacao verifica se esta sendo passado na url a pagina atual

											$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

											$sql_visualizar = mysql_query("SELECT *	FROM tb_pessoa ORDER BY NMPESSOA ");

											//contar o total de pessoas
										     $total_pessoa = mysql_num_rows($sql_visualizar);

											// setar a quantidade de pessoas por pagina

											$quantidade_pg = 15;

											// calcula o numero de pagina para apresentar as pessoas

											$num_pagina = ceil($total_pessoa/$quantidade_pg);

											// calcular o inicio da visualização 

											$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

											//selecionar as pessoas a serem apresentados na pagina 

											$result_pessoas = mysql_query("SELECT * FROM tb_pessoa ORDER BY  NMPESSOA  ASC limit $incio, $quantidade_pg");
									
											$total_pessoas = mysql_num_rows($result_pessoas);

									
											while($linhas = mysql_fetch_assoc($result_pessoas)){
												
												$celpessoa=$linhas['FONECEL'];
												$fonepessoa=$linhas['FONERES'];

													echo"<tr>";	
													echo "<td>".$linhas['CDPESSOA']."</td>";
													echo "<td>".$linhas['NMPESSOA']."</td>";
													
													if($celpessoa <>""){
														echo "<td>".$linhas['FONECEL']."</td>";
													}else{
														echo "<td>".$linhas['FONERES']."</td>";
													}
													echo"<td>".$linhas['IDADE']."</td>";	
													echo "<td>".$linhas['SITUACAO']."</td>";
												?>

											<td> 
													

												
												    	<?php if($_SESSION['usuarioPerfil'] == '1'){ ?>

												    		<a class='btn btn-xs btn-default' href='imprimir_form_pessoa.php?id=<?php 
													 
															echo $linhas['CDPESSOA'];?>'/>
																 
																 <type='button' class="glyphicon glyphicon-print"/>
															 </a> 

															 <a class='btn btn-xs btn-primary' href='principal.php?link=60&id=<?php 
															 
															echo $linhas['CDPESSOA'];?>'>
																 <type='button' class="glyphicon glyphicon-eye-open"/>
															 </a> 
															 
															 <a class='btn btn-xs btn-warning'  href='principal.php?link=13&id=<?php 
															 
															echo $linhas['CDPESSOA'];?>'>
																<type = 'button'  class='glyphicon glyphicon-pencil'/>
															 </a>

												    	<?php } else{ ?>
												    		<a class='btn btn-xs btn-default' href='imprimir_form_pessoa.php?id=<?php 
													 
															echo $linhas['CDPESSOA'];?>'/>
																 
																 <type='button' class="glyphicon glyphicon-print"/>
															 </a> 

															 <a class='btn btn-xs btn-primary' href='principalinst.php?link=60&id=<?php 
															 
															echo $linhas['CDPESSOA'];?>'>
																 <type='button' class="glyphicon glyphicon-eye-open"/>
															 </a> 
															 
															 <a class='btn btn-xs btn-warning'  href='principalinst.php?link=13&id=<?php 
															 
															echo $linhas['CDPESSOA'];?>'>
																<type = 'button'  class='glyphicon glyphicon-pencil'/>
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
										<a href="principal.php?link=5&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php }  ?>
								</li>
								<?php 
								//Apresentar a paginacao
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="principal.php?link=5&pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php } ?>
								<li>
									<?php
									if($pagina_posterior <= $num_pagina){ ?>
										<a href="principal.php?link=5&pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
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


	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/pesquisa.js"></script>

    

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	
	<script>
    
$(document).ready(function() {
    $('#example').dataTable();
})
</script>

</body>

</html>
