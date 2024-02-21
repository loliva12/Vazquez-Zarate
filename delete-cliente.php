<!-- Comienza código: delete.php -->
<?PHP

require_once ("./ludb.php");

if($_GET['id_cliente']) {
    $id_cliente = $_GET['id_cliente'];
    $query = "DELETE FROM clientes
                WHERE id_cliente = $id_cliente";

if ($DB_conn->query($query) === TRUE) {
  echo '<script>alert("Borrado exitoso")</script>';
  include ("./crud-cliente.php");
  } else {
    echo "Error deleting record: " . $DB_conn->error;
    exit;
  }            
    
    //header("Location: ./crud-cliente.php");
}

?>


