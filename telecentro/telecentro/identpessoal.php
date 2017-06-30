<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

<?php 
include_once("frmpessoa.php");
?>


<body>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<section>
						<div class="wizard">
							<form class="form-horizontal" role="form" method = "POST" action = "dadocomplement.php">
								<div class="tab-content">
									<div class="tab-pane active" role="tabpanel" id="step1">
										<div class="step33">
											<h5><strong>Indentificação Pessoal</strong></h5>
												<hr>
													<div class="row mar_ned">
																			
													</div>
																		
													<label>Nome:</label>
														<input  type="text" id="Nomepessoa" name="Nomepessoa" placeholder="Nome da Pessoa"><br>
													
													<label style="padding-top: 1em;">Data Nascimento:</label>
														<input  type="date" id="dtnascimento" name="dtnascimento"  ><br>
													
													
													
													<label style="padding-top: 1em;">Idade:</label>
														<input  type="text" id="idadepessoa" name="idadepessoa" ><br>
															<?php
																
																 // Declara a data! :P

																	
																$data = '10/11/1992';
															
																//date('dd/mm/YYYY',strtotime('') );
																	
																	// Separa em dia, mês e ano
																list($dia, $mes, $ano) = explode('/', $data);
															   
																// Descobre que dia é hoje e retorna a unix timestamp
																$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
																
																// Descobre a unix timestamp da data de nascimento da pessoa
																$nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
															   
																// cálculo da idade :)
																$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
																echo $idade;
																	
															?>
																		
													<label style="padding-top: 1em;" >Sexo:</label>
															
													<label class="radio-inline">
														<input type="radio" name="optradio" value="masculino">Masculino
													</label>
													<label class="radio-inline">
														<input type="radio" name="optradio" value="feminino">Feminino
													</label><br>
															
													<label style="padding-top: 1em;">Estado Civil:</label>
																		
													<select name="Estado_Civil">
																<option>Selecione</option>
															
																<?php 
																 $query = mysql_query ("select * FROM tb_estado_civil");
																 
																 while($res=mysql_fetch_array($query)){
																	 
																	 echo "<option value='{$res["codigoestadocivil"]}'>{$res["nomeestadocivil"]}</option>";
																	 
																 }
																 
																?>
																
													</select><br>
																			
													<label style="padding-top: 1em;">Naturalidade:</label>
														<input type="text" name="naturalidade" id="naturalidade" placeholder="Naturalidade"><br>
													
													<label style="padding-top: 1em;">Telefone:</label>
														<input type="text" name="Telefone" id="Telefone" placeholder="Telefone">
													
													<label style="padding-top: 1em;">Celular:</label>
														<input type="text" name="Celular" id="Celular" placeholder="Celular">
													
													<label style="padding-top: 1em;">RG:</label>
														<input type="text" name="RG" id="RG" >
													
													<label style="padding-top: 1em;">Orgão Expedidor:</label>
														<input type="text" name="Oexp" id="Oexp" >
													
													<label style="padding-top: 1em;">CPF:</label>
														<input type="text" name="CPF" id="CPF" >
										</div> <!-- fim classe step33 -->
													<ul class="list-inline pull-right">
														<li><input type="submit" class="btn btn-primary next-step">Avançar</input></li>
													</ul>
										
									</div> <!-- fim classe tab-pane step1 --> 
								</div> <!-- fim classe tab-content-->
							</form> 
						</div> <!-- fim da div wizard -->
					<section>
				</div> <!-- fim da div row -->
			</div> <!-- fim da div container-fluid -->
		</div>
	</div>
	
</body>

</html>

			
				

									