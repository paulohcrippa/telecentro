<?php 
	date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
	<script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
	<script type='text/javascript' src='js/modal.js'></script>
	<script type='text/javascript' src='js/functions.js'></script>
	<script src="http://momentjs.com/downloads/moment-with-locales.js"></script>
	<script src="http://momentjs.com/downloads/moment-timezone-with-data.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.min.css">



	<head>

		<script LANGUAGE="JavaScript">
			
			function addNow() {
			  nowTime = moment().tz("Brasil/brasilia").format('HH:mm:ss');
			  document.getElementById('registration-time').value = nowTime;
			  set = setTimeout(function () { addNow(); }, 1000);
			}

			function stopNow() {
			  clearTimeout(set);
			}

			function verificardados(){

				hrinicial = 1;// document.getElementById('registration-times').value();
				hrfinal = 2;//document.getElementById('hrfinal').value();

				if(hrfinal<hrinicial){

					alert("hora final é menor que a inicial");
				}else{

					alert("enviado com sucesso");
					//document.getElementById('form').submit();
				}

			}

			function _Mostraimpressao(bool)
			{
				if (bool) {
				document.getElementById("labeltpimpressao").style.display = "";
				document.getElementById("labelqtdimpressao").style.display = "";
				document.getElementById("tpimpressao").style.display = "";
				document.getElementById("qtdimpressao").style.display = "";
				document.getElementById("menos-campos-impressao").style.display = "";
				document.getElementById("add-campos-impressao").style.display = "";

				
				
				
				} else {
				document.getElementById("labeltpimpressao").style.display = "none";
				document.getElementById("labelqtdimpressao").style.display = "none";
				document.getElementById("tpimpressao").style.display = "none";
				document.getElementById("qtdimpressao").style.display = "none";
				document.getElementById("menos-campos-impressao").style.display = "none";
				document.getElementById("add-campos-impressao").style.display = "none";
				
				
				}
			}


			 function select(VALOR) {
				   	 var $this = VALOR;

				    var codigo = VALOR.value;
				    var nome = VALOR.options[VALOR.selectedIndex].innerHTML
				    
				    var tr = '<tr>'+
				      '<td>'+codigo+'<input type="hidden" name="codigoatividade[]" value="'+codigo+'" />'+
				    '<input type="hidden" name="nomeatividade[]" value="'+nome+'" />'+'</td>'+
				      '<td>'+nome+'</td>'+
				      '<td><button type="button" name="remover" onclick="RemoveTableRow(this)"  class="btn btn-danger">Remover </button> </td>'+
				      '</tr>'
				    $('#grid').find('tbody').append( tr );

				    var hiddens = '<input type="hidden" name="codigoatendimento[]" value="'+codigo+'" />'+
				    '<input type="hidden" name="nomeatendimento[]" value="'+nome+'" />';


				    $('#form_insert').find('fieldset').append( hiddens );

				    return false;

			};

			(function($) {

			  RemoveTableRow = function(handler) {
			    var tr = $(handler).closest('tr');

			    tr.fadeOut(400, function(){ 
			      tr.remove(); 
			    }); 

			    return false;
			  };
			})(jQuery);

			// cria novos campos para impressão
			jQuery(document).ready(function($) {
				
				$('#add-campos-impressao').click(function(event) {
					event.preventDefault();
					$('#div-impressao').find('.form-group').clone().insertBefore('.marco-elementos-inseridos');
				});

				
			});

			function mascara(t, mask){
			 var i = t.value.length;
			 var saida = mask.substring(1,0);
			 var texto = mask.substring(i)
			 if (texto.substring(0,1) != saida){
			 t.value += texto.substring(0,1);
			 }
		 }

		jQuery(document).ready(function($) {
 				$(document).on('click', '#menosimpressao', function () {
		            $(this).parents('#div-impressao').remove();
			        return false;
			    });
		});

		

		</SCRIPT>


	</head>

	<body>
		<div id="wrapper">     
			<div id="page-wrapper">
				<div class="container-fluid">
				<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								Controle de Atendimento<small></small>
							</h1>
							<ol class="breadcrumb">
								<li class="active">
									<i class="glyphicon glyphicon-menu-right"></i> Página Inicial
								</li>
								<li class="active">
									<i class="glyphicon glyphicon-menu-right"></i> Controle de Atendimento
								</li>
								<li class="">
									<i class="glyphicon glyphicon-menu-right"></i> Novo Atendimento
								</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
				
				<div class="container-fluid">
					<div class="row">
						<div>
							<form class="form-horizontal" role="form"  method = "POST" action = "processa/proc_cont_atendimento.php">
								<legend><font color="red">*</font> Campos Obrigatórios</legend>

								<div class="step33">
									<div class="form-group">
										<label class="control-label col-sm-2" for="pessoa"><font color="red">*</font> Nome:</label>
										<div class="col-sm-3">
											<select class="form-control" name="pessoa"><option>Selecionar Pessoa</option>
												<?php 
													$query = mysql_query ("select * FROM tb_pessoa ORDER BY NMPESSOA ASC");
													while($res=mysql_fetch_array($query)){
														echo "<option value='{$res["CDPESSOA"]}'>{$res["NMPESSOA"]}</option>";
													}
												?>		
											</select>										
										</div>

										<label class="control-label col-sm-2" for="instrutor" ><font color="red">*</font> Instrutor(a):</label> 
										<div class="col-sm-3"> 
											<input type="text" class="form-control" name="instrutor" readonly required value=" <?php echo $_SESSION['usuarioNome'];?>" data-error="Por favor, informe o nome." />
											
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-2" for="dtatendimento"><font color="red">*</font> Data do Atendimento:</label>
										<div class="col-sm-2">
											<input type="text" class="form-control" onkeypress="mascara(this, '##/##/####')" maxlength="10" id="dtatendimento" name="dtatendimento" value="<?php echo date('d/m/Y');?>" />
										</div>

										<label class="control-label col-sm-2 col-md-offset-1 " for="Descrição">Obs:</label>
										<div class="col-sm-3">
									 	 <textarea class="form-control" rows="3" name="obs" id="obs"></textarea>
									 	</div>
									</div>
								</div> 

								<div class="step33">
								 <br>

									<div class="form-group  col-md-12 registration-date">
										
										<div class="registration-date-time col-md-5 ">
											<label class="control-label col-md-4 col-md-offset-1" for="hinico"><font color="red">* </font>HInicio:</label> 
											<div class="input-group col-md-5 registration-date-time "> 
												<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
												<input class="form-control"  name="hinicio" style="z-index: 1;" id="hrinicio" type="time">
											</div>
										</div>


										<div class="registration-date-time  col-md-6">
											<label class="control-label col-md-4" for="hfinal"><font color="red">* </font>HFinal:</label> 
											<div class=" input-group registration-date-time "> 
												<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
												<input class="form-control" name="hfinal" id="registration-time" type="time">

												<span class="input-group-btn">
							            	    	<button class="btn btn-default" type="button" onclick="addNow()"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Agora</button>
							                    	<button class="btn btn-default" type="button" onclick="stopNow()"><span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span> Parar</button>
							                    </span>
											</div>
										</div>
										
									</div>

									<div class="form-group" >
										<label class="control-label col-md-2" for="tpatendimento"><font color="red">* </font>Descrição:</label>
										<div class="col-md-3" id="divatividade"> 
											<select class="form-control" onchange="select(this)" id="form_prepare" name="tpatendimento"><option>Selecionar Atividade Realizada</option>
												<?php 
													$query = mysql_query ("select * FROM tb_tpatendimento order by DSTPATENDIMENTO ASC");
													while($res=mysql_fetch_array($query)){
														echo "<option value='{$res["CDTPATENDIMENTO"]}'>{$res["DSTPATENDIMENTO"]}</option>";
													}
												?>
											</select>
										</div>
										<div id="icone" class="form-group col-md-1">
										<a data-toggle="modal" data-target="#atividade-modal" class='btn btn-xs btn-success' href=''><type='' class="glyphicon glyphicon-plus"/></a>  
											
										</div>
									</div>

									<div class="row">
										<div class="col-xs-6 col-md-6 col-md-offset-5 ">
											<table class = "table table-striped" id="grid">
												<thead>
													<tr class="info">
														<th width="150" aling="center">Nº</th>
														<th width="500" aling="center"><span class="style9"><b>Atividade</b></span></th> 
														<th width="100" aling="center"><span class="style9"><b>Ação</b></span></th>  
														
													</tr>
												</thead>
												
												<tbody>
																								
												</tbody>
											</table>
										</div> <!-- fim da div col-xs-12 col-md-12 -->
									</div><!-- /.row -->

								</div>

								<div class="step33">

									<div class="form-group" >
										<label class="control-label col-md-2" for="tpatendimento">Impressão:</label>
										
										<label class="radio-inline"> 
											<input type="radio" name="impressao" value="S" checked onclick="_Mostraimpressao(true);" >Sim
										</label>
										
										<label class="radio-inline">
											<input type="radio" name="impressao" value="N"  onclick="_Mostraimpressao(false);" >Não
										</label><br>
									</div>
									<!-- Campos de impresão -->
									<div id="div-impressao">
										<div class="form-group">
											<label class="control-label col-md-2" id="labeltpimpressao" for="tpatendimento">Tipo Impressao:</label>
											
											<div class="col-md-2"> 
												<select class="form-control" id="tpimpressao" name="tpimpressao[]"><option value="">Tipo de Impressão</option>
														<?php 
															$query = mysql_query ("select * FROM tb_tpimpressao order by dstpimp ASC");
															while($res=mysql_fetch_array($query)){
																echo "<option value='{$res["CDTPIMP"]}'>{$res["DSTPIMP"]}</option>";
															}
														?>
													</select>
											</div>

											<label class="control-label col-md-3" id="labelqtdimpressao" for="tpatendimento">Quantidade:</label>
											<div class="col-md-1"> 
													<input type="text" class="form-control" name="qtdimpressao[]" id="qtdimpressao"> 
											</div>	
											
											<a class="btn btn-danger btn-xs" id="menosimpressao"  ><span class="glyphicon glyphicon-minus"></span></a>
											
										</div>
									</div>

									<span class="marco-elementos-inseridos"></span>
									<!-- Fim campos de impressão -->
							 	</div>

								
								

								<div class="col-md-3 col-md-offset-1">
									
									<a class="btn btn-success" id="add-campos-impressao" ><span class="glyphicon glyphicon-plus"></span> Impressão</a>
									
								</div>

								<div class="col-sm-offset-9 col-sm-10">
								    <button type="button"  onClick="JavaScript: window.history.back();" class="btn btn-primary">Cancelar</button>
									<button type="submit"  class="btn btn-success">SALVAR</button>
								</div>

							</form>

							<!-- Modal escola-->
									<div class="modal fade" id="atividade-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="modalLabel">Adicionar Escola</h4>
												</div>
												
												<div class="modal-body">
													<form class="form-horizontal" role="form" method = "POST" id="ajax_atividade" action = "">
														<fieldset>
															<div class="form-group">
																<label class="control-label col-sm-2" for="nome">Atividade:</label> <font color="red">*</font>
																<div class="col-sm-4">
																  <input type="text" class="form-control" name="tpatendimento" id="tpatendimento" placeholder="Atividade" required> 
																</div>
															</div>
														</fieldset>
													
												
												
														<div class="modal-footer">
															
															<button type="submit" id="closemodalatendimento" class="btn btn-success">Cadastrar</button>
															
														</div>
													</form>
											  	</div>
											</div>
										</div>
									</div> <!-- /.modal escola-->

						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<script src = "js/formulario.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Morris Charts JavaScript -->
		<script src="js/jquery-ui.min.js"></script>
	    <script src="js/datepicker-pt-BR.js"></script>
	    <script>
	    		
	    		$("#dtatendimento").datepicker($.datepicker.regional[ "pt-br" ]);

	    </script>
		<script src="js/plugins/morris/raphael.min.js"></script>
		<script src="js/plugins/morris/morris.min.js"></script>
		<script src="js/plugins/morris/morris-data.js"></script>
	</body>
</html>
