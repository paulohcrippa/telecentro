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
						
						echo 002;
						
						
					}
					
					
					
					else{
						
						echo 001;
						
					}
					
			?>

</body>
</html>