<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$dsequipamento 		= $_POST["dsequipamento"];
	$nupatrimonio 		= $_POST["nupatrimonio"];
	$estconserva		= $_POST["estconserva"];
	$obs			    = $_POST["obs"];
		
	$query = mysql_query("INSERT INTO tb_equipamento(DSEQUIPAMENTO,NUPATRIMONIO,ESTCONSERVA,OBSEQUIPAMENTO)VALUES 
	('$dsequipamento','$nupatrimonio','$estconserva','$obs')");
	
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
							http://localhost/telecentro/principal.php?link=49'>
							<script type=\"text/javascript\">
								alert(\"EQUIPAMENTO JÁ CADASTRADO!\");
							</script>
							
						";
						
						
					}

					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=49'>
							<script type=\"text/javascript\">
								alert(\"EQUIPAMENTO CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>