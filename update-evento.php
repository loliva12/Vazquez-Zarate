<!-- Comienza código: update.php -->
<?PHP
include ("./ludb.php");

if(isset($_POST['update'])) {    
    $id_evento        = $_POST["id_evento"];
    $nombre       = $_POST["nombre"];
    $horario    = $_POST["horario"];
    $fecha      = $_POST["fecha"];
    $referencia      = $_POST["referencia"];
    $nombre_abogado      = $_POST["nombre_abogado"];


    
    $query = "UPDATE eventos SET    nombre = '$nombre',
                                    horario = '$horario',
                                    fecha = '$fecha',
                                    referencia = '$referencia',
                                    nombre_abogado = '$nombre_abogado'
                             WHERE  id_evento = $id_evento";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro actualizado")</script>';
    //include ("./crud-evento.php");
  } else {
    echo "Error updating record: " . $DB_conn->error;
    exit;
  }                         
  
    $_SESSION['message'] = "Éxito: se actualizaron correctamente los datos del registro en la base.";
    $_SESSION['message_type'] = "primary";
   
    header("Location: ./crud-evento.php");
}

?>
