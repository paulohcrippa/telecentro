<?php while ($db_file = $db_result -> fetch(PDO::FETCH_ASSOC)): ?>

<p><strong>Inicio:</strong> <?php echo $db_file["start_normal"]; ?><br>
  <strong>Final:</strong> <?php echo $db_file["end_normal"]; ?></p>

<h3>Detalhes:</h3>
<p><?php echo nl2br($db_file["atendimento"]); ?></p>

<p><a href="agenda.php?action=eliminar&id=<?php echo $db_file["id"]; ?>" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></p>

<?php endwhile; ?>