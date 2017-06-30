<?php 
	ob_start();
	
	// verifica se as sessoes estao vazias
	
	if(($_SESSION['usuarioCodigo'] == "") || ($_SESSION['usuarioNome'] == "")|| ($_SESSION['usuarioLogin'] == "") || ($_SESSION['usuarioSenha'] == "")|| ($_SESSION['usuarioPerfil'] == ""))
	{
		// Limpa todas as variaveis
		
		unset($_SESSION['usuarioCodigo'],
			  $_SESSION['usuarioNome'],
			  $_SESSION['usuarioLogin'], 
			  $_SESSION['usuarioSenha'], 
		      $_SESSION['usuarioPerfil']);
					  
		$_SESSION['loginErro'] = 
		"<div class = 'alert alert-info' role='alert'>
		<strong>Atenção!</strong> Área Restrita Digite um usuário e uma senha.
		
		</div>";
		
		
		//manda o usuario para o login
		
		header("Location: login/login.php");
		
	}

?>
