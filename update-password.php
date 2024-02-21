<?php
require_once("./ludb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"], $_POST["password"], $_POST["confirm_password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Verificar si las contraseñas coinciden
    if ($password !== $confirmPassword) {
        echo '<script>alert("Las contraseñas no coinciden.");</script>';
        exit();
    }

    // Actualizar la contraseña del usuario en la base de datos
    $query = "UPDATE usuarios SET contrasenia = '$password' WHERE email = '$email'";
    $updateResult = mysqli_query($DB_conn, $query);

    if ($updateResult) {
        echo '<script>
                alert("Contraseña actualizada correctamente.");
                window.location.href = "index.html"; // Redirigir a la página principal
              </script>';
    } else {
        echo '<script>alert("Error al actualizar la contraseña.");</script>';
    }
}
?>
