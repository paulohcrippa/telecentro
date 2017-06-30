
<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">


<body>

    <div id="wrapper">
		
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lista tipos atendimentos <br/><small> Lista de tipos de atendimentos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                Página inicial
                            </li>
							<li class="active">
                                 Lista Tipos Atendimentos
                            </li>
                        </ol>
                    </div>
                </div>
				<div class="col-sm-7 col-md-7 col-xs-7">            
                	<a class="btn btn-success" href="principal.php?link=17"><span class="glyphicon glyphicon-plus"></span> Novo</a>
          		</div>

				<div class="col-md-3  col-md-offset-2 ">
					<form class="navbar-form navbar-left"  role="search">
					
						 <div class="input-group">
						  <span class="input-group-addon glyphicon glyphicon-search" id="basic-addon1"></span>
						  <input type="text" class="input-medium search-query form-control" name="pesquisartipoatend" id="pesquisartipoatend"  placeholder="Pesquisar" aria-describedby="basic-addon1">
						</div>
					</form>
				</div>

          		</br></br>
                <!-- /.row -->  
                <div id="resultadotipoatend"> 
					<div class="row">
						<div class="col-xs-12 col-md-12"">
							<table class = " table table-striped  ">
									<thead>
									<tr class="info">
										<th width="200" aling="center">Nº</th>
										<th width="700" aling="center"><span class="style9"><b>Tipo de Atendimento</b></span></th>   
										<th width="" aling="center"><span class="style9"><b>Ações</b></span></th>
									</tr>
								</thead>
								<tbody>		


									<?php
									

									
									$sql_visualizar = mysql_query("SELECT * FROM tb_tpatendimento 	ORDER BY CDTPATENDIMENTO");
									
											while($linhas = mysql_fetch_array($sql_visualizar)){
												
													
													echo"<tr>";	
													echo "<td>".$linhas['CDTPATENDIMENTO']."</td>";
													echo "<td>".$linhas['DSTPATENDIMENTO']."</td>";
													
												
											?>
											<td> 
											
													 
													 <a class='btn btn-xs btn-warning' href='principal.php?link=19&id=<?php 
													 
													echo $linhas['CDTPATENDIMENTO'];?>'>
														<type = 'button'  class='glyphicon glyphicon-pencil'/>
													 </a>
													 
													
													<a class='btn btn-xs btn-danger'  onclick="excluir(<?php echo $linhas['CDTPATENDIMENTO']; ?> )" > <type='' class='glyphicon glyphicon-trash'/> </a>
												
														
													 
											 </td>
											<?php
												echo "</tr>";
											}
											?>

								</tbody>
							</table>
						</div>
						
					</div><!-- /.container-fluid -->
			</div>
        </div><!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	
	
 
 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/pesquisa.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	
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
		 	
			  
			  var apagar = confirm('Deseja excluir o tipo de atendimento');
		   
		    if (apagar){
		        location.href = 'processa/proc_exc_tipoatend.php?id='+ id;
		        }else{
		        
		        }    
		} 
	</script>


</body>

</html>
