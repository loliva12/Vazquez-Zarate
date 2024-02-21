<!-- Comienza código: update.php -->
<?PHP
include ("./ludb.php");

if(isset($_POST['update'])) {    
    $id_tribunal        = $_POST["id_tribunal"];
    $nombre       = $_POST["nombre"];
    $direccion       = $_POST["direccion"];
    $telefono      = $_POST["telefono"];
    $email      = $_POST["email"];
    $otros      = $_POST["otros"];
    

    $query = "UPDATE tribunales SET    nombre = '$nombre',
                                    direccion = '$direccion',
                                    telefono = '$telefono',
                                    email = '$email',
                                    otros = '$otros'
                                    
                             WHERE  id_tribunal = $id_tribunal";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro actualizado")</script>';
    //include ("./crud-tribunal.php");
  } else {
    echo "Error updating record: " . $DB_conn->error;
    exit;
  }                         
  
    $_SESSION['message'] = "Éxito: se actualizaron correctamente los datos del registro en la base.";
    $_SESSION['message_type'] = "primary";
   
    header("Location: ./crud-tribunal.php");
}

?>
