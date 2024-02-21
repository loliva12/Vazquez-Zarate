<?php

require_once ("./ludb.php");

if(isset($_GET['id_causa'])) {
    $id_causa = $_GET['id_causa'];

    // Recupera el tipo de causa antes de ejecutar la eliminación
    $query_tipo = "SELECT tipo_causa FROM causas WHERE id_causa = $id_causa";
    $result_tipo = $DB_conn->query($query_tipo);

    if ($result_tipo->num_rows == 1) {
        $row = $result_tipo->fetch_assoc();
        $tipo_causa = $row['tipo_causa'];

        // Ahora, puedes usar $tipo_causa en la redirección
        $query_delete = "DELETE FROM causas WHERE id_causa = $id_causa";
        if ($DB_conn->query($query_delete) === TRUE) {
            echo '<script>alert("Borrado exitoso")</script>';
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
            echo "Error deleting record: " . $DB_conn->error;
            exit;
        }
    } else {
        echo "Error: No se pudo obtener el tipo de causa.";
        exit;
    }
}
?>



