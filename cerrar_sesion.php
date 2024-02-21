<?php
session_start(); // Inicia la sesión

// Elimina todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();

// Redirige a la página de inicio de sesión
header("Location: conectar.php");
exit;
?>
