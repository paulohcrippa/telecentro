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
	                            Editar Usuário<br><small> Alterar informações do usuário no sistema </small>
	                        </h1>
		                    <ol class="breadcrumb">
		                        <li class="">
		                            Página Inicial
		                        </li>
								<li class="">
		                            Lista Usuários
		                        </li>
								<li class="active">
		                            Editar Usuários
		                        </li>
		                    </ol>
	                    </div>
	                </div>

	                <!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<form class="form-horizontal" role="form" method = "POST" action = "processa/proc_editar_usuario.php">
								<fieldset>
									<legend><font color="red">*</font> Campos Obrigatórios</legend>
									<div class="form-group">
										<label class="control-label col-sm-2" for="nome">Código:</label>
										<div class="col-sm-1">
											<input type="text" class="form-control" name="codigo" id="codigo"  disabled Value ="<?php echo $resultado['CDUSUARIO']; ?>"> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="nome"><font color="red">*</font> Nome:</label> 
										<div class="col-sm-4">
										 	<input type="text" class="form-control" name="nome" id="nome"  Value ="<?php echo $resultado['NMUSUARIO']; ?>" required> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="telefone">Telefone:</label>
											<div class="col-sm-3"> 
											  	<input type="text" class="form-control" id="telefone" name="telefone" Value ="<?php echo $resultado['FONERES']; ?>">
											</div>
									</div>
								  	<div class="form-group">
										<label class="control-label col-sm-2" for="telefone"><font color="red">*</font> Celular:</label>
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="celular" name="celular" Value ="<?php echo $resultado['FONECEL']; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Email"><font color="red">*</font> Email:</label>
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="email" name="email" Value ="<?php echo $resultado['EMAIL']; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="usuario"><font color="red">*</font> Usuário:</label>
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="usuario" name="usuario" Value ="<?php echo $resultado['LOGIN']; ?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="senha"><font color="red">*</font> Senha:</label> 
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="senha" name="senha" Value ="<?php echo $resultado['SENHA']; ?>" required> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="pefil"><font color="red">*</font> Nível de Acesso:</label> 
										<div class="col-sm-3"> 
											<select class="form-control" name="nivel_de_acesso">
												<option>Selecione</option>
												<option value = "1"
													<?php
												 		if($resultado['CDPERFIL'] == 1){
													 		echo 'selected';
												 		}
											  		?>
												> Coodernador </option>
												<option value="2"
													<?php
												 		if($resultado['CDPERFIL'] == 2){
													 		echo 'selected';
												 		}
											  		?>
												> Instrutor</option>
											</select>
										</div>
									</div>
									<input type="hidden" name="id" value="<?php echo $resultado['CDUSUARIO']; ?>" > 
									<div class="form-group"> 
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" class="btn btn-warning">Salvar Alteração</button>
											<button type="button"  onClick="JavaScript: window.history.back();" class="btn btn-primary">Cancelar</button>
										</div>
									</div>
								</fieldset>
							</form>
						</div> <!--/#col-xs-12 col-md-12 -->
					</div>	<!-- /#row -->						
				</div><!-- /#container-fluid -->
	        </div><!-- /#page-wrapper -->
	    </div> <!-- /#wrapper -->

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