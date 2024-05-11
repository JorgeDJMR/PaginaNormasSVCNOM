<?php
include("db.php");

if(isset($_POST['registrar_usuario'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO usuarios(usuarioID, username, password) VALUES (NULL, '$username', '$password')";
    $result = mysqli_query($conn, $query);
    
    if(!$result){
        die("Query failed");
    }

    header("Location: IndexNuevoLogin.php");
}

?>