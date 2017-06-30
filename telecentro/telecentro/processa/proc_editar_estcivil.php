<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nome		= $_POST["nomeestcivil"];
	$codigo		= $_POST["id"];
	
	$query = mysql_query("UPDATE tb_estcivil set NMESTCIVIL = '$nome', DTALTREG = NOW() WHERE CDESTCIVIL = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=37'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTE ESTADO CIVIL JÁ ESTA CADASTRADO NO SITEMA!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=37'>
							<script type=\"text/javascript\">
								alert(\"ESTADO CIVIL ALTERADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>