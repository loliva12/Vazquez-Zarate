<?php
include 'ludb.php';

$sql = "SELECT * FROM calendario";
$result = $DB_conn->query($sql);

$events = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

echo json_encode($events);

// Cierra la conexión a la base de datos al final del script

?>
