
<?php
  session_start();
  include_once("mpdf/mpdf.php");
  include_once("login/conexao.php");

   $mpdf = new mPDF(
             'utf-8',    // mode - default ''
             'A4',    // format - A4, for example, default ''
             0,     // font size - default 0
             '',    // default font family
             15,    // margin_left
             15,    // margin right
             59,     // margin top    -- aumentei aqui para que não ficasse em cima do header
             0,    // margin bottom
             6,     // margin header
             0,     // margin footer
             '');  // L - landscape, P - portrait

  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d/m/Y H:i');


  $pessoa = $_POST['pessoa'];

      
      $sqlpessoa = mysql_query("SELECT * from tb_pessoa where CDPESSOA ='$pessoa'");

      $linhas_pessoa = mysql_fetch_assoc($sqlpessoa);

      $sqlatendimento= mysql_query("SELECT * from tb_atendimento where CDPESSOA = '$pessoa' ");

      $linhas_atendimento = mysql_num_rows($sqlatendimento);

      if (!$sqlatendimento) {
      die('Erro: ' . mysql_error());
  }


        

  $topo.="  

          <table width=\"100%\" cellpadding=\"4\" cellspacing=\"4\" border=\"1\" style=\"font-family:arial\" >
              <tr>
                  <td>
                      <strong><center><img src=\"imagens/logo formulario.jpg\"></center></strong>
                  </td>
              </tr>
              <tr>
                   <td align=\"center\">
                      <strong> CONTROLE DE ATENDIMENTO </strong> 
                   </td>
              </tr>
            
          </table>
          <table width=\"100%\" cellpadding=\"4\" cellspacing=\"4\" border=\"1\" style=\"font-family:arial\">
              <tr height=\"25\">
                 <td width=\"40%\">
                    <strong> Nº de Cadastro: </strong> $linhas_pessoa[CDPESSOA]
                 </td>
                 <td width=\"40%\">
                    <strong> Nome Pessoa: </strong> $linhas_pessoa[NMPESSOA]
                 </td>
              </tr>
          </table>
          <table width=\"100%\" cellpadding=\"10\" cellspacing=\"0\" border=\"1\">
                  
                  <tr height=\"25\"  bgcolor=\"#cccccc\" >
                      <td width=\"8%\" >
                        <strong>Nº</strong>
                      </td>  
                      <td width=\"15%\" align=\"center\">
                         <strong>Data da Utilização</strong>
                      </td>  
                      <td width=\"27%\" align=\"center\">
                        <strong>Atividades</strong>
                      </td>  

                      <td width=\"15%\" align=\"center\">
                        <strong>Quantidade Impressão</strong>
                      </td>  

                      <td width=\"15%\" align=\"center\">
                        <strong>Tempo de Utilização</strong>
                      </td> 

                     <td width=\"27%\" align=\"center\" >
                       <strong>Assinatura</strong>
                      </td>
                      <td width=\"27%\" align=\"center\" >
                       <strong>Técnico Responsavél</strong>
                      </td>
                  </tr>
                </table>
          ";  

          $html.="

              <head>
                <style type=\"text/css\">

                  #rodape{
                      height: 30px;
                     width: 700px;
                     margin-bottom: 5%;
                     position:absolute;
                     
                     text-align:center;

                  }


                </style>
              </head>

            <table width=\"100%\" cellpadding=\"4\" cellspacing=\"0\" style=\"font-family:arial\" border=\"1\">";
?>

