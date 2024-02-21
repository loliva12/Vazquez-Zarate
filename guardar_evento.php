<?php
include 'ludb.php';

// Verificar si se reciben datos del frontend
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data)) {
    // Extraer los datos del evento
    $titulo = $data['title'];
    $dia = $data['day'];
    $mes = $data['month'];
    $año = $data['year'];
    $importancia = $data['importance'];

    // Preparar la consulta SQL
    $sql = "INSERT INTO calendario (titulo, dia, mes, año, importancia) VALUES (?, ?, ?, ?, ?)";

    // Preparar y ejecutar la consulta
    $stmt = $DB_conn->prepare($sql);

    if ($stmt) {
        // Vincular parámetros
        $stmt->bind_param("siiis", $titulo, $dia, $mes, $año, $importancia);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Evento guardado exitosamente";
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $DB_conn->error;
    }
} else {
    echo "No se recibieron datos del frontend";
}

// Cerrar la conexión a la base de datos
$DB_conn->close();
?>
