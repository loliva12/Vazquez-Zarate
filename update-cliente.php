<!-- Comienza código: update.php -->
<?PHP
include ("./ludb.php");

if(isset($_POST['update'])) {    
    $id_cliente        = $_POST["id_cliente"];
    $nombre       = $_POST["nombre"];
    $apellido    = $_POST["apellido"];
    $fecha_nacimiento       = $_POST["fecha_nacimiento"];
    $telefono      = $_POST["telefono"];
    $email      = $_POST["email"];
    $redes       = $_POST["redes"];
    $direccion       = $_POST["direccion"];


    
    $query = "UPDATE clientes SET    nombre = '$nombre',
                                    apellido = '$apellido',
                                    fecha_nacimiento = '$fecha_nacimiento',
                                    telefono = '$telefono',
                                    email = '$email',
                                    redes = '$redes',
                                    direccion = '$direccion'
                             WHERE  id_cliente = $id_cliente";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro actualizado")</script>';
    include ("./crud-cliente.php");
  } else {
    echo "Error updating record: " . $DB_conn->error;
    exit;
  }                         
  
    $_SESSION['message'] = "Éxito: se actualizaron correctamente los datos del registro en la base.";
    $_SESSION['message_type'] = "primary";
   
    //header("Location: ./crud-cliente.php");
}

?>
