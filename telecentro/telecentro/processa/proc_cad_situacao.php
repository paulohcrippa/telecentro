<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nomesituacao = $_POST["nomesituacao"];
	
	
	$query = mysql_query("INSERT INTO tb_situacao(DSSITUACAO) VALUES ('$nomesituacao')");
	?>
	<!DOCTYPE html>
	
	<html lang="pt-br" >
		<head>
			<meta charset="utf-8">
		</head>
		
	 <body>
				<?php
					
					
					if(mysql_errno()== 1062){
						
						echo
						"
							
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=43'>
							<script type=\"text/javascript\">
								alert(\"OPS... ESTÁ SITUAÇÃO JÁ ESTÁ CADASTRADA NO SISTEMA!\");
							</script>
							
						";
												
					}
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=43'>
							<script type=\"text/javascript\">
								alert(\"SITUAÇÃO CADASTRADA COM SUCESSO!\");
							</script>
							
						";						
					}
			?>
</body>
</html>