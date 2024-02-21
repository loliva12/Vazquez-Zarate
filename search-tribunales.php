<?php
// Include the file where you establish the database connection
include('ludb.php'); // Replace with the actual file name

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Make sure $DB_conn is defined and not null
    if ($DB_conn) {
        // Construct the SQL query with the WHERE and ORDER BY clauses
        $query = "SELECT * FROM tribunales WHERE nombre LIKE '%$searchTerm%' ORDER BY nombre";

        $result = mysqli_query($DB_conn, $query);

        // Build the table with the search results
        while ($register = mysqli_fetch_array($result)) { 
            // Output the HTML for each row
            echo "<tr onclick=\"document.location = './edit-tribunal.php?id_tribunal={$register['id_tribunal']}';\">";
            echo "<td>{$register['nombre']}</td>";
            echo "<td>{$register['direccion']}</td>";
            echo "<td>{$register['telefono']}</td>";
            echo "<td>{$register['email']}</td>";
            echo "<td>{$register['otros']}</td>";
            echo "<td>";
            echo "<a href='./edit-tribunal.php?id_tribunal={$register['id_tribunal']}' class='btn btn-success' title='Editar el registro {$register['id_tribunal']}'>";
            echo "<i class='fas fa-user-edit'></i></a>";
            echo "<a href='./delete-tribunal.php?id_tribunal={$register['id_tribunal']}' class='btn btn-danger' title='Borrar el registro {$register['id_tribunal']}'>";
            echo "<i class='fas fa-trash-alt'></i></a>";
            echo "</td></tr>";
        }
    } else {
        echo "Database connection not established.";
    }
}
?>