<?php 
  
    for($i=0; $i<$linhas_atendimento; $i++){


          $linha_atendimento = mysql_fetch_array($sqlatendimento);

            $codigo= $linha_atendimento['CDATENDIMENTO'];


              $consulta_atividades=mysql_query("SELECT t.DSTPATENDIMENTO FROM tb_atendimento a INNER JOIN tb_atendimentotipo at on a.CDATENDIMENTO= at.CDATENDIMENTO and a.CDATENDIMENTO = '$codigo' inner join tb_tpatendimento t on t.CDTPATENDIMENTO = at.CDTPATENDIMENTO");

               $linhas_atividade = mysql_num_rows($consulta_atividades);

          //$consulta_atividades = mysql_query("SELECT * FROM tb_atendimentotipo JOIN tb_tpatendimento ON tb_tpatendimento.CDTPATENDIMENTO = tb_atendimentotipo.CDTPATENDIMENTO WHERE tb_atendimentotipo.CDATENDIMENTO = '$codigo'");

          
               for($j=0; $j<$linhas_atividade; $j++){

                   

                  $linha_atividade = mysql_fetch_array($consulta_atividades);

                   $html.="
            
              <tr height=\"25\">
                <td width=\"8%\" align=\"center\"><strong> $linha_atendimento[CDATENDIMENTO] </strong></td>
                <td width=\"15%\"   align=\"center\"><strong> $linha_atendimento[DTATENDIMENTO]</strong></td>

                <td width=\"27%\"   align=\"center\"><strong> $linha_atividade[DSTPATENDIMENTO]</strong></td>";
                 
                
                if($linha_atendimento['IMPRESSAO']=='S'){

                    $countimpressao= mysql_query("SELECT SUM(QTDIMPRESSAO) AS QDEIMPRESSAO FROM tb_impressao i INNER JOIN tb_atendimento a ON i.CDATENDIMENTO = a.CDATENDIMENTO  WHERE i.CDATENDIMENTO = '$codigo'");
                  
                    $resultadoimpressao = mysql_result($countimpressao, 0);
                }else{
                  $resultadoimpressao = '-';
                }


                	$qtdeimp = ($resultadoimpressao/ $linhas_atividade );
               
               $Hinicial =$linha_atendimento['HRINICIO'];
                          $Hfinal=$linha_atendimento['HRFINAL'];

                          if($Hinicial<>"" && $Hfinal<>""){


                            $unix_inicial = strtotime($Hinicial);
                            $unix_final = strtotime($Hfinal);

                            $nHoras   = ($unix_final - $unix_inicial) / 3600;
                            $nMinutos = (($unix_final - $unix_inicial) % 3600) / 60;
                            //$segundos = floor (($unix_final - $unix_inicial)  % 60);

                            $tempo = sprintf('%02d:%02d', $nHoras , $nMinutos);
                            
                          }

                            //consulta o nome do usuario no banco

                      $consulta_usuario = mysql_query("SELECT * FROM tb_usuario JOIN tb_atendimento ON tb_usuario.CDUSUARIO = tb_atendimento.CDUSUARIO WHERE tb_atendimento.CDATENDIMENTO = '$codigo'");
                     
                       $linha_usuario = mysql_fetch_array($consulta_usuario);


                      
                $html.="<td width=\"15%\"  align=\"center\"><strong>$qtdeimp</strong></td>
                <td width=\"15%\"  align=\"center\"><strong>$tempo</strong></td>
                <td width=\"27%\"  align=\"center\"><strong></strong>$linhas_pessoa[NMPESSOA]</td>
                <td width=\"27%\"  align=\"center\"><strong>$linha_usuario[NMUSUARIO]</strong></td>
           </tr>";
               }
      
    }
    
      

    
  $html.="</table>";
  $rodape.="
    <footer>
        <div id=\"rodape\" >
                  Rua da Bahia, 905, Cachoeira do Vale - Timóteo - MG - CEP: 35.184-034 - Telefax (31) 3847-2200
                  fundacao1@pedreiraum.com.br, telecentro.fundacao@gmail.com
              </div>
      </footer>
      ";
?>


<?php
  $arquivo = "impressao_pessoa.pdf";
  

  $mpdf->SetHTMLHeader($topo,'O',true);
  $mpdf->SetHTMLFooter($rodape);
  $mpdf -> WriteHTML($html);

  $mpdf-> Output($arquivo, 'I'); 

  // I- abre no navegador
  // F- Salva no servidor
  // D- Salva direto no computador
?>