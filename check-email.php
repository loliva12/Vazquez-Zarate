<?php
require_once("./ludb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];

    $query = "SELECT id_usuario FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($DB_conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // El correo electrónico existe en la base de datos, redirige a reset-password-form.php
        header("Location: reset-password-form.php?email=" . urlencode(base64_encode($email))); // Codificar el correo electrónico antes de enviarlo
        exit();
    } else {
        echo '<script>
                alert("El correo electrónico no está registrado");
                window.location.href = "forgot-password.php"; // Redirigir a la página principal
              </script>';
    }
}

// Obtener el correo electrónico codificado de la URL
if(isset($_GET['email'])) {
    $encodedEmail = $_GET['email'];

    // Decodificar el correo electrónico
    $email = base64_decode($encodedEmail);

    // Ahora puedes utilizar $email en tu lógica de código
}
?>
