<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo 	     = $_POST["id"];
	$nomeperfil 	 = $_POST["nome"];
	$descricao 		 = $_POST["descricao"];
	
	$query = mysql_query("UPDATE tb_perfil set NMPERFIL = '$nomeperfil', DSPERFIL ='$descricao',
	DTALTREG = NOW() WHERE CDPERFIL = '$codigo' ");	
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
							alert(\"OPS! O PERFIL NÃO PODE SER ALTERADO...\");
						</script>	
					";
			}
			else{
				echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=9'>
						<script type=\"text/javascript\">
							alert(\"PERFIL ALTERADO COM SUCESSO!\");
						</script>
					";	
			}	
		?>
	</body>
</html>