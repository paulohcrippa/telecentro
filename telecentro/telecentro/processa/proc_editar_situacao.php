<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$dssituacao		= $_POST["dssituacao"];
	$codigo		= $_POST["id"];
	
	$query = mysql_query("UPDATE tb_situacao set DSSITUACAO = '$dssituacao', DTALTREG = NOW() WHERE CDSITUACAO = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=43'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTE SITUAÇÃO JÁ ESTÁ CADASTRADA NO SITEMA!\");
							</script>
							
						";
						
						
					}
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=43'>
							<script type=\"text/javascript\">
								alert(\"SITUAÇÃO ALTERADA COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>