<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
	<style type="text/css">	</style>
	<body>
		<div id="wrapper">
		
        
			<div id="page-wrapper">

				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								Cadastro de Escolaridade<small>  </small>
							</h1>
							<ol class="breadcrumb">
								<li class="">
                                <i class="glyphicon glyphicon-menu-right"></i> Página Inicial
								</li>
								<li class="">
                                <i class="glyphicon glyphicon-menu-right"></i> Lista de Escolaridades
								</li>
								<li class="active">
									<i class="glyphicon glyphicon-menu-right"></i> Cadastrar Escolaridade
								</li>
							</ol>
						</div>
					</div>
					<div class="col-sm-12">
    

        </div>
                <!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<form class="form-horizontal" role="form" method = "POST" action = "processa/proc_cad_escolaridade.php">
									<fieldset>
										<legend><font color="red">*</font> Campo Obrigatório</legend>
										 <div class="form-group">
											<label class="control-label col-sm-2" for="nome"><font color="red">*</font> Descrição:</label>
											<div class="col-sm-4">
											  <input type="text" class="form-control" name="dsescolaridade" id="dsescolaridade" placeholder="Descrição da Escolaridade" required> 
											</div>
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
