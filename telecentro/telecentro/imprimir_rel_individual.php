
<?php
  session_start();
  include_once("mpdf/mpdf.php");
  include_once("login/conexao.php");

  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d/m/Y H:i');

    $pessoa = $_POST['pessoas'];
  

       $sqlpessoa= mysql_query("SELECT * ,date_format(DTINCREG, '%d/%m/%Y') as DTINCREG from tb_pessoa where CDPESSOA = '$pessoa'");
      
      $consulta_programas = mysql_query("SELECT * FROM tb_programapessoa JOIN tb_programa ON tb_programapessoa.CDPROGRAMA = tb_programa.CDPROGRAMA WHERE tb_programapessoa.CDPESSOA = '$pessoa'");

             
       $resultado = mysql_fetch_assoc($sqlpessoa);



?>



<?php

       // Calcula a idade do pai
         
            // Declara a data! :P
        $datapai = $resultado["DTNASCPAI"];

        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $datapai);
       
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
       
        // Depois apenas fazemos o cálculo já citado :)
        $idadepai = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        
        print $idadepai;


          // Calcula a idade da Mae

           // Declara a data! :P
        $datamae = $resultado["DTNASCMAE"];

        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $datamae);
       
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
       
        // Depois apenas fazemos o cálculo já citado :)
        
        $idademae = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        
        print $idademae;


          // calcula idade do conjuge

         // Declara a data! :P
        $dataconjuge = $resultado["DTNASCCONJUGE"];

        // Separa em dia, mês e ano
        list($dia, $mes, $ano) = explode('/', $dataconjuge);
       
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
       
        // Depois apenas fazemos o cálculo já citado :)
        
        $idadeconjuge = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
        
        print $idadeconjuge;
      
      $consulta_informacoes= mysql_query("SELECT * from tb_pessoa p 
                                          inner join tb_estcivil es on es.CDESTCIVIL = p.CDESTCIVIL
                                          inner join tb_cidades c on c.id  = p.CDNATURALIDADE 
                                          inner join tb_escola e on e.CDESCOLA = p.CDESCOLA
                                          inner join tb_profissao pr on pr.CDPROF = p.CDPROFPAI
                                          where CDPESSOA = '$pessoa'");

      $informacao = mysql_fetch_assoc($consulta_informacoes);

      $profisaomae = mysql_query("SELECT * from tb_pessoa p inner join tb_profissao prm on p.CDPROFMAE = prm.CDPROF where CDPESSOA = '$pessoa'");
      
      $profmae = mysql_fetch_assoc($profisaomae);

      $profisaoconjuge = mysql_query("SELECT * from tb_pessoa p inner join tb_profissao prc on p.CDPROFCONJUGE = prc.CDPROF where CDPESSOA = '$pessoa'");

      $profconjuge = mysql_fetch_assoc($profisaoconjuge);


 $html = "
            <head>
                <style type=\"text/css\">

                  #cabecalho{
                    
                     width: 700px;
                     height: 30px;
                    
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
                   width: 700px;
                   text-align:center;

                    }

                </style>

            </head>";
    
              
              $topo.="<div id=\"cabecalho\">
                    <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
                    <u> CADASTRO DE USUÁRIO DO TELECENTRO </u>
              </div> ";

              $html.="<br> <br> <br> <br> <br> <br>

              <b> <span style=\"font-size: 15px\">I - Identificação Pessoal </span></b>
              <br>      
              <table width=\"100%\" cellpadding=\"0\" cellspacing=\"5\" border=\"0\" style=\"font-family:arial\">
                <tr height=\"25\">
                  <td width=\"66%\" >
                    <strong>Nome:</strong> $resultado[NMPESSOA] 
                  </td>

                  <td>
                    <strong>Número de Cadastro:</strong> $resultado[CDPESSOA] 
                  </td>
                </tr>    
              
              </table>

              <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                <tr height=\"25\">
                  <td width=\"37%\">
                    <strong>Data de Nascimento:</strong> $resultado[DTNASC]
                  </td>

                  <td width=\"10%\">
                    <strong>Idade:</strong>$resultado[IDADE]  
                  </td>

                  <td width=\"11%\">
                    <strong>Sexo:</strong> $resultado[SEXO]
                  </td>

                  <td width=\"32%\">
                    <strong>Estado Civil:</strong> $informacao[NMESTCIVIL] 
                  </td>
                </tr>
              </table>

              <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                <tr height=\"25\">
                    <td width=\"66%\" colspan=\"1\">
                    <strong>Naturalidade:</strong> $informacao[nome] 
                  </td>";

                if($resultado['FONERES']==""){
                  
                  $html.="<td> <strong>Telefone:</strong> $resultado[FONECEL] </td>";
                }else{
                  $html.="<td> <strong>Telefone:</strong> $resultado[FONERES] </td>";
                }

             $html.="
                </tr>
              </table>

              <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                <tr height=\"30\">
                  <td width=\"30%\">
                    <strong>Cidade:</strong> $resultado[CIDADE]
                  </td>

                  <td width=\"17%\">
                    <strong>Rua:</strong> $resultado[RUA]
                  </td>

                  <td width=\"10%\">
                    <strong>Nº:</strong> $resultado[NUMRES]
                  </td>
                  <td width=\"30%\">
                    <strong>Bairro:</strong> $resultado[BAIRRO]
                  </td>
                </tr>
              </table>

              <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                <tr height=\"30\">
                  <td width=\"40%\" colspan=\"1\">
                    <strong>Escola:</strong> $informacao[NMESCOLA]
                  </td>

                  <td>
                    <strong>Série:</strong> $resultado[SERIE]
                  </td>

                  <td>
                    <strong>Turno:</strong> $resultado[TURNO]
                  </td>
                  <td>
                    <strong>Situação:</strong> $resultado[SITUACAO] 
                  </td>
                </tr>
              </table>
               
               <br> 
               <b> <span style=\"font-size: 15px\">II - Documentação </span></b>

               <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                <tr height=\"30\">
                  <td  colspan=\"1\">
                    <strong> C.I: </strong>  $resultado[RG]
                  </td>

                  <td>
                    <strong>Org Exp:</strong> $resultado[ORGEXP]
                  </td>

                  <td >
                    <strong>CPF:</strong> $resultado[CPF]
                  </td>
                </tr>
                <tr height=\"30\">
                  <td  width=\"30%\" colspan=\"1\">
                    <strong> Nº Titulo: </strong> $resultado[NUTITULO] 
                  </td>

                  <td width=\"36%\">
                    <strong>Cateira de Trabalho:</strong> $resultado[NUCT]
                  </td>
                </tr>
              </table>

              <br>

              <b> <span style=\"font-size: 15px\">III - Área Familiar </span></b>
             
               
                <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                      
                  <tr height=\"30\">
                    <td  width=\"47%\" colspan=\"1\">
                      <strong> Pai: </strong> $resultado[NMPAI] 
                    </td>

                    <td width=\"36%\">
                      <strong>Profissão:</strong> $informacao[NMPROF]
                    </td>

                    <td width=\"24%\">
                      <strong>Idade:</strong>";

                      	if($informacao['DTNASCPAI']!=""){
                      		$html.=" $idadepai";
                      	}
                   $html.="    
                    </td>
                  </tr>

                  <tr height=\"30\">
                    <td  width=\"47%\" colspan=\"1\">
                      <strong> Mãe: </strong> $resultado[NMMAE]
                    </td>

                    <td width=\"36%\">
                      <strong>Profissão:</strong> $profmae[NMPROF]
                    </td>

                    <td width=\"24%\">
                      <strong>Idade:</strong>";
                      	if($informacao['DTNASCMAE']!=""){
                      		$html.=" $idademae";
                      	}
                       
                   
                  $html.="  </td>
                  </tr>
                </table>

               <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                      
                  <tr height=\"30\">
                    <td  width=\"47%\" colspan=\"1\">
                      <strong> Nome do(a) Esposo(a): </strong> $resultado[NMCONJUGE] 
                    </td>
                  </tr>
                </table>
              
              <table width=\"100%\" cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                      
                <tr height=\"30\">
                  <td  width=\"25%\" colspan=\"1\">
                    <strong> Idade: </strong> ";

                    	if($informacao['DTNASCCONJUGE']!=""){
                      		$html.=" $idadeconjuge";
                      	}

                    
                 $html.=" </td>
                  <td  width=\"30%\" colspan=\"1\">
                    <strong> Profissão: </strong>  $profconjuge[NMPROF]
                  </td>
                </tr>
              </table>

              <br>";

                $html.="
                  <table width=\"100%\" cellpadding=\"2\" cellspacing=\"0\" border=\"0\" style=\"font-family:arial\">
                          <tr height=\"30\">
                          <td  width=\"25%\" colspan=\"1\">
                            <strong>Programas Sociais: </strong>
                ";
                while($programas = mysql_fetch_assoc($consulta_programas)){
                      $html.=" 
                           $programas[NMPROGRAMA],              
                    ";
                }

                $html.="
                        </td> 
                     </tr>
                        </table>
                        <br>

                       <label><b> Data do Cadastro: </b></label> $resultado[DTINCREG]<br>
              <br><br>
                ";



              $rodape.="<div id=\"rodape\" >
                  Rua da Bahia, 905, Cachoeira do Vale - Timóteo - MG - CEP: 35.184-034 - Telefax (31) 3847-2200
                  fundacao1@pedreiraum.com.br, telecentro.fundacao@gmail.com
              </div>";

?> 




<?php
  $arquivo = "Formulario de cadastro de pessoa.pdf";
  $mpdf = new mPDF();
  $mpdf->SetHTMLHeader($topo,'O',true);
  $mpdf -> WriteHTML($html);
  $mpdf->SetHTMLFooter($rodape);

  $mpdf-> Output($arquivo, 'I'); 

  // I- abre no navegador
  // F- Salva no servidor
  // D- Salva direto no computador 
?>  

