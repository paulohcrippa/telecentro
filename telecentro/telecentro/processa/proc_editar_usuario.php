<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo 	     = $_POST["id"];
	$nome 			 = $_POST["nome"];
	$telefone 		 = $_POST["telefone"];
	$celular		 = $_POST["celular"];
	$usuario	 	 = $_POST["usuario"];
	$senha 			 = $_POST["senha"];
	$nivel_de_acesso = $_POST["nivel_de_acesso"];
	$email			 = $_POST["email"];
	

	$query = mysql_query("UPDATE tb_usuario set CDPERFIL = '$nivel_de_acesso', NMUSUARIO ='$nome',
	EMAIL='$email', FONERES = '$telefone', FONECEL ='$celular', LOGIN = '$usuario', SENHA='$senha',
	DTALTREG = NOW() WHERE CDUSUARIO = '$codigo' ");
	
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
							http://localhost/telecentro/principal.php?link=1'>
							<script type=\"text/javascript\">
							
								alert(\"usuário Alterado com sucesso.\");
							</script>
							
						";
						
					}else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=1'>
							<script type=\"text/javascript\">
								alert(\"Não foi possivel Alterar este usuario.\");
							</script>
							
						";
						
					}
			?>

</body>
</html>