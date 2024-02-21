<!-- Comienza código: update-causa.php -->
<?php
include("./ludb.php");

if (isset($_POST['update'])) {
    $id_causa = $_POST["id_causa"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $id_cliente = $_POST["id_cliente"];
    $tipo_causa = $_POST["tipo_causa"]; 
    $subtipo_causa = $_POST["subtipo_causa"]; 
    $estado = $_POST["estado"]; 

    $query = "UPDATE causas SET
                nombre = '$nombre',
                descripcion = '$descripcion',
                id_cliente = '$id_cliente',
                tipo_causa = '$tipo_causa' ,
                subtipo_causa = '$subtipo_causa',
                estado = '$estado'
              WHERE id_causa = $id_causa";

    if ($DB_conn->query($query) === TRUE) {
        echo '<script>alert("Registro actualizado")</script>';
        
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
        echo "Error updating record: " . $DB_conn->error;
        exit;
    }

    $_SESSION['message'] = "Éxito: se actualizaron correctamente los datos del registro en la base.";
    $_SESSION['message_type'] = "primary";
}
?>
