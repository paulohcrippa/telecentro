<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nomeestcivil		 = $_POST["nomeestcivil"];

	$query = mysql_query("INSERT INTO tb_estcivil(NMESTCIVIL)VALUES 
	('$nomeestcivil')");
	
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
								alert(\"OPS! ESTE ESTADO CIVIL JÁ ESTÁ CADASTARDO NO SISTEMA!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=37'>
							<script type=\"text/javascript\">
								alert(\"ESTADO CIVIL CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>