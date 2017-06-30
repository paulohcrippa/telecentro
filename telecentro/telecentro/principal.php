<?php 
	session_start();

	include_once("login/seguranca.php");
	include_once("login/conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type"  content="text/html">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Painel Administrativo">
		<meta name="author" content="Paulo/Tayane">
		
		<title>CTC - Administrativo</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Customização CSS -->
		<link href="css/sb-admin.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="css/plugins/morris.css" rel="stylesheet">
			
		<link href="css/formulario.css" rel="stylesheet">
		<link href="css/agenda.css" rel="stylesheet">
			
		<!-- Customização de Fontes -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- DataTables CSS -->
		<link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

		<!-- DataTables Responsive CSS -->
		<link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

		<link rel="icon" type="image/png" sizes="96x96" href="imagens/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="imagens/favicon/android-icon-192x192.png">
		
	</head>
    <body>
        <?php  
			include_once ("menu_adm.php");

			// eliminei o 55 parou na posicao 65
            
            @$link = $_GET["link"]; 
            
			$pag[3] 	= "administrativo.php";
			
            $pag[1] 	= "list/listausuarios.php";
			$pag[5] 	= "list/listapessoas.php";
			$pag[8] 	= "list/listatendimentos.php";
			$pag[9] 	= "list/listaperfil.php";
			$pag[16] 	= "list/listatipoatend.php";
			$pag[22]	= "list/listaescolas.php";
			$pag[27]	= "list/listaprofissoes.php";
			$pag[31]	= "list/listatpimpressao.php";
			$pag[34]	= "list/listaescolaridade.php";
			$pag[37]	= "list/listaestadocivil.php";
			$pag[40]	= "list/listagraupar.php";
			$pag[43]	= "list/listasituacao.php";
			$pag[46]	= "list/listaprogramas.php";
			$pag[49]	= "list/listaequipamentos.php";
			$pag[52]	= "list/listafornecedor.php";
			$pag[58]	= "list/listamanutencao.php";
			
			$pag[2] 	= "forms/frmusuario.php";
			$pag[6] 	= "forms/frmpessoa.php";
			$pag[10] 	= "forms/frmperfil.php";
			$pag[11] 	= "forms/frmatendimento.php";
			$pag[17] 	= "forms/frmtpatend.php";
			$pag[23]	= "forms/frmescola.php";
			$pag[28]	= "forms/frmprofissao.php";
			$pag[32]	= "forms/frmtpimpressao.php";
			$pag[35]	= "forms/frmescolaridade.php";
			$pag[38]	= "forms/frmestcivil.php";
			$pag[41]	= "forms/frmgraupar.php";
			$pag[44]	= "forms/frmsituacao.php";
			$pag[47]	= "forms/frmprogramas.php";
			$pag[50]	= "forms/frmequipamento.php";
			$pag[53]	= "forms/frmfornecedor.php";
			$pag[59]	= "forms/frmmanutencao.php";
			
			$pag[4] 	= "editar/editarusuario.php";
			$pag[19] 	= "editar/editartipoatend.php";
			$pag[13]	= "editar/editarpessoa.php";
			$pag[18] 	= "editar/editarperfil.php";
			$pag[24]	= "editar/editarescola.php";
			$pag[29]	= "editar/editarprofissao.php";
			$pag[33]	= "editar/editartpimpressao.php";
			$pag[36]	= "editar/editarescolaridade.php";
			$pag[39]	= "editar/editarestcivil.php";
			$pag[42]	= "editar/editargraupar.php";
			$pag[45]	= "editar/editarsituacao.php";
			$pag[48]	= "editar/editarprogramas.php";
			$pag[51]	= "editar/editarequipamento.php";
			$pag[54]	= "editar/editarfornecedor.php";
			$pag[12]	= "editar/editaratendimento.php";
			$pag[57]	= "editar/editarmanutencao.php";
			
			$pag[7] 	= "visualizar/visual_usuario.php";
			$pag[14] 	= "visualizar/visual_atendimento.php";
			$pag[20] 	= "visualizar/visual_equipamento.php";
			$pag[60]	= "visualizar/visual_pessoa.php";
			$pag[66]	= "visualizar/visual_manutencao.php";
						
			$pag[15] 	= "pesquisa/pesquisa_usuario.php";
			$pag[21] 	= "pesquisa/pesquisa_tipoatend.php";
			$pag[26]	= "pesquisa/pesquisa_escola.php";
			$pag[30]	= "pesquisa/pesquisa_profissao.php";
			$pag[56]	= "pesquisa/pesquisa_pessoa.php";
			$pag[65]	= "pesquisa/pesquisa_equipamento.php";
			

			$pag[61] ="rel_pessoas.php";
			$pag[62] ="rel_atendimentos.php";
			$pag[63] ="rel_impressoes.php";
			$pag[64] ="rel_programas.php";
			$pag[55] ="termo_utilizacao.php";

			

			
            if (!empty ($link)) //Se a variavel link n&atilde;o estiver vazia
            {
                if (file_exists($pag[$link])) //se o arquivo existir 
                {
                    include $pag[$link]; // inclua o arquivo
                }
                else
                { 
                    include_once "principal.php";
                }
            }
            else
            {
                include_once "principal.php";
            }
        ?>
       
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-6">
                        <!--<img src="imgs/bg_index.png" class="img-responsive" alt="Imagem Responsiva">-->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>