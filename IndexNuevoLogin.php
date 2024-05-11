<?php // Verifica si el parámetro 'login_error' está presente en la URL
if (isset($_GET['login_error']) && $_GET['login_error'] == 'true') {
    // El parámetro 'login_error' está presente y tiene el valor 'true'
    // Puedes realizar acciones específicas, como mostrar un mensaje de error
    $mensajeError = "Ha sucedido un error.";
} else {
    // El parámetro 'login_error' no está presente o tiene otro valor
    // Puedes realizar acciones normales aquí
    $mensajeError = ""; // Puedes dejar el mensaje de error vacío o definir otro valor por defecto
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
    /* Estilos para la alerta */
    .alert {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 10px;
      background-color: #f44336; /* Color de fondo rojo */
      color: white;
      text-align: center;
      font-size: 18px;
    }
  </style>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
     <!-- Alerta -->
  <div id="myAlert" class="alert">
    <strong>Error:</strong> <?php echo $mensajeError ?>
  </div>

   <!-- Mostrar el mensaje de error si está presente -->
<?php if (!empty($mensajeError)): ?>
   <script>
            var alerta = document.getElementById("myAlert");
            alerta.style.display = "block";

            // Ocultar la alerta después de 3 segundos (puedes ajustar este tiempo)
            setTimeout(function(){
                alerta.style.display = "none";
            }, 7000);

    </script>
<?php endif; ?>
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="validar_usuario.php" class="formulario__login" method="POST">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Usuario" name="username" required>
                        <input type="password" placeholder="Contraseña" name="password" required>
                        <button type="submit" name="validar_usuario">Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="registrar_usuario.php" class="formulario__register" method="POST">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Usuario" name="username" required>
                        <input type="password" placeholder="Contraseña" name="password" required>
                        <button type="submit" name="registrar_usuario">Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

    <script>
        var lastError = <?php echo json_encode($_SESSION['lastError']); ?>;
        // Función para mostrar la alerta

        if (lastError != "") {
            var alerta = document.getElementById("myAlert");
            alerta.style.display = "block";

            // Ocultar la alerta después de 3 segundos (puedes ajustar este tiempo)
            setTimeout(function(){
                alerta.style.display = "none";
            }, 7000);

            <?php $_SESSION['lastError'] = ""?>
        }
  </script>
        <script src="jsNuevoLogin/scriptLogin.js"></script>
</body>
</html>