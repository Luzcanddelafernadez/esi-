<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$contraseña ="";
$BDName = "esi";

$conn = new mysqli ($servidor,$usuario,$contraseña,$BDName);

if ($conn->connect_error) {
}
$target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); 
    }

    $img = $_FILES['img']['name'];
    $target_file = $target_dir . basename($img);
    
    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
        $descripcion = $_POST['descripcion'];
        $nombre = $_POST['nombre'];

        $sql = "INSERT INTO info (img, nombre,descripcion) VALUES ('$target_file','$nombre' ,'$descripcion')";

        if ($conn->query($sql) === TRUE) {
            echo '<script> "Publicación agregada con éxito."</script>';
        } else {
            echo "Error al agregar la publicación: " . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }

    $conn -> close();
?>