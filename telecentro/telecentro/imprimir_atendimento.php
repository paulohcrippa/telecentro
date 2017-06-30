
<?php
  session_start();
  include_once("mpdf/mpdf.php");
  include_once("login/conexao.php");

  $mpdf = new mPDF('utf-8', 'A4-L');

  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d/m/Y H:i');


  

     $datainicio= $_POST['datainicio'];
     $datafinal = $_POST['datafinal'];
     $pessoa = $_POST['pessoa'];

     $datai = strtotime($datainicio); 
     $new_datai = date('d/m/Y', $datai);

     $dataf = strtotime($datafinal); 
     $new_dataf = date('d/m/Y', $dataf);
         
              
              $sqlatendimento= mysql_query("SELECT * from tb_atendimento where DTATENDIMENTO >= '$new_datai'and DTATENDIMENTO <='$new_dataf' order by DTATENDIMENTO");

             
             //$sqlatendimento= mysql_query("SELECT *,date_format(DTINCREG, '%d/%m/%Y') as DTINCREG from tb_atendimento where DTINCREG >= '$datainicio 00:00:00'and DTINCREG <='$datafinal 00:00:00'");

              
    
 if($pessoa=="" && $datainicio =="" && $datafinal=="" ){
             
          $sqlatendimento= mysql_query("SELECT * FROM tb_atendimento ");

          $topo.=" <header> <div id=\"cabecalho\">
                    <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
                    <u> Atendimentos Realizados Geral </u> 
                </div> <br> </header> ";
        
          }else{
               $topo.=" <header> <div id=\"cabecalho\">
                    <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
                    <u> Atendimentos Realizados <b>De:</b>  $new_datai <b>Até:</b> $new_dataf</u> 
                </div> <br> </header> ";
          }

 
 $linhas_atendimento = mysql_num_rows($sqlatendimento);
   

    
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
           margin-top: 29%;
           
           text-align:center;

          }
        </style>
      </head>
              
              <br><br><br><br><br>    
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
                         <strong>Nome Pessoa</strong>
                      </td>  
                      <td width=\"7%\"  align=\"center\" >
                        <strong>Nº de Atendimentos</strong>
                      </td>  

                      <td width=\"15%\"  align=\"center\" >
                        <strong>Qtde de Impressão</strong>
                      </td>  

                      <td width=\"17%\"   align=\"center\">
                        <strong>Tempo de Utilização</strong>
                      </td> 

                     <td  align=\"center\">
                       <strong>Data do Atendimento</strong>
                      </td>
                  </tr>

 ";

?>

<?php 
  
   for($i=0; $i<$linhas_atendimento; $i++){

       $linha_atendimento = mysql_fetch_array($sqlatendimento);

       $sqlpessoa = mysql_query("SELECT * FROM tb_pessoa p inner join tb_atendimento a on p.CDPESSOA = a.CDPESSOA
         where a.CDATENDIMENTO = $linha_atendimento[CDATENDIMENTO] GROUP BY p.NMPESSOA");
       
       $linha_pessoa = mysql_fetch_array($sqlpessoa);

        $nomepessoa=$linha_pessoa[NMPESSOA];
         
         $sqlcount= mysql_query("SELECT COUNT(CDATENDIMENTO) AS QUANTIDADE FROM tb_atendimento a INNER JOIN tb_pessoa p ON a.CDPESSOA = p.CDPESSOA  WHERE p.NMPESSOA = '$nomepessoa' ");

          $resultado = mysql_result($sqlcount, 0);

           $countimpressao= mysql_query("SELECT SUM(QTDIMPRESSAO) AS QDEIMPRESSAO FROM tb_impressao i INNER JOIN tb_atendimento a ON i.CDATENDIMENTO = a.CDATENDIMENTO  WHERE i.CDATENDIMENTO = $linha_atendimento[CDATENDIMENTO]");

            $resultadoimpressao = mysql_result($countimpressao, 0);


        $html.="<tr height=\"25\">
                <td width=\"8%\"  align=\"center\"><strong>$linha_atendimento[CDATENDIMENTO]</strong></td>
                <td width=\"27%\"   align=\"center\"><strong>$linha_pessoa[NMPESSOA]</strong></td>
                <td width=\"7%\"   align=\"center\"><strong> $resultado</strong></td> 
                <td width=\"15%\"  align=\"center\"><strong>$resultadoimpressao</strong></td>";
                  
                  $Hinicial=$linha_atendimento['HRINICIO'];
                          $Hfinal=$linha_atendimento['HRFINAL'];

                          if($Hinicial<>"" && $Hfinal<>""){


                            $unix_inicial = strtotime($Hinicial);
                            $unix_final = strtotime($Hfinal);

                            $nHoras   = ($unix_final - $unix_inicial) / 3600;
                            $nMinutos = (($unix_final - $unix_inicial) % 3600) / 60;
                            //$segundos = floor (($unix_final - $unix_inicial)  % 60);

                            $tempo = sprintf('%02d:%02d', $nHoras , $nMinutos);
                            
                          }

                          //$soma = $tempo + $tempo;


                $html.="

                <td width=\"17%\"  align=\"center\"><strong>$tempo</strong></td>
                <td width=\"15%\"  align=\"center\"><strong>$linha_atendimento[DTATENDIMENTO]</strong></td>
           </tr>";
    }
      

    
  $html.="</table>";
  $rodape.="
    <footer><div id=\"rodape\" >
                  Rua da Bahia, 905, Cachoeira do Vale - Timóteo - MG - CEP: 35.184-034 - Telefax (31) 3847-2200
                  fundacao1@pedreiraum.com.br, telecentro.fundacao@gmail.com
              </div></footer>
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