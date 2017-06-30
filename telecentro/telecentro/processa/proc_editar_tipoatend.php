<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo 	     = $_POST["id"];
	$tipoatendimento 	     = $_POST["dstpatendimento"];
	
	

	$query = mysql_query("UPDATE tb_tpatendimento set DSTPATENDIMENTO = '$tipoatendimento' WHERE CDTPATENDIMENTO = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=16'>
							<script type=\"text/javascript\">
							
								alert(\"Tipo de atendimento alterado com sucesso.\");
							</script>
							
						";
						
					}else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=16'>
							<script type=\"text/javascript\">
								alert(\"Não foi possivel alterar o tipo de atendimento.\");
							</script>
							
						";
						
					}
			?>

</body>
</html>