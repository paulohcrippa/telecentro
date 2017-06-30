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
					<th width="90" aling="center">Código</th>
					<th width="270" aling="center"><span class="style9"><b>Nome</b></span></th>                                              
					<th width="200" aling="center"><span class="style9"><b>Ações</b></span></th>
				</tr>
			</thead>			
			<tbody>
			    <?php
					$campo=$_POST['pesquisar'];
					$pesquisa= mysql_query("SELECT  * FROM tb_escola");

				  	echo "<br>";
			  		if(mysql_num_rows($pesquisa)<=0){
			  			echo " <div class=	'alert alert-danger' role='alert'> Nenhuma Escola Encontrada</div>";
			  		}
	
					while($linhas = mysql_fetch_assoc($pesquisa)){
					    echo"<tr>";	
						echo "<td>".$linhas['CDESCOLA']."</td>";
						echo "<td>".$linhas['NMESCOLA']."</td>";		
				?>
					
						<td> 	
							<a class='btn btn-xs btn-primary' href='principal.php?link=25&id=<?php echo $linhas['CDESCOLA'];?>'>
								<type='button' class="glyphicon glyphicon-eye-open"/>
							</a> 
					 
							<a class='btn btn-xs btn-warning'  href='principal.php?link=24&id=<?php echo $linhas['CDESCOLA'];?>'> 
								<type = 'button'  class='glyphicon glyphicon-pencil'/>
							</a>
					 
							<a class='btn btn-xs btn-danger'  onclick="excluir(<?php echo $linhas['CDESCOLA']; ?> )" > 
								<type='' class='glyphicon glyphicon-trash'/>
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