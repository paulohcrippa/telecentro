<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$profissao			 = $_POST["profissao"];
	
	
	$query = mysql_query("INSERT INTO tb_profissao(NMPROF)VALUES ('$profissao')");
	
	
		if(mysql_errno()== 1062){
						
						echo 002;
						
						
					}
					
					
					
					else{
						
						echo 001;
						
					}
					
			?>

