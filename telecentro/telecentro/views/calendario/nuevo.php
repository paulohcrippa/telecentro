<?php 
  session_start();
?>

<form action="agenda.php?action=nuevo" method="post">
  <div class="form-group">
    <label for="start">Inicio:</label>
    <div class="input-group date" id="datetimepicker1">
      <input type="text" name="inicio" class="form-control" readonly /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>

  <div class="form-group">
    <label for="end">Final:</label>
    <div class="input-group date" id="datetimepicker2">
      <input type="text" name="final" class="form-control" readonly /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>

  <div class="form-group">
    <label for="class">Tipo de Agendamento</label>
    <select class="form-control"  name="class" required>
      <option value="event-info">Cadastro</option>
      <option value="event-success">Atendimento</option>
    </select>
  </div>

  <div class="form-group">
    <label for="title">Pessoa</label>
    <input type="text" name="titulo" class="form-control" placeholder="Insere uma pessoa" autocomplete="off" required>
  </div>


  <div class="form-group">
    <label for="body">Tipo de Atendimento</label>
     <select class="form-control"    name="atendimento" required><option value="">Selecionar Atendimento</option>
      <?php 
        $query = mysql_query ("select * FROM tb_tpatendimento ");
        while($res=mysql_fetch_array($query)){
          echo "<option value='{$res["DSTPATENDIMENTO"]}'>{$res["DSTPATENDIMENTO"]}</option>";
        }
      ?>
    </select>
   
  </div>

  <?php 

      if($_SESSION['usuarioPerfil']== '1'){ ?>

          <div class="form-group">
            <label for="body">Instrutor</label>

            <select class="form-control" id="instrutor" required  name="instrutor"><option value="">Selecionar Instrutor(a)</option>
              <?php 
                $query = mysql_query ("select * FROM tb_usuario ");
                while($res=mysql_fetch_array($query)){
                  echo "<option value='{$res["NMUSUARIO"]}'>{$res["NMUSUARIO"]}</option>";
                }
              ?>
            </select>
            
          </div>

      <?php }
      else{ ?>

            <label class="control-label" for="instrutor" ><font color="red">*</font> Instrutor(a):</label> 
              <div> 
                <input type="text" class="form-control" name="instrutor" readonly required  value=" <?php echo $_SESSION['usuarioNome'];?>" data-error="Por favor, informe o nome." />
                
                <div class="help-block with-errors"></div>
              </div>

      <?php } ?>
 
 
  <div class="form-group">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-calendar"></span>Agendar</button>
  </div>


  <div class="form-group">
    <label for="body">Legenda</label>
        <br>
        <img src="imagens/icone azul.png"><b> Cadastro</b></img>
        <img src="imagens/icone verde.png"><b> Atendimento</b></img>
  </div>
</form>

