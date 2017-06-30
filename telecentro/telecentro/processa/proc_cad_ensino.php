<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$escolaridade			 = $_POST["ensino"];
	
	
	$query = mysql_query("INSERT INTO tb_escolaridade(DSESCOLARIDADE)VALUES 
	('$escolaridade')");
	
	
			if(mysql_errno()== 1062){
						
						echo
						"
							
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=34'>
							<script type=\"text/javascript\">
								alert(\"ESCOLARIDADE JÁ CADASTRADO!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=34'>
							<script type=\"text/javascript\">
								alert(\"ESCOLARIDADE CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}



	?>