<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nome		= $_POST["nomeprofissao"];
	$codigo		= $_POST["id"];
	
	$query = mysql_query("UPDATE tb_profissao set NMPROF = '$nome', DTALTREG = NOW() WHERE CDPROF = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=27'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTA PROFISSÃO JÁ ESTÁ CADASTRADA NO SITEMA!\");
							</script>
							
						";
						
						
					}
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=27'>
							<script type=\"text/javascript\">
								alert(\"PROFISSÃO ALTERADA COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>