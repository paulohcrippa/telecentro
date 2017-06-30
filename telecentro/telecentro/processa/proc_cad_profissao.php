<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$profissao			 = $_POST["profissao"];
	
	
	$query = mysql_query("INSERT INTO tb_profissao(NMPROF)VALUES ('$profissao')");
	
	
		if(mysql_errno()== 1062){
						
						echo
						"
							
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=27'>
							<script type=\"text/javascript\">
								alert(\"PROFISSÃO JÁ CADASTRADO!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=27'>
							<script type=\"text/javascript\">
								alert(\"PROFISSÃO CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

