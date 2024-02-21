<!-- Comienza código: tabla_administrativo.php -->
<?php
// Incluir la conexión a la base de datos
require_once("ludb.php");

// Consulta para obtener las causas de tipo "Administrativo"
$query_administrativo = "SELECT * FROM causas WHERE tipo_causa = 'Administrativo'";
$result_administrativo = mysqli_query($DB_conn, $query_administrativo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Administrativo</title>
    <!-- Puedes incluir estilos CSS u otros recursos si es necesario -->
</head>
<body>
    <h2>Tabla de Causas Administrativas</h2>

    <!-- Tabla para mostrar las causas administrativas -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <!-- Puedes agregar más columnas según tus necesidades -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Mostrar los resultados de la consulta en la tabla
            while ($row = mysqli_fetch_assoc($result_administrativo)) {
                echo "<tr>";
                echo "<td>{$row['id_causa']}</td>";
                echo "<td>{$row['nombre']}</td>";
                echo "<td>{$row['descripcion']}</td>";
                // Puedes agregar más columnas según tus necesidades
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Puedes incluir enlaces, botones u otros elementos según sea necesario -->

    <!-- Puedes incluir scripts JS u otros recursos si es necesario -->
</body>
</html>
