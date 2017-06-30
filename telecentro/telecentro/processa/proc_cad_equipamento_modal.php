<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$dsequipamento 		= $_POST["dsequipamento"];
	$nupatrimonio 		= $_POST["nupatrimonio"];
	$estconserva		= $_POST["estconserva"];
	$obs			    = $_POST["obs"];

	
	$query = mysql_query("INSERT INTO tb_equipamento(DSEQUIPAMENTO,NUPATRIMONIO,ESTCONSERVA,OBSEQUIPAMENTO)VALUES 
	('$dsequipamento','$nupatrimonio','$estconserva','$obs')");
	
	
					
					if(mysql_errno()== 1062){
						
						echo 002;
						
						
					}
					
					
					
					else{
						
						echo 001;
						
					} 
					
	?>	