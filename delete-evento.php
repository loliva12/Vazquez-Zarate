<!-- Comienza código: delete.php -->
<?PHP

require_once ("./ludb.php");

if($_GET['id_evento']) {
    $id_evento = $_GET['id_evento'];
    $query = "DELETE FROM eventos
                WHERE id_evento = $id_evento";

if ($DB_conn->query($query) === TRUE) {
  echo '<script>alert("Borrado exitoso")</script>';
  //include ("./crud-evento.php");
  } else {
    echo "Error deleting record: " . $DB_conn->error;
    exit;
  }            
    
    //header("Location: ./crud-cliente.php");
}

?>


