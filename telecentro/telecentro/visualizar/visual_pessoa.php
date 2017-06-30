<!DOCTYPE html>

<?php
	$id = $_GET['id'];
	// execulta a query e conta quantas linhas e traz somente um usuario
	$consulta = mysql_query("SELECT * FROM tb_pessoa WHERE CDPESSOA = '$id' LIMIT 1");
	$resultado = mysql_fetch_assoc($consulta);

	$consulta_programas = mysql_query("SELECT * FROM tb_programapessoa JOIN tb_programa ON tb_programapessoa.CDPROGRAMA = tb_programa.CDPROGRAMA WHERE tb_programapessoa.CDPESSOA = '$id'");

	$consulta_resp = mysql_query("SELECT * FROM tb_responsaveis JOIN tb_graupar on tb_responsaveis.CDGRAUPAR = tb_graupar.CDGRAUPAR WHERE tb_responsaveis.CDPESSOA = '$id'");

	
	$result = $resultado['SEXO'];

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
		<script type='text/javascript' src='js/cep.js'></script>
		<script type="text/javascript" src='js/modal.js'></script>

	
		<script>
			
	
<script>

			function calcularIdade(){
     			if(document.getElementById("datanascimento").value.length < 10){return;}
 		   		 else{// Não executa a função caso a data digitada não esteja no formato indicado
	 			    var anoNascParts = document.getElementById("datanascimento").value.split('/');
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
 
 			    	 $('#idadepessoa').val(idade);
 
 						// O código abaixo calcula se a idade do visitante está entre 18 e 70 anos e, caso não esteja, bloqueia o acesso.
 						if (idade < 18 ){
 							$("#responsavel").prop( "disabled", false );
 						} else {
 						 	$("#responsavel").prop( "disabled", true );
 						
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
				} else {
				document.getElementById("nmconjuge").style.display = "none";
				document.getElementById("profissaoconjuge").style.display = "none";
				document.getElementById("dtnascconjuge").style.display = "none";
				document.getElementById("labelnmconjuge").style.display = "none";
				document.getElementById("labelprofissaoconjuge").style.display = "none";
				document.getElementById("labeldtnascconjuge").style.display = "none";
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

			
		</script>

		<style type="text/css">
		 #icone{
		 	padding-left: 3px;
		 	padding-top: 2.2em;
		 }
			
		</style>

	</head>
	
	<body>

	    <div id="wrapper">
	        <div id="page-wrapper">
	        	<div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <h1 class="page-header">
	                            Editar Pessoa<small>  </small>
	                        </h1>
	                        <ol class="breadcrumb">
	                            <li class="">
	                                pagina inicial
	                            </li>
					<li class="">
	                                   tela de pessoas
	                            </li>
					<li class="active">
	                                 Editar Pessoas
	                            </li>
	                        </ol>
	                    </div>
	                </div>

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

											<li role="presentation" >
												<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Dados Complementares">
													<span class="round-tab">
														<i class="glyphicon glyphicon-pencil"></i>
													</span>
												</a>
											</li>
											<li role="presentation">
												<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Área Familiar">
													<span class="round-tab">
														<i class="glyphicon glyphicon-saved"></i>
													</span>
												</a>
											</li>
										</ul>
									</div> <!-- fim do wizard-inner -->		
	               						
									<form role="form" method = "POST" action = " " name="formulario">
										<div class="tab-content">
											<div class="tab-pane active" role="tabpanel" id="step1">
												<div class="step33">
													<h5><strong>Indentificação Pessoal</strong></h5>
											 		
											 		<hr>
													
													<div class="row mar_ned">
													
													</div>

													<div class="row">

														<div class="form-group  col-md-1 col-md-offset-1">
															<label>Código</label>
															<input type="text" class="form-control" name="código" disabled value="<?php echo $resultado['CDPESSOA']; ?> " readonly/>
														</div>
													</div>

													<div class="row">
														<div class="form-group  col-md-4 col-md-offset-1">
															<label>Nome</label>
															<input type="text" class="form-control" name="nomepessoa" disabled value="<?php echo $resultado['NMPESSOA']; ?>"/>
														</div>

														<div class="form-group col-md-3 col-md-offset-1">
												  	  		
												  	  		<label style="padding-top: 2em;"  >Sexo:</label>

															<label class="radio-inline"  >
																<?php
																  if($result=="M"){
																  	echo "<input type='radio' name='optradio' value='M' disabled checked>Masculino
																  	    
																  	     <label class='radio-inline'>
																  	       <input type='radio' name='optradio' value='F'  disabled >Femnino
																		 </label>

																  	      ";
																  }
																 ?>
															</label>
															
															<label class="radio-inline disabled" >
																<?php
																  if($result=="F"){
																  	echo "<input type='radio' name='optradio' value='F'  disabled checked>Femnino

																  		<label class='radio-inline'>
																  	       <input type='radio' name='optradio'  disabled value='M'> Masculino
																		 </label>
																  	";
																  }
																 ?>
															</label><br/>
												  	  	</div>
							  						</div> <br/>

							  						<div class="row">

							  							<div  class=" form-group col-sm-3 col-md-offset-1">
								  							<label><font color="red">* </font>Data de Nascimento</label>	
													            
												            <input type="text" class="form-control" id="datanascimento" name="data_nascimento" placeholder="DD/MM/YYYY"
												             oninput ="calcularIdade();" onkeypress= "mascara(this, '##/##/####')" maxlength="10" data-error="Por favor, informe a data de nascimento." disabled value="<?php echo $resultado['DTNASC']; ?>"/>
												                  
												        </div>

												  	  	<div class="form-group col-md-1 ">
													  	  	<label>Idade</label>
													  	  	<input type="text" class="form-control"  id="idadepessoa"  disabled name="idadepessoa" value="<?php echo $resultado['IDADE']; ?>"/>
												  	  	</div>

												  	  	<div class="form-group col-md-2 col-md-offset-1">
													  		<label>Estado Civil</label>
															<select class="form-control" disabled name="estado_civil">
																<option>Selecione</option>
																			
																<?php 
																	// busca o estado civil do banco
																 	$query = mysql_query ("select * FROM tb_estcivil");
																 
																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["CDESTCIVIL"]}' ".(($resultado['CDESTCIVIL'] == $res["CDESTCIVIL"])? 'selected' : '').">{$res["NMESTCIVIL"]}</option>";
																	 
																	}
															 
																?>
																					
															</select><br>
												  	  	</div>


							  						</div> 


							  						<div class = "row">

							  							<div class="form-group col-md-2 col-md-offset-1 ">
													  		<label>Responsável</label>
															<select class="form-control" id="responsavel" disabled name="responsavel">
																<option>Selecione</option>
																	
																<?php 
																	// Busca os dados do responsavel do banco
																 	$query = mysql_query ("select * FROM tb_graupar ORDER BY DSGRAUPAR ASC");
																 
																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["CDGRAUPAR"]}' ".(($resultado['CDGRAUPAR'] == $res["CDGRAUPAR"])? 'selected' : '').">{$res["DSGRAUPAR"]}</option>";
																	 
																	}
															 
																?>
															</select><br> 	
														</div>

														<div class="form-group col-md-3 col-md-offset-1 ">
													  	  	<label>Nome do Responsável</label>


													  	    <input type="text" class="form-control" disabled  id="nomeresponsavel"  name="nomeresponsavel" 
													  	  	value="<?php echo $responsavel['NMRESPONSAVEL']; ?>"/> 
											
												  	  	</div>
							  							
							  						</div>

							  						<div class="row">
							  							<div class="form-group col-md-4 col-md-offset-1">
															<label>Naturalidade</label>
															<select class="form-control"  disabled name="naturalidade">
																<option>Selecione</option>
																	
																<?php 
																	// Busca os dados do responsavel do banco
																 	$query = mysql_query ("select * FROM tb_cidades");
																 
																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["id"]}' ".(($resultado['CDNATURALIDADE'] == $res["id"])? 'selected' : '').">{$res["nome"]}</option>";
																	 
																	}
															 
																?>						
															</select><br> 
														</div>


														<div class="form-group col-md-2 ">
															<label>Telefone</label>
															<input type="text" class="form-control"  disabled name="telefone" value="<?php echo $resultado['FONERES']; ?>" >
														</div>

														<div class="form-group col-md-2 ">
															<label>Celular</label>
															<input type="tet" class="form-control" disabled name="celular" value="<?php echo $resultado['FONECEL']; ?>">
														</div>
							  						</div> 

							  						<h5><strong>Documentos</strong></h5>
											 		
											 		<hr>
													
													<div class="row mar_ned">
													
													</div>

													<div class="row">
													    <div class="form-group col-md-3 col-md-offset-1">
														  	<label>RG</label>
														  	<input type="text" class="form-control" disabled  name="rg" value="<?php echo $resultado['RG']; ?>">
													  	</div>
														
													    <div class="form-group col-md-1 col-md-offset-1">
														  	<label>Org.Exp</label>
														   	<input type="text" class="form-control" disabled name="orgexp" value="<?php echo $resultado['ORGEXP']; ?>">
													  	</div>
													  	  
													  	<div class="form-group col-md-2 col-md-offset-1">
														  	<label>CPF</label>
															<input type="text" class="form-control" disabled name="cpf" value="<?php echo $resultado['CPF']; ?>">
													    </div>
													</div>	

													<div class="row">

													 	<div class="form-group col-md-3 col-md-offset-1">
														  	<label>Nº do Titulo</label>
														  	<input type="text" class="form-control" disabled  name="titulo" value="<?php echo $resultado['NUTITULO']; ?>">
													  	</div>

													  	<div class="form-group col-md-3 col-md-offset-1">
														  	<label>Carteira de Trabalho</label>
														  	<input type="text" class="form-control"  disabled name="carteiratrab" value="<?php echo $resultado['NUCT']; ?>">
													  	</div>

													</div>
												</div> <!-- fim da steep 33 -->

												<ul class="list-inline pull-right">
													<li><button type="button" name="next1" class="btn btn-primary next-step" >Próximo</button></li>
												</ul>
											</div> <!-- fim tap-pane step 1 -->

											<div class="tab-pane" role="tabpanel" id="step2">
												<div class="step33">
													<h5><strong> Dados Complementares</strong></h5>
														
													<hr>
														<strong> Endereço</strong></h5>
													<div class="row mar_ned">

													</div>

													<div class ="row">
													    <div class="form-group col-md-4 col-md-offset-1 ">
														    <label>Cep</label>
															<input type="text" class="form-control" disabled id="cep" name="cep" value="<?php echo $resultado['CEP']; ?>"/>
														</div>
													</div>

													<div class="row">
														<div class="form-group col-md-2 col-md-offset-1">
														  	<label>Rua</label>
														   	<input type="text" class="form-control" disabled id="rua" name="rua" value="<?php echo $resultado['RUA']; ?>">
												  	  	</div>

												  	  	<div class="form-group col-md-1  ">
														   	<label>Nº</label>
														   	<input type="text" class="form-control" disabled name="numcasa" value="<?php echo $resultado['NUMRES']; ?>">
													  	</div>
													 	
													 	<div class="form-group col-md-1 ">
														   	<label>Compl.</label>
														   	<input type="text" class="form-control" disabled name="complemento" value="<?php echo $resultado['COMPLEMENTO']; ?>">
													  	</div>
													</div><br/>

													<div class="row">
														<div class="form-group col-md-2 col-md-offset-1 ">
													  	  	<label>Bairro</label>
													  	  	<input type="text" class="form-control" disabled id="bairro" name="bairro" value="<?php echo $resultado['BAIRRO']; ?>">
												  	  	</div>

												  	  	<div class="form-group col-md-2 ">
													  	  	<label>Cidade</label>
													  	  	<input type="text" class="form-control" disabled id="cidade" name="cidade" value="<?php echo $resultado['CIDADE']; ?>">
												  	  	</div>

												  	  	<div class="form-group col-md-1 ">
													  	  	<label>Estado</label>
													  	  	<input type="text" class="form-control" disabled id="estado" name="estado" value="<?php echo $resultado['ESTADO']; ?>" >
												  	  	</div>
													</div>

													<h5><strong>Ecolaridade</strong></h5>
											 		
											 		<hr>
													
													<div class="row mar_ned">
													
													</div>

													<div class="row">
														<div class="form-group col-md-3 col-md-offset-1">
														  	
														  	<label>Escola que Estuda</label>
																<select class="form-control"  disabled name="escola">
																<option>Selecione</option>
																	
																<?php 
																	// Busca os dados do responsavel do banco
																 	$query = mysql_query ("select * FROM tb_Escola");
																 
																 	while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["CDESCOLA"]}' ".(($resultado['CDESCOLA'] == $res["CDESCOLA"])? 'selected' : '').">{$res["NMESCOLA"]}</option>";
																	 
																	}
															 
																?>
																					
															</select><br>
													  	</div>

														
													    <div class="form-group col-md-2 col-md-offset-1">
														  	<label>Ensino</label>
																		
															<select class="form-control" disabled name="ensino">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_escolaridade");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	
																	 echo "<option value='{$res["CDESCOLARIDADE"]}' ".(($resultado['CDESCOLARIDADE'] == $res["CDESCOLARIDADE"])? 'selected' : '').">{$res["DSESCOLARIDADE"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
													  	</div>
													</div>

													<div class="row">
														<div class="form-group col-md-2 col-md-offset-1">

														  	<label>Turno</label>
																		
															<select class="form-control" disabled name="turno">
															
																<option>Selecione</option>
																<option value="Matutino" <?=($resultado['TURNO'] == 'Matutino')?'selected':''?> > Matutino</option>
																<option value="Vespertino" <?=($resultado['TURNO'] == 'Vespertino')?'selected':''?> >Vespertino</option>
																<option value="Noturno" <?=($resultado['TURNO'] == 'Noturno')?'selected':''?> >Noturno</option>
																<option value="Integral" <?=($resultado['TURNO'] == 'Integral')?'selected':''?>>Integral</option>	
																
		
															<select><br>
												  		</div>


													  	<div class="form-group col-md-2 ">
														  	
														  	<label>Situação</label>
															<select class="form-control"  disabled name="situacao">
																<option value="Selecione">Selecione</option>
																<option value="Completo" <?=($resultado['SITUACAO'] == 'Completo')?'selected':''?> >Completo</option>
																<option value="Cursando" <?=($resultado['SITUACAO'] == 'Cursando')?'selected':''?>>Cursando</option>
																<option value="Incompleto" <?=($resultado['SITUACAO'] == 'Incompleto')?'selected':''?>>Incompleto</option>
															</select>
													  	</div>

													  	<div class="form-group  col-md-2 ">
														  	<label>Serie/período</label>
														  	<input type="text" class="form-control"  disabled name="serie" value="<?php echo $resultado['SERIE']; ?>">
													    </div>
													</div>
												</div> 
												<ul class="list-inline pull-right">
													<li><button type="button" name="prev" class="btn btn-primary prev-step">Voltar</button> </li>
													<li><button type="button" name="next2" class="btn btn-primary next-step">Próximo</button></li>
												</ul>
											</div><!-- fim tap pane step2 -->

											<div class="tab-pane" role="tabpanel" id="step3">
												<div class="step33">
													<h5><strong> Área Familiar</strong></h5>
													<hr>

													<div class="row">
												  	 
												  	    <div class="form-group col-md-3 col-md-offset-1">
													  	  	<label>Pai</label>
													  	  	<input type="text" class="form-control" disabled name="nomepai" placeholder="Nome do Pai" value="<?php echo $resultado['NMPAI']; ?>" >
												  	    </div>

												  	    <div  class=" form-group col-sm-2">
								  							<label>Data de Nascimento</label>	
													            
												            <input type="text" class="form-control" disabled id="data_nascimento" name="dtnascimentopai" placeholder="DD/MM/YYYY"
												            onkeypress="mascara(this, '##/##/####')" maxlength="10" data-error="Por favor, informe a data de nascimento." value="<?php echo $resultado['DTNASCPAI']; ?>"/>
												        </div>
													  
													    <div class="form-group col-md-2 ">
													  	  	<label>Profissão</label>
																		
															<select class="form-control"  disabled name="profissaopai">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_profissao");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 

																	  echo "<option value='{$res["CDPROF"]}' ".(($resultado['CDPROFPAI'] == $res["CDPROF"])? 'selected' : '').">{$res["NMPROF"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
												  	    </div>

													</div>

													
													<div class="row">
						  	  							
						  	  							<div class="form-group col-md-3 col-md-offset-1">
							  	  							<label>Mãe</label>
							  	  							<input type="text" class="form-control" disabled name="nomemae" value="<?php echo $resultado['NMMAE']; ?>" >
						  	  							</div>

						  	  							<div class="form-group col-md-2 ">
													  	  	<label>Data de Nascimento</label>
													  	  	
													  	  	<input type="text" class="form-control" disabled id="data_nascimento" name="dtnascimentomae" placeholder="DD/MM/YYYY"
												            onkeypress=" mascara(this, '##/##/####')" maxlength="10" data-error="Por favor, informe a data de nascimento." value="<?php echo $resultado['DTNASCMAE']; ?>"/>

												  	  	</div>
													  	
													  	<div class="form-group col-md-2 ">
													  	  	<label>Profissão</label>
																		
															<select class="form-control" disabled name="profissaomae">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_profissao");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 

																	 echo "<option value='{$res["CDPROF"]}' ".(($resultado['CDPROFMAE'] == $res["CDPROF"])? 'selected' : '').">{$res["NMPROF"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
												  	    </div>	
													</div>

													<div class="row">
						  	  							<div class="form-group col-md-3 col-md-offset-1">
													  	  	<label style="padding-top: 1em;">Casado(a):</label>

															<label class="radio-inline"> 
																<input type="radio" name="casado(a)" disabled checked onclick="_MostraCampo(true);" value="sim" >Sim
															</label>
															
															<label class="radio-inline">
																<input type="radio" name="casado(a)" disabled onclick="_MostraCampo(false);" value="nao">Não
															</label><br>
						  	  							</div>
							  							
													</div>

													<div class="row">
						  	  							
						  	  							<div class="form-group col-md-3 col-md-offset-1">
							  	  							<label id="labelnmconjuge">Conjuge</label>
							  	  							<input type="text" class="form-control" id="nmconjuge" disabled name="nmconjuge" value="<?php echo $resultado['NMCONJUGE']; ?>" >
						  	  							</div>

						  	  							<div class="form-group col-md-2 ">
													  	  	<label id="labeldtnascconjuge">Data de Nascimento</label>

													  	  	<input type="text" class="form-control" id="dtnascconjuge" disabled name="dtnascconjuge" placeholder="DD/MM/YYYY"
												            onkeypress=" mascara(this, '##/##/####')" maxlength="10" data-error="Por favor, informe a data de nascimento." value="<?php echo $resultado['DTNASCONJUGE']; ?>"/>
												  	  	</div>
													  	
													  	<div class="form-group col-md-2 ">
													  	  	<label id="labelprofissaoconjuge">Profissão</label>
																		
															<select class="form-control" id="profissaoconjuge" disabled name="profissaoconjuge">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_profissao");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 echo "<option value='{$res["CDPROF"]}'>{$res["NMPROF"]}</option>";

																	 echo "<option value='{$res["CDPROF"]}' ".(($resultado['CDPROFCONJUGE'] == $res["CDPROF"])? 'selected' : '').">{$res["NMPROF"]}</option>";
																						 
																	}
																					 
																?>
															<select><br>
												  	    </div>									  	  	  	
													</div>

													<div class="row">
														<div class="form-group col-md-3 col-md-offset-1">
													  	  	<label>Programas Sociais</label>
																		
															<select class="form-control" disabled onchange="select(this)" id="form_prepare"  name="progsociais">
																<option>Selecione</option>
																					
																<?php 
																	$query = mysql_query ("select * FROM tb_programa ORDER BY NMPROGRAMA ASC");
																					 
																	while($res=mysql_fetch_array($query)){
																						 
																	 echo "<option value='{$res["CDPROGRAMA"]}'>{$res["NMPROGRAMA"]}</option>";
																						 
																	}
																					 
																?>
															<select>	
												  	    </div>	    
													</div>


													<div class="row">
														<div class="col-xs-6 col-md-6 col-md-offset-4 ">
															<table class = "table table-striped"  id="gridprog">
																<thead>
																	<tr class="info">
																		<th width="130" aling="center">Nº</th>
																		<th width="500" aling="center"><span class="style9"><b>Programas</b></span></th>  
																		
																	</tr>
																</thead>
																
																<tbody>
																<?php while($programas = mysql_fetch_assoc($consulta_programas)){
																		echo "<tr>";
																			echo '<td>'.$programas[CDPROGRAMA].'</td>';
																			echo '<td>'.$programas[NMPROGRAMA].'</td>';
																		echo "</tr>";
																 } ?>
																		
																												
																</tbody>
															</table>
														</div> <!-- fim da div col-xs-12 col-md-12 -->
													</div><!-- /.row -->
												</div><!-- fim step3 -->

												<input type="hidden" name="id" value="<?php echo $resultado['CDPESSOA']; ?>" > 
												
												<ul class="list-inline pull-right">
													<li><button type="button" name="prev" class="btn btn-primary prev-step"><i class="glyphicon glyphicon-chevron-esquerda"></i> Voltar</button></li>
													<li><button type="button" name="prev" class="btn btn-danger" onclick='javascript:history.back(-1);'>Fechar Formulário</button></li>
												</ul>
											</div>
										</div><!-- fim tab-content -->
									</form>
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

	    <!-- Bootstrap Core JavaScript -->
	    <script src="js/bootstrap.min.js"></script>
 

	    <!-- Morris Charts JavaScript -->
	    <script src="js/plugins/morris/raphael.min.js"></script>
	    <script src="js/plugins/morris/morris.min.js"></script>
	    <script src="js/plugins/morris/morris-data.js"></script>	
	</body>
</html>