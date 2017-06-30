<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$codigo  = $_GET["id"];

	//$consulta = mysql_query("SELECT * FROM tb_programapessoa");

	//$resultado = mysql_fetch_array($consulta);

	//if($resultado['CDPROGRAMA'] == "1"){

		 /*echo
						"
							
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=46'>
							<script type=\"text/javascript\">
								alert(\" NÃO FOI POSSÍVEL EXCLUIR ESTE PROGRAMA SOCIAL, ESTÁ RELACIONADO A PESSOA !\");
							</script>
							
						"; */


	
		$query = "DELETE FROM tb_programa WHERE CDPROGRAMA = '$codigo' ";
		$resultado = mysql_query($query);

		if(mysql_affected_rows()!= 0){
						
						echo
						"
							
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=46'>
							<script type=\"text/javascript\">
								alert(\"PROGRAMA SOCIAL EXCLUÍDO COM SUCESSO!\");
							</script>
							
						";
						
					}else{
						
						echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=46'>
							<script type=\"text/javascript\">
								alert(\"NÃO FOI POSSÍVEL EXCLUIR ESTE PROGRAMA SOCIAL...\");
							</script>
							
						";
						
					} 
	?>
		