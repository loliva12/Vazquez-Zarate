<!-- Comienza código: insert.php -->
<?PHP
require_once ("./ludb.php");

$nombre       = $_POST["nombre"];
$horario       = $_POST["horario"];
$fecha    = $_POST["fecha"];
$referencia      = $_POST["referencia"];
$nombre_abogado     = $_POST["nombre_abogado"];

/*$query1 = "SELECT id_cliente
            FROM clientes 
           where username = '$username'";
$result1 = mysqli_query($DB_conn, $query1);

if (mysqli_num_rows($result1) > 0) {
  echo '<script>alert("El usuario ya esta registrado, ingrese uno nuevo")</script>';
  include ("./crud-cliente.php");
}else{*/
  $query = "INSERT 
              INTO eventos(
                  id_evento, 
                  nombre,
                  horario, 
                  fecha,
                  referencia, 
                  nombre_abogado)
              VALUE (
                  NULL, 
                  '$nombre', 
                  '$horario', 
                  '$fecha',
                  '$referencia',
                  '$nombre_abogado');";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro insertado")</script>';
    include ("./crud-evento.php");
    } else {
      echo "Error: " . $query . "<br>" . $DB_conn->error;
      exit;
   }

  $_SESSION['message'] = "Éxito: se guardaron correctamente los datos en la base.";
  $_SESSION['message_type'] = "success";
//}
header("Location: ./crud-evento.php");


?>