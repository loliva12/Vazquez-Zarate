<!-- Comienza código: delete.php -->
<?PHP

require_once ("./ludb.php");

if($_GET['id_rrhh']) {
    $id_rrhh = $_GET['id_rrhh'];
    $query = "DELETE FROM rrhh
                WHERE id_rrhh = $id_rrhh";

if ($DB_conn->query($query) === TRUE) {
  echo '<script>alert("Borrado exitoso")</script>';
  //include ("./crud-rrhh.php");
  } else {
    echo "Error deleting record: " . $DB_conn->error;
    exit;
  }            
    
    header("Location: ./crud-rrhh.php");
}

?>


