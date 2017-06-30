<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo 	     		= $_POST["id"];
	$nome 			 		= $_POST["nome"];
	$estconserva 			= $_POST["estconserva"];
	$npatrimonio		 	= $_POST["npatrimonio"];
	//$dtsituacao	 	 		= $_POST["usuario"];
	$obs 			 		= $_POST["obs"];

	$query = mysql_query("UPDATE tb_equipamento set DSEQUIPAMENTO ='$nome',
	ESTCONSERVA = '$estconserva', NUPATRIMONIO ='$npatrimonio', OBSEQUIPAMENTO='$obs',
	DTALTREG = NOW() WHERE CDEQUIPAMENTO = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=49'>
							<script type=\"text/javascript\">
							
								alert(\"EQUIPAMENTO ALTERADO COM SUCESSO!\");
							</script>
							
						";
						
					}else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=49'>
							<script type=\"text/javascript\">
								alert(\"NÃO FOI POSSÍVEL ALTERAR ESTE EQUIPAMENTO\");
							</script>
							
						";
						
					}
			?>

</body>
</html>