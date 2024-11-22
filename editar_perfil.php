<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$db = "login_canaco";
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del usuario logueado
$usuario = $_SESSION['usuario'];
$sql = "SELECT * FROM registros WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "Error: Usuario no encontrado.";
    exit();
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    <h1>Editar Perfil de Negocio</h1>
    <form action="procesar_edicion.php" method="POST" enctype="multipart/form-data">
        <label for="foto">Foto de perfil:</label>
        <input type="file" name="foto" id="foto"><br>

        <label for="descripcion">Descripción de la empresa:</label>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"><?php echo $userData['descripcion']; ?></textarea><br>

        <label for="servicios">Servicios/Productos:</label>
        <textarea name="servicios" id="servicios" rows="4" cols="50"><?php echo $userData['servicios']; ?></textarea><br>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $userData['ubicacion']; ?>"><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" value="<?php echo $userData['telefono']; ?>"><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?php echo $userData['correo']; ?>"><br>

        <label for="sitio_web">Sitio web:</label>
        <input type="text" name="sitio_web" id="sitio_web" value="<?php echo $userData['sitio_web']; ?>"><br>

        <label for="redes_sociales">Enlaces a redes sociales:</label>
        <textarea name="redes_sociales" id="redes_sociales" rows="3" cols="50"><?php echo $userData['redes_sociales']; ?></textarea><br>

        <label for="galeria">Galería de imágenes:</label>
        <input type="file" name="galeria[]" id="galeria" multiple><br>

        <input type="submit" value="Guardar cambios">
    </form>
</body>
</html>
