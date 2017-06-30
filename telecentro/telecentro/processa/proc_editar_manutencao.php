<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");

	$codigo 	     = $_POST["id"];
	
	$fornecedor		    	= $_POST["fornecedor"];
	$instrutor		    	= $_POST["instrutor"];
	$dtsaida		    	= $_POST["dtsaida"];
	$dtretorno		    	= $_POST["dtretorno"];
	$descricao			    = $_POST["descricao"];
	$codigos_equipamentos 	= $_POST['codigoequipamento'];
	$nomes_equipamentos   	= $_POST['nomeatividade'];
	$observacao				= $_POST['obsretorno'];

	$query = mysql_query("UPDATE tb_manutencao set CDFORNECEDOR ='$fornecedor', CDUSUARIO='$instrutor', DTRETORNO = '$dtretorno', DTSAIDA = '$dtsaida', DSMANUTENCAO = '$descricao', OBS = '$observacao' WHERE CDMANUTENCAO = '$codigo' ");

	if (!$query) {
	    die('Erro: ' . mysql_error());
	}else{
		// recupera o ID do atendimento inserido
		//$manutencao_id = mysql_insert_id();

		if ($codigos_equipamentos && is_array($codigos_equipamentos)) {

			foreach ($codigos_equipamentos as $key => $equipamentos) {

				// echo $manutencao_id;
				// echo "Nome ".$nomes_equipamentos[$key];

				// vinculas as atividades ao atendimento
				$query = mysql_query("INSERT INTO tb_equipamento_manutencao(CDMANUTENCAO,CDEQUIPAMENTO)VALUES ('$codigo','$equipamentos')");
			}
		}
	}
	if(mysql_errno()== 1062)
	{				
		echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=58'>
				<script type=\"text/javascript\">
					alert(\"--\");
				</script>						
			";
	}
	else{
		echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=58'>
							<script type=\"text/javascript\">
								alert(\"MANTUENÇÃO EDITADO COM SUCESSO!\");
							</script>
							
						";
						
					}
 
?>
