<?php
session_start();

// Destruye todas las variables de sesión
session_destroy();

// Redirige a la página de inicio (o a donde desees después de desconectar)
header("Location: IndexNuevoLogin.php");
exit();
?>