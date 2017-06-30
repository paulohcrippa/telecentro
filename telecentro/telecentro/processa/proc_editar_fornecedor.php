<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nome		= $_POST["nomefornecedor"];
	$codigo		= $_POST["id"];
	
	$query = mysql_query("UPDATE tb_fornecedor set NMFORNECEDOR = '$nome', DTALTREG = NOW() WHERE CDFORNECEDOR = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=52'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTE FORNECEDOR JÁ ESTA CADASTRADO NO SITEMA!\");
							</script>
							
						";
						
						
					}
					
					
					
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=52'>
							<script type=\"text/javascript\">
								alert(\"FORNECEDOR ALTERADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>