<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>

		<script type='text/javascript' src='js/cep.js'></script>

		<script type="text/javascript" src='js/modal.js'></script>		
		<link rel="stylesheet" href="css/jquery-ui.min.css">

	
		<script>

			function calcularIdade(){
     			if(document.getElementById("data_nascimento").value.length < 10){return;}
 		   		 else{// Não executa a função caso a data digitada não esteja no formato indicado
	 			    var anoNascParts = document.getElementById("data_nascimento").value.split('/');
	 			    var idade = <?php echo date("Y");?> - anoNascParts[2];
			 
			    //se mês atual for menor que o nascimento,não faz aniversario ainda.
 				    if (<?php echo date("m");?> < anoNascParts[1]){
 				        idade--;
 				    } else {
 				        //se tiver no mes do nasc,verificar o dia
 				        if (<?php echo date("m");?> <= anoNascParts[1]){
 				            if (<?php echo date("d");?> < anoNascParts[0]){
 				                //se a data atual for menor que o dia de nascimento,quer dizer que ele ainda não fez aniversario
 				                idade--;
 				            }
 				        }
 			    	}
 
 			    	 $('#idade').val(idade);
 
 						// O código abaixo calcula se a idade do visitante está entre 18 e 70 anos e, caso não esteja, bloqueia o acesso.
 						if (idade < 18 ){

 							$("#responsavel").prop( "disabled", false );
 							$("#nomeresponsavel").prop("readonly", false);
 							document.getElementById("nomeresponsavel").value = '';
 						} else {
 						 	$("#responsavel").prop( "disabled", true );

 						 	 $("#nomeresponsavel").prop("readonly", true);
							 document.getElementById("nomeresponsavel").value = 'O próprio';
 						} 
 						if(idade<16){
 							$("#titulo").prop( "disabled", true );
 							$("#carteiratrab").prop("disabled",true);
 						}else{
 							$("#titulo").prop( "disabled", false );
 							$("#carteiratrab").prop("disabled",false);
 						}
 				}

 				
 			};


			function _MostraCampo(bool)
			{
				if (bool) {
				document.getElementById("nmconjuge").style.display = "";
				document.getElementById("profissaoconjuge").style.display = "";
				document.getElementById("dtnascconjuge").style.display = "";
				document.getElementById("labelnmconjuge").style.display = "";
				document.getElementById("labelprofissaoconjuge").style.display = "";
				document.getElementById("labeldtnascconjuge").style.display = "";
				document.getElementById("iconeconjuge").style.display = "";
				} else {
				document.getElementById("nmconjuge").style.display = "none";
				document.getElementById("profissaoconjuge").style.display = "none";
				document.getElementById("dtnascconjuge").style.display = "none";
				document.getElementById("labelnmconjuge").style.display = "none";
				document.getElementById("labelprofissaoconjuge").style.display = "none";
				document.getElementById("labeldtnascconjuge").style.display = "none";
				document.getElementById("iconeconjuge").style.display = "none";
				}
			}

		function mascara(t, mask){
			 var i = t.value.length;
			 var saida = mask.substring(1,0);
			 var texto = mask.substring(i)
			 if (texto.substring(0,1) != saida){
			 t.value += texto.substring(0,1);
			 }
		 }

		  function select(VALOR) {
				   	 var $this = VALOR;

				    var codigo = VALOR.value;
				    var nome = VALOR.options[VALOR.selectedIndex].innerHTML
				    
				    var tr = '<tr>'+
				      '<td>'+codigo+'<input type="hidden" name="codigoprograma[]" value="'+codigo+'" />'+
				    '<input type="hidden" name="nomeprograma[]" value="'+nome+'" />'+'</td>'+
				      '<td>'+nome+'</td>'+
				      '<td><button type="button" name="remover" onclick="RemoveTableRow(this)"  class="btn btn-danger">Remover </button> </td>'+
				      '</tr>'
				      
				    $('#gridprog').find('tbody').append( tr );

				    var hiddens = '<input type="hidden" name="codigopessoa[]" value="'+codigo+'" />'+
				    '<input type="hidden" name="nomepessoa[]" value="'+nome+'" />';


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


			function TestaCPF(elemento) {
			  cpf = elemento.value;
			  cpf = cpf.replace(/[^\d]+/g, '');
			  //if (cpf == '') return alert("DIGITE UM CPF VÁLIDO");
			  // Elimina CPFs invalidos conhecidos    
			  if (cpf.length != 11 ||
			    cpf == "00000000000" ||
			    cpf == "11111111111" ||
			    cpf == "22222222222" ||
			    cpf == "33333333333" ||
			    cpf == "44444444444" ||
			    cpf == "55555555555" ||
			    cpf == "66666666666" ||
			    cpf == "77777777777" ||
			    cpf == "88888888888" ||
			    cpf == "99999999999")
			    return alert("CPF INVÁLIDO");
			  // Valida 1o digito 
			  add = 0;
			  for (i = 0; i < 9; i++)
			    add += parseInt(cpf.charAt(i)) * (10 - i);
			  rev = 11 - (add % 11);
			  if (rev == 10 || rev == 11)
			    rev = 0;
			  if (rev != parseInt(cpf.charAt(9)))
			    return window.alert("CPF INVÁLIDO");
			  // Valida 2o digito 
			  add = 0;
			  for (i = 0; i < 10; i++)
			    add += parseInt(cpf.charAt(i)) * (11 - i);
			  rev = 11 - (add % 11);
			  if (rev == 10 || rev == 11)
			    rev = 0;
			  if (rev != parseInt(cpf.charAt(10)))
			   return window.alert("CPF INVÁLIDO");
			}
			
			
		</script>

		<style type="text/css">
		 #icone{
		 	padding-left: 3px;
		 	padding-top: 2.2em;
		 }
		 
			
		</style>





	</head>
	
	<body>
	    <div id="wrapper" style=" margin-top: -5%; ">
	        <div id="page-wrapper">
	        	<div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h1 class="page-header">
	                            Cadastro de Pessoas<small>  </small>
	                        </h1>
	                        <ol class="breadcrumb">
	                            <li class="">
	                                Página Inicial
	                            </li>
					<li class="">
	                                   Lista de Pessoas
	                            </li>
					<li class="active">
	                                 Cadastro de Pessoas
	                            </li>
	                        </ol>
	                    </div>
	                </div>
					<legend><font color="red">*</font> Campos Obrigatórios</legend>
	                <div class="container-fluid">
	                	<div class="row">
	                		<section>
	                			<div class="wizard">
	                				<!-- parte das fases -->
									<div class="wizard-inner" style="margin-top: -4%;">
										<div class="connecting-line"></div>
										<ul class="nav nav-tabs" role="tablist">

											<li role="presentation" class="active">
												<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Identificação Pessoal">
													<span class="round-tab">
														<i class="glyphicon glyphicon-user"></i>
													</span>
												</a>
											</li>

											<li role="presentation" class="disabled">
												<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Dados Complementares">
													<span class="round-tab">
														<i class="glyphicon glyphicon-pencil"></i>
													</span>
												</a>
											</li>
											<li role="presentation" class="disabled">
												<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Área Familiar">
													<span class="round-tab">
														<i class="glyphicon glyphicon-saved"></i>
													</span>
												</a>
											</li>
										</ul>
									</div> <!-- fim do wizard-inner -->	
	               						
									<form role="form" data-toggle="validator" name="form1" method = "POST" action = "processa/proc_cad_pessoa.php">
										
										<div class="tab-content">
											<div class="tab-pane active" role="tabpanel" id="step1">
												<div class="step33">
													<h5><strong>Indentificação Pessoal</strong></h5>
											 		
											 		<hr>
													
													<div class="row mar_ned">
													
													</div>
													<div class="row">
														<div class="form-group  col-md-4 col-md-offset-1">
															<label><font color="red">* </font>Nome</label>
															<input type="text" class="form-control" name="nomepessoa" placeholder="Nome da Pessoa" required  data-error="Por favor, informe o nome." />
											  				<div class="help-block with-errors"></div>
															
														</div>

														<div class="form-group col-md-4 col-md-offset-1">
															<label><font color="red">* </font>Sexo</label>	
														</div>
														<div class="form-group col-md-3 col-md-offset-1"  required >

															<label class="radio-inline">
																<input type="radio" name="optradio" value="M">Masculino
															</label>
															<label class="radio-inline">
																<input type="radio" name="optradio" value="F">Feminino
															</label><br/>
												  	  	</div>
												  	  	
													</div> <br/>
													
							  						<div class="row">

							  							<div  class=" form-group col-sm-3 col-md-offset-1">
								  							<label><font color="red">* </font>Data de Nascimento</label>	

								  							<div class="input-group date">
															  <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="DD/MM/YYYY"  onblur ="calcularIdade();" onkeypress="mascara(this, '##/##/####')" maxlength="10"/>
															</div>
													            
												            
												             <!--

																<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>

												              data-error="Por favor, informe a data de nascimento." required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
												             <div class="help-block with-errors"></div> -->
												                   
												        </div>

												  	  	<div class="form-group col-md-1  ">
													  	  	<label><font color="red">* </font>Idade</label>
													  	  	<input type="text" class="form-control"  id="idade"  name="idade" placeholder="Idade" readonly />
											
												  	  	</div>

												  	  	<div class="form-group col-md-2 col-md-offset-1">
													  		<label><font color="red">* </font>Estado Civil</label>
															<select class="form-control" name="estado_civil" required  >

																<option>Selecione</option>
																			
																<?php 
																	// busca o estado civil do banco
																 	$query = mysql_query ("select * FROM tb_estcivil ORDER BY NMESTCIVIL ASC");
																 
																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["CDESTCIVIL"]}'>{$res["NMESTCIVIL"]}</option>";
																	 
																	}
															 
																?>
															</select><br>
												  	  	</div>

							  						</div> 

							  						<div class = "row">

							  							<div class="form-group col-md-2 col-md-offset-1 ">
													  		<label>Responsável</label>
															<select class="form-control" id="responsavel" name="responsavel">
																<option>Selecione</option>
																	
																<?php 
																	// Busca os dados do responsavel do banco
																 	$query = mysql_query ("select * FROM tb_graupar ORDER BY DSGRAUPAR ASC");
															

																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["CDGRAUPAR"]}'>{$res["DSGRAUPAR"]}</option>";
																	 
																	}
															 
																?>
															</select><br> 	
														</div>

														<div class="form-group col-md-3 col-md-offset-1 ">
													  	  	<label>Nome do Responsável</label>
													  	  	<input type="text" class="form-control"  id="nomeresponsavel" 
													  	  	 name="nome_responsavel" placeholder="Nome do Responsável"/>
											
												  	  	</div>

							  						</div>



							  						<div class="row">
							  							<div class="form-group col-md-4 col-md-offset-1" >
															<label><font color="red">* </font>Naturalidade</label>
															<select class="form-control" id="naturalidade" name="naturalidade" required >
																<option>Selecione</option>
																	
																<?php 
																	// Busca os dados do responsavel do banco
																 	$query = mysql_query ("select * FROM tb_cidades ORDER BY nome ASC");
																 
																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["id"]}'>{$res["nome"]}</option>";
																	 
																	}
															 
																?>						
															</select><br> 
														</div>


														<div class="form-group col-md-2 col-md-offset-1 ">
															<label><font color="red">* </font>Telefone 1</label>
															<input type="text" class="form-control" name="telefone"  placeholder="xx xxxx-xxxx" required data-error="Por favor, informe um telefone."  onkeypress="mascara(this, '## ####-####')" maxlength="12" />
															<div class="help-block with-errors"></div>
														</div>

														<div class="form-group col-md-2 ">
															<label>Telefone 2</label>
															<input type="tet" class="form-control" name="celular" id="ileech" onkeypress="mascara(this, '## # ####-####')" placeholder="xx x xxxx-xxxx" maxlength="14"/>
														</div>
							  						</div> 

							  						<h5><strong>Documentos</strong></h5>
											 		
											 		<hr>
													
													<div class="row mar_ned">
													
													</div>

													<div class="row">
													    <div class="form-group col-md-3 col-md-offset-1">
														  	<label>RG</label>
														  	<input type="text" class="form-control"  name="rg" placeholder="Identidade">
													  	</div>
														
													    <div class="form-group col-md-1 col-md-offset-1">
														  	<label>Org.Exp</label>
														   	<input type="text" class="form-control" name="orgexp">
													  	</div>
													  	  
													  	<div class="form-group col-md-2 col-md-offset-1">
														  	<label>CPF</label>
															<input type="text" class="form-control" name="cpf" id="cpf"   onkeypress="mascara(this, '###.###.###-##')" onblur="TestaCPF(this);" maxlength="14" placeholder="xxx.xxx.xxx.xx" >
													    </div>
													</div>	

													<div class="row">

													 	<div class="form-group col-md-3 col-md-offset-1">
														  	<label>Nº do Titulo</label>
														  	<input type="text" class="form-control"  name="titulo" id="titulo" placeholder="Título Eleitoral">
													  	</div>

													  	<div class="form-group col-md-3 col-md-offset-1">
														  	<label>Carteira de Trabalho</label>
														  	<input type="text" class="form-control"  name="carteiratrab" id="carteiratrab" placeholder="Carteira de Trabalho">
													  	</div>

													</div>
												</div> <!-- fim da steep 33 -->

												<ul class="list-inline pull-right">
													<li><button type="button"  onClick="JavaScript: window.history.back();" class="btn btn-primary">Cancelar </button> <input type="button" name="next1" class="btn btn-primary next-step" value="Próximo"></li>
												</ul>
											</div> <!-- fim tap-pane step 1 -->

											<div class="tab-pane" role="tabpanel" id="step2">
												<div class="step33">
													<h5><strong> Dados Complementares</strong></h5>
														
													<hr>
														<strong> <font color="red">* </font>Endereço</strong></h5>
													<div class="row mar_ned">

													</div>

													<div class ="row">
													    <div class="form-group col-md-4 col-md-offset-1 ">
														    <label>CEP</label>
															<input type="text" class="form-control"  id="cep" name="cep" placeholder="Cep" onkeypress="mascara(this, '##.###-###')" maxlength="10"/>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-md-2 col-md-offset-1">
														  	<label>Rua</label>
														   	<input type="text" class="form-control" id="rua" name="rua" placeholder="Rua">
												  	  	</div>

												  	  	<div class="form-group col-md-1  ">
														   	<label>Nº</label>
														   	<input type="text" class="form-control" name="numcasa">
													  	</div>
													 	
													 	<div class="form-group col-md-1 ">
														   	<label>Compl.</label>
														   	<input type="text" class="form-control" name="complemento">
													  	</div>
													</div><br/>

													<div class="row">
														<div class="form-group col-md-2 col-md-offset-1 ">
													  	  	<label>Bairro</label>
													  	  	<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
												  	  	</div>

												  	  	<div class="form-group col-md-2 ">
													  	  	<label>Cidade</label>
													  	  	<input type="text" class="form-control"  id="cidade" name="cidade" placeholder="Cidade">
												  	  	</div>

												  	  	<div class="form-group col-md-1 ">
													  	  	<label>Estado</label>
													  	  	<input type="text" class="form-control"  id="estado" name="estado" >
												  	  	</div>
													</div>

													<h5><strong><font color="red">* </font>Ecolaridade</strong></h5>
											 		
											 		<hr>
													
													<div class="row mar_ned">
													
													</div>

													<div class="row">
														<div class="form-group col-md-3 col-md-offset-1" id="divescola">
														  	
																<label>Escola que Estuda</label>
																<select class="form-control" name="escola">
																<option>Selecione</option>
																	
																<?php 
																	// Busca os dados do responsavel do banco
																 	$query = mysql_query ("select * FROM tb_Escola ORDER BY NMESCOLA ASC");
																 
																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["CDESCOLA"]}'>{$res["NMESCOLA"]}</option>";
																	 
																	}
															 
																?>
																					
															</select><br>
													  	</div>
														<div  id="icone" class="form-group col-md-1">
															<a data-toggle="modal" data-target="#escola-modal" class='btn btn-xs btn-success' href=''><type='' class="glyphicon glyphicon-plus"/></a>  
																
														</div>
														<div class="form-group col-md-2 "  id="divensino">
														  	<label>Ensino</label>
																		
															<select class="form-control" name="ensino">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_escolaridade ORDER BY DSESCOLARIDADE ASC");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 echo "<option value='{$res["CDESCOLARIDADE"]}'>{$res["DSESCOLARIDADE"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
													  	</div>
															<div id="icone" class="form-group col-md-1">
																<a data-toggle="modal" data-target="#escolaridade-modal" class='btn btn-xs btn-success' href=''><type='' class="glyphicon glyphicon-plus"/></a>  
															</div>
													</div>

													<div class="row">
													  	<div class="form-group col-md-2 col-md-offset-1">

														  	<label>Turno</label>
																		
															<select class="form-control" name="turno">
																<option>Selecione</option>
																<option value="Integral">Integral</option>
																<option value="Matutino">Matutino</option>
																<option value="Noturno">Noturno</option>
																<option value="Vespertino">Vespertino</option>		
		
															<select><br>
												  		</div>

													  	<div class="form-group col-md-2 ">
														  	
														  	<label>Situação</label>
															<select class="form-control" name="situacao">
																<option>Selecione</option>
																<option value="Completo">Completo</option>
																<option value="Cursando">Cursando</option>
																<option value="Incompleto">Incompleto</option>
															</select>
													  	</div>
														<div class="form-group col-md-2 ">
														  	<label>Série/Período</label>
														  	<input type="text" class="form-control" name="serie">
													    </div>
													</div>
												</div> 
												<ul class="list-inline pull-right">
													<li><input type="button" name="prev" class="btn btn-primary prev-step" value="Voltar"></li>
													<li><input type="button" name="next2" class="btn btn-primary next-step" value="Próximo"></li>
												</ul>
											</div><!-- fim tap pane step2 -->

											<div class="tab-pane" role="tabpanel" id="step3">
												<div class="step33">
													<h5><strong> Área Familiar</strong></h5>
													<hr>

													<div class="row">
												  	 
												  	    <div class="form-group col-md-3 col-md-offset-1">
													  	  	<label>Pai</label>
													  	  	<input type="text" class="form-control"  name="nomepai" placeholder="Nome do Pai">
												  	    </div>
													   
												  	    <div class="form-group col-md-2 ">
								  							<label>Data de Nascimento</label>	
													            
												            <input type="text" class="form-control" id="data_nascimentopai" name="dtnascimentopai" placeholder="DD/MM/YYYY"
												             onkeypress="mascara(this, '##/##/####')" maxlength="10">
												                   
												        </div>


													    <div class="form-group col-md-2 "  id="divprofissao">
													  	  	<label>Profissão</label>
																		
															<select class="form-control" name="profissaopai">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_profissao ORDER BY NMPROF ASC");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 echo "<option value='{$res["CDPROF"]}'>{$res["NMPROF"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
												  	    </div>

												  	      	<div id="icone" class="form-group col-md-1">
															<a data-toggle="modal" data-target="#profissaopai-modal" class='btn btn-xs btn-success' href=''><type='' class="glyphicon glyphicon-plus"/></a>  
																
															</div>
												  	  
												  	   
													</div>

													<div class="row">
						  	  							
						  	  							<div class="form-group col-md-3 col-md-offset-1" >
							  	  							<label>Mãe</label>
							  	  							<input type="text" class="form-control"  name="nomemae" placeholder="Nome da Mae">
						  	  							</div>
													  	 <div class="form-group col-md-2 ">
								  							<label>Data de Nascimento</label>	
													            
												            <input type="text" class="form-control" id="dtnascimentomae" name="dtnascimentomae" placeholder="DD/MM/YYYY"
												             onkeypress="mascara(this, '##/##/####')" maxlength="10">
												                   
												        </div>
													  	<div class="form-group col-md-2 " id="divprofissaomae">
													  	  	<label>Profissão</label>
																		
															<select class="form-control" name="profissaomae">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_profissao ORDER BY NMPROF ASC ");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 echo "<option value='{$res["CDPROF"]}'>{$res["NMPROF"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
												  	    </div>
												  	  	<div id="icone" class="form-group col-md-1">
															<a data-toggle="modal" data-target="#profissaopai-modal" class='btn btn-xs btn-success' href=''><type='' class="glyphicon glyphicon-plus"/></a>  
																
															</div>
													</div>

													<div class="row">
						  	  							<div class="form-group col-md-3 col-md-offset-1">
													  	  	<label style="padding-top: 1em;">Casado(a):</label>

															<label class="radio-inline"> 
																<input type="radio" name="casado(a)"  checked onclick="_MostraCampo(true);" value="sim" >Sim
															</label>
															
															<label class="radio-inline">
																<input type="radio" name="casado(a)"  onclick="_MostraCampo(false);" value="nao">Não
															</label><br>
						  	  							</div>
							  							
													</div>

													<div class="row">
						  	  							
						  	  							<div class="form-group col-md-3 col-md-offset-1">
							  	  							<label id="labelnmconjuge">Cônjuge</label>
							  	  							<input type="text" class="form-control" id="nmconjuge" name="nmconjuge" placeholder="Nome do Conjuge">
						  	  							</div>

						  	  								 <div class="form-group col-md-2 ">
								  							<label id="labeldtnascconjuge">Data de Nascimento</label>	
													            
												            <input type="text" class="form-control" id="dtnascconjuge" name="dtnascconjuge" placeholder="DD/MM/YYYY"
												             onkeypress="mascara(this, '##/##/####')" maxlength="10">
												                   
												        </div>

													  	<div class="form-group col-md-2 ">
													  	  	<label id="labelprofissaoconjuge">Profissão</label>
																		
															<select class="form-control" id="profissaoconjuge" name="profissaoconjuge">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_profissao ORDER BY NMPROF ASC");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 echo "<option value='{$res["CDPROF"]}'>{$res["NMPROF"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
														</div>	
														<div id="iconeconjuge" class="form-group col-md-1">
															<a data-toggle="modal" data-target="#profissaopai-modal" class='btn btn-xs btn-success' href=''><type='' class="glyphicon glyphicon-plus"/></a>  
																
															</div>
													</div>

													<div class="row">
														<div class="form-group col-md-3 col-md-offset-1" id="divprograma">
													  	  	<label>Programas Sociais</label>
																		
															<select class="form-control" onchange="select(this)" id="form_prepare"  name="progsociais">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_programa ORDER BY NMPROGRAMA ASC");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 echo "<option value='{$res["CDPROGRAMA"]}'>{$res["NMPROGRAMA"]}</option>";
																						 
																	}
																					 
																?>
															<select>
															
												  	    </div>
												  	    <a data-toggle="modal" data-target="#programa-modal" class='btn btn-xs btn-success' href=''><type='' class="glyphicon glyphicon-plus"/></a>
													</div>

													<div class="row">
														<div class="col-xs-6 col-md-6 col-md-offset-4 ">
															<table class = "table table-striped" id="gridprog">
																<thead>
																	<tr class="info">
																	 <th width="130" aling="center">Nº</th>
																	 <th width="500" aling="center"><span class="style9"><b>Programas</b></span></th>  
																	 <th width="100" aling="center"><span class="style9"><b>Ação</b></span></th>  
																		
																	</tr>
																</thead>
																
																<tbody>
																
																												
																</tbody>
															</table>
														</div> <!-- fim da div col-xs-12 col-md-12 -->
													</div><!-- /.row -->
												</div><!-- fim step3 -->

												<ul class="list-inline pull-right">
													<li><input type="button" name="prev" class="btn btn-primary prev-step" value="Voltar"></li>
													<li><input type="submit" name="next" class="btn btn-primary next-step" value="Concluir e Salvar"></li>
												</ul>
											</div>
										</div><!-- fim tab-content -->
									</form>

									<!-- modais-->


									<!-- Modal escola-->
									<div class="modal fade" id="escola-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="modalLabel">Adicionar Escola</h4>
												</div>
												
												<div class="modal-body">
													<form class="form-horizontal" role="form" method = "POST" id="ajax_formescola" action = "">
														<fieldset>
															<div class="form-group">
																<label class="control-label col-sm-2" for="nome">Escola:</label> <font color="red">*</font>
																<div class="col-sm-4">
																  <input type="text" class="form-control" name="escola" id="escola" placeholder="Escola" required> 
																</div>
															</div>
														</fieldset>
													
												
												
														<div class="modal-footer">
															
															<button type="submit" id="closemodalescola" class="btn btn-success">Cadastrar</button>
															
														</div>
													</form>
											  	</div>
											</div>
										</div>
									</div> <!-- /.modal escola-->

									<!-- Modal escolaridade -->
									<div class="modal fade" id="escolaridade-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="modalLabel">Adicionar Ensino</h4>
												</div>
												
												<div class="modal-body">
													<form class="form-horizontal" role="form" method = "POST" id="ajax_formensino" action = "">
														<fieldset>
															<div class="form-group">
																<label class="control-label col-sm-2" for="nome">Ensino:</label> <font color="red">*</font>
																<div class="col-sm-4">
																  <input type="text" class="form-control" name="ensino" id="ensino" placeholder="Ensino" required> 
																</div>
															</div>
														</fieldset>

												
														<div class="modal-footer">
															
															<button type="submit" id="closemodalensino" class="btn btn-success">Cadastrar</button>
															
														</div>
													</form>
												</div>
											</div>
										</div>
									</div> <!-- /.modal escolaridade -->

									<!-- Modal -->
									<div class="modal fade" id="profissaopai-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="modalLabel">Adicionar Profissão</h4>
												</div>
												
												<div class="modal-body">
													<form class="form-horizontal" role="form" method = "POST" id="ajax_formprofissao"  action = "">
														<fieldset>
															<div class="form-group">
																<label class="control-label col-sm-2" for="nome">Profissão:</label> <font color="red">*</font>
																<div class="col-sm-4">
																  <input type="text" class="form-control" name="profissao" id="profissao" placeholder="Profissão" required> 
																</div>
															</div>
														</fieldset>
													
												
												
														<div class="modal-footer">
															
															<button type="submit" id="closemodalprofissao" class="btn btn-success">Cadastrar</button>
															
														</div>
													</form>
												</div>
											</div>
										</div>
									</div> <!-- /.modal profissao -->

									<!-- Modal escola-->
									<div class="modal fade" id="programa-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="modalLabel">Adicionar Programa Social</h4>
												</div>
												
												<div class="modal-body">
													<form class="form-horizontal" role="form" method = "POST" id="ajax_formprogsocial" action = "">
														<fieldset>
															<div class="form-group">
																<label class="control-label col-sm-2" for="nome">Programa Social:</label> <font color="red">*</font>
																<div class="col-sm-4">
																  <input type="text" class="form-control" name="nomeprograma" id="progsocial" placeholder="Programa Social" required> 
																</div>
															</div>
														</fieldset>
													
												
												
														<div class="modal-footer">
															
															<button type="submit" id="closemodalprogsocial" class="btn btn-success">Cadastrar</button>
															
														</div>
													</form>
											  	</div>
											</div>
										</div>
									</div> <!-- /.modal escola-->
	                			</div>   			
	                		</section>
	                	</div> <!-- /.div row formulario -->
	                </div>    <!-- /.container-fluid  formulario -->
	            </div><!-- /.container-fluid -->
			</div><!-- /#page-wrapper -->
	    </div><!-- /#wrapper -->

	    <!-- jQuery -->
	    <script src="js/jquery.js"></script>


	    <script src = "js/formulario.js"></script>
		    <script src="js/validator.js"></script>	

	    <!-- Bootstrap Core JavaScript -->
	    <script src="js/bootstrap.min.js"></script>
	    <!-- Morris Charts JavaScript -->

	    <script src="js/jquery-ui.min.js"></script>
	    <script src="js/datepicker-pt-BR.js"></script>
	    <script>
	    		
	    		$("#data_nascimento").datepicker($.datepicker.regional[ "pt-br" ]);

	    		$("#data_nascimentopai").datepicker($.datepicker.regional[ "pt-br" ]);

	    		$("#dtnascimentomae").datepicker($.datepicker.regional[ "pt-br" ]);

	    		$("#dtnascconjuge").datepicker($.datepicker.regional[ "pt-br" ]);

	    		

	    		

	    </script>
	   
	    <script src="js/plugins/morris/raphael.min.js"></script>
	    <script src="js/plugins/morris/morris.min.js"></script>
	    <script src="js/plugins/morris/morris-data.js"></script>	
	</body>
</html>