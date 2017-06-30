<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$dsescolaridade		 = $_POST["dsescolaridade"];
	

	

	$query = mysql_query("INSERT INTO tb_escolaridade(DSESCOLARIDADE)VALUES 
	('$dsescolaridade')");
	
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
							http://localhost/telecentro/principal.php?link=34'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTA ESCOLARIDADE JÁ ESTÁ CADASTARDA NO SISTEMA!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=34'>
							<script type=\"text/javascript\">
								alert(\"TIPO DE ESCOLARIDADE CADASTRADA COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>