<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nome		= $_POST["nomeescola"];
	$codigo		= $_POST["id"];
	
	$query = mysql_query("UPDATE tb_escola set NMESCOLA = '$nome', DTALTREG = NOW() WHERE CDESCOLA = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=22'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTA ESCOLA JÁ ESTÁ CADASTRADA NO SITEMA!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=22'>
							<script type=\"text/javascript\">
								alert(\"ESCOLA ALTERADA COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>