<?php
include("db.php");

if (isset($_POST['validar_usuario'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); 

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['usuarioID'] = $row['usuarioID'];

        header("Location: index.php");
        exit(); 
    } else {
        // El usuario no existe o la contraseña es incorrecta
        // Puedes redirigir a una página de error o mostrar un mensaje al usuario
        header("Location: IndexNuevoLogin.php?login_error=true");
        exit();
    }
}
?>