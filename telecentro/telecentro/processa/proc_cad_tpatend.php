<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$tipoatend		 = $_POST["tipoatend"];
	

	

	$query = mysql_query("INSERT INTO tb_tpatendimento(DSTPATENDIMENTO)VALUES 
	('$tipoatend')");
	
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
							http://localhost/telecentro/principal.php?link=17'>
							<script type=\"text/javascript\">
								alert(\"tipo de atendimento já cadastrado.\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=16'>
							<script type=\"text/javascript\">
								alert(\"Tipo de atendimento cadastrado com sucesso.\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>