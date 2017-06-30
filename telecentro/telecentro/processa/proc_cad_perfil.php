<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nomeperfil 	 = $_POST["nomeperfil"];
	$descricao 		 = $_POST["descricao"];
	
	$query = mysql_query("INSERT INTO tb_perfil(NMPERFIL,DSPERFIL)VALUES 
	('$nomeperfil','$descricao')");
?>
<!DOCTYPE html>	
<html lang="pt-br" >
	<head>
		<meta charset="utf-8">
	</head>	
	<body>
		<?php
			if(mysql_errno()== 1062){
				echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=9'>
							<script type=\"text/javascript\">
								alert(\"OPS! ESTE PERFIL JÁ ESTA CADASTRADO NO SISTEMA...\");
							</script>	
					";
			}
			else{
				echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=9'>
						<script type=\"text/javascript\">
							alert(\"PERFIL CADASTRADO COM SUCESSO!\");
						</script>
					";	
			}	
		?>
	</body>
</html>