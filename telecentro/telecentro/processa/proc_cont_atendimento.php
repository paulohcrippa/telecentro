<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");
	
	$pessoa 		    = $_POST["pessoa"];
	$instrutor		    = $_SESSION['usuarioCodigo'];
	$tpatendimento	    = $_POST["tpatendimento"];
	$dtatendimento	    = $_POST["dtatendimento"];
	$hinicio		    = $_POST["hinicio"];
	$hfinal			    = $_POST["hfinal"];
	$obs			    = $_POST["obs"];
	$codigos_atividades = $_POST['codigoatividade'];
	$nomes_atividades   = $_POST['nomeatividade'];
	$tipos_impressao    = $_POST['tpimpressao'];
	$qtds_impressao     = $_POST['qtdimpressao'];
	$impressao 			= $_POST['impressao'];
	$id 				= $_POST['id'];


	/*echo" PESSOA: $pessoa - " ;
	echo"INSTRUTOR: $instrutor - ";
	echo"ATENDIMENTO $tpatendimento - ";
	echo"DATA $dtatendimento - ";
	echo"HORA $hinicio - ";
	echo"HRFINAL $hfinal - ";
	echo"OBS $obs"; */

	
	/*$query = mysql_query("UPDATE tb_atendimento SET CDPESSOA = '$pessoa', DTATENDIMENTO = '$dtatendimento', 
						  HRINICIO = '$hinicio', HRFINAL = '$hfinal', OBSATENDIMENTO = '$obs', 
						  CDUSUARIO = '$instrutor', IMPRESSAO = '$impressao', DTINCREG = NOW()  WHERE CDATENDIMENTO = '$id'"); */


	$query = mysql_query("INSERT INTO tb_atendimento(CDPESSOA,DTATENDIMENTO,HRINICIO,HRFINAL,OBSATENDIMENTO,CDUSUARIO, IMPRESSAO, DTINCREG)VALUES
	('$pessoa','$dtatendimento','$hinicio','$hfinal','$obs','$instrutor','$impressao', NOW())");


	if (!$query) {
	    die('Erro: ' . mysql_error());
	}else{
		// recupera o ID do atendimento inserido
		$atendimento_id = mysql_insert_id();

		if ($codigos_atividades && is_array($codigos_atividades)) {

			foreach ($codigos_atividades as $key => $atividade) {

				// vincula as atividades ao atendimento
				$query = mysql_query("INSERT INTO tb_atendimentotipo(CDATENDIMENTO,CDTPATENDIMENTO)VALUES ('$atendimento_id',
					'$atividade')");
			}
		}

		if ($tipos_impressao && is_array($tipos_impressao)) {
			
			foreach ($tipos_impressao as $key => $impressao) {
				
				// vinculas as impressões ao atendimento
				$query = mysql_query("INSERT INTO tb_impressao(CDTPIMP,QTDIMPRESSAO,CDATENDIMENTO,DTINCREG)VALUES ('$impressao','$qtds_impressao[$key]','$atendimento_id', NOW())");

			}
		}
	}

					
		if(mysql_errno()== 1062)
	{				
		echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=8'>
				<script type=\"text/javascript\">
					alert(\"--\");
				</script>						
			";
	}
	else{
		echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=8'>
							<script type=\"text/javascript\">
								alert(\"ATENDIMENTO CADASTRADO COM SUCESSO!\");
							</script>
							
						";
						
					}
?>