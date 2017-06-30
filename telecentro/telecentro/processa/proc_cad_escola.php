<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$escola			 = $_POST["escola"];
	
	
	$query = mysql_query("INSERT INTO tb_escola(NMESCOLA)VALUES 
	('$escola')");
	
	
	
					
					if(mysql_errno()== 1062){
						
						echo
						"
							
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=22'>
							<script type=\"text/javascript\">
								alert(\"ESCOLA JÁ CADASTRADO!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=22'>
							<script type=\"text/javascript\">
								alert(\"ESCOLA CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>
