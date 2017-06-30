<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<body>

    <div id="wrapper">
		
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Controle de Manutenção <br/><small> Lista de manutenções concluídas ou em andamento </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="glyphicon glyphicon-menu-right"></i> Página Inicial
                            </li>
							<li class="active">
                                <i class="glyphicon glyphicon-menu-right"></i> Lista de Manutenções 
                            </li>
                        </ol>
                    </div>
                </div>
				<div class="col-sm-9">
            
                	<a class="btn btn-success" href="principal.php?link=59"><span class="glyphicon glyphicon-plus"></span> Nova Manutenção</a>
          		</div>

          		<div class="col-md-3 ">
					<form class="navbar-form navbar-left"  role="search">
					  <div  class="form-group">
					    	<type  class='glyphicon glyphicon-search'/>	<input type="text" name="pesquisaratendimento" id="pesquisaratendimento" class="form-control" placeholder ="Pesquisar">
					  </div>
					</form>
				</div>

          		</br></br>

                <!-- /.row --> 
                <div id="resultadomanutencao">
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<table class = " table table-striped ">
									<thead>
									<tr class="info">
										<th width="100" aling="center">Nº</th>
										<th width="300" aling="center"><span class="style9"><b>Descrição</b></span></th>
										<th width="180" aling="center"><span class="style9"><b>Data de Saída</b></span></th>   
										<th width="180" aling="center"><span class="style9"><b>Data do Retorno</b></span></th>
										<th width="150" aling="center"><span class="style9"><b>Responsável</b></span></th>
										<th width="" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
								<tbody>		


									<?php

										//paginacao verifica se esta sendo passado na url a pagina atual

										$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

										$sql_visualizar = mysql_query("SELECT  * FROM tb_manutencao ORDER BY DSMANUTENCAO");

										//contar o total de pessoas
										$total_manutencao = mysql_num_rows($sql_visualizar);

										// setar a quantidade de pessoas por pagina

										$quantidade_pg = 10;

										// calcula o numero de pagina para apresentar as pessoas

										$num_pagina = ceil($total_manutencao/$quantidade_pg);

										// calcular o inicio da visualização 

										$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

										$result_manutencao = mysql_query("SELECT * FROM tb_manutencao a INNER JOIN tb_usuario u ON a.CDUSUARIO = u.CDUSUARIO ORDER BY DSMANUTENCAO ASC limit $incio, $quantidade_pg");

										$total_manutencao = mysql_num_rows($result_manutencao);


												while($linhas = mysql_fetch_array($result_manutencao)){
													
													echo"<tr>";	
													echo "<td>".$linhas['CDMANUTENCAO']."</td>";
													echo "<td>".$linhas['DSMANUTENCAO']."</td>";
													echo "<td>".$linhas['DTSAIDA']."</td>";
													echo "<td>".$linhas['DTRETORNO']."</td>";
													echo "<td>".$linhas['NMUSUARIO']."</td>";
												
											?>
											<td> 
											

													<?php if($_SESSION['usuarioPerfil'] == '1'){ ?>

														<a class='btn btn-xs btn-primary' href='principal.php?link=66&id=<?php 
													 
													echo $linhas['CDMANUTENCAO'];?>'>
														 <type='button' class="glyphicon glyphicon-eye-open"/>
													 </a> 
													 
													 <a class='btn btn-xs btn-warning'  href='principal.php?link=57&id=
														<?php 
															echo $linhas['CDMANUTENCAO'];
														?>'>
														<type = 'button'  class='glyphicon glyphicon-pencil'/>
													</a>	


													<?php } else { ?>

														 
														<a class='btn btn-xs btn-primary' href='principalinst.php?link=66&id=<?php 
													 
													echo $linhas['CDMANUTENCAO'];?>'>
														 <type='button' class="glyphicon glyphicon-eye-open"/>
													 </a> 
													 
													 <a class='btn btn-xs btn-warning'  href='principalinst.php?link=57&id=
														<?php 
															echo $linhas['CDMANUTENCAO'];
														?>'>
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
										<a href="principal.php?link=58&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&laquo;</span>
								<?php }  ?>
								</li>
								<?php 
								//Apresentar a paginacao
								for($i = 1; $i < $num_pagina + 1; $i++){ ?>
									<li><a href="principal.php?link=58&pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php } ?>
								<li>
									<?php
									if($pagina_posterior <= $num_pagina){ ?>
										<a href="principal.php?link=58&pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
											<span aria-hidden="true">&raquo;</span>
										</a>
									<?php }else{ ?>
										<span aria-hidden="true">&raquo;</span>
								<?php }  ?>
								</li>
							</ul>
						</nav>
						</div>

						
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
	
	<script>
    
$(document).ready(function() {
    $('#example').dataTable();
})
</script>

</body>

</html>
