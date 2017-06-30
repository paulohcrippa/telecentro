<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo 	     = $_POST["id"];
	$tipoimpressao   = $_POST["dstpimpressao"];
	
	

	$query = mysql_query("UPDATE tb_tpimpressao set DSTPIMP = '$tipoimpressao' WHERE CDTPIMP = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=31'>
							<script type=\"text/javascript\">
							
								alert(\"TIPO DE IMPRESSÃO ALTERADA COM SUCESSO!\");
							</script>
							
						";
						
					}else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=31'>
							<script type=\"text/javascript\">
								alert(\"NÃO FOI POSSÍVEL ALTERAR ESTE TIPO DE IMPRESSÃO!\");
							</script>
							
						";
						
					}
			?>

</body>
</html>