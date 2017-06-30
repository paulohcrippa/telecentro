<?php
		session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");

	$nmusuario =  $_SESSION['usuarioCodigo'];

	$codigo 	     = $_POST["id"];
	
	$nomepessoa 		= $_POST["nomepessoa"];
	$optradio			= $_POST["optradio"];
	$dtnascimento   	= $_POST["data_nascimento"];
	$estado_civil   	= $_POST["estado_civil"];
	$codigo_responsavel		= $_POST["responsavel"];
	$naturalidade		= $_POST["naturalidade"];
	$telefone			= $_POST["telefone"];
	$celular			= $_POST["celular"];
	$rg             	= $_POST["rg"];
	$orgexp         	= $_POST["orgexp"];
	$cpf            	= $_POST["cpf"]; 
	$titulo        		= $_POST["titulo"];
	$carteiratrab   	= $_POST["carteiratrab"];
	$idade				= $_POST["idade"];
	
	//Dados do endereco e escolar

	$cep   				= $_POST["cep"];
	$rua            	= $_POST["rua"];
	$numcasa        	= $_POST["numcasa"];
	$complemento    	= $_POST["complemento"];
	$bairro         	= $_POST["bairro"];
	$cidade         	= $_POST["cidade"];
	$estado         	= $_POST["estado"];
	$escola         	= $_POST["escola"];
	$serie          	= $_POST["serie"];
	$ensino         	= $_POST["ensino"];
	$turno         		= $_POST["turno"];
	$situacao       	= $_POST["situacao"];

	$nomepai			= $_POST["nomepai"];
	$profissaopai		= $_POST["profissaopai"];
	$dtnascimentopai	= $_POST["dtnascimentopai"];	
	$nomemae			= $_POST["nomemae"];
	$profissaomae		= $_POST["profissaomae"];
	$dtnascimentomae	= $_POST["dtnascimentomae"];
	$nmconjuge 			= $_POST["nmconjuge"];
	$profissaoconjuge	= $_POST["profissaoconjuge"];
	$dtnascconjuge      = $_POST["dtnascconjuge"];

	//$codigos_programas = $_POST['programas'];
	$nomes_programas   = $_POST['programa'];
	$nomeresponsavel   = $_POST['nomeresponsavel'];

	

	

	$query = mysql_query("UPDATE tb_pessoa set NMPESSOA  = '$nomepessoa', SEXO ='$optradio',
	DTNASC='$dtnascimento', NUTITULO = '$titulo', NUCT  ='$carteiratrab', CPF = '$cpf', RG='$rg', ORGEXP='$orgexp', CDESTCIVIL='$estado_civil', 
	FONERES = '$telefone', FONECEL = '$celular', CEP='$cep', RUA='$rua', NUMRES='$numcasa', COMPLEMENTO='$complemento', BAIRRO='$bairro', CIDADE='$cidade', ESTADO='$estado', CDNATURALIDADE='$naturalidade', NMPAI='$nomepai', CDPROFPAI='$profissaopai', DTNASCPAI='$dtnascimentopai', NMMAE='$nomemae', CDPROFMAE='$profissaomae', DTNASCMAE='$dtnascimentomae', NMCONJUGE='$nmconjuge', CDPROFCONJUGE='$profissaoconjuge', DTNASCCONJUGE='$dtnascconjuge', CDESCOLARIDADE='$ensino', CDESCOLA='$escola', TURNO='$turno', SERIE='$serie', SITUACAO='$situacao', CDGRAUPAR='$codigo_responsavel', IDADE='$idade', 
	DTALTREG = NOW() WHERE CDPESSOA = '$codigo' ");


if (!$query) {
	    die('Erro: ' . mysql_error());
	}else{
		// recupera o ID do atendimento inserido
		//$pessoa_id = mysql_insert_id();

		if ($codigos_programas && is_array($codigos_programas)) {

			foreach ($codigos_programas as $key => $programa) {

				//echo $pessoa_id;
				// echo "Nome ".$nomes_programas[$key];

				// vinculas as os programas a pessoa 
				$query = mysql_query("UPDATE tb_programapessoa set CDPROGRAMA = '$programa', CDPESSOA ='$codigo' where CDPESSOA = '$codigo' ");
			}
		}	
		
	}
      $atualizaresponsavel = mysql_query(" UPDATE  tb_responsaveis set  NMRESPONSAVEL = '$nomeresponsavel', CDGRAUPAR = '$codigo_responsavel' where CDPESSOA = '$codigo' ");


	if(mysql_errno()== 1062)
	{				
		echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=5'>
				<script type=\"text/javascript\">
					alert(\"--\");
				</script>						
			";
	}
	else{
		echo
						"
							<META HTTP-EQUIV=REFRESH CONTENT = '0; URL= 
							http://localhost/telecentro/principal.php?link=5'>
							<script type=\"text/javascript\">
								alert(\"PESSOA ALTERADA COM SUCESSO!\");
							</script>
							
						";
						
					} 

 
	?>
