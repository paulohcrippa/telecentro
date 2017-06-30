<!DOCTYPE html>

<?php
	$id = $_GET['id'];
	// execulta a query e conta quantas linhas e traz somente um usuario
	$consulta = mysql_query("SELECT * FROM tb_equipamento WHERE CDEQUIPAMENTO = '$id' LIMIT 1");
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
								Visualizar Equipamento<small>  </small>
							</h1>
							<ol class="breadcrumb">
								<li class="">
									Página inicial
								</li>
								<li class="">
									Lista Equipamento
								</li>
								<li class="active" >
									Visualizar Equipamento
								</li>
							</ol>
						</div>
					</div>
					<div class="col-sm-12">

					</div></br></br>
					<!-- /.row -->  
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<form class="form-horizontal" role="form" method = "POST" action = " ">
									
										<div class="form-group">
												<label class="control-label col-sm-2" for="nome">Código:</label> 
													<div class="col-sm-1">
													  <input type="text" class="form-control" name="codigo" id="codigo"  disabled Value ="<?php echo $resultado['CDEQUIPAMENTO']; ?>"> 
													</div>
										  </div>
										
										 <div class="form-group">
												<label class="control-label col-sm-2" for="nome">Descrição do Equipamento:</label> 
												<div class="col-sm-4">
													<input type="text" class="form-control" name="dstpatend" id="dstpatend"  disabled Value ="<?php echo $resultado['DSEQUIPAMENTO']; ?>"> 
												</div>
										  </div>
										  <div class="form-group">
												<label class="control-label col-sm-2" for="nome">Estado de Conservação:</label> 
												<div class="col-sm-4">
													<input type="text" class="form-control" name="dstpatend" id="dstpatend"  disabled Value ="<?php echo $resultado['ESTCONSERVA']; ?>"> 
												</div>
										  </div>
										  <div class="form-group">
												<label class="control-label col-sm-2" for="nome">Nº do Patrimônio:</label> 
												<div class="col-sm-4">
													<input type="text" class="form-control" name="dstpatend" id="dstpatend"  disabled Value ="<?php echo $resultado['NUPATRIMONIO']; ?>"> 
												</div>
										  </div>
										  <div class="form-group">
												<label class="control-label col-sm-2" for="nome">Data da Situação:</label> 
												<div class="col-sm-4">
													<input type="text" class="form-control" name="dstpatend" id="dstpatend"  disabled Value ="<?php echo $resultado['DTSITUACAO']; ?>"> 
												</div>
										  </div>
										  <div class="form-group">
												<label class="control-label col-sm-2" for="nome">Observação:</label> 
												<div class="col-sm-4">
													<input type="text" class="form-control" name="dstpatend" id="dstpatend"  disabled Value ="<?php echo $resultado['OBSEQUIPAMENTO']; ?>"> 
												</div>
										  </div>
										  <input type="hidden" name="id" > 
										  <div class="form-group"> 
											<div class="col-sm-offset-2 col-sm-10">
											  <button type="button" class="btn btn-success" onclick='javascript:history.back(-1);'>Voltar</button>
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
