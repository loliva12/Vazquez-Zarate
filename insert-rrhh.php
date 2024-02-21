<!-- Comienza código: insert.php -->
<?PHP
require_once ("./ludb.php");

$nombre       = $_POST["nombre"];
$apellido       = $_POST["apellido"];
$dni     = $_POST["dni"];
$fecha_nacimiento    = $_POST["fecha_nacimiento"];
$telefono      = $_POST["telefono"];
$email     = $_POST["email"];
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
              INTO rrhh(
                  id_rrhh, 
                  nombre,
                  apellido,
                  dni, 
                  fecha_nacimiento,
                  telefono, 
                  email,
                  direccion)
              VALUE (
                  NULL, 
                  '$nombre', 
                  '$apellido', 
                  '$dni',
                  '$fecha_nacimiento',
                  '$telefono',
                  '$email',
                  '$direccion');";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro insertado")</script>';
    include ("./crud-rrhh.php");
    } else {
      echo "Error: " . $query . "<br>" . $DB_conn->error;
      exit;
   }

  $_SESSION['message'] = "Éxito: se guardaron correctamente los datos en la base.";
  $_SESSION['message_type'] = "success";
//}
//header("Location: ./crud-rrhh.php");


?>