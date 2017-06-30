<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$escola			 = $_POST["escola"];
	
	
	$query = mysql_query("INSERT INTO tb_escola(NMESCOLA)VALUES 
	('$escola')");
	
	
	
					
					if(mysql_errno()== 1062){
						
						echo 002;
						
						
					}
					
					
					
					else{
						
						echo 001;
						
					}
					
			?>
