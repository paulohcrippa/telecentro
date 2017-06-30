
<?php
	include("conexao.php");

	//faz a verificação se existe o botão
	if(isset($_POST[recuperar])){

		$email=$mysql->escape_string($_POST['email']);

		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$erro[] = "E-mail invalido";
		}

		$code_sql = "SELECT senha, CDUSUARIO FROM tb_usuario WHERE EMAIL = '$email'";
		$sql_query = $mysql->query($sql_code) or die($mysql->error);
		$dado = $sql_query->fetch_assoc();
		$total = $sql_query->num_rows;

		if($total == 0)
			$erro[]="O e-mail informado não existe no banco de dados";

		if(count($erro)==0 && $total >0){

			$novasenha = substr(md5(time()), 0, 6);
			$nscriptografada = md5(md5($novasenha));
			

			if(mail($email, "Sua nova senha", "Sua nova senha:".$novasenha)){
				
				$sql_code = "UPDATE tb_usuario SET senha = '$nscriptografada'WHERE email ='$email'";
			    $sql_query = $mysql->query($sql_code) or die($mysql->error);
			}
		}		
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>Login-CTC</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">
	<script src="js/login.js"></script>
  
  </head>
  <body role="login">
			
			
			<?php
				session_start();
				unset($_SESSION['usuarioCodigo'],
			          $_SESSION['usuarioNome'],
			          $_SESSION['usuarioEmail'],
					  $_SESSION['usuarioLogin'], 
			          $_SESSION['usuarioSenha'], 
		              $_SESSION['usuarioPerfil']);
					  
			?>
			<section id="login">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-wrap">
								<div class="profile-header-container">   
									<div class="profile-header-img">
										<img class="img-circle" src="../imagens/logo.jpg" />
										<!-- badge -->
										<div class="rank-label-container">
											<span class="label label-default rank-label"><font size= "2px" color ="black">CTC - Centro Tecnológico de Capacitação</font></span>
										</div>
									</div>
								</div> 
								<form role="form" action="valida_login.php" method="post" id="login-form" autocomplete="off">
									
									<div class="form-group"> 
										<label for="usuario" class="sr-only">Login</label>
										<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuário" >
									</div>
									<div class="form-group">
										<label for="senha" class="sr-only">Senha</label>
										<input type="password" name="senha" id="key" class="form-control" placeholder="Senha">
									</div>
									<input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Entrar">
								</form>
								<a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Esqueceu sua Senha?</a>
								<hr>
							</div>
						</div> <!-- /.col-xs-12 -->
					</div> <!-- /.row -->
												<?php
												
												
													//verifica se a variavel global está vazia e exibe na tela
														if(isset($_SESSION['loginErro'])){
										
														echo $_SESSION['loginErro'];
										
														unset($_SESSION['loginErro']);
													}
												?>
				</div> <!-- /.container -->
											
		</section>

			<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
					   <form method="POST" action="recupera_senha.php">
							<div class ="modal-header">
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">×</span>
									<span class="sr-only">Fechar</span>
								</button>
								<h4 class="modal-title">Recuperar Senha</h4>
							</div>
							<div class="modal-body">
								<p>Insera o e-mail cadastrado</p>
								<input type="email" name="email" id="email" class="form-control" autocomplete="off">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<button type="submit" name="recuperar" value="recuperar" class="btn btn-custom">Enviar</button>
							</div>
						</form>
					</div> <!-- /.modal-content -->
						<?php if(count($erro)>0)
							foreach ($erro as $msg) {

								echo "<p>$msg</p>";
							}


						?>
				</div> <!-- /.modal-dialog -->
			</div> <!-- /.modal -->

				<footer id="footer">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<p>CTC © - 2016</p>
								<!--<p>Powered by <strong><a href="http://www.facebook.com/tavo.qiqe.lucero" target="_blank">TavoQiqe</a></strong></p> -->
							</div>
						</div>
					</div>
				</footer>
										
												
													
										  
	
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>