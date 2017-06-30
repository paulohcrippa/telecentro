<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo 	     = $_POST["id"];
	$dsescolaridade   = $_POST["dsescolaridade"];
	
	

	$query = mysql_query("UPDATE tb_escolaridade set DSESCOLARIDADE = '$dsescolaridade' WHERE CDESCOLARIDADE = '$codigo' ");
	
	?>
	<!DOCTYPE html>
	
	<html lang="pt-br" >
		<head>
			<meta charset="utf-8">
		</head>
		
	 <body>
				<?php
					
					
					if(mysql_affected_rows()!= 0){
						
						echo
						"
							
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=34'>
							<script type=\"text/javascript\">
							
								alert(\"ESCOLARIDADE ALTERADA COM SUCESSO!\");
							</script>
							
						";
						
					}else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=34'>
							<script type=\"text/javascript\">
								alert(\"NÃO FOI POSSÍVEL ALTERAR ESTA ESCOLARIDADE!\");
							</script>
							
						";
						
					}
			?>

</body>
</html>