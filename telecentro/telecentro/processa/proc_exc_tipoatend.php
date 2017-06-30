<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo  = $_GET["id"];


	$query = "DELETE FROM tb_tpatendimento WHERE CDTPATENDIMENTO = '$codigo' ";
	$resultado = mysql_query($query); 

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
								alert(\"Tipo de Atendimento excluido com sucesso.\");
							</script>
							
						";
						
					}else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=16'>
							<script type=\"text/javascript\">
								alert(\"Não foi possivel excluir o tipo de atendimento.\");
							</script>
							
						";
						
					}
			?>
				

</body>
</html>