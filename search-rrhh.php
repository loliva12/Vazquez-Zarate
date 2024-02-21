<?php

include('ludb.php'); 
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    
    if ($DB_conn) {
        
        $query = "SELECT * FROM rrhh WHERE nombre LIKE '%$searchTerm%' ORDER BY nombre";

        $result = mysqli_query($DB_conn, $query);

        
        while ($register = mysqli_fetch_array($result)) { 
           
            echo "<tr onclick=\"document.location = './edit-rrhh.php?id_rrhh={$register['id_rrhh']}';\">";
            echo "<td>{$register['nombre']}</td>";
            echo "<td>{$register['apellido']}</td>";
            echo "<td>{$register['dni']}</td>";
            echo "<td>{$register['fecha_nacimiento']}</td>";
            echo "<td>{$register['telefono']}</td>";
            echo "<td>{$register['email']}</td>";
            echo "<td>{$register['direccion']}</td>";
            echo "<td>";
            echo "<a href='./edit-rrhh.php?id_rrhh={$register['id_rrhh']}' class='btn btn-success' title='Editar el registro {$register['id_rrhh']}'>";
            echo "<i class='fas fa-user-edit'></i></a>";
            echo "<a href='./delete-rrhh.php?id_rrhh={$register['id_rrhh']}' class='btn btn-danger' title='Borrar el registro {$register['id_rrhh']}'>";
            echo "<i class='fas fa-trash-alt'></i></a>";
            echo "</td></tr>";
        }
    } else {
        echo "Database connection not established.";
    }
}
?>
