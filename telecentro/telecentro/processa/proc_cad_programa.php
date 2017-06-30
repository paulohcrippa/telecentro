<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nomeprograma			 = $_POST["nomeprograma"];
	
	
	$query = mysql_query("INSERT INTO tb_programa(NMPROGRAMA)VALUES ('$nomeprograma')");
	
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
								alert(\"PROGRAMA SOCIAL JÁ CADASTRADO!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=46'>
							<script type=\"text/javascript\">
								alert(\"PROGRAMA SOCIAL CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>