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

	</head>
    <body>
        <table class = " table table-striped ">
			<thead>
				<tr class="info">
					<th width= "80" aling="center">Código</th>
					<th width="300" aling="center"><span class="style9"><b>Nome</b></span></th>
					<th width="150" aling="center"><span class="style9"><b>Contato</b></span></th>
					<th width="100" aling="center"><span class="style9"><b>Idade</b></span></th>     
					<th width="" aling="center"><span class="style9"><b>Situação Escolar</b></span></th>
					<th width="" aling="center"><span class="style9"><b>Ações</b></span></th>
				</tr>
			</thead>			
			<tbody>
			    <?php
					$campo=$_POST['pesquisarpessoa'];
					$pesquisa= mysql_query("SELECT  * FROM tb_pessoa  where NMPESSOA like '%$campo%'  or FONERES like '%$campo%' or IDADE like '%$campo%' or SITUACAO like '%$campo%' or FONECEL like '%$campo%' ");

				  	echo "<br>";
					if(mysql_num_rows($pesquisa)<=0){
						echo " <div class=	'alert alert-danger' role='alert'> Nenhuma pessoa encontrada</div>";
					}
					while($linhas = mysql_fetch_assoc($pesquisa)){

							$celpessoa=$linhas['FONECEL'];
							$fonepessoa=$linhas['FONERES'];
						echo"<tr>";	
								echo "<td>".$linhas['CDPESSOA']."</td>";
								echo "<td>".$linhas['NMPESSOA']."</td>";
								if($celpessoa <>""){
									echo "<td>".$linhas['FONECEL']."</td>";
								}else{
									echo "<td>".$linhas['FONERES']."</td>";
								}
								echo "<td>".$linhas['IDADE']."</td>";
								echo "<td>".$linhas['SITUACAO']."</td>";		
				?>
								<td> 
											
													 <a class='btn btn-xs btn-primary' href='principal.php?link=60&id=<?php 
													 
													echo $linhas['CDPESSOA'];?>'>
														 <type='button' class="glyphicon glyphicon-eye-open"/>
													 </a> 
													 
													 <a class='btn btn-xs btn-warning'  href='principal.php?link=13&id=<?php 
													 
													echo $linhas['CDPESSOA'];?>'>
														<type = 'button'  class='glyphicon glyphicon-pencil'/>
													 </a>

											 </td>
					
									<?php
										echo "</tr>";
					}	
									?>
			</tbody>
		</table>
    </body>
</html>