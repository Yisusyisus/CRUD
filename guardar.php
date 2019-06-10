<?php

include("db.php");
if(isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    
    $query = "INSERT INTO usuarios(nombre,apellidos) VALUES ('$nombre','$apellidos')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Consulta Fallida");

    }
    $_SESSION['message'] = 'Guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}
?>
