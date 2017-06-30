<?php
 
 require "config.php"; 
 include_once("principalinst.php");
  session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>CTC- Agendamento</title>

    <script src="components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="components/bootstrap-calendar/css/calendar.min.css">
    <link rel="stylesheet" href="components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type"  content="text/html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Painel Administrativo">
    <meta name="author" content="Paulo/Tayane">
    
  </head>
  <body>
    <div class="container">
     
      <!-- Nuevo evento -->
      <?php if (isset($_GET["action"]) && ($_GET["action"]=="nuevo")):
      $evento = new calendario();
      $evento -> nuevo($db_connect);?>
      
      <!-- Eliminar evento -->
      <?php elseif (isset($_GET["action"]) && ($_GET["action"]=="eliminar")):
      $evento = new calendario();
      $evento -> eliminar($db_connect);?>

      <!-- Listado de eventos -->
      <?php else: ?>
      <?php 

        if($_SESSION['usuarioPerfil']== '1'){

           include_once "calendario.php";
        }else{
          include_once "calendarioinst.php";
        }
      ?>

      <?php endif; ?>
    </div>
  </body>
</html>


<?php $db_connect = null; ?>