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
                                Relatório Programas Sociais
                            </h1>
                            <ol class="breadcrumb">
                                <li class="">
                                     Página Inicial
                                </li>
                                <li class="active">
                                   Relatório Programas Sociais
                                </li>
                            </ol>
                        </div>
                    </div>
                    
                   <div class="row">
                        <div class="col-xs-12 col-md-12">

                            <div class="panel panel-primary col-md-4">
                              <div class="panel-heading">
                                <h3 class="panel-title">Relatórios Rápidos</h3>
                              </div>
                              <div class="panel-body">
                                <ul class="site-stats">
                                   <i class=" glyphicon glyphicon-user" style="font-size: 50px;"></i> <a href="imprimir_manutencao.php" target="_blank" > <p> <small>Todos os programas Sociais </small></a>
                                 </ul>
                                
                              </div>
                            </div>

                            <div class="panel panel-primary col-md-6 col-md-offset-1">
                              <div class="panel-heading">
                                <h3 class="panel-title">Relatórios Customizavéis</h3>
                              </div>
                              <div class="panel-body">
                                  <div class="span12 well">
                                    <form target="_blank" action="imprimir_manutencao.php" method="post">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr height="40">
                                                <td colspan="2" >Período:</td> 
                                            </tr>

                                             <tr height="40" >
                                                <td>
                                                    De: <input  type="date"  name="datainicio" id="datainicio"> 
                                                    Até: <input type="date" name="datafinal" id="datafinal" >
                                                </td>
                                            </tr>
                                        </table>

                                    <div class="span4">
                                        <button type="submit" class="btn btn-inverse span12"><i class="glyphicon glyphicon-print"></i> Imprimir</button>
                                    </div>
                                    </form>
                                </div>
                              </div>
                            </div>                          
                        </div>
                    </div>
                    
                </div><!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
     
        <script src="js/validator.js"></script> 
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>
        
    </body>
</html>
