
<?php
 	session_start();
	include_once("mpdf/mpdf.php");
	include_once("login/conexao.php");

 $mpdf = new mPDF(
             'utf-8',    // mode - default ''
             'A4-L',    // format - A4, for example, default ''
             0,     // font size - default 0
             '',    // default font family
             15,    // margin_left
             15,    // margin right
             45,     // margin top    -- aumentei aqui para que não ficasse em cima do header
             0,    // margin bottom
             6,     // margin header
             0,     // margin footer
             '');  // L - landscape, P - portrait

  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d/m/Y H:i');


  

     $datainicio= $_POST['datainicio'];
	   $datafinal = $_POST['datafinal'];
     $usuario = $_POST['usuario'];

     $datai = strtotime($datainicio); 
     $new_datai = date('d/m/Y', $datai);

     $dataf = strtotime($datafinal); 
     $new_dataf = date('d/m/Y', $dataf);
         
              
              
      $sqlimpressao = mysql_query ("SELECT * FROM tb_impressao i INNER join tb_atendimento a on i.CDATENDIMENTO = a.CDATENDIMENTO WHERE a.DTATENDIMENTO >= '$new_datai' and a.DTATENDIMENTO <= '$new_dataf'");

               
              
    
 if($usuario=="" && $datainicio =="" && $datafinal=="" ){
             
              $sqlimpressao= mysql_query("SELECT * FROM tb_impressao ");

          $topo.=" <header> <div id=\"cabecalho\">
                    <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
                    <u> Controle de Impressão Geral </u> 
                </div> <br> </header> ";
        
          }else{
               $topo.=" <header> <div id=\"cabecalho\">
                    <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
                    <u> Controle de Impressão <b>De:</b>  $new_datai <b>Até:</b> $new_dataf</u> 
                </div> <br> </header> ";
          }

          $linhas_impressao=mysql_num_rows($sqlimpressao);
    
 $html = "              
      <head>
        <style type=\"text/css\">

          #cabecalho
          {
          
           width: 1000px;
           height: 30px;
          
            text-align: center;
            font-size: 16px;
            border: 0px solid #000;
          }

           #rodape
          {
           height: 30px;
           width: 1040px;
           margin-bottom: 5%;
           position:absolute;
           
           text-align:center;

          }
        </style>
      </head>
              
             
                <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                  <tr height=\"25\">
                    <td colspan=\"2\" width=\"90%\">
                      <strong>Funcionário:</strong> $_SESSION[usuarioNome]
                    </td>
                    <td colspan=\"2\" align=\"right\"  width=\"90%\">
                      <strong>Data:</strong> $date
                    </td>
                  </tr>
                </table>
                
                <br><br>

                <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\">
                  
                  <tr height=\"25\"  bgcolor=\"#cccccc\" >
                      <td width=\"8%\" align=\"center\" >
                        <strong>Nº</strong>
                      </td>  
                      <td width=\"27%\"  align=\"center\" >
                         <strong>Descrição da Impressão</strong>
                      </td>  
                      <td width=\"10%\"  align=\"center\" >
                        <strong>Quantidade</strong>
                      </td>  

                      <td width=\"15%\"  align=\"center\" >
                        <strong> Data </strong>
                      </td>  

                      <td width=\"17%\"   align=\"center\">
                        <strong> Responsável </strong>
                      </td> 

                     <td  align=\"center\">
                       <strong> Usuário </strong>
                      </td>
                      <td  align=\"center\">
                       <strong> Tipo </strong>
                      </td>
                  </tr>

 ";

?>

