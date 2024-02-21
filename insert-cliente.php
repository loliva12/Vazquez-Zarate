<!-- Comienza código: insert.php -->
<?PHP
require_once ("./ludb.php");

$nombre       = $_POST["nombre"];
$apellido       = $_POST["apellido"];
$fecha_nacimiento    = $_POST["fecha_nacimiento"];
$telefono      = $_POST["telefono"];
$email     = $_POST["email"];
$redes     = $_POST["redes"];
$direccion      = $_POST["direccion"];

/*$query1 = "SELECT id_cliente
            FROM clientes 
           where username = '$username'";
$result1 = mysqli_query($DB_conn, $query1);

if (mysqli_num_rows($result1) > 0) {
  echo '<script>alert("El usuario ya esta registrado, ingrese uno nuevo")</script>';
  include ("./crud-cliente.php");
}else{*/
  $query = "INSERT 
              INTO clientes(
                  id_cliente, 
                  nombre,
                  apellido, 
                  fecha_nacimiento,
                  telefono, 
                  email,
                  redes,
                  direccion)
              VALUE (
                  NULL, 
                  '$nombre', 
                  '$apellido', 
                  '$fecha_nacimiento',
                  '$telefono',
                  '$email',
                  '$redes',
                  '$direccion');";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro insertado")</script>';
    include ("./crud-cliente.php");
    } else {
      echo "Error: " . $query . "<br>" . $DB_conn->error;
      exit;
   }

  $_SESSION['message'] = "Éxito: se guardaron correctamente los datos en la base.";
  $_SESSION['message_type'] = "success";
//}
//header("Location: ./crud-cliente.php");


?>