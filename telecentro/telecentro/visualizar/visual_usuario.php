<!DOCTYPE html>

<?php
	$id = $_GET['id'];
	// execulta a query e conta quantas linhas e traz somente um usuario
	$consulta = mysql_query("SELECT * FROM tb_usuario WHERE CDUSUARIO = '$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($consulta);
	
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
                           Visualizar Usuário<small>  </small>
							
							
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                 Página inicial
                            </li>
							<li class="">
                                Tela de usuários
                            </li>
							<li class="active" >
                                 Visualizar usuários
                            </li>
                        </ol>
                    </div>
                </div>
				<div class="col-sm-12">
    

        </div></br></br>
                <!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<form class="form-horizontal" role="form" method = "POST" action = "principal.php?link=1">
									
										<div class="form-group">
												<label class="control-label col-sm-2" for="nome">Código:</label> 
													<div class="col-sm-1">
													  <input type="text" class="form-control" name="codigo" id="codigo"  disabled Value ="<?php echo $resultado['CDUSUARIO']; ?>"> 
													</div>
										  </div>
										
										 <div class="form-group">
												<label class="control-label col-sm-2" for="nome">Nome:</label> 
													<div class="col-sm-4">
													  <input type="text" class="form-control" name="nome" id="nome"  disabled Value ="<?php echo $resultado['NMUSUARIO']; ?>"> 
													</div>
										  </div>
										  
										  <div class="form-group">
												<label class="control-label col-sm-2" for="telefone">Telefone:</label>
													<div class="col-sm-3"> 
													  <input type="text" class="form-control" disabled id="telefone" name="telefone" Value ="<?php echo $resultado['FONERES']; ?>">
													</div>
										  </div>

										  <div class="form-group">
												<label class="control-label col-sm-2" for="telefone">Celular:</label>
													<div class="col-sm-3"> 
													  <input type="text" class="form-control" disabled id="celular" name="celular" Value ="<?php echo $resultado['FONECEL']; ?>">
													</div>
										  </div>


										  <div class="form-group">
												<label class="control-label col-sm-2" for="Email">Email:</label>
													<div class="col-sm-3"> 
													  <input type="text" class="form-control" disabled id="email" name="email" Value ="<?php echo $resultado['EMAIL']; ?>">
													</div>
										  </div>
										  <div class="form-group">
												<label class="control-label col-sm-2" for="usuario">Usuário:</label> 
													<div class="col-sm-3"> 
													  <input type="text" class="form-control" disabled id="usuario" name="usuario" Value ="<?php echo $resultado['LOGIN']; ?>">
													</div>
										  </div>
										  <div class="form-group">
												<label class="control-label col-sm-2" for="usuario">Senha:</label> 
													<div class="col-sm-3"> 
													  <input type="text" class="form-control" id="senha" disabled name="senha" Value ="<?php echo $resultado['SENHA']; ?>"> 
													</div>
										  </div>
										  <div class="form-group">
												<label class="control-label col-sm-2" for="pefil">Nível de Acesso:</label> 
													<div class="col-sm-3"> 
														<select class="form-control" disabled name="nivel_de_acesso">
															<option>Selecione</option>
															<option value = "1"
															  <?php
																 if($resultado['CDPERFIL'] == 1){
																	 echo 'selected';
																 }
															  
																?>
																> Administrativo </option>
															<option value="2"
															<?php
																 if($resultado['CDPERFIL'] == 2){
																	 echo 'selected';
																 }
															  
															  ?>
															> Funcionário</option>
														</select>
													</div>
										  </div>
										  
										  <input type="hidden" name="id" > 
										  <div class="form-group"> 
											<div class="col-sm-offset-2 col-sm-10">
											  <button type="submit" class="btn btn-primary">Voltar</button>
											</div>
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
