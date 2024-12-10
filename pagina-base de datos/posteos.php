<?php
session_start();

// Asegúrate de que el usuario esté logueado, de lo contrario redirígelos a la página de login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");  // Redirige a la página de login si no está logueado
    exit();
}

$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$BDName = "esi";

// Conexión a la base de datos
$conn = new mysqli($servidor, $usuario, $contraseña, $BDName);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene el ID del usuario desde la sesión
$usuario_id = $_SESSION['usuario_id'];

// Consulta para obtener los posteos del usuario
$sql = "SELECT * FROM info WHERE usuario_id = '$usuario_id' ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus Posteos</title>
    <link rel="stylesheet" href="styles2.css"> <!-- Vincula el archivo CSS -->
</head>
<body>
    <div class="header">
        <nav class="nav-menu">
            <a href="nuestra_comunidad.php">Nuestra Comunidad</a>
            <a href="upload_post.php">Subir Publicación</a>
        </nav>
    </div>

    <header>
        <h1>Tus Posteos</h1>
        <hr>
    </header>

    <main>
        <section class="post-container">
            <?php
            // Verifica si hay publicaciones
            if ($result->num_rows > 0) {
                // Muestra las publicaciones
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo '<h2>' . htmlspecialchars($row['nombre']) . '</h2>';
                    echo '<img src="' . htmlspecialchars($row['img']) . '" alt="Imagen del post">';
                    echo '<p>' . htmlspecialchars($row['descripcion']) . '</p>';
                    echo '<small>Publicado el: ' . htmlspecialchars($row['fecha']) . '</small>';
                    echo '</div>';
                }
            } else {
                // Si no hay publicaciones
                echo '<p>No tienes publicaciones aún. <a href="upload_post.php">Sube tu primera publicación</a>.</p>';
            }
            ?>

        </section>
    </main>

    <?php
    $conn->close();  // Cierra la conexión con la base de datos
    ?>
</body>
</html>
