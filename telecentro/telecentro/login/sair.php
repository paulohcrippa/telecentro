<?php
 session_start();
 session_destroy();
 
 // Remove todas as informaçoes contidas nas variaveis globais
 
 unset($_SESSION['usuarioCodigo'],
	   $_SESSION['usuarioNome'],
	   $_SESSION['usuarioLogin'], 
	   $_SESSION['usuarioSenha'], 
	   $_SESSION['usuarioPerfil']);
	   
  // Manda para a pagina de login
  
  header ("Location: login.php");
					  

?>