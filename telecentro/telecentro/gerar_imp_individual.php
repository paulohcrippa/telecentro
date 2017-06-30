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

  $pessoa = $_POST['pessoa'];

        

        $sqlatendimento = mysql_query("SELECT * from tb_atendimento a inner join tb_pessoa p  on a.CDPESSOA = p.CDPESSOA 
          where a.CDPESSOA = '$pessoa'");

        $linhas_atendimento = mysql_num_rows($sqlatendimento);

?>

<?php

$html = "
            <head>
                <style type=\"text/css\">

                  #cabecalho{
                    
                     width: 1000px;
                     height: 50px;
                    
                      text-align: center;
                      font-size: 16px;
                      border: 0px solid #000;
                    
                  }
                  #texto{
                    height: 30px;
                    width: 650px;
                    font-family:arial; 
                    text-align:justify;
                   }
                   #rodape{
                   height: 30px;
                   width: 1000px;
                  margin-bottom: 5%;
                   text-align:center;
                   position:absolute;

                    }

                </style>

            </head>";

  $topo.=" 
        <header> 
          <div id=\"cabecalho\">
            <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
              <u> Controle de Impressão  </u> 
          </div> <br> 
        </header> 
        ";

    $html.="
          <div style=\"clear:left; height:30px\">
  
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
      <div>
              <br>
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
                  </tr>";

          for($i=0; $i<$linhas_atendimento; $i++){

            $linha_atendimento = mysql_fetch_assoc($sqlatendimento);

            $codigo= $linha_atendimento['CDATENDIMENTO'];

           $sqlimpressao=mysql_query("SELECT * FROM tb_atendimento a INNER JOIN tb_impressao i  on a.CDATENDIMENTO= i.CDATENDIMENTO and a.CDATENDIMENTO = '$codigo'");

            $linha_impressao = mysql_fetch_array($sqlimpressao);

           $consulta_usuario = mysql_query("SELECT * FROM tb_usuario JOIN tb_atendimento ON tb_usuario.CDUSUARIO = tb_atendimento.CDUSUARIO WHERE tb_atendimento.CDATENDIMENTO = '$codigo'");
                     
            $linha_usuario = mysql_fetch_array($consulta_usuario);

             $somaimpressao = mysql_query ("SELECT sum(i.QTDIMPRESSAO) AS qtdeimp FROM tb_impressao i INNER JOIN tb_atendimento a on i.CDATENDIMENTO = a.CDATENDIMENTO WHERE i.CDATENDIMENTO = '$codigo'");
       
             $resultadosoma = mysql_result($somaimpressao, 0);

            //$consulta_tipoimp = mysql_query("SELECT * FROM tb_tpimpressao where CDTPIMPRESSAO")



             $html.="
                              <tr height=\"25\">
                                <td width=\"8%\"  align=\"center\"><strong>$i</strong></td>
                                <td width=\"27%\" align=\"center\"><strong>excel </strong></td>
                                <td width=\"10%\" align=\"center\"><strong> $linha_impressao[QTDIMPRESSAO]</strong></td> 
                                <td width=\"15%\" align=\"center\"><strong>$linha_impressao[DTATENDIMENTO]</strong></td>

                                <td width=\"17%\"  align=\"center\"><strong>$linha_usuario[NMUSUARIO]</strong></td>
                                <td width=\"15%\"  align=\"center\"><strong>$linha_atendimento[NMPESSOA]</strong></td>
                                <td  align=\"center\"> <strong> impressão</strong></td>
                              </tr>
                            
                            


                            ";



          }

          $html.=" 

                <tr height=\"25\" bgcolor=\"#cccccc\">
                  <th colspan=\"2\" align=\"center\">
                      <strong> Total:</strong>
                  </th>
                  <td colspan=\"1\" align=\"center\"> <strong> $resultadosoma </strong> </td>
                  <td colspan=\"4\">  </td>
                <tr>
              </table>

          ";
          $rodape.="
    <footer><div id=\"rodape\" >
                  Rua da Bahia, 905, Cachoeira do Vale - Timóteo - MG - CEP: 35.184-034 - Telefax (31) 3847-2200
                  fundacao1@pedreiraum.com.br, telecentro.fundacao@gmail.com
              </div></footer>
      ";
?>

<?php
  $arquivo = "Impressao por pessoa.pdf";
  
  $mpdf->SetHTMLHeader($topo,'O',true);
  $mpdf->SetHTMLFooter($rodape);
  $mpdf -> WriteHTML($html);

  $mpdf-> Output($arquivo, 'I'); 

  // I- abre no navegador
  // F- Salva no servidor
  // D- Salva direto no computador


?> 