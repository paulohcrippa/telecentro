<?php 
     include_once"login/conexao.php";
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
    <head>
    <link href="css/datepicker.css" rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
        
    </head>
    <body>
        <div id="wrapper">
            <div id="page-wrapper" style=" margin-top: -7%; ">
                <div class="container-fluid">
                
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Relatório de Impressões Realizadas 
                            </h1>
                            <ol class="breadcrumb">
                                <li class="">
                                     Página Inicial
                                </li>
                                <li class="active">
                                     Relatório de Impressões
                                </li>
                            </ol>
                        </div>
                    </div>
                    </br></br>
                    
                    <!-- /.row -->  
                    <div class="row">
                        <div class="col-xs-12 col-md-12">

                            <div class="panel panel-primary col-md-offset-1 col-md-4">
                              <div class="panel-heading">
                                <h3 class="panel-title">Relatórios Rápidos</h3>
                              </div>
                                <div class="panel-body">
                                    <div class="span12 well">
                                        <ul class="site-stats">
                                           <i class=" glyphicon glyphicon-user" style="font-size: 50px;"></i>
                                        </ul>
                                    
                                        <form action="gerar_imp_individual.php" target="_blank" method="post">

                                            <label>Selecionar uma Pessoa </label>

                                         <select name="pessoa" class="form-control"  id="pessoa">
                                                <option value="">Pessoas</option>    
                                                <?php 
                                                $sql_pessoa = "SELECT * FROM tb_pessoa order by NMPESSOA ASC";
                                                $query_pessoa = mysql_query($sql_pessoa);
                                                $linhas_pessoa = mysql_num_rows($query_pessoa);

                                                for ($i=0; $i<$linhas_pessoa; $i++) { 
                                                $linha_pessoa = mysql_fetch_array($query_pessoa);
                                                ?>
                                                    <option value="<?=$linha_pessoa['CDPESSOA']?>"><?=$linha_pessoa['NMPESSOA']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select><br>

                                            <div class="list-inline pull-right">
                                                <button type="submit" class="btn btn-inverse span12"><i class="glyphicon glyphicon-print"></i> Imprimir</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-primary col-md-6 col-md-offset-1">
                              <div class="panel-heading">
                                <h3 class="panel-title">Relatórios Customizavéis</h3>
                              </div>
                              <div class="panel-body">
                                  <div class="span12 well">
                                    <form target="_blank" action="gerar_impressao.php" method="post">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr height="40">
                                                <td colspan="2" ><b>Período </b></td>
                                            </tr>

                                             <tr height="40" >
                                                <td>
                                                   <b> De: <input  type="date" class="form-control"   name="datainicio" id="datainicio"></b> 
                                                 </td>
                                                <td>
                                                   <b>Até: <input type="date" class="form-control"  name="datafinal" id="datafinal"></b>
                                                </td>
                                            </tr>
                                        </table>

                                    <br>
                                    <div class="list-inline pull-right">
                                        <button type="submit" class="btn btn-inverse span12"><i class="glyphicon glyphicon-print"></i> Imprimir</button>
                                    </div>
                                    </form>
                                </div>
                              </div>
                            </div> 


                                
                                                       
                        </div>
                    </div><!-- /.container-fluid -->
                    
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
