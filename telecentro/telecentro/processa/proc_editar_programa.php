<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nome		= $_POST["nmprograma"];
	$codigo		= $_POST["id"];
	
	$query = mysql_query("UPDATE tb_programa set NMPROGRAMA = '$nome', DTALTREG = NOW() WHERE CDPROGRAMA = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=46'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTE PROGRAMA SOCIAL JÁ ESTA CADASTRADO NO SITEMA!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=46'>
							<script type=\"text/javascript\">
								alert(\"PROGRAMA SOCIAL ALTERADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>