<?php
require_once("./ludb.php");

// Verificar si se enviaron datos de inicio de sesión
if (isset($_POST["name"], $_POST["password"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // Evitar SQL Injection usando sentencias preparadas
    $query = "SELECT id_usuario, rol FROM usuarios WHERE username = ? AND contrasenia = ?";
    $stmt = mysqli_prepare($DB_conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $name, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_usuario, $rol);

    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if (mysqli_stmt_fetch($stmt)) {
        header("Location: home.php?rol=$rol");
    } else {
        echo '<script>alert("Usuario o contraseña inválida, pruebe nuevamente o cree uno nuevo")</script>';
        include("./index.html");
    }
    mysqli_stmt_close($stmt);
} else {
    // Si no se proporcionaron datos de inicio de sesión, redirigir a la página de inicio de sesión
    echo '<script>alert("Por favor, complete los campos de usuario y contraseña")</script>';
    include("./index.html");
}
?>
