<!-- Comienza código: insert.php -->
<?PHP
require_once ("./ludb.php");

$username       = $_POST["username"];
$email      = $_POST["email"];
$contrasenia      = $_POST["contrasenia"];
$rol     = $_POST["rol"];

$query1 = "SELECT id_usuario, rol
            FROM usuarios 
           where username = '$username'";
$result1 = mysqli_query($DB_conn, $query1);

if (mysqli_num_rows($result1) > 0) {
  echo '<script>alert("El usuario ya esta registrado, ingrese uno nuevo")</script>';
  include ("./crud-nuevo.php");
}else{

  $query = "INSERT 
             INTO usuarios(
                  id_usuario, 
                  username,
                  email, 
                  contrasenia,
                  rol)
              VALUE (
                  NULL, 
                  '$username', 
                  '$email',
                  '$contrasenia',
                  '$rol');";

//echo $query;

  if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro insertado")</script>';
    include ("./index.html");
    } else {
      echo "Error: " . $query . "<br>" . $DB_conn->error;
      exit;
    }

   $_SESSION['message'] = "Éxito: se guardaron correctamente los datos en la base.";
   $_SESSION['message_type'] = "success";
}
header("Location: ./crud-usuario.php");


?>