<?php
	session_start();
	include_once("login/seguranca.php");
	echo "Bem vindo:".$_SESSION['usuarioNome'];
?>

<br />
<a href = "login/sair.php"> Sair </a>



