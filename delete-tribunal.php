<!-- Comienza código: delete.php -->
<?PHP

require_once ("./ludb.php");

if($_GET['id_tribunal']) {
    $id_tribunal = $_GET['id_tribunal'];
    $query = "DELETE FROM tribunales
                WHERE id_tribunal = $id_tribunal";

if ($DB_conn->query($query) === TRUE) {
  echo '<script>alert("Borrado exitoso")</script>';
  //include ("./crud-tribunal.php");
  } else {
    echo "Error deleting record: " . $DB_conn->error;
    exit;
  }            
    
    header("Location: ./crud-tribunal.php");
}

?>


