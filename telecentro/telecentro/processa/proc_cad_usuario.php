<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$nome 			 = $_POST["nome"];
	$telefone 		 = $_POST["telefone"];
	$celular		 = $_POST["celular"];
	$email			 = $_POST["email"];
	$usuario 		 = $_POST["usuario"];
	$senha 			 = $_POST["senha"];
	$nivel_de_acesso = $_POST["perfil"];

	$query = mysql_query("INSERT INTO tb_usuario(NMUSUARIO,FONERES,FONECEL,LOGIN,SENHA,EMAIL,CDPERFIL)VALUES 
	('$nome','$telefone','$celular','$usuario','$senha','$email','$nivel_de_acesso')");
	
?>
<!DOCTYPE html>
<html lang="pt-br" >
	<head>
		<meta charset="utf-8">
	</head>	
	 <body>
		<?php
			if(mysql_errno()== 1062){
				echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=1'>
						<script type=\"text/javascript\">
							alert(\"OPS! ESTE USUÁRIO JÁ ESTA CADASTRADO NO SITEMA...\");
						</script>
					";
			}
			else{
				echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=1'>
					<script type=\"text/javascript\">
						alert(\"USUÁRIO CADASTRADO COM SUCESSO!\");
					</script>
				";
			}	
			?>
	</body>
</html>