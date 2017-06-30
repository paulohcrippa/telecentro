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
							<form class="form-horizontal" role="form" method = "POST" action = "processa/proc_cad_pessoa.php">
								<div class="tab-content">
									<div class="tab-pane" role="tabpanel" id="step2">
										<div class="step33">
											<h5><strong>  </strong></h5>
											<hr>
												<div class="row mar_ned">
													
												</div>
												
												<label>CEP (Somente números):</label><br />
												<input type="text" name="cep" id="cep" maxlength="8" />
 
											<br /><br />
 
													<label>Rua:</label><br />
													<input type="text" name="rua" id="rua" size="45" />
										 
													<br /><br />
										 
													<label>Número:</label><br />
													<input type="text" name="numero" id="numero" size="5" />
										 
													<br /><br />
										 
													<label>Bairro:</label><br />
													<input type="text" name="bairro" id="bairro" size="25" />
										 
													<br /><br />
										 
													<label>Cidade:</label><br />
													<input type="text" name="cidade" id="cidade" size="25" />
										 
													<br /><br />
										 
													<label>Estado:</label><br />
													<input type="text" name="estado" id="estado" size="2" />
										 
											<br /><br />
												
												<label style="padding-top: 1em;">Nome da Escola:</label>
												<input  type="text" id="escolaridade" name="escolaridade"><br>
												
												<label style="padding-top: 1em;">Série:</label>
												<input  type="text" id="serie" name="serie"><br>
												
												<label style="padding-top: 1em;">Turno:</label>
												
													<select name="Turno">
																<option>Selecione</option>
																<option value="1">Matutino</option>
																<option value="2">Vespertino</option>
																<option value="3">Noturno</option>
													</select><br>
												
												<label style="padding-top: 1em;">Responsável:</label>
												<input  type="text" id="responsavel" name="responsavel"><br>
										</div> <!-- fim da div step33 -->
											<ul class="list-inline pull-right">
												<li><button type="button" class="btn btn-default prev-step">Voltar</button></li>
												<li><button type="button" class="btn btn-primary next-step">Salvar e continuar</button></li>
											</ul>
									</div> <!-- fim da div step2 -->
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

			
				

									