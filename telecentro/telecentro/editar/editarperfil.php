<!DOCTYPE html>
<?php
	$id = $_GET['id'];
	// execulta a query e conta quantas linhas e traz somente um usuario
	$consulta = mysql_query("SELECT * FROM tb_perfil WHERE CDPERFIL = '$id' LIMIT 1");
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
	                            Editar Perfil<br><small> Altera as informações do perfil no sistema </small>								
	                        </h1>
		                    <ol class="breadcrumb">
		                        <li class="">
		                            Página Inicial
		                        </li>
								<li class="">
		                            Lista de Perfis
		                        </li>
								<li class="active">
		                            Editar Perfil
		                        </li>
		                    </ol>
	                    </div>
	                </div>
	                <!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<form class="form-horizontal" role="form" method = "POST" action = "processa/proc_editar_perfil.php">
								<fieldset>
									<legend><font color="red">*</font> Campos Obrigatórios</legend>
									<div class="form-group">
										<label class="control-label col-sm-2" for="nome">Código:</label>
										<div class="col-sm-1">
										 	<input type="text" class="form-control" name="codigo" id="codigo"  disabled Value ="<?php echo $resultado['CDPERFIL']; ?>"> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="nome"><font color="red">*</font> Nome:</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="nome" id="nome"  Value ="<?php echo $resultado['NMPERFIL']; ?>" required> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="Descrição"><font color="red">*</font> Descrição:</label>
										<div class="col-sm-4">
											<textarea class="form-control" rows="3" name="descricao" id="descricao" ><?php echo $resultado['DSPERFIL']; ?></textarea>
										</div>
									</div>											  
									<input type="hidden" name="id" value="<?php echo $resultado['CDPERFIL']; ?>" > 
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