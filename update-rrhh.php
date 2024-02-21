<!-- Comienza código: update.php -->
<?PHP
include ("./ludb.php");

if(isset($_POST['update'])) {    
    $id_rrhh        = $_POST["id_rrhh"];
    $nombre       = $_POST["nombre"];
    $apellido    = $_POST["apellido"];
    $dni       = $_POST["dni"];
    $fecha_nacimiento       = $_POST["fecha_nacimiento"];
    $telefono      = $_POST["telefono"];
    $email      = $_POST["email"];
    $direccion       = $_POST["direccion"];


    
    $query = "UPDATE rrhh SET    nombre = '$nombre',
                                    apellido = '$apellido',
                                    dni = '$dni',
                                    fecha_nacimiento = '$fecha_nacimiento',
                                    telefono = '$telefono',
                                    email = '$email',
                                    direccion = '$direccion'
                             WHERE  id_rrhh = $id_rrhh";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro actualizado")</script>';
    //include ("./crud-rrhh.php");
  } else {
    echo "Error updating record: " . $DB_conn->error;
    exit;
  }                         
  
    $_SESSION['message'] = "Éxito: se actualizaron correctamente los datos del registro en la base.";
    $_SESSION['message_type'] = "primary";
   
    header("Location: ./crud-rrhh.php");
}

?>