<?php 
  
  for($i=0; $i<$linhas_impressao; $i++){

    $linha_impressao = mysql_fetch_array($sqlimpressao);

      //Pega codigo tipo de impressao;
      $codigotipoimp= $linha_impressao['CDTPIMP'];  

      //Pega codigo atendimento
      $codigoatend = $linha_impressao['CDATENDIMENTO'];

        //Comando Select para buscar a data do atendimento

      $sqlatendimento = mysql_query("SELECT * FROM tb_atendimento where CDATENDIMENTO = '$codigoatend' ");

      $linha_atendimento = mysql_fetch_array($sqlatendimento);

      //Pega o codigo do usuário

      $codigousuario = $linha_atendimento['CDUSUARIO'];

      //Comando Select para buscar as atividades feitas 

      $consulta_atividades = mysql_query("SELECT * FROM tb_atendimentotipo JOIN tb_tpatendimento ON tb_tpatendimento.CDTPATENDIMENTO = tb_atendimentotipo.CDTPATENDIMENTO WHERE tb_atendimentotipo.CDATENDIMENTO = '$codigoatend'");

      $linha_atividade = mysql_fetch_array($consulta_atividades);

      // Comando select para buscar os usuarios

        $consulta_instrutor = mysql_query("SELECT * FROM tb_usuario where CDUSUARIO = '$codigousuario'");

        $linha_instrutor = mysql_fetch_array($consulta_instrutor);


        $codigopessoa = $linha_atendimento['CDPESSOA'];

        $consulta_pessoa = mysql_query("SELECT * FROM tb_pessoa where CDPESSOA = '$codigopessoa'");

        $linha_pessoa = mysql_fetch_array($consulta_pessoa);

        $consulta_tipoimp = mysql_query("SELECT * FROM tb_tpimpressao where CDTPIMP = '$codigotipoimp'");

        $linha_tipoimp = mysql_fetch_array($consulta_tipoimp);



              if($linha_atendimento['IMPRESSAO'] == 'S'){

                      $html.="
                              <tr height=\"25\">
                                <td width=\"8%\"  align=\"center\"><strong>$i</strong></td>
                                <td width=\"27%\" align=\"center\"><strong>$linha_atividade[DSTPATENDIMENTO]</strong></td>
                                <td width=\"10%\" align=\"center\"><strong>$linha_impressao[QTDIMPRESSAO]</strong></td> 
                                <td width=\"15%\" align=\"center\"><strong>$linha_atendimento[DTATENDIMENTO]</strong></td>

                                <td width=\"17%\"  align=\"center\"><strong>$linha_instrutor[NMUSUARIO]</strong></td>
                                <td width=\"15%\"  align=\"center\"><strong>$linha_pessoa[NMPESSOA]</strong></td>
                                <td  align=\"center\"> <strong> $linha_tipoimp[DSTPIMP] </strong></td>
                              </tr>
                            ";
             }
        
    }
      //corrigir depois
    
         $somaimpressao = mysql_query ("SELECT sum(i.QTDIMPRESSAO) AS qtdeimp FROM tb_impressao i INNER JOIN tb_atendimento a on i.CDATENDIMENTO = a.CDATENDIMENTO WHERE a.DTATENDIMENTO >= '$new_datai' and a.DTATENDIMENTO <= '$new_dataf'");
       
		$resultadosoma = mysql_result($somaimpressao, 0);

    
  $html.="

        <tr height=\"25\" bgcolor=\"#cccccc\">
          <th colspan=\"2\" align=\"center\">
              <strong> Total:</strong>
          </th>
          <td colspan=\"1\" align=\"center\"> <strong> $resultadosoma </strong> </td>
          <td colspan=\"4\">  </td>
        <tr>

  </table>";
  $rodape.="
    <footer><div id=\"rodape\" >
                  Rua da Bahia, 905, Cachoeira do Vale - Timóteo - MG - CEP: 35.184-034 - Telefax (31) 3847-2200
                  fundacao1@pedreiraum.com.br, telecentro.fundacao@gmail.com
              </div></footer>
      ";
?>


<?php
	$arquivo = "relatório impressoes.pdf";
	

	$mpdf->SetHTMLHeader($topo,'O',true);
  $mpdf->SetHTMLFooter($rodape);
  $mpdf -> WriteHTML($html);

  $mpdf-> Output($arquivo, 'I'); 

	// I- abre no navegador
	// F- Salva no servidor
	// D- Salva direto no computador
?> 