
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
	   $pessoas = $_POST['pessoas'];

     

      
       
    $sqlpessoa= mysql_query("SELECT *,date_format(DTINCREG, '%d/%m/%Y') as DTINCREG from tb_pessoa where DTINCREG >= '$datainicio 00:00:00'and DTINCREG <='$datafinal 00:00:00' order by DTINCREG");

              
        
if($pessoas=="" && $datainicio =="" && $datafinal==""){
              
               $sqlpessoa= mysql_query("SELECT * ,date_format(DTINCREG, '%d/%m/%Y')  as DTINCREG FROM tb_pessoa");

                $topo.=" <header> <div id=\"cabecalho\">
                    <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
                    <u> Pessoas Cadastradas no Plantão Digital Geral </u>
                </div> <br> </header> ";

           //$sqlpessoa= mysql_query("SELECT * ,date_format(DTINCREG, '%d/%m/%Y')  as DTINCREG FROM tb_pessoa where CDPESSOA = $pessoas  ");
        }else{
          $topo.=" <header> <div id=\"cabecalho\">
                    <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
                    <u> Pessoas Cadastradas no Plantão Digital <b> De:</b>  $datainicio <b>Até</b> $datafinal </u>
                </div> <br> </header> ";
        }

        $linhas_pessoa = mysql_num_rows($sqlpessoa);


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
           height: 50px;
           width: 1000px;
           text-align:center;
           position:absolute;
          margin-bottom: 5%;

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
                      <td width=\"10%\" >
                        <strong>Nº</strong>
                      </td>  
                      <td width=\"20%\" >
                         <strong>Nome Pessoa</strong>
                      </td>  
                      <td width=\"16%\" >
                        <strong>Contato</strong>
                      </td>  

                      <td width=\"14%\" >
                        <strong>Data de Nascimento</strong>
                      </td>  

                      <td width=\"5%\" >
                        <strong>Idade</strong>
                      </td> 

                      <td width=\"10%\" >
                        <strong>Escolaridade</strong>
                      </td> 

                      <td width=\"10%\" >
                        <strong>Documentos</strong>
                      </td> 

                     <td>
                       <strong>Data do Cadastro</strong>
                      </td>
                  </tr>

 ";

?>

<?php 
  
    for($i=0; $i<$linhas_pessoa; $i++){

       $linha_pessoa = mysql_fetch_array($sqlpessoa);

       $sqlensino = mysql_query("SELECT * from tb_escolaridade inner join tb_pessoa on tb_escolaridade.CDESCOLARIDADE = tb_pessoa.CDESCOLARIDADE where tb_pessoa.CDPESSOA = $linha_pessoa[CDPESSOA]");
       
       $linha_ensino = mysql_fetch_array($sqlensino);

        $html.="<tr height=\"25\"   >
        <td width=\"5%\" ><strong>$linha_pessoa[CDPESSOA]</strong></td>
        <td width=\"25%\" ><strong>$linha_pessoa[NMPESSOA]</strong></td>";
      
            if($linhas_pessoa['FONERES']==""){
               $html.="<td width=\"16%\" ><strong>$linha_pessoa[FONECEL]</strong></td> ";
            }else{
               $html.="<td width=\"16%\" ><strong>$linha_pessoa[FONERES]</strong></td> ";
            } 

        $html.=" <td width=\"10%\"><strong>$linha_pessoa[DTNASC]</strong></td>
                  <td width=\"10%\"><strong>$linha_pessoa[IDADE]</strong></td>
                  <td width=\"15%\"><strong>$linha_ensino[DSESCOLARIDADE]</strong></td>";

                   if($linha_pessoa['CPF']!="" || $linha_pessoa['RG']!="" && $linha_pessoa['NUTITULO'] || $linha_pessoa['NUCT']){
                   	$html.=" <td width=\"16%\"><strong> possui documento</strong></td>";
                   }else{
                   	$html.=" <td width=\"16%\"><strong> Não Possui</strong></td>";
                   } 

                 $html.=" <td width=\"15%\"><strong>$linha_pessoa[DTINCREG]</strong></td>";
    
     $html.=" </tr>";
    }
      

    
  $html.="</table>
        </div>";
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