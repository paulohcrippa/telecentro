<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$dsgraupar		= $_POST["dsgraupar"];
	$codigo		= $_POST["id"];
	
	$query = mysql_query("UPDATE tb_graupar set DSGRAUPAR = '$dsgraupar', DTALTREG = NOW() WHERE CDGRAUPAR = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=40'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTE GRAU PARENTESCO JÁ ESTÁ CADASTRADO NO SITEMA!\");
							</script>
							
						";
						
						
					}
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=40'>
							<script type=\"text/javascript\">
								alert(\"GRAU PARENTESCO ALTERADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>