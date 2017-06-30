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
		<meta name="description" content="Painel Instrutor">
		<meta name="author" content="Paulo/Tayane">
		
		<title>CTC - Instrutor</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Customização CSS -->
		<link href="css/sb-admin.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="css/plugins/morris.css" rel="stylesheet">
			
		<link href="css/formulario.css" rel="stylesheet">
			
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
			include_once ("menu_inst.php");
            
            @$link = $_GET["link"]; 
            
			
			$pag[56]	= "instrutor.php";
			
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

			$pag[6] 	= "forms/frmpessoa.php";
			$pag[10] 	= "forms/frmperfil.php";
			$pag[11] 	= "forms/frmatendimento.php";
			
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
			

			$pag[13]	= "editar/editarpessoa.php";


			$pag[51]	= "editar/editarequipamento.php";
			$pag[12]	= "editar/editaratendimento.php";
			$pag[57]	= "editar/editarmanutencao.php";
			

			$pag[14] 	= "visualizar/visual_atendimento.php";
			$pag[20] 	= "visualizar/visual_equipamento.php";
			$pag[60]	= "visualizar/visual_pessoa.php";
			$pag[66]	= "visualizar/visual_manutencao.php";
						

			$pag[21] 	= "pesquisa/pesquisa_tipoatend.php";
			$pag[26]	= "pesquisa/pesquisa_escola.php";
			$pag[30]	= "pesquisa/pesquisa_profissao.php";
			
            if (!empty ($link)) //Se a variavel link n&atilde;o estiver vazia
            {
                if (file_exists($pag[$link])) //se o arquivo existir 
                {
                    include $pag[$link]; // inclua o arquivo
                }
                else
                { 
                    include_once "principalinst.php";
                }
            }
            else
            {
                include_once "principalinst.php";
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