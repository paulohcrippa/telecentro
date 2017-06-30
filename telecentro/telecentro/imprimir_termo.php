
<?php
 	session_start();
	include_once("mpdf/mpdf.php");
	include_once("login/conexao.php");

  $mpdf = new mPDF('utf-8');

  date_default_timezone_set('America/Sao_Paulo');
  $date = date('d/m/Y H:i');

  
	   $pessoas = $_POST['pessoas'];

       

              
               

   $topo.=" <header> 
              <div id=\"cabecalho\">
                <center><img src=\"imagens/logo formulario.jpg\"></center><br/>
              </div> 
              <br>
            </header> ";

          

    
 $html = "              
      <head>
        <style type=\"text/css\">

          #cabecalho
          {
          
           width: 700px;
           height: 50px;
          
            text-align: center;
            font-size: 16px;
            background-color: #00CED1;
            border: 0px solid #000;
          }

           #rodape
          {
           height: 30px;
           width: 700px;
           margin-top: 29%;
           
           text-align:center;

          }

          #titulo{
            width: 500px;
            text-align: center;
            font-size: 16px;
            background-color: #000000;
          
          }
        </style>
      </head>

          <div id=\"titulo\">
              
              TERMO DE AUTORIZAÇÂO

              AUTORIZAÇÂO PARA UTILIZAÇÂO DO TELECENTRO NA REALIZAÇÃO DE PESQUISAS
          </div>

              
             

 ";

?>

<?php 
  

    
  $rodape.="
    <footer><div id=\"rodape\" >
                  Rua da Bahia, 905, Cachoeira do Vale - Timóteo - MG - CEP: 35.184-034 - Telefax (31) 3847-2200
                  fundacao1@pedreiraum.com.br, telecentro.fundacao@gmail.com
              </div></footer>
      ";
?>


<?php
	$arquivo = "termo de utilizacao.pdf";
	

	$mpdf->SetHTMLHeader($topo,'O',true);
  $mpdf->SetHTMLFooter($rodape);
  $mpdf -> WriteHTML($html);

  $mpdf-> Output($arquivo, 'I'); 

	// I- abre no navegador
	// F- Salva no servidor
	// D- Salva direto no computador
?>  