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
								Cadastro de Usuário
							</h1>
							<ol class="breadcrumb">
								<li class="">
									<i class="glyphicon glyphicon-menu-right"></i> Página Inicial
								</li>
								<li class="">
									<i class="glyphicon glyphicon-menu-right"></i> Lista de Usuários
								</li>
								<li class="active">
									<i class="glyphicon glyphicon-menu-right"></i> Cadastro de Usuário
								</li>
							</ol>
						</div>
					</div>
					
					<!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<form class="form-horizontal" role="form" data-toggle="validator"  method = "POST" action = "processa/proc_cad_usuario.php">
								<fieldset>
									<legend><font color="red">*</font> Campos Obrigatórios</legend>
									<div class="form-group">
										<label class="control-label col-sm-2" for="nome"><font color="red">*</font> Nome:</label> 
										<div class="col-sm-4">
											 <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" required> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="telefone">Telefone:</label>
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="telefone" name="telefone" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="celular"><font color="red">*</font> Celular:</label>
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="celular" name="celular" placeholder="(XX)xxxxx-xxxx" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Email"><font color="red">*</font> Email:</label>
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="email" name="email" data-error="Por favor, informe um e-mail." required>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="usuario"><font color="red">*</font> Usuário:</label> 
										<div class="col-sm-3"> 
											<input type="text" class="form-control" id="usuario" name="usuario" placeholder="" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="usuario"><font color="red">*</font> Senha:</label> 
										<div class="col-sm-3"> 
											<input type="password" class="form-control" id="senha" name="senha" data-minlength="6"  placeholder="No mínimo 6 caracters" required> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="pefil"> <font color="red">*</font> Nível de Acesso:</label>
										<div class="col-sm-3"> 
											<select class="form-control" required aria-required="true"  name="perfil" >
												<option>Selecione o Pefil</option>
												<?php 
													$query = mysql_query ("select * FROM tb_perfil");
													while($res=mysql_fetch_array($query)){
														echo "<option value='{$res["CDPERFIL"]}'>{$res["NMPERFIL"]}</option>";
													}
												?>
											</select>
										</div>
										<div class="help-block with-errors"></div>
									</div>
									<div class="form-group"> 
											<div class="col-sm-offset-2 col-sm-10">
											  <button type="submit" class="btn btn-success">Cadastrar</button>
											  <button type="button"  onClick="JavaScript: window.history.back();" class="btn btn-primary">Cancelar</button>
											</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div><!-- /.container-fluid -->
					
				</div><!-- /#page-wrapper -->

			</div>
			<!-- /#wrapper -->
		</div>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
	 
		<script src="js/validator.js"></script>	
		
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- Morris Charts JavaScript -->
		<script src="js/plugins/morris/raphael.min.js"></script>
		<script src="js/plugins/morris/morris.min.js"></script>
		<script src="js/plugins/morris/morris-data.js"></script>
		
	</body>
</html>
