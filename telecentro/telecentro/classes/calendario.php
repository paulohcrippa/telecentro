<?php class calendario {

  protected $db_query;
  protected $db_result;
  protected $db_row;

  // Listado de eventos
  public function listado($connection) {
    $this -> connection = $connection;
    $this -> db_query = "SELECT * FROM tb_agenda";

    try {
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_array = array();
      $i = 0;

      while($db_row = $db_result -> fetch(PDO::FETCH_BOTH)) {
        $db_array[$i] = $db_row;
        $i++;
      }

      echo json_encode(array("success" => 1, "result" => $db_array));

      $db_result -> CloseCursor();

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }

  // Nuevo evento
  public function nuevo($connection) {
    $this -> connection = $connection;

    $this -> db_query = "INSERT INTO tb_agenda (title, TPATENDIMENTO, url, class, start, end, start_normal, end_normal, INSTRUTOR) VALUES (:titulo, :atendimento, :url, :class, :inicio, :final, :inicio_normal, :final_normal, :instrutor)";

    $inicio = strtotime(substr($_POST["inicio"], 6, 4) . "-" . substr($_POST["inicio"], 3, 2) . "-" . substr($_POST["inicio"], 0, 2) . " "  . substr($_POST["inicio"], 10, 6)) * 1000;

    $final  = strtotime(substr($_POST["final"], 6, 4)."-" . substr($_POST["final"], 3, 2) . "-" . substr($_POST["final"], 0, 2) . " " . substr($_POST["final"], 10, 6)) * 1000;

    $link = __LOCALHOST__ . "/evento-detalles.php";

    try {
      $db_result = $connection -> prepare($this -> db_query);

      $db_result -> bindValue(":titulo", $_POST['titulo']);
      $db_result -> bindValue(":atendimento", $_POST["atendimento"]);
      $db_result -> bindValue(":url", $link);
      $db_result -> bindValue(":class", $_POST["class"]);
      $db_result -> bindValue(":inicio", $inicio);
      $db_result -> bindValue(":final", $final);
      $db_result -> bindValue(":inicio_normal", $_POST["inicio"]);
      $db_result -> bindValue(":final_normal", $_POST["final"]);
      $db_result -> bindValue(":instrutor", $_POST["instrutor"]);

      $db_result -> execute();

      $this -> db_query = "SELECT MAX(id) AS id FROM tb_agenda";
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_file = $db_result -> fetch(PDO::FETCH_ASSOC);
      $id_event = $db_file['id'];

      $link = __LOCALHOST__ . "/evento-detalles.php?id=$id_event";

      $this -> db_query = "UPDATE tb_agenda SET url = '$link' WHERE id = '$id_event'";
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_result -> CloseCursor();

      header("location:agenda.php?nuevo=ok"); 

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }

  // Eliminar evento
  public function eliminar($connection) {
    $this -> connection = $connection;
    $this -> db_query ="DELETE FROM tb_agenda WHERE id = :id";

    try {
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> bindValue(":id", $_GET["id"]);
      $db_result -> execute();

      $db_result -> CloseCursor();

      header("location:agenda.php?eliminar=ok");

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }
}