<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$escolaridade			 = $_POST["ensino"];
	
	
	$query = mysql_query("INSERT INTO tb_escolaridade(DSESCOLARIDADE)VALUES 
	('$escolaridade')");
	
	
			if(mysql_errno()== 1062){
						
						echo 002;
						
						
					}
					
					
					
					else{
						
						echo 001;
						
					}



	?>