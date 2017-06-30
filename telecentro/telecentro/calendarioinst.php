<?php
session_start(); 
 include_once("principalinst.php");
?>

<div id="wrapper" style="margin-right: -9%; margin-left: -9%;">
      <div id="page-wrapper">
        <div class="container-fluid">

          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                Agenda<small>  </small>
              </h1>
              <ol class="breadcrumb">
                <li class="">
                  <i class="glyphicon glyphicon-menu-right"></i> Página Inicial
                </li>
                <li class="active">
                  <i class="glyphicon glyphicon-menu-right"></i> Agenda
                </li>
              </ol>
            </div>
          </div>
          <div class="col-sm-12">
    

              </div>
          

          <header class="page-header">
            <div class="pull-right form-inline">

              <div class="btn-group">
                <button class="btn btn-primary" data-calendar-nav="prev">Anterior</button>
                <button class="btn btn-default" data-calendar-nav="today">Hoje</button>
                <button class="btn btn-primary" data-calendar-nav="next">Seguinte</button>
              </div>

              <div class="btn-group">
                <button class="btn btn-warning" data-calendar-view="year">Ano</button>
                <button class="btn btn-warning active" data-calendar-view="month">Mês</button>
                <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                <button class="btn btn-warning" data-calendar-view="day">Dia</button>
              </div>
            </div>
            <h3></h3>
          </header>

          <?php if (isset($_GET["nuevo"]) AND ($_GET["nuevo"]=="ok")): ?>
          <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <p><span class="glyphicon glyphicon-info-sign"></span> Agendamento criado com sucesso.</p>
          </div>
          <?php endif; ?>

          <?php if (isset($_GET["eliminar"]) && ($_GET["eliminar"]=="ok")): ?>
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <p><span class="glyphicon glyphicon-info-sign"></span> Agendamento eliminado com sucesso.</p>
          </div>
          <?php endif; ?>

          <div class="row">
            <div class="col-xm-12 col-md-8">
              <div id="calendar"></div>
            </div>


            <div class="col-xm-12 col-md-4">
              <?php 
                if($_SESSION['usuarioPerfil']== '1'){
                  include_once "views/calendario/nuevo.php"; 
                }
                  else{

                    include_once "views/calendario/nuevoinst.php"; 
                  }
                ?>
              
            </div>
          </div>

          <div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 class="modal-title">Agendamento</h3>
                </div>
                <div class="modal-body" style="height: 400px">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>

         </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->


<script type="text/javascript" src="components/underscore/underscore-min.js"></script>
<script type="text/javascript" src="components/jstimezonedetect/jstz.min.js"></script>
<script type="text/javascript" src="components/bootstrap-calendar/js/language/pt-BR.js"></script>
<script type="text/javascript" src="components/bootstrap-calendar/js/calendar.js"></script>
<script type="text/javascript" src="components/bootstrap-calendar/js/app.js"></script>
<script type="text/javascript" src="components/moment/moment.min.js"></script>
<script type="text/javascript" src="components/moment/locale/pt-br.js"></script>
<script type="text/javascript" src="components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>  

<script>
  $('#datetimepicker1').datetimepicker({
    format: 'DD/MM/YYYY HH:mm',
    ignoreReadonly: true,
    minDate: moment(),
    showClear: true
  });

  $('#datetimepicker2').datetimepicker({
    format: 'DD/MM/YYYY HH:mm',
    ignoreReadonly: true,
    minDate: moment(),
    showClear: true
  });  
</script>