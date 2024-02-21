<!-- Comienza código: insert.php -->
<?PHP
require_once ("./ludb.php");

$nombre       = $_POST["nombre"];
$direccion      = $_POST["direccion"];
$telefono      = $_POST["telefono"];
$email     = $_POST["email"];


/*$query1 = "SELECT id_cliente
            FROM clientes 
           where username = '$username'";
$result1 = mysqli_query($DB_conn, $query1);

if (mysqli_num_rows($result1) > 0) {
  echo '<script>alert("El usuario ya esta registrado, ingrese uno nuevo")</script>';
  include ("./crud-cliente.php");
}else{*/
  $query = "INSERT 
              INTO tribunales(
                  id_tribunal, 
                  nombre,
                  direccion,
                  telefono, 
                  email,
                  otros)
              VALUE (
                  NULL, 
                  '$nombre', 
                  '$direccion',
                  '$telefono',
                  '$email',
                  '$otros');";

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro insertado")</script>';
    //include ("./crud-tribunal.php");
    } else {
      echo "Error: " . $query . "<br>" . $DB_conn->error;
      exit;
   }

  $_SESSION['message'] = "Éxito: se guardaron correctamente los datos en la base.";
  $_SESSION['message_type'] = "success";
//}
header("Location: ./crud-tribunal.php");


?>