<!-- Comienza código: insert.php -->
<?php
require_once("./ludb.php");

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$id_cliente = $_POST["id_cliente"];
$tipo_causa = $_POST["tipo_causa"]; 
$subtipo_causa = $_POST["subtipo_causa"]; 
$estado = $_POST["estado"]; 

$query = "INSERT INTO causas(
                id_causa, 
                nombre,
                descripcion,
                id_cliente,
                tipo_causa,
                subtipo_causa,
                estado)  
            VALUES (
                NULL, 
                '$nombre', 
                '$descripcion',
                '$id_cliente',
                '$tipo_causa',
                '$subtipo_causa',
                '$estado');";

if ($DB_conn->query($query) === TRUE) {
    echo '<script>alert("Registro insertado")</script>';
    
            // Redirige según el tipo de causa
            switch ($tipo_causa) {
                case 'Administrativo':
                    header("Location: ./crud-causa-administrativo.php");
                    break;
                case 'Civil':
                    header("Location: ./crud-causa-civil.php");
                    break;
                case 'Laboral':
                    header("Location: ./crud-causa-laboral.php");
                    break;
                case 'Otras':
                    header("Location: ./crud-causa-otras.php");
                    break;
                case 'Penal':
                    header("Location: ./crud-causa-penal.php");
                    break;
                case 'Violencia familiar':
                    header("Location: ./crud-causa-vfamiliar.php");
                    break;
                default:
                    break;
            }
            exit;
} else {
    echo "Error: " . $query . "<br>" . $DB_conn->error;
    exit;
}

$_SESSION['message'] = "Éxito: se guardaron correctamente los datos en la base.";
$_SESSION['message_type'] = "success";
?>

