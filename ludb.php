<?php

$servername = "localhost";  // Nombre del servidor de la base de datos (puede ser "localhost" en la mayoría de los casos)
$username = "root";  // Dejar en blanco (sin usuario)
$password = "";  // Dejar en blanco (sin contraseña)
$dbname = "estudio_juridico";  // Nombre de la base de datos

// Crear una conexión
$DB_conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($DB_conn->connect_error) {
    die("La conexión a la base de datos falló: " . $DB_conn->connect_error);
}

//echo "Conexión exitosa a la base de datos.";

//

// Cerrar la conexión
//$DB_conn->close();
?>