<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$tipoatend		 = $_POST["tipoatend"];
	

	

	$query = mysql_query("INSERT INTO tb_tpatendimento(DSTPATENDIMENTO)VALUES 
	('$tipoatend')");


					if(mysql_errno()== 1062){
						
						echo 002;
						
						
					}
					
					
					
					else{
						
						echo 001;
						
					}
	
	?>
	
			
			
		