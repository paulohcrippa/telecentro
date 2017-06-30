
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<head>
<script language="Javascript" src="js/jquery-1.11.1.min.js"></script>




</head>


<body>

	<div id="wrapper"> <!--inicio da div wrapper-->

		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"> Usuários do Sistema<br><small> Lista de usuários cadastrados no sistema </small> </h1>
							<ol class="breadcrumb">
								<li class=""> Página Inicial </li>
								<li class="active">Usuários do Sistema</li>
							</ol>
					</div>
				</div>
	
				<div class="col-sm-7 col-md-7 ">
					<a class="btn btn-success" href="principal.php?link=2"><span class="glyphicon glyphicon-plus"></span> Novo</a>

				</div>

				<div class="col-md-3 col-md-offset-2 ">
					<form class="navbar-form navbar-left"  role="search">
					
					 <div class="input-group">
					  <span class="input-group-addon glyphicon glyphicon-search" id="basic-addon1"></span>
					  <input type="text" class="input-medium search-query form-control" id="pesquisar"  name="pesquisar" placeholder="Pesquisar" aria-describedby="basic-addon1">
					</div>
					</form>
				</div>

				</br></br>
				<!-- /.row --> 
				<div id="resultado"> 
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<table class = " table table-striped ">
								<thead>
									<tr class="info">
										<th width="90" aling="center">Código</th>
										<th width="270" aling="center"><span class="style9"><b>Nome</b></span></th>
										<th width="260" aling="center"><span class="style9"><b>Email</b></span></th>     
										<th width="180" aling="center"><span class="style9"><b>Perfil</b></span></th>                                                
										<th width="200" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
								
								<tbody>
								 
										<?php
										

										
										$sql_visualizar = mysql_query("SELECT  *
										FROM tb_usuario u INNER JOIN tb_perfil p ON u.CDPERFIL = p.CDPERFIL
										ORDER BY CDUSUARIO");
										
												while($linhas = mysql_fetch_array($sql_visualizar)){

													$telefone= $linhas['FONERES'];
													$celular = $linhas['FONECEL'];
													
														
														echo"<tr>";	
														echo "<td>".$linhas['CDUSUARIO']."</td>";
														echo "<td>".$linhas['NMUSUARIO']."</td>";
														echo "<td>".$linhas['EMAIL']."</td>";
														echo "<td>".$linhas['NMPERFIL']."</td>";
													
												?>
												<td> 
												
														 <a class='btn btn-xs btn-primary' href='principal.php?link=7&id=<?php 
														 
														echo $linhas['CDUSUARIO'];?>'>
															 <type='button' class="glyphicon glyphicon-eye-open"/>
														 </a> 
														 
														 <a class='btn btn-xs btn-warning'  href='principal.php?link=4&id=<?php 
														 
														echo $linhas['CDUSUARIO'];?>'>
															<type = 'button'  class='glyphicon glyphicon-pencil'/>
														 </a>
														 
														
													
														<a class='btn btn-xs btn-danger'  onclick="excluir(<?php echo $linhas['CDUSUARIO']; ?> )" > <type='' class='glyphicon glyphicon-trash'/> </a> 
													
															
														 
												 </td>
												<?php
													echo "</tr>";
												}
												?>
								
								</tbody>

								

							</table>
						</div> <!-- fim da div col-xs-12 col-md-12 -->
					</div><!-- /.row -->			
				</div>	
			</div><!-- /#page-wrapper -->
		</div>
	</div><!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/pesquisa.js"></script>
	
	<script language ="JavaScript">

		/*function setTextInAlert(classe, message) {
		    $('.alert').attr('class', classe);
		    $('#resposta').text(message);
		}

$(document).ready(function(){

   $('.botao').on('click', function(){

      var id = $(this).attr('id');

       switch(id) {
        case 'msg_01':
          setTextInAlert('alert btn-success text-center', 'Message Success!');
         break;
        case 'msg_02':
          setTextInAlert('alert btn-warning text-center', 'Message Warning!');
         break;
        case 'msg_03':
          setTextInAlert('alert btn-danger text-center', 'Message Danger!');
         break;
       }

   });
}); */

		
		function excluir(id)
		 {
		 	
			  
			  var apagar = confirm('Deseja Excluir o usuário');
		   
		    if (apagar){
		        location.href = 'processa/proc_exc_usuario.php?id='+ id;
		        }else{
		        
		        }    
		} 
	</script>

 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	

</body>

</html>
