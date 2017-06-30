<?php
	session_start();
	include_once("../login/seguranca.php");
	include_once("../login/conexao.php");

	$nmusuario =  $_SESSION['usuarioCodigo'];

	
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

	$codigos_programas = $_POST['codigoprograma'];
	$nomes_programas   = $_POST['nomeprograma'];
	$nomeresponsavel   = $_POST['nome_responsavel'];


     $cpf = mysql_escape_string($_POST['cpf']); 
		$sql = mysql_query("SELECT COUNT(cpf) as existe FROM tb_pessoa WHERE cpf = '{$cpf}' LIMIT 1;"); 
		$linha = mysql_fetch_array($sql); 
		
		if ($linha['existe']) { 
			
			echo"<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/telecentro/principal.php?link=6'>
				<script type=\"text/javascript\">
					alert(\"PESSOA JÁ CADASTRADA COM ESTE CPF\");
				</script>						
			";
		} else 

		{ 

				 $query= mysql_query("INSERT INTO  tb_pessoa (NMPESSOA, SEXO, DTNASC, NUTITULO, NUCT, CPF, RG, ORGEXP, CDESTCIVIL, FONERES, FONECEL, CEP, RUA, NUMRES, COMPLEMENTO, BAIRRO,CIDADE, ESTADO, CDNATURALIDADE, NMPAI, CDPROFPAI, DTNASCPAI, NMMAE, CDPROFMAE, DTNASCMAE, NMCONJUGE, CDPROFCONJUGE, DTNASCCONJUGE, CDESCOLARIDADE, CDESCOLA, TURNO, SERIE, SITUACAO, CDGRAUPAR, IDADE, STATUS, DTINCREG) 
			 		VALUES ('$nomepessoa', '$optradio', '$dtnascimento', '$titulo', '$carteiratrab', '$cpf','$rg', '$orgexp', '$estado_civil', '$telefone', '$celular','$cep', '$rua','$numcasa','$complemento','$bairro','$cidade', '$estado', '$naturalidade', '$nomepai', '$profissaopai','$dtnascimentopai','$nomemae','$profissaomae','$dtnascimentomae','$nmconjuge','$profissaoconjuge','$dtnascconjuge','$ensino','$escola','$turno','$serie','$situacao','$codigo_responsavel','$idade','A', NOW())");

			 if (!$query) {
				    die('Erro: ' . mysql_error());
				}else{
					// recupera o ID do atendimento inserido
					$pessoa_id = mysql_insert_id();

					if ($codigos_programas && is_array($codigos_programas)) {

						foreach ($codigos_programas as $key => $programa) {

							// echo $pessoa_id;
							// echo "Nome ".$nomes_programas[$key];

							// vinculas as os programas a pessoa 
							$query = mysql_query("INSERT INTO tb_programapessoa(CDPESSOA,CDPROGRAMA)VALUES ('$pessoa_id','$programa')");
						}
					}	
				}

				$insereresponsavel = mysql_query("INSERT INTO tb_responsaveis (CDGRAUPAR, CDPESSOA, NMRESPONSAVEL) VALUES (	
					'$codigo_responsavel', '$pessoa_id', '$nomeresponsavel') ");

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
											alert(\"PESSOA CADASTRADA COM SUCESSO!\");
										</script>
										
									";
									
								} 
		
		} 
			
 
?>