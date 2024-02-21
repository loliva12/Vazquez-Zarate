<?php
// Include the file where you establish the database connection
include('ludb.php'); // Reemplaza con el nombre de tu archivo real

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Asegúrate de que $DB_conn esté definido y no sea nulo
    if ($DB_conn) {
        // Construir la consulta SQL con las cláusulas WHERE y ORDER BY
        $query = "SELECT * FROM clientes WHERE nombre LIKE '%$searchTerm%' ORDER BY nombre";

        $result = mysqli_query($DB_conn, $query);

        // Construir la tabla con los resultados de la búsqueda
        while ($register = mysqli_fetch_array($result)) { 
            // Salida del HTML para cada fila
            echo "<tr onclick=\"document.location = './edit-cliente.php?id_cliente={$register['id_cliente']}';\">";
            echo "<td>{$register['nombre']}</td>";
            echo "<td>{$register['apellido']}</td>";
            echo "<td>{$register['fecha_nacimiento']}</td>";
            echo "<td>{$register['telefono']}</td>";
            echo "<td>{$register['email']}</td>";
            echo "<td>{$register['redes']}</td>";
            echo "<td>{$register['direccion']}</td>";
            echo "<td>";
            echo "<a href='./edit-cliente.php?id_cliente={$register['id_cliente']}' class='btn btn-success' title='Editar el registro {$register['id_cliente']}'>";
            echo "<i class='fas fa-user-edit'></i></a>";
            echo "<a href='./delete-cliente.php?id_cliente={$register['id_cliente']}' class='btn btn-danger' title='Borrar el registro {$register['id_cliente']}'>";
            echo "<i class='fas fa-trash-alt'></i></a>";
            // Agregar botón para enviar correo electrónico
            echo "<a href='javascript:void(0);' onclick='enviarCorreo(\"{$register['email']}\")' class='btn btn-primary' title='Enviar correo electrónico a {$register['email']}'>";
            echo "<i class='fas fa-envelope'></i></a>";
            echo "</td></tr>";
        }
    } else {
        echo "Database connection not established.";
    }
}
?>
