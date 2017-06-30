<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nomefornecedor		 = $_POST["nomefornecedor"];

	$query = mysql_query("INSERT INTO tb_fornecedor(NMFORNECEDOR)VALUES 
	('$nomefornecedor')");
	
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
								alert(\"OPS! ESTE FORNECEDOR JÁ ESTÁ CADASTARDO NO SISTEMA!\");
							</script>
							
						";
						
						
					}
								
					else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=52'>
							<script type=\"text/javascript\">
								alert(\"FORNECEDOR CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}
					
			?>

</body>
</html>